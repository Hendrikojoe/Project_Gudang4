<?php

namespace App\Controllers;

use App\Models\UserModel;

class Register extends BaseController
{
    public function __construct()
    {
        helper(['form']);
    }

    public function index()
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('role') == 'admin') {
                return redirect()->to('/admin/dashboard');
            } else {
                return redirect()->to('/user/dashboard');
            }
        }
        return view('index');
    }

    public function register()
    {
        $rules = [
            'email' => ['rules' => 'required|min_length[4]|max_length[255]|valid_email|is_unique[users.email]'],
            'password' => ['rules' => 'required|min_length[8]|max_length[255]'],
            'confirm_password' => ['label' => 'confirm password', 'rules' => 'matches[password]'],
        ];

        if ($this->validate($rules)) {
            $model = new UserModel();
            
            $data = [
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role'     => 'user' 
            ];
            
            $model->save($data);
            
            $user = $model->where('email', $data['email'])->first();
            
            $session = session();
            $session->set([
                'id'         => $user['id'],
                'email'      => $user['email'],
                'role'       => $user['role'],
                'isLoggedIn' => true
            ]);
            
            if ($user['role'] == 'admin') {
                return redirect()->to('/admin/dashboard')->with('success', 'Selamat datang! Registrasi berhasil.');
            } else {
                return redirect()->to('/user/dashboard')->with('success', 'Selamat datang! Registrasi berhasil.');
            }
            
        } else {
            return redirect()->to('/#register')
                ->withInput()
                ->with('error', $this->validator->getErrors());
        }
    }
}