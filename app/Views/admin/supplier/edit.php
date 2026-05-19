<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Edit Supplier</h3>

<form action="/supplier/update/<?= $supplier['id'] ?>" method="post">
    <div class="mb-3">
        <label>Nama Supplier</label>
        <input type="text" name="nama_supplier" class="form-control" value="<?= $supplier['nama_supplier'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Kontak</label>
        <input type="text" name="kontak" class="form-control" value="<?= $supplier['kontak'] ?>">
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>