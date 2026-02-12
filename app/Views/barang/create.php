<?= $this->extend('layout') ?>

<?= $this->section('content') ?>

<div class="container">
    <h1>Tambah Barang</h1>

    <form action="<?= base_url('/barang/store') ?>" method="post">
        <div class="mb-3">
            <label>Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control">
        </div>

        <div class="mb-3">
            <label>Stok</label>
            <input type="number" name="stok" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<?= $this->endSection() ?>
