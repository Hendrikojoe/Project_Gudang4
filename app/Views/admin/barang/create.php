<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark mb-0">
                    <i class="bi bi-plus-circle me-2 text-primary"></i> Tambah Barang
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>" class="text-decoration-none">Data Barang</a></li>
                        <li class="breadcrumb-item active">Tambah Barang</li>
                    </ol>
                </nav>
            </div>

            <!-- Alert Messages -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <ul class="mb-0">
                        <?php foreach (session()->getFlashdata('errors') as $error): ?>
                            <li><?= $error ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Form Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title fw-bold text-primary mb-0">
                        <i class="bi bi-box-seam me-2"></i>Form Tambah Barang
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="/barang/store" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>

                        <!-- Nama Barang -->
                        <div class="mb-4">
                            <label class="form-label fw-bold"><i class="bi bi-tag me-2 text-primary"></i>Nama Barang</label>
                            <input type="text" name="nama_barang" id="namaBarang" class="form-control form-control-lg" placeholder="Masukkan nama barang" value="<?= old('nama_barang') ?>" required>
                            <div class="form-text">Contoh: Tv, Laptop, dll.</div>
                        </div>

                        <!-- Kategori Barang -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">
                                <i class="bi bi-tags me-2 text-primary"></i>Kategori Barang
                            </label>
                            <select name="kategori_id" class="form-select form-select-lg" required>
                                <option value="" disabled <?= old('kategori_id') ? '' : 'selected' ?>>-- Pilih Kategori --</option>
                                <?php if (!empty($kategori)): ?>
                                    <?php foreach ($kategori as $k): ?>
                                        <option value="<?= $k['id'] ?>" <?= old('kategori_id') == $k['id'] ? 'selected' : '' ?>>
                                            <?= esc($k['nama']) ?>
                                        </option>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <option value="" disabled>Tidak ada kategori, silahkan tambah kategori terlebih dahulu</option>
                                <?php endif; ?>
                            </select>
                            <div class="form-text">
                                <i class="bi bi-info-circle me-1"></i>
                                Pilih kategori untuk barang ini. 
                                <?php if (empty($kategori)): ?>
                                    <a href="<?= base_url('kategori/create') ?>" class="text-danger">Tambah kategori sekarang</a>
                                <?php endif; ?>
                            </div>
                        </div>

                        <!-- Upload + Kamera -->
                        <div class="mb-4">
                            <label class="form-label fw-bold"><i class="bi bi-image me-2 text-primary"></i>Gambar Barang</label>
                            <div class="upload-container" id="uploadContainer">
                                <input type="file" name="gambar" id="fileInput" accept="image/jpeg, image/png, image/jpg, image/gif" style="display:none;">
                                <div class="upload-area" id="uploadArea">
                                    <i class="bi bi-cloud-upload upload-icon"></i>
                                    <p class="upload-text">Klik atau drag & drop gambar di sini</p>
                                    <p class="upload-hint">Format: JPG, JPEG, PNG, GIF (Maks. 2MB)</p>
                                    <button type="button" class="btn btn-outline-primary mt-3" id="cameraButton">
                                        <i class="bi bi-camera me-1"></i> Ambil dari Kamera
                                    </button>
                                </div>
                                <div class="preview-container" id="previewContainer" style="display:none;">
                                    <img id="imagePreview" class="preview-image" src="#" alt="Preview">
                                    <button type="button" class="btn btn-danger btn-sm mt-2" id="removeImage">
                                        <i class="bi bi-trash me-1"></i>Hapus Gambar
                                    </button>
                                </div>
                            </div>
                            <div class="form-text text-muted"><i class="bi bi-info-circle me-1"></i>Upload atau ambil gambar untuk memudahkan identifikasi barang</div>

                            <!-- Modal Kamera -->
                            <div class="modal fade" id="cameraModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content border-0 shadow-lg">
                                        <div class="modal-header bg-primary text-white">
                                            <h5 class="modal-title"><i class="bi bi-camera-video me-2"></i>Ambil Gambar</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body text-center">
                                            <video id="cameraPreview" autoplay playsinline style="width:100%;border-radius:10px;"></video>
                                            <canvas id="cameraCanvas" style="display:none;"></canvas>
                                            <button type="button" class="btn btn-success mt-3" id="takePhoto">
                                                <i class="bi bi-camera-fill me-1"></i>Ambil Foto
                                            </button>
                                        </div>
                                        <div class="modal-footer bg-light">
                                            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Satuan -->
                        <div class="mb-4">
                            <label class="form-label fw-bold"><i class="bi bi-box me-2 text-primary"></i>Satuan Barang</label>
                            <select class="form-select form-select-lg" name="satuan" id="satuanSelect" required>
                                <option value="" selected disabled>-- Pilih Satuan --</option>
                                <?php 
                                $satuanList = ['pcs','box','kotak','unit','buah','pack','dus','liter','kg','gram','meter','lembar','batang','botol','kantong'];
                                foreach ($satuanList as $s): ?>
                                    <option value="<?= $s ?>" <?= old('satuan') == $s ? 'selected' : '' ?>><?= ucfirst($s) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="form-text">Pilih satuan yang sesuai untuk barang ini</div>
                        </div>

                        <!-- Stok Awal (Langusng Stok Baik) -->
                        <div class="mb-4">
                            <label class="form-label fw-bold"><i class="bi bi-archive me-2 text-primary"></i>Stok Awal</label>
                            <div class="input-group">
                                <input type="number" name="stok" class="form-control form-control-lg" value="<?= old('stok', 0) ?>" min="0" required>
                                <span class="input-group-text bg-light fw-bold" id="satuan-preview"><?= old('satuan') ? old('satuan') : 'pcs' ?></span>
                            </div>
                            <div class="form-text">Jumlah stok awal barang (langsung menjadi stok baik/siap pakai)</div>
                        </div>

                        <!-- Hidden input untuk maintenance dan rusak (default 0) -->
                        <input type="hidden" name="jumlah_dalam_maintenance" value="0">
                        <input type="hidden" name="jumlah_rusak" value="0">
                        
                        <!-- Hidden input untuk tipe barang (default baru) -->
                        <input type="hidden" name="tipe_barang" value="baru">

                        <!-- Hidden input untuk status maintenance (default baik) -->
                        <input type="hidden" name="status_maintenance" value="baik">

                        <!-- Hidden input untuk kondisi (default baik) -->
                        <input type="hidden" name="kondisi" value="baik">

                        <hr class="my-4">
                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?= base_url('barang') ?>" class="btn btn-lg btn-outline-secondary"><i class="bi bi-arrow-left me-2"></i>Batal</a>
                            <button type="submit" class="btn btn-lg btn-primary px-5" id="submitBtn"><i class="bi bi-save me-2"></i>Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info -->
            <div class="card border-0 shadow-sm bg-light mt-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-info-circle-fill text-primary fs-3 me-3"></i>
                        <div>
                            <h6 class="fw-bold mb-1">Informasi:</h6>
                            <p class="text-muted mb-0 small">
                                Setelah menambahkan barang, Anda dapat melakukan transaksi barang masuk/keluar melalui halaman daftar barang.<br>
                                <strong>Note:</strong> Stok awal akan langsung menjadi <span class="text-success">🟢 Stok Baik (Siap Pakai)</span>. 
                                Untuk mengatur barang ke maintenance atau rusak, silakan gunakan menu <strong>Maintenance</strong> di halaman daftar barang.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- === SCRIPT === -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileInput = document.getElementById('fileInput');
    const uploadArea = document.getElementById('uploadArea');
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const removeImageBtn = document.getElementById('removeImage');
    const cameraButton = document.getElementById('cameraButton');
    const cameraModal = new bootstrap.Modal(document.getElementById('cameraModal'));
    const cameraPreview = document.getElementById('cameraPreview');
    const cameraCanvas = document.getElementById('cameraCanvas');
    const takePhotoBtn = document.getElementById('takePhoto');
    const satuanSelect = document.getElementById('satuanSelect');
    const satuanPreview = document.getElementById('satuan-preview');
    const namaBarangInput = document.getElementById('namaBarang');
    let cameraStream = null;

    // Auto focus ke field nama barang
    if (namaBarangInput) {
        namaBarangInput.focus();
    }

    // Update satuan preview saat satuan berubah
    if (satuanSelect && satuanPreview) {
        satuanSelect.addEventListener('change', function() {
            if (this.value) {
                satuanPreview.textContent = this.value;
            } else {
                satuanPreview.textContent = 'pcs';
            }
        });
    }

    // Upload click
    if (uploadArea) {
        uploadArea.addEventListener('click', () => fileInput.click());
    }

    // Upload file
    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) previewImage(file);
    });

    // Preview image
    function previewImage(file) {
        if (file.size > 2 * 1024 * 1024) {
            alert('Ukuran maksimal 2MB!');
            fileInput.value = '';
            return;
        }
        const reader = new FileReader();
        reader.onload = e => {
            imagePreview.src = e.target.result;
            if (uploadArea) uploadArea.style.display = 'none';
            if (previewContainer) previewContainer.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }

    // Remove image
    if (removeImageBtn) {
        removeImageBtn.addEventListener('click', () => {
            fileInput.value = '';
            if (uploadArea) uploadArea.style.display = 'block';
            if (previewContainer) previewContainer.style.display = 'none';
        });
    }

    // Camera functionality with fallback
    if (cameraButton) {
        cameraButton.addEventListener('click', async () => {
            try {
                cameraStream = await navigator.mediaDevices.getUserMedia({ video: true });
                if (cameraPreview) cameraPreview.srcObject = cameraStream;
                cameraModal.show();
            } catch (err) {
                alert('Kamera tidak dapat diakses. Silakan gunakan upload file.');
                if (fileInput) fileInput.click();
            }
        });
    }

    if (takePhotoBtn) {
        takePhotoBtn.addEventListener('click', () => {
            if (cameraPreview && cameraCanvas) {
                const ctx = cameraCanvas.getContext('2d');
                cameraCanvas.width = cameraPreview.videoWidth;
                cameraCanvas.height = cameraPreview.videoHeight;
                ctx.drawImage(cameraPreview, 0, 0);
                cameraCanvas.toBlob(blob => {
                    const file = new File([blob], 'kamera_capture.jpg', { type: 'image/jpeg' });
                    const dataTransfer = new DataTransfer();
                    dataTransfer.items.add(file);
                    fileInput.files = dataTransfer.files;
                    previewImage(file);
                    cameraModal.hide();
                }, 'image/jpeg');
                if (cameraStream) cameraStream.getTracks().forEach(track => track.stop());
            }
        });
    }

    // Stop camera when modal closes
    const cameraModalElement = document.getElementById('cameraModal');
    if (cameraModalElement) {
        cameraModalElement.addEventListener('hidden.bs.modal', () => {
            if (cameraStream) cameraStream.getTracks().forEach(track => track.stop());
        });
    }

    // DRAG & DROP functionality
    if (uploadArea) {
        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('border-primary');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('border-primary');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('border-primary');
            const file = e.dataTransfer.files[0];
            if (file && file.type.match('image.*')) {
                fileInput.files = e.dataTransfer.files;
                previewImage(file);
            } else {
                alert('File harus berupa gambar!');
            }
        });
    }

    // Form validation before submit
    const submitBtn = document.getElementById('submitBtn');
    if (submitBtn) {
        submitBtn.addEventListener('click', function(e) {
            const kategoriSelect = document.querySelector('select[name="kategori_id"]');
            if (kategoriSelect && !kategoriSelect.value) {
                e.preventDefault();
                alert('Silakan pilih kategori terlebih dahulu!');
                kategoriSelect.focus();
                return false;
            }
            
            const satuanSelect = document.querySelector('select[name="satuan"]');
            if (satuanSelect && !satuanSelect.value) {
                e.preventDefault();
                alert('Silakan pilih satuan terlebih dahulu!');
                satuanSelect.focus();
                return false;
            }
            
            const stokInput = document.querySelector('input[name="stok"]');
            if (stokInput && parseInt(stokInput.value) < 0) {
                e.preventDefault();
                alert('Stok tidak boleh negatif!');
                stokInput.focus();
                return false;
            }
        });
    }
});
</script>

<!-- === STYLE === -->
<style>
.card { border-radius: 15px; }
.form-control, .form-select { border-radius: 10px; }
.btn { border-radius: 10px; }
.upload-area {
    border: 2px dashed #dee2e6;
    border-radius: 10px;
    padding: 30px;
    text-align: center;
    background: #f8f9fa;
    cursor: pointer;
    transition: 0.3s;
}
.upload-area:hover { border-color: #007bff; background: #eef6ff; }
.upload-area.border-primary { border-color: #007bff; background: #eef6ff; }
.upload-icon { font-size: 48px; color: #007bff; }
.preview-container {
    text-align: center;
    padding: 15px;
    border: 1px solid #dee2e6;
    border-radius: 10px;
    background: #f8f9fa;
}
.preview-image {
    max-width: 200px;
    max-height: 200px;
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
#cameraPreview { max-height: 300px; object-fit: cover; border-radius: 10px; }
</style>

<?= $this->endSection() ?>