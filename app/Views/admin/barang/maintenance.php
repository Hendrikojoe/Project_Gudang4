<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    .status-badge {
        display: inline-block;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }
    .status-baik { background: #d4edda; color: #155724; border-left: 4px solid #28a745; }
    .status-maintenance { background: #fff3cd; color: #856404; border-left: 4px solid #ffc107; }
    .status-rusak { background: #e2e3e5; color: #383d41; border-left: 4px solid #6c757d; }
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
    .table-status {
        background: white;
        border-radius: 12px;
        overflow: hidden;
    }
    .table-status th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    .jumlah-input {
        width: 120px;
        text-align: center;
        font-weight: bold;
    }
    .total-row {
        background-color: #e9ecef;
        font-weight: bold;
    }
    .stok-info {
        font-size: 14px;
        margin-top: 5px;
    }
</style>

<div class="container-fluid px-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark mb-0">
                    <i class="bi bi-tools me-2 text-warning"></i> Form Maintenance Barang
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>">Data Barang</a></li>
                        <li class="breadcrumb-item active">Maintenance</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-wrench me-2"></i> Form Maintenance Barang
                    </h5>
                </div>
                <div class="card-body">
                    <!-- Informasi Barang -->
                    <div class="info-card">
                        <div class="row">
                            <div class="col-md-4">
                                <label class="text-muted small">Nama Barang</label>
                                <div class="fw-bold fs-5"><?= esc($barang['nama_barang']) ?></div>
                            </div>
                            <div class="col-md-3">
                                <label class="text-muted small">Total Stok</label>
                                <div class="fw-bold text-primary" id="totalStokDisplay"><?= ($barang['stok'] + ($barang['jumlah_dalam_maintenance'] ?? 0) + ($barang['jumlah_rusak'] ?? 0)) ?> <?= esc($barang['satuan']) ?></div>
                            </div>
                            <div class="col-md-3">
                                <label class="text-muted small">Kategori</label>
                                <div class="fw-bold"><?= esc($barang['nama_kategori'] ?? '-') ?></div>
                            </div>
                            <div class="col-md-2">
                                <label class="text-muted small">Satuan</label>
                                <div class="fw-bold"><?= esc($barang['satuan']) ?></div>
                            </div>
                        </div>
                    </div>

                    <form action="<?= base_url('barang/updateMaintenance/'.$barang['id']) ?>" method="post" id="formMaintenance">
                        <?= csrf_field() ?>

                        <!-- Tabel Status Maintenance -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Status Maintenance Barang</label>
                            <div class="table-responsive table-status">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="30%">Status</th>
                                            <th width="30%">Keterangan</th>
                                            <th width="20%">Jumlah (<?= esc($barang['satuan']) ?>)</th>
                                            <th width="20%">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="table-success">
                                            <td>
                                                <strong>🟢 Baik (Siap Pakai)</strong>
                                                <input type="hidden" name="status_baik" value="baik">
                                            </td>
                                            <td>Barang dalam kondisi baik dan siap untuk disewakan</td>
                                            <td>
                                                <input type="number" 
                                                       name="jumlah_baik" 
                                                       id="jumlah_baik" 
                                                       class="form-control jumlah-input text-success" 
                                                       value="<?= $barang['stok'] ?? 0 ?>" 
                                                       min="0"
                                                       step="1"
                                                       onchange="hitungTotal()">
                                            </td>
                                            <td><span class="badge bg-success">Aktif</span></td>
                                        </tr>
                                        <tr class="table-warning">
                                            <td>
                                                <strong>🟡 Maintenance (Perawatan)</strong>
                                                <input type="hidden" name="status_maintenance" value="maintenance">
                                            </td>
                                            <td>Barang sedang dalam perawatan rutin, tidak bisa disewakan sementara</td>
                                            <td>
                                                <input type="number" 
                                                       name="jumlah_maintenance" 
                                                       id="jumlah_maintenance" 
                                                       class="form-control jumlah-input text-warning" 
                                                       value="<?= $barang['jumlah_dalam_maintenance'] ?? 0 ?>" 
                                                       min="0"
                                                       step="1"
                                                       onchange="hitungTotal()">
                                            </td>
                                            <td><span class="badge bg-warning text-dark">Perawatan</span></td>
                                        </tr>
                                        <tr class="table-secondary">
                                            <td>
                                                <strong>⚫ Rusak</strong>
                                                <input type="hidden" name="status_rusak" value="rusak">
                                            </td>
                                            <td>Barang rusak dan tidak dapat digunakan, perlu perbaikan besar atau penghapusan</td>
                                            <td>
                                                <input type="number" 
                                                       name="jumlah_rusak" 
                                                       id="jumlah_rusak" 
                                                       class="form-control jumlah-input text-secondary" 
                                                       value="<?= $barang['jumlah_rusak'] ?? 0 ?>" 
                                                       min="0"
                                                       step="1"
                                                       onchange="hitungTotal()">
                                            </td>
                                            <td><span class="badge bg-secondary">Tidak Aktif</span></td>
                                        </tr>
                                        <tr class="total-row">
                                            <td colspan="2" class="text-end fw-bold">Total Keseluruhan:</td>
                                            <td>
                                                <input type="text" 
                                                       id="total_jumlah" 
                                                       class="form-control jumlah-input" 
                                                       readonly 
                                                       style="background-color:#e9ecef; font-weight:bold;">
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Alert Warning -->
                            <div id="alertWarning" class="alert alert-warning mt-3" style="display: none;">
                                <i class="bi bi-exclamation-triangle me-2"></i>
                                <strong>Perhatian!</strong> Total jumlah melebihi total stok yang tersedia!
                            </div>
                            <div id="alertSuccess" class="alert alert-success mt-3" style="display: none;">
                                <i class="bi bi-check-circle me-2"></i>
                                <strong>Info:</strong> Jumlah barang valid. Silakan simpan perubahan.
                            </div>
                            
                            <div class="form-text text-muted mt-2">
                                <i class="bi bi-info-circle me-1"></i> 
                                Masukkan jumlah barang untuk setiap status. Total tidak boleh melebihi total stok (<?= ($barang['stok'] + ($barang['jumlah_dalam_maintenance'] ?? 0) + ($barang['jumlah_rusak'] ?? 0)) ?> <?= esc($barang['satuan']) ?>)
                            </div>
                        </div>

                        <!-- Keterangan Maintenance -->
                        <div class="mb-4">
                            <label for="keterangan_maintenance" class="form-label fw-bold">
                                <i class="bi bi-file-text me-1"></i> Keterangan Maintenance
                            </label>
                            <textarea name="keterangan_maintenance" id="keterangan_maintenance" class="form-control" rows="4" 
                                placeholder="Masukkan keterangan detail tentang perbaikan/maintenance barang..."><?= old('keterangan_maintenance', $barang['keterangan_maintenance'] ?? '') ?></textarea>
                            <div class="form-text text-muted">
                                <i class="bi bi-info-circle me-1"></i> Jelaskan detail perbaikan, penyebab kerusakan, jadwal maintenance, atau tindakan yang dilakukan
                            </div>
                        </div>

                        <!-- Tipe Barang -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-tag me-1"></i> Tipe Barang (Untuk Penyewaan)
                            </label>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipe_barang" id="tipe_baru" value="baru"
                                            <?= ($barang['tipe_barang'] ?? 'baru') == 'baru' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="tipe_baru">
                                            <span class="badge bg-primary">🆕 Baru</span>
                                            <small class="text-muted d-block">Barang dalam kondisi baru / seperti baru / belum pernah disewakan</small>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tipe_barang" id="tipe_bekas" value="bekas"
                                            <?= ($barang['tipe_barang'] ?? '') == 'bekas' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="tipe_bekas">
                                            <span class="badge bg-warning text-dark">♻️ Bekas</span>
                                            <small class="text-muted d-block">Barang bekas / pernah digunakan / second</small>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?= base_url('barang') ?>" class="btn btn-secondary">
                                <i class="bi bi-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-primary" id="btnSubmit">
                                <i class="bi bi-save me-2"></i>Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <!-- Ringkasan Stok -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-clipboard-data me-2"></i> Ringkasan Stok Barang
                    </h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm table-borderless">
                        <tr>
                            <td>Nama Barang</td>
                            <td class="fw-bold">: <?= esc($barang['nama_barang']) ?></td>
                        </tr>
                        <tr>
                            <td>Total Stok Fisik</td>
                            <td class="fw-bold text-primary">: <span id="totalStokFisik"><?= ($barang['stok'] + ($barang['jumlah_dalam_maintenance'] ?? 0) + ($barang['jumlah_rusak'] ?? 0)) ?></span> <?= esc($barang['satuan']) ?></td>
                        </tr>
                        <tr class="table-success">
                            <td>🟢 Stok Baik (Siap Pakai)</td>
                            <td class="fw-bold text-success">: <span id="ringkasanBaik"><?= $barang['stok'] ?? 0 ?></span> <?= esc($barang['satuan']) ?></td>
                        </tr>
                        <tr class="table-warning">
                            <td>🟡 Stok Maintenance</td>
                            <td class="fw-bold text-warning">: <span id="ringkasanMaintenance"><?= $barang['jumlah_dalam_maintenance'] ?? 0 ?></span> <?= esc($barang['satuan']) ?></td>
                        </tr>
                        <tr class="table-secondary">
                            <td>⚫ Stok Rusak</td>
                            <td class="fw-bold text-secondary">: <span id="ringkasanRusak"><?= $barang['jumlah_rusak'] ?? 0 ?></span> <?= esc($barang['satuan']) ?></td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Legend Card -->
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-palette me-2"></i> Keterangan Status
                    </h6>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="legend-color" style="background: #28a745;"></div>
                        <div class="ms-2">
                            <strong>🟢 Baik (Siap Pakai)</strong>
                            <div class="small text-muted">Barang dalam kondisi baik dan siap untuk disewakan</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="legend-color" style="background: #ffc107;"></div>
                        <div class="ms-2">
                            <strong>🟡 Maintenance (Perawatan)</strong>
                            <div class="small text-muted">Barang sedang dalam perawatan rutin, tidak bisa disewakan</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-center mb-3">
                        <div class="legend-color" style="background: #6c757d;"></div>
                        <div class="ms-2">
                            <strong>⚫ Rusak</strong>
                            <div class="small text-muted">Barang rusak dan tidak dapat digunakan</div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex align-items-center">
                        <i class="bi bi-tag fs-5 me-2 text-primary"></i>
                        <div>
                            <strong>Tipe Barang</strong>
                            <div class="small text-muted">Baru: Kondisi baru/seperti baru | Bekas: Pernah digunakan</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Card -->
            <div class="card shadow-sm">
                <div class="card-header bg-white py-3">
                    <h6 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-info-circle me-2"></i> Informasi
                    </h6>
                </div>
                <div class="card-body">
                    <p class="small text-muted mb-0">
                        <i class="bi bi-check-circle text-success me-1"></i> 
                        <strong>Stok Baik</strong> - Barang yang siap disewakan.<br><br>
                        <i class="bi bi-tools text-warning me-1"></i>
                        <strong>Stok Maintenance</strong> - Barang yang sedang dalam perawatan, TIDAK bisa disewakan.<br><br>
                        <i class="bi bi-exclamation-triangle text-danger me-1"></i>
                        <strong>Stok Rusak</strong> - Barang yang rusak, TIDAK bisa disewakan.<br><br>
                        <i class="bi bi-box-seam text-primary me-1"></i>
                        <strong>Total Stok Fisik</strong> - Jumlah keseluruhan barang (Baik + Maintenance + Rusak).
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    const totalStokAwal = <?= ($barang['stok'] + ($barang['jumlah_dalam_maintenance'] ?? 0) + ($barang['jumlah_rusak'] ?? 0)) ?>;
    const jumlahBaik = document.getElementById('jumlah_baik');
    const jumlahMaintenance = document.getElementById('jumlah_maintenance');
    const jumlahRusak = document.getElementById('jumlah_rusak');
    const totalJumlah = document.getElementById('total_jumlah');
    const alertWarning = document.getElementById('alertWarning');
    const alertSuccess = document.getElementById('alertSuccess');
    const btnSubmit = document.getElementById('btnSubmit');
    
    // Ringkasan elements
    const ringkasanBaik = document.getElementById('ringkasanBaik');
    const ringkasanMaintenance = document.getElementById('ringkasanMaintenance');
    const ringkasanRusak = document.getElementById('ringkasanRusak');
    const totalStokFisik = document.getElementById('totalStokFisik');

    function hitungTotal() {
        let baik = parseInt(jumlahBaik.value) || 0;
        let maintenance = parseInt(jumlahMaintenance.value) || 0;
        let rusak = parseInt(jumlahRusak.value) || 0;
        
        let total = baik + maintenance + rusak;
        totalJumlah.value = total;
        
        // Update ringkasan
        ringkasanBaik.textContent = baik;
        ringkasanMaintenance.textContent = maintenance;
        ringkasanRusak.textContent = rusak;
        totalStokFisik.textContent = totalStokAwal;
        
        // Validasi
        if (total > totalStokAwal) {
            alertWarning.style.display = 'block';
            alertSuccess.style.display = 'none';
            btnSubmit.disabled = true;
            btnSubmit.classList.add('opacity-50');
        } else if (total < totalStokAwal) {
            alertWarning.style.display = 'block';
            alertWarning.innerHTML = '<i class="bi bi-exclamation-triangle me-2"></i> <strong>Perhatian!</strong> Total jumlah (' + total + ') kurang dari total stok fisik (' + totalStokAwal + '). Ada barang yang tidak terdata?';
            alertSuccess.style.display = 'none';
            btnSubmit.disabled = false;
            btnSubmit.classList.remove('opacity-50');
        } else {
            alertWarning.style.display = 'none';
            alertSuccess.style.display = 'block';
            alertSuccess.innerHTML = '<i class="bi bi-check-circle me-2"></i> <strong>Info:</strong> Jumlah barang valid (' + total + ' / ' + totalStokAwal + '). Silakan simpan perubahan.';
            btnSubmit.disabled = false;
            btnSubmit.classList.remove('opacity-50');
        }
        
        // Update warna input berdasarkan nilai
        if (baik > 0) jumlahBaik.classList.add('border-success');
        else jumlahBaik.classList.remove('border-success');
        
        if (maintenance > 0) jumlahMaintenance.classList.add('border-warning');
        else jumlahMaintenance.classList.remove('border-warning');
        
        if (rusak > 0) jumlahRusak.classList.add('border-secondary');
        else jumlahRusak.classList.remove('border-secondary');
    }
    
    // Event listeners
    jumlahBaik.addEventListener('input', hitungTotal);
    jumlahMaintenance.addEventListener('input', hitungTotal);
    jumlahRusak.addEventListener('input', hitungTotal);
    
    // Initial call
    hitungTotal();
    
    // Validasi sebelum submit
    document.getElementById('formMaintenance').addEventListener('submit', function(e) {
        let total = parseInt(totalJumlah.value) || 0;
        if (total !== totalStokAwal) {
            e.preventDefault();
            alert('Total jumlah barang harus sama dengan total stok fisik (' + totalStokAwal + ' ' + '<?= esc($barang['satuan']) ?>' + ')!');
            return false;
        }
        return true;
    });
</script>

<?= $this->endSection() ?>