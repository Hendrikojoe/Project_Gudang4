<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
    <h1>Edit Barang</h1>

    <?php if(session()->getFlashdata('errors')): ?>
        <ul style="color:red">
        <?php foreach(session()->getFlashdata('errors') as $error): ?>
            <li><?= $error ?></li>
        <?php endforeach ?>
        </ul>
    <?php endif ?>

    <form action="/barang/update/<?= $barang['id'] ?>" method="post">
        <label>Nama Barang:</label><br>
        <input type="text" name="nama_barang" value="<?= old('nama_barang', $barang['nama_barang']) ?>"><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?= old('stok', $barang['stok']) ?>"><br><br>

        <button type="submit">Update</button>
    </form>

    <br>
    <a href="/barang">Kembali</a>
<?= $this->endSection() ?>