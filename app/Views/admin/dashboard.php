<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<div class="container-fluid">
  <div class="d-flex justify-content-between align-items-center mb-4">
    <h4 class="fw-bold text-dark mb-0">Dashboard Admin</h4>
    <div>
      <span class="text-muted me-2"><?= date('l, d F Y') ?></span>
      <span class="fw-bold text-primary" id="liveClock"><?= date('H:i:s') ?></span>
    </div>
  </div>

  <!-- SUMMARY CARDS -->
  <div class="row g-3 mb-4">
    <div class="col-md-3">
      <div class="card border-start border-success shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-success small fw-bold text-uppercase mb-1">Barang Masuk (Hari Ini)</div>
              <h5 class="fw-bold mb-0"><?= $todayMasuk ?></h5>
            </div>
            <i class="fas fa-box-arrow-in-down fa-2x text-success"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-start border-danger shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-danger small fw-bold text-uppercase mb-1">Barang Keluar (Hari Ini)</div>
              <h5 class="fw-bold mb-0"><?= $todayKeluar ?></h5>
            </div>
            <i class="fas fa-box-arrow-up fa-2x text-danger"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-start border-primary shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-primary small fw-bold text-uppercase mb-1">Total Stok</div>
              <h5 class="fw-bold mb-0"><?= number_format($totalStok) ?></h5>
            </div>
            <i class="fas fa-archive fa-2x text-primary"></i>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-3">
      <div class="card border-start border-warning shadow-sm">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <div class="text-warning small fw-bold text-uppercase mb-1">Total Transaksi</div>
              <h5 class="fw-bold mb-0"><?= $totalTransaksi ?></h5>
            </div>
            <i class="fas fa-exchange-alt fa-2x text-warning"></i>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- TABEL TRANSAKSI -->
  <div class="row">
    <div class="col-lg-8">
      <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-bold text-primary">Transaksi Hari Ini</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-sm align-middle">
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
                <?php foreach ($transaksiHariIni as $t): ?>
                <tr>
                  <td><strong><?= $t['id'] ?></strong></td>
                  <td><?= $t['jam'] ?><br><small class="text-muted"><?= $t['tanggal'] ?></small></td>
                  <td><span class="badge bg-<?= $t['jenis_transaksi'] === 'masuk' ? 'success' : 'danger' ?>"><?= strtoupper($t['jenis_transaksi']) ?></span></td>
                  <td><?= $t['nama_barang'] ?></td>
                  <td class="fw-bold text-<?= $t['jenis_transaksi'] === 'masuk' ? 'success' : 'danger' ?>">
                    <?= $t['jenis_transaksi'] === 'masuk' ? '+' : '-' ?><?= $t['jumlah'] ?>
                  </td>
                  <td><?= $t['operator'] ?? '-' ?></td>
                  <td>
                    <?php if ($t['status'] === 'selesai'): ?>
                      <span class="badge bg-success">Selesai</span>
                    <?php else: ?>
                      <span class="badge bg-warning text-dark">Pending</span>
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

    <!-- WIDGET KANAN -->
    <div class="col-lg-4">
      <div class="card shadow-sm mb-4">
        <div class="card-header bg-white fw-bold text-warning">Stok Hampir Habis</div>
        <div class="card-body">
          <?php foreach ($stokRendah as $b): ?>
          <div class="d-flex justify-content-between align-items-center mb-2 p-2 bg-warning bg-opacity-10 rounded">
            <div>
              <strong><?= $b['nama_barang'] ?></strong><br>
              <small class="text-muted"><?= $b['kode_barang'] ?></small>
            </div>
            <div class="text-end">
              <span class="fw-bold text-danger"><?= $b['stok'] ?> pcs</span><br>
              <small class="text-muted">tersisa</small>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="card shadow-sm">
        <div class="card-header bg-white fw-bold text-primary">Top Operator Hari Ini</div>
        <div class="card-body">
          <?php foreach ($topOperator as $op): ?>
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
