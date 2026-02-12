<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangKeluarModel extends Model
{
    protected $table = 'barang_keluar';
    protected $allowedFields = ['barang_id', 'jumlah', 'admin', 'tanggal'];
}