<?php

namespace App\Controllers;

use App\Models\KategoriModel;

class KategoriController extends BaseController
{
    protected $kategoriModel;

    public function __construct()
    {
        $this->kategoriModel = new KategoriModel();
        
        if (!session()->get('isLoggedIn')) {
            redirect()->to('/login');
        }
    }

    // Tambahkan method index ini untuk redirect ke halaman create
    public function index()
    {
        return redirect()->to('/kategori/create');
    }

    public function create()
    {
        $data['title'] = 'Tambah Kategori';
        return view('admin/kategori/create', $data);
    }

    public function store()
    {
        $rules = [
            'nama' => 'required|is_unique[kategori.nama]'
        ];

        if ($this->validate($rules)) {
            $this->kategoriModel->save([
                'nama' => $this->request->getVar('nama')
            ]);
            
            session()->setFlashdata('success', 'Kategori berhasil ditambahkan!');
            return redirect()->to('/kategori/create');
        } else {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}