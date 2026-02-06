<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<h3>Dashboard Gudang</h3>

<div class="row">
    <div class="col-md-6">
        <div class="card bg-primary text-white">
            <div class="card-body">
                Total Barang
                <h2><?= $totalBarang ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card bg-success text-white">
            <div class="card-body">
                Total Stok
                <h2><?= $stokTotal ?></h2>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>