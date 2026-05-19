<?php

namespace App\Controllers;

class TestEmail extends BaseController
{
    public function index()
    {
        $email = \Config\Services::email();
        
        // Konfigurasi email (ambil dari config Email.php)
        $email->setFrom('your-email@gmail.com', 'GudangPro Test');
        $email->setTo('your-email@gmail.com'); // Ganti dengan email tujuan test
        $email->setSubject('Test SMTP Gmail - GudangPro');
        $email->setMessage('
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset="UTF-8">
                <title>Test Email</title>
                <style>
                    body { font-family: Arial, sans-serif; }
                    .container { padding: 20px; background: #f4f4f4; }
                    .content { background: white; padding: 20px; border-radius: 10px; }
                    .success { color: green; }
                    .error { color: red; }
                </style>
            </head>
            <body>
                <div class="container">
                    <div class="content">
                        <h2 class="success">✅ Test SMTP Gmail Berhasil!</h2>
                        <p>Jika Anda menerima email ini, maka konfigurasi SMTP sudah benar.</p>
                        <hr>
                        <p><strong>Detail:</strong></p>
                        <ul>
                            <li>Waktu: ' . date('d/m/Y H:i:s') . '</li>
                            <li>Sistem: GudangPro</li>
                        </ul>
                    </div>
                </div>
            </body>
            </html>
        ');
        
        echo "<h3>Mengirim email test...</h3>";
        
        if ($email->send()) {
            echo "<p class='success'>✅ Email berhasil dikirim! Silakan cek inbox Anda.</p>";
        } else {
            echo "<p class='error'>❌ Email gagal dikirim!</p>";
            echo "<h4>Debug Info:</h4>";
            echo "<pre>";
            print_r($email->printDebugger(['headers']));
            echo "</pre>";
        }
        
        echo "<br><a href='/'>Kembali ke Home</a>";
    }
}