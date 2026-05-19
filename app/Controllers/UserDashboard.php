<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\TransaksiModel;
use App\Models\UserModel;
use App\Models\SewaModel;
use App\Models\LaporanModel;
use Config\Database;

class UserDashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $barangModel     = new BarangModel();
        $transaksiModel  = new TransaksiModel();
        $userModel       = new UserModel();
        $sewaModel       = new SewaModel();
        $laporanModel    = new LaporanModel();
        $db              = Database::connect();

        $today = date('Y-m-d');
        $currentMonth = date('m');
        $currentYear = date('Y');

        // =============================
        // STATISTIK BARANG MASUK/KELUAR
        // =============================
        $todayMasuk = $transaksiModel
            ->selectSum('jumlah')
            ->where('jenis_transaksi', 'masuk')
            ->where('tanggal >=', $today . ' 00:00:00')
            ->where('tanggal <=', $today . ' 23:59:59')
            ->first();

        $todayKeluar = $transaksiModel
            ->selectSum('jumlah')
            ->where('jenis_transaksi', 'keluar')
            ->where('tanggal >=', $today . ' 00:00:00')
            ->where('tanggal <=', $today . ' 23:59:59')
            ->first();

        $data['todayMasuk']  = $todayMasuk['jumlah'] ?? 0;
        $data['todayKeluar'] = $todayKeluar['jumlah'] ?? 0;

        // =============================
        // STATISTIK STOK
        // =============================
        $totalStok = $barangModel
            ->selectSum('stok')
            ->first();

        $data['totalStok']      = $totalStok['stok'] ?? 0;
        $data['totalTransaksi'] = $transaksiModel->countAll();
        $data['jumlahBarang']   = $barangModel->countAll();

        // =============================
        // STATISTIK PENYEWAAN
        // =============================
        $data['totalPenyewaan'] = $sewaModel->countAll();
        
        $data['penyewaanAktif'] = $sewaModel
            ->where('checkout >', $today)
            ->countAllResults();
        
        $totalPendapatan = $sewaModel
            ->selectSum('total_harga')
            ->first();
        $data['totalPendapatan'] = $totalPendapatan['total_harga'] ?? 0;
        
        $pendapatanBulanIni = $sewaModel
            ->selectSum('total_harga')
            ->where('MONTH(created_at)', $currentMonth)
            ->where('YEAR(created_at)', $currentYear)
            ->first();
        $data['pendapatanBulanIni'] = $pendapatanBulanIni['total_harga'] ?? 0;

        // =============================
        // PENYEWAAN TERBARU UNTUK DASHBOARD
        // =============================
        $penyewaanHariIni = $sewaModel
            ->orderBy('id', 'DESC')
            ->limit(10)
            ->findAll();

        foreach ($penyewaanHariIni as &$s) {
            $s['tanggal_formatted'] = date('d/m/Y', strtotime($s['created_at']));
            $s['jam'] = date('H:i', strtotime($s['created_at']));
            $checkin = new \DateTime($s['checkin']);
            $checkout = new \DateTime($s['checkout']);
            $s['durasi'] = $checkin->diff($checkout)->days;
            $s['status'] = ($s['checkout'] > $today) ? 'Aktif' : 'Selesai';
            
            $detailItems = $db->table('detail_sewa')
                ->select('kategori_sewa')
                ->where('sewa_id', $s['id'])
                ->groupBy('kategori_sewa')
                ->get()
                ->getResultArray();
            
            $kategoriList = [];
            foreach ($detailItems as $item) {
                $kategoriList[] = ucfirst($item['kategori_sewa'] ?? 'Harian');
            }
            $s['kategori_list'] = $kategoriList;
            $s['kategori_display'] = implode(' & ', $kategoriList);
        }
        $data['penyewaanHariIni'] = $penyewaanHariIni;

        // TRANSAKSI HARI INI - AMBIL SEMUA DATA (TIDAK DIBATASI) //
        $transaksiHariIni = $transaksiModel
        ->select('transaksi.*, barang.nama_barang, barang.satuan, COALESCE(users.email, "Tidak diketahui") as operator')
        ->join('barang', 'barang.id = transaksi.id_barang')
        ->join('users', 'users.id = transaksi.id_user', 'left')
        ->where('DATE(transaksi.tanggal) >=', date('Y-m-d', strtotime('-7 days')))
        ->orWhere('DATE(transaksi.created_at)', $today)
        ->orderBy('transaksi.id', 'DESC')
        ->findAll();

        foreach ($transaksiHariIni as &$t) {
            $t['jam'] = isset($t['created_at'])
                ? date('H:i', strtotime($t['created_at']))
                : date('H:i', strtotime($t['tanggal']));
            $t['tanggal_formatted'] = date('d/m/Y', strtotime($t['tanggal']));
            $t['operator'] = !empty($t['operator']) ? $t['operator'] : 'Tidak diketahui';
            $t['satuan'] = $t['satuan'] ?? 'pcs';
            
            $keterangan = $t['keterangan'] ?? '';
            $sewaId = null;
            if (preg_match('/penyewaan ID: (\d+)/', $keterangan, $matches)) {
                $sewaId = $matches[1];
                $sewa = $sewaModel->find($sewaId);
                $t['nama_penyewa'] = $sewa['nama_penyewa'] ?? null;
                $t['sewa_id'] = $sewaId;
            } else {
                $t['nama_penyewa'] = null;
                $t['sewa_id'] = null;
            }
        }
        $data['transaksiHariIni'] = $transaksiHariIni;
      
        // STOK RENDAH //
        $stokRendah = $barangModel
            ->where('stok <=', 10)
            ->orderBy('stok', 'ASC')
            ->findAll(5);

        foreach ($stokRendah as &$b) {
            $b['kode_barang'] = 'BRG-' . str_pad($b['id'], 3, '0', STR_PAD_LEFT);
        }
        $data['stokRendah'] = $stokRendah;

        // TOP OPERATOR //
        $topOperator = $transaksiModel
            ->select('COALESCE(users.email, "Unknown") as nama, COUNT(transaksi.id) as total')
            ->join('users', 'users.id = transaksi.id_user', 'left')
            ->groupBy('transaksi.id_user')
            ->orderBy('total', 'DESC')
            ->findAll(3);
        $data['topOperator'] = $topOperator;

        // BARANG KELUAR TERBARU (5 data) //
        $barangKeluarTerbaru = $transaksiModel
            ->select('transaksi.*, barang.nama_barang, barang.satuan, COALESCE(users.email, "System") as operator')
            ->join('barang', 'barang.id = transaksi.id_barang')
            ->join('users', 'users.id = transaksi.id_user', 'left')
            ->where('jenis_transaksi', 'keluar')
            ->orderBy('transaksi.id', 'DESC')
            ->limit(5)
            ->findAll();
            
        foreach ($barangKeluarTerbaru as &$bk) {
            $bk['tanggal_formatted'] = date('d/m/Y H:i', strtotime($bk['tanggal']));
        }
        $data['barangKeluarTerbaru'] = $barangKeluarTerbaru;

        // =============================
        // STATISTIK BULANAN UNTUK CHART
        // =============================
        $statistikBulanan = [];
        for ($i = 1; $i <= 12; $i++) {
            $pendapatan = $sewaModel
                ->selectSum('total_harga')
                ->where('MONTH(created_at)', $i)
                ->where('YEAR(created_at)', $currentYear)
                ->first();
            
            $transaksi = $transaksiModel
                ->where('MONTH(tanggal)', $i)
                ->where('YEAR(tanggal)', $currentYear)
                ->countAllResults();
            
            $statistikBulanan[$i] = [
                'bulan' => date('F', mktime(0, 0, 0, $i, 1)),
                'pendapatan' => $pendapatan['total_harga'] ?? 0,
                'transaksi' => $transaksi
            ];
        }
        $data['statistikBulanan'] = $statistikBulanan;

        $chartLabels = [];
        $chartPendapatan = [];
        $chartTransaksi = [];
        
        for ($i = 1; $i <= 12; $i++) {
            $chartLabels[] = date('M', mktime(0, 0, 0, $i, 1));
            $chartPendapatan[] = $statistikBulanan[$i]['pendapatan'];
            $chartTransaksi[] = $statistikBulanan[$i]['transaksi'];
        }
        
        $data['chartLabels']      = json_encode($chartLabels);
        $data['chartPendapatan']  = json_encode($chartPendapatan);
        $data['chartTransaksi']   = json_encode($chartTransaksi);
        $data['userName'] = session()->get('email');
        $data['title']    = 'Dashboard User';
        $data['userRole'] = session()->get('role') ?? 'User';

        // DEBUG: Cek jumlah transaksi
        log_message('debug', 'Jumlah transaksi hari ini: ' . count($transaksiHariIni));
        $data['debug_count'] = count($transaksiHariIni);

        return view('user/dashboard/index', $data);    
    }
}