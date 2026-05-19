<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSewaTable extends Migration
{
   public function up()
{
    $this->forge->addField([
        'id' => [
            'type' => 'INT',
            'auto_increment' => true
        ],
        'nama_penyewa' => [
            'type' => 'VARCHAR',
            'constraint' => 100
        ],
        'barang_id' => [
            'type' => 'INT'
        ],
        'deskripsi' => [
            'type' => 'TEXT',
            'null' => true
        ],
        'checkin' => [
            'type' => 'DATE'
        ],
        'checkout' => [
            'type' => 'DATE'
        ],
        'kategori' => [
            'type' => 'ENUM',
            'constraint' => ['harian','event']
        ],
        'harga' => [
            'type' => 'INT'
        ],
        'total_harga' => [
            'type' => 'INT'
        ],
        'lokasi' => [
            'type' => 'VARCHAR',
            'constraint' => 255,
            'null' => true
        ],
        'created_at DATETIME DEFAULT CURRENT_TIMESTAMP'
    ]);

    $this->forge->addKey('id', true);
    $this->forge->createTable('sewa');
}

    public function down()
    {
        //
    }
}
