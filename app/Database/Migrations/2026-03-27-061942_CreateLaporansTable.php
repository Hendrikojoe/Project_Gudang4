<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLaporansTable extends Migration
{
    public function up()
    {
        // Definisikan kolom
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'sewa_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ],
            'nama_penyewa' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'barang_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'checkin' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'checkout' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'kategori' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null'       => false,
            ],
            'harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'null'       => false,
            ],
            'total_harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'null'       => false,
            ],
            'lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => true,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => false,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // Tentukan primary key
        $this->forge->addKey('id', true);
        
        // Buat tabel
        $this->forge->createTable('laporans');
    }

    public function down()
    {
        // Hapus tabel jika rollback
        $this->forge->dropTable('laporans', true);
    }
}