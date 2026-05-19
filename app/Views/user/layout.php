<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title><?= $title ?? 'Sistem Manajemen Gudang' ?> | GudangPro</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-500: #64748b;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --shadow-md: 0 4px 6px -1px rgba(0,0,0,0.1);
            --border-radius-full: 9999px;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: #f1f5f9;
            color: var(--gray-800);
            line-height: 1.5;
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar-modern {
            background: white;
            box-shadow: var(--shadow-md);
            padding: 0.6rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary) !important;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i { font-size: 1.75rem; }
        .navbar-brand span {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .navbar-toggler { border: none; background: transparent; }
        .navbar-toggler:focus { box-shadow: none; }

        .nav-link-modern {
            color: var(--gray-700) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 1rem !important;
            border-radius: var(--border-radius-full);
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        @media (max-width: 991.98px) {
            .navbar-nav { margin-top: 1rem; flex-direction: column; width: 100%; }
            .nav-link-modern { width: 100%; justify-content: flex-start; }
        }

        .nav-link-modern i { font-size: 1rem; color: var(--gray-500); }
        .nav-link-modern:hover { background: var(--gray-100); color: var(--primary) !important; }
        .nav-link-modern:hover i { color: var(--primary); }
        .nav-link-modern.active { background: #e0e7ff; color: var(--primary) !important; }
        .nav-link-modern.active i { color: var(--primary); }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.4rem 1rem;
            background: var(--gray-100);
            border-radius: var(--border-radius-full);
            cursor: pointer;
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            text-transform: uppercase;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.85rem;
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-role { font-size: 0.7rem; color: var(--gray-500); }

        .main-content {
            padding: 1.5rem;
            min-height: calc(100vh - 70px);
        }
        @media (max-width: 768px) { .main-content { padding: 1rem; } }

        .container-fluid { padding-left: 1.5rem; padding-right: 1.5rem; }
        @media (max-width: 768px) { .container-fluid { padding-left: 1rem; padding-right: 1rem; } }
    </style>
</head>
<body>

<nav class="navbar-modern navbar navbar-expand-lg">
    <div class="container-fluid">
        <a class="navbar-brand" href="<?= base_url('user/dashboard') ?>">
            <i class="fas fa-cubes"></i>
            <span>GudangPro</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarMain">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link-modern" href="<?= base_url('user/dashboard') ?>">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-modern" href="<?= base_url('user/barang') ?>">
                        <i class="fas fa-boxes"></i> Data Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-modern" href="<?= base_url('user/barang/masuk') ?>">
                        <i class="fas fa-arrow-down"></i> Barang Masuk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link-modern" href="<?= base_url('user/laporan') ?>">
                        <i class="fas fa-chart-bar"></i> Laporan
                    </a>
                </li>
                <!-- ========== OPERATOR DAN LOG AKTIVITAS TELAH DIHAPUS ========== -->
            </ul>
            <div class="dropdown">
                <div class="user-profile" data-bs-toggle="dropdown">
                    <div class="user-avatar">
                        <?= strtoupper(substr(session()->get('email') ?? 'U', 0, 1)) ?>
                    </div>
                    <div class="user-info d-none d-md-block">
                        <div class="user-name"><?= session()->get('email') ?? 'User' ?></div>
                        <div class="user-role">User</div>
                    </div>
                    <i class="fas fa-chevron-down text-gray-500 d-none d-md-block" style="font-size: 0.7rem;"></i>
                </div>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item text-danger" href="<?= base_url('logout') ?>"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<main class="main-content">
    <?= $this->renderSection('content') ?>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const currentUrl = window.location.pathname;
    document.querySelectorAll('.nav-link-modern').forEach(link => {
        if (link.getAttribute('href') === currentUrl) {
            link.classList.add('active');
        }
    });
</script>
</body>
</html>