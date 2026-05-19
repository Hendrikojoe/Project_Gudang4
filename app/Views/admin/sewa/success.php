<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .card { border-radius: 15px; }
    .btn { border-radius: 10px; }
    .summary-card { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; }
    .badge-kategori { background: #e9ecef; color: #495057; padding: 5px 12px; border-radius: 20px; font-size: 11px; display: inline-block; }
    .table thead th { background-color: #f8f9fa; font-weight: 600; }
    .total-original { text-decoration: line-through; color: #f39c12; font-size: 16px; }
    .diskon-badge { background: #e74c3c; color: white; padding: 5px 15px; border-radius: 20px; font-size: 13px; display: inline-block; }
    .info-box { background: #f8f9fa; border-radius: 12px; padding: 15px; margin-top: 15px; }
    .calculation-box { background: #f8f9fa; border-radius: 12px; padding: 20px; margin-bottom: 20px; }
    .calculation-line { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px dashed #dee2e6; }
    .calculation-line.total { border-bottom: none; font-size: 1.2rem; font-weight: bold; color: #0f5132; background: #d1e7dd; margin-top: 10px; padding: 12px; border-radius: 8px; }
    .calculation-line.diskon { color: #dc3545; }
    .badge-durasi { background: #0d6efd; color: white; padding: 5px 12px; border-radius: 20px; font-size: 12px; }
    .badge-harian { background: #17a2b8; color: white; }
    .badge-event { background: #fd7e14; color: white; }
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-success mb-0"><i class="bi bi-check-circle-fill me-2"></i> Penyewaan Berhasil!</h4>
                    <p class="text-muted mt-2 mb-0">Data penyewaan telah berhasil disimpan</p>
                </div>
                <a href="<?= base_url('barang') ?>" class="btn btn-outline-secondary"><i class="bi bi-arrow-left me-2"></i>Kembali ke Barang</a>
            </div>

            <?php if (isset($sewa) && !empty($sewa)): ?>
            
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <strong>Berhasil!</strong> Penyewaan atas nama <strong><?= esc($sewa['nama_penyewa'] ?? '') ?></strong> telah disimpan.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>

            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white py-3">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                            <i class="bi bi-receipt text-success fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-primary mb-0">Detail Penyewaan</h5>
                            <p class="text-muted small mb-0">ID Transaksi: #<?= str_pad($sewa['id'] ?? 0, 6, '0', STR_PAD_LEFT) ?></p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">

                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <label class="text-muted small text-uppercase mb-1">Nama Penyewa</label>
                                <div class="fw-bold fs-5"><?= esc($sewa['nama_penyewa'] ?? '-') ?></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <label class="text-muted small text-uppercase mb-1">Lokasi / Venue</label>
                                <div class="fw-semibold"><?= esc($sewa['lokasi'] ?? '-') ?></div>
                            </div>
                        </div>
                        <?php if (!empty($sewa['deskripsi'])): ?>
                        <div class="col-12">
                            <div class="info-box">
                                <label class="text-muted small text-uppercase mb-1">Deskripsi</label>
                                <div class="fw-semibold"><?= esc($sewa['deskripsi']) ?></div>
                            </div>
                        </div>
                        <?php endif; ?>
                    </div>

                    <hr>

                    <h6 class="fw-bold text-primary mb-3"><i class="bi bi-box-seam me-2"></i>Barang yang Disewa</h6>
                    
                    <?php
                    $durasi = $sewa['durasi'] ?? 1;
                    $items = $sewa['items'] ?? [];
                    
                    $totalSemua = 0;
                    $subtotalPerHariSemua = 0;
                    
                    foreach ($items as $item) {
                        $subtotalPerHari = $item['harga'] * $item['qty'];
                        $subtotalPerHariSemua += $subtotalPerHari;
                        $totalSemua += $item['subtotal'];
                    }
                    
                    $diskon = $sewa['diskon'] ?? 0;
                    $diskonPersen = $sewa['diskon_persen'] ?? 0;
                    $totalSetelahDiskon = $totalSemua - $diskon;
                    if ($totalSetelahDiskon < 0) $totalSetelahDiskon = 0;
                    ?>
                    
                    <div class="table-responsive mb-4">
                        <table class="table table-bordered align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th width="5%">#</th>
                                    <th width="30%">Nama Barang</th>
                                    <th width="20%">Kategori Barang</th>
                                    <th width="15%">Kategori Sewa</th>
                                    <th width="10%" class="text-center">Jumlah</th>
                                    <th width="15%" class="text-end">Harga</th>
                                    <th width="15%" class="text-end">Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($items) && is_array($items)): ?>
                                    <?php $no = 1; ?>
                                    <?php foreach ($items as $item): ?>
                                        <?php 
                                        $subtotalPerHari = $item['harga'] * $item['qty'];
                                        $itemKategoriSewa = $item['kategori_sewa'] ?? 'harian';
                                        ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td class="fw-semibold"><?= esc($item['nama_barang'] ?? '-') ?></td>
                                            <td><span class="badge-kategori"><i class="bi bi-tag me-1"></i><?= esc($item['kategori'] ?? '-') ?></span></td>
                                            <td>
                                                <span class="badge <?= $itemKategoriSewa == 'harian' ? 'badge-harian' : 'badge-event' ?> px-3 py-2">
                                                    <i class="bi bi-<?= $itemKategoriSewa == 'harian' ? 'calendar-week' : 'star' ?> me-1"></i>
                                                    <?= ucfirst($itemKategoriSewa) ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge bg-primary bg-opacity-10 text-primary px-3 py-2">
                                                    <?= number_format($item['qty'] ?? 0) ?>
                                                </span>
                                            </td>
                                            <td class="text-end">Rp <?= number_format($item['harga'] ?? 0, 0, ',', '.') ?></td>
                                            <td class="text-end">
                                                Rp <?= number_format($item['subtotal'], 0, ',', '.') ?>
                                                <?php if ($itemKategoriSewa == 'harian'): ?>
                                                    <small class="text-muted d-block">(<?= number_format($subtotalPerHari, 0, ',', '.') ?>/hari × <?= $durasi ?> hari)</small>
                                                <?php else: ?>
                                                    <small class="text-muted d-block">(Event - harga tetap)</small>
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr><td colspan="7" class="text-center text-muted py-4"><i class="bi bi-inbox me-2"></i>Tidak ada data barang</td></tr>
                                <?php endif; ?>
                            </tbody>
                            <tfoot class="table-secondary">
                                <tr>
                                    <td colspan="6" class="text-end fw-bold">Total Keseluruhan:</td>
                                    <td class="text-end fw-bold">Rp <?= number_format($totalSemua, 0, ',', '.') ?></td>
                                </tr>
                                <?php if ($diskon > 0): ?>
                                <tr class="table-warning">
                                    <td colspan="6" class="text-end fw-bold text-danger">Diskon <?= $diskonPersen > 0 ? '(' . $diskonPersen . '%)' : '' ?>:</td>
                                    <td class="text-end fw-bold text-danger">- Rp <?= number_format($diskon, 0, ',', '.') ?></td>
                                </tr>
                                <?php endif; ?>
                                <tr class="table-success">
                                    <td colspan="6" class="text-end fw-bold fs-5">Grand Total:</td>
                                    <td class="text-end fw-bold fs-5 text-success">Rp <?= number_format($totalSetelahDiskon, 0, ',', '.') ?></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <!-- RINCIAN PERHITUNGAN -->
                    <div class="calculation-box">
                        <h6 class="fw-bold text-primary mb-3"><i class="bi bi-calculator me-2"></i>Rincian Perhitungan</h6>
                        
                        <div class="calculation-line">
                            <span><i class="bi bi-box text-secondary me-1"></i> Subtotal per Hari <small class="text-muted">(Harga × Jumlah)</small></span>
                            <span class="fw-bold">Rp <?= number_format($subtotalPerHariSemua, 0, ',', '.') ?></span>
                        </div>
                        
                        <div class="calculation-line">
                            <span><i class="bi bi-calendar-week text-secondary me-1"></i> Durasi Sewa</span>
                            <span><span class="badge-durasi"><?= $durasi ?> Hari</span></span>
                        </div>
                        
                        <div class="calculation-line">
                            <span><i class="bi bi-plus-circle text-secondary me-1"></i> Total Sebelum Diskon <small class="text-muted">(Rp <?= number_format($subtotalPerHariSemua, 0, ',', '.') ?> × <?= $durasi ?> hari)</small></span>
                            <span class="fw-bold">Rp <?= number_format($totalSemua, 0, ',', '.') ?></span>
                        </div>
                        
                        <?php if ($diskon > 0): ?>
                        <div class="calculation-line diskon">
                            <span><i class="bi bi-tag text-danger me-1"></i> Diskon <?= $diskonPersen > 0 ? '(' . $diskonPersen . '% dari total)' : '(Nominal)' ?></span>
                            <span class="fw-bold">- Rp <?= number_format($diskon, 0, ',', '.') ?></span>
                        </div>
                        <?php endif; ?>
                        
                        <div class="calculation-line total">
                            <span><i class="bi bi-cash-stack text-success me-1"></i> TOTAL YANG HARUS DIBAYAR</span>
                            <span class="text-success fs-4">Rp <?= number_format($totalSetelahDiskon, 0, ',', '.') ?></span>
                        </div>
                    </div>

                    <hr>

                    <div class="row g-3 mb-4">
                        <div class="col-md-4">
                            <div class="info-box">
                                <label class="text-muted small text-uppercase mb-1">Check In</label>
                                <div class="fw-semibold"><i class="bi bi-calendar-check me-1 text-success"></i> <?= isset($sewa['checkin']) ? date('d/m/Y', strtotime($sewa['checkin'])) : '-' ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box">
                                <label class="text-muted small text-uppercase mb-1">Check Out</label>
                                <div class="fw-semibold"><i class="bi bi-calendar-x me-1 text-danger"></i> <?= isset($sewa['checkout']) ? date('d/m/Y', strtotime($sewa['checkout'])) : '-' ?></div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="info-box">
                                <label class="text-muted small text-uppercase mb-1">Durasi</label>
                                <div class="fw-semibold"><i class="bi bi-clock me-1"></i> <?= $durasi ?> hari</div>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="summary-card rounded-3 p-4">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <small class="text-white-50">TOTAL PEMBAYARAN</small>
                                <div class="small text-white-50 mb-2">
                                    <?= number_format($subtotalPerHariSemua, 0, ',', '.') ?> (subtotal/hari) × <?= $durasi ?> hari = <?= number_format($totalSemua, 0, ',', '.') ?>
                                </div>
                                <?php if ($diskon > 0): ?>
                                    <div class="total-original mb-2"><small>Sebelum diskon: Rp <?= number_format($totalSemua, 0, ',', '.') ?></small></div>
                                    <div class="mb-2"><span class="diskon-badge"><i class="bi bi-tag me-1"></i> Hemat Rp <?= number_format($diskon, 0, ',', '.') ?> <?= $diskonPersen > 0 ? '(' . $diskonPersen . '% off)' : '' ?></span></div>
                                <?php endif; ?>
                                <div class="fw-bold fs-1 text-white">Rp <?= number_format($totalSetelahDiskon, 0, ',', '.') ?></div>
                            </div>
                            <div class="col-md-4 text-md-end"><i class="bi bi-receipt fs-1 text-white-50"></i></div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2 flex-wrap">
                        <a href="<?= base_url('sewa/create') ?>" class="btn btn-primary"><i class="bi bi-plus-circle me-1"></i>Sewa Baru</a>
                        <a href="<?= base_url('sewa/edit/' . ($sewa['id'] ?? 0)) ?>" class="btn btn-warning"><i class="bi bi-pencil me-1"></i>Edit</a>
                        <a href="<?= base_url('sewa/simpanLaporan/' . ($sewa['id'] ?? 0)) ?>" class="btn btn-success"><i class="bi bi-file-earmark-text me-1"></i>Simpan ke Laporan</a>
                    </div>

                </div>
            </div>

            <div class="card border-0 shadow-sm bg-light mt-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3"><i class="bi bi-info-circle-fill text-primary fs-5"></i></div>
                        <div><h6 class="fw-bold mb-1">Informasi Penting:</h6><p class="text-muted small mb-0">Data penyewaan sudah tersimpan di sistem. Anda dapat menambah sewa baru, atau mengedit data jika diperlukan.</p></div>
                    </div>
                </div>
            </div>
            
            <?php else: ?>
            <div class="alert alert-danger" role="alert"><i class="bi bi-exclamation-triangle-fill me-2"></i> Data penyewaan tidak ditemukan.</div>
            <?php endif; ?>

        </div>
    </div>
</div>

<?= $this->endSection() ?>