<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Tambah Transaksi</h3>

<form action="/transaksi/store" method="post">
    <div class="mb-3">
        <label>ID Barang</label>
        <input type="number" name="id_barang" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>

<?= $this->endSection() ?>