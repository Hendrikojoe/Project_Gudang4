<!DOCTYPE html>
<html lang="id">
<head>
<<<<<<< HEAD
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
=======
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'Sistem Manajemen Gudang' ?></title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <!-- Google Fonts - Inter -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- AOS Animation -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        /* CSS Variables */
        :root {
            --primary: #2563eb;
            --primary-dark: #1e40af;
            --primary-light: #60a5fa;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --info: #3b82f6;
            --dark: #1e293b;
            --gray-50: #f8fafc;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --gray-700: #334155;
            --gray-800: #1e293b;
            --gray-900: #0f172a;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow: 0 1px 3px 0 rgb(0 0 0 / 0.1), 0 1px 2px -1px rgb(0 0 0 / 0.1);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1), 0 2px 4px -2px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            --shadow-xl: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
            --shadow-2xl: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --border-radius: 0.5rem;
            --border-radius-lg: 0.75rem;
            --border-radius-xl: 1rem;
            --border-radius-2xl: 1.5rem;
            --border-radius-full: 9999px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f1f5f9 0%, #e6eff9 100%);
            color: var(--gray-800);
            line-height: 1.6;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated Background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(37, 99, 235, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(16, 185, 129, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(245, 158, 11, 0.03) 0%, transparent 50%);
            pointer-events: none;
            z-index: -1;
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--gray-100);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--gray-400);
            border-radius: var(--border-radius-full);
            transition: all 0.3s ease;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }

        /* Modern Navbar */
        .navbar-modern {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: var(--shadow-md);
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary) !important;
            letter-spacing: -0.02em;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .navbar-brand i {
            font-size: 1.75rem;
            color: var(--primary);
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover i {
            transform: rotate(360deg) scale(1.1);
        }

        .navbar-brand span {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-link-modern {
            color: var(--gray-700) !important;
            font-weight: 500;
            padding: 0.5rem 1rem !important;
            margin: 0 0.25rem;
            border-radius: var(--border-radius-full);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link-modern i {
            font-size: 1rem;
            color: var(--gray-500);
            transition: all 0.3s ease;
        }

        .nav-link-modern:hover {
            background: var(--gray-100);
            color: var(--primary) !important;
            transform: translateY(-1px);
        }

        .nav-link-modern:hover i {
            color: var(--primary);
            transform: scale(1.1);
        }

        .nav-link-modern.active {
            background: linear-gradient(135deg, rgba(37, 99, 235, 0.1) 0%, rgba(30, 64, 175, 0.1) 100%);
            color: var(--primary) !important;
        }

        .nav-link-modern.active i {
            color: var(--primary);
        }

        .nav-link-modern.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 1rem;
            right: 1rem;
            height: 2px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: var(--border-radius-full);
        }

        /* User Profile Dropdown */
        .user-profile {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.5rem 1rem;
            background: var(--gray-100);
            border-radius: var(--border-radius-full);
            cursor: pointer;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .user-profile:hover {
            background: white;
            border-color: var(--gray-200);
            box-shadow: var(--shadow-md);
            transform: translateY(-1px);
        }

        .user-avatar {
            width: 36px;
            height: 36px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: var(--border-radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 700;
            font-size: 1rem;
            text-transform: uppercase;
        }

        .user-info {
            display: flex;
            flex-direction: column;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.875rem;
            color: var(--gray-800);
            line-height: 1.4;
        }

        .user-role {
            font-size: 0.75rem;
            color: var(--gray-500);
            line-height: 1.4;
        }

        /* Main Content */
        .main-content {
            padding: 2rem 1.5rem;
            max-width: 1600px;
            margin: 0 auto;
            animation: fadeIn 0.5s ease-out;
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--gray-200);
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--gray-800);
            letter-spacing: -0.02em;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .page-title i {
            color: var(--primary);
            font-size: 1.75rem;
        }

        .date-time {
            display: flex;
            align-items: center;
            gap: 1rem;
            background: white;
            padding: 0.5rem 1.25rem;
            border-radius: var(--border-radius-full);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
        }

        .date-time i {
            color: var(--primary);
        }

        .date {
            font-weight: 500;
            color: var(--gray-700);
        }

        .time {
            font-weight: 600;
            color: var(--primary);
            background: var(--gray-100);
            padding: 0.25rem 0.75rem;
            border-radius: var(--border-radius-full);
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .navbar-modern {
                padding: 0.5rem 0;
            }
            
            .nav-link-modern {
                padding: 0.5rem 1rem !important;
                margin: 0.25rem 0;
            }
            
            .user-profile {
                margin-top: 1rem;
            }
            
            .page-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }
            
            .date-time {
                width: 100%;
                justify-content: space-between;
            }
        }

        @media (max-width: 767.98px) {
            .main-content {
                padding: 1.5rem 1rem;
            }
            
            .page-title {
                font-size: 1.5rem;
            }
        }

        /* Toast Notification */
        .toast-notification {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            background: white;
            border-radius: var(--border-radius);
            box-shadow: var(--shadow-xl);
            padding: 1rem;
            display: flex;
            align-items: center;
            gap: 1rem;
            border-left: 4px solid var(--success);
            transform: translateX(400px);
            transition: transform 0.3s ease;
            z-index: 9999;
        }

        .toast-notification.show {
            transform: translateX(0);
        }

        .toast-icon {
            width: 40px;
            height: 40px;
            background: rgba(16, 185, 129, 0.1);
            border-radius: var(--border-radius-full);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--success);
        }

        .toast-content {
            flex: 1;
        }

        .toast-title {
            font-weight: 600;
            color: var(--gray-800);
            margin-bottom: 0.25rem;
        }

        .toast-message {
            font-size: 0.875rem;
            color: var(--gray-600);
        }

        .toast-close {
            color: var(--gray-400);
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .toast-close:hover {
            color: var(--gray-600);
        }

        /* Loading Spinner */
        .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(4px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 99999;
        }

        .spinner-overlay.show {
            display: flex;
        }

        .spinner {
            width: 60px;
            height: 60px;
            border: 4px solid var(--gray-200);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            box-shadow: var(--shadow-lg);
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 999;
            border: 2px solid white;
        }

        .fab:hover {
            transform: scale(1.1) rotate(90deg);
            box-shadow: var(--shadow-2xl);
        }

        .fab-tooltip {
            position: absolute;
            right: 70px;
            background: var(--gray-800);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
            font-size: 0.875rem;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        .fab:hover .fab-tooltip {
            opacity: 1;
            right: 80px;
        }
    </style>
</head>
<body>

    <!-- Loading Spinner -->
    <div class="spinner-overlay" id="loadingSpinner">
        <div class="spinner"></div>
    </div>

    <!-- Modern Navbar (Tanpa Sidebar) -->
    <nav class="navbar-modern navbar navbar-expand-lg">
        <div class="container-fluid px-4">
            <!-- Brand -->
            <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-cubes"></i>
                <span>Gudang<span style="color: var(--primary-dark);">Pro</span></span>
            </a>

            <!-- Mobile Toggle -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navigation Links -->
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'barang' ? 'active' : '' ?>" href="<?= base_url('barang') ?>">
                            <i class="fas fa-boxes"></i>
                            Data Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'transaksi/masuk' ? 'active' : '' ?>" href="<?= base_url('transaksi/masuk') ?>">
                            <i class="fas fa-arrow-down"></i>
                            Barang Masuk
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'transaksi/keluar' ? 'active' : '' ?>" href="<?= base_url('transaksi/keluar') ?>">
                            <i class="fas fa-arrow-up"></i>
                            Barang Keluar
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'operator' ? 'active' : '' ?>" href="<?= base_url('operator') ?>">
                            <i class="fas fa-users"></i>
                            Operator
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'laporan' ? 'active' : '' ?>" href="<?= base_url('laporan') ?>">
                            <i class="fas fa-chart-bar"></i>
                            Laporan
                        </a>
                    </li>
                </ul>

                <!-- User Profile -->
                <div class="d-flex align-items-center">
                    <div class="user-profile" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar">
                            <?= strtoupper(substr($userName ?? 'A', 0, 1)) ?>
                        </div>
                        <div class="user-info d-none d-lg-block">
                            <span class="user-name"><?= $userName ?? 'Administrator' ?></span>
                            <span class="user-role">Operator Gudang</span>
                        </div>
                        <i class="fas fa-chevron-down text-gray-500 d-none d-lg-block" style="font-size: 0.75rem;"></i>
                    </div>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="<?= base_url('profile') ?>">
                                <i class="fas fa-user me-2"></i> Profil
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="<?= base_url('settings') ?>">
                                <i class="fas fa-cog me-2"></i> Pengaturan
                            </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <a class="dropdown-item text-danger" href="<?= base_url('logout') ?>">
                                <i class="fas fa-sign-out-alt me-2"></i> Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="main-content">
        <?= $this->renderSection('content') ?>
    </main>

    <!-- Floating Action Button -->
    <div class="fab" onclick="window.location.href='<?= base_url('transaksi/masuk') ?>'">
        <i class="fas fa-plus"></i>
        <span class="fab-tooltip">Tambah Transaksi</span>
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
    </div>

<<<<<<< HEAD
  <!-- MAIN CONTENT -->
  <main class="container-fluid container-content">
    <?= $this->renderSection('content') ?>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
=======
    <!-- Toast Notification (Hidden by default) -->
    <div class="toast-notification" id="toastNotification">
        <div class="toast-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="toast-content">
            <div class="toast-title">Berhasil!</div>
            <div class="toast-message" id="toastMessage">Data berhasil disimpan</div>
        </div>
        <i class="fas fa-times toast-close" onclick="this.parentElement.classList.remove('show')"></i>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    
    <script>
        // Initialize AOS
        AOS.init({
            duration: 800,
            once: true,
            offset: 50,
            easing: 'ease-in-out'
        });

        // Loading Spinner
        function showLoading() {
            document.getElementById('loadingSpinner').classList.add('show');
        }

        function hideLoading() {
            document.getElementById('loadingSpinner').classList.remove('show');
        }

        // Toast Notification
        function showToast(message, type = 'success') {
            const toast = document.getElementById('toastNotification');
            const toastMessage = document.getElementById('toastMessage');
            const toastIcon = toast.querySelector('.toast-icon i');
            
            toastMessage.textContent = message;
            
            if (type === 'success') {
                toast.style.borderLeftColor = '#10b981';
                toastIcon.className = 'fas fa-check';
                toastIcon.style.color = '#10b981';
            } else if (type === 'error') {
                toast.style.borderLeftColor = '#ef4444';
                toastIcon.className = 'fas fa-exclamation-triangle';
                toastIcon.style.color = '#ef4444';
            } else if (type === 'warning') {
                toast.style.borderLeftColor = '#f59e0b';
                toastIcon.className = 'fas fa-exclamation-circle';
                toastIcon.style.color = '#f59e0b';
            }
            
            toast.classList.add('show');
            
            setTimeout(() => {
                toast.classList.remove('show');
            }, 5000);
        }

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar-modern');
            if (window.scrollY > 50) {
                navbar.style.background = 'rgba(255, 255, 255, 0.98)';
                navbar.style.boxShadow = 'var(--shadow-lg)';
            } else {
                navbar.style.background = 'rgba(255, 255, 255, 0.9)';
                navbar.style.boxShadow = 'var(--shadow-md)';
            }
        });

        // Active Link berdasarkan URL
        const currentPath = window.location.pathname;
        const navLinks = document.querySelectorAll('.nav-link-modern');
        
        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (currentPath.includes(href) && href !== '<?= base_url("dashboard") ?>') {
                link.classList.add('active');
            }
        });

        // Example: Show welcome toast
        window.addEventListener('load', function() {
            setTimeout(() => {
                showToast('Selamat datang, <?= $userName ?? "Administrator" ?>!', 'success');
            }, 1000);
        });

        // Tooltip initialization
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });

        // Popover initialization
        const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    </script>
>>>>>>> 57e7575adf4790bc752e34b3bcca0e05c6870d53
</body>
</html>