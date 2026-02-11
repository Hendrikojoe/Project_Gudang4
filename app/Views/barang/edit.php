<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid col-lg-6">
  <div class="card shadow-sm">
    <div class="card-header bg-white text-warning fw-bold">
      <i class="fas fa-edit me-2"></i>Edit Barang
    </div>
    <div class="card-body">
      <form action="/barang/update/<?= $barang['id'] ?>" method="post">
        <div class="mb-3">
          <label class="form-label">Nama Barang</label>
          <input type="text" name="nama_barang" class="form-control" value="<?= $barang['nama_barang'] ?>" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Stok</label>
          <input type="number" name="stok" class="form-control" value="<?= $barang['stok'] ?>" required>
        </div>
        <button class="btn btn-warning"><i class="fas fa-sync me-2"></i>Update</button>
        <a href="/barang" class="btn btn-secondary ms-2">Batal</a>
      </form>
    </div>
  </div>
</div>

<?= $this->endSection() ?>
