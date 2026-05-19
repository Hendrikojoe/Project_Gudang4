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
            line-height: 1.5;
            min-height: 100vh;
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
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--primary);
        }

        /* ===== NAVBAR MODERN - FIXED OVERLAP ISSUE ===== */
        .navbar-modern {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.3);
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
            letter-spacing: -0.02em;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        .navbar-brand i {
            font-size: 1.75rem;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover i {
            transform: rotate(360deg) scale(1.1);
        }

        .navbar-brand span {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Fix untuk navbar collapse agar tidak menumpuk */
        .navbar-collapse {
            transition: all 0.3s ease;
        }

        /* Navigation links - FIXED OVERFLOW & WRAPPING */
        .navbar-nav {
            gap: 0.25rem;
            flex-wrap: wrap;
        }

        .nav-link-modern {
            color: var(--gray-700) !important;
            font-weight: 500;
            font-size: 0.9rem;
            padding: 0.5rem 1rem !important;
            border-radius: var(--border-radius-full);
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            white-space: nowrap;
        }

        /* Responsive: pada layar sedang, link bisa sedikit padat tapi tidak menumpuk */
        @media (max-width: 1199.98px) {
            .nav-link-modern {
                padding: 0.45rem 0.85rem !important;
                font-size: 0.85rem;
            }
            .nav-link-modern i {
                font-size: 0.9rem;
            }
        }

        @media (max-width: 991.98px) {
            .navbar-nav {
                margin-top: 1rem;
                flex-direction: column;
                width: 100%;
                gap: 0.25rem;
            }
            .nav-link-modern {
                width: 100%;
                justify-content: flex-start;
                padding: 0.7rem 1rem !important;
                white-space: normal;
                word-break: keep-all;
            }
            .user-profile {
                margin-top: 0.75rem;
                justify-content: space-between;
                width: 100%;
            }
            .navbar-modern .container-fluid {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        .nav-link-modern i {
            font-size: 1rem;
            min-width: 1.25rem;
            color: var(--gray-500);
            transition: all 0.2s;
        }

        .nav-link-modern:hover {
            background: var(--gray-100);
            color: var(--primary) !important;
            transform: translateY(-1px);
        }

        .nav-link-modern:hover i {
            color: var(--primary);
            transform: scale(1.05);
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
            padding: 0.4rem 1rem;
            background: var(--gray-100);
            border-radius: var(--border-radius-full);
            cursor: pointer;
            transition: all 0.2s;
            border: 1px solid transparent;
        }

        .user-profile:hover {
            background: white;
            border-color: var(--gray-200);
            box-shadow: var(--shadow-sm);
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
            font-size: 0.9rem;
            text-transform: uppercase;
            flex-shrink: 0;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            line-height: 1.3;
        }

        .user-name {
            font-weight: 600;
            font-size: 0.85rem;
            color: var(--gray-800);
            max-width: 150px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .user-role {
            font-size: 0.7rem;
            color: var(--gray-500);
        }

        /* Main Content */
        .main-content {
            padding: 1.8rem 1.5rem;
            max-width: 1600px;
            margin: 0 auto;
            animation: fadeIn 0.4s ease-out;
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 2rem;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid var(--gray-200);
            flex-wrap: wrap;
            gap: 1rem;
        }

        .page-title {
            font-size: 1.6rem;
            font-weight: 700;
            color: var(--gray-800);
            letter-spacing: -0.02em;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            flex-wrap: wrap;
        }

        .date-time {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background: white;
            padding: 0.4rem 1rem;
            border-radius: var(--border-radius-full);
            box-shadow: var(--shadow-sm);
            border: 1px solid var(--gray-200);
            flex-wrap: wrap;
        }

        /* Stat Cards */
        .stat-card {
            background: white;
            border-radius: 20px;
            padding: 1.25rem;
            border: 1px solid var(--gray-200);
            transition: all 0.25s;
            height: 100%;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: var(--shadow-lg);
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            margin-bottom: 1rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 800;
            color: var(--gray-800);
            line-height: 1.2;
        }

        /* Table modern - responsive */
        .table-modern {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 6px;
        }

        .table-modern thead th {
            background: var(--gray-100);
            padding: 12px 16px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            color: var(--gray-600);
        }

        .table-modern tbody tr {
            background: white;
            border-radius: 14px;
            transition: all 0.2s;
        }

        .table-modern tbody td {
            padding: 14px 16px;
            vertical-align: middle;
            border-bottom: 1px solid var(--gray-200);
        }

        /* Responsive table mobile */
        @media (max-width: 767.98px) {
            .table-modern thead {
                display: none;
            }
            .table-modern tbody tr {
                display: block;
                margin-bottom: 1rem;
                border-radius: 16px;
                box-shadow: var(--shadow-sm);
            }
            .table-modern tbody td {
                display: flex;
                padding: 10px 14px;
                justify-content: space-between;
                align-items: center;
                border-bottom: 1px solid var(--gray-200);
            }
            .table-modern tbody td:before {
                content: attr(data-label);
                font-weight: 600;
                width: 40%;
                color: var(--gray-600);
                font-size: 0.8rem;
            }
            .main-content {
                padding: 1rem;
            }
            .page-title {
                font-size: 1.3rem;
            }
        }

        /* Badges */
        .badge-transaksi {
            padding: 6px 12px;
            border-radius: 40px;
            font-size: 0.7rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-masuk { background: #d1fae5; color: var(--success); }
        .badge-keluar { background: #fee2e2; color: var(--danger); }

        /* Floating Action Button */
        .fab {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            width: 52px;
            height: 52px;
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.4rem;
            box-shadow: var(--shadow-lg);
            cursor: pointer;
            transition: all 0.25s;
            z-index: 999;
            border: 2px solid rgba(255,255,255,0.3);
        }
        .fab:hover {
            transform: scale(1.08) rotate(90deg);
        }
        .fab-tooltip {
            position: absolute;
            right: 70px;
            background: var(--gray-800);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 30px;
            font-size: 0.75rem;
            white-space: nowrap;
            opacity: 0;
            pointer-events: none;
            transition: 0.2s;
        }
        .fab:hover .fab-tooltip {
            opacity: 1;
            right: 75px;
        }

        /* Toast */
        .toast-notification {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            background: white;
            border-radius: 1rem;
            box-shadow: var(--shadow-xl);
            padding: 0.8rem 1.2rem;
            display: flex;
            align-items: center;
            gap: 0.8rem;
            border-left: 4px solid var(--success);
            transform: translateX(400px);
            transition: transform 0.25s ease;
            z-index: 10000;
            max-width: 320px;
        }
        .toast-notification.show {
            transform: translateX(0);
        }

        /* Loading */
        .spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(255,255,255,0.85);
            backdrop-filter: blur(3px);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 99999;
        }
        .spinner-overlay.show { display: flex; }
        .spinner {
            width: 48px;
            height: 48px;
            border: 4px solid var(--gray-200);
            border-top-color: var(--primary);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>

    <div class="spinner-overlay" id="loadingSpinner">
        <div class="spinner"></div>
    </div>

    <!-- Modern Navbar - TIDAK ADA LAGI OVERLAP TEXT -->
    <nav class="navbar-modern navbar navbar-expand-lg">
        <div class="container-fluid px-3 px-lg-4">
            <a class="navbar-brand" href="<?= base_url('dashboard') ?>">
                <i class="fas fa-cubes"></i>
                <span>Gudang<span style="color: var(--primary-dark);">Pro</span></span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'dashboard' ? 'active' : '' ?>" href="<?= base_url('dashboard') ?>">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'barang' ? 'active' : '' ?>" href="<?= base_url('barang') ?>">
                            <i class="fas fa-boxes"></i> Data Barang
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'barang/masuk' ? 'active' : '' ?>" href="<?= base_url('barang/masuk') ?>">
                            <i class="fas fa-arrow-down"></i> Barang Masuk
                        </a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'operator' ? 'active' : '' ?>" href="<?= base_url('operator') ?>">
                            <i class="fas fa-users"></i> Operator
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'laporan' ? 'active' : '' ?>" href="<?= base_url('laporan') ?>">
                            <i class="fas fa-chart-bar"></i> Laporan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link-modern <?= uri_string() == 'log' ? 'active' : '' ?>" href="<?= base_url('log') ?>">
                            <i class="fas fa-history"></i> Log Aktivitas
                        </a>
                    </li>
                </ul>

                <div class="d-flex align-items-center ms-lg-3 mt-2 mt-lg-0">
                    <div class="user-profile" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="user-avatar">
                            <?= strtoupper(substr(session()->get('email') ?? 'A', 0, 1)) ?>
                        </div>
                        <div class="user-info d-none d-md-flex">
                            <span class="user-name"><?= session()->get('email') ?? 'Administrator' ?></span>
                            <span class="user-role">Operator Gudang</span>
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

    <div class="toast-notification" id="toastNotification">
        <div class="toast-icon"><i class="fas fa-check-circle"></i></div>
        <div class="toast-content">
            <div class="toast-title fw-semibold">Berhasil!</div>
            <div class="toast-message small" id="toastMessage">Data tersimpan</div>
        </div>
        <i class="fas fa-times toast-close" onclick="this.parentElement.classList.remove('show')"></i>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ duration: 600, once: true, offset: 30 });

        function showLoading() { document.getElementById('loadingSpinner').classList.add('show'); }
        function hideLoading() { document.getElementById('loadingSpinner').classList.remove('show'); }

        function showToast(message, type = 'success') {
            const toast = document.getElementById('toastNotification');
            const msgSpan = document.getElementById('toastMessage');
            const icon = toast.querySelector('.toast-icon i');
            msgSpan.innerText = message;
            if (type === 'success') {
                toast.style.borderLeftColor = '#10b981';
                icon.className = 'fas fa-check-circle';
                icon.style.color = '#10b981';
                document.querySelector('.toast-title').innerText = 'Berhasil';
            } else if (type === 'error') {
                toast.style.borderLeftColor = '#ef4444';
                icon.className = 'fas fa-exclamation-triangle';
                icon.style.color = '#ef4444';
                document.querySelector('.toast-title').innerText = 'Gagal';
            } else {
                toast.style.borderLeftColor = '#f59e0b';
                icon.className = 'fas fa-info-circle';
                icon.style.color = '#f59e0b';
                document.querySelector('.toast-title').innerText = 'Peringatan';
            }
            toast.classList.add('show');
            setTimeout(() => toast.classList.remove('show'), 4500);
        }

        window.addEventListener('scroll', function() {
            const nav = document.querySelector('.navbar-modern');
            if (window.scrollY > 30) {
                nav.style.background = 'rgba(255, 255, 255, 0.98)';
                nav.style.boxShadow = 'var(--shadow-md)';
            } else {
                nav.style.background = 'rgba(255, 255, 255, 0.92)';
                nav.style.boxShadow = 'var(--shadow-sm)';
            }
        });

        // Fix active link detection (biar konsisten)
        const currentUrl = window.location.pathname;
        document.querySelectorAll('.nav-link-modern').forEach(link => {
            const href = link.getAttribute('href');
            if (href && (currentUrl === href || (href !== '<?= base_url("dashboard") ?>' && currentUrl.includes(href) && href.length > 1))) {
                link.classList.add('active');
            } else if (currentUrl === '<?= base_url("dashboard") ?>' && href === '<?= base_url("dashboard") ?>') {
                link.classList.add('active');
            }
        });

        window.addEventListener('load', function() {
            if (!sessionStorage.getItem('welcomeShown')) {
                setTimeout(() => showToast('Selamat datang, <?= session()->get("email") ?? "Operator" ?>!', 'success'), 800);
                sessionStorage.setItem('welcomeShown', 'true');
            }
            // inisialisasi tooltip jika ada
            const tooltips = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
            tooltips.map(el => new bootstrap.Tooltip(el));
        });
    </script>
</body>
</html>