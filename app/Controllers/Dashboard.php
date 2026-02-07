<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // Data untuk dashboard
        $data = [
            'title' => 'Dashboard Gudang',
            'userName' => session()->get('name') ?? 'Admin',
            
            // Statistik
            'todayMasuk' => 15,
            'todayKeluar' => 8,
            'totalStok' => 1245,
            'jumlahBarang' => 48,
            'totalTransaksi' => 23,
            
            // Transaksi hari ini
            'transaksiHariIni' => [
                [
                    'id' => 'TRX001',
                    'tanggal' => '2024-01-15',
                    'jam' => '08:30',
                    'jenis_transaksi' => 'masuk',
                    'nama_barang' => 'Laptop Dell XPS',
                    'jumlah' => 10,
                    'operator' => 'Budi Santoso',
                    'status' => 'selesai'
                ],
                [
                    'id' => 'TRX002',
                    'tanggal' => '2024-01-15',
                    'jam' => '10:15',
                    'jenis_transaksi' => 'keluar',
                    'nama_barang' => 'Printer Epson',
                    'jumlah' => 3,
                    'operator' => 'Siti Aminah',
                    'status' => 'selesai'
                ],
                [
                    'id' => 'TRX003',
                    'tanggal' => '2024-01-15',
                    'jam' => '13:45',
                    'jenis_transaksi' => 'masuk',
                    'nama_barang' => 'Monitor Samsung 24"',
                    'jumlah' => 25,
                    'operator' => 'Ahmad Rizki',
                    'status' => 'selesai'
                ],
                [
                    'id' => 'TRX004',
                    'tanggal' => '2024-01-15',
                    'jam' => '15:20',
                    'jenis_transaksi' => 'keluar',
                    'nama_barang' => 'Keyboard Mechanical',
                    'jumlah' => 8,
                    'operator' => 'Budi Santoso',
                    'status' => 'pending'
                ],
            ],
            
            // Stok rendah
            'stokRendah' => [
                ['nama_barang' => 'Mouse Wireless', 'kode_barang' => 'BRG-001', 'stok' => 5],
                ['nama_barang' => 'Toner Printer', 'kode_barang' => 'BRG-002', 'stok' => 3],
                ['nama_barang' => 'Kabel HDMI', 'kode_barang' => 'BRG-003', 'stok' => 7],
            ],
            
            // Top operator
            'topOperator' => [
                ['nama' => 'Budi Santoso', 'total' => 12],
                ['nama' => 'Siti Aminah', 'total' => 8],
                ['nama' => 'Ahmad Rizki', 'total' => 6],
            ]
        ];
        
        return view('admin/dashboard', $data);
    }
    
    public function admin()
    {
        // Redirect ke dashboard
        return redirect()->to('/dashboard');
    }
}