<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\TransaksiModel;

class BarangController extends BaseController
{
<<<<<<< HEAD
    // Menampilkan semua data barang
    public function index()
    {
        $barangModel = new BarangModel();
        $transaksiModel = new TransaksiModel();

        $barang = $barangModel->findAll();

        // Tambahkan data total masuk & keluar per barang
        foreach ($barang as &$b) {
            $b['total_masuk'] = $transaksiModel
=======
    protected $barangModel;
    protected $transaksiModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->transaksiModel = new TransaksiModel();
    }

    public function index()
    {
        $barang = $this->barangModel->findAll();

        foreach ($barang as &$b) {
            $b['total_masuk'] = $this->transaksiModel
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'masuk')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;

<<<<<<< HEAD
            $b['total_keluar'] = $transaksiModel
=======
            $b['total_keluar'] = $this->transaksiModel
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'keluar')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;
        }

<<<<<<< HEAD
        $totalMasuk = $transaksiModel->where('jenis_transaksi', 'masuk')->selectSum('jumlah')->first()['jumlah'] ?? 0;
        $totalKeluar = $transaksiModel->where('jenis_transaksi', 'keluar')->selectSum('jumlah')->first()['jumlah'] ?? 0;

        $data = [
            'barang' => $barang,
            'totalMasuk' => $totalMasuk,
            'totalKeluar' => $totalKeluar
=======
        $data = [
            'barang' => $barang,
            'totalMasuk' => $this->transaksiModel
                ->where('jenis_transaksi', 'masuk')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0,
            'totalKeluar' => $this->transaksiModel
                ->where('jenis_transaksi', 'keluar')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
        ];

        return view('barang/index', $data);
    }

<<<<<<< HEAD
    // Form tambah barang
=======
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
    public function create()
    {
        return view('barang/create');
    }

<<<<<<< HEAD
    // Simpan barang baru
    public function store()
    {
        $barangModel = new BarangModel();
        $barangModel->insert([
=======
    public function store()
    {
        $this->barangModel->insert([
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok')
        ]);

<<<<<<< HEAD
        return redirect()->to('/barang')->with('success', 'Barang baru berhasil ditambahkan!');
    }

    // Barang masuk
    public function masuk($id)
    {
        $transaksiModel = new TransaksiModel();
        $barangModel = new BarangModel();

        $jumlah = $this->request->getPost('jumlah');

        $transaksiModel->insert([
=======
        return redirect()->to('/barang')
            ->with('success', 'Barang berhasil ditambahkan!');
    }

    public function masuk($id)
    {
        $jumlah = $this->request->getPost('jumlah');
        $barang = $this->barangModel->find($id);

        $this->transaksiModel->insert([
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'tanggal' => date('Y-m-d'),
            'jenis_transaksi' => 'masuk'
        ]);

<<<<<<< HEAD
        // update stok
        $barang = $barangModel->find($id);
        $barangModel->update($id, ['stok' => $barang['stok'] + $jumlah]);

        return redirect()->to('/barang')->with('success', 'Barang masuk berhasil ditambahkan.');
    }

    // Barang keluar
    public function keluar($id)
    {
        $transaksiModel = new TransaksiModel();
        $barangModel = new BarangModel();

        $jumlah = $this->request->getPost('jumlah');

        $barang = $barangModel->find($id);

        if ($barang['stok'] < $jumlah) {
            return redirect()->to('/barang')->with('error', 'Stok tidak mencukupi!');
        }

        $transaksiModel->insert([
=======
        $this->barangModel->update($id, [
            'stok' => $barang['stok'] + $jumlah
        ]);

        return redirect()->to('/barang')
            ->with('success', 'Barang masuk berhasil ditambahkan.');
    }

    public function keluar($id)
    {
        $jumlah = $this->request->getPost('jumlah');
        $barang = $this->barangModel->find($id);

        if ($barang['stok'] < $jumlah) {
            return redirect()->to('/barang')
                ->with('error', 'Stok tidak mencukupi!');
        }

        $this->transaksiModel->insert([
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'tanggal' => date('Y-m-d'),
            'jenis_transaksi' => 'keluar'
        ]);

<<<<<<< HEAD
        $barangModel->update($id, ['stok' => $barang['stok'] - $jumlah]);

        return redirect()->to('/barang')->with('success', 'Barang keluar berhasil dicatat.');
    }

    // Edit & Update barang
    public function edit($id)
    {
        $barangModel = new BarangModel();
        $barang = $barangModel->find($id);

        if (!$barang) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Barang dengan ID $id tidak ditemukan.");
=======
        $this->barangModel->update($id, [
            'stok' => $barang['stok'] - $jumlah
        ]);

        return redirect()->to('/barang')
            ->with('success', 'Barang keluar berhasil dicatat.');
    }

    public function edit($id)
    {
        $barang = $this->barangModel->find($id);

        if (!$barang) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(
                "Barang dengan ID $id tidak ditemukan."
            );
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
        }

        return view('barang/edit', ['barang' => $barang]);
    }

    public function update($id)
    {
<<<<<<< HEAD
        $barangModel = new BarangModel();
        $barangModel->update($id, [
=======
        $this->barangModel->update($id, [
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok')
        ]);

<<<<<<< HEAD
        return redirect()->to('/barang')->with('success', 'Barang berhasil diperbarui!');
=======
        return redirect()->to('/barang')
            ->with('success', 'Barang berhasil diperbarui!');
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
    }

    public function delete($id)
    {
<<<<<<< HEAD
        $barangModel = new BarangModel();
        $barangModel->delete($id);

        return redirect()->to('/barang')->with('success', 'Barang berhasil dihapus!');
=======
        $this->barangModel->delete($id);

        return redirect()->to('/barang')
            ->with('success', 'Barang berhasil dihapus!');
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
    }
}
