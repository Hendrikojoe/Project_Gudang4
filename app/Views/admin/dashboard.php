<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Dashboard Gudang</h3>
<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary text-white mb-3">
            <div class="card-body">
                Total Barang
                <h2><?= $totalBarang ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-success text-white mb-3">
            <div class="card-body">
                Total Stok
                <h2><?= $stokTotal ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-warning text-dark mb-3">
            <div class="card-body">
                Total User
                <h2><?= $totalUser ?></h2>
            </div>
        </div>
    </div>

    <!-- Contoh tambahan: placeholder Transaksi -->
    <div class="col-md-3">
        <div class="card bg-danger text-white mb-3">
            <div class="card-body">
                Total Transaksi
                <h2><?= isset($totalTransaksi) ? $totalTransaksi : 0 ?></h2>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>