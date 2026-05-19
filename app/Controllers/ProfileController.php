<?php

namespace App\Controllers;

class ProfileController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Profil Saya',
            'user' => [
                'nama' => session()->get('nama') ?? session()->get('username') ?? 'User',
                'email' => session()->get('email') ?? 'user@example.com',
                'role' => session()->get('role') ?? 'user',
            ]
        ];
        
        // PASTIKAN PATH INI
        return view('admin/profile/index', $data);
    }
    
    public function edit()
    {
        $data = [
            'title' => 'Edit Profil',
            'user' => [
                'nama' => session()->get('nama') ?? session()->get('username') ?? 'User',
                'email' => session()->get('email') ?? 'user@example.com',
                'no_telepon' => session()->get('no_telepon') ?? ''
            ]
        ];
        
        // PASTIKAN PATH INI
        return view('admin/profile/edit', $data);
    }
    
    public function update()
    {
        $rules = [
            'nama' => 'required|min_length[3]',
            'email' => 'required|valid_email'
        ];
        
        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        
        session()->set('nama', $this->request->getPost('nama'));
        session()->set('email', $this->request->getPost('email'));
        
        return redirect()->to('/profile')->with('success', 'Profil berhasil diupdate!');
    }
}