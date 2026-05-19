<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
    .form-container {
        max-width: 1200px;
        margin: 0 auto;
    }
    
    .card {
        border-radius: 16px;
        border: none;
        box-shadow: 0 2px 12px rgba(0,0,0,0.08);
    }
    
    .card-header {
        background: white;
        border-bottom: 2px solid #f0f0f0;
        padding: 20px 25px;
    }
    
    .card-header h5 {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
    }
    
    .form-label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 8px;
    }
    
    .form-control, .form-select {
        border-radius: 10px;
        border: 1px solid #e0e0e0;
        padding: 10px 12px;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 3px rgba(52,152,219,0.1);
    }
    
    .required:after {
        content: "*";
        color: #e74c3c;
        margin-left: 4px;
    }
    
    .btn-primary {
        background: #3498db;
        border: none;
        padding: 10px 25px;
        border-radius: 10px;
        font-weight: 500;
    }
    
    .btn-primary:hover {
        background: #2980b9;
    }
    
    .btn-secondary {
        background: #95a5a6;
        border: none;
        padding: 10px 25px;
        border-radius: 10px;
    }
    
    .btn-secondary:hover {
        background: #7f8c8d;
    }
    
    .alert {
        border-radius: 10px;
        border: none;
    }
    
    .breadcrumb {
        background: transparent;
        padding: 0;
        margin: 0;
    }
    
    .breadcrumb-item a {
        color: #3498db;
        text-decoration: none;
    }
    
    .breadcrumb-item.active {
        color: #7f8c8d;
    }
    
    .info-card {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 15px;
    }
    
    .badge-kategori {
        background: #e9ecef;
        color: #495057;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        display: inline-block;
    }
    
    .kategori-info {
        background: #f0f7ff;
        border-left: 4px solid #3498db;
        padding: 10px 15px;
        border-radius: 8px;
        margin-top: 5px;
    }
    
    .stok-info {
        font-size: 12px;
        color: #6c757d;
        margin-top: 5px;
    }
    
    .diskon-box {
        background: #fff3cd;
        border: 1px solid #ffecb5;
        border-radius: 12px;
        padding: 15px;
        margin-top: 15px;
    }
    
    .total-setelah-diskon {
        background: #d1e7dd;
        border: 1px solid #badbcc;
        border-radius: 12px;
        padding: 15px;
        margin-top: 15px;
    }
    
    .total-setelah-diskon h4 {
        color: #0f5132;
        margin-bottom: 0;
    }
</style>

<div class="container-fluid">
    <div class="form-container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold text-dark mb-0">
                <i class="bi bi-pencil-square me-2 text-warning"></i> Edit Penyewaan
            </h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>">Data Barang</a></li>
                    <li class="breadcrumb-item active">Edit Sewa</li>
                </ol>
            </nav>
        </div>

        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i>
                <?= session()->getFlashdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle-fill me-2"></i>
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <div class="card">
            <div class="card-header">
                <h5><i class="bi bi-pencil-square me-2 text-warning"></i> Edit Data Penyewaan</h5>
            </div>
            <div class="card-body p-4">
                <form action="<?= base_url('sewa/update/'.$sewa['id']) ?>" method="post" id="formSewa">
                    <?= csrf_field() ?>
                    
                    <div class="mb-4">
                        <label class="form-label required">Nama Penyewa</label>
                        <input type="text" name="nama_penyewa" class="form-control" placeholder="Masukkan nama penyewa" value="<?= old('nama_penyewa', $sewa['nama_penyewa']) ?>" required>
                        <div class="form-text text-muted">Masukkan nama lengkap penyewa</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label required">Kategori Barang</label>
                        <select id="filterKategori" class="form-select">
                            <option value="">-- Semua Kategori --</option>
                            <?php foreach ($kategori as $k): ?>
                                <option value="<?= $k['id'] ?>"><?= $k['nama'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="form-label required">Tambah Barang</label>
                        <div class="row g-2 mb-3">
                            <div class="col-md-4">
                                <select id="barang_id" class="form-select">
                                    <option value="">-- Pilih Barang --</option>
                                    <?php foreach ($barang as $b): ?>
                                        <option value="<?= $b['id'] ?>"
                                            data-nama="<?= $b['nama_barang'] ?>"
                                            data-kategori-id="<?= $b['kategori_id'] ?>"
                                            data-kategori="<?= $b['nama_kategori'] ?? '-' ?>"
                                            data-harga="<?= $b['harga_jual'] ?? $b['harga'] ?? 0 ?>"
                                            data-stok="<?= $b['stok'] ?? 0 ?>"
                                            data-satuan="<?= $b['satuan'] ?? 'pcs' ?>">
                                            <?= esc($b['nama_barang']) ?> (Stok: <?= $b['stok'] ?? 0 ?>)
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="jumlah" class="form-control" placeholder="Jumlah" min="1">
                            </div>
                            <div class="col-md-3">
                                <input type="number" id="harga_item" class="form-control" placeholder="Harga">
                            </div>
                            <div class="col-md-2">
                                <button type="button" id="btnTambah" class="btn btn-success w-100"><i class="bi bi-plus-circle"></i> Tambah</button>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label required">Kategori Sewa</label>
                            <select name="kategori" id="kategori" class="form-select" required>
                                <option value="harian" <?= old('kategori', $sewa['kategori']) == 'harian' ? 'selected' : '' ?>>Harian</option>
                                <option value="event" <?= old('kategori', $sewa['kategori']) == 'event' ? 'selected' : '' ?>>Event</option>
                            </select>
                            <div class="form-text text-muted">Pilih jenis sewa (Harian atau Event)</div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-bordered" id="tableDetail">
                                <thead class="table-light">
                                    <tr><th>Nama Barang</th><th>Kategori barang</th><th>Kategori Sewa</th><th>Jumlah Barang</th><th>Harga</th><th>Subtotal</th><th>Aksi</th></tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($items)): ?>
                                        <?php foreach ($items as $index => $item): ?>
                                            <tr>
                                                <td><?= esc($item['nama_barang'] ?? '-') ?></td>
                                                <td><?= esc($item['kategori'] ?? '-') ?></td>
                                                <td><?= esc($sewa['kategori'] ?? '-') ?></td>
                                                <td><?= $item['qty'] ?></td>
                                                <td>Rp <?= number_format($item['harga'], 0, ',', '.') ?></td>
                                                <td>Rp <?= number_format($item['subtotal'], 0, ',', '.') ?></td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="hapusItem(<?= $index ?>)">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>
                                <tfoot>
                                    <tr class="table-secondary">
                                        <td colspan="4" class="text-end fw-bold">Total Harga Sewa:</td>
                                        <td colspan="2" class="fw-bold" id="grandTotalDisplay">Rp 0</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <input type="hidden" name="detail_json" id="detail_json" value='<?= json_encode($items ?? []) ?>'>
                        <div class="form-text text-muted"><i class="bi bi-plus-circle me-1"></i> Tambahkan barang yang akan disewa</div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="diskon-box">
                                <label class="form-label fw-bold"><i class="bi bi-tag me-1"></i> Diskon</label>
                                <div class="row g-2">
                                    <div class="col-md-6">
                                        <select id="tipe_diskon" class="form-select">
                                            <option value="nominal">Nominal (Rp)</option>
                                            <option value="persen">Persen (%)</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" id="nilai_diskon" class="form-control" placeholder="Masukkan diskon" min="0" value="<?= $sewa['diskon'] ?? 0 ?>">
                                    </div>
                                </div>
                                <div class="form-text text-muted mt-2"><i class="bi bi-info-circle me-1"></i> Diskon akan mengurangi total harga sewa</div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="total-setelah-diskon">
                                <label class="form-label fw-bold text-success"><i class="bi bi-calculator me-1"></i> Total Setelah Diskon</label>
                                <h4 class="text-success" id="totalSetelahDiskonDisplay">Rp <?= number_format($sewa['total_harga'] ?? 0, 0, ',', '.') ?></h4>
                                <input type="hidden" name="diskon" id="diskon_nominal" value="<?= $sewa['diskon'] ?? 0 ?>">
                                <input type="hidden" name="diskon_persen" id="diskon_persen_val" value="<?= $sewa['diskon_persen'] ?? 0 ?>">
                            </div>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Masukkan deskripsi keperluan sewa (opsional)"><?= old('deskripsi', $sewa['deskripsi']) ?></textarea>
                        <div class="form-text text-muted">Deskripsi tambahan untuk keperluan penyewaan</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label required">Check In</label>
                        <input type="date" name="checkin" id="checkin" class="form-control" value="<?= old('checkin', $sewa['checkin']) ?>" required>
                        <div class="form-text text-muted">Tanggal mulai penyewaan</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label required">Check Out</label>
                        <input type="date" name="checkout" id="checkout" class="form-control" value="<?= old('checkout', $sewa['checkout']) ?>" required>
                        <div class="form-text text-muted">Tanggal selesai penyewaan</div>
                    </div>

                    <div class="mb-4">
                        <label class="form-label">Lokasi / Venue</label>
                        <input type="text" name="lokasi" class="form-control" placeholder="Masukkan lokasi atau venue" value="<?= old('lokasi', $sewa['lokasi']) ?>">
                        <div class="form-text text-muted">Lokasi acara atau venue</div>
                    </div>

                    <hr class="my-4">
                    <div class="d-flex justify-content-end gap-2">
                        <a href="<?= base_url('sewa/success/'.$sewa['id']) ?>" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-2"></i>Batal
                        </a>
                        <button type="submit" class="btn btn-warning" id="btnSubmit"><i class="bi bi-save me-2"></i>Update Sewa</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <i class="bi bi-info-circle-fill text-primary fs-4 me-3"></i>
                    <div>
                        <h6 class="fw-bold mb-1">Informasi:</h6>
                        <p class="text-muted mb-0 small">
                            <i class="bi bi-check-circle me-1"></i> Pastikan stok barang mencukupi sebelum melakukan penyewaan.<br>
                            <i class="bi bi-calculator me-1"></i> Untuk kategori sewa HARIAN, total harga = (jumlah hari) x (harga x jumlah).<br>
                            <i class="bi bi-tag me-1"></i> Diskon dapat berupa nominal (Rp) atau persen (%).
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let detail = [];

document.addEventListener('DOMContentLoaded', function() {
    const checkin = document.getElementById('checkin');
    const checkout = document.getElementById('checkout');
    const kategoriSewa = document.getElementById('kategori');
    const filterKategori = document.getElementById('filterKategori');
    const barangSelect = document.getElementById('barang_id');
    const btnTambah = document.getElementById('btnTambah');
    const hargaItemInput = document.getElementById('harga_item');
    const tipeDiskon = document.getElementById('tipe_diskon');
    const nilaiDiskon = document.getElementById('nilai_diskon');
    const totalSetelahDiskonDisplay = document.getElementById('totalSetelahDiskonDisplay');
    const diskonNominalInput = document.getElementById('diskon_nominal');
    const diskonPersenInput = document.getElementById('diskon_persen_val');

    const existingItems = <?= json_encode($items ?? []) ?>;
    const currentRentalCategory = '<?= $sewa['kategori'] ?? 'harian' ?>';

    if (existingItems && existingItems.length > 0) {
        existingItems.forEach(item => {
            detail.push({
                barang_id: item.barang_id,
                nama: item.nama_barang,
                kategori: item.kategori || '-',
                kategori_sewa: item.kategori_sewa, 
                jumlah: item.qty,
                harga: parseFloat(item.harga),
                subtotal: parseFloat(item.subtotal)
            });
        });
        renderTable();
    }

    if (filterKategori && barangSelect) {
        filterKategori.addEventListener('change', function () {
            const selectedKategori = this.value;
            Array.from(barangSelect.options).forEach(option => {
                if (!option.value) return;
                const kategoriId = option.getAttribute('data-kategori-id');
                if (!selectedKategori || kategoriId === selectedKategori) {
                    option.style.display = 'block';
                } else {
                    option.style.display = 'none';
                }
            });
            barangSelect.value = '';
        });
    }

    if (barangSelect) {
        barangSelect.addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const harga = selectedOption.getAttribute('data-harga');
            if (harga && hargaItemInput) {
                hargaItemInput.value = harga;
            }
        });
    }

    if (btnTambah) {
        btnTambah.addEventListener('click', function () {
            const select = document.getElementById('barang_id');
            const barang_id = select.value;
            const nama = select.options[select.selectedIndex]?.getAttribute('data-nama');
            const kategori = select.options[select.selectedIndex]?.getAttribute('data-kategori');
            const harga = parseFloat(document.getElementById('harga_item').value);
            const jumlah = parseInt(document.getElementById('jumlah').value);
            const kategoriSewaValue = document.getElementById('kategori').value;

            if (!barang_id) { alert('Pilih barang terlebih dahulu!'); return; }
            if (!jumlah || jumlah < 1) { alert('Masukkan quantity yang valid!'); return; }
            if (!harga || harga < 1) { alert('Masukkan harga yang valid!'); return; }

            if (detail.find(item => item.barang_id === barang_id)) {
                alert('Barang sudah ditambahkan!');
                return;
            }

            detail.push({
                barang_id: barang_id,
                nama: nama,
                kategori: kategori,
                kategori_sewa: kategoriSewaValue,
                jumlah: jumlah,
                harga: harga,
                subtotal: jumlah * harga
            });

            renderTable();
            document.getElementById('jumlah').value = '';
            document.getElementById('harga_item').value = '';
            barangSelect.value = '';
            hitungGrandTotalDanTotalSewa();
        });
    }

    function renderTable() {
        let tbody = document.querySelector('#tableDetail tbody');
        if (!tbody) return;
        tbody.innerHTML = '';
        detail.forEach((item, index) => {
            tbody.innerHTML += `<tr>
                <td>${escapeHtml(item.nama)}</td>
                <td>${escapeHtml(item.kategori || '-')}</td>
                <td>${escapeHtml(item.kategori_sewa)}</td>
                <td>${item.jumlah}</td>
                <td>Rp ${item.harga.toLocaleString('id-ID')}</td>
                <td>Rp ${item.subtotal.toLocaleString('id-ID')}</td>
                <td><button class="btn btn-danger btn-sm" onclick="hapusItem(${index})"><i class="bi bi-trash"></i> Hapus</button></td>
            </tr>`;
        });
        document.getElementById('detail_json').value = JSON.stringify(detail);
    }

    function hitungGrandTotalDanTotalSewa() {
        let grandTotal = 0;
        if (!checkin.value || !checkout.value) {
            document.getElementById('grandTotalDisplay').innerHTML = 'Rp 0';
            hitungTotalSetelahDiskon(0);
            return;
        }

        let tgl1 = new Date(checkin.value);
        let tgl2 = new Date(checkout.value);
        let hari = Math.ceil((tgl2 - tgl1) / (1000 * 60 * 60 * 24));
        if (hari <= 0) hari = 1;

        detail.forEach(item => {
            let subtotalPerHari = item.jumlah * item.harga;
            if (item.kategori_sewa === 'harian') {
                item.subtotal = subtotalPerHari * hari;
            } else {
                item.subtotal = subtotalPerHari;
            }
            grandTotal += item.subtotal;
        });

        renderTable();
        document.getElementById('grandTotalDisplay').innerHTML = 'Rp ' + grandTotal.toLocaleString('id-ID');
        hitungTotalSetelahDiskon(grandTotal);
    }
    
    function hitungTotalSetelahDiskon(grandTotal) {
        let tipe = tipeDiskon.value;
        let nilai = parseFloat(nilaiDiskon.value) || 0;
        let totalSetelahDiskon = grandTotal;
        let diskonNominal = 0;
        let diskonPersen = 0;
        
        if (tipe === 'nominal') {
            diskonNominal = Math.min(nilai, grandTotal);
            diskonPersen = grandTotal > 0 ? (diskonNominal / grandTotal * 100) : 0;
            totalSetelahDiskon = grandTotal - diskonNominal;
        } else if (tipe === 'persen') {
            diskonPersen = Math.min(nilai, 100);
            diskonNominal = grandTotal * (diskonPersen / 100);
            totalSetelahDiskon = grandTotal - diskonNominal;
        }
        
        totalSetelahDiskonDisplay.innerHTML = 'Rp ' + totalSetelahDiskon.toLocaleString('id-ID');
        diskonNominalInput.value = diskonNominal;
        diskonPersenInput.value = diskonPersen;
    }

    window.hapusItem = function(index) {
        detail.splice(index, 1);
        renderTable();
        hitungGrandTotalDanTotalSewa();
    };

    if (checkin) checkin.addEventListener('change', hitungGrandTotalDanTotalSewa);
    if (checkout) checkout.addEventListener('change', hitungGrandTotalDanTotalSewa);
    if (kategoriSewa) kategoriSewa.addEventListener('change', hitungGrandTotalDanTotalSewa);
    if (tipeDiskon) tipeDiskon.addEventListener('change', () => hitungGrandTotalDanTotalSewa());
    if (nilaiDiskon) nilaiDiskon.addEventListener('input', () => hitungGrandTotalDanTotalSewa());
    
    function validateDates() {
        if (checkin && checkout && checkin.value && checkout.value) {
            if (checkout.value < checkin.value) {
                checkout.setCustomValidity('Tanggal check out tidak boleh kurang dari tanggal check in');
                checkout.reportValidity();
            } else {
                checkout.setCustomValidity('');
                hitungGrandTotalDanTotalSewa();
            }
        }
    }
    if (checkin) checkin.addEventListener('change', validateDates);
    if (checkout) checkout.addEventListener('change', validateDates);
    
    document.getElementById('formSewa')?.addEventListener('submit', function(e) {
        if (detail.length === 0) {
            e.preventDefault();
            alert('Minimal tambahkan 1 barang untuk melakukan penyewaan!');
            return false;
        }
        if (!checkin?.value || !checkout?.value) {
            e.preventDefault();
            alert('Tanggal check in dan check out harus diisi!');
            return false;
        }
        document.getElementById('detail_json').value = JSON.stringify(detail);
        return true;
    });

    function escapeHtml(str) {
        if (!str) return '';
        return str.replace(/[&<>]/g, function(m) {
            if (m === '&') return '&amp;';
            if (m === '<') return '&lt;';
            if (m === '>') return '&gt;';
            return m;
        });
    }
    
    // Initial calculation
    hitungGrandTotalDanTotalSewa();
});
</script>

<?= $this->endSection() ?>