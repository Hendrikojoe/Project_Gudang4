<?php

namespace App\Models;

use CodeIgniter\Model;

class SubItemModel extends Model
{
    protected $table            = 'sub_item';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;

    protected $allowedFields = [
        'barang_id', 'nama', 'stok'
    ];

    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    protected $validationRules = [
        'barang_id' => 'required|integer',
        'nama'      => 'required|min_length[1]|max_length[100]',
        'stok'      => 'integer'
    ];

    protected $validationMessages = [
        'barang_id' => [
            'required' => 'Barang harus dipilih',
            'integer'  => 'Barang harus berupa angka'
        ],
        'nama' => [
            'required'   => 'Nama varian/merk harus diisi',
            'min_length' => 'Minimal 1 karakter',
            'max_length' => 'Maksimal 100 karakter',
        ],
    ];

    protected $skipValidation = false;

    public function getByBarang($barang_id)
    {
        return $this->where('barang_id', $barang_id)
                    ->orderBy('nama', 'ASC')
                    ->findAll();
    }

    public function getById($id)
    {
        return $this->where('id', $id)->first();
    }

    public function addStock($id, $jumlah)
    {
        $sub = $this->getById($id);
        if (!$sub) return false;

        $stokBaru = $sub['stok'] + $jumlah;
        
        return $this->update($id, ['stok' => $stokBaru]);
    }

    public function reduceStock($id, $jumlah)
    {
        $sub = $this->getById($id);
        if (!$sub) return false;

        $stokBaru = $sub['stok'] - $jumlah;
        
        if ($stokBaru < 0) return false;
        
        return $this->update($id, ['stok' => $stokBaru]);
    }

    public function isUsed($id)
    {
        return $this->where('id', $id)->countAllResults() > 0;
    }

    public function getWithBarangAndKategori()
    {
        $builder = $this->db->table('sub_item si')
            ->select('si.*, b.nama_barang, b.kategori_id, k.nama as kategori_nama')
            ->join('barang b', 'b.id = si.barang_id', 'left')
            ->join('kategori k', 'k.id = b.kategori_id', 'left')
            ->orderBy('k.nama', 'ASC')
            ->orderBy('b.nama_barang', 'ASC')
            ->orderBy('si.nama', 'ASC');

        return $builder->get()->getResultArray();
    }
}