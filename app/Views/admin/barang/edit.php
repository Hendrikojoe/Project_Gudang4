<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<?php
// Status Options Array with Colors
$statusOptions = [
    'baik' => ['label' => 'Baik', 'icon' => 'check-circle', 'color' => '#28a745', 'bg' => '#d4edda', 'border' => '#28a745', 'desc' => 'Barang dalam kondisi baik, siap pakai'],
    'perbaikan' => ['label' => 'Perbaikan', 'icon' => 'tools', 'color' => '#fd7e14', 'bg' => '#fff3cd', 'border' => '#fd7e14', 'desc' => 'Barang sedang dalam perbaikan'],
    'perawatan' => ['label' => 'Perawatan', 'icon' => 'gear', 'color' => '#ffc107', 'bg' => '#fff3cd', 'border' => '#ffc107', 'desc' => 'Barang perlu perawatan rutin'],
    'standby' => ['label' => 'Standby', 'icon' => 'pause-circle', 'color' => '#17a2b8', 'bg' => '#d1ecf1', 'border' => '#17a2b8', 'desc' => 'Barang dalam kondisi siaga']
];
$currentStatus = $barang['kondisi'] ?? 'baik';
?>

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

/* Status Card Styles - With Colors */
.status-card {
    border-radius: 12px;
    padding: 15px;
    transition: all 0.3s ease;
    cursor: pointer;
    height: 100%;
    border: 2px solid transparent;
}
.status-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1);
}
.status-card.active {
    border: 2px solid #007bff;
    box-shadow: 0 5px 15px rgba(0,123,255,0.2);
}
.status-icon {
    font-size: 2rem;
    margin-bottom: 10px;
}
.status-label {
    font-weight: 800;
    font-size: 1rem;
    margin-bottom: 5px;
}
.status-desc {
    font-size: 0.7rem;
    line-height: 1.3;
    opacity: 0.8;
}
.status-card .form-check-input {
    margin-top: 0;
    margin-right: 8px;
}
.status-card .form-check-label {
    width: 100%;
    cursor: pointer;
}
</style>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                    <h4 class="fw-bold text-dark mb-0">
                        <i class="bi bi-pencil-square me-2 text-warning"></i> Edit Barang
                    </h4>
                    <p class="text-muted mt-2 mb-0">Ubah informasi dan data stok barang</p>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('barang') ?>" class="text-decoration-none">Data Barang</a></li>
                        <li class="breadcrumb-item active">Edit Barang</li>
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

            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Form Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white py-3 border-bottom-0">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                            <i class="bi bi-box-seam text-warning fs-4"></i>
                        </div>
                        <div>
                            <h5 class="fw-bold text-dark mb-0">Form Edit Barang</h5>
                            <p class="text-muted small mb-0">ID Barang: #<?= sprintf('%04d', $barang['id']) ?></p>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4">
                    <form action="<?= base_url('barang/update/' . $barang['id']) ?>" method="post" enctype="multipart/form-data">
                        <?= csrf_field() ?>
                        <input type="hidden" name="_method" value="PUT">

                        <div class="row g-4">
                            <!-- Nama Barang -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-tag me-2 text-warning"></i> Nama Barang <span class="text-danger">*</span>
                                </label>
                                <input type="text" name="nama_barang" id="namaBarang" class="form-control form-control-lg" placeholder="Masukkan nama barang" value="<?= old('nama_barang', $barang['nama_barang']) ?>" required>
                                <div class="form-text">Nama barang harus unik dan mudah dikenali</div>
                            </div>

                            <!-- Kategori Barang -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-tags me-2 text-warning"></i> Kategori Barang <span class="text-danger">*</span>
                                </label>
                                <select name="kategori_id" class="form-select form-control-lg" required>
                                    <option value="" disabled>-- Pilih Kategori --</option>
                                    <?php if (!empty($kategori)): ?>
                                        <?php foreach ($kategori as $k): ?>
                                            <option value="<?= $k['id'] ?>" <?= (old('kategori_id', $barang['kategori_id']) == $k['id']) ? 'selected' : '' ?>>
                                                <?= esc($k['nama']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="" disabled>Tidak ada kategori, silahkan tambah kategori terlebih dahulu</option>
                                    <?php endif; ?>
                                </select>
                                <div class="form-text">Kategori digunakan untuk mengelompokkan barang</div>
                            </div>

                            <!-- Status Kondisi Barang dengan Card Berwarna -->
                            <div class="col-md-12">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-info-circle me-2 text-warning"></i> Status Kondisi Barang
                                </label>
                                <div class="row g-3">
                                    <?php foreach ($statusOptions as $key => $status): ?>
                                        <div class="col-md-3">
                                            <div class="status-card <?= ($currentStatus == $key) ? 'active' : '' ?>" 
                                                 style="background: <?= $status['bg'] ?>; border-color: <?= ($currentStatus == $key) ? '#007bff' : 'transparent' ?>;"
                                                 onclick="selectStatus('<?= $key ?>', this)">
                                                <div class="form-check">
                                                    <input class="form-check-input" 
                                                           type="radio" 
                                                           name="kondisi" 
                                                           id="status_<?= $key ?>" 
                                                           value="<?= $key ?>"
                                                           <?= ($currentStatus == $key) ? 'checked' : '' ?>
                                                           onchange="updateStatusCard(this)">
                                                    <label class="form-check-label" for="status_<?= $key ?>" style="width: 100%; cursor: pointer;">
                                                        <div class="status-icon">
                                                            <i class="bi bi-<?= $status['icon'] ?>" style="color: <?= $status['color'] ?>"></i>
                                                        </div>
                                                        <div class="status-label" style="color: <?= $status['color'] ?>">
                                                            <?= $status['label'] ?>
                                                        </div>
                                                        <div class="status-desc">
                                                            <?= $status['desc'] ?>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                                <div class="form-text text-muted mt-2">
                                    <i class="bi bi-question-circle me-1"></i>
                                    Pilih status yang sesuai dengan kondisi barang saat ini.
                                </div>
                            </div>

                            <!-- Stok dan Satuan -->
                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-archive me-2 text-warning"></i> Stok Saat Ini <span class="text-danger">*</span>
                                </label>
                                <div class="input-group">
                                    <input type="number" name="stok" class="form-control form-control-lg" value="<?= old('stok', $barang['stok']) ?>" min="0" required>
                                    <span class="input-group-text bg-light fw-bold" id="satuan-preview"><?= old('satuan', $barang['satuan']) ?: 'pcs' ?></span>
                                </div>
                                <div class="form-text text-warning">
                                    <i class="bi bi-exclamation-triangle me-1"></i>
                                    Perhatian: Mengubah stok akan mempengaruhi laporan transaksi
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-tags me-2 text-warning"></i> Satuan Barang <span class="text-danger">*</span>
                                </label>
                                <select class="form-select form-control-lg" name="satuan" id="satuanSelect" required>
                                    <option value="" disabled>-- Pilih Satuan --</option>
                                    <?php 
                                    $satuanList = ['pcs','box','kotak','unit','buah','pack','dus','liter','kg','gram','meter','lembar','batang','botol','kantong'];
                                    foreach ($satuanList as $s): ?>
                                        <option value="<?= $s ?>" <?= (old('satuan', $barang['satuan']) == $s) ? 'selected' : '' ?>><?= ucfirst($s) ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <div class="form-text">Satuan yang digunakan untuk menghitung stok barang</div>
                            </div>

                            <!-- Gambar Barang -->
                            <div class="col-md-12">
                                <label class="form-label fw-bold">
                                    <i class="bi bi-image me-2 text-warning"></i> Gambar Barang
                                </label>
                                
                                <!-- Gambar Saat Ini -->
                                <?php if (!empty($barang['gambar'])): ?>
                                <div class="mb-3" id="existingImageContainer">
                                    <p class="mb-2 text-muted small">
                                        <i class="bi bi-image me-1"></i>Gambar saat ini:
                                    </p>
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <img src="<?= base_url('uploads/barang/' . $barang['gambar']) ?>" alt="Gambar Barang" class="preview-image mb-2" style="max-width: 200px; max-height: 200px; border-radius: 8px;">
                                            <div class="form-check mt-2">
                                                <input type="checkbox" name="hapus_gambar" id="hapus_gambar" value="1" class="form-check-input">
                                                <label for="hapus_gambar" class="form-check-label text-danger">Hapus gambar ini</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Upload Area -->
                                <div class="upload-container" id="uploadContainer">
                                    <input type="file" name="gambar" id="fileInput" accept="image/jpeg, image/png, image/jpg, image/gif" style="display:none;">
                                    
                                    <div class="upload-area" id="uploadArea">
                                        <i class="bi bi-cloud-upload upload-icon"></i>
                                        <p class="upload-text">Klik atau drag & drop gambar baru di sini</p>
                                        <p class="upload-hint">Format: JPG, JPEG, PNG, GIF (Maks. 2MB)</p>
                                        <button type="button" class="btn btn-outline-primary mt-3" id="cameraButton">
                                            <i class="bi bi-camera me-1"></i> Ambil dari Kamera
                                        </button>
                                    </div>
                                    
                                    <div class="preview-container" id="previewContainer" style="display:none;">
                                        <img id="imagePreview" class="preview-image" src="#" alt="Preview">
                                        <button type="button" class="btn btn-danger btn-sm mt-2" id="removeImage">
                                            <i class="bi bi-trash me-1"></i> Hapus Gambar
                                        </button>
                                    </div>
                                </div>
                                <div class="form-text text-muted">
                                    <i class="bi bi-info-circle me-1"></i>
                                    Upload gambar baru untuk mengganti gambar lama (opsional)
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-end gap-3">
                            <a href="<?= base_url('barang') ?>" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left me-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-warning px-5" id="submitBtn">
                                <i class="bi bi-save me-2"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Card -->
            <div class="card border-0 shadow-sm bg-light mt-4">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                            <i class="bi bi-info-circle-fill text-warning fs-5"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold mb-1">Informasi Penting:</h6>
                            <p class="text-muted small mb-0">
                                <i class="bi bi-check-circle me-1 text-success"></i> Pastikan data barang yang dimasukkan sudah benar.<br>
                                <i class="bi bi-exclamation-triangle me-1 text-warning"></i> Perubahan stok akan mempengaruhi data laporan transaksi.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Kamera -->
<div class="modal fade" id="cameraModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title"><i class="bi bi-camera-video me-2"></i> Ambil Gambar</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <video id="cameraPreview" autoplay playsinline style="width:100%;border-radius:10px;"></video>
                <canvas id="cameraCanvas" style="display:none;"></canvas>
                <button type="button" class="btn btn-success mt-3" id="takePhoto">
                    <i class="bi bi-camera-fill me-1"></i> Ambil Foto
                </button>
            </div>
            <div class="modal-footer bg-light">
                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
            </div>
        </div>
    </div>
</div>

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
    const hapusGambarCheckbox = document.getElementById('hapus_gambar');
    const existingImageContainer = document.getElementById('existingImageContainer');
    let cameraStream = null;

    // Status card active effect
    const statusCards = document.querySelectorAll('.status-card');
    statusCards.forEach(card => {
        card.addEventListener('click', function() {
            statusCards.forEach(c => c.classList.remove('active'));
            this.classList.add('active');
            // Reset border color
            statusCards.forEach(c => c.style.borderColor = 'transparent');
            this.style.borderColor = '#007bff';
        });
    });

    // Function to select status
    window.selectStatus = function(statusValue, element) {
        const radio = document.getElementById(`status_${statusValue}`);
        if (radio) radio.checked = true;
        
        statusCards.forEach(card => {
            card.classList.remove('active');
            card.style.borderColor = 'transparent';
        });
        element.classList.add('active');
        element.style.borderColor = '#007bff';
    }

    // Function untuk update status card saat radio dipilih
    window.updateStatusCard = function(radio) {
        const statusValue = radio.value;
        const cards = document.querySelectorAll('.status-card');
        
        cards.forEach(card => {
            card.classList.remove('active');
            card.style.borderColor = 'transparent';
            if (card.querySelector(`input[value="${statusValue}"]`)) {
                card.classList.add('active');
                card.style.borderColor = '#007bff';
            }
        });
    }

    if (namaBarangInput) namaBarangInput.focus();

    if (satuanSelect && satuanPreview) {
        satuanSelect.addEventListener('change', function() {
            satuanPreview.textContent = this.value || 'pcs';
        });
    }

    if (hapusGambarCheckbox) {
        hapusGambarCheckbox.addEventListener('change', function() {
            if (this.checked) {
                if (existingImageContainer) existingImageContainer.style.display = 'none';
            } else {
                if (existingImageContainer && !fileInput.files.length) {
                    existingImageContainer.style.display = 'block';
                }
            }
        });
    }

    if (uploadArea) uploadArea.addEventListener('click', () => fileInput.click());

    fileInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            previewImage(file);
            if (existingImageContainer) existingImageContainer.style.display = 'none';
            if (hapusGambarCheckbox) hapusGambarCheckbox.checked = false;
        }
    });

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

    if (removeImageBtn) {
        removeImageBtn.addEventListener('click', () => {
            fileInput.value = '';
            if (uploadArea) uploadArea.style.display = 'block';
            if (previewContainer) previewContainer.style.display = 'none';
            if (existingImageContainer && hapusGambarCheckbox && !hapusGambarCheckbox.checked) {
                existingImageContainer.style.display = 'block';
            }
        });
    }

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
                    if (existingImageContainer) existingImageContainer.style.display = 'none';
                    if (hapusGambarCheckbox) hapusGambarCheckbox.checked = false;
                    cameraModal.hide();
                }, 'image/jpeg');
                if (cameraStream) cameraStream.getTracks().forEach(track => track.stop());
            }
        });
    }

    const cameraModalElement = document.getElementById('cameraModal');
    if (cameraModalElement) {
        cameraModalElement.addEventListener('hidden.bs.modal', () => {
            if (cameraStream) cameraStream.getTracks().forEach(track => track.stop());
        });
    }

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
                if (existingImageContainer) existingImageContainer.style.display = 'none';
                if (hapusGambarCheckbox) hapusGambarCheckbox.checked = false;
            } else {
                alert('File harus berupa gambar!');
            }
        });
    }

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
            
            const satuanSelectElem = document.querySelector('select[name="satuan"]');
            if (satuanSelectElem && !satuanSelectElem.value) {
                e.preventDefault();
                alert('Silakan pilih satuan terlebih dahulu!');
                satuanSelectElem.focus();
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

<?= $this->endSection() ?>