<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <div class="avatar mb-3">
                        <div class="rounded-circle bg-primary d-flex align-items-center justify-content-center mx-auto" style="width: 100px; height: 100px;">
                            <i class="fas fa-user fa-3x text-white"></i>
                        </div>
                    </div>
                    <h5 class="fw-bold"><?= esc($user['nama']) ?></h5>
                    <p class="text-muted small"><?= esc($user['role']) ?></p>
                    <a href="<?= base_url('profile/edit') ?>" class="btn btn-primary btn-sm">
                        <i class="fas fa-edit me-1"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>
        
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-white">
                    <h5 class="mb-0">Informasi Profil</h5>
                </div>
                <div class="card-body">
                    <table class="table table-borderless">
                        <tr><th style="width:30%">Nama Lengkap</th><td>: <?= esc($user['nama']) ?></td></tr>
                        <tr><th>Email</th><td>: <?= esc($user['email']) ?></td></tr>
                        <tr><th>Role</th><td>: <?= esc($user['role']) ?></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>