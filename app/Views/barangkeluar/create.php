<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Tambah Barang Keluar</h3>

<form action="/transaksi/keluar/store" method="post">

    <div class="mb-3">
        <label>Barang</label>
        <select name="barang_id" class="form-control" required>
            <?php foreach($barang as $b): ?>
                <option value="<?= $b['id'] ?>">
                    <?= $b['nama_barang'] ?> (stok: <?= $b['stok'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Jumlah</label>
        <input type="number" name="jumlah" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>

</form>

<?= $this->endSection() ?>