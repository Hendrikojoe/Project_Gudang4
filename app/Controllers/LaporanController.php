<?php

namespace App\Controllers;

class LaporanController extends BaseController
{
    public function index()
    {
        return view('laporan/index');
    }
}