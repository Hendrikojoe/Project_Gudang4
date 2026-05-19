<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use App\Models\SewaModel; // Tambahkan ini

class LaporanController extends BaseController
{
    protected $laporanModel;
    protected $sewaModel; // Tambahkan ini

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
        $this->sewaModel = new SewaModel(); // Tambahkan ini
    }

    private function getViewPath($viewName)
    {
        $role = session()->get('role');
        if ($role === 'admin') {
            return "admin/laporan/{$viewName}";
        }
        return "user/laporan/{$viewName}";
    }

    public function index()
    {
        $data['laporan'] = $this->laporanModel
            ->orderBy('created_at', 'DESC')
            ->findAll();
        
        $data['summary'] = $this->laporanModel->getSummary();
        
        $today = date('Y-m-d');
        $thisMonth = date('Y-m');
        
        $data['today_count'] = $this->laporanModel
            ->where('DATE(created_at)', $today)
            ->countAllResults();
            
        $data['month_count'] = $this->laporanModel
            ->where('DATE_FORMAT(created_at, "%Y-%m")', $thisMonth)
            ->countAllResults();

        $data['title'] = 'Laporan Penyewaan';

        return view($this->getViewPath('index'), $data);
    }

    public function detail($id)
    {
        $laporan = $this->laporanModel->find($id);

        if (!$laporan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Data laporan tidak ditemukan");
        }
        
        // **PERBAIKAN: Ambil data diskon dari tabel sewa jika ada sewa_id**
        if (!empty($laporan['sewa_id'])) {
            $sewa = $this->sewaModel->find($laporan['sewa_id']);
            if ($sewa) {
                $laporan['diskon'] = $sewa['diskon'] ?? 0;
                $laporan['diskon_persen'] = $sewa['diskon_persen'] ?? 0;
            } else {
                $laporan['diskon'] = 0;
                $laporan['diskon_persen'] = 0;
            }
        } else {
            // Cek apakah kolom diskon sudah ada di tabel laporan
            $laporan['diskon'] = $laporan['diskon'] ?? 0;
            $laporan['diskon_persen'] = $laporan['diskon_persen'] ?? 0;
        }
        
        // **PERBAIKAN: Hitung ulang total setelah diskon jika diperlukan**
        // Jika total_harga di laporan sudah termasuk diskon, biarkan saja
        // Tapi jika belum, hitung ulang
        if (($laporan['diskon'] ?? 0) > 0 && isset($laporan['total_harga'])) {
            // Asumsikan total_harga di database adalah total SEBELUM diskon
            // Maka kita hitung ulang total setelah diskon
            $totalSetelahDiskon = $laporan['total_harga'] - $laporan['diskon'];
            if ($totalSetelahDiskon < 0) $totalSetelahDiskon = 0;
            $laporan['total_setelah_diskon'] = $totalSetelahDiskon;
        } else {
            $laporan['total_setelah_diskon'] = $laporan['total_harga'] ?? 0;
        }
        
        $items = [];
        if (!empty($laporan['nama_barang'])) {
            $items = explode(', ', $laporan['nama_barang']);
        }

        // Decode JSON jika detail_json tersimpan sebagai JSON
        $detailItems = [];
        if (!empty($laporan['detail_json'])) {
            $detailItems = json_decode($laporan['detail_json'], true);
        }

        $data = [
            'title' => 'Detail Laporan Penyewaan',
            'laporan' => $laporan,
            'items' => $items,
            'detailItems' => $detailItems
        ];

        return view($this->getViewPath('detail'), $data);
    }

    public function print($id)
    {
        $laporan = $this->laporanModel->find($id);

        if (!$laporan) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
        
        // **PERBAIKAN: Ambil data diskon untuk print juga**
        if (!empty($laporan['sewa_id'])) {
            $sewa = $this->sewaModel->find($laporan['sewa_id']);
            if ($sewa) {
                $laporan['diskon'] = $sewa['diskon'] ?? 0;
                $laporan['diskon_persen'] = $sewa['diskon_persen'] ?? 0;
            }
        }

        $data = [
            'title' => 'Cetak Laporan Penyewaan',
            'laporan' => $laporan
        ];

        return view($this->getViewPath('print'), $data);
    }
    
    public function delete($id)
    {
        // Hanya admin yang boleh hapus laporan
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/laporan')->with('error', 'Akses ditolak! Hanya admin yang dapat menghapus laporan.');
        }

        $laporan = $this->laporanModel->find($id);
        
        if (!$laporan) {
            return redirect()->to('/laporan')->with('error', 'Data tidak ditemukan');
        }
        
        $this->laporanModel->delete($id);
        
        return redirect()->to('/laporan')->with('success', 'Laporan berhasil dihapus');
    }

    public function exportExcel()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/laporan')->with('error', 'Akses ditolak!');
        }

        $laporan = $this->laporanModel
            ->orderBy('created_at', 'DESC')
            ->findAll();
        
        return redirect()->to('/laporan')->with('success', 'Export Excel berhasil');
    }
}