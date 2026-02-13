<?php

namespace App\Controllers;

use App\Models\BarangModel;
use App\Models\BarangKeluarModel;

class BarangKeluarController extends BaseController
{
    protected $barangModel;
    protected $barangKeluarModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
        $this->barangKeluarModel = new BarangKeluarModel();
    }

    public function index()
    {
        $data['transaksi'] = $this->barangKeluarModel
            ->select('barang_keluar.*, barang.nama_barang')
            ->join('barang', 'barang.id = barang_keluar.barang_id')
            ->findAll();

        return view('barangkeluar/index', $data);
    }

    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('barangkeluar/create', $data);
    }

    public function store()
    {
        $barangId = $this->request->getPost('barang_id');
        $jumlah = (int)$this->request->getPost('jumlah');

        $barang = $this->barangModel->find($barangId);

        if ($barang['stok'] < $jumlah) {
            return redirect()->back()->with('error', 'Stok tidak cukup');
        }

        $this->barangKeluarModel->insert([
            'barang_id' => $barangId,
            'jumlah' => $jumlah,
            'admin' => 'admin1',
            'tanggal' => date('Y-m-d')
        ]);

        $this->barangModel->update($barangId, [
            'stok' => $barang['stok'] - $jumlah
        ]);

        return redirect()->to('/barangkeluar');
    }
}