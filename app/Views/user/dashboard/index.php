<?= $this->extend('user/layout') ?>
<?= $this->section('content') ?>

<style>
/* ============================================
   DASHBOARD STYLES - ENHANCED VERSION
   ============================================ */
   
:root {
    --primary-dark: #1e3c72;
    --primary-light: #2a5298;
    --success: #10b981;
    --danger: #ef4444;
    --warning: #f59e0b;
    --info: #3b82f6;
    --purple: #8b5cf6;
    --pink: #ec4899;
    --gray-bg: #f8fafc;
}

/* Header Styles */
.dashboard-header {
    margin-bottom: 2rem;
    padding-bottom: 1rem;
    border-bottom: 2px solid rgba(0,0,0,0.05);
}

.page-title {
    font-size: 1.75rem;
    font-weight: 800;
    background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    margin: 0;
}

.welcome-text {
    font-size: 0.9rem;
    color: #64748b;
    margin-top: 0.5rem;
}

.welcome-text i {
    color: var(--warning);
}

.date-badge {
    background: linear-gradient(135deg, #f8fafc, #f1f5f9);
    padding: 0.5rem 1rem;
    border-radius: 12px;
    font-size: 0.85rem;
    color: #1e293b;
    margin-right: 1rem;
    border: 1px solid #e2e8f0;
    font-weight: 500;
}

.live-clock {
    background: linear-gradient(135deg, var(--primary-dark), var(--primary-light));
    color: white;
    padding: 0.5rem 1.2rem;
    border-radius: 12px;
    font-size: 1rem;
    font-weight: 600;
    font-family: 'Courier New', monospace;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1);
}

/* Stat Cards */
.stat-card {
    background: white;
    border-radius: 20px;
    padding: 1.5rem;
    position: relative;
    overflow: hidden;
    transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 0 1px 3px rgba(0,0,0,0.05);
    border: 1px solid rgba(0,0,0,0.05);
    height: 100%;
}

.stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.02);
}

.stat-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
}

.stat-card.success::before { background: linear-gradient(90deg, var(--success), #34d399); }
.stat-card.danger::before { background: linear-gradient(90deg, var(--danger), #f87171); }
.stat-card.primary::before { background: linear-gradient(90deg, var(--info), #60a5fa); }
.stat-card.warning::before { background: linear-gradient(90deg, var(--warning), #fbbf24); }
.stat-card.purple::before { background: linear-gradient(90deg, var(--purple), #a78bfa); }
.stat-card.pink::before { background: linear-gradient(90deg, var(--pink), #f472b6); }

.stat-icon {
    position: absolute;
    right: 1.5rem;
    top: 1.5rem;
    width: 48px;
    height: 48px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    transition: transform 0.3s ease;
}

.stat-card:hover .stat-icon {
    transform: scale(1.1) rotate(5deg);
}

.stat-icon.success {
    background: rgba(16, 185, 129, 0.1);
    color: var(--success);
}

.stat-icon.danger {
    background: rgba(239, 68, 68, 0.1);
    color: var(--danger);
}

.stat-icon.primary {
    background: rgba(59, 130, 246, 0.1);
    color: var(--info);
}

.stat-icon.warning {
    background: rgba(245, 158, 11, 0.1);
    color: var(--warning);
}

.stat-icon.purple {
    background: rgba(139, 92, 246, 0.1);
    color: var(--purple);
}

.stat-icon.pink {
    background: rgba(236, 72, 153, 0.1);
    color: var(--pink);
}

.stat-label {
    font-size: 0.7rem;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    font-weight: 700;
    margin-bottom: 0.5rem;
}

.stat-label.success { color: var(--success); }
.stat-label.danger { color: var(--danger); }
.stat-label.primary { color: var(--info); }
.stat-label.warning { color: var(--warning); }
.stat-label.purple { color: var(--purple); }
.stat-label.pink { color: var(--pink); }

.stat-value {
    font-size: 1.75rem;
    font-weight: 800;
    color: #0f172a;
    margin-bottom: 0.5rem;
    line-height: 1.2;
}

.stat-trend {
    font-size: 0.7rem;
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

.stat-trend.up { color: var(--success); }
.stat-trend.down { color: var(--danger); }

/* Section Cards */
.section-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
    border: 1px solid #f1f5f9;
}

.section-card:hover {
    box-shadow: 0 10px 15px -3px rgba(0,0,0,0.1);
}

.card-header-custom {
    padding: 1rem 1.5rem;
    background: linear-gradient(135deg, #fafbff, #ffffff);
    border-bottom: 2px solid #f1f5f9;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.card-header-custom h6 {
    margin: 0;
    font-weight: 800;
    color: #0f172a;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.card-header-custom h6 i {
    margin-right: 0.5rem;
    font-size: 1rem;
}

.btn-view-all {
    font-size: 0.75rem;
    color: var(--info);
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s;
    padding: 0.25rem 0.75rem;
    border-radius: 8px;
    background: rgba(59, 130, 246, 0.1);
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    cursor: pointer;
    border: none;
}

.btn-view-all:hover {
    background: var(--info);
    color: white;
    text-decoration: none;
}

.card-body-custom {
    padding: 1.5rem;
}

/* Table Styles */
.table-modern {
    width: 100%;
    border-collapse: collapse;
}

.table-modern thead th {
    text-align: left;
    padding: 0.875rem 1rem;
    background: #f8fafc;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #64748b;
    border-bottom: 2px solid #e2e8f0;
}

.table-modern tbody tr {
    transition: all 0.2s ease;
}

.table-modern tbody tr:hover {
    background: #f8fafc;
}

.table-modern tbody td {
    padding: 1rem;
    border-bottom: 1px solid #f1f5f9;
    font-size: 0.875rem;
    vertical-align: middle;
}

/* Badge Transaksi */
.badge-transaksi {
    display: inline-flex;
    align-items: center;
    gap: 0.375rem;
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 0.7rem;
    font-weight: 700;
}

.badge-masuk {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.1), rgba(16, 185, 129, 0.05));
    color: var(--success);
    border: 1px solid rgba(16, 185, 129, 0.2);
}

.badge-keluar {
    background: linear-gradient(135deg, rgba(239, 68, 68, 0.1), rgba(239, 68, 68, 0.05));
    color: var(--danger);
    border: 1px solid rgba(239, 68, 68, 0.2);
}

/* Badge Kategori Sewa */
.badge-kategori-sewa {
    display: inline-flex;
    align-items: center;
    gap: 0.25rem;
    padding: 0.2rem 0.6rem;
    border-radius: 20px;
    font-size: 0.65rem;
    font-weight: 600;
    margin: 2px 2px;
}

.badge-sewa-harian {
    background: linear-gradient(135deg, rgba(16, 185, 129, 0.15), rgba(16, 185, 129, 0.05));
    color: #10b981;
    border: 1px solid rgba(16, 185, 129, 0.3);
}

.badge-sewa-event {
    background: linear-gradient(135deg, rgba(59, 130, 246, 0.15), rgba(59, 130, 246, 0.05));
    color: #3b82f6;
    border: 1px solid rgba(59, 130, 246, 0.3);
}

/* Expand/Collapse Icon */
.expand-icon {
    cursor: pointer;
    color: #009fa5;
    transition: transform 0.2s;
    display: inline-block;
    font-size: 1rem;
}

.expand-icon.rotated {
    transform: rotate(90deg);
}

.child-row {
    background-color: #f8f9fc;
}

.child-row td {
    padding-left: 3rem !important;
}

/* Stok Item */
.stok-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    margin-bottom: 0.75rem;
    background: #f8fafc;
    border-radius: 12px;
    transition: all 0.3s ease;
}

.stok-item:hover {
    background: #f1f5f9;
    transform: translateX(5px);
}

.stok-info {
    flex: 1;
}

.stok-info h6 {
    margin: 0 0 0.25rem 0;
    font-size: 0.9rem;
    font-weight: 700;
}

.stok-sisa {
    text-align: right;
    margin-left: 1rem;
}

.nilai {
    font-size: 1.1rem;
    font-weight: 700;
}

/* Operator Cards */
.operator-card {
    background: linear-gradient(135deg, #fafbff, #ffffff);
    border-radius: 16px;
    padding: 1rem;
    margin-bottom: 0.75rem;
    transition: all 0.3s ease;
    border: 1px solid #f1f5f9;
}

.operator-card:hover {
    transform: translateX(5px);
    border-color: rgba(59, 130, 246, 0.3);
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
}

.operator-avatar-large {
    width: 48px;
    height: 48px;
    background: linear-gradient(135deg, var(--purple), #a78bfa);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 700;
    font-size: 1.2rem;
    margin-right: 1rem;
    box-shadow: 0 4px 6px -1px rgba(139, 92, 246, 0.3);
}

/* Barang Keluar Card */
.barang-keluar-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 4px 6px -1px rgba(0,0,0,0.05);
    margin-bottom: 1.5rem;
    border: 1px solid #f1f5f9;
}

.barang-keluar-header {
    padding: 1rem 1.5rem;
    background: linear-gradient(135deg, #fafbff, #ffffff);
    border-bottom: 2px solid #f1f5f9;
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.barang-keluar-header h6 {
    margin: 0;
    font-weight: 800;
    color: #e74a3b;
    font-size: 0.85rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.barang-keluar-header h6 i {
    margin-right: 0.5rem;
    font-size: 1rem;
}

.badge-keluar-count {
    background: #e74a3b;
    color: white;
    padding: 2px 8px;
    border-radius: 20px;
    font-size: 0.7rem;
    margin-left: 8px;
}

.table-keluar {
    width: 100%;
    border-collapse: collapse;
}

.table-keluar thead th {
    text-align: left;
    padding: 0.75rem 1rem;
    background: #f8fafc;
    font-size: 0.7rem;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #64748b;
    border-bottom: 2px solid #e2e8f0;
}

.table-keluar tbody td {
    padding: 0.75rem 1rem;
    border-bottom: 1px solid #f1f5f9;
    font-size: 0.8rem;
    vertical-align: middle;
}

.badge-jumlah-keluar {
    background-color: #e74a3b;
    font-size: 11px;
    padding: 4px 10px;
    border-radius: 20px;
    font-weight: 600;
    color: white;
    display: inline-block;
}

.badge-admin {
    background-color: #1cc88a;
    font-size: 11px;
    padding: 4px 10px;
    border-radius: 8px;
    color: white;
}

/* Empty State */
.empty-state {
    text-align: center;
    padding: 3rem 2rem;
}

.empty-state i {
    font-size: 3rem;
    color: #cbd5e1;
    margin-bottom: 1rem;
}

.empty-state p {
    color: #94a3b8;
    margin: 0;
}

/* Responsive */
@media (max-width: 768px) {
    .table-modern thead {
        display: none;
    }
    
    .table-modern tbody td {
        display: block;
        padding: 0.75rem;
        text-align: right;
        border-bottom: none;
        position: relative;
        padding-left: 50%;
    }
    
    .table-modern tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 0.75rem;
        width: 45%;
        text-align: left;
        font-weight: 700;
        color: #64748b;
        font-size: 0.75rem;
    }
    
    .table-modern tbody tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
    }
    
    .table-keluar thead {
        display: none;
    }
    
    .table-keluar tbody td {
        display: block;
        padding: 0.75rem;
        text-align: right;
        border-bottom: none;
        position: relative;
        padding-left: 50%;
    }
    
    .table-keluar tbody td::before {
        content: attr(data-label);
        position: absolute;
        left: 0.75rem;
        width: 45%;
        text-align: left;
        font-weight: 700;
        color: #64748b;
        font-size: 0.75rem;
    }
    
    .table-keluar tbody tr {
        display: block;
        margin-bottom: 1rem;
        border: 1px solid #e2e8f0;
        border-radius: 12px;
        overflow: hidden;
    }
}
</style>

<div class="container-fluid px-4">
    <!-- Header -->
    <div class="dashboard-header d-flex align-items-center justify-content-between flex-wrap">
        <div>
            <h1 class="page-title">
                <i class="fas fa-chart-line me-3"></i>
                Dashboard Overview
            </h1>
            <div class="welcome-text">
                <i class="fas fa-smile-wink me-2"></i>
                Selamat datang kembali, <strong><?= session()->get('email') ?></strong> | 
                <i class="fas fa-chart-simple me-1"></i> Berikut ringkasan sistem hari ini
            </div>
        </div>
        <div class="d-flex align-items-center">
            <div class="date-badge">
                <i class="far fa-calendar-alt me-2"></i>
                <?= date('l, d F Y') ?>
            </div>
            <div class="live-clock" id="liveClock">
                <i class="far fa-clock me-2"></i>
                <?= date('H:i:s') ?>
            </div>
        </div>
    </div>

    <!-- Stat Cards Row -->
    <div class="row g-4 mb-4">
        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
            <div class="stat-card success">
                <div class="stat-icon success"><i class="fas fa-arrow-down"></i></div>
                <div class="stat-label success">Barang Masuk</div>
                <div class="stat-value"><?= number_format($todayMasuk ?? 0) ?></div>
                <div class="stat-trend up"><i class="fas fa-chart-line"></i> Hari ini</div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
            <div class="stat-card danger">
                <div class="stat-icon danger"><i class="fas fa-arrow-up"></i></div>
                <div class="stat-label danger">Barang Keluar</div>
                <div class="stat-value"><?= number_format($todayKeluar ?? 0) ?></div>
                <div class="stat-trend down"><i class="fas fa-chart-line"></i> Hari ini</div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
            <div class="stat-card primary">
                <div class="stat-icon primary"><i class="fas fa-boxes"></i></div>
                <div class="stat-label primary">Total Stok</div>
                <div class="stat-value"><?= number_format($totalStok ?? 0) ?></div>
                <div class="stat-trend"><i class="fas fa-tag"></i> <?= $jumlahBarang ?? 0 ?> item</div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
            <div class="stat-card purple">
                <div class="stat-icon purple"><i class="fas fa-exchange-alt"></i></div>
                <div class="stat-label purple">Total Transaksi</div>
                <div class="stat-value"><?= number_format($totalTransaksi ?? 0) ?></div>
                <div class="stat-trend"><i class="fas fa-history"></i> Semua waktu</div>
            </div>
        </div>
        <div class="col-xl-2 col-lg-4 col-md-4 col-sm-6">
            <div class="stat-card warning">
                <div class="stat-icon warning"><i class="fas fa-calendar-check"></i></div>
                <div class="stat-label warning">Penyewaan Aktif</div>
                <div class="stat-value"><?= number_format($penyewaanAktif ?? 0) ?></div>
                <div class="stat-trend"><i class="fas fa-clock"></i> Sedang berlangsung</div>
            </div>
        </div>
    </div>

    <!-- Main Content Row -->
    <div class="row g-4">
        <!-- Left Column -->
        <div class="col-xl-8 col-lg-7">
            <!-- Transaksi Barang Hari Ini dengan GROUP & ACCORDION -->
            <div class="section-card">
                <div class="card-header-custom">
                    <h6>
                        <i class="fas fa-history text-primary"></i>
                        Transaksi Barang Hari Ini
                        <span class="badge bg-primary ms-2" style="font-size: 0.7rem;"><?= count($transaksiHariIni ?? []) ?></span>
                    </h6>
                    <a href="/transaksi" class="btn-view-all">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body-custom">
                    <div class="table-responsive">
                        <table class="table-modern" id="transaksiTable">
                            <thead>
                                <tr>
                                    <th style="width: 5%"></th>
                                    <th>ID</th>
                                    <th>Waktu</th>
                                    <th>Jenis</th>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Operator</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($transaksiHariIni)): ?>
                                    <?php 
                                    // Group transaksi berdasarkan nama barang
                                    $grouped = [];
                                    foreach ($transaksiHariIni as $t) {
                                        $grouped[$t['nama_barang']][] = $t;
                                    }
                                    $rowId = 0;
                                    ?>
                                    <?php foreach ($grouped as $namaBarang => $items): ?>
                                        <?php 
                                        $firstItem = $items[0];
                                        $totalMasuk = 0;
                                        $totalKeluar = 0;
                                        foreach ($items as $item) {
                                            if ($item['jenis_transaksi'] == 'masuk') {
                                                $totalMasuk += $item['jumlah'];
                                            } else {
                                                $totalKeluar += $item['jumlah'];
                                            }
                                        }
                                        $netto = $totalMasuk - $totalKeluar;
                                        ?>
                                        <tr class="parent-row" style="cursor: pointer;" onclick="toggleChild(this, <?= $rowId ?>)">
                                            <td class="text-center">
                                                <?php if (count($items) > 1): ?>
                                                    <i class="fas fa-chevron-right expand-icon" id="icon-<?= $rowId ?>"></i>
                                                <?php else: ?>
                                                    <span style="width: 20px; display: inline-block;"></span>
                                                <?php endif; ?>
                                            </td>
                                            <td data-label="ID">
                                                <?php if (count($items) > 1): ?>
                                                    <span class="badge bg-secondary"><?= count($items) ?> transaksi</span>
                                                <?php else: ?>
                                                    #<?= $firstItem['id'] ?>
                                                <?php endif; ?>
                                            </td>
                                            <td data-label="Waktu">
                                                <strong><?= $firstItem['jam'] ?? date('H:i', strtotime($firstItem['tanggal'])) ?></strong>
                                                <br><small><?= date('d/m/Y', strtotime($firstItem['tanggal'])) ?></small>
                                            </td>
                                            <td data-label="Jenis">
                                                <?php if ($totalMasuk > 0 && $totalKeluar > 0): ?>
                                                    <span class="badge-transaksi badge-masuk">↓ MASUK</span>
                                                    <span class="badge-transaksi badge-keluar ms-1">↑ KELUAR</span>
                                                <?php elseif ($totalMasuk > 0): ?>
                                                    <span class="badge-transaksi badge-masuk">↓ MASUK</span>
                                                <?php else: ?>
                                                    <span class="badge-transaksi badge-keluar">↑ KELUAR</span>
                                                <?php endif; ?>
                                            </td>
                                            <td data-label="Barang">
                                                <strong><?= $namaBarang ?></strong>
                                                <?php if (count($items) > 1): ?>
                                                    <span class="badge bg-secondary ms-2"><?= count($items) ?>x</span>
                                                <?php endif; ?>
                                            </td>
                                            <td data-label="Jumlah">
                                                <strong class="<?= $netto > 0 ? 'text-success' : ($netto < 0 ? 'text-danger' : '') ?>">
                                                    <?= $netto > 0 ? '+' : '' ?><?= number_format($netto) ?>
                                                </strong>
                                                <small><?= $firstItem['satuan'] ?? 'pcs' ?></small>
                                                <?php if ($totalMasuk > 0 && $totalKeluar > 0): ?>
                                                    <br><small class="text-success">Masuk: +<?= number_format($totalMasuk) ?></small>
                                                    <br><small class="text-danger">Keluar: -<?= number_format($totalKeluar) ?></small>
                                                <?php endif; ?>
                                            </td>
                                            <td data-label="Operator">
                                                <span><?= $firstItem['operator'] ?? 'Tidak diketahui' ?></span>
                                            </td>
                                        </tr>
                                        
                                        <!-- Child rows untuk detail transaksi -->
                                        <?php if (count($items) > 1): ?>
                                            <?php foreach ($items as $item): ?>
                                                <tr class="child-row" id="child-<?= $rowId ?>" style="display: none;">
                                                    <td class="text-center">↳</td>
                                                    <td data-label="ID">#<?= $item['id'] ?></td>
                                                    <td data-label="Waktu">
                                                        <strong><?= $item['jam'] ?? date('H:i', strtotime($item['tanggal'])) ?></strong>
                                                        <br><small><?= date('d/m/Y', strtotime($item['tanggal'])) ?></small>
                                                    </td>
                                                    <td data-label="Jenis">
                                                        <span class="badge-transaksi <?= $item['jenis_transaksi'] == 'masuk' ? 'badge-masuk' : 'badge-keluar' ?>">
                                                            <i class="fas <?= $item['jenis_transaksi'] == 'masuk' ? 'fa-arrow-down' : 'fa-arrow-up' ?>"></i>
                                                            <?= strtoupper($item['jenis_transaksi']) ?>
                                                        </span>
                                                    </td>
                                                    <td data-label="Barang"><?= $item['nama_barang'] ?></td>
                                                    <td data-label="Jumlah">
                                                        <strong class="<?= $item['jenis_transaksi'] == 'masuk' ? 'text-success' : 'text-danger' ?>">
                                                            <?= $item['jenis_transaksi'] == 'masuk' ? '+' : '-' ?><?= number_format($item['jumlah']) ?>
                                                        </strong>
                                                        <small><?= $item['satuan'] ?? 'pcs' ?></small>
                                                    </td>
                                                    <td data-label="Operator"><?= $item['operator'] ?? 'Tidak diketahui' ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                        <?php $rowId++; ?>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="7">
                                            <div class="empty-state">
                                                <i class="fas fa-inbox"></i>
                                                <p>Belum ada transaksi barang hari ini</p>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Transaksi Penyewaan Hari Ini - DIPERBAIKI MENAMPILKAN SEMUA KATEGORI -->
            <div class="section-card mt-4">
                <div class="card-header-custom">
                    <h6>
                        <i class="fas fa-file-signature text-success"></i>
                        Transaksi Penyewaan Hari Ini
                        <span class="badge bg-success ms-2" style="font-size: 0.7rem;"><?= count($penyewaanHariIni ?? []) ?></span>
                    </h6>
                    <button type="button" class="btn-view-all" onclick="exportToExcel()">
                        <i class="fas fa-file-excel"></i> Export Excel
                    </button>
                </div>
                <div class="card-body-custom">
                    <div class="table-responsive">
                        <table class="table-modern" id="tablePenyewaan">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Waktu</th>
                                    <th>Penyewa</th>
                                    <th>Kategori Sewa</th>
                                    <th>Durasi</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($penyewaanHariIni)): ?>
                                    <?php foreach ($penyewaanHariIni as $s): ?>
                                    <tr>
                                        <td>#<?= str_pad($s['id'], 6, '0', STR_PAD_LEFT) ?></td>
                                        <td>
                                            <strong><?= $s['jam'] ?? date('H:i', strtotime($s['created_at'])) ?></strong>
                                            <br><small><?= date('d/m/Y', strtotime($s['created_at'])) ?></small>
                                        </td>
                                        <td><strong><?= esc($s['nama_penyewa']) ?></strong></td>
                                        <td>
                                            <?php 
                                            // 🔥 GUNAKAN kategori_list dari CONTROLLER (sudah disiapkan)
                                            if (!empty($s['kategori_list'])): 
                                                foreach ($s['kategori_list'] as $kat):
                                                    if (strtolower($kat) == 'harian'):
                                            ?>
                                                <span class="badge-kategori-sewa badge-sewa-harian">
                                                    <i class="fas fa-calendar-week"></i> Harian
                                                </span>
                                            <?php 
                                                    else:
                                            ?>
                                                <span class="badge-kategori-sewa badge-sewa-event">
                                                    <i class="fas fa-star"></i> Event
                                                </span>
                                            <?php 
                                                    endif;
                                                endforeach;
                                            else:
                                                // Fallback ke kategori laporan jika kategori_list kosong
                                                $kategoriLaporan = $s['kategori'] ?? 'event';
                                                if ($kategoriLaporan == 'harian'):
                                            ?>
                                                <span class="badge-kategori-sewa badge-sewa-harian">
                                                    <i class="fas fa-calendar-week"></i> Harian
                                                </span>
                                            <?php else: ?>
                                                <span class="badge-kategori-sewa badge-sewa-event">
                                                    <i class="fas fa-star"></i> Event
                                                </span>
                                            <?php 
                                                endif;
                                            endif; 
                                            ?>
                                        </td>
                                        <td><strong><?= $s['durasi'] ?? max(1, (new DateTime($s['checkout']))->diff(new DateTime($s['checkin']))->days) ?></strong> hari</td>
                                        <td><strong class="text-success">Rp <?= number_format($s['total_harga'], 0, ',', '.') ?></strong></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="6" class="empty-state">Belum ada penyewaan</td><td style="display: none;"></td><td style="display: none;"></td><td style="display: none;"></td><td style="display: none;"></td><td style="display: none;"></td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Column -->
        <div class="col-xl-4 col-lg-5">
            <!-- Stok Hampir Habis -->
            <div class="section-card">
                <div class="card-header-custom">
                    <h6><i class="fas fa-exclamation-triangle text-warning"></i> Stok Kritis & Hampir Habis</h6>
                </div>
                <div class="card-body-custom">
                    <?php if (!empty($stokRendah)): ?>
                        <?php foreach ($stokRendah as $barang): ?>
                        <div class="stok-item">
                            <div class="stok-info">
                                <h6><?= $barang['nama_barang'] ?></h6>
                                <small><?= $barang['kode_barang'] ?? 'BRG-' . str_pad($barang['id'], 3, '0', STR_PAD_LEFT) ?></small>
                            </div>
                            <div class="stok-sisa">
                                <div class="nilai text-danger"><?= $barang['stok'] ?> pcs</div>
                                <small>tersisa</small>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state"><i class="fas fa-check-circle text-success"></i><p>Semua stok aman</p></div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Top Operator -->
            <div class="section-card">
                <div class="card-header-custom">
                    <h6><i class="fas fa-trophy text-warning"></i> Leaderboard Operator</h6>
                </div>
                <div class="card-body-custom">
                    <?php if (!empty($topOperator)): ?>
                        <?php foreach ($topOperator as $i => $op): 
                            $medals = ['🥇', '🥈', '🥉'];
                            $colors = ['#FFD700', '#C0C0C0', '#CD7F32'];
                        ?>
                        <div class="operator-card">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="d-flex align-items-center">
                                    <div class="operator-avatar-large" style="background: linear-gradient(135deg, <?= $colors[$i] ?? '#8b5cf6' ?>, <?= $colors[$i] ?? '#a78bfa' ?>);">
                                        <?= strtoupper(substr($op['nama'] ?? 'U', 0, 1)) ?>
                                    </div>
                                    <div><strong><?= $op['nama'] ?? 'Unknown' ?></strong><br><small><?= $medals[$i] ?? '📋' ?> <?= $i == 0 ? 'Top Performer' : ($i == 1 ? 'Runner Up' : 'Operator') ?></small></div>
                                </div>
                                <div class="text-end"><div class="fs-4 fw-bold text-primary"><?= $op['total'] ?? 0 ?></div><small>transaksi</small></div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="empty-state"><i class="fas fa-users"></i><p>Belum ada aktivitas</p></div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Ringkasan Sistem -->
            <div class="section-card">
                <div class="card-header-custom">
                    <h6><i class="fas fa-chart-pie text-info"></i> Ringkasan Sistem</h6>
                </div>
                <div class="card-body-custom">
                    <div class="row g-2">
                        <div class="col-6"><div class="text-center p-2 bg-light rounded"><i class="fas fa-box-open text-primary mb-1"></i><div class="fw-bold"><?= $jumlahBarang ?? 0 ?></div><small>Jenis Barang</small></div></div>
                        <div class="col-6"><div class="text-center p-2 bg-light rounded"><i class="fas fa-chart-line text-success mb-1"></i><div class="fw-bold"><?= $totalTransaksi ?? 0 ?></div><small>Total Transaksi</small></div></div>
                        <div class="col-6"><div class="text-center p-2 bg-light rounded"><i class="fas fa-hand-holding-usd text-warning mb-1"></i><div class="fw-bold">Rp <?= number_format(($totalPendapatan ?? 0) / 1000000, 1) ?>M</div><small>Pendapatan</small></div></div>
                        <div class="col-6"><div class="text-center p-2 bg-light rounded"><i class="fas fa-calendar-check text-info mb-1"></i><div class="fw-bold"><?= $penyewaanAktif ?? 0 ?></div><small>Penyewaan Aktif</small></div></div>
                    </div>
                </div>
            </div>

            <!-- BARANG KELUAR TERBARU -->
            <div class="barang-keluar-card">
                <div class="barang-keluar-header">
                    <h6>
                        <i class="fas fa-arrow-up text-danger"></i>
                        Barang Keluar Terbaru
                        <span class="badge-keluar-count"><?= count($barangKeluarTerbaru ?? []) ?></span>
                    </h6>
                    <a href="<?= base_url('barang/keluar') ?>" class="btn-view-all">
                        Lihat Semua <i class="fas fa-arrow-right ms-1"></i>
                    </a>
                </div>
                <div class="card-body-custom">
                    <div class="table-responsive">
                        <table class="table-keluar">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Tanggal</th>
                                    <th>Operator</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($barangKeluarTerbaru)): ?>
                                    <?php foreach ($barangKeluarTerbaru as $keluar): ?>
                                    <tr>
                                        <td data-label="ID">#<?= $keluar['id'] ?></td>
                                        <td data-label="Barang"><strong><?= $keluar['nama_barang'] ?></strong></td>
                                        <td data-label="Jumlah"><span class="badge-jumlah-keluar">-<?= $keluar['jumlah'] ?> <?= $keluar['satuan'] ?? 'pcs' ?></span></td>
                                        <td data-label="Tanggal"><small><?= date('d/m/Y', strtotime($keluar['tanggal'])) ?></small><br><small><?= date('H:i', strtotime($keluar['tanggal'])) ?></small></td>
                                        <td data-label="Operator"><span class="badge-admin"><?= $keluar['operator'] ?? 'System' ?></span></td>
                                    </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="5" class="empty-state"><i class="fas fa-inbox"></i><p>Belum ada transaksi</p></td></tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Function to toggle child rows (accordion/collapse)
function toggleChild(row, id) {
    const childRows = document.querySelectorAll('#child-' + id);
    const icon = document.getElementById('icon-' + id);
    
    if (childRows.length > 0) {
        const isHidden = childRows[0].style.display === 'none' || childRows[0].style.display === '';
        
        childRows.forEach(child => {
            child.style.display = isHidden ? 'table-row' : 'none';
        });
        
        if (icon) {
            if (isHidden) {
                icon.classList.add('rotated');
            } else {
                icon.classList.remove('rotated');
            }
        }
    }
}

// Live Clock
function updateClock() {
    let now = new Date();
    let clock = document.getElementById('liveClock');
    if (clock) {
        clock.innerHTML = `<i class="far fa-clock me-2"></i>${String(now.getHours()).padStart(2,'0')}:${String(now.getMinutes()).padStart(2,'0')}:${String(now.getSeconds()).padStart(2,'0')}`;
    }
}
setInterval(updateClock, 1000);

// Export to Excel function
function exportToExcel() {
    let table = document.getElementById('tablePenyewaan');
    if (!table.querySelector('tbody tr td:not(.empty-state)')) return alert('Tidak ada data!');
    let ws = XLSX.utils.table_to_sheet(table.cloneNode(true), { raw: true });
    let wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, 'Transaksi Penyewaan');
    XLSX.writeFile(wb, `Transaksi_Penyewaan_${new Date().toISOString().slice(0,10)}.xlsx`);
}

document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.stat-card');
    cards.forEach((card, index) => {
        card.style.animation = `fadeInUp 0.5s ease-out ${index * 0.05}s both`;
    });
});
</script>

<?= $this->endSection() ?>