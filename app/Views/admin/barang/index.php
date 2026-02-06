<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Data Barang</h3>

<a href="/barang/create" class="btn btn-primary mb-3">Tambah Barang</a>

<table class="table table-bordered">
    <tr>
        <th>Nama</th>
        <th>Stok</th>
        <th>Aksi</th>
    </tr>

    <?php foreach ($barang as $b): ?>
    <tr>
        <td><?= $b['nama_barang'] ?></td>
        <td><?= $b['stok'] ?></td>
        <td>
            <a href="/barang/edit/<?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="/barang/delete/<?= $b['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<?= $this->endSection() ?>