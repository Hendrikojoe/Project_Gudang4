<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table = 'transaksi';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    
    protected $allowedFields = [
        'id_barang',
        'id_sub_item',
        'jumlah',
        'jenis_transaksi',
        'id_user',
        'tanggal',
        'keterangan'
    ];
    
    protected $useTimestamps = false;
    
    protected $validationRules = [
        'id_barang' => 'required',
        'jumlah' => 'required|numeric|greater_than[0]',
        'jenis_transaksi' => 'required|in_list[masuk,keluar]'
    ];
}