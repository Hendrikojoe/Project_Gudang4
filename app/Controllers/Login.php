<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        // Jika sudah login, redirect ke admin dashboard
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/admin-dashboard');
        }
        return view('index');
    }

    public function authenticate()
{
    $session = session();
    $userModel = new UserModel();

    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');

    $user = $userModel->where('email', $email)->first();

    if (!$user) {
        return redirect()->to('/#login')->withInput()->with('error', 'Email tidak ditemukan.');
    }

    if (!password_verify($password, $user['password'])) {
        return redirect()->to('/#login')->withInput()->with('error', 'Password salah.');
    }

    $session->set([
        'id'         => $user['id'],
        'email'      => $user['email'],
        'role'       => $user['role'],
        'isLoggedIn' => true
    ]);

    if ($user['role'] == 'admin') {
        return redirect()->to('admin/dashboard');
    } else {
        return redirect()->to('/user/dashboard');
    }
}

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}