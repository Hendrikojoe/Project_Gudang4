<?php

namespace App\Controllers;

use App\Models\BarangModel;

class Barang extends BaseController
{
    public function index()
    {
        $model = new BarangModel();
        $data['barang'] = $model->findAll();

        return view('admin/barang/index', $data);
    }

    public function create()
    {
        return view('admin/barang/create');
    }

    public function store()
    {
        $model = new BarangModel();

        $model->save([
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang');
    }

    public function delete($id)
    {
        $model = new BarangModel();
        $model->delete($id);

        return redirect()->to('/barang');
    }

    public function edit($id)
    {
        $model = new BarangModel();
        $data['barang'] = $model->find($id);

        return view('admin/barang/edit', $data);
    }

    public function update($id)
    {
        $model = new BarangModel();

        $model->update($id, [
            'nama_barang' => $this->request->getPost('nama_barang'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/barang');
    }
}