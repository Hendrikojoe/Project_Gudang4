<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Tambah Barang</h3>

<form action="/barang/store" method="post">
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>