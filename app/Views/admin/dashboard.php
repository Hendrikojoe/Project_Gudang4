<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <div class="d-none d-sm-inline-block">
            <span class="mr-2"><?= date('l, d F Y') ?></span>
            <span class="text-primary" id="liveClock"><?= date('H:i:s') ?></span>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Barang Masuk Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Barang Masuk (Hari Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $todayMasuk ?></div>
                            <div class="mt-2">
                                <span class="text-success">+<?= $todayMasuk * 10 ?> item</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-arrow-in-down fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Barang Keluar Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                Barang Keluar (Hari Ini)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $todayKeluar ?></div>
                            <div class="mt-2">
                                <span class="text-danger">-<?= $todayKeluar * 5 ?> item</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-box-arrow-up fa-2x text-danger"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Stok Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Stok</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= number_format($totalStok) ?></div>
                            <div class="mt-2">
                                <span class="text-primary"><?= $jumlahBarang ?> jenis barang</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-archive fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Transaksi Card -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Total Transaksi</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $totalTransaksi ?></div>
                            <div class="mt-2">
                                <span class="text-warning">Hari ini</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exchange-alt fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Transaksi Hari Ini</h6>
                    <div class="dropdown no-arrow">
                        <a class="btn btn-sm btn-outline-primary" href="/transaksi">
                            Lihat Semua
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Waktu</th>
                                    <th>Jenis</th>
                                    <th>Barang</th>
                                    <th>Jumlah</th>
                                    <th>Operator</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($transaksiHariIni as $transaksi): 
                                    $jenisClass = $transaksi['jenis_transaksi'] == 'masuk' ? 'success' : 'danger';
                                ?>
                                <tr>
                                    <td><strong><?= $transaksi['id'] ?></strong></td>
                                    <td>
                                        <div><?= $transaksi['jam'] ?></div>
                                        <small class="text-muted"><?= date('d/m/Y', strtotime($transaksi['tanggal'])) ?></small>
                                    </td>
                                    <td>
                                        <span class="badge badge-<?= $jenisClass ?>">
                                            <?= strtoupper($transaksi['jenis_transaksi']) ?>
                                        </span>
                                    </td>
                                    <td><?= $transaksi['nama_barang'] ?></td>
                                    <td>
                                        <span class="font-weight-bold <?= $transaksi['jenis_transaksi'] == 'masuk' ? 'text-success' : 'text-danger' ?>">
                                            <?= $transaksi['jenis_transaksi'] == 'masuk' ? '+' : '-' ?><?= $transaksi['jumlah'] ?>
                                        </span>
                                        <div class="text-muted small">pcs</div>
                                    </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-circle mr-2">
                                                <?= strtoupper(substr($transaksi['operator'], 0, 1)) ?>
                                            </div>
                                            <span><?= $transaksi['operator'] ?></span>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if ($transaksi['status'] == 'selesai'): ?>
                                            <span class="badge badge-success">
                                                <i class="fas fa-check-circle mr-1"></i>Selesai
                                            </span>
                                        <?php else: ?>
                                            <span class="badge badge-warning">
                                                <i class="fas fa-clock mr-1"></i>Pending
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <!-- Stok Rendah -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-warning">Stok Hampir Habis</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($stokRendah as $barang): ?>
                    <div class="d-flex justify-content-between align-items-center mb-3 p-2 bg-warning bg-opacity-10 rounded">
                        <div>
                            <div class="font-weight-bold"><?= $barang['nama_barang'] ?></div>
                            <small class="text-muted"><?= $barang['kode_barang'] ?></small>
                        </div>
                        <div class="text-end">
                            <div class="font-weight-bold text-danger"><?= $barang['stok'] ?> pcs</div>
                            <small class="text-muted">tersisa</small>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Top Operator -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Top Operator Hari Ini</h6>
                </div>
                <div class="card-body">
                    <?php foreach ($topOperator as $index => $operator): ?>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <div class="d-flex align-items-center">
                            <div class="position-relative">
                                <div class="avatar-circle-lg bg-primary text-white mr-3">
                                    <?= strtoupper(substr($operator['nama'], 0, 1)) ?>
                                </div>
                                <span class="position-absolute top-0 start-100 translate-middle badge badge-success">
                                    <?= $index + 1 ?>
                                </span>
                            </div>
                            <div>
                                <div class="font-weight-bold"><?= $operator['nama'] ?></div>
                                <small class="text-muted">Operator Gudang</small>
                            </div>
                        </div>
                        <div class="text-end">
                            <div class="font-weight-bold text-primary"><?= $operator['total'] ?></div>
                            <small class="text-muted">transaksi</small>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Ringkasan -->
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">Ringkasan Hari Ini</h6>
                </div>
                <div class="card-body">
                    <div class="row text-center">
                        <div class="col-md-3 mb-3">
                            <div class="p-3 border rounded">
                                <div class="text-success font-weight-bold" style="font-size: 24px;">
                                    +<?= $todayMasuk * 10 ?>
                                </div>
                                <div class="text-muted">Total Barang Masuk</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3 border rounded">
                                <div class="text-danger font-weight-bold" style="font-size: 24px;">
                                    -<?= $todayKeluar * 5 ?>
                                </div>
                                <div class="text-muted">Total Barang Keluar</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3 border rounded">
                                <div class="text-primary font-weight-bold" style="font-size: 24px;">
                                    <?= $totalTransaksi ?>
                                </div>
                                <div class="text-muted">Total Transaksi</div>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="p-3 border rounded">
                                <div class="text-warning font-weight-bold" style="font-size: 24px;">
                                    <?= count($topOperator) ?>
                                </div>
                                <div class="text-muted">Operator Aktif</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.avatar-circle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: #4e73df;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 14px;
}

.avatar-circle-lg {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 18px;
}

.badge-success {
    background-color: #1cc88a;
    color: white;
}

.badge-danger {
    background-color: #e74a3b;
    color: white;
}

.badge-warning {
    background-color: #f6c23e;
    color: #000;
}

.badge-primary {
    background-color: #4e73df;
    color: white;
}

.fas {
    font-family: "Font Awesome 5 Free";
}
</style>

<script>
// Live clock
function updateClock() {
    const now = new Date();
    const timeString = now.toLocaleTimeString('id-ID', { 
        hour: '2-digit', 
        minute: '2-digit',
        second: '2-digit',
        hour12: false 
    });
    document.getElementById('liveClock').textContent = timeString;
}
setInterval(updateClock, 1000);

// Animate numbers
document.addEventListener('DOMContentLoaded', function() {
    const numbers = document.querySelectorAll('.h5');
    numbers.forEach(number => {
        if (number.textContent.match(/^\d+/)) {
            const target = parseInt(number.textContent.replace(/,/g, ''));
            animateNumber(number, target);
        }
    });
    
    function animateNumber(element, target) {
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString();
            }
        }, 30);
    }
});
</script>

<?= $this->endSection() ?>