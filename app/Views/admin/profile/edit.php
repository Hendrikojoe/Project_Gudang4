<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0"><i class="fas fa-edit me-2"></i> Edit Profil</h5>
                </div>
                <div class="card-body">
                    <form action="<?= base_url('profile/update') ?>" method="post">
                        <?= csrf_field() ?>
                        
                        <div class="mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="<?= old('nama', $user['nama']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" value="<?= old('email', $user['email']) ?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label">No. Telepon</label>
                            <input type="text" name="no_telepon" class="form-control" value="<?= old('no_telepon', $user['no_telepon'] ?? '') ?>">
                        </div>
                        
                        <hr>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="<?= base_url('profile') ?>" class="btn btn-secondary">Batal</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>