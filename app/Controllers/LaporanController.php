<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use CodeIgniter\Controller;

class LaporanController extends BaseController
{
    protected $laporanModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }

    // Tampilkan semua laporan
    public function index()
    {
        $data = [
            'title' => 'Daftar Laporan',
            'laporans' => $this->laporanModel->findAll()
        ];

        return view('laporan/index', $data);
    }

    // Form tambah laporan
    public function create()
    {
        return view('laporan/create', ['title' => 'Tambah Laporan']);
    }

    // Simpan laporan baru
    public function store()
    {
        $this->laporanModel->insert([
            'nama_laporan' => $this->request->getPost('nama_laporan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal')
        ]);

        return redirect()->to('/laporan')->with('success', 'Laporan berhasil ditambahkan!');
    }

    // Form edit laporan
    public function edit($id)
    {
        $data = [
            'title' => 'Edit Laporan',
            'laporan' => $this->laporanModel->find($id)
        ];

        return view('laporan/edit', $data);
    }

    // Update laporan
    public function update($id)
    {
        $this->laporanModel->update($id, [
            'nama_laporan' => $this->request->getPost('nama_laporan'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal' => $this->request->getPost('tanggal')
        ]);

        return redirect()->to('/laporan')->with('success', 'Laporan berhasil diperbarui!');
    }

    // Hapus laporan
    public function delete($id)
    {
        $this->laporanModel->delete($id);
        return redirect()->to('/laporan')->with('success', 'Laporan berhasil dihapus!');
    }
}