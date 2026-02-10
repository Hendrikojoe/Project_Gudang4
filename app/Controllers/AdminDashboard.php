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

        $barangModel     = new BarangModel();
        $userModel       = new UserModel();
        $transaksiModel  = new TransaksiModel();

        $today = date('Y-m-d');

        // Statistik dashboard
        $todayMasuk = $transaksiModel
            ->where('tanggal', $today)
            ->where('jenis_transaksi', 'masuk')
            ->countAllResults();

        $todayKeluar = $transaksiModel
            ->where('tanggal', $today)
            ->where('jenis_transaksi', 'keluar')
            ->countAllResults();

        $totalStok = $barangModel
            ->selectSum('stok')
            ->first()['stok'] ?? 0;

        $jumlahBarang = $barangModel->countAll();

        $totalTransaksi = $transaksiModel->countAll();

        $transaksiHariIni = $transaksiModel
            ->where('tanggal', $today)
            ->findAll();

        $stokRendah = $barangModel
            ->where('stok <=', 5)
            ->findAll();

        // Dummy data supaya view tidak error
        $topOperator = [
            ['nama' => 'Admin', 'total' => 5],
            ['nama' => 'Operator', 'total' => 3],
        ];

        $data = [
            'totalBarang'      => $jumlahBarang,
            'stokTotal'        => $totalStok,
            'totalUser'        => $userModel->countAll(),
            'todayMasuk'       => $todayMasuk,
            'todayKeluar'      => $todayKeluar,
            'totalStok'        => $totalStok,
            'jumlahBarang'     => $jumlahBarang,
            'totalTransaksi'   => $totalTransaksi,
            'transaksiHariIni' => $transaksiHariIni,
            'stokRendah'       => $stokRendah,
            'topOperator'      => $topOperator,
        ];

        return view('admin/dashboard', $data);
    }
}