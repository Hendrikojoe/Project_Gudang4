<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePenyewaanTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'kode_sewa' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => false,
            ],
            'pelanggan_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => false,
            ],
            'tanggal_sewa' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'tanggal_kembali' => [
                'type' => 'DATE',
                'null' => false,
            ],
            'total_harga' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],
            'denda' => [
                'type'       => 'DECIMAL',
                'constraint' => '15,2',
                'default'    => 0.00,
            ],
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['pending', 'disewa', 'kembali', 'batal'],
                'default'    => 'pending',
            ],
            'created_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
            'updated_at' => [
                'type'    => 'DATETIME',
                'null'    => true,
                'default' => null,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addKey('pelanggan_id');
        $this->forge->addKey('kode_sewa', false, true); // Unique key for kode_sewa
        
        // Add foreign key
        $this->forge->addForeignKey('pelanggan_id', 'pelanggan', 'id', 'CASCADE', 'CASCADE');
        
        $this->forge->createTable('penyewaan', true);
    }

    public function down()
    {
        $this->forge->dropTable('penyewaan', true);
    }
}