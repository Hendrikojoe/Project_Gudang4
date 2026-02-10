<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <h1>Data Barang</h1>

    <?php if(session()->getFlashdata('success')): ?>
        <p style="color: green"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <a href="/barang/create">Tambah Barang</a>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        <?php foreach($barangs as $b): ?>
        <tr>
            <td><?= $b['id'] ?></td>
            <td><?= $b['nama_barang'] ?></td>
            <td><?= $b['stok'] ?></td>
            <td>
                <a href="/barang/edit/<?= $b['id'] ?>">Edit</a> |
                <a href="/barang/delete/<?= $b['id'] ?>" onclick="return confirm('Hapus barang ini?')">Hapus</a>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
<?= $this->endSection() ?>