<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateKategoriSubitem extends Migration
{
    public function up()
    {
        $forge = \Config\Database::forge();

        // -----------------------------
        // Tabel kategori
        // -----------------------------
        $forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
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
        $forge->addKey('id', true);
        $forge->createTable('kategori', true);

        // -----------------------------
        // Tabel sub_item
        // -----------------------------
        $forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'barang_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => false,
                'null'       => false,
            ],
            'nama' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'null'       => false,
            ],
            'stok' => [
                'type'    => 'INT',
                'default' => 0,
            ],
            'total_masuk' => [
                'type'    => 'INT',
                'default' => 0,
            ],
            'total_keluar' => [
                'type'    => 'INT',
                'default' => 0,
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
        $forge->addKey('id', true);
        $forge->addForeignKey('barang_id', 'barang', 'id', 'CASCADE', 'CASCADE');
        $forge->createTable('sub_item', true);

        // -----------------------------
        // Tambah kolom kategori_id di tabel barang
        // -----------------------------
        $fields = [
            'kategori_id' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ]
        ];
        $forge->addColumn('barang', $fields);
        $forge->addForeignKey('kategori_id', 'kategori', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $forge = \Config\Database::forge();
        $db    = \Config\Database::connect();

        // -----------------------------
        // Drop kolom kategori_id dari barang
        // -----------------------------
        if ($db->fieldExists('kategori_id', 'barang')) {
            $query = $db->query("
                SELECT CONSTRAINT_NAME 
                FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
                WHERE TABLE_SCHEMA = DATABASE() 
                AND TABLE_NAME = 'barang' 
                AND COLUMN_NAME = 'kategori_id' 
                AND REFERENCED_TABLE_NAME IS NOT NULL
            ");

            $fk = $query->getRow();
            if ($fk) {
                $forge->dropForeignKey('barang', $fk->CONSTRAINT_NAME);
            }

            $forge->dropColumn('barang', 'kategori_id');
        }

        $forge->dropTable('sub_item', true);

        $forge->dropTable('kategori', true);
    }
}