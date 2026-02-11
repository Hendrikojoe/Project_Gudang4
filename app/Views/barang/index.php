<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="container mt-4">
  <h3 class="fw-bold mb-3">Data Barang</h3>

  <div class="row g-3 mb-4">
    <div class="col-md-4">
      <div class="card border-success shadow-sm">
        <div class="card-body text-success">
          <h6 class="fw-bold text-uppercase small">Total Barang Masuk</h6>
          <h4 class="fw-bold"><?= $totalMasuk ?></h4>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-danger shadow-sm">
        <div class="card-body text-danger">
          <h6 class="fw-bold text-uppercase small">Total Barang Keluar</h6>
          <h4 class="fw-bold"><?= $totalKeluar ?></h4>
        </div>
      </div>
    </div>
  </div>

  <a href="/barang/create" class="btn btn-primary mb-3"><i class="bi bi-plus-circle"></i> Tambah Barang</a>

  <table class="table table-hover table-bordered align-middle">
    <thead class="table-light">
      <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Stok</th>
        <th>Total Masuk</th>
        <th>Total Keluar</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($barang as $b): ?>
      <tr>
        <td><?= $b['id'] ?></td>
        <td><?= $b['nama_barang'] ?></td>
        <td><strong><?= $b['stok'] ?></strong></td>
        <td class="text-success"><?= $b['total_masuk'] ?></td>
        <td class="text-danger"><?= $b['total_keluar'] ?></td>
        <td>
          <button class="btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#modalMasuk<?= $b['id'] ?>">Masuk</button>
          <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#modalKeluar<?= $b['id'] ?>">Keluar</button>
          <a href="/barang/edit/<?= $b['id'] ?>" class="btn btn-sm btn-info">Edit</a>
          <a href="/barang/delete/<?= $b['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus?')">Hapus</a>
        </td>
      </tr>

 <!-- Modal Barang Masuk -->
<div class="modal fade" id="modalMasuk<?= $b['id'] ?>" tabindex="-1" aria-labelledby="modalMasukLabel<?= $b['id'] ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-success">
      <form action="/barang/masuk/<?= $b['id'] ?>" method="post">
        <div class="modal-header bg-success text-white">
          <h5 class="modal-title" id="modalMasukLabel<?= $b['id'] ?>">Barang Masuk - <?= esc($b['nama_barang']) ?></h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="jumlahMasuk<?= $b['id'] ?>" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlahMasuk<?= $b['id'] ?>" class="form-control" min="1" required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal Barang Keluar -->
<div class="modal fade" id="modalKeluar<?= $b['id'] ?>" tabindex="-1" aria-labelledby="modalKeluarLabel<?= $b['id'] ?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-warning">
      <form action="/barang/keluar/<?= $b['id'] ?>" method="post">
        <div class="modal-header bg-warning">
          <h5 class="modal-title" id="modalKeluarLabel<?= $b['id'] ?>">Barang Keluar - <?= esc($b['nama_barang']) ?></h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="jumlahKeluar<?= $b['id'] ?>" class="form-label">Jumlah</label>
            <input type="number" name="jumlah" id="jumlahKeluar<?= $b['id'] ?>" class="form-control" min="1" required autocomplete="off">
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-warning text-dark">Simpan</button>
          <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        </div>
      </form>
    </div>
  </div>
</div>


      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $this->endSection() ?>
