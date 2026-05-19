<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeysToLaporans extends Migration
{
    public function up()
    {
        $sewaExists = $this->db->query("SHOW TABLES LIKE 'sewa'")->getNumRows() > 0;
        $barangExists = $this->db->query("SHOW TABLES LIKE 'barang'")->getNumRows() > 0;
        
        if ($sewaExists && $barangExists) {
            try {
                $this->db->query("
                    ALTER TABLE laporans 
                    ADD CONSTRAINT laporans_sewa_id_foreign 
                    FOREIGN KEY (sewa_id) REFERENCES sewa(id) 
                    ON DELETE SET NULL 
                    ON UPDATE CASCADE
                ");
            } catch (\Exception $e) {
            }
            
            try {
                $this->db->query("
                    ALTER TABLE laporans 
                    ADD CONSTRAINT laporans_barang_id_foreign 
                    FOREIGN KEY (barang_id) REFERENCES barang(id) 
                    ON DELETE CASCADE 
                    ON UPDATE CASCADE
                ");
            } catch (\Exception $e) {
            }
        }
    }

    public function down()
    {
        try {
            $this->db->query("ALTER TABLE laporans DROP FOREIGN KEY laporans_sewa_id_foreign");
        } catch (\Exception $e) {
        }
        
        try {
            $this->db->query("ALTER TABLE laporans DROP FOREIGN KEY laporans_barang_id_foreign");
        } catch (\Exception $e) {
        }
    }
}