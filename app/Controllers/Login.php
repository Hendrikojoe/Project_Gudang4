<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login'); // halaman login
    }

    public function authenticate()
    {
        $session = session();
        $userModel = new UserModel();

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $user = $userModel->where('email', $email)->first();

        if (is_null($user)) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        if (!password_verify($password, $user['password'])) {
            return redirect()->back()->withInput()->with('error', 'Invalid username or password.');
        }

        // set session
        $session->set([
            'id' => $user['id'],
            'email' => $user['email'],
            'role' => $user['role'],
            'isLoggedIn' => TRUE
        ]);

        // redirect berdasarkan role
        switch ($user['role']) {
            case 'admin':
                return redirect()->to('/admin/dashboard');
            case 'user':
            default:
                return redirect()->to('/dashboard');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}