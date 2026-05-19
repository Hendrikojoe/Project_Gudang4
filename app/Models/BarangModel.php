<?php

namespace App\Models;

use CodeIgniter\Model;

class BarangModel extends Model
{
    protected $table = 'barang';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    
    protected $allowedFields = [
        'kategori_id',
        'nama_barang',
        'satuan',
        'stok',
        'gambar',
        'harga_jual',
        'harga',
        'kondisi',
        'status_maintenance',
        'keterangan_maintenance',
        'tipe_barang',
        'jumlah_dalam_maintenance',
        'jumlah_rusak'
    ];

    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    
    public function getBarangWithKategori()
    {
        return $this->select('barang.*, kategori.nama as nama_kategori')
                    ->join('kategori', 'kategori.id = barang.kategori_id', 'left')
                    ->findAll();
    }
    
    public function getByKategori($kategori_id)
    {
        return $this->select('barang.*, kategori.nama as nama_kategori')
                    ->join('kategori', 'kategori.id = barang.kategori_id', 'left')
                    ->where('barang.kategori_id', $kategori_id)
                    ->findAll();
    }
    
    public function getDetail($id)
    {
        return $this->select('barang.*, kategori.nama as nama_kategori')
                    ->join('kategori', 'kategori.id = barang.kategori_id', 'left')
                    ->where('barang.id', $id)
                    ->first();
    }
    
    /**
     * Tambah stok barang
     * @param int $id ID barang
     * @param int $jumlah Jumlah yang ditambahkan
     * @return bool
     */
    public function tambahStok($id, $jumlah)
    {
        $barang = $this->find($id);
        if ($barang) {
            $stokBaru = (int)$barang['stok'] + (int)$jumlah;
            return $this->update($id, ['stok' => $stokBaru]);
        }
        return false;
    }
    
    /**
     * Kurangi stok barang
     * @param int $id ID barang
     * @param int $jumlah Jumlah yang dikurangi
     * @return bool
     */
    public function kurangiStok($id, $jumlah)
    {
        $barang = $this->find($id);
        if ($barang && (int)$barang['stok'] >= (int)$jumlah) {
            $stokBaru = (int)$barang['stok'] - (int)$jumlah;
            return $this->update($id, ['stok' => $stokBaru]);
        }
        return false;
    }
}