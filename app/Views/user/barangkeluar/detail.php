<?= $this->extend('user/layout') ?>
<?= $this->section('content') ?>

<style>
    .detail-card {
        border: none;
        border-radius: 12px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    }
    .detail-header {
        background: linear-gradient(90deg, #e74a3b, #c0392b);
        color: white;
        border-radius: 12px 12px 0 0;
        padding: 15px 20px;
    }
    .detail-table td, .detail-table th {
        padding: 12px 15px;
        vertical-align: middle;
    }
    .detail-table th {
        width: 35%;
        background-color: #fff5f5;
        font-weight: 600;
        color: #c0392b;
    }
    .badge-status {
        background-color: #e74a3b;
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        color: white;
    }
</style>

<div class="container-fluid mt-4">
    <div class="detail-card">
        <div class="detail-header">
            <h5 class="mb-0">
                <i class="fas fa-info-circle me-2"></i> Detail Transaksi Barang Keluar
            </h5>
        </div>
        <div class="card-body p-4">
            <div class="row">
                <div class="col-md-12">
                    <table class="table detail-table table-bordered">
                        <tr>
                            <th><i class="fas fa-hashtag me-2"></i> ID Transaksi</th>
                            <td><strong>#<?= $transaksi['id'] ?></strong></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-box me-2"></i> Nama Barang</th>
                            <td><strong><?= $transaksi['nama_barang'] ?></strong></td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-sort-amount-down me-2"></i> Jumlah</th>
                            <td>
                                <span class="badge-status">
                                    <i class="fas fa-minus-circle me-1"></i>
                                    <?= $transaksi['jumlah'] ?> <?= $transaksi['satuan'] ?? 'pcs' ?>
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-user me-2"></i> Operator</th>
                            <td>
                                <?php if (!empty($transaksi['operator'])): ?>
                                    <span class="badge bg-danger">
                                        <i class="fas fa-user-check me-1"></i>
                                        <?= $transaksi['operator'] ?>
                                    </span>
                                <?php else: ?>
                                    <span class="text-muted">-</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th><i class="fas fa-calendar-alt me-2"></i> Tanggal</th>
                            <td><?= date('d F Y', strtotime($transaksi['tanggal'])) ?> (<?= date('d/m/Y', strtotime($transaksi['tanggal'])) ?>)</td>
                        </tr>
                        <?php if (!empty($transaksi['keterangan'])): ?>
                        <tr>
                            <th><i class="fas fa-file-alt me-2"></i> Keterangan</th>
                            <td><?= $transaksi['keterangan'] ?></td>
                        </tr>
                        <?php endif; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function printDetail() {
    window.print();
}
</script>

<style media="print">
    .btn, .navbar-modern, .fab, .sidebar {
        display: none !important;
    }
    .detail-card {
        box-shadow: none !important;
        margin: 0 !important;
        padding: 0 !important;
    }
    body {
        padding: 20px !important;
    }
    .detail-table th {
        background-color: #f0f0f0 !important;
    }
</style>

<?= $this->endSection() ?>