<?php

namespace App\Controllers;

use App\Models\SupplierModel;

class SupplierController extends BaseController
{
    protected $supplierModel;

    public function __construct()
    {
        $this->supplierModel = new SupplierModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Supplier',
            'supplier' => $this->supplierModel->findAll()
        ];
        return view('supplier/index', $data);
    }

    public function create()
    {
        return view('supplier/create');
    }

    public function store()
    {
        $this->supplierModel->insert([
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'kontak' => $this->request->getPost('kontak'),
        ]);
        return redirect()->to('/supplier');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Supplier',
            'supplier' => $this->supplierModel->find($id)
        ];
        return view('supplier/edit', $data);
    }

    public function update($id)
    {
        $this->supplierModel->update($id, [
            'nama_supplier' => $this->request->getPost('nama_supplier'),
            'kontak' => $this->request->getPost('kontak'),
        ]);
        return redirect()->to('/supplier');
    }

    public function delete($id)
    {
        $this->supplierModel->delete($id);
        return redirect()->to('/supplier');
    }
}