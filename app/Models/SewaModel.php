<?php

namespace App\Models;

use CodeIgniter\Model;

class SewaModel extends Model
{
    protected $table = 'sewa';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'nama_penyewa',
        'checkin',
        'checkout',
        'kategori',
        'total_harga',
        'subtotal',
        'diskon',
        'diskon_persen',
        'lokasi',
        'deskripsi',
        'created_at'
    ];
    
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = '';
    
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
}