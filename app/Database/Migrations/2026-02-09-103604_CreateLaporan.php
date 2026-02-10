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
            'nama_laporan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'null'       => false,
            ],
            'deskripsi' => [
                'type' => 'TEXT',
                'null' => true, // bisa null
            ],
            'tanggal' => [
                'type' => 'DATE',
                'null' => false,
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
        $this->forge->dropTable('laporans');
    }
}