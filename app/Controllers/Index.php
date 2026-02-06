<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Index extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Halaman Utama - Website Elegan',
            'page' => 'home',
            'hour' => date('H'),
            'date' => date('d F Y'),
            'time' => date('H:i:s'),
            'php_version' => phpversion(),
            'ci_version' => \CodeIgniter\CodeIgniter::CI_VERSION,
            'isLoggedIn' => session()->get('isLoggedIn') ?? false
        ];
        
        return view('index', $data);
    }
}