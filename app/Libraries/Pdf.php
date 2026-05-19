<?php

namespace App\Libraries;

use Dompdf\Dompdf;
use Dompdf\Options;

class Pdf
{
    protected $dompdf;

    public function __construct()
    {
        $options = new Options();
        $options->set('isRemoteEnabled', true);
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $options->setDefaultFont('Arial');

        $this->dompdf = new Dompdf($options);
    }

    public function generate($html, $filename = 'document.pdf', $stream = true)
    {
        $this->dompdf->loadHtml($html);
        $this->dompdf->setPaper('A4', 'portrait');
        $this->dompdf->render();

        if ($stream) {
            return $this->dompdf->stream($filename, ["Attachment" => false]);
        }

        return $this->dompdf->output();
    }
}