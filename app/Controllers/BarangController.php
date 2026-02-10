<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;

class BarangController extends BaseController
{
    protected $barang;

    public function __construct()
    {
        $this->barang = new BarangModel();
    }

    public function index()
    {
        return view('barang/index', [
            'barangs' => $this->barang->findAll()
        ]);
    }

    public function create()
    {
        return view('barang/create');
    }

    public function store()
    {
        $rules = [
            'nama_barang' => 'required|min_length[3]',
            'stok'        => 'required|integer'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->barang->insert([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok'        => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        return view('barang/edit', [
            'barang' => $this->barang->find($id)
        ]);
    }

    public function update($id)
    {
        $rules = [
            'nama_barang' => 'required|min_length[3]',
            'stok'        => 'required|integer'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput();
        }

        $this->barang->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok'        => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang')->with('success', 'Data berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->barang->delete($id);
        return redirect()->to('/barang')->with('success', 'Data berhasil dihapus');
    }

    // 🔹 API JSON
    public function api()
    {
        return $this->response->setJSON([
            'success' => true,
            'data' => $this->barang->findAll()
        ]);
    }
}