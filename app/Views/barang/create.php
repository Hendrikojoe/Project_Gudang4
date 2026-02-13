<<<<<<< HEAD
<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid col-lg-6">
  <div class="card shadow-sm">
    <div class="card-header bg-white text-primary fw-bold">
      <i class="fas fa-plus-circle me-2"></i>Tambah Barang
    </div>
    <div class="card-body">
      <form action="/barang/store" method="post">
        <div class="mb-3">
          <label class="form-label">Nama Barang</label>
          <input type="text" name="nama_barang" class="form-control" placeholder="Masukkan nama barang" required>
        </div>
        <div class="mb-3">
          <label class="form-label">Stok Awal</label>
          <input type="number" name="stok" class="form-control" value="0" required>
        </div>
        <button class="btn btn-primary"><i class="fas fa-save me-2"></i>Simpan</button>
        <a href="/barang" class="btn btn-secondary ms-2">Kembali</a>
      </form>
    </div>
  </div>
=======
<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1>Tambah Barang</h1>

    <form action="<?= base_url('/barang/store') ?>" method="post">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
</div>

<?= $this->endSection() ?>
