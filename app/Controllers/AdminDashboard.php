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
        // Hanya bisa diakses oleh admin
        if (!session()->get('isLoggedIn') || session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard');
        }

        $barangModel    = new BarangModel();
        $userModel      = new UserModel();
        $transaksiModel = new TransaksiModel();

        $today = date('Y-m-d');

        // Statistik Dashboard
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

        // Data tabel transaksi hari ini
        $transaksiHariIni = $transaksiModel
            ->select('transaksi.*, barang.nama_barang, user.nama as operator')
            ->join('barang', 'barang.id = transaksi.barang_id')
            ->join('user', 'user.id = transaksi.user_id', 'left')
            ->where('transaksi.tanggal', $today)
            ->orderBy('transaksi.jam', 'DESC')
            ->findAll();

        // Barang dengan stok menipis
        $stokRendah = $barangModel
            ->where('stok <=', 5)
            ->findAll();

        // Operator teraktif hari ini
        $topOperator = $transaksiModel
            ->select('user.nama, COUNT(transaksi.id) as total')
            ->join('user', 'user.id = transaksi.user_id')
            ->where('tanggal', $today)
            ->groupBy('user.nama')
            ->orderBy('total', 'DESC')
            ->findAll(5);

        $data = [
            'title'            => 'Dashboard Admin',
            'todayMasuk'       => $todayMasuk,
            'todayKeluar'      => $todayKeluar,
            'totalStok'        => $totalStok,
            'jumlahBarang'     => $jumlahBarang,
            'totalTransaksi'   => $totalTransaksi,
            'transaksiHariIni' => $transaksiHariIni,
            'stokRendah'       => $stokRendah,
            'topOperator'      => $topOperator,
            'totalUser'        => $userModel->countAll(),
        ];

        return view('admin/dashboard', $data);
    }
}
