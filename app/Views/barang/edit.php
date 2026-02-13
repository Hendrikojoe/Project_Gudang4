<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<<<<<<< HEAD
=======
<<<<<<< HEAD
<div class="container-fluid col-lg-6">
  <div class="card shadow-sm">
    <div class="card-header bg-white text-warning fw-bold">
      <i class="fas fa-edit me-2"></i>Edit Barang
=======
<<<<<<< HEAD
<h3>Edit Barang</h3>

<form action="/barang/update/<?= $barang['id'] ?>" method="post">

    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang"
               value="<?= $barang['nama_barang'] ?>"
               class="form-control" required>
>>>>>>> 8522223 (perubahan style dashboard admin)
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

<<<<<<< HEAD
<?= $this->endSection() ?>
=======
    <button class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>
=======
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
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
<<<<<<< HEAD
=======
>>>>>>> e41341e (perubahan style dashboard admin)
>>>>>>> 8522223 (perubahan style dashboard admin)
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
