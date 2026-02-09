<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h4>Daftar Transaksi</h4>

<a href="/transaksi/create" class="btn btn-primary mb-3">Tambah</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Barang</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transaksi as $t): ?>
        <tr>
            <td><?= $t['id'] ?></td>
            <td><?= $t['id_barang'] ?></td>
            <td><?= $t['jumlah'] ?></td>
            <td><?= $t['tanggal'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>