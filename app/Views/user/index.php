<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Daftar User</h3>
<a href="/user/create" class="btn btn-success mb-3">Tambah User</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Email</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($users as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>
            <td><?= $u['email'] ?></td>
            <td><?= $u['role'] ?></td>
            <td>
                <a href="/user/edit/<?= $u['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                <a href="/user/delete/<?= $u['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>