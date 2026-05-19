<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penyewaan - <?= $laporan['nama_penyewa'] ?></title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #fff;
            padding: 15px;
            color: #333;
        }

        .print-container {
            max-width: 1000px;
            margin: 0 auto;
            background: white;
        }

        .header {
            text-align: center;
            margin-bottom: 15px;
            padding-bottom: 8px;
            border-bottom: 2px solid #1e3c72;
        }

        .header h1 {
            color: #1e3c72;
            font-size: 22px;
            margin-bottom: 3px;
        }

        .header p {
            color: #6c757d;
            font-size: 11px;
        }

        .title {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            margin: 8px 0;
            color: #2c3e50;
        }

        .info-section {
            margin-bottom: 12px;
        }

        .section-title {
            font-size: 14px;
            font-weight: bold;
            color: #1e3c72;
            border-left: 4px solid #00c6fb;
            padding-left: 10px;
            margin-bottom: 8px;
        }

        .info-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
        }

        .info-table tr {
            border-bottom: 1px solid #e9ecef;
        }

        .info-table td {
            padding: 5px 8px;
            vertical-align: top;
            font-size: 11px;
        }

        .info-table td:first-child {
            width: 35%;
            font-weight: 600;
            color: #495057;
            background-color: #f8f9fa;
        }

        .info-table td:last-child {
            width: 65%;
            color: #2c3e50;
        }

        .items-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 8px;
            font-size: 10px;
        }

        .items-table th {
            background: #1e3c72;
            color: white;
            padding: 6px 8px;
            text-align: left;
            font-size: 10px;
        }

        .items-table td {
            padding: 5px 8px;
            border-bottom: 1px solid #dee2e6;
        }

        .items-table tr:last-child td {
            border-bottom: none;
        }

        .text-right {
            text-align: right;
        }

        .text-center {
            text-align: center;
        }

        .font-bold {
            font-weight: 700;
        }

        .badge {
            display: inline-block;
            padding: 2px 6px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 600;
        }

        .badge-harian {
            background: #28a745;
            color: white;
        }

        .badge-event {
            background: #007bff;
            color: white;
        }

        .badge-diskon {
            background: #dc3545;
            color: white;
            display: inline-block;
            padding: 2px 6px;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 600;
        }

        .badge-kategori {
            background: #6c757d;
            color: white;
            display: inline-block;
            padding: 2px 5px;
            border-radius: 12px;
            font-size: 9px;
            font-weight: 600;
        }

        .total-section {
            background: #f8f9fa;
            padding: 8px;
            border-radius: 8px;
            margin-top: 8px;
            text-align: right;
        }

        .total-section .total-label {
            font-size: 12px;
            font-weight: 600;
            color: #495057;
        }

        .total-section .total-value {
            font-size: 16px;
            font-weight: bold;
            color: #28a745;
            margin-top: 3px;
        }

        .total-section-original {
            font-size: 10px;
            color: #f39c12;
            text-decoration: line-through;
        }

        .calculation-box {
            background: #f8f9fa;
            padding: 8px;
            border-radius: 8px;
            margin-top: 8px;
            font-size: 10px;
        }

        .calculation-line {
            display: flex;
            justify-content: space-between;
            padding: 4px 0;
            border-bottom: 1px dashed #dee2e6;
        }

        .calculation-line.total {
            border-bottom: none;
            font-weight: bold;
            font-size: 12px;
            color: #0f5132;
            background: #d1e7dd;
            margin-top: 5px;
            padding: 6px;
            border-radius: 6px;
        }

        .calculation-line.diskon {
            color: #dc3545;
        }

        /* Periode sewa 1 baris rapi */
        .periode-row {
            background: #f8f9fa;
            padding: 8px;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 12px;
        }

        .periode-item {
            flex: 1;
            text-align: center;
            padding: 5px;
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }

        .periode-label {
            font-size: 8px;
            color: #6c757d;
            margin-bottom: 2px;
        }

        .periode-value {
            font-size: 11px;
            font-weight: bold;
            color: #1e3c72;
        }

        .footer-top {
            background: #e9ecef;
            padding: 5px 10px;
            border-radius: 8px;
            text-align: center;
            margin-bottom: 12px;
            font-size: 9px;
            color: #495057;
        }

        .footer {
            margin-top: 12px;
            padding-top: 8px;
            text-align: center;
            border-top: 1px solid #dee2e6;
            color: #6c757d;
            font-size: 8px;
        }

        @media print {
            body {
                padding: 0;
                margin: 0;
            }
            .print-container {
                margin: 0;
                padding: 8px;
            }
            .badge, .badge-harian, .badge-event, .badge-kategori, .badge-diskon {
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }
            .items-table th {
                background: #1e3c72 !important;
                print-color-adjust: exact;
                -webkit-print-color-adjust: exact;
            }
        }
    </style>
</head>
<body onload="window.print()">
    <div class="print-container">
        <?php
        $items = [];
        if (!empty($laporan['detail_json'])) {
            $items = json_decode($laporan['detail_json'], true);
        }
        
        $diskon = $laporan['diskon'] ?? 0;
        $diskonPersen = $laporan['diskon_persen'] ?? 0;
        $grandTotal = $laporan['total_harga'];
        $totalSebelumDiskon = $grandTotal + $diskon;
        
        $checkin = new DateTime($laporan['checkin']);
        $checkout = new DateTime($laporan['checkout']);
        $days = $checkin->diff($checkout)->days;
        
        // 🔥 AMBIL SEMUA KATEGORI SEWA UNIK DARI ITEMS
        $kategoriSewaList = [];
        foreach ($items as $item) {
            $kategoriSewa = $item['kategori_sewa'] ?? $laporan['kategori'];
            if (!in_array($kategoriSewa, $kategoriSewaList)) {
                $kategoriSewaList[] = $kategoriSewa;
            }
        }
        
        $subtotalPerHariSemua = 0;
        foreach ($items as $item) {
            $harga = $item['harga'] ?? 0;
            $qty = $item['qty'] ?? $item['jumlah'] ?? 0;
            $subtotalPerHariSemua += ($harga * $qty);
        }
        ?>

        <!-- Header -->
        <div class="header">
            <h1>GudangPro</h1>
            <p>Inventory System</p>
            <div class="title">LAPORAN PENYEWAAN</div>
        </div>

        <!-- Footer Atas (Dicetak & Terima kasih) -->
        <div class="footer-top">
            📅 Dicetak pada: <?= date('d F Y H:i:s') ?> &nbsp;|&nbsp;
            ✅ Terima kasih telah menggunakan layanan GudangPro
        </div>

        <!-- Informasi Penyewa -->
        <div class="info-section">
            <div class="section-title">📋 Informasi Penyewa</div>
            <table class="info-table">
                <tr><td>ID Transaksi</td><td>#<?= str_pad($laporan['id'], 6, '0', STR_PAD_LEFT) ?></td></tr>
                <tr><td>Nama Penyewa</td><td><strong><?= esc($laporan['nama_penyewa']) ?></strong></td></tr>
                <tr>
                    <td>Kategori Sewa</td>
                    <td>
                        <?php 
                        // 🔥 TAMPILKAN SEMUA KATEGORI SEWA YANG UNIK
                        if (!empty($kategoriSewaList)) {
                            foreach ($kategoriSewaList as $kat) {
                                if ($kat == 'harian') {
                                    echo '<span class="badge badge-harian" style="margin-right: 5px;">📅 Harian</span> ';
                                } else {
                                    echo '<span class="badge badge-event" style="margin-right: 5px;">🎪 Event</span> ';
                                }
                            }
                        } else {
                            if ($laporan['kategori'] == 'harian') {
                                echo '<span class="badge badge-harian">📅 Harian</span>';
                            } else {
                                echo '<span class="badge badge-event">🎪 Event</span>';
                            }
                        }
                        ?>
                    </td>
                </tr>
                <?php if (!empty($laporan['lokasi'])): ?>
                <tr><td>Lokasi / Venue</td><td><?= esc($laporan['lokasi']) ?></td></tr>
                <?php endif; ?>
                <?php if ($diskon > 0): ?>
                <tr>
                    <td>Potongan Harga</td>
                    <td>
                        <span class="badge-diskon">💰 <?= $diskonPersen > 0 ? $diskonPersen . '%' : 'Nominal' ?> Diskon</span>
                        <div style="margin-top: 2px; color: #dc3545; font-weight: bold;">- Rp <?= number_format($diskon, 0, ',', '.') ?></div>
                    </td>
                </tr>
                <?php endif; ?>
            </table>
        </div>

        <!-- Periode Sewa (SATU BARIS RAPI) -->
        <div class="info-section">
            <div class="section-title">📅 Periode Sewa</div>
            <div class="periode-row">
                <div class="periode-item"><div class="periode-label">Tanggal Check In</div><div class="periode-value"><?= date('d F Y', strtotime($laporan['checkin'])) ?></div></div>
                <div class="periode-item"><div class="periode-label">Tanggal Check Out</div><div class="periode-value"><?= date('d F Y', strtotime($laporan['checkout'])) ?></div></div>
                <div class="periode-item"><div class="periode-label">Durasi Sewa</div><div class="periode-value"><?= $days ?> hari</div></div>
            </div>
        </div>

        <!-- Detail Barang yang Disewa -->
        <div class="info-section">
            <div class="section-title">📦 Detail Barang yang Disewa</div>
            <?php if (!empty($items)): ?>
                <table class="items-table">
                    <thead>
                        <tr><th>No</th><th>Nama Barang</th><th>Kategori</th><th>Kategori Sewa</th><th class="text-center">Jml</th><th class="text-right">Harga</th><th class="text-right">Subtotal</th></tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; foreach ($items as $item): ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><strong><?= esc($item['nama_barang'] ?? $item['nama'] ?? '-') ?></strong></td>
                            <td><span class="badge-kategori"><?= esc($item['kategori'] ?? '-') ?></span></td>
                            <td><?= ($item['kategori_sewa'] ?? $laporan['kategori']) == 'harian' ? '<span class="badge badge-harian">Harian</span>' : '<span class="badge badge-event">Event</span>' ?></td>
                            <td class="text-center"><?= $item['qty'] ?? $item['jumlah'] ?? 0 ?></td>
                            <td class="text-right">Rp <?= number_format($item['harga'] ?? 0, 0, ',', '.') ?></td>
                            <td class="text-right font-bold">Rp <?= number_format($item['subtotal'] ?? 0, 0, ',', '.') ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- RINCIAN PERHITUNGAN -->
                <div class="calculation-box">
                    <div class="calculation-line"><span>Subtotal per Hari (Harga × Jumlah)</span><span class="font-bold">Rp <?= number_format($subtotalPerHariSemua, 0, ',', '.') ?></span></div>
                    <div class="calculation-line"><span>Durasi Sewa</span><span><?= $days ?> Hari</span></div>
                    <div class="calculation-line"><span>Total Sebelum Diskon (Rp <?= number_format($subtotalPerHariSemua, 0, ',', '.') ?> × <?= $days ?> hari)</span><span class="font-bold">Rp <?= number_format($totalSebelumDiskon, 0, ',', '.') ?></span></div>
                    <?php if ($diskon > 0): ?>
                    <div class="calculation-line diskon"><span>Diskon <?= $diskonPersen > 0 ? '(' . $diskonPersen . '% dari total)' : '(Nominal)' ?></span><span class="font-bold">- Rp <?= number_format($diskon, 0, ',', '.') ?></span></div>
                    <?php endif; ?>
                    <div class="calculation-line total"><span>TOTAL YANG HARUS DIBAYAR</span><span class="font-bold" style="color:#28a745;">Rp <?= number_format($grandTotal, 0, ',', '.') ?></span></div>
                </div>

            <?php else: ?>
                <p style="color: #6c757d; padding: 8px; font-size:11px;">- Tidak ada data barang -</p>
            <?php endif; ?>
        </div>

        <!-- Deskripsi -->
        <?php if (!empty($laporan['deskripsi'])): ?>
        <div class="info-section">
            <div class="section-title">📝 Catatan / Deskripsi</div>
            <table class="info-table"><tr><td>Deskripsi</td><td><?= esc($laporan['deskripsi']) ?></td></tr></table>
        </div>
        <?php endif; ?>

        <!-- Total Pembayaran -->
        <div class="total-section">
            <?php if ($diskon > 0): ?>
                <div class="total-section-original">Harga sebelum diskon: Rp <?= number_format($totalSebelumDiskon, 0, ',', '.') ?></div>
            <?php endif; ?>
            <div class="total-label">TOTAL PEMBAYARAN</div>
            <div class="total-value">Rp <?= number_format($grandTotal, 0, ',', '.') ?></div>
            <?php if ($diskon > 0): ?>
                <small style="color: #28a745;">✅ Anda hemat Rp <?= number_format($diskon, 0, ',', '.') ?> <?= $diskonPersen > 0 ? '(' . $diskonPersen . '% off)' : '' ?></small>
            <?php endif; ?>
        </div>

        <div class="footer"></div>
    </div>

    <script>
        window.onload = function() { window.print(); };
    </script>
</body>
</html>