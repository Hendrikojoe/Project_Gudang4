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
        $data = [
            'title' => 'Daftar Transaksi',
            'transaksi' => $this->transaksiModel->findAll(),
            'barang' => $this->barangModel->findAll()
        ];

        return view('admin/transaksi/index', $data);
    }

    public function create()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('admin/transaksi/create', $data);
    }

    public function masuk()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('admin/transaksi/create', $data);
    }

    public function keluar()
    {
        $data['barang'] = $this->barangModel->findAll();
        return view('admin/transaksi/create', $data);
    }

    public function edit($id)
    {
        $data = [
            'transaksi' => $this->transaksiModel->find($id),
            'barang' => $this->barangModel->findAll()
        ];

        return view('admin/transaksi/edit', $data);
    }
}