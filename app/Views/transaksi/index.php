<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Daftar Transaksi</h3>
<a href="/transaksi/create" class="btn btn-success mb-3">Tambah Transaksi</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>ID Barang</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($transaksi as $t): ?>
        <tr>
            <td><?= $t['id'] ?></td>
            <td><?= $t['id_barang'] ?></td>
            <td><?= $t['jumlah'] ?></td>
            <td><?= $t['tanggal'] ?></td>
            <td>
                <a href="/transaksi/edit/<?= $t['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/transaksi/delete/<?= $t['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>