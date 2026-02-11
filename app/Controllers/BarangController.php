<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\TransaksiModel;

class BarangController extends BaseController
{
    // Menampilkan semua data barang
    public function index()
    {
        $barangModel = new BarangModel();
        $transaksiModel = new TransaksiModel();

        $barang = $barangModel->findAll();

        // Tambahkan data total masuk & keluar per barang
        foreach ($barang as &$b) {
            $b['total_masuk'] = $transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'masuk')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;

            $b['total_keluar'] = $transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'keluar')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;
        }

        $totalMasuk = $transaksiModel->where('jenis_transaksi', 'masuk')->selectSum('jumlah')->first()['jumlah'] ?? 0;
        $totalKeluar = $transaksiModel->where('jenis_transaksi', 'keluar')->selectSum('jumlah')->first()['jumlah'] ?? 0;

        $data = [
            'barang' => $barang,
            'totalMasuk' => $totalMasuk,
            'totalKeluar' => $totalKeluar
        ];

        return view('barang/index', $data);
    }

    // Form tambah barang
    public function create()
    {
        return view('barang/create');
    }

    // Simpan barang baru
    public function store()
    {
        $barangModel = new BarangModel();
        $barangModel->insert([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang')->with('success', 'Barang baru berhasil ditambahkan!');
    }

    // Barang masuk
    public function masuk($id)
    {
        $transaksiModel = new TransaksiModel();
        $barangModel = new BarangModel();

        $jumlah = $this->request->getPost('jumlah');

        $transaksiModel->insert([
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'tanggal' => date('Y-m-d'),
            'jenis_transaksi' => 'masuk'
        ]);

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
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'tanggal' => date('Y-m-d'),
            'jenis_transaksi' => 'keluar'
        ]);

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
        }

        return view('barang/edit', ['barang' => $barang]);
    }

    public function update($id)
    {
        $barangModel = new BarangModel();
        $barangModel->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang')->with('success', 'Barang berhasil diperbarui!');
    }

    public function delete($id)
    {
        $barangModel = new BarangModel();
        $barangModel->delete($id);

        return redirect()->to('/barang')->with('success', 'Barang berhasil dihapus!');
    }
}
