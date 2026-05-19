<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
// Status Options Array
$statusOptions = [
    'baik' => ['label' => 'Baik', 'icon' => 'check-circle', 'color' => '#28a745', 'bg' => '#d4edda', 'class' => 'status-baik'],
    'perbaikan' => ['label' => 'Perbaikan', 'icon' => 'tools', 'color' => '#fd7e14', 'bg' => '#fff3cd', 'class' => 'status-perbaikan'],
    'perawatan' => ['label' => 'Perawatan', 'icon' => 'gear', 'color' => '#ffc107', 'bg' => '#fff3cd', 'class' => 'status-perawatan'],
    'standby' => ['label' => 'Standby', 'icon' => 'pause-circle', 'color' => '#17a2b8', 'bg' => '#d1ecf1', 'class' => 'status-standby']
];
?>

<style>
    /* Card Stats */
    .stat-card {
        background: white;
        border-radius: 16px;
        padding: 1.25rem;
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }
    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }
    .stat-icon {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    .stat-value {
        font-size: 1.8rem;
        font-weight: 800;
        margin: 0;
        line-height: 1.2;
    }
    
    /* Status Badge Styles */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 0.7rem;
        font-weight: 600;
    }
    .status-baik { background: #d4edda; color: #155724; }
    .status-perbaikan { background: #f8d7da; color: #721c24; }
    .status-perawatan { background: #fff3cd; color: #856404; }
    .status-standby { background: #d1ecf1; color: #0c5460; }
    .tipe-baru { background: #cce5ff; color: #004085; }
    .tipe-bekas { background: #fff3cd; color: #856404; }
    
    /* Stok Box */
    .stok-box {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 6px;
        font-size: 11px;
        font-weight: 600;
        margin: 2px;
        min-width: 45px;
        text-align: center;
    }
    .box-baik { background: #28a745; color: white; }
    .box-maintenance { background: #ffc107; color: #856404; }
    .box-rusak { background: #6c757d; color: white; }
    .box-kosong { background: #dc3545; color: white; }
    
    /* Filter Row */
    .filter-row {
        background: #f8f9fa;
        padding: 1rem 1.25rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
    }
    
    /* Button Group */
    .btn-action {
        padding: 0.25rem 0.5rem;
        font-size: 0.7rem;
        border-radius: 8px;
        transition: all 0.2s;
    }
    .btn-action:hover {
        transform: translateY(-2px);
    }
    
    /* Table */
    .table-modern {
        border-collapse: separate;
        border-spacing: 0;
    }
    .table-modern thead th {
        background: #f8f9fa;
        padding: 1rem;
        font-size: 0.7rem;
        font-weight: 700;
        text-transform: uppercase;
        color: #6c757d;
        border-bottom: 1px solid #dee2e6;
    }
    .table-modern tbody tr {
        transition: all 0.2s;
    }
    .table-modern tbody tr:hover {
        background: #f8f9fa;
    }
    .table-modern tbody td {
        padding: 0.8rem 1rem;
        vertical-align: middle;
        border-bottom: 1px solid #e9ecef;
    }
    
    /* Gradient Backgrounds */
    .bg-gradient-primary { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
    .bg-gradient-success { background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%); color: white; }
    .bg-gradient-danger { background: linear-gradient(135deg, #dc3545 0%, #b02a37 100%); color: white; }
    .bg-gradient-info { background: linear-gradient(135deg, #17a2b8 0%, #0f6b7a 100%); color: white; }
    
    /* Responsive */
    @media (max-width: 768px) {
        .table-modern thead {
            display: none;
        }
        .table-modern tbody tr {
            display: block;
            margin-bottom: 1rem;
            border: 1px solid #dee2e6;
            border-radius: 12px;
        }
        .table-modern tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.6rem 1rem;
            border-bottom: 1px solid #e9ecef;
        }
        .table-modern tbody td:last-child {
            border-bottom: none;
        }
        .table-modern tbody td::before {
            content: attr(data-label);
            font-weight: 600;
            font-size: 0.7rem;
            color: #6c757d;
            width: 35%;
        }
        .filter-row .row {
            flex-direction: column;
            gap: 0.5rem;
        }
    }
</style>

<div class="container-fluid px-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold text-dark mb-0">
                <i class="bi bi-box-seam me-2 text-primary"></i> Data Barang
            </h4>
            <p class="text-muted small mt-1 mb-0">Kelola semua data inventaris barang</p>
        </div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item">
                    <a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Data Barang</li>
            </ol>
        </nav>
    </div>

    <!-- Alerts -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-triangle-fill me-2"></i>
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small text-uppercase">Total Barang</span>
                        <div class="stat-value"><?= count($barang) ?></div>
                    </div>
                    <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                        <i class="bi bi-boxes"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small text-uppercase">Total Masuk</span>
                        <div class="stat-value text-success"><?= number_format($totalMasuk) ?></div>
                    </div>
                    <div class="stat-icon bg-success bg-opacity-10 text-success">
                        <i class="bi bi-arrow-down-circle"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small text-uppercase">Total Keluar</span>
                        <div class="stat-value text-danger"><?= number_format($totalKeluar) ?></div>
                    </div>
                    <div class="stat-icon bg-danger bg-opacity-10 text-danger">
                        <i class="bi bi-arrow-up-circle"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="stat-card">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <span class="text-muted small text-uppercase">Total Stok</span>
                        <div class="stat-value text-info"><?= number_format($totalStok) ?></div>
                    </div>
                    <div class="stat-icon bg-info bg-opacity-10 text-info">
                        <i class="bi bi-archive"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter Row -->
    <div class="filter-row">
        <div class="row g-3 align-items-end">
            <div class="col-md-4">
                <label class="form-label fw-bold small text-muted mb-1">
                    <i class="bi bi-funnel me-1"></i> Filter Kategori
                </label>
                <form method="get" action="<?= base_url('barang') ?>">
                    <select name="kategori" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">📁 Semua Kategori</option>
                        <?php foreach ($kategoriList as $k): ?>
                            <option value="<?= $k['id'] ?>" <?= ($selectedKategori == $k['id']) ? 'selected' : '' ?>>
                                <?= esc($k['nama']) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </div>
            <div class="col-md-4">
                <label class="form-label fw-bold small text-muted mb-1">
                    <i class="bi bi-tag me-1"></i> Filter Status
                </label>
                <form method="get" action="<?= base_url('barang') ?>">
                    <select name="status_kondisi" class="form-select form-select-sm" onchange="this.form.submit()">
                        <option value="">🏷️ Semua Status</option>
                        <?php foreach ($statusOptions as $key => $status): ?>
                            <option value="<?= $key ?>" <?= ($selectedStatus == $key) ? 'selected' : '' ?>>
                                <?= $status['label'] ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <?php if (!empty($selectedKategori)): ?>
                        <input type="hidden" name="kategori" value="<?= $selectedKategori ?>">
                    <?php endif; ?>
                </form>
            </div>
            <div class="col-md-4 text-end">
                <a href="<?= base_url('barang') ?>" class="btn btn-outline-secondary btn-sm">
                    <i class="bi bi-arrow-repeat me-1"></i> Reset Filter
                </a>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="d-flex gap-2">
            <a href="<?= base_url('kategori/create') ?>" class="btn btn-success btn-sm shadow-sm">
                <i class="bi bi-tags me-1"></i> Kategori
            </a>
            <a href="<?= base_url('barang/create') ?>" class="btn btn-primary btn-sm shadow-sm">
                <i class="bi bi-plus-circle me-1"></i> Barang
            </a>
            <a href="<?= base_url('sewa/create') ?>" class="btn btn-secondary btn-sm shadow-sm">
                <i class="bi bi-calendar-check me-1"></i> Sewa
            </a>
        </div>
        <div>
            <span class="badge bg-secondary bg-opacity-10 text-dark px-3 py-2">
                <i class="bi bi-database me-1"></i> <?= count($barang) ?> Records
            </span>
        </div>
    </div>

    <!-- Table Barang -->
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-white py-3 border-bottom-0">
            <div class="d-flex align-items-center">
                <div class="rounded-circle bg-primary bg-opacity-10 p-2 me-2">
                    <i class="bi bi-table text-primary"></i>
                </div>
                <h5 class="fw-bold text-dark mb-0">Daftar Barang</h5>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-modern mb-0">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Kategori</th>
                            <th>Satuan</th>
                            <th class="text-center">Stok</th>
                            <th class="text-center">Detail Stok</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Kondisi</th>
                            <th class="text-center">Tipe</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($barang)): ?>
                            <?php foreach ($barang as $b): ?>
                                <?php 
                                $stokBaik = $b['stok'] ?? 0;
                                $stokMaintenance = $b['jumlah_dalam_maintenance'] ?? 0;
                                $stokRusak = $b['jumlah_rusak'] ?? 0;
                                $totalStokBarang = $stokBaik + $stokMaintenance + $stokRusak;
                                $currentStatus = $b['kondisi'] ?? 'baik';
                                $status = $statusOptions[$currentStatus] ?? $statusOptions['baik'];
                                $tipeBarang = $b['tipe_barang'] ?? 'baru';
                                ?>
                                <tr>
                                    <td data-label="Nama Barang">
                                        <div class="d-flex align-items-center">
                                            <?php if (!empty($b['gambar'])): ?>
                                                <img src="<?= base_url('uploads/barang/' . $b['gambar']) ?>" alt="<?= esc($b['nama_barang']) ?>" class="me-2 rounded" style="width: 40px; height: 40px; object-fit: cover;">
                                            <?php else: ?>
                                                <div class="bg-light me-2 d-flex align-items-center justify-content-center rounded" style="width: 40px; height: 40px;">
                                                    <i class="bi bi-image text-secondary"></i>
                                                </div>
                                            <?php endif; ?>
                                            <div>
                                                <div class="fw-semibold"><?= esc($b['nama_barang']) ?></div>
                                                <small class="text-muted">ID: #<?= sprintf('%04d', $b['id']) ?></small>
                                            </div>
                                        </div>
                                    </td>
                                    <td data-label="Kategori">
                                        <span class="badge bg-info bg-opacity-10 text-info px-3 py-2">
                                            <i class="bi bi-tag me-1"></i> <?= esc($b['nama_kategori'] ?? '-') ?>
                                        </span>
                                    </td>
                                    <td data-label="Satuan">
                                        <span class="badge bg-secondary bg-opacity-10 text-dark px-3 py-2">
                                            <i class="bi bi-box me-1"></i> <?= esc($b['satuan'] ?? 'pcs') ?>
                                        </span>
                                    </td>
                                    <td data-label="Stok" class="text-center">
                                        <span class="fw-bold text-primary"><?= number_format($totalStokBarang) ?></span>
                                        <small class="text-muted d-block"><?= esc($b['satuan'] ?? 'pcs') ?></small>
                                    </td>
                                    <td data-label="Detail Stok" class="text-center">
                                        <div class="d-flex justify-content-center gap-1 flex-wrap">
                                            <?php if ($stokBaik > 0): ?>
                                                <span class="stok-box box-baik" title="Stok Baik">🟢 <?= $stokBaik ?></span>
                                            <?php endif; ?>
                                            <?php if ($stokMaintenance > 0): ?>
                                                <span class="stok-box box-maintenance" title="Stok Maintenance">🟡 <?= $stokMaintenance ?></span>
                                            <?php endif; ?>
                                            <?php if ($stokRusak > 0): ?>
                                                <span class="stok-box box-rusak" title="Stok Rusak">⚫ <?= $stokRusak ?></span>
                                            <?php endif; ?>
                                            <?php if ($stokBaik == 0 && $stokMaintenance == 0 && $stokRusak == 0): ?>
                                                <span class="stok-box box-kosong" title="Tidak Ada Stok">🔴 0</span>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                    <td data-label="Status" class="text-center">
                                        <?php if ($totalStokBarang <= 0): ?>
                                            <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Habis</span>
                                        <?php elseif ($totalStokBarang <= 5): ?>
                                            <span class="badge bg-warning text-dark"><i class="bi bi-exclamation-triangle me-1"></i>Kritis</span>
                                        <?php elseif ($totalStokBarang <= 10): ?>
                                            <span class="badge bg-info"><i class="bi bi-exclamation-circle me-1"></i>Menipis</span>
                                        <?php else: ?>
                                            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Aman</span>
                                        <?php endif; ?>
                                    </td>
                                    <td data-label="Kondisi" class="text-center">
                                        <span class="status-badge <?= $status['class'] ?>">
                                            <i class="bi bi-<?= $status['icon'] ?> me-1"></i>
                                            <?= $status['label'] ?>
                                        </span>
                                    </td>
                                    <td data-label="Tipe" class="text-center">
                                        <span class="status-badge <?= $tipeBarang == 'baru' ? 'tipe-baru' : 'tipe-bekas' ?>">
                                            <i class="bi bi-<?= $tipeBarang == 'baru' ? 'star-fill' : 'box' ?> me-1"></i>
                                            <?= $tipeBarang == 'baru' ? 'Baru' : 'Bekas' ?>
                                        </span>
                                    </td>
                                    <td data-label="Aksi" class="text-center">
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="<?= base_url('barang/detail/' . $b['id']) ?>" class="btn btn-info btn-action text-white" title="Detail"><i class="bi bi-eye"></i></a>
                                            <button class="btn btn-success btn-action" data-bs-toggle="modal" data-bs-target="#modalMasuk<?= $b['id'] ?>" title="Tambah Stok"><i class="bi bi-plus-circle"></i></button>
                                            <button class="btn btn-warning btn-action" data-bs-toggle="modal" data-bs-target="#modalKeluar<?= $b['id'] ?>" title="Kurangi Stok"><i class="bi bi-dash-circle"></i></button>
                                            <a href="<?= base_url('barang/maintenance/' . $b['id']) ?>" class="btn btn-secondary btn-action" title="Maintenance"><i class="bi bi-tools"></i></a>
                                            <a href="<?= base_url('barang/edit/' . $b['id']) ?>" class="btn btn-primary btn-action" title="Edit"><i class="bi bi-pencil"></i></a>
                                            <a href="<?= base_url('barang/delete/' . $b['id']) ?>" class="btn btn-danger btn-action" onclick="return confirm('Yakin ingin menghapus barang <?= esc($b['nama_barang']) ?>?')" title="Hapus"><i class="bi bi-trash"></i></a>
                                        </div>
                                    </td>
                                </tr>

                                <!-- Sub Items -->
                                <?php $currentSubItems = $subItems[$b['id']] ?? []; ?>
                                <?php if (!empty($currentSubItems)): ?>
                                    <?php foreach ($currentSubItems as $sub): ?>
                                        <tr class="table-secondary">
                                            <td data-label="Varian" style="padding-left: 3rem;">
                                                <i class="bi bi-circle-fill me-2 fs-6 text-secondary"></i>
                                                <?= esc($sub['nama']) ?>
                                            </td>
                                            <td data-label="Kategori">-</td>
                                            <td data-label="Satuan"><?= esc($b['satuan'] ?? 'pcs') ?></td>
                                            <td class="text-center fw-bold"><?= number_format($sub['stok'] ?? 0) ?> <?= esc($b['satuan'] ?? 'pcs') ?></td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">
                                                <?php $sStok = $sub['stok'] ?? 0; ?>
                                                <?php if ($sStok <= 0): ?>
                                                    <span class="badge bg-dark">Habis</span>
                                                <?php elseif ($sStok <= 5): ?>
                                                    <span class="badge bg-danger">Kritis</span>
                                                <?php elseif ($sStok <= 10): ?>
                                                    <span class="badge bg-warning text-dark">Menipis</span>
                                                <?php else: ?>
                                                    <span class="badge bg-success">Aman</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">-</td>
                                            <td class="text-center">
                                                <div class="btn-group btn-group-sm">
                                                    <button class="btn btn-success btn-action" data-bs-toggle="modal" data-bs-target="#modalMasukSub<?= $sub['id'] ?>"><i class="bi bi-plus-circle"></i></button>
                                                    <button class="btn btn-warning btn-action" data-bs-toggle="modal" data-bs-target="#modalKeluarSub<?= $sub['id'] ?>"><i class="bi bi-dash-circle"></i></button>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="9" class="text-center py-5">
                                    <i class="bi bi-inbox fs-1 text-muted d-block mb-3"></i>
                                    <p class="text-muted mb-0">Belum ada data barang.</p>
                                    <a href="<?= base_url('barang/create') ?>" class="btn btn-primary btn-sm mt-3">
                                        <i class="bi bi-plus-circle me-1"></i> Tambah Barang Pertama
                                    </a>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$satuanList = ['pcs','box','kotak','unit','buah','pack','dus','liter','kg','gram','meter','lembar','batang','botol','kantong'];
?>

<!-- Modal Barang Masuk -->
<?php if (!empty($barang)): ?>
    <?php foreach ($barang as $b): ?>
        <div class="modal fade" id="modalMasuk<?= $b['id'] ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">
                    <form action="<?= base_url('barang/masuk/' . $b['id']) ?>" method="post">
                        <div class="modal-header bg-success text-white border-0">
                            <h5 class="modal-title"><i class="bi bi-box-arrow-in-down me-2"></i> Barang Masuk</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="fw-bold text-center mb-3"><?= esc($b['nama_barang']) ?></h6>
                            <div class="text-center mb-4">
                                <span class="badge bg-light text-dark p-3">
                                    Stok saat ini: <strong><?= ($b['stok'] + ($b['jumlah_dalam_maintenance'] ?? 0) + ($b['jumlah_rusak'] ?? 0)) ?> <?= esc($b['satuan'] ?? 'pcs') ?></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jumlah Tambahan</label>
                                <div class="input-group">
                                    <input type="number" name="jumlah" class="form-control form-control-lg" placeholder="Masukkan jumlah" min="1" required>
                                    <select name="satuan" class="form-select form-select-lg">
                                        <?php foreach ($satuanList as $s): ?>
                                            <option value="<?= $s ?>" <?= ($b['satuan'] ?? 'pcs') == $s ? 'selected' : '' ?>><?= $s ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-text text-muted mt-2">
                                    <small><i class="bi bi-info-circle"></i> Stok akan ditambahkan ke <strong class="text-success">Stok Baik</strong></small>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer bg-light border-0">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-success"><i class="bi bi-check-circle me-2"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal Barang Keluar -->
        <div class="modal fade" id="modalKeluar<?= $b['id'] ?>" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg">
                    <form action="<?= base_url('barang/keluar/' . $b['id']) ?>" method="post">
                        <div class="modal-header bg-warning border-0">
                            <h5 class="modal-title"><i class="bi bi-box-arrow-up me-2"></i> Barang Keluar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <h6 class="fw-bold text-center mb-3"><?= esc($b['nama_barang']) ?></h6>
                            <div class="text-center mb-4">
                                <span class="badge bg-light text-dark p-3">
                                    Stok Baik: <strong><?= $b['stok'] ?? 0 ?> <?= esc($b['satuan'] ?? 'pcs') ?></strong>
                                </span>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-bold">Jumlah Pengurangan</label>
                                <div class="input-group">
                                    <input type="number" name="jumlah" class="form-control form-control-lg" placeholder="Masukkan jumlah" min="1" max="<?= max(0, $b['stok'] ?? 0) ?>" required <?= ($b['stok'] ?? 0) <= 0 ? 'disabled' : '' ?>>
                                    <select name="satuan" class="form-select form-select-lg" <?= ($b['stok'] ?? 0) <= 0 ? 'disabled' : '' ?>>
                                        <?php foreach ($satuanList as $s): ?>
                                            <option value="<?= $s ?>" <?= ($b['satuan'] ?? 'pcs') == $s ? 'selected' : '' ?>><?= $s ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-text text-muted mt-2">
                                    <small><i class="bi bi-info-circle"></i> Pengurangan hanya dari <strong class="text-success">Stok Baik</strong></small>
                                </div>
                                <?php if (($b['stok'] ?? 0) <= 0): ?>
                                    <small class="text-danger">Stok Baik habis, tidak bisa melakukan pengurangan</small>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="modal-footer bg-light border-0">
                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-warning text-dark" <?= ($b['stok'] ?? 0) <= 0 ? 'disabled' : '' ?>><i class="bi bi-check-circle me-2"></i> Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Modal Sub Item -->
<?php if (!empty($subItems)): ?>
    <?php foreach ($subItems as $barangId => $subItemsArray): ?>
        <?php foreach ($subItemsArray as $sub): ?>
            <div class="modal fade" id="modalMasukSub<?= $sub['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow-lg">
                        <form action="<?= base_url('barang/sub-item/masuk/' . $sub['id']) ?>" method="post">
                            <div class="modal-header bg-success text-white">
                                <h5 class="modal-title">Tambah Stok Varian: <?= esc($sub['nama']) ?></h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" min="1" required>
                            </div>
                            <div class="modal-footer bg-light border-0">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="modalKeluarSub<?= $sub['id'] ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content border-0 shadow-lg">
                        <form action="<?= base_url('barang/sub-item/keluar/' . $sub['id']) ?>" method="post">
                            <div class="modal-header bg-warning">
                                <h5 class="modal-title">Kurangi Stok Varian: <?= esc($sub['nama']) ?></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <label>Jumlah</label>
                                <input type="number" name="jumlah" class="form-control" min="1" max="<?= $sub['stok'] ?? 0 ?>" <?= (($sub['stok'] ?? 0) <= 0) ? 'disabled' : '' ?> required>
                                <?php if (($sub['stok'] ?? 0) <= 0): ?>
                                    <small class="text-danger">Stok habis</small>
                                <?php endif; ?>
                            </div>
                            <div class="modal-footer bg-light border-0">
                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-warning" <?= (($sub['stok'] ?? 0) <= 0) ? 'disabled' : '' ?>>Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endforeach; ?>
<?php endif; ?>

<?= $this->endSection() ?>