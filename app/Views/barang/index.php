<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container-fluid px-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold text-dark mb-0">
            <i class="bi bi-box-seam me-2 text-primary"></i>
            Data Barang
        </h4>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active">Data Barang</li>
            </ol>
        </nav>
    </div>

    <!-- Alert Messages -->
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

    <?php if (session()->getFlashdata('errors')): ?>
        <div class="alert alert-warning alert-dismissible fade show shadow-sm" role="alert">
            <i class="bi bi-exclamation-circle-fill me-2"></i>
            <ul class="mb-0">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <li><?= esc($error) ?></li>
                <?php endforeach; ?>
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <!-- Summary Cards -->
    <div class="row g-3 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-gradient-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-white-50 small text-uppercase">Total Barang</span>
                            <h3 class="text-white fw-bold mb-0"><?= count($barang) ?></h3>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="bi bi-boxes text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-gradient-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-white-50 small text-uppercase">Total Masuk</span>
                            <h3 class="text-white fw-bold mb-0"><?= $totalMasuk ?></h3>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="bi bi-arrow-down-circle text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-gradient-danger">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-white-50 small text-uppercase">Total Keluar</span>
                            <h3 class="text-white fw-bold mb-0"><?= $totalKeluar ?></h3>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="bi bi-arrow-up-circle text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card border-0 shadow-sm bg-gradient-info">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="text-white-50 small text-uppercase">Stok Tersedia</span>
                            <h3 class="text-white fw-bold mb-0">
                                <?php 
                                    $totalStok = 0;
                                    foreach($barang as $b) $totalStok += $b['stok'];
                                    echo $totalStok;
                                ?>
                            </h3>
                        </div>
                        <div class="bg-white bg-opacity-25 rounded-circle p-3">
                            <i class="bi bi-archive text-white fs-3"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Button -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div>
            <a href="<?= base_url('barang/create') ?>" class="btn btn-primary shadow-sm">
                <i class="bi bi-plus-circle me-2"></i>Tambah Barang Baru
            </a>
        </div>
        <div class="text-muted">
            <i class="bi bi-info-circle me-1"></i>
            Total <?= count($barang) ?> item barang
        </div>
    </div>

    <!-- Table Card -->
    <div class="card border-0 shadow-lg">
        <div class="card-header bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="mb-0 fw-bold text-dark">
                    <i class="bi bi-table me-2 text-primary"></i>
                    Daftar Barang
                </h5>
                <div class="input-group w-auto">
                    <span class="input-group-text bg-light border-0">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="searchInput" class="form-control border-0 bg-light" placeholder="Cari barang..." style="width: 200px;">
                </div>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0" id="barangTable">
                    <thead class="bg-light">
                        <tr>
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Nama Barang</th>
                            <th class="px-4 py-3 text-center">Stok</th>
                            <th class="px-4 py-3 text-center">Total Masuk</th>
                            <th class="px-4 py-3 text-center">Total Keluar</th>
                            <th class="px-4 py-3 text-center">Status</th>
                            <th class="px-4 py-3 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($barang as $index => $b): ?>
                        <tr class="border-bottom">
                            <td class="px-4">
                                <span class="fw-semibold">#<?= sprintf('%04d', $b['id']) ?></span>
                            </td>
                            <td class="px-4">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary bg-opacity-10 rounded-circle p-2 me-2">
                                        <i class="bi bi-box text-primary"></i>
                                    </div>
                                    <div>
                                        <span class="fw-medium"><?= esc($b['nama_barang']) ?></span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 text-center">
                                <span class="badge bg-<?= $b['stok'] <= 10 ? 'danger' : ($b['stok'] <= 20 ? 'warning' : 'success') ?> bg-opacity-10 text-<?= $b['stok'] <= 10 ? 'danger' : ($b['stok'] <= 20 ? 'warning' : 'success') ?> px-3 py-2 rounded-pill">
                                    <strong><?= $b['stok'] ?></strong> unit
                                </span>
                            </td>
                            <td class="px-4 text-center">
                                <span class="badge bg-success bg-opacity-10 text-success px-3 py-2">
                                    <i class="bi bi-arrow-down me-1"></i>
                                    <?= $b['total_masuk'] ?? 0 ?>
                                </span>
                            </td>
                            <td class="px-4 text-center">
                                <span class="badge bg-danger bg-opacity-10 text-danger px-3 py-2">
                                    <i class="bi bi-arrow-up me-1"></i>
                                    <?= $b['total_keluar'] ?? 0 ?>
                                </span>
                            </td>
                            <td class="px-4 text-center">
                                <?php if ($b['stok'] <= 0): ?>
                                    <span class="badge bg-dark text-white px-3 py-2">
                                        <i class="bi bi-x-circle me-1"></i> Habis
                                    </span>
                                <?php elseif ($b['stok'] <= 10): ?>
                                    <span class="badge bg-danger text-white px-3 py-2">
                                        <i class="bi bi-exclamation-triangle me-1"></i> Kritis
                                    </span>
                                <?php elseif ($b['stok'] <= 20): ?>
                                    <span class="badge bg-warning text-dark px-3 py-2">
                                        <i class="bi bi-exclamation-circle me-1"></i> Menipis
                                    </span>
                                <?php else: ?>
                                    <span class="badge bg-success text-white px-3 py-2">
                                        <i class="bi bi-check-circle me-1"></i> Aman
                                    </span>
                                <?php endif; ?>
                            </td>
                            <td class="px-4 text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <!-- Tombol Masuk -->
                                    <button type="button" class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalMasuk<?= $b['id'] ?>" title="Tambah Stok">
                                        <i class="bi bi-plus-circle"></i>
                                    </button>
                                    
                                    <!-- Tombol Keluar -->
                                    <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalKeluar<?= $b['id'] ?>" title="Kurangi Stok">
                                        <i class="bi bi-dash-circle"></i>
                                    </button>
                                    
                                    <!-- Tombol Edit -->
                                    <a href="<?= base_url('barang/edit/'.$b['id']) ?>" class="btn btn-sm btn-info" title="Edit Barang">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    
                                    <!-- Tombol Hapus -->
                                    <a href="<?= base_url('barang/delete/'.$b['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus barang <?= esc($b['nama_barang']) ?>?')" title="Hapus Barang">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                        
                        <?php if (empty($barang)): ?>
                        <tr>
                            <td colspan="7" class="text-center py-5">
                                <div class="text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-3"></i>
                                    <h5>Belum ada data barang</h5>
                                    <p class="mb-3">Klik tombol "Tambah Barang Baru" untuk menambahkan data pertama</p>
                                    <a href="<?= base_url('barang/create') ?>" class="btn btn-primary">
                                        <i class="bi bi-plus-circle me-2"></i>Tambah Barang
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer bg-white py-3">
            <div class="d-flex justify-content-between align-items-center">
                <div class="text-muted small">
                    <i class="bi bi-info-circle me-1"></i>
                    Klik tombol <span class="badge bg-success">Masuk</span> untuk menambah stok, 
                    <span class="badge bg-warning text-dark">Keluar</span> untuk mengurangi stok
                </div>
                <div class="text-muted small">
                    Menampilkan <?= count($barang) ?> dari <?= count($barang) ?> item
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODALS - Ditempatkan di luar tabel, setelah foreach selesai -->
<?php foreach($barang as $b): ?>
    <!-- Modal Barang Masuk -->
    <div class="modal fade" id="modalMasuk<?= $b['id'] ?>" tabindex="-1" aria-labelledby="modalMasukLabel<?= $b['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <form action="<?= base_url('barang/masuk/'.$b['id']) ?>" method="post">
                    <div class="modal-header bg-success text-white border-0">
                        <h5 class="modal-title" id="modalMasukLabel<?= $b['id'] ?>">
                            <i class="bi bi-box-arrow-in-down me-2"></i>
                            Barang Masuk
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="text-center mb-4">
                            <div class="bg-success bg-opacity-10 rounded-circle p-3 d-inline-block">
                                <i class="bi bi-box text-success fs-1"></i>
                            </div>
                            <h6 class="mt-3 fw-bold"><?= esc($b['nama_barang']) ?></h6>
                            <span class="badge bg-secondary">Stok saat ini: <?= $b['stok'] ?> unit</span>
                        </div>
                        <div class="mb-3">
                            <label for="jumlahMasuk<?= $b['id'] ?>" class="form-label fw-medium">
                                <i class="bi bi-sort-numeric-up me-1"></i>Jumlah Tambahan
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0">
                                    <i class="bi bi-plus-circle text-success"></i>
                                </span>
                                <input type="number" name="jumlah" id="jumlahMasuk<?= $b['id'] ?>" class="form-control border-0 bg-light" 
                                       placeholder="Masukkan jumlah" min="1" required autocomplete="off">
                                <span class="input-group-text bg-light border-0">unit</span>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-0 bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-1"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-check-lg me-1"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Barang Keluar -->
    <div class="modal fade" id="modalKeluar<?= $b['id'] ?>" tabindex="-1" aria-labelledby="modalKeluarLabel<?= $b['id'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg">
                <form action="<?= base_url('barang/keluar/'.$b['id']) ?>" method="post">
                    <div class="modal-header bg-warning border-0">
                        <h5 class="modal-title" id="modalKeluarLabel<?= $b['id'] ?>">
                            <i class="bi bi-box-arrow-up me-2"></i>
                            Barang Keluar
                        </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body p-4">
                        <div class="text-center mb-4">
                            <div class="bg-warning bg-opacity-10 rounded-circle p-3 d-inline-block">
                                <i class="bi bi-box text-warning fs-1"></i>
                            </div>
                            <h6 class="mt-3 fw-bold"><?= esc($b['nama_barang']) ?></h6>
                            <span class="badge bg-secondary">Stok saat ini: <?= $b['stok'] ?> unit</span>
                            <?php if ($b['stok'] <= 0): ?>
                                <div class="alert alert-danger mt-3 mb-0 py-2">
                                    <i class="bi bi-exclamation-triangle-fill me-1"></i>
                                    Stok habis! Tidak bisa melakukan pengeluaran.
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="jumlahKeluar<?= $b['id'] ?>" class="form-label fw-medium">
                                <i class="bi bi-sort-numeric-down me-1"></i>Jumlah Pengeluaran
                            </label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-0">
                                    <i class="bi bi-dash-circle text-warning"></i>
                                </span>
                                <input type="number" name="jumlah" id="jumlahKeluar<?= $b['id'] ?>" class="form-control border-0 bg-light" 
                                       placeholder="Masukkan jumlah" min="1" max="<?= $b['stok'] > 0 ? $b['stok'] : 0 ?>" 
                                       <?= $b['stok'] <= 0 ? 'disabled' : '' ?> required autocomplete="off">
                                <span class="input-group-text bg-light border-0">unit</span>
                            </div>
                            <?php if ($b['stok'] > 0): ?>
                                <small class="text-muted mt-1 d-block">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Maksimal <?= $b['stok'] ?> unit
                                </small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="modal-footer border-0 bg-light">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            <i class="bi bi-x-lg me-1"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-warning text-dark" <?= $b['stok'] <= 0 ? 'disabled' : '' ?>>
                            <i class="bi bi-check-lg me-1"></i>Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php endforeach; ?>

<script>
// Search functionality
document.getElementById('searchInput').addEventListener('keyup', function() {
    const searchValue = this.value.toLowerCase();
    const tableRows = document.querySelectorAll('#barangTable tbody tr');
    
    tableRows.forEach(row => {
        const text = row.textContent.toLowerCase();
        row.style.display = text.includes(searchValue) ? '' : 'none';
    });
});

// Auto close alerts
window.setTimeout(function() {
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        const bsAlert = new bootstrap.Alert(alert);
        bsAlert.close();
    });
}, 5000);

// Confirm delete with custom message
document.querySelectorAll('.btn-delete').forEach(button => {
    button.addEventListener('click', function(e) {
        if (!confirm(this.getAttribute('data-confirm'))) {
            e.preventDefault();
        }
    });
});
</script>

<style>
.bg-gradient-primary { background: linear-gradient(45deg, #4e73df, #224abe); }
.bg-gradient-success { background: linear-gradient(45deg, #1cc88a, #13855c); }
.bg-gradient-danger { background: linear-gradient(45deg, #e74a3b, #be2617); }
.bg-gradient-info { background: linear-gradient(45deg, #36b9cc, #258391); }

.card {
    transition: all 0.3s ease;
    border-radius: 15px;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15) !important;
}

.table tbody tr:hover {
    background-color: rgba(78, 115, 223, 0.05);
}

.btn-sm {
    padding: 0.4rem 0.8rem;
    border-radius: 8px;
    transition: all 0.2s ease;
}

.btn-sm:hover {
    transform: translateY(-2px);
    box-shadow: 0 0.125rem 0.25rem rgba(0,0,0,.075);
}

.badge {
    font-weight: 500;
    letter-spacing: 0.5px;
}

.modal-content {
    border-radius: 15px;
}

.modal-header {
    border-radius: 15px 15px 0 0;
    padding: 1rem 1.5rem;
}

.input-group-text {
    border-radius: 10px 0 0 10px;
}

.form-control {
    border-radius: 0 10px 10px 0;
}

.form-control:focus {
    box-shadow: none;
    border-color: #dee2e6;
    background-color: #fff;
}
</style>

<?= $this->endSection() ?>