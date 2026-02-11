<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?></title>

  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

  <style>
    :root {
      --primary-color: #2c3e50;
      --accent-color: #0d6efd;
      --light-bg: #f8f9fa;
      --text-dark: #212529;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      background-color: var(--light-bg);
      color: var(--text-dark);
    }

    .navbar {
      background-color: var(--primary-color);
    }

    .navbar-brand {
      font-weight: 600;
    }

    .navbar-brand span {
      color: var(--accent-color);
    }

    .hero-section {
      background-color: white;
      padding: 100px 0;
      text-align: center;
    }

    .hero-section h1 {
      font-weight: 700;
      font-size: 2.8rem;
      margin-bottom: 20px;
      color: var(--primary-color);
    }

    .hero-section p {
      color: #555;
      max-width: 600px;
      margin: 0 auto 30px;
    }

    .btn-custom {
      padding: 10px 25px;
      border-radius: 30px;
      font-weight: 500;
      border: none;
    }

    .btn-primary {
      background-color: var(--accent-color);
      color: white;
    }

    .btn-outline-dark {
      border: 1px solid #333;
    }

    .features-section {
      background-color: #fff;
      padding: 80px 0;
    }

    .feature-card {
      background: #fff;
      border: 1px solid #e5e5e5;
      border-radius: 10px;
      padding: 30px;
      text-align: center;
      transition: 0.3s;
    }

    .feature-card:hover {
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transform: translateY(-4px);
    }

    .feature-card i {
      font-size: 2rem;
      color: var(--accent-color);
      margin-bottom: 15px;
    }

    .stats-section {
      background: var(--primary-color);
      color: white;
      padding: 60px 0;
    }

    .stat-item {
      text-align: center;
    }

    .stat-value {
      font-size: 2.5rem;
      font-weight: 600;
      color: #0dcaf0;
    }

    .info-section {
      padding: 80px 0;
    }

    .info-card {
      background: white;
      border: 1px solid #e5e5e5;
      border-radius: 10px;
      padding: 30px;
    }

    .info-card h3 {
      font-weight: 600;
      color: var(--primary-color);
      margin-bottom: 15px;
    }

    footer {
      background-color: var(--primary-color);
      color: white;
      padding: 40px 0;
      text-align: center;
    }

    footer p {
      margin: 0;
      color: rgba(255, 255, 255, 0.75);
    }
  </style>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
      <a class="navbar-brand" href="<?= base_url('/') ?>">Elegant<span>Site</span></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link active" href="<?= base_url('/') ?>">Beranda</a></li>
          <?php if ($isLoggedIn): ?>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/logout') ?>">Logout</a></li>
          <?php else: ?>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/register') ?>">Daftar</a></li>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('/login') ?>">Login</a></li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>

  <section class="hero-section">
    <div class="container">
      <h1>Selamat Datang di ElegantSite</h1>
      <p>
        <?= ($hour < 10) ? "Selamat pagi! Awali harimu dengan semangat baru." :
          (($hour < 15) ? "Selamat siang! Semoga aktivitasmu berjalan lancar." :
          (($hour < 19) ? "Selamat sore! Saatnya rehat sejenak." :
          "Selamat malam! Waktunya menutup hari dengan tenang.")); ?>
      </p>
      <div>
        <?php if ($isLoggedIn): ?>
          <a href="<?= base_url('/dashboard') ?>" class="btn btn-primary me-2">Dashboard</a>
          <a href="<?= base_url('/logout') ?>" class="btn btn-outline-dark">Logout</a>
        <?php else: ?>
          <a href="<?= base_url('/register') ?>" class="btn btn-primary me-2">Mulai Sekarang</a>
          <a href="<?= base_url('/login') ?>" class="btn btn-outline-dark">Masuk Akun</a>
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section class="features-section">
    <div class="container">
      <div class="text-center mb-5">
        <h2>Fitur Unggulan</h2>
        <p class="text-muted">Didesain untuk performa dan kemudahan maksimal.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="feature-card">
            <i class="fas fa-shield-alt"></i>
            <h5>Keamanan Terjamin</h5>
            <p class="text-muted">Sistem terenkripsi untuk menjaga kerahasiaan data Anda.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="fas fa-bolt"></i>
            <h5>Performa Cepat</h5>
            <p class="text-muted">Optimasi kecepatan dan tampilan di semua perangkat.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="feature-card">
            <i class="fas fa-headset"></i>
            <h5>Dukungan 24/7</h5>
            <p class="text-muted">Tim support siap membantu Anda kapan pun diperlukan.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="stats-section">
    <div class="container">
      <div class="row">
        <div class="col-md-3 col-6">
          <div class="stat-item">
            <div class="stat-value">150+</div>
            <p>Proyek Selesai</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="stat-item">
            <div class="stat-value">95%</div>
            <p>Kepuasan Pengguna</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="stat-item">
            <div class="stat-value">50+</div>
            <p>Klien Aktif</p>
          </div>
        </div>
        <div class="col-md-3 col-6">
          <div class="stat-item">
            <div class="stat-value">24/7</div>
            <p>Dukungan</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="info-section">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-6">
          <div class="info-card">
            <h3>Informasi Sistem</h3>
            <p>Tanggal: <?= $date ?></p>
            <p>Waktu Server: <?= $time ?></p>
            <p>PHP Version: <?= $php_version ?></p>
            <p>CodeIgniter: v<?= $ci_version ?></p>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="info-card">
            <h3>Teknologi</h3>
            <ul class="list-unstyled">
              <li>Backend: PHP <?= $php_version ?></li>
              <li>Frontend: JavaScript</li>
              <li>UI Framework: Bootstrap 5</li>
              <li>Database: MySQL</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <p>&copy; <?= date('Y') ?> ElegantSite. Dibuat dengan CodeIgniter 4.</p>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
