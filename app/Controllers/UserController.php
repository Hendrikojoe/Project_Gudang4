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

    public function index()
    {
        $data = [
            'title' => 'Daftar User',
            'users' => $this->userModel->findAll()
        ];
        return view('user/index', $data);
    }

    public function create()
    {
        return view('user/create');
    }

    public function store()
    {
        $this->userModel->insert([
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role' => $this->request->getPost('role')
        ]);
        return redirect()->to('/user');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit User',
            'user' => $this->userModel->find($id)
        ];
        return view('user/edit', $data);
    }

    public function update($id)
    {
        $password = $this->request->getPost('password');
        $updateData = [
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role')
        ];
        if (!empty($password)) {
            $updateData['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $this->userModel->update($id, $updateData);
        return redirect()->to('/user');
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        return redirect()->to('/user');
    }
}