<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Edit Barang</h3>

<form action="/barang/update/<?= $barang['id'] ?>" method="post">
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control" value="<?= $barang['nama_barang'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control" value="<?= $barang['stok'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>