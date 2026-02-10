<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h3>Laporan Stok Gudang</h3>
    <hr>

    <div class="card">
        <div class="card-body">
            <p>Halaman laporan berhasil dimuat.</p>
            <p>Di sini nanti bisa ditampilkan:</p>

            <ul>
                <li>Laporan barang masuk</li>
                <li>Laporan barang keluar</li>
                <li>Laporan stok barang</li>
                <li>Filter berdasarkan tanggal</li>
            </ul>
        </div>
    </div>
</div>

<?= $this->endSection() ?>