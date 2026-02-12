<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0"><i class="fas fa-box-arrow-in-down"></i> Tambah Barang Masuk</h5>
        </div>
        <div class="card-body">
            <form action="/barangmasuk/store" method="post">
                <?= csrf_field() ?>

                <div class="mb-3">
                    <label for="barang_id" class="form-label">Pilih Barang</label>
                    <select name="barang_id" id="barang_id" class="form-select" required>
                        <option value="">-- Pilih Barang --</option>
                        <?php foreach ($barang as $b): ?>
                            <option value="<?= esc($b['id']) ?>"><?= esc($b['nama_barang']) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Masuk</label>
                    <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan jumlah" min="1" required>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="/barangmasuk" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection() ?>
<h3>Tambah Barang Masuk</h3>

<form action="/transaksi/masuk/store" method="post">

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

    <button type="submit" class="btn btn-success">Simpan</button>

</form>

<?= $this->endSection() ?>
>>>>>>> 8bbb908 (perbaiki error dan penambahan sistem pada barang masuk dan keluar)
