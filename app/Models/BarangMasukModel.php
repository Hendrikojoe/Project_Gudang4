<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangMasukModel extends Model
{
    protected $table = 'barang_masuk';
    protected $allowedFields = ['barang_id', 'jumlah', 'admin', 'tanggal'];
}