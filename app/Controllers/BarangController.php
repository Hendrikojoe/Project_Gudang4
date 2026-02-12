<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\TransaksiModel;

class BarangController extends BaseController
{
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
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'masuk')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;

            $b['total_keluar'] = $this->transaksiModel
                ->where('id_barang', $b['id'])
                ->where('jenis_transaksi', 'keluar')
                ->selectSum('jumlah')
                ->first()['jumlah'] ?? 0;
        }

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
        ];

        return view('barang/index', $data);
    }

    public function create()
    {
        return view('barang/create');
    }

    public function store()
    {
        $this->barangModel->insert([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang')
            ->with('success', 'Barang berhasil ditambahkan!');
    }

    public function masuk($id)
    {
        $jumlah = $this->request->getPost('jumlah');
        $barang = $this->barangModel->find($id);

        $this->transaksiModel->insert([
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'tanggal' => date('Y-m-d'),
            'jenis_transaksi' => 'masuk'
        ]);

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
            'id_barang' => $id,
            'jumlah' => $jumlah,
            'tanggal' => date('Y-m-d'),
            'jenis_transaksi' => 'keluar'
        ]);

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
        }

        return view('barang/edit', ['barang' => $barang]);
    }

    public function update($id)
    {
        $this->barangModel->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang')
            ->with('success', 'Barang berhasil diperbarui!');
    }

    public function delete($id)
    {
        $this->barangModel->delete($id);

        return redirect()->to('/barang')
            ->with('success', 'Barang berhasil dihapus!');
    }
}
