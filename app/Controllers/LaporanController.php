<?php

namespace App\Controllers;

use App\Models\LaporanModel;
use Dompdf\Dompdf;

class LaporanController extends BaseController
{
    protected $laporanModel;

    public function __construct()
    {
        $this->laporanModel = new LaporanModel();
    }

    public function index()
    {
        $data['laporan'] = $this->laporanModel->findAll();
        return view('laporan/index', $data);
    }

    public function exportPdf()
    {
        $laporan = $this->laporanModel->findAll();

        $html = view('laporan/pdf', ['laporan' => $laporan]);

        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan.pdf", ["Attachment" => false]);
    }
}