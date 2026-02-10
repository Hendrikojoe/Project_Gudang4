<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporans';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama_laporan', 'deskripsi', 'tanggal'];
}