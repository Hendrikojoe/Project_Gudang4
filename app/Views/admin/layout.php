<!DOCTYPE html>
<html lang="id">
<head>
<<<<<<< HEAD
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Dashboard Gudang' ?></title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
    <style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fc;
    overflow-x: hidden;
}

/* SIDEBAR */
.sidebar {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    width: 250px;
    z-index: 102;
    padding-top: 60px;
    background-color: #2c3e50;
    color: white;
}

.sidebar-sticky {
    height: calc(100vh - 60px);
    overflow-y: auto;
}

.sidebar .nav-link {
    font-weight: 500;
    color: #ecf0f1;
    padding: 10px 20px;
    margin: 2px 10px;
    border-radius: 5px;
}

.sidebar .nav-link:hover {
    background-color: #34495e;
}

.sidebar .nav-link.active {
    background-color: #3498db;
}

/* NAVBAR */
.navbar {
    background-color: #fff;
    box-shadow: 0 2px 4px rgba(0,0,0,.1);
    position: fixed;
    top: 0;
    right: 0;
    left: 250px;
    height: 60px;
    z-index: 103;
}

/* MAIN CONTENT */
.main-content {
    margin-left: 250px;
    margin-top: 60px;
    padding: 20px;
}

/* CARD */
.card {
    border: none;
    border-radius: 10px;
    box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, .15);
}

/* MOBILE */
@media (max-width: 768px) {
    .sidebar {
        display: none;
    }

    .navbar {
        left: 0;
    }

    .main-content {
        margin-left: 0;
        margin-top: 60px;
    }
}

.avatar-circle {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #4e73df;
    color: white;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}
</style>

</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand navbar-light mb-3">
    <div class="container-fluid">
        <button class="btn btn-link d-md-none" id="sidebarToggle">
            <i class="fa fa-bars"></i>
        </button>

        <h4 class="mb-0">Sistem Manajemen Gudang</h4>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <span class="me-2"><?= $userName ?? 'Administrator' ?></span>
                <span class="avatar-circle">
                    <?= strtoupper(substr($userName ?? 'A', 0, 1)) ?>
                </span>
            </li>
        </ul>
    </div>
</nav>

<!-- SIDEBAR -->
<nav class="sidebar">
    <div class="sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" href="/dashboard">
                    <i class="fas fa-tachometer-alt me-2"></i>
                    Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/barang">
                    <i class="fas fa-boxes me-2"></i>
                    Data Barang
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/transaksi/masuk">
                    <i class="fas fa-box-arrow-in-down me-2"></i>
                    Barang Masuk
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/transaksi/keluar">
                    <i class="fas fa-box-arrow-up me-2"></i>
                    Barang Keluar
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/operator">
                    <i class="fas fa-users me-2"></i>
                    Data Operator
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="/laporan">
                    <i class="fas fa-chart-bar me-2"></i>
                    Laporan
                </a>
            </li>

            <li class="nav-item mt-4">
                <a class="nav-link text-danger" href="/logout">
                    <i class="fas fa-sign-out-alt me-2"></i>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- CONTENT -->
<main class="main-content">
    <?= $this->renderSection('content') ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.getElementById('sidebarToggle').addEventListener('click', function() {
    document.querySelector('.sidebar').classList.toggle('d-none');
});
</script>

=======
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? 'Dashboard Gudang' ?></title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

  <style>
    body {
      background-color: #f8f9fc;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .navbar-custom {
      background-color: #2c3e50;
    }

    .navbar-custom .nav-link {
      color: #ecf0f1 !important;
      margin-right: 10px;
    }

    .navbar-custom .nav-link.active,
    .navbar-custom .nav-link:hover {
      color: #fff !important;
      text-decoration: underline;
    }

    .navbar-brand {
      font-weight: 600;
      color: #fff !important;
    }

    .avatar-circle {
      width: 35px;
      height: 35px;
      border-radius: 50%;
      background-color: #3498db;
      color: white;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
    }

    .content-wrapper {
      padding: 20px;
    }

    @media (max-width: 768px) {
      .navbar-custom .nav-link {
        text-align: center;
        margin: 5px 0;
      }
    }
  </style>
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark navbar-custom sticky-top shadow-sm">
    <div class="container-fluid">
      <a class="navbar-brand" href="/dashboard">
        <i class="fas fa-warehouse me-2"></i>Gudang App
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="/dashboard"><i class="fas fa-tachometer-alt me-1"></i> Dashboard</a></li>
          <li class="nav-item"><a class="nav-link <?= uri_string() == 'barang' ? 'active' : '' ?>" href="/barang"><i class="fas fa-boxes me-1"></i> Data Barang</a></li>
          <li class="nav-item"><a class="nav-link <?= uri_string() == 'barangmasuk' ? 'active' : '' ?>" href="/barangmasuk"><i class="fas fa-arrow-down me-1"></i> Barang Masuk</a></li>
          <li class="nav-item"><a class="nav-link <?= uri_string() == 'barangkeluar' ? 'active' : '' ?>" href="/barangkeluar"><i class="fas fa-arrow-up me-1"></i> Barang Keluar</a></li>
          <li class="nav-item"><a class="nav-link <?= uri_string() == 'operator' ? 'active' : '' ?>" href="/operator"><i class="fas fa-users me-1"></i> Data Operator</a></li>
          <li class="nav-item"><a class="nav-link <?= uri_string() == 'laporan' ? 'active' : '' ?>" href="/laporan"><i class="fas fa-chart-line me-1"></i> Laporan</a></li>
        </ul>

        <ul class="navbar-nav">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown">
              <div class="avatar-circle me-2"><?= strtoupper(substr($userName ?? 'A', 0, 1)) ?></div>
              <?= $userName ?? 'Admin' ?>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li><a class="dropdown-item text-danger" href="/logout"><i class="fas fa-sign-out-alt me-1"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Main Content -->
  <div class="content-wrapper">  
    <?= $this->renderSection('content') ?>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
>>>>>>> 9eed0b8 (update barang masuk barang keluar)
</body>
</html>
