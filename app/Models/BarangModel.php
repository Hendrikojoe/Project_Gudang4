<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
<<<<<<< HEAD
=======

>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
    protected $allowedFields = [
        'nama_barang',
        'stok'
    ];
<<<<<<< HEAD
=======

>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
    protected $useTimestamps = true;
}
