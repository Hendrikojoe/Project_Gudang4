<?php

namespace App\Models;

use CodeIgniter\Model;

class LaporanModel extends Model
{
    protected $table = 'laporan';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'sewa_id',
        'nama_penyewa',
        'detail_json', 
        'deskripsi',
        'checkin',
        'checkout',
        'kategori',
        'total_harga',
        'diskon',           // TAMBAHKAN INI
        'diskon_persen',    // TAMBAHKAN INI
        'lokasi',
        'created_at',
        'updated_at'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    // Validation rules
    protected $validationRules = [
        'nama_penyewa' => 'required|min_length[3]',
        'checkin' => 'required|valid_date',
        'checkout' => 'required|valid_date',
        'kategori' => 'required|in_list[harian,event]',
        'total_harga' => 'required|numeric|greater_than[0]',
        'diskon' => 'permit_empty|numeric',           // TAMBAHKAN
        'diskon_persen' => 'permit_empty|numeric'     // TAMBAHKAN
    ];
    
    protected $validationMessages = [
        'nama_penyewa' => [
            'required' => 'Nama penyewa harus diisi',
            'min_length' => 'Nama penyewa minimal 3 karakter'
        ],
        'checkin' => [
            'required' => 'Tanggal check in harus diisi',
            'valid_date' => 'Format tanggal tidak valid'
        ],
        'checkout' => [
            'required' => 'Tanggal check out harus diisi',
            'valid_date' => 'Format tanggal tidak valid'
        ]
    ];
    
    public function getLaporanWithBarang()
    {
        return $this->orderBy('created_at', 'DESC')->findAll();
    }
    
    public function getLaporanByDateRange($startDate, $endDate)
    {
        return $this->where('created_at >=', $startDate . ' 00:00:00')
                    ->where('created_at <=', $endDate . ' 23:59:59')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
    
    public function getSummary()
    {
        $totalPendapatan = $this->selectSum('total_harga')->get()->getRow()->total_harga ?? 0;
        $totalSewa = $this->countAll();
        $sewaHarian = $this->where('kategori', 'harian')->countAllResults();
        $sewaEvent = $this->where('kategori', 'event')->countAllResults();
        
        return [
            'total_pendapatan' => $totalPendapatan,
            'total_sewa' => $totalSewa,
            'sewa_harian' => $sewaHarian,
            'sewa_event' => $sewaEvent
        ];
    }
}