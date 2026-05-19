<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TransaksiModel;
use App\Models\BarangModel;

class BarangKeluarController extends BaseController
{
    protected $transaksiModel;
    protected $barangModel;

    public function __construct()
    {
        $this->transaksiModel = new TransaksiModel();
        $this->barangModel = new BarangModel();
    }

    private function getViewPath($viewName)
    {
        $role = session()->get('role');
        if ($role === 'admin') {
            return "admin/barangkeluar/{$viewName}";
        }
        return "user/barangkeluar/{$viewName}";
    }

    public function index()
    {
        $transaksi = $this->transaksiModel
            ->select('transaksi.*, barang.nama_barang, barang.satuan, users.email as operator')
            ->join('barang', 'barang.id = transaksi.id_barang')
            ->join('users', 'users.id = transaksi.id_user', 'left')
            ->where('transaksi.jenis_transaksi', 'keluar')
            ->orderBy('transaksi.id', 'DESC')
            ->findAll();

        foreach ($transaksi as &$t) {
            $t['tanggal_formatted'] = date('d/m/Y', strtotime($t['tanggal']));
            $t['jam'] = date('H:i', strtotime($t['tanggal']));
        }

        $data = [
            'title' => 'Barang Keluar',
            'transaksi' => $transaksi,
            'totalTransaksi' => count($transaksi)
        ];

        return view($this->getViewPath('index'), $data);
    }

    public function create()
    {
        $barang = $this->barangModel->findAll();

        $data = [
            'title' => 'Tambah Barang Keluar',
            'barang' => $barang
        ];

        return view($this->getViewPath('create'), $data);
    }

    public function store()
    {
        $rules = [
            'id_barang' => 'required|numeric',
            'jumlah' => 'required|numeric|greater_than[0]',
            'tanggal' => 'required|valid_date'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $id_barang = $this->request->getPost('id_barang');
        $jumlah = $this->request->getPost('jumlah');
        $tanggal = $this->request->getPost('tanggal');

        $barang = $this->barangModel->find($id_barang);
        if (!$barang || $barang['stok'] < $jumlah) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi! Stok tersedia: ' . ($barang['stok'] ?? 0));
        }

        $db = \Config\Database::connect();
        $db->transStart();

        $this->barangModel->kurangiStok($id_barang, $jumlah);

        $this->transaksiModel->save([
            'id_barang' => $id_barang,
            'jumlah' => $jumlah,
            'jenis_transaksi' => 'keluar',
            'id_user' => session()->get('id'),
            'tanggal' => $tanggal . ' ' . date('H:i:s'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Gagal menyimpan transaksi barang keluar');
        }

        session()->setFlashdata('success', 'Barang keluar berhasil dicatat');
        return redirect()->to('/barang/keluar');
    }

    public function detail($id)
    {
        $transaksi = $this->transaksiModel
            ->select('transaksi.*, barang.nama_barang, barang.satuan, users.email as operator')
            ->join('barang', 'barang.id = transaksi.id_barang')
            ->join('users', 'users.id = transaksi.id_user', 'left')
            ->where('transaksi.id', $id)
            ->first();

        if (!$transaksi) {
            return redirect()->to('/barang/keluar')->with('error', 'Transaksi tidak ditemukan');
        }

        $data = [
            'title' => 'Detail Barang Keluar',
            'transaksi' => $transaksi
        ];

        return view($this->getViewPath('detail'), $data);
    }

    public function delete($id)
    {
        $transaksi = $this->transaksiModel->find($id);
        
        if (!$transaksi) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan');
        }

        if ($transaksi['jenis_transaksi'] !== 'keluar') {
            return redirect()->back()->with('error', 'Transaksi bukan barang keluar');
        }

        $db = \Config\Database::connect();
        $db->transStart();

        $this->barangModel->tambahStok($transaksi['id_barang'], $transaksi['jumlah']);

        $this->transaksiModel->delete($id);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->back()->with('error', 'Gagal menghapus transaksi');
        }

        session()->setFlashdata('success', 'Transaksi berhasil dihapus dan stok dikembalikan');
        return redirect()->to('/barang/keluar');
    }
}