<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="card p-4">
    <h4>Tambah Transaksi</h4>

    <form action="/transaksi/store" method="post">
        <div class="mb-3">
            <label>Barang</label>
            <select name="id_barang" class="form-control" required>
                <option value="">-- Pilih Barang --</option>
                <?php foreach ($barang as $b): ?>
                    <option value="<?= $b['id'] ?>">
                        <?= $b['nama_barang'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="mb-3">
            <label>Jumlah</label>
            <input type="number" name="jumlah" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Tanggal</label>
            <input type="date" name="tanggal" class="form-control" required>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection() ?>
