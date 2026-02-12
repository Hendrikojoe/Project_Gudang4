<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>

<h3>Barang Keluar</h3>

<a href="/transaksi/keluar/create" class="btn btn-primary mb-3">
    Tambah Barang Keluar
</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Admin</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($transaksi as $t): ?>
        <tr>
            <td><?= $t['id'] ?></td>
            <td><?= $t['nama_barang'] ?></td>
            <td><?= $t['jumlah'] ?></td>
            <td><?= $t['admin'] ?></td>
            <td><?= $t['tanggal'] ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>