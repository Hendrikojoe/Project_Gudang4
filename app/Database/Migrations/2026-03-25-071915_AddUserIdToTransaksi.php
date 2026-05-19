<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserIdToTransaksi extends Migration
{
    public function up()
    {
        $fields = [
            'id_user' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'null'       => true,
            ]
        ];
        $this->forge->addColumn('transaksi', $fields);
        $this->forge->addForeignKey('id_user', 'users', 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $forge = \Config\Database::forge();
        $db = \Config\Database::connect();

        // Cek foreign key
        $query = $db->query("SELECT CONSTRAINT_NAME 
                             FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
                             WHERE TABLE_SCHEMA = DATABASE() 
                               AND TABLE_NAME = 'transaksi' 
                               AND COLUMN_NAME = 'id_user' 
                               AND REFERENCED_TABLE_NAME IS NOT NULL");
        $fk = $query->getRow();
        if ($fk) {
            $forge->dropForeignKey('transaksi', $fk->CONSTRAINT_NAME);
        }

        $forge->dropColumn('transaksi', 'id_user');
    }
}