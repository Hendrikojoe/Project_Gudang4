<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid px-4">
    <div class="row justify-content-center">
        <div class="col-lg-8">

            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="fw-bold text-dark mb-0">
                    <i class="bi bi-tag me-2 text-success"></i> Tambah Kategori
                </h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url('admin/dashboard') ?>" class="text-decoration-none">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active">Tambah Kategori</li>
                    </ol>
                </nav>
            </div>

            <!-- Alert Success -->
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?= session()->getFlashdata('success') ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            <?php endif; ?>

            <!-- Alert Errors -->
            <?php if (session()->getFlashdata('errors')): ?>
                <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i>
                    <strong>Terjadi kesalahan:</strong>
                    <ul class="mb-0 mt-2">
                        <?php foreach (session()->getFlashdata('errors') as $e): ?>
                            <li><?= esc($e) ?></li>
                        <?php endforeach ?>
                    </ul>
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

            <!-- Form Card -->
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-white py-3">
                    <h5 class="mb-0 fw-bold text-primary">
                        <i class="bi bi-plus-circle me-2"></i> Form Tambah Kategori
                    </h5>
                </div>
                <div class="card-body p-4">
                    <form action="<?= base_url('kategori/store') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-4">
                            <label for="nama" class="form-label fw-bold text-dark">
                                <i class="bi bi-tag me-1"></i> Nama Kategori <span class="text-danger">*</span>
                            </label>
                            <input type="text" 
                                   name="nama" 
                                   id="nama" 
                                   class="form-control form-control-lg" 
                                   placeholder="Contoh: Elektronik, Furniture, Alat Tulis"
                                   value="<?= old('nama') ?>" 
                                   required>
                            <div class="form-text text-muted">
                                <i class="bi bi-info-circle me-1"></i> Nama kategori harus unik dan tidak boleh sama dengan kategori lain.
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?= base_url('barang') ?>" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left me-2"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-success px-4">
                                <i class="bi bi-save me-2"></i> Simpan Kategori
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<?= $this->endSection() ?>