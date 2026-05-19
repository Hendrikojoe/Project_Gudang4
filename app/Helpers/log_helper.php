<?php

use Config\Database;

if (!function_exists('log_activity')) {
    function log_activity($aktivitas)
    {
        $db = Database::connect();

        $user = session()->get('email') ?? 'Guest';

        $db->table('log_aktivitas')->insert([
            'user'       => $user,
            'aktivitas'  => $aktivitas,
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}