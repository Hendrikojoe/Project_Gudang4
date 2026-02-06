<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Tambah Barang</h3>

<form action="/barang/store" method="post">
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="nama_barang" class="form-control">
    </div>

    <div class="mb-3">
        <label>Stok</label>
        <input type="number" name="stok" class="form-control">
    </div>

    <button class="btn btn-success">Simpan</button>
</form>

<?= $this->endSection() ?>