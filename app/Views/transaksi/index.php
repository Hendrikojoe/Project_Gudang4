<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h4>Data Barang</h4>

<a href="/barang/create" class="btn btn-success mb-3">
    Tambah Barang
</a>

<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th width="150">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($barangs as $b): ?>
        <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['nama_barang'] ?></td>
            <td><?= $b['stok'] ?></td>
            <td>
                <a href="/barang/edit/<?= $b['id'] ?>" class="btn btn-warning btn-sm">
                    Edit
                </a>
                <a href="/barang/delete/<?= $b['id'] ?>"
                   onclick="return confirm('Hapus barang ini?')"
                   class="btn btn-danger btn-sm">
                    Hapus
                </a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>
