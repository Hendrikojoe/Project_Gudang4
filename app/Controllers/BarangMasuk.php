<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Controller;

class BarangMasuk extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Barang Masuk',
            'barang' => $this->barangModel->findAll()
        ];
        return view('barangmasuk/index', $data);
    }

   public function create()
{
    // ambil semua data barang dari tabel 'barang'
    $data = [
        'title' => 'Tambah Barang Masuk',
        'barang' => $this->barangModel->findAll()
    ];

    return view('barangmasuk/create', $data);
}


    public function store()
    {
        // sementara belum ada tabel transaksi, contoh logikanya begini
        return redirect()->to('/barangmasuk')->with('success', 'Barang masuk berhasil disimpan!');
    }

    public function delete($id)
    {
        // contoh aja
        return redirect()->to('/barangmasuk')->with('success', 'Data dihapus!');
    }
}
