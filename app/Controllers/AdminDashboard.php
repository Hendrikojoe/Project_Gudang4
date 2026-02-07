<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\UserModel;
use App\Models\TransaksiModel;

class AdminDashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $barangModel    = new BarangModel();
        $userModel      = new UserModel();

        $data = [
            'totalBarang' => $barangModel->countAll(),
            'stokTotal'   => $barangModel->selectSum('stok', 'total_stok')->first()['total_stok'],
            'totalUser'   => $userModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }
}