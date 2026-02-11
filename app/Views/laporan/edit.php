<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <h1><?= $title ?></h1>

    <form action="/laporan/update/<?= $laporan['id'] ?>" method="post">
        <label>Nama Laporan:</label><br>
        <input type="text" name="nama_laporan" value="<?= $laporan['nama_laporan'] ?>" required><br><br>

        <label>Deskripsi:</label><br>
        <textarea name="deskripsi"><?= $laporan['deskripsi'] ?></textarea><br><br>

        <label>Tanggal:</label><br>
        <input type="date" name="tanggal" value="<?= $laporan['tanggal'] ?>" required><br><br>

        <button type="submit">Update</button>
    </form>
    <br>
    <a href="/laporan">Kembali</a>
<?= $this->endSection() ?>  