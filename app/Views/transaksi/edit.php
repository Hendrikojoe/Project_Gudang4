<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h4>Edit Transaksi</h4>

<form method="post">
    <input type="number" name="jumlah" value="<?= $transaksi['jumlah'] ?>" class="form-control">
</form>

<?= $this->endSection() ?>