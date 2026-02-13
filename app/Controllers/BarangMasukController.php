<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangMasukModel;

class BarangMasukController extends BaseController
{
    protected $barangModel;
    protected $barangMasukModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->barangMasukModel = new BarangMasukModel();
    }

    public function index()
    {
        $data['transaksi'] = $this->barangMasukModel
            ->select('barang_masuk.*, barang.nama_barang')
            ->join('barang', 'barang.id = barang_masuk.barang_id')
            ->findAll();

        return view('barangmasuk/index', $data);
    }

    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('barangmasuk/create', $data);
    }

    public function store()
    {
        $barangId = $this->request->getPost('barang_id');
        $jumlah = (int)$this->request->getPost('jumlah');

        // simpan transaksi
        $this->barangMasukModel->insert([
            'barang_id' => $barangId,
            'jumlah' => $jumlah,
            'admin' => 'admin1',
            'tanggal' => date('Y-m-d')
        ]);

        // update stok
        $barang = $this->barangModel->find($barangId);

        $this->barangModel->update($barangId, [
            'stok' => $barang['stok'] + $jumlah
        ]);

        return redirect()->to('/barangmasuk');
    }
}