<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Edit Barang</h3>

<form action="/barang/update/<?= $barang['id'] ?>" method="post">
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" value="<?= $barang['nama_barang'] ?>" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" value="<?= $barang['stok'] ?>" class="form-control">
    </div>

    <button class="btn btn-success">Update</button>
</form>

<?= $this->endSection() ?>