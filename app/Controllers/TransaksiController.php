<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\BarangModel;

class TransaksiController extends BaseController
{
    protected $transaksiModel;
    protected $barangModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        // Hitung statistik
        $totalMasuk = $this->transaksiModel
            ->selectSum('jumlah')
            ->where('jenis_transaksi', 'masuk')
            ->first()['jumlah'] ?? 0;
        
        $totalKeluar = $this->transaksiModel
            ->selectSum('jumlah')
            ->where('jenis_transaksi', 'keluar')
            ->first()['jumlah'] ?? 0;
        
        $data = [
            'title' => 'Daftar Transaksi',
            'transaksi' => $this->transaksiModel
                ->select('transaksi.*, barang.nama_barang')
                ->join('barang', 'barang.id = transaksi.id_barang', 'left')
                ->orderBy('transaksi.id', 'DESC')
                ->paginate(20),
            'pager' => $this->transaksiModel->pager,
            'totalTransaksi' => $this->transaksiModel->countAll(),
            'totalMasuk' => $totalMasuk,
            'totalKeluar' => $totalKeluar,
            'totalItemTerjual' => $totalKeluar
        ];

        // PERBAIKAN: tambahkan 'admin/' karena file ada di folder admin
        return view('admin/transaksi/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Transaksi',
            'barang' => $this->barangModel->findAll(),
            'jenis' => $this->request->getGet('jenis') ?? 'masuk'
        ];
        // PERBAIKAN: tambahkan 'admin/'
        return view('admin/transaksi/create', $data);
    }

    public function store()
    {
        $rules = [
            'id_barang' => 'required|numeric',
            'jumlah' => 'required|numeric|greater_than[0]',
            'tanggal' => 'required|valid_date',
            'jenis_transaksi' => 'required|in_list[masuk,keluar]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $idBarang = $this->request->getPost('id_barang');
        $jumlah   = $this->request->getPost('jumlah');
        $tanggal  = $this->request->getPost('tanggal');
        $jenis    = $this->request->getPost('jenis_transaksi');

        $barang = $this->barangModel->find($idBarang);
        
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan!');
        }

        // Cek stok untuk transaksi keluar
        if ($jenis == 'keluar' && $barang['stok'] < $jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . $barang['stok']);
        }

        // Update stok
        if ($jenis == 'masuk') {
            $stokBaru = $barang['stok'] + $jumlah;
        } else {
            $stokBaru = $barang['stok'] - $jumlah;
        }

        $this->barangModel->update($idBarang, ['stok' => $stokBaru]);

        $userId = session()->get('user_id');
        if (!$userId) {
            return redirect()->to('/login')->with('error', 'Silakan login terlebih dahulu!');
        }

        $this->transaksiModel->insert([
            'id_barang'       => $idBarang,
            'jumlah'          => $jumlah,
            'tanggal'         => $tanggal,
            'jenis_transaksi' => $jenis,
            'id_user'         => $userId,
            'created_at'      => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil ditambahkan!');
    }

    public function masuk()
    {
        $data = [
            'title' => 'Transaksi Barang Masuk',
            'barang' => $this->barangModel->findAll(),
            'jenis' => 'masuk'
        ];
        // PERBAIKAN: tambahkan 'admin/'
        return view('admin/transaksi/create', $data);
    }

    public function keluar()
    {
        $data = [
            'title' => 'Transaksi Barang Keluar',
            'barang' => $this->barangModel->findAll(),
            'jenis' => 'keluar'
        ];
        // PERBAIKAN: tambahkan 'admin/'
        return view('admin/transaksi/create', $data);
    }

    public function detail($id)
    {
        $transaksi = $this->transaksiModel
            ->select('transaksi.*, barang.nama_barang, barang.kode_barang, barang.satuan')
            ->join('barang', 'barang.id = transaksi.id_barang')
            ->where('transaksi.id', $id)
            ->first();

        if (!$transaksi) {
            return redirect()->to('/transaksi')->with('error', 'Transaksi tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Transaksi',
            'transaksi' => $transaksi
        ];

        // PERBAIKAN: tambahkan 'admin/'
        return view('admin/transaksi/detail', $data);
    }

    public function edit($id)
    {
        $transaksi = $this->transaksiModel->find($id);
        
        if (!$transaksi) {
            return redirect()->to('/transaksi')->with('error', 'Transaksi tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Transaksi',
            'transaksi' => $transaksi,
            'barang' => $this->barangModel->findAll()
        ];

        // PERBAIKAN: tambahkan 'admin/'
        return view('admin/transaksi/edit', $data);
    }

    public function update($id)
    {
        $rules = [
            'id_barang' => 'required|numeric',
            'jumlah' => 'required|numeric|greater_than[0]',
            'tanggal' => 'required|valid_date',
            'jenis_transaksi' => 'required|in_list[masuk,keluar]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $transaksiLama = $this->transaksiModel->find($id);
        
        if (!$transaksiLama) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        $idBarang = $this->request->getPost('id_barang');
        $jumlah   = $this->request->getPost('jumlah');
        $tanggal  = $this->request->getPost('tanggal');
        $jenis    = $this->request->getPost('jenis_transaksi');

        $barang = $this->barangModel->find($idBarang);
        
        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        // Kembalikan stok ke kondisi sebelum transaksi
        if ($transaksiLama['jenis_transaksi'] == 'masuk') {
            $stokSebelum = $barang['stok'] - $transaksiLama['jumlah'];
        } else {
            $stokSebelum = $barang['stok'] + $transaksiLama['jumlah'];
        }

        // Hitung stok baru berdasarkan transaksi yang diedit
        if ($jenis == 'masuk') {
            $stokBaru = $stokSebelum + $jumlah;
        } else {
            $stokBaru = $stokSebelum - $jumlah;
        }

        // Cek stok untuk transaksi keluar
        if ($jenis == 'keluar' && $stokBaru < 0) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        // Update stok barang
        $this->barangModel->update($idBarang, ['stok' => $stokBaru]);

        // Update transaksi
        $this->transaksiModel->update($id, [
            'id_barang'       => $idBarang,
            'jumlah'          => $jumlah,
            'tanggal'         => $tanggal,
            'jenis_transaksi' => $jenis,
            'updated_at'      => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil diupdate!');
    }

    public function delete($id)
    {
        $transaksi = $this->transaksiModel->find($id);
        
        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        // Kembalikan stok
        $barang = $this->barangModel->find($transaksi['id_barang']);
        if ($barang) {
            if ($transaksi['jenis_transaksi'] == 'masuk') {
                $stokBaru = $barang['stok'] - $transaksi['jumlah'];
            } else {
                $stokBaru = $barang['stok'] + $transaksi['jumlah'];
            }
            $this->barangModel->update($transaksi['id_barang'], ['stok' => $stokBaru]);
        }

        $this->transaksiModel->delete($id);

        return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil dihapus');
    }

    public function exportPdf()
    {
        // Implement PDF export if needed
        return redirect()->back()->with('info', 'Fitur export PDF sedang dalam pengembangan');
    }
}