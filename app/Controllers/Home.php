<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
{
    if (!session()->get('isLoggedIn')) {
        return view('index'); 
    }

    if (session()->get('role') == 'admin') {
        return redirect()->to('/admin/dashboard');
    }

    return redirect()->to('/user/dashboard');
}

    public function test()
    {
        echo "Test berjalan!";
        echo "<br>PHP Version: " . phpversion();
        echo "<br><a href='/'>Kembali</a>";
    }
}