<?php

namespace App\Controllers;

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
        $data = [
            'title' => 'Daftar Transaksi',
            'transaksi' => $this->transaksiModel->findAll(),
            'barang' => $this->barangModel->findAll()
        ];
        return view('transaksi/index', $data);
    }

    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('transaksi/create', $data);
    }

    public function store()
    {
        $this->transaksiModel->insert([
            'id_barang' => $this->request->getPost('id_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
        ]);
        return redirect()->to('/transaksi');
    }

    public function edit($id)
    {
        $data = [
            'transaksi' => $this->transaksiModel->find($id),
            'barang' => $this->barangModel->findAll()
        ];
        return view('transaksi/edit', $data);
    }

    public function update($id)
    {
        $this->transaksiModel->update($id, [
            'id_barang' => $this->request->getPost('id_barang'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->request->getPost('tanggal'),
        ]);
        return redirect()->to('/transaksi');
    }

    public function delete($id)
    {
        $this->transaksiModel->delete($id);
        return redirect()->to('/transaksi');
    }
}