<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Sistem Manajemen Gudang' ?></title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Poppins', sans-serif;
    }
    .navbar {
      background-color: #0d6efd;
    }
    .navbar-brand, .nav-link {
      color: #fff !important;
      font-weight: 500;
    }
    .nav-link:hover {
      color: #d1ecf1 !important;
    }
    .container-content {
      margin-top: 90px;
    }
  </style>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container-fluid px-4">
      <a class="navbar-brand fw-bold" href="<?= base_url('admin/dashboard') ?>">
        <i class="fas fa-warehouse me-2"></i>Manajemen Gudang
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('barang') ?>">Data Barang</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('operator') ?>">Data Operator</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('laporan') ?>">Laporan</a></li>
          <li class="nav-item"><a class="nav-link text-danger" href="<?= base_url('logout') ?>"><i class="fas fa-right-from-bracket"></i> Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- MAIN CONTENT -->
  <main class="container-fluid container-content">
    <?= $this->renderSection('content') ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
