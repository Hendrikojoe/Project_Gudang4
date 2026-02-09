<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid mt-4">
  <!-- Header -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 fw-bold text-gray-800">Dashboard</h1>
    <div class="text-end">
      <span class="me-2"><?= date('l, d F Y') ?></span>
      <span class="text-primary fw-bold" id="liveClock"><?= date('H:i:s') ?></span>
    </div>
  </div>

  <!-- Summary Cards -->
  <div class="row g-3">
    <div class="col-xl-3 col-md-6">
      <div class="card border-start border-success shadow h-100 py-2">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-xs fw-bold text-success text-uppercase mb-1">Barang Masuk (Hari Ini)</div>
              <div class="h5 mb-0 fw-bold text-gray-800"><?= $todayMasuk ?></div>
              <span class="text-success small">+<?= $todayMasuk * 10 ?> item</span>
            </div>
            <i class="fas fa-box-arrow-in-down fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card border-start border-danger shadow h-100 py-2">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-xs fw-bold text-danger text-uppercase mb-1">Barang Keluar (Hari Ini)</div>
              <div class="h5 mb-0 fw-bold text-gray-800"><?= $todayKeluar ?></div>
              <span class="text-danger small">-<?= $todayKeluar * 5 ?> item</span>
            </div>
            <i class="fas fa-box-arrow-up fa-2x text-danger"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card border-start border-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-xs fw-bold text-primary text-uppercase mb-1">Total Stok</div>
              <div class="h5 mb-0 fw-bold text-gray-800"><?= number_format($totalStok) ?></div>
              <span class="text-primary small"><?= $jumlahBarang ?> jenis barang</span>
            </div>
            <i class="fas fa-archive fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6">
      <div class="card border-start border-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-xs fw-bold text-warning text-uppercase mb-1">Total Transaksi</div>
              <div class="h5 mb-0 fw-bold text-gray-800"><?= $totalTransaksi ?></div>
              <span class="text-warning small">Hari ini</span>
            </div>
            <i class="fas fa-exchange-alt fa-2x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Transaksi Table + Stok + Operator -->
  <div class="row mt-4">
    <div class="col-xl-8 col-lg-7">
      <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 fw-bold text-primary">Transaksi Hari Ini</h6>
          <a class="btn btn-sm btn-outline-primary" href="/transaksi">Lihat Semua</a>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-sm" width="100%">
              <thead class="table-light">
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
                <?php foreach ($transaksiHariIni as $t): 
                  $jenisClass = $t['jenis_transaksi'] == 'masuk' ? 'success' : 'danger';
                ?>
                <tr>
                  <td><strong><?= $t['id'] ?></strong></td>
                  <td>
                    <?= $t['jam'] ?><br>
                    <small class="text-muted"><?= date('d/m/Y', strtotime($t['tanggal'])) ?></small>
                  </td>
                  <td><span class="badge bg-<?= $jenisClass ?>"><?= strtoupper($t['jenis_transaksi']) ?></span></td>
                  <td><?= $t['nama_barang'] ?></td>
                  <td>
                    <span class="fw-bold text-<?= $t['jenis_transaksi'] == 'masuk' ? 'success' : 'danger' ?>">
                      <?= $t['jenis_transaksi'] == 'masuk' ? '+' : '-' ?><?= $t['jumlah'] ?>
                    </span>
                    <div class="small text-muted">pcs</div>
                  </td>
                  <td><?= $t['operator'] ?></td>
                  <td>
                    <?php if ($t['status'] == 'selesai'): ?>
                      <span class="badge bg-success"><i class="fas fa-check-circle me-1"></i>Selesai</span>
                    <?php else: ?>
                      <span class="badge bg-warning text-dark"><i class="fas fa-clock me-1"></i>Pending</span>
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

    <!-- Sidebar Widgets -->
    <div class="col-xl-4 col-lg-5">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 fw-bold text-warning">Stok Hampir Habis</h6>
        </div>
        <div class="card-body">
          <?php foreach ($stokRendah as $barang): ?>
          <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-warning bg-opacity-10 rounded">
            <div>
              <strong><?= $barang['nama_barang'] ?></strong><br>
              <small class="text-muted"><?= $barang['kode_barang'] ?></small>
            </div>
            <div class="text-end">
              <span class="fw-bold text-danger"><?= $barang['stok'] ?> pcs</span><br>
              <small class="text-muted">tersisa</small>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="card shadow">
        <div class="card-header py-3">
          <h6 class="m-0 fw-bold text-primary">Top Operator Hari Ini</h6>
        </div>
        <div class="card-body">
          <?php foreach ($topOperator as $i => $op): ?>
          <div class="d-flex justify-content-between align-items-center mb-3">
            <div class="d-flex align-items-center">
              <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width:45px; height:45px;">
                <?= strtoupper(substr($op['nama'], 0, 1)) ?>
              </div>
              <div>
                <div class="fw-bold"><?= $op['nama'] ?></div>
                <small class="text-muted">Operator Gudang</small>
              </div>
            </div>
            <div class="text-end">
              <span class="fw-bold text-primary"><?= $op['total'] ?></span><br>
              <small class="text-muted">transaksi</small>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function updateClock() {
  const now = new Date();
  document.getElementById('liveClock').textContent = now.toLocaleTimeString('id-ID', { hour12: false });
}
setInterval(updateClock, 1000);
</script>

<?= $this->endSection() ?>
