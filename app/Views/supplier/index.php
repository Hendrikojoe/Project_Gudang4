<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Daftar Supplier</h3>
<a href="/supplier/create" class="btn btn-success mb-3">Tambah Supplier</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nama Supplier</th>
            <th>Kontak</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($supplier as $s): ?>
        <tr>
            <td><?= $s['id'] ?></td>
            <td><?= $s['nama_supplier'] ?></td>
            <td><?= $s['kontak'] ?></td>
            <td>
                <a href="/supplier/edit/<?= $s['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/supplier/delete/<?= $s['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>