<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBarangTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'auto_increment' => true,
            ],
            'nama_barang' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'stok' => [
                'type'       => 'INT',
                'constraint' => 11,
                'default'    => 0,
            ],
            'satuan' => [
                'type' => 'ENUM',
                'constraint' => [
                    'pcs','box','kg','gram','liter','ml',
                    'meter','cm','mm','inch',
                    'lusin','pack','roll','unit','set',
                    'lembar','botol','kaleng',
                    'sak','karung','drum','tabung',
                    'pallet','crate','rim','bundle','strip','tube'
                ],
                'default' => 'pcs',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}