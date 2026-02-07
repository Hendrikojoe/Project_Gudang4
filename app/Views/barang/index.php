<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Daftar Barang</h3>
<a href="/barang/create" class="btn btn-success mb-3">Tambah Barang</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($barang as $b): ?>
        <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['nama_barang'] ?></td>
            <td><?= $b['stok'] ?></td>
            <td>
                <a href="/barang/edit/<?= $b['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/barang/delete/<?= $b['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>