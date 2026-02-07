<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Edit Transaksi</h3>

<form action="/transaksi/update/<?= $transaksi['id'] ?>" method="post">
    <div class="mb-3">
        <label>ID Barang</label>
        <input type="number" name="id_barang" class="form-control" value="<?= $transaksi['id_barang'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" value="<?= $transaksi['jumlah'] ?>" required>
    </div>
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= $transaksi['tanggal'] ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
</form>

<?= $this->endSection() ?>