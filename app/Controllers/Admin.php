<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Admin extends BaseController
{
    public function index()
    {
        $barangModel = new BarangModel();

        $data['totalBarang'] = $barangModel->countAll();
        $data['stokTotal'] = $barangModel->selectSum('stok')->first()['stok'];
        $data['barang'] = $barangModel->findAll();

        return view('admin/dashboard', $data);
    }
}
