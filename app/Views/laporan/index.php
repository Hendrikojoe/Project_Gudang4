<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <h1><?= $title ?></h1>

    <a href="/laporan/create">Tambah Laporan</a>

    <?php if(session()->getFlashdata('success')): ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <table border="1" cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Laporan</th>
                <th>Deskripsi</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($laporans as $laporan): ?>
            <tr>
                <td><?= $laporan['id'] ?></td>
                <td><?= $laporan['nama_laporan'] ?></td>
                <td><?= $laporan['deskripsi'] ?></td>
                <td><?= $laporan['tanggal'] ?></td>
                <td>
                    <a href="/laporan/edit/<?= $laporan['id'] ?>">Edit</a> |
                    <a href="/laporan/delete/<?= $laporan['id'] ?>" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?= $this->endSection() ?>