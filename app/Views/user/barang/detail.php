<?= $this->extend('user/layout') ?>
<?= $this->section('content') ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        text-align: center;
    }
    .info-card {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 15px;
        margin-bottom: 20px;
    }
    .legend-color {
        display: inline-block;
        width: 16px;
        height: 16px;
        border-radius: 4px;
        margin-right: 8px;
    }
    .stok-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        border-bottom: 1px solid #dee2e6;
    }
    .stok-item:last-child {
        border-bottom: none;
    }
    .stok-label {
        font-weight: 600;
    }
    .stok-jumlah {
        font-size: 20px;
        font-weight: 700;
    }
    .stok-box {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        margin: 5px;
        text-align: center;
    }
    .stok-box-baik { background-color: #28a745; color: white; }
    .stok-box-maintenance { background-color: #ffc107; color: #856404; }
    .stok-box-rusak { background-color: #6c757d; color: white; }
    
    /* Gambar Styles */
    .barang-image {
        text-align: center;
        margin-bottom: 20px;
    }
    .barang-image img {
        max-width: 100%;
        max-height: 250px;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        object-fit: cover;
        cursor: pointer;
    }
    .image-placeholder {
        background: linear-gradient(135deg, #f5f7fa 0%, #e4e8f0 100%);
        border-radius: 12px;
        padding: 40px;
        text-align: center;
    }
    .image-placeholder i {
        font-size: 64px;
        color: #adb5bd;
        margin-bottom: 10px;
    }
    
    /* Table Styles */
    .table-info-detail {
        width: 100%;
        border-collapse: collapse;
    }
    .table-info-detail th {
        width: 35%;
        font-weight: 600;
        color: #495057;
        padding: 8px 0;
    }
    .table-info-detail td {
        padding: 8px 0;
        color: #6c757d;
    }
    .table-info-detail .value {
        font-weight: 500;
        color: #212529;
    }
</style>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark mb-0">
                    <i class="bi bi-info-circle me-2 text-primary"></i> Informasi Barang
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>">Data Barang</a></li>
                        <li class="breadcrumb-item active">Detail Barang</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 mb-4">
            <!-- Informasi Barang Card -->
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-box-seam me-2"></i> Informasi Barang
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Gambar Barang -->
                    <?php 
                    $gambarFile = $barang['gambar'] ?? '';
                    $gambarPath = FCPATH . 'uploads/barang/' . $gambarFile;
                    $hasImage = !empty($gambarFile) && file_exists($gambarPath);
                    ?>
                    
                    <div class="barang-image">
                        <?php if ($hasImage): ?>
                            <img src="<?= base_url('uploads/barang/' . $gambarFile) ?>" 
                                 alt="<?= esc($barang['nama_barang']) ?>"
                                 onclick="openImageModal('<?= base_url('uploads/barang/' . $gambarFile) ?>')">
                            <p class="text-muted small mt-2">
                                <i class="bi bi-zoom-in me-1"></i> Klik gambar untuk memperbesar
                            </p>
                        <?php else: ?>
                            <div class="image-placeholder">
                                <i class="bi bi-image"></i>
                                <p class="text-muted mb-0">Tidak ada gambar</p>
                                <small class="text-muted">Upload gambar melalui form edit</small>
                            </div>
                        <?php endif; ?>
                    </div>

                    <!-- Tabel Informasi Barang -->
                    <table class="table-info-detail">
                        <tr>
                            <th>ID Barang</th>
                            <td class="value">#<?= str_pad($barang['id'], 4, '0', STR_PAD_LEFT) ?></td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td class="value"><strong><?= esc($barang['nama_barang']) ?></strong></td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td class="value">
                                <?php 
                                if (!empty($barang['nama_kategori'])) {
                                    echo '<span class="badge bg-info text-dark">' . esc($barang['nama_kategori']) . '</span>';
                                } else {
                                    echo '<span class="text-muted">-</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Satuan</th>
                            <td class="value"><?= esc($barang['satuan']) ?></td>
                        </tr>
                        <tr>
                            <th>Stok Saat Ini</th>
                            <td class="value">
                                <strong class="text-primary"><?= number_format($barang['stok']) ?> <?= esc($barang['satuan']) ?></strong>
                            </td>
                        </tr>
                        <tr>
                            <th>Status Stok</th>
                            <td class="value">
                                <?php 
                                if ($barang['stok'] <= 0) {
                                    echo '<span class="badge bg-danger">Habis</span>';
                                } elseif ($barang['stok'] <= 5) {
                                    echo '<span class="badge bg-warning text-dark">Kritis</span>';
                                } elseif ($barang['stok'] <= 10) {
                                    echo '<span class="badge bg-info">Menipis</span>';
                                } else {
                                    echo '<span class="badge bg-success">Aman</span>';
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Tipe Barang</th>
                            <td class="value">
                                <?php 
                                $tipe = $barang['tipe_barang'] ?? 'baru';
                                if($tipe == 'baru'): ?>
                                    <span class="badge bg-primary">🆕 Baru</span>
                                <?php else: ?>
                                    <span class="badge bg-warning text-dark">♻️ Bekas</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Ditambahkan</th>
                            <td class="value"><?= date('d/m/Y H:i', strtotime($barang['created_at'])) ?></td>
                        </tr>
                        <tr>
                            <th>Diupdate</th>
                            <td class="value"><?= date('d/m/Y H:i', strtotime($barang['updated_at'])) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <!-- Detail Stok Berdasarkan Status -->
            <div class="card shadow-sm h-100">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-pie-chart me-2"></i> Detail Stok Berdasarkan Status
                    </h5>
                </div>
                <div class="card-body">
                    <?php 
                    $stokBaik = $barang['stok'] ?? 0;
                    $stokMaintenance = $barang['jumlah_dalam_maintenance'] ?? 0;
                    $stokRusak = $barang['jumlah_rusak'] ?? 0;
                    $totalStok = $stokBaik + $stokMaintenance + $stokRusak;
                    ?>
                    
                    <!-- Stok Baik -->
                    <div class="stok-item">
                        <div class="stok-label">
                            <i class="bi bi-check-circle-fill text-success me-2"></i>
                            <span class="fw-bold">🟢 Stok Baik (Siap Pakai)</span>
                        </div>
                        <div class="stok-jumlah text-success">
                            <?= number_format($stokBaik) ?> <?= esc($barang['satuan']) ?>
                        </div>
                    </div>
                    <div class="progress mb-3" style="height: 8px;">
                        <div class="progress-bar bg-success" style="width: <?= $totalStok > 0 ? ($stokBaik / $totalStok) * 100 : 0 ?>%"></div>
                    </div>
                    
                    <!-- Stok Maintenance -->
                    <div class="stok-item">
                        <div class="stok-label">
                            <i class="bi bi-tools text-warning me-2"></i>
                            <span class="fw-bold">🟡 Stok Maintenance (Perawatan)</span>
                        </div>
                        <div class="stok-jumlah text-warning">
                            <?= number_format($stokMaintenance) ?> <?= esc($barang['satuan']) ?>
                        </div>
                    </div>
                    <div class="progress mb-3" style="height: 8px;">
                        <div class="progress-bar bg-warning" style="width: <?= $totalStok > 0 ? ($stokMaintenance / $totalStok) * 100 : 0 ?>%"></div>
                    </div>
                    
                    <!-- Stok Rusak -->
                    <div class="stok-item">
                        <div class="stok-label">
                            <i class="bi bi-exclamation-triangle-fill text-secondary me-2"></i>
                            <span class="fw-bold">⚫ Stok Rusak (Tidak Layak)</span>
                        </div>
                        <div class="stok-jumlah text-secondary">
                            <?= number_format($stokRusak) ?> <?= esc($barang['satuan']) ?>
                        </div>
                    </div>
                    <div class="progress mb-3" style="height: 8px;">
                        <div class="progress-bar bg-secondary" style="width: <?= $totalStok > 0 ? ($stokRusak / $totalStok) * 100 : 0 ?>%"></div>
                    </div>
                    
                    <hr>
                    
                    <!-- Total Stok -->
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="fw-bold">
                            <i class="bi bi-calculator-fill me-2"></i>
                            Total Seluruh Stok
                        </div>
                        <div class="fs-4 fw-bold text-primary">
                            <?= number_format($totalStok) ?> <?= esc($barang['satuan']) ?>
                        </div>
                    </div>
                    
                    <!-- Informasi Tambahan jika ada maintenance atau rusak -->
                    <?php if ($stokMaintenance > 0 || $stokRusak > 0): ?>
                    <hr>
                    <div class="mt-3">
                        <h6 class="fw-bold text-primary mb-2">
                            <i class="bi bi-info-circle me-1"></i> Informasi Tambahan
                        </h6>
                        <?php if ($stokMaintenance > 0): ?>
                        <div class="alert alert-warning py-2 mb-2">
                            <i class="bi bi-tools me-2"></i>
                            <strong>🟡 Maintenance:</strong> <?= $stokMaintenance ?> <?= esc($barang['satuan']) ?> sedang dalam perawatan
                            <br><small class="text-muted">📅 Terakhir diupdate: <?= date('d/m/Y H:i', strtotime($barang['updated_at'])) ?></small>
                        </div>
                        <?php endif; ?>
                        <?php if ($stokRusak > 0): ?>
                        <div class="alert alert-secondary py-2 mb-2">
                            <i class="bi bi-exclamation-triangle me-2"></i>
                            <strong>⚫ Rusak:</strong> <?= $stokRusak ?> <?= esc($barang['satuan']) ?> dalam kondisi rusak/tidak layak
                            <br><small class="text-muted">📅 Terakhir diupdate: <?= date('d/m/Y H:i', strtotime($barang['updated_at'])) ?></small>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistik Transaksi -->
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-graph-up me-2"></i> Statistik Transaksi
                    </h5>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="p-3 bg-success bg-opacity-10 rounded-3">
                                <i class="bi bi-arrow-down-circle fs-2 text-success"></i>
                                <h5 class="mt-2 mb-0"><?= number_format($totalMasuk ?? 0) ?></h5>
                                <small class="text-muted">Total Masuk</small>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3 mb-md-0">
                            <div class="p-3 bg-danger bg-opacity-10 rounded-3">
                                <i class="bi bi-arrow-up-circle fs-2 text-danger"></i>
                                <h5 class="mt-2 mb-0"><?= number_format($totalKeluar ?? 0) ?></h5>
                                <small class="text-muted">Total Keluar</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 bg-primary bg-opacity-10 rounded-3">
                                <i class="bi bi-box-seam fs-2 text-primary"></i>
                                <h5 class="mt-2 mb-0"><?= number_format($barang['stok']) ?></h5>
                                <small class="text-muted">Stok Akhir</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Riwayat Transaksi -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">
                <i class="bi bi-clock-history me-2"></i> Riwayat Transaksi
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Tanggal & Waktu</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($transaksi)): ?>
                            <?php foreach ($transaksi as $t): ?>
                                <tr>
                                    <td><?= date('d/m/Y H:i', strtotime($t['tanggal'])) ?></td>
                                    <td>
                                        <?php if ($t['jenis_transaksi'] == 'masuk'): ?>
                                            <span class="badge bg-success">MASUK</span>
                                        <?php else: ?>
                                            <span class="badge bg-danger">KELUAR</span>
                                        <?php endif; ?>
                                    </td>
                                    <td class="<?= $t['jenis_transaksi'] == 'masuk' ? 'text-success' : 'text-danger' ?>">
                                        <?= $t['jenis_transaksi'] == 'masuk' ? '+' : '-' ?><?= number_format($t['jumlah']) ?> <?= esc($barang['satuan']) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center text-muted py-4">
                                    <i class="bi bi-inbox me-2"></i> Belum ada riwayat transaksi
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Keterangan Status -->
    <div class="card shadow-sm mb-4">
        <div class="card-header bg-white py-3">
            <h5 class="mb-0 fw-bold text-primary">
                <i class="bi bi-palette me-2"></i> Keterangan Status
            </h5>
        </div>
        <div class="card-body">
            <div class="row g-2">
                <div class="col-md-4">
                    <div class="d-flex align-items-center p-2 rounded" style="background: #d4edda;">
                        <div class="legend-color" style="background: #28a745;"></div>
                        <span class="small">🟢 Baik - Siap Pakai</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center p-2 rounded" style="background: #fff3cd;">
                        <div class="legend-color" style="background: #ffc107;"></div>
                        <span class="small">🟡 Maintenance - Perawatan</span>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="d-flex align-items-center p-2 rounded" style="background: #e2e3e5;">
                        <div class="legend-color" style="background: #6c757d;"></div>
                        <span class="small">⚫ Rusak - Tidak Layak</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex justify-content-end gap-2 mt-4 mb-5">
        <a href="<?= base_url('barang') ?>" class="btn btn-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>
</div>

<!-- Modal untuk Preview Gambar -->
<div class="modal fade" id="imageModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-image me-2 text-primary"></i> 
                    <?= esc($barang['nama_barang']) ?>
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-4">
                <img id="modalImage" src="" alt="Preview" class="img-fluid rounded" style="max-height: 500px;">
            </div>
        </div>
    </div>
</div>

<script>
function openImageModal(imageUrl) {
    document.getElementById('modalImage').src = imageUrl;
    new bootstrap.Modal(document.getElementById('imageModal')).show();
}
</script>

<?= $this->endSection() ?>