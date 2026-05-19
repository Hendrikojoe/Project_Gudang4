<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Tambah Supplier</h3>

<form action="/supplier/store" method="post">
    <div class="mb-3">
        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>