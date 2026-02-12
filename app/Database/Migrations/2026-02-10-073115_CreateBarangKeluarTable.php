<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangKeluarTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'INT', 'auto_increment' => true],
            'barang_id' => ['type' => 'INT'],
            'jumlah' => ['type' => 'INT'],
            'admin' => ['type' => 'VARCHAR', 'constraint' => 20],
            'tanggal' => ['type' => 'DATE']
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('barang_keluar');
    }

    public function down()
    {
        $this->forge->dropTable('barang_keluar');
    }
}