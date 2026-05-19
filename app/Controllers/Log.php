<?php

namespace App\Controllers;

use Config\Database;

class Log extends BaseController
{
    public function index()
    {
        $db = Database::connect();

        $logs = $db->table('log_aktivitas')
                   ->orderBy('created_at', 'DESC')
                   ->get()
                   ->getResultArray();

        return view('admin/log/index', [
            'title' => 'Log Aktivitas',
            'logs'  => $logs
        ]);
    }

    public function latest()
    {
        $db = Database::connect();

        $logs = $db->table('log_aktivitas')
                ->orderBy('created_at', 'DESC')
                ->limit(10)
                ->get()
                ->getResultArray();

        return $this->response->setJSON($logs);
    }

    public function getLogs()
    {
        // Cek apakah user sudah login
        if (!session()->get('id') && !session()->get('user_id')) {
            return $this->response->setJSON(['success' => false, 'error' => 'Unauthorized'])->setStatusCode(401);
        }

        $page = $this->request->getGet('page') ?? 1;
        $limit = $this->request->getGet('limit') ?? 10;
        $offset = ($page - 1) * $limit;

        $db = Database::connect();

        // Get total count
        $total = $db->table('log_aktivitas')->countAllResults();

        // Get paginated logs
        $logs = $db->table('log_aktivitas')
                ->select('id, user, aktivitas, created_at')
                ->orderBy('created_at', 'DESC')
                ->limit($limit, $offset)
                ->get()
                ->getResultArray();

        return $this->response->setJSON([
            'success' => true,
            'data' => $logs,
            'total' => $total,
            'page' => (int)$page,
            'limit' => (int)$limit
        ]);
    }
}