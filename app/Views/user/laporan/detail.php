<?= $this->extend('user/layout') ?>
<?= $this->section('content') ?>

<style>
    /* CSS tetap SAMA PERSIS seperti kode Anda, tidak diubah */
    .container-detail {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
        animation: fadeInUp 0.6s ease-out;
    }

    .card-detail {
        background: white;
        border-radius: 24px;
        padding: 35px;
        box-shadow: 0 20px 40px rgba(0,0,0,0.08);
        border: 1px solid rgba(0,198,251,0.1);
        position: relative;
        overflow: hidden;
    }

    .card-detail::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: linear-gradient(145deg, #00c6fb, #005bea);
    }

    .title {
        font-size: 2rem;
        font-weight: 800;
        margin-bottom: 30px;
        color: #1e3c72;
        display: flex;
        align-items: center;
        gap: 12px;
        border-bottom: 2px solid #eef2f7;
        padding-bottom: 20px;
    }

    .title i {
        background: linear-gradient(145deg, #00c6fb, #005bea);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        font-size: 2rem;
    }

    /* Grid Layout */
    .detail-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-bottom: 30px;
    }

    .detail-item {
        background: #f8f9fc;
        border-radius: 16px;
        padding: 18px 22px;
        transition: all 0.3s ease;
        border: 1px solid #eef2f7;
    }

    .detail-item:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0,0,0,0.05);
        border-color: rgba(0,198,251,0.3);
    }

    .detail-item-full {
        grid-column: span 2;
    }

    .label {
        font-size: 0.75rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: 700;
        color: #6c757d;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .label i {
        color: #00c6fb;
        font-size: 0.9rem;
    }

    .value {
        font-size: 1.1rem;
        font-weight: 600;
        color: #2c3e50;
        line-height: 1.4;
        word-break: break-word;
    }

    .value-large {
        font-size: 1.3rem;
        font-weight: 800;
    }

    /* Badge Styles */
    .badge-custom {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 6px 16px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        color: white;
    }

    .badge-harian {
        background: linear-gradient(145deg, #28a745, #1e7e34);
        box-shadow: 0 4px 12px rgba(40,167,69,0.3);
    }

    .badge-event {
        background: linear-gradient(145deg, #007bff, #0056b3);
        box-shadow: 0 4px 12px rgba(0,123,255,0.3);
    }

    .badge-kategori {
        background: linear-gradient(145deg, #6c757d, #495057);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        color: white;
    }
    
    .badge-diskon {
        background: linear-gradient(145deg, #dc3545, #b02a37);
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        color: white;
    }

    .price-value {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(145deg, #1e3c72, #2a5298);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .price-value-after-diskon {
        font-size: 1.5rem;
        font-weight: 800;
        background: linear-gradient(145deg, #28a745, #1e7e34);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    
    .total-original {
        text-decoration: line-through;
        color: #f39c12;
        font-size: 0.9rem;
    }
    
    .diskon-info {
        background: linear-gradient(145deg, #fff5f5, #ffe3e3);
        border-radius: 12px;
        padding: 12px 16px;
        margin-top: 10px;
        border-left: 4px solid #dc3545;
    }

    /* Tabel Barang Styles */
    .table-container {
        overflow-x: auto;
        margin-top: 10px;
    }

    .table-barang {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .table-barang thead {
        background: linear-gradient(145deg, #1e3c72, #2a5298);
        color: white;
    }

    .table-barang th {
        padding: 12px 15px;
        text-align: left;
        font-weight: 600;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .table-barang td {
        padding: 12px 15px;
        border-bottom: 1px solid #eef2f7;
        color: #2c3e50;
    }

    .table-barang tbody tr:hover {
        background: #f8f9fc;
        transition: background 0.3s ease;
    }

    .table-barang tbody tr:last-child td {
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

    .text-success {
        color: #28a745;
    }

    .text-primary {
        color: #007bff;
    }
    
    .text-danger {
        color: #dc3545;
    }

    /* Summary Card */
    .summary-card {
        background: linear-gradient(145deg, #f8f9fc, #ffffff);
        border-radius: 16px;
        padding: 20px;
        margin-top: 20px;
        border: 1px solid #eef2f7;
    }
    
    .summary-card-total {
        background: linear-gradient(145deg, #28a745, #1e7e34);
        border-radius: 16px;
        padding: 20px;
        margin-top: 20px;
        color: white;
    }

    .summary-title {
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1px;
        color: #6c757d;
        margin-bottom: 10px;
    }

    .summary-amount {
        font-size: 2rem;
        font-weight: 800;
        color: #28a745;
    }
    
    .summary-amount-white {
        font-size: 2rem;
        font-weight: 800;
        color: white;
    }

    .summary-detail {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
        padding-top: 10px;
        border-top: 1px solid #eef2f7;
    }
    
    .calculation-box {
        background: #f8f9fc;
        border-radius: 16px;
        padding: 20px;
        margin-top: 20px;
        border: 1px solid #eef2f7;
    }
    
    .calculation-line {
        display: flex;
        justify-content: space-between;
        padding: 8px 0;
        border-bottom: 1px dashed #dee2e6;
    }
    
    .calculation-line.total {
        border-bottom: none;
        font-size: 1.2rem;
        font-weight: bold;
        color: #0f5132;
        background: #d1e7dd;
        margin-top: 10px;
        padding: 12px;
        border-radius: 8px;
    }
    
    .calculation-line.diskon {
        color: #dc3545;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        margin-top: 30px;
        padding-top: 20px;
        border-top: 2px dashed #e0e7ef;
        flex-wrap: wrap;
    }

    .btn-back, .btn-print, .btn-edit {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 12px 28px;
        border-radius: 12px;
        font-weight: 600;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-decoration: none;
    }

    .btn-back {
        background: linear-gradient(145deg, #6c757d, #495057);
        color: white;
        border: none;
    }

    .btn-print {
        background: linear-gradient(145deg, #dc3545, #b02a37);
        color: white;
        border: none;
    }

    .btn-edit {
        background: linear-gradient(145deg, #ffc107, #e0a800);
        color: #2c3e50;
        border: none;
    }

    .btn-back:hover, .btn-print:hover, .btn-edit:hover {
        transform: translateY(-3px);
        color: white;
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    }

    .btn-edit:hover {
        color: #2c3e50;
    }

    @media (max-width: 768px) {
        .container-detail {
            padding: 15px;
        }

        .card-detail {
            padding: 20px;
        }

        .detail-grid {
            grid-template-columns: 1fr;
            gap: 15px;
        }

        .detail-item-full {
            grid-column: span 1;
        }

        .title {
            font-size: 1.5rem;
        }

        .value-large {
            font-size: 1.1rem;
        }

        .action-buttons {
            flex-direction: column;
        }

        .btn-back, .btn-print, .btn-edit {
            justify-content: center;
        }

        .table-barang th, 
        .table-barang td {
            padding: 8px 10px;
            font-size: 0.85rem;
        }
    }

    /* Animations */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Print Styles */
    @media print {
        .btn-back, .btn-print, .btn-edit, .action-buttons, .navbar, .sidebar, footer {
            display: none !important;
        }
        
        .card-detail {
            box-shadow: none;
            padding: 0;
        }
        
        .card-detail::before {
            display: none;
        }
        
        .detail-item {
            background: none;
            border: 1px solid #ddd;
        }
        
        body {
            background: white;
        }

        .table-barang thead {
            background: #f1f5f9;
            color: #2c3e50;
        }
    }
</style>

<?php
// Decode JSON dari database
$items = [];
if (!empty($laporan['detail_json'])) {
    $items = json_decode($laporan['detail_json'], true);
}

// Hitung statistik
$totalItems = count($items);
$totalQuantity = array_sum(array_column($items, 'qty') ?: array_column($items, 'jumlah') ?: []);
$grandTotal = $laporan['total_harga'];

// Hitung durasi
$checkin = new DateTime($laporan['checkin']);
$checkout = new DateTime($laporan['checkout']);
$durasi = $checkin->diff($checkout);
$days = $durasi->days;

// Ambil data diskon (dari laporan atau dari sewa terkait)
$diskon = isset($laporan['diskon']) ? (float)$laporan['diskon'] : 0;
$diskonPersen = isset($laporan['diskon_persen']) ? (float)$laporan['diskon_persen'] : 0;

// 🔥 AMBIL SEMUA KATEGORI SEWA UNIK DARI ITEMS
$kategoriSewaList = [];
foreach ($items as $item) {
    $kategoriSewa = $item['kategori_sewa'] ?? $laporan['kategori'];
    if (!in_array($kategoriSewa, $kategoriSewaList)) {
        $kategoriSewaList[] = $kategoriSewa;
    }
}

// Hitung subtotal per hari
$subtotalPerHariSemua = 0;
foreach ($items as $item) {
    $harga = $item['harga'] ?? 0;
    $qty = $item['qty'] ?? $item['jumlah'] ?? 0;
    $subtotalPerHariSemua += ($harga * $qty);
}

// Total sebelum diskon sudah ada di $grandTotal
$totalSebelumDiskon = $grandTotal;
$totalSetelahDiskon = $totalSebelumDiskon - $diskon;
if ($totalSetelahDiskon < 0) $totalSetelahDiskon = 0;
?>

<div class="container-detail">
    <div class="card-detail">
        <div class="title">
            <i class="fas fa-file-alt"></i>
            Detail Laporan Penyewaan
            <small style="font-size: 0.8rem; margin-left: auto; color: #6c757d;">
                ID: #<?= str_pad($laporan['id'], 6, '0', STR_PAD_LEFT) ?>
            </small>
        </div>

        <div class="detail-grid">
            <!-- Nama Penyewa -->
            <div class="detail-item">
                <div class="label">
                    <i class="fas fa-user"></i> Nama Penyewa
                </div>
                <div class="value value-large">
                    <i class="fas fa-user-circle text-primary"></i>
                    <?= esc($laporan['nama_penyewa']) ?>
                </div>
            </div>

            <!-- Periode Sewa -->
            <div class="detail-item">
                <div class="label">
                    <i class="fas fa-calendar-check"></i> Tanggal Check In
                </div>
                <div class="value">
                    <i class="fas fa-calendar-day text-success"></i>
                    <?= date('d F Y', strtotime($laporan['checkin'])) ?>
                </div>
            </div>

            <div class="detail-item">
                <div class="label">
                    <i class="fas fa-calendar-times"></i> Tanggal Check Out
                </div>
                <div class="value">
                    <i class="fas fa-calendar-day text-danger"></i>
                    <?= date('d F Y', strtotime($laporan['checkout'])) ?>
                </div>
            </div>

            <!-- Durasi -->
            <div class="detail-item">
                <div class="label">
                    <i class="fas fa-clock"></i> Durasi Sewa
                </div>
                <div class="value">
                    <i class="fas fa-hourglass-half text-primary"></i>
                    <strong><?= $days ?></strong> hari
                    <?php if ($days == 0): ?>
                        <small class="text-muted">(kurang dari 24 jam)</small>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Lokasi -->
            <?php if (!empty($laporan['lokasi'])): ?>
            <div class="detail-item">
                <div class="label">
                    <i class="fas fa-map-marker-alt"></i> Lokasi / Venue
                </div>
                <div class="value">
                    <i class="fas fa-location-dot text-primary"></i>
                    <?= esc($laporan['lokasi']) ?>
                </div>
            </div>
            <?php endif; ?>
            
            <!-- 🔥 Kategori Sewa (MENAMPILKAN SEMUA KATEGORI UNIK) -->
            <div class="detail-item">
                <div class="label">
                    <i class="fas fa-tags"></i> Kategori Sewa
                </div>
                <div class="value">
                    <?php 
                    if (!empty($kategoriSewaList)) {
                        foreach ($kategoriSewaList as $kat) {
                            if ($kat == 'harian') {
                                echo '<span class="badge-custom badge-harian" style="font-size: 0.85rem; margin-right: 8px; display: inline-flex;">
                                        <i class="fas fa-calendar-week"></i> Harian
                                      </span> ';
                            } else {
                                echo '<span class="badge-custom badge-event" style="font-size: 0.85rem; margin-right: 8px; display: inline-flex;">
                                        <i class="fas fa-star"></i> Event
                                      </span> ';
                            }
                        }
                    } else {
                        if ($laporan['kategori'] == 'harian') {
                            echo '<span class="badge-custom badge-harian" style="font-size: 0.85rem;">
                                    <i class="fas fa-calendar-week"></i> Harian
                                  </span>';
                        } else {
                            echo '<span class="badge-custom badge-event" style="font-size: 0.85rem;">
                                    <i class="fas fa-star"></i> Event
                                  </span>';
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Tanggal Dibuat -->
            <div class="detail-item">
                <div class="label">
                    <i class="fas fa-calendar-alt"></i> Tanggal Dibuat
                </div>
                <div class="value">
                    <i class="fas fa-clock text-info"></i>
                    <?= date('d F Y, H:i:s', strtotime($laporan['created_at'])) ?>
                </div>
            </div>
            
            <!-- Diskon -->
            <?php if ($diskon > 0): ?>
            <div class="detail-item">
                <div class="label">
                    <i class="fas fa-tag"></i> Diskon / Potongan Harga
                </div>
                <div class="value">
                    <span class="badge-diskon">
                        <i class="fas fa-percent"></i>
                        <?= $diskonPersen > 0 ? $diskonPersen . '%' : 'Nominal' ?>
                    </span>
                    <div class="mt-1">
                        <span class="text-danger fw-bold">- Rp <?= number_format($diskon, 0, ',', '.') ?></span>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>

        <!-- Tabel Detail Barang -->
        <div class="detail-item detail-item-full" style="padding: 0;">
            <div class="label" style="padding: 18px 22px 0 22px;">
                <i class="fas fa-boxes"></i> Daftar Barang yang Disewa
            </div>
            <div class="value" style="padding: 0 22px 18px 22px;">
                <?php if (!empty($items)): ?>
                    <div class="table-container">
                        <table class="table-barang">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Kategori Sewa</th>
                                    <th class="text-center">Jumlah</th>
                                    <th class="text-right">Harga</th>
                                    <th class="text-right">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($items as $item): ?>
                                    <?php 
                                    $itemKategoriSewa = $item['kategori_sewa'] ?? $laporan['kategori'];
                                    $hargaItem = $item['harga'] ?? 0;
                                    $qtyItem = $item['qty'] ?? $item['jumlah'] ?? 0;
                                    $subtotalItem = $item['subtotal'] ?? ($hargaItem * $qtyItem * ($itemKategoriSewa == 'harian' ? $days : 1));
                                    ?>
                                    <tr>
                                        <td class="text-center" style="width: 50px;"><?= $no++ ?></td>
                                        <td>
                                            <strong><?= esc($item['nama_barang'] ?? $item['nama'] ?? '-') ?></strong>
                                        </td>
                                        <td>
                                            <span class="badge-kategori">
                                                <i class="fas fa-tag"></i>
                                                <?= esc($item['kategori'] ?? '-') ?>
                                            </span>
                                        </td>
                                        <td>
                                            <?php if ($itemKategoriSewa == 'harian'): ?>
                                                <span class="badge-custom badge-harian" style="font-size: 0.7rem; padding: 3px 10px;">
                                                    <i class="fas fa-calendar-week"></i> Harian
                                                </span>
                                            <?php else: ?>
                                                <span class="badge-custom badge-event" style="font-size: 0.7rem; padding: 3px 10px;">
                                                    <i class="fas fa-star"></i> Event
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <span class="badge-kategori">
                                                <i class="fas fa-times-circle"></i> <?= number_format($qtyItem) ?>
                                            </span>
                                        </td>
                                        <td class="text-right">
                                            Rp <?= number_format($hargaItem, 0, ',', '.') ?>
                                        </td>
                                        <td class="text-right font-bold text-success">
                                            Rp <?= number_format($subtotalItem, 0, ',', '.') ?>
                                            <?php if ($itemKategoriSewa == 'harian' && $days > 0): ?>
                                                <small class="text-muted d-block">(<?= number_format($hargaItem * $qtyItem, 0, ',', '.') ?>/hari × <?= $days ?> hari)</small>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Calculation Box (Rincian Perhitungan) -->
                    <div class="calculation-box">
                        <h6 class="fw-bold text-primary mb-3">
                            <i class="fas fa-calculator me-2"></i> Rincian Perhitungan
                        </h6>
                        
                        <div class="calculation-line">
                            <span>
                                <i class="fas fa-box text-secondary me-1"></i> Subtotal per Hari 
                                <small class="text-muted">(Harga × Jumlah)</small>
                            </span>
                            <span class="fw-bold">Rp <?= number_format($subtotalPerHariSemua, 0, ',', '.') ?></span>
                        </div>
                        
                        <div class="calculation-line">
                            <span>
                                <i class="fas fa-calendar-week text-secondary me-1"></i> Durasi Sewa
                            </span>
                            <span>
                                <span class="badge-durasi" style="background: #0d6efd; color: white; padding: 4px 12px; border-radius: 20px;">
                                    <?= $days ?> Hari
                                </span>
                            </span>
                        </div>
                        
                        <div class="calculation-line">
                            <span>
                                <i class="fas fa-plus-circle text-secondary me-1"></i> Total Sebelum Diskon 
                                <small class="text-muted">(Rp <?= number_format($subtotalPerHariSemua, 0, ',', '.') ?> × <?= $days ?> hari)</small>
                            </span>
                            <span class="fw-bold">Rp <?= number_format($totalSebelumDiskon, 0, ',', '.') ?></span>
                        </div>
                        
                        <?php if ($diskon > 0): ?>
                        <div class="calculation-line diskon">
                            <span>
                                <i class="fas fa-tag text-danger me-1"></i> Diskon 
                                <?= $diskonPersen > 0 ? '(' . $diskonPersen . '% dari total)' : '(Nominal)' ?>
                            </span>
                            <span class="fw-bold">- Rp <?= number_format($diskon, 0, ',', '.') ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <div class="calculation-line total">
                            <span>
                                <i class="fas fa-cash-stack text-success me-1"></i> TOTAL YANG HARUS DIBAYAR
                            </span>
                            <span class="text-success fs-4 fw-bold">Rp <?= number_format($totalSetelahDiskon, 0, ',', '.') ?></span>
                        </div>
                    </div>

                    <!-- Summary Card -->
                    <div class="summary-card">
                        <div class="summary-title">
                            <i class="fas fa-chart-line"></i> Ringkasan Penyewaan
                        </div>
                        <div class="summary-detail">
                            <div>
                                <small class="text-muted">Total Item</small>
                                <div class="font-bold" style="font-size: 1.2rem;"><?= $totalItems ?> jenis</div>
                            </div>
                            <div>
                                <small class="text-muted">Total Quantity</small>
                                <div class="font-bold" style="font-size: 1.2rem;"><?= $totalQuantity ?> unit</div>
                            </div>
                            <div>
                                <small class="text-muted">Durasi Sewa</small>
                                <div class="font-bold" style="font-size: 1.2rem;"><?= $days ?> hari</div>
                            </div>
                        </div>
                        
                        <?php if ($diskon > 0): ?>
                        <div class="diskon-info">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <i class="fas fa-gift text-danger me-1"></i>
                                    <strong class="text-danger">Potongan Harga</strong>
                                </div>
                                <div class="text-danger fw-bold">- Rp <?= number_format($diskon, 0, ',', '.') ?></div>
                            </div>
                            <div class="total-original mt-2">
                                <small>Harga sebelum diskon: Rp <?= number_format($totalSebelumDiskon, 0, ',', '.') ?></small>
                            </div>
                        </div>
                        <?php endif; ?>
                        
                        <div class="summary-detail" style="margin-top: 15px; border-top: 2px solid #eef2f7;">
                            <div>
                                <strong class="text-muted">GRAND TOTAL</strong>
                            </div>
                            <div>
                                <span class="summary-amount">Rp <?= number_format($totalSetelahDiskon, 0, ',', '.') ?></span>
                            </div>
                        </div>
                        
                        <?php if ($laporan['kategori'] == 'harian'): ?>
                        <div class="text-muted" style="margin-top: 10px; font-size: 0.8rem;">
                            <i class="fas fa-info-circle"></i> 
                            *Harga sudah termasuk biaya sewa per hari untuk seluruh item
                        </div>
                        <?php endif; ?>
                    </div>
                    
                    <!-- Total Card with Discount Highlight -->
                    <div class="summary-card-total">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <small class="text-white-50">TOTAL PEMBAYARAN</small>
                                <?php if ($diskon > 0): ?>
                                <div class="small text-white-50 mb-1">
                                    <?= number_format($subtotalPerHariSemua, 0, ',', '.') ?> (subtotal/hari) × <?= $days ?> hari = <?= number_format($totalSebelumDiskon, 0, ',', '.') ?>
                                </div>
                                <div class="total-original mb-1 text-white-50">
                                    <small>Sebelum diskon: Rp <?= number_format($totalSebelumDiskon, 0, ',', '.') ?></small>
                                </div>
                                <div class="mb-2">
                                    <span class="badge-diskon" style="background: rgba(255,255,255,0.2);">
                                        <i class="fas fa-tag me-1"></i> Hemat Rp <?= number_format($diskon, 0, ',', '.') ?> <?= $diskonPersen > 0 ? '(' . $diskonPersen . '% off)' : '' ?>
                                    </span>
                                </div>
                                <?php endif; ?>
                                <div class="fw-bold fs-1 text-white">Rp <?= number_format($totalSetelahDiskon, 0, ',', '.') ?></div>
                            </div>
                            <div>
                                <i class="fas fa-receipt fs-1 text-white-50"></i>
                            </div>
                        </div>
                    </div>
                <?php else: ?>
                    <div class="text-center text-muted" style="padding: 40px;">
                        <i class="fas fa-box-open" style="font-size: 3rem; margin-bottom: 10px; display: block;"></i>
                        Tidak ada data barang yang disewa
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Deskripsi -->
        <?php if (!empty($laporan['deskripsi'])): ?>
        <div class="detail-item detail-item-full">
            <div class="label">
                <i class="fas fa-align-left"></i> Deskripsi / Catatan
            </div>
            <div class="value">
                <div class="alert alert-light" style="background: #f8f9fc; border-left: 4px solid #00c6fb; padding: 15px; border-radius: 8px;">
                    <?= esc($laporan['deskripsi']) ?>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="action-buttons">
            <a href="<?= base_url('laporan') ?>" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Daftar
            </a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animasi fade in untuk detail items
    const items = document.querySelectorAll('.detail-item');
    items.forEach((item, index) => {
        item.style.animation = `fadeInUp 0.5s ease-out ${index * 0.05}s both`;
    });

    // Tooltip untuk badge (optional)
    const badges = document.querySelectorAll('.badge-custom, .badge-kategori, .badge-diskon');
    badges.forEach(badge => {
        badge.addEventListener('mouseenter', function() {
            this.style.transform = 'scale(1.05)';
            this.style.transition = 'transform 0.2s ease';
        });
        badge.addEventListener('mouseleave', function() {
            this.style.transform = 'scale(1)';
        });
    });
});
</script>

<?= $this->endSection() ?>