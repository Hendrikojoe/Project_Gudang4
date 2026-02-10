<?php

namespace App\Controllers;

use App\Models\BarangModel;
use CodeIgniter\Controller;

class BarangKeluar extends BaseController
{
    protected $barangModel;

    public function __construct()
    {
        $this->barangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Barang Keluar',
            'barang' => $this->barangModel->findAll()
        ];
        return view('barangkeluar/index', $data);
    }

    public function create()
    {
        $data['title'] = 'Tambah Barang Keluar';
        return view('barangkeluar/create', $data);
    }

    public function store()
    {
        return redirect()->to('/barangkeluar')->with('success', 'Barang keluar berhasil disimpan!');
    }

    public function delete($id)
    {
        return redirect()->to('/barangkeluar')->with('success', 'Data dihapus!');
    }
}
