<?php

namespace App\Controllers;

use App\Models\SewaModel;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use App\Models\LaporanModel;
use App\Models\TransaksiModel;
use Config\Database;

class Sewa extends BaseController
{
    protected $sewaModel;
    protected $transaksiModel;
    protected $barangModel;
    protected $kategoriModel;
    protected $laporanModel;
    protected $db;

    public function __construct()
    {
        $this->sewaModel = new SewaModel();
        $this->barangModel = new BarangModel();
        $this->kategoriModel = new KategoriModel();
        $this->laporanModel = new LaporanModel();
        $this->transaksiModel = new TransaksiModel();
        $this->db = Database::connect();
    }

    /**
     * FORM CREATE SEWA
     */
    public function create($id = null)
    {
        $barang = $this->barangModel->getBarangWithKategori();
        $kategori = $this->kategoriModel->findAll();

        $selected = null;
        if ($id) {
            $selected = $this->barangModel->find($id);
        }

        return view('admin/sewa/create', [
            'barang' => $barang,
            'kategori' => $kategori,
            'selected' => $selected
        ]);
    }

    /**
     * SIMPAN DATA SEWA (DENGAN DISKON)
     */
 /**
 * SIMPAN DATA SEWA
 */
/**
 * SIMPAN DATA SEWA
 */
public function store()
{
    $data = $this->request->getPost();

    if (!isset($data['detail_json']) || empty($data['detail_json'])) {
        return redirect()->back()->withInput()->with('error', 'Detail barang kosong!');
    }

    $detail = json_decode($data['detail_json'], true);

    if (!$detail || count($detail) === 0) {
        return redirect()->back()->withInput()->with('error', 'Detail barang kosong!');
    }

    if (empty($data['nama_penyewa'])) {
        return redirect()->back()->withInput()->with('error', 'Nama penyewa harus diisi!');
    }
    
    if (empty($data['checkin']) || empty($data['checkout'])) {
        return redirect()->back()->withInput()->with('error', 'Tanggal check in dan check out harus diisi!');
    }

    $checkin = new \DateTime($data['checkin']);
    $checkout = new \DateTime($data['checkout']);
    $durasi = $checkin->diff($checkout)->days;

    if ($durasi < 1) $durasi = 1;
    
    // HITUNG ULANG SEMUA SUBTOTAL DENGAN BENAR
    $totalKeseluruhan = 0;
    
    foreach ($detail as $i => $item) {
    if (!isset($item['kategori_sewa'])) {
        $detail[$i]['kategori_sewa'] = $data['kategori'] ?? 'harian';
    }
    
    $subtotalPerHari = $item['jumlah'] * $item['harga'];
    
    if ($detail[$i]['kategori_sewa'] == 'harian') {
        $detail[$i]['total'] = $subtotalPerHari * $durasi;
    } else {
        $detail[$i]['total'] = $subtotalPerHari;
    }

    $detail[$i]['subtotal_per_hari'] = $subtotalPerHari;
    $totalKeseluruhan += $detail[$i]['total'];
}
    
    // Validasi stok
    foreach ($detail as $item) {
        $barang = $this->barangModel->find($item['barang_id']);
        if (!$barang) {
            return redirect()->back()->withInput()->with('error', 'Barang tidak ditemukan!');
        }
        if ($barang['stok'] < $item['jumlah']) {
            return redirect()->back()->withInput()->with('error', 'Stok tidak mencukupi untuk ' . $barang['nama_barang']);
        }
    }

    $kategori = $data['kategori'] ?? 'harian';
    
    // Ambil diskon dari input
    $diskonNominal = floatval($data['diskon'] ?? 0);
    $diskonPersen = floatval($data['diskon_persen'] ?? 0);

    // Total sebelum diskon
    $totalSebelumDiskon = $totalKeseluruhan;

    // Kalau pakai persen, override nominal
    if ($diskonPersen > 0) {
        $diskonNominal = ($diskonPersen / 100) * $totalSebelumDiskon;
    }

    // Hitung total akhir
    $totalSetelahDiskon = $totalSebelumDiskon - $diskonNominal;

    // Biar nggak minus
    if ($totalSetelahDiskon < 0) {
        $totalSetelahDiskon = 0;
    }
    
    $userId = session()->get('id') ?? 1;

    try {
        $saveData = [
            'nama_penyewa' => $data['nama_penyewa'],
            'checkin' => $data['checkin'],
            'checkout' => $data['checkout'],
            'kategori' => $kategori,
            'total_harga' => $totalSetelahDiskon,
            'subtotal' => $totalKeseluruhan,
            'diskon' => $diskonNominal,
            'diskon_persen' => $diskonPersen,
            'lokasi' => $data['lokasi'] ?? '',
            'deskripsi' => $data['deskripsi'] ?? '',
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->sewaModel->insert($saveData);
        $sewaId = $this->sewaModel->getInsertID();

        if (!$sewaId) {
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data sewa!');
        }

        foreach ($detail as $item) {
            // Simpan detail dengan total yang sudah dihitung
            $detailData = [
                'sewa_id' => $sewaId,
                'barang_id' => (int)$item['barang_id'],
                'qty' => (int)$item['jumlah'],
                'harga' => (float)$item['harga'],
                'subtotal' => (float)$item['total'],
                'kategori_sewa' => $item['kategori_sewa'],
                'created_at' => date('Y-m-d H:i:s')
            ];
            
            $this->db->table('detail_sewa')->insert($detailData);

            $barang = $this->barangModel->find($item['barang_id']);
            if ($barang) {
                $stokBaru = $barang['stok'] - $item['jumlah'];
                $this->barangModel->update($item['barang_id'], ['stok' => $stokBaru]);
            }
        }

        log_activity('Menambahkan penyewaan baru - ID: #' . $sewaId . ' - Penyewa: ' . $data['nama_penyewa'] . ' - Total: Rp ' . number_format($totalSetelahDiskon, 0, ',', '.'));

        return redirect()->to('/sewa/success/' . $sewaId)->with('success', 'Penyewaan berhasil disimpan!');
        
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data penyewaan: ' . $e->getMessage());
    }
}
    
    /**
     * SUCCESS PAGE
     */
    public function success($id)
    {
        $sewa = $this->sewaModel->find($id);
        
        if (!$sewa) {
            return redirect()->to('/barang')->with('error', 'Data tidak ditemukan');
        }
        
        $items = $this->db->table('detail_sewa')
            ->select('detail_sewa.*, barang.nama_barang, kategori.nama as kategori')
            ->join('barang', 'barang.id = detail_sewa.barang_id')
            ->join('kategori', 'kategori.id = barang.kategori_id', 'left')
            ->where('detail_sewa.sewa_id', $id)
            ->get()
            ->getResultArray();
        
        // Hitung subtotal dari items
        $subtotal = 0;
        foreach ($items as $item) {
            $subtotal += $item['subtotal'];
        }
        
        $checkin = strtotime($sewa['checkin']);
        $checkout = strtotime($sewa['checkout']);
        $durasi = max(1, ($checkout - $checkin) / 86400);
        
        // Ambil data diskon dari database
        $diskon = $sewa['diskon'] ?? 0;
        $diskonPersen = $sewa['diskon_persen'] ?? 0;
        
        $grandTotalSebelumDiskon = $subtotal;
        
        $data = [
            'sewa' => [
                'id' => $sewa['id'],
                'nama_penyewa' => $sewa['nama_penyewa'],
                'total_harga' => $sewa['total_harga'],
                'checkin' => $sewa['checkin'] ?? date('Y-m-d'),
                'checkout' => $sewa['checkout'] ?? date('Y-m-d'),
                'kategori_sewa' => $sewa['kategori'] ?? 'harian',
                'lokasi' => $sewa['lokasi'] ?? '',
                'deskripsi' => $sewa['deskripsi'] ?? '',
                'durasi' => $durasi,
                'subtotal' => $subtotal,
                'grand_total' => $grandTotalSebelumDiskon,
                'diskon' => $diskon,
                'diskon_persen' => $diskonPersen,
                'items' => $items
            ],
            'title' => 'Success Penyewaan'
        ];
        
        return view('admin/sewa/success', $data);
    }
    
    /**
     * EDIT SEWA
     */
    public function edit($id)
    {
        $sewa = $this->sewaModel->find($id);
        
        if (!$sewa) {
            return redirect()->to('/barang')->with('error', 'Data tidak ditemukan');
        }
        
        $items = $this->db->table('detail_sewa')
            ->select('detail_sewa.*, barang.nama_barang, kategori.nama as kategori, barang.kategori_id')
            ->join('barang', 'barang.id = detail_sewa.barang_id')
            ->join('kategori', 'kategori.id = barang.kategori_id', 'left')
            ->where('detail_sewa.sewa_id', $id)
            ->get()
            ->getResultArray();
        
        return view('admin/sewa/edit', [
            'sewa' => $sewa,
            'items' => $items,
            'barang' => $this->barangModel->getBarangWithKategori(),
            'kategori' => $this->kategoriModel->findAll()
        ]);
    }

    /**
     * UPDATE DATA SEWA
     */
    public function update($id)
    {
        $rules = [
            'nama_penyewa' => 'required',
            'checkin' => 'required|valid_date',
            'checkout' => 'required|valid_date',
            'kategori' => 'required',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('error', $this->validator->getErrors());
        }

        $data = $this->request->getPost();
        
        $detailJson = $data['detail_json'] ?? null;
        
        if (!$detailJson) {
            return redirect()->back()->with('error', 'Detail barang kosong!');
        }
        
        $detail = json_decode($detailJson, true);
        
        if (!$detail || count($detail) === 0) {
            return redirect()->back()->with('error', 'Detail barang kosong!');
        }
        
        // Validasi stok
        $oldItems = $this->db->table('detail_sewa')
            ->where('sewa_id', $id)
            ->get()
            ->getResultArray();
        
        $stokChanges = [];
        foreach ($oldItems as $old) {
            $stokChanges[$old['barang_id']] = ($stokChanges[$old['barang_id']] ?? 0) + $old['qty'];
        }
        
        foreach ($detail as $new) {
            $stokChanges[$new['barang_id']] = ($stokChanges[$new['barang_id']] ?? 0) - $new['jumlah'];
        }
        
        foreach ($stokChanges as $barangId => $change) {
            if ($change > 0) {
                $barang = $this->barangModel->find($barangId);
                if ($barang && $barang['stok'] < $change) {
                    return redirect()->back()->with('error', 'Stok tidak mencukupi untuk ' . $barang['nama_barang']);
                }
            }
        }
        
        $grandTotal = 0;
        foreach ($detail as $item) {
            $grandTotal += $item['subtotal'];
        }
        
        $checkin = strtotime($data['checkin']);
        $checkout = strtotime($data['checkout']);
        $hari = max(1, ($checkout - $checkin) / 86400);
        
        if ($data['kategori'] == 'harian') {
            $total = $hari * $grandTotal;
        } else {
            $total = $grandTotal;
        }
        
        // Ambil data diskon dari form
        $diskonNominal = floatval($data['diskon'] ?? 0);
        $diskonPersen = floatval($data['diskon_persen'] ?? 0);
        $totalSetelahDiskon = $total - $diskonNominal;
        if ($totalSetelahDiskon < 0) $totalSetelahDiskon = 0;
        
        $updateData = [
            'nama_penyewa' => $data['nama_penyewa'],
            'deskripsi' => $data['deskripsi'] ?? '',
            'checkin' => $data['checkin'],
            'checkout' => $data['checkout'],
            'kategori' => $data['kategori'],
            'total_harga' => $totalSetelahDiskon,
            'subtotal' => $total,
            'diskon' => $diskonNominal,
            'diskon_persen' => $diskonPersen,
            'lokasi' => $data['lokasi'] ?? ''
        ];
        
        $userId = session()->get('id') ?? 1;
        
        $this->db->transStart();
        
        $this->sewaModel->update($id, $updateData);
        
        // PERBAIKAN 1: Query delete transaksi yang benar
        $this->transaksiModel
            ->like('keterangan', 'penyewaan ID: ' . $id)
            ->delete();
        
        $oldItems = $this->db->table('detail_sewa')
            ->where('sewa_id', $id)
            ->get()
            ->getResultArray();
            
        foreach ($oldItems as $old) {
            $barang = $this->barangModel->find($old['barang_id']);
            if ($barang) {
                $stokBaru = $barang['stok'] + $old['qty'];
                $this->barangModel->update($old['barang_id'], ['stok' => $stokBaru]);
            }
        }
        
        $this->db->table('detail_sewa')->where('sewa_id', $id)->delete();
        
        // PERBAIKAN 2: Cast tipe data saat insert detail
        foreach ($detail as $item) {
            $this->db->table('detail_sewa')->insert([
                'sewa_id' => (int)$id,
                'barang_id' => (int)$item['barang_id'],
                'qty' => (int)$item['jumlah'],
                'harga' => (float)$item['harga'],
                'subtotal' => (float)$item['subtotal'],
                'kategori_sewa' => $item['kategori_sewa'],
                'created_at' => date('Y-m-d H:i:s')
            ]);
            
            $barang = $this->barangModel->find($item['barang_id']);
            if ($barang) {
                $stokBaru = $barang['stok'] - $item['jumlah'];
                $this->barangModel->update($item['barang_id'], ['stok' => $stokBaru]);
                
                $this->db->table('transaksi')->insert([
                    'id_barang' => (int)$item['barang_id'],
                    'jumlah' => (int)$item['jumlah'],
                    'jenis_transaksi' => 'keluar',
                    'tanggal' => date('Y-m-d'), // FIX
                    'id_user' => (int)$userId,
                    'keterangan' => 'Transaksi dari penyewaan ID: ' . $id
                ]);
            }
        }

        $this->db->transComplete();
        
        if ($this->db->transStatus() === false) {
            return redirect()->back()->with('error', 'Gagal mengupdate data penyewaan!');
        }

        return redirect()->to('/sewa/success/' . $id)
            ->with('success', 'Data berhasil diupdate');
    }
    
    /**
     * DELETE SEWA
     */
    public function delete($id)
    {
        $this->db->transStart();
        
        // PERBAIKAN 1 juga diterapkan di delete
        $this->transaksiModel
            ->like('keterangan', 'penyewaan ID: ' . $id)
            ->delete();
        
        $items = $this->db->table('detail_sewa')
            ->where('sewa_id', $id)
            ->get()
            ->getResultArray();
            
        foreach ($items as $item) {
            $barang = $this->barangModel->find($item['barang_id']);
            if ($barang) {
                $stokBaru = $barang['stok'] + $item['qty'];
                $this->barangModel->update($item['barang_id'], ['stok' => $stokBaru]);
            }
        }
        
        $this->db->table('detail_sewa')->where('sewa_id', $id)->delete();
        $this->sewaModel->delete($id);
        $this->laporanModel->where('sewa_id', $id)->delete();
        
        $this->db->transComplete();
        
        if ($this->db->transStatus() === false) {
            return redirect()->back()->with('error', 'Gagal menghapus data penyewaan!');
        }

        return redirect()->to('/barang')
            ->with('success', 'Data berhasil dihapus');
    }

    /**
     * SIMPAN LAPORAN
     */
    public function simpanLaporan($id)
    {
        $sewa = $this->sewaModel->find($id);

        if (!$sewa) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }
        
        $items = $this->db->table('detail_sewa')
            ->select('detail_sewa.*, barang.nama_barang, kategori.nama as kategori_barang')
            ->join('barang', 'barang.id = detail_sewa.barang_id')
            ->join('kategori', 'kategori.id = barang.kategori_id', 'left')
            ->where('detail_sewa.sewa_id', $id)
            ->get()
            ->getResultArray();

        $cek = $this->laporanModel->where('sewa_id', $id)->first();
        if ($cek) {
            return redirect()->back()->with('info', 'Data penyewaan ini sudah masuk laporan');
        }
        
        $detailJson = [];
        foreach ($items as $item) {
            $detailJson[] = [
                'barang_id' => $item['barang_id'] ?? null,
                'nama_barang' => $item['nama_barang'] ?? '-',
                'kategori' => $item['kategori_barang'] ?? $item['kategori'] ?? '-',
                'kategori_sewa' => $item['kategori_sewa'] ?? $sewa['kategori'] ?? 'harian',
                'qty' => $item['qty'] ?? $item['qty'] ?? 0,
                'harga' => $item['harga'] ?? 0,
                'subtotal' => $item['subtotal'] ?? 0
            ];
        }
        
        $laporanData = [
            'sewa_id' => $sewa['id'],
            'nama_penyewa' => $sewa['nama_penyewa'],
            'detail_json' => json_encode($detailJson), 
            'deskripsi' => $sewa['deskripsi'] ?? 'Sewa barang',
            'checkin' => $sewa['checkin'],
            'checkout' => $sewa['checkout'],
            'kategori' => $sewa['kategori'],
            'total_harga' => $sewa['total_harga'],
            'lokasi' => $sewa['lokasi'] ?? '',
            'created_at' => date('Y-m-d H:i:s')
        ];
        
        try {
            $this->laporanModel->insert($laporanData);
            session()->setFlashdata('success', 'Data berhasil disimpan ke laporan');
            return redirect()->to('/laporan');
        } catch (\Exception $e) {
            session()->setFlashdata('error', 'Gagal menyimpan ke laporan: ' . $e->getMessage());
            return redirect()->back();
        }
    }
}