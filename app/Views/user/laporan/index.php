<?= $this->extend('user/layout') ?>
<?= $this->section('content') ?>

<style>
    /* Custom Properties - GudangPro Theme */
    :root {
        --primary: #1e3c72;
        --secondary: #2a5298;
        --accent: #00c6fb;
        --danger: #dc3545;
        --success: #28a745;
        --warning: #ffc107;
        --dark: #0a1f3b;
        --light: #f8f9fc;
        --gradient-primary: linear-gradient(145deg, #1e3c72, #2a5298);
        --gradient-accent: linear-gradient(145deg, #00c6fb, #005bea);
        --gradient-danger: linear-gradient(145deg, #dc3545, #b02a37);
        --gradient-weather: linear-gradient(145deg, #3a6186, #89253e);
        --shadow-sm: 0 5px 20px rgba(30,60,114,0.08);
        --shadow-md: 0 10px 30px rgba(30,60,114,0.12);
        --shadow-lg: 0 15px 40px rgba(30,60,114,0.2);
    }

    /* Header Section with Weather */
    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 30px;
        flex-wrap: wrap;
        gap: 20px;
        animation: slideInDown 0.8s ease-out;
    }

    /* Brand - GudangPro */
    .brand-wrapper {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .brand-icon {
        width: 70px;
        height: 70px;
        background: var(--gradient-primary);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 32px;
        box-shadow: var(--shadow-lg);
        animation: float 3s ease-in-out infinite;
        position: relative;
        overflow: hidden;
    }

    .brand-icon::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.3), transparent);
        animation: rotate 8s linear infinite;
    }

    .brand-text {
        display: flex;
        flex-direction: column;
    }

    .brand-title {
        font-size: 2.8rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 1;
        margin-bottom: 5px;
        letter-spacing: 2px;
        position: relative;
    }

    .brand-title::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 60px;
        height: 4px;
        background: var(--gradient-accent);
        border-radius: 2px;
        animation: expandWidth 0.8s ease-out 0.3s forwards;
        width: 0;
    }

    .brand-sub {
        color: var(--accent);
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 3px;
        margin-top: 8px;
    }

    /* Page Title */
    .page-title-section {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
        animation: fadeInUp 0.8s ease-out 0.2s both;
    }

    .page-title-icon {
        width: 55px;
        height: 55px;
        background: var(--gradient-accent);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        animation: pulse 2s infinite;
        box-shadow: 0 10px 25px rgba(0,198,251,0.3);
    }

    .page-title {
        font-size: 2.2rem;
        font-weight: 700;
        margin: 0;
        background: linear-gradient(145deg, #1e3c72, #2a5298);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 1px;
    }

    /* Alert Messages */
    .alert {
        border-radius: 12px;
        border: none;
        padding: 15px 20px;
        margin-bottom: 20px;
        animation: fadeInUp 0.5s ease-out;
    }

    .alert-success {
        background: linear-gradient(145deg, #d4edda, #c3e6cb);
        color: #155724;
        border-left: 4px solid #28a745;
    }

    .alert-danger {
        background: linear-gradient(145deg, #f8d7da, #f5c6cb);
        color: #721c24;
        border-left: 4px solid #dc3545;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
        gap: 25px;
        margin-bottom: 30px;
        animation: fadeInUp 0.8s ease-out 0.3s both;
    }

    .stat-card {
        background: white;
        padding: 22px;
        border-radius: 18px;
        box-shadow: var(--shadow-sm);
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(30,60,114,0.05);
        position: relative;
        overflow: hidden;
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(145deg, transparent, rgba(0,198,251,0.03));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-8px) scale(1.02);
        box-shadow: var(--shadow-lg);
    }

    .stat-card:hover::after {
        opacity: 1;
    }

    .stat-info h4 {
        font-size: 0.85rem;
        color: #6c757d;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 1.5px;
    }

    .stat-info p {
        font-size: 2.2rem;
        font-weight: 800;
        margin: 0;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        line-height: 1;
    }

    .stat-icon {
        width: 55px;
        height: 55px;
        background: var(--gradient-primary);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 24px;
        animation: float 3s ease-in-out infinite;
    }

    /* Table Container */
    .table-container {
        background: white;
        border-radius: 28px;
        padding: 28px;
        box-shadow: var(--shadow-md);
        animation: slideInUp 0.8s ease-out 0.5s both;
        border: 1px solid rgba(255,255,255,0.3);
        position: relative;
        overflow: hidden;
    }

    .table-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 6px;
        background: var(--gradient-accent);
    }

    /* Table Header */
    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .table-title {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .table-icon {
        width: 50px;
        height: 50px;
        background: var(--gradient-accent);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 22px;
        animation: pulse 2s infinite;
    }

    .table-title h4 {
        margin: 0;
        font-size: 1.3rem;
        font-weight: 700;
        color: var(--dark);
    }

    .table-title small {
        color: #6c757d;
        font-size: 0.85rem;
        display: flex;
        align-items: center;
        gap: 5px;
        margin-top: 5px;
    }

    .record-badge {
        background: var(--gradient-primary);
        color: white;
        padding: 10px 22px;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 10px;
        box-shadow: 0 8px 20px rgba(30,60,114,0.3);
        animation: pulse 3s infinite;
    }

    /* Table Design */
    .table-wrapper {
        overflow-x: auto;
        border-radius: 18px;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 12px;
        margin-bottom: 0;
    }

    .table thead th {
        background: linear-gradient(145deg, #f0f4fa, #e6ecf5);
        padding: 18px 22px;
        font-weight: 800;
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--primary);
        border: none;
        text-align: left;
    }

    .table thead th:first-child {
        border-radius: 18px 0 0 18px;
        padding-left: 28px;
    }

    .table thead th:last-child {
        border-radius: 0 18px 18px 0;
        padding-right: 28px;
    }

    .table thead th i {
        margin-right: 10px;
        color: var(--accent);
        font-size: 1rem;
    }

    .table tbody tr {
        background: white;
        border-radius: 18px;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        animation: fadeInRow 0.6s ease-out forwards;
        opacity: 0;
        transform: translateX(-15px);
    }

    .table tbody tr:hover {
        transform: translateY(-6px) scale(1.01);
        box-shadow: 0 20px 40px rgba(30,60,114,0.12);
        background: linear-gradient(to right, white, #f8fbff);
    }

    .table tbody td {
        padding: 20px 22px;
        vertical-align: middle;
        border: none;
        border-bottom: 1px solid #eef2f7;
        color: #2c3e50;
        font-size: 0.95rem;
    }

    .table tbody td:first-child {
        border-radius: 18px 0 0 18px;
        padding-left: 28px;
    }

    .table tbody td:last-child {
        border-radius: 0 18px 18px 0;
        padding-right: 28px;
    }

    /* Nama Laporan Style */
    .nama-laporan {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .laporan-icon {
        width: 42px;
        height: 42px;
        background: var(--gradient-accent);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        transition: all 0.4s ease;
        position: relative;
        overflow: hidden;
    }

    .laporan-icon:hover {
        transform: scale(1.15) rotate(8deg);
    }

    .nama-text {
        font-weight: 700;
        color: var(--dark);
        font-size: 1rem;
    }

    /* Barang List Style */
    .barang-list {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 0.85rem;
        line-height: 1.4;
        max-width: 280px;
    }

    .barang-list i {
        margin-top: 2px;
        flex-shrink: 0;
    }

    /* Deskripsi Style */
    .deskripsi-text {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #5a6a7a;
        font-style: italic;
    }

    .deskripsi-text i {
        color: var(--accent);
        font-size: 14px;
        opacity: 0.7;
    }

    /* Tanggal Style */
    .tanggal-badge {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        padding: 10px 22px;
        background: linear-gradient(145deg, #f0f4fa, #e6ecf5);
        border-radius: 60px;
        font-size: 0.95rem;
        font-weight: 600;
        color: var(--primary);
        border: 1px solid rgba(0,198,251,0.2);
        transition: all 0.4s ease;
    }

    .tanggal-badge:hover {
        background: var(--gradient-primary);
        color: white;
        transform: translateY(-4px);
        box-shadow: 0 10px 25px rgba(30,60,114,0.3);
    }

    .tanggal-badge:hover i {
        color: white;
        animation: rotate 1s ease;
    }

    .tanggal-time {
        background: rgba(30,60,114,0.1);
        padding: 4px 10px;
        border-radius: 50px;
        font-size: 0.75rem;
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .tanggal-badge:hover .tanggal-time {
        background: rgba(255,255,255,0.2);
    }

    /* Periode Sewa Style */
    .periode-sewa {
        font-size: 0.8rem;
    }

    .periode-sewa .badge {
        font-size: 0.7rem;
        padding: 4px 8px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 4px;
    }

    /* Badge styles */
    .badge.bg-info.bg-opacity-10 {
        background-color: rgba(0,198,251,0.1) !important;
        color: #00c6fb !important;
    }

    .badge.bg-warning.bg-opacity-10 {
        background-color: rgba(255,193,7,0.1) !important;
        color: #ffc107 !important;
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 8px;
    }

    .btn-detail, .btn-print, .btn-danger-sm {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 38px;
        height: 38px;
        border-radius: 12px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        text-decoration: none;
        color: white;
        font-size: 1rem;
    }

    .btn-detail {
        background: linear-gradient(145deg, #00c6fb, #005bea);
        box-shadow: 0 4px 12px rgba(0,198,251,0.3);
    }

    .btn-print {
        background: linear-gradient(145deg, #6c757d, #495057);
        box-shadow: 0 4px 12px rgba(108,117,125,0.3);
    }

    .btn-danger-sm {
        background: linear-gradient(145deg, #dc3545, #b02a37);
        box-shadow: 0 4px 12px rgba(220,53,69,0.3);
    }

    .btn-detail:hover, .btn-print:hover, .btn-danger-sm:hover {
        transform: translateY(-3px) scale(1.1);
        color: white;
    }

    /* Table Footer */
    .table-footer {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 2px dashed #e0e7ef;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
    }

    .info-text {
        display: flex;
        align-items: center;
        gap: 15px;
        color: #6c757d;
        font-size: 0.9rem;
    }

    .info-text i {
        color: var(--accent);
        animation: pulse 2s infinite;
    }

    .update-time {
        display: flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(145deg, #f0f4fa, #e6ecf5);
        padding: 10px 25px;
        border-radius: 60px;
        color: var(--primary);
        font-weight: 600;
        font-size: 0.9rem;
        border: 1px solid rgba(0,198,251,0.2);
    }

    .update-time i {
        color: var(--accent);
        animation: spin 3s linear infinite;
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(40px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(40px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

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

    @keyframes fadeInRow {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes expandWidth {
        from { width: 0; }
        to { width: 60px; }
    }

    @keyframes pulse {
        0%, 100% { transform: scale(1); }
        50% { transform: scale(1.05); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }

    @keyframes weatherFloat {
        0%, 100% { transform: translateY(0) rotate(0deg); }
        50% { transform: translateY(-5px) rotate(5deg); }
    }

    @keyframes shine {
        0% { left: -100%; }
        20% { left: 100%; }
        100% { left: 100%; }
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes weatherPulse {
        0%, 100% { box-shadow: 0 10px 30px rgba(58,97,134,0.3); }
        50% { box-shadow: 0 15px 45px rgba(58,97,134,0.5); }
    }

    /* Row Animation Delays */
    .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    .table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    .table tbody tr:nth-child(5) { animation-delay: 0.5s; }
    .table tbody tr:nth-child(6) { animation-delay: 0.6s; }
    .table tbody tr:nth-child(7) { animation-delay: 0.7s; }
    .table tbody tr:nth-child(8) { animation-delay: 0.8s; }
    .table tbody tr:nth-child(9) { animation-delay: 0.9s; }
    .table tbody tr:nth-child(10) { animation-delay: 1s; }

    /* Responsive Design */
    @media (max-width: 768px) {
        .header-section {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .brand-title {
            font-size: 2rem;
        }

        .page-title {
            font-size: 1.6rem;
        }
        
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .table thead {
            display: none;
        }
        
        .table tbody tr {
            display: block;
            margin-bottom: 20px;
            border-radius: 18px;
            padding: 15px;
        }
        
        .table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 18px;
            border-bottom: 1px solid #eef2f7;
        }
        
        .table tbody td:before {
            content: attr(data-label);
            font-weight: 800;
            color: var(--primary);
            margin-right: 15px;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }
        
        .table tbody td:first-child {
            padding-left: 18px;
        }
        
        .table tbody td:last-child {
            padding-right: 18px;
        }
        
        .table-footer {
            flex-direction: column;
            align-items: flex-start;
        }

        .action-buttons {
            justify-content: flex-end;
        }
        
        .barang-list {
            max-width: 100%;
        }
    }
</style>
    <!-- Page Title -->
    <div class="page-title-section">
        <div class="page-title-icon">
            <i class="fas fa-chart-pie"></i>
        </div>
        <h2 class="page-title">
            Data Laporan
        </h2>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-exclamation-triangle me-2"></i>
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('info')): ?>
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <i class="fas fa-info-circle me-2"></i>
            <?= session()->getFlashdata('info') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-info">
                <h4>Total Laporan</h4>
                <p><?= count($laporan) ?></p>
            </div>
            <div class="stat-icon">
                <i class="fas fa-file-alt"></i>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <h4>Bulan Ini</h4>
                <p><?= count(array_filter($laporan, function($l) { 
                    return date('Y-m', strtotime($l['created_at'])) == date('Y-m'); 
                })) ?></p>
            </div>
            <div class="stat-icon" style="background: linear-gradient(145deg, #00c6fb, #005bea);">
                <i class="fas fa-calendar-alt"></i>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <h4>Hari Ini</h4>
                <p><?= count(array_filter($laporan, function($l) { 
                    return date('Y-m-d', strtotime($l['created_at'])) == date('Y-m-d'); 
                })) ?></p>
            </div>
            <div class="stat-icon" style="background: linear-gradient(145deg, #ff6b6b, #c92a2a);">
                <i class="fas fa-clock"></i>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-info">
                <h4>Total Pendapatan</h4>
                <p>Rp <?= number_format(array_sum(array_column($laporan, 'total_harga')), 0, ',', '.') ?></p>
            </div>
            <div class="stat-icon" style="background: linear-gradient(145deg, #28a745, #1e7e34);">
                <i class="fas fa-money-bill-wave"></i>
            </div>
        </div>
    </div>

    <!-- Table Container -->
    <div class="table-container">
        <div class="table-header">
            <div class="table-title">
                <div class="table-icon">
                    <i class="fas fa-database"></i>
                </div>
                <div>
                    <h4>Daftar Laporan Inventory</h4>
                    <small>
                        <i class="fas fa-info-circle"></i>
                        Total <?= count($laporan) ?> laporan tersedia di sistem
                    </small>
                </div>
            </div>
            <span class="record-badge">
                <i class="fas fa-file"></i>
                <?= count($laporan) ?> Records
                <i class="fas fa-sync-alt" style="margin-left: 8px; animation: spin 2s linear infinite;"></i>
            </span>
        </div>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        <th><i class="fas fa-user"></i> Nama Penyewa</th>
                        <th><i class="fas fa-box"></i> Barang yang Disewa</th>
                        <th><i class="fas fa-align-left"></i> Deskripsi</th>
                        <th><i class="fas fa-calendar"></i> Tanggal Laporan</th>
                        <th><i class="fas fa-calendar-alt"></i> Periode Sewa</th>
                        <th><i class="fas fa-money-bill"></i> Total</th>
                        <th><i class="fas fa-cogs"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($laporan)): ?>
                        <?php foreach ($laporan as $l): ?>
                        <tr>
                            <td data-label="Nama Penyewa">
                                <div class="nama-laporan">
                                    <div class="laporan-icon">
                                        <i class="fas fa-user-circle"></i>
                                    </div>
                                    <span class="nama-text fw-bold">
                                        <?= esc($l['nama_penyewa']) ?>
                                    </span>
                                </div>
                            </td>

                            <td data-label="Barang yang Disewa">
                                <div class="barang-list">
                                    <i class="fas fa-boxes text-primary me-1"></i>
                                    <span class="small">
                                        <?php 
                                        $items = json_decode($l['detail_json'], true);
                                        if ($items):
                                            foreach ($items as $item):
                                                echo esc($item['nama_barang']) . ' (' . $item['qty'] . ')<br>';
                                            endforeach;
                                        else:
                                            echo '-';
                                        endif;
                                        ?>
                                    </span>
                                </div>
                            </td>

                            <td data-label="Deskripsi">
                                <div class="deskripsi-text">
                                    <i class="fas fa-quote-right"></i>
                                    <?= esc($l['deskripsi'] ?? '-') ?>
                                </div>
                            </td>

                            <td data-label="Tanggal Laporan">
                                <span class="tanggal-badge">
                                    <i class="fas fa-calendar-day"></i>
                                    <?= date('d/m/Y', strtotime($l['created_at'])) ?>
                                    <span class="tanggal-time">
                                        <i class="fas fa-clock"></i>
                                        <?= date('H:i', strtotime($l['created_at'])) ?>
                                    </span>
                                </span>
                            </td>

                            <td data-label="Periode Sewa">
                                <div class="periode-sewa">
                                    <div class="small">
                                        <i class="fas fa-calendar-check text-success me-1"></i>
                                        <?= date('d/m/Y', strtotime($l['checkin'])) ?>
                                        <i class="fas fa-arrow-right mx-1 text-muted"></i>
                                        <?= date('d/m/Y', strtotime($l['checkout'])) ?>
                                    </div>
                                    <div class="badge bg-<?= $l['kategori'] == 'harian' ? 'info' : 'warning' ?> bg-opacity-10 text-<?= $l['kategori'] == 'harian' ? 'info' : 'warning' ?> mt-1 px-2 py-1">
                                        <i class="fas fa-<?= $l['kategori'] == 'harian' ? 'calendar-week' : 'star' ?> me-1"></i>
                                        <?= ucfirst($l['kategori']) ?>
                                    </div>
                                </div>
                            </td>

                            <td data-label="Total">
                                <span class="fw-bold text-success">
                                    Rp <?= number_format($l['total_harga'], 0, ',', '.') ?>
                                </span>
                            </td>

                            <td data-label="Aksi">
                                <div class="action-buttons">
                                    <a href="<?= base_url('laporan/detail/' . $l['id']) ?>" class="btn-detail" title="Detail">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <i class="fas fa-folder-open fa-3x text-muted mb-3 d-block"></i>
                                <p class="text-muted">Belum ada data laporan</p>
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
        
        <!-- Table Footer -->
        <div class="table-footer">
            <div class="info-text">
                <i class="fas fa-chart-line"></i>
                <span>Menampilkan <strong><?= count($laporan) ?></strong> laporan dari sistem</span>
            </div>
            <div class="update-time">
                <i class="fas fa-clock"></i>
                Terakhir diperbarui: <?= date('H:i:s') ?>
                <i class="fas fa-check-circle" style="color: #28a745; animation: none;"></i>
            </div>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, index) => {
        card.style.animation = `fadeInUp 0.8s ease-out ${index * 0.1 + 0.3}s both`;
    });
    
    // Add hover effect to table rows
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach((row, index) => {
        row.style.animationDelay = `${index * 0.1 + 0.6}s`;
        
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-6px) scale(1.01)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
});
</script>

<?= $this->endSection() ?>