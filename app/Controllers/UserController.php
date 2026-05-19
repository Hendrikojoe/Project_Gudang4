<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Helper untuk menentukan view
    private function getViewPath($viewName)
    {
        return "admin/operator/{$viewName}";
    }

    public function index()
    {
        // Hanya admin yang bisa akses
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak!');
        }

        $data = [
            'title' => 'Daftar Operator',
            'users' => $this->userModel->where('role !=', 'admin')->findAll(),
            'totalOperator' => $this->userModel->where('role !=', 'admin')->countAllResults()
        ];
        return view($this->getViewPath('index'), $data);
    }

    public function create()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak!');
        }

        return view($this->getViewPath('create'));
    }

    public function store()
    {
        $rules = [
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]',
            'role' => 'required|in_list[operator,user]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $this->userModel->insert([
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role')
        ]);

        session()->setFlashdata('success', 'Operator berhasil ditambahkan');
        return redirect()->to('/operator');
    }

    public function edit($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak!');
        }

        $user = $this->userModel->find($id);
        if (!$user || $user['role'] === 'admin') {
            return redirect()->to('/operator')->with('error', 'Data tidak ditemukan');
        }

        $data = [
            'title' => 'Edit Operator',
            'user' => $user
        ];
        return view($this->getViewPath('edit'), $data);
    }

    public function update($id)
    {
        $user = $this->userModel->find($id);
        if (!$user || $user['role'] === 'admin') {
            return redirect()->to('/operator')->with('error', 'Data tidak ditemukan');
        }

        $rules = [
            'email' => 'required|valid_email|is_unique[users.email,id,' . $id . ']',
            'role' => 'required|in_list[operator,user]'
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $updateData = [
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role')
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $updateData);

        session()->setFlashdata('success', 'Operator berhasil diupdate');
        return redirect()->to('/operator');
    }

    public function delete($id)
    {
        $user = $this->userModel->find($id);
        if (!$user || $user['role'] === 'admin') {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $this->userModel->delete($id);

        session()->setFlashdata('success', 'Operator berhasil dihapus');
        return redirect()->to('/operator');
    }
}