<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GudangPro - Sistem Manajemen Gudang & Penyewaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* Animated background particles */
        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(0, 159, 165, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(0, 159, 165, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(0, 159, 165, 0.08) 0%, transparent 50%);
            pointer-events: none;
            animation: floatBg 20s ease-in-out infinite;
        }

        @keyframes floatBg {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.05); opacity: 0.7; }
        }

        .home-container {
            width: 100%;
            max-width: 1300px;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 48px;
            box-shadow: 0 40px 80px rgba(0, 0, 0, 0.4), 0 0 0 1px rgba(255, 255, 255, 0.1);
            overflow: hidden;
            animation: slideUp 0.8s cubic-bezier(0.2, 0.9, 0.4, 1.1);
            position: relative;
            backdrop-filter: blur(0px);
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(60px) scale(0.98);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }

        /* Two column layout */
        .home-grid {
            display: flex;
            flex-wrap: wrap;
        }

        /* Left panel - Branding */
        .brand-panel {
            flex: 1;
            background: linear-gradient(135deg, #009fa5 0%, #006d72 100%);
            padding: 60px 45px;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .brand-panel::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -20%;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.08), transparent);
            border-radius: 50%;
            animation: pulse 8s ease-in-out infinite;
        }

        .brand-panel::after {
            content: '';
            position: absolute;
            bottom: -20%;
            left: -20%;
            width: 350px;
            height: 350px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.06), transparent);
            border-radius: 50%;
            animation: pulse 6s ease-in-out infinite reverse;
        }

        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.1); opacity: 0.8; }
        }

        .brand-logo {
            position: relative;
            z-index: 2;
        }

        .brand-icon {
            width: 90px;
            height: 90px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 45px;
            margin-bottom: 35px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.25);
            transition: all 0.3s ease;
            animation: floatIcon 3s ease-in-out infinite;
        }

        @keyframes floatIcon {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }

        .brand-title {
            font-size: 42px;
            font-weight: 800;
            letter-spacing: -1.5px;
            margin-bottom: 15px;
            background: linear-gradient(135deg, #fff, rgba(255,255,255,0.8));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .brand-desc {
            font-size: 16px;
            opacity: 0.9;
            line-height: 1.7;
            margin-bottom: 50px;
        }

        .feature-grid {
            display: flex;
            flex-direction: column;
            gap: 30px;
            margin-top: 40px;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 15px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.08);
            border-radius: 20px;
            backdrop-filter: blur(5px);
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(10px);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }

        .feature-text h4 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .feature-text p {
            font-size: 13px;
            opacity: 0.8;
            margin: 0;
        }

        /* Right panel - Forms */
        .form-panel {
            flex: 1;
            padding: 60px 50px;
            background: white;
        }

        /* Tabs */
        .tabs-container {
            display: flex;
            gap: 12px;
            margin-bottom: 40px;
            background: #f1f5f9;
            padding: 6px;
            border-radius: 60px;
        }

        .tab-btn {
            flex: 1;
            padding: 14px 20px;
            border: none;
            border-radius: 50px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            background: transparent;
            color: #64748b;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .tab-btn i {
            font-size: 18px;
            transition: transform 0.3s;
        }

        .tab-btn:hover:not(.active) {
            background: rgba(0, 159, 165, 0.1);
            color: #009fa5;
        }

        .tab-btn.active {
            background: linear-gradient(135deg, #009fa5, #007b82);
            color: white;
            box-shadow: 0 6px 20px rgba(0, 159, 165, 0.35);
            transform: scale(1.02);
        }

        .tab-btn.active i {
            transform: scale(1.1);
        }

        /* Forms */
        .forms-wrapper {
            position: relative;
            min-height: 500px;
        }

        .auth-form {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            opacity: 0;
            transform: translateX(30px);
            visibility: hidden;
        }

        .auth-form.active {
            opacity: 1;
            transform: translateX(0);
            visibility: visible;
            position: relative;
        }

        .form-title {
            font-size: 32px;
            font-weight: 800;
            background: linear-gradient(135deg, #0f172a, #334155);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 12px;
        }

        .form-subtitle {
            color: #64748b;
            font-size: 14px;
            margin-bottom: 35px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #334155;
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #94a3b8;
            font-size: 18px;
            transition: all 0.3s;
            z-index: 1;
        }

        .form-control {
            width: 100%;
            padding: 14px 16px 14px 48px;
            border: 2px solid #e2e8f0;
            border-radius: 16px;
            font-size: 15px;
            transition: all 0.3s;
            background: #f8fafc;
        }

        .form-control:focus {
            border-color: #009fa5;
            outline: none;
            background: white;
            box-shadow: 0 0 0 4px rgba(0, 159, 165, 0.1);
        }

        .form-control.is-invalid {
            border-color: #dc2626;
            background: #fef2f2;
        }

        .invalid-feedback {
            color: #dc2626;
            font-size: 12px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .password-hint {
            font-size: 12px;
            color: #94a3b8;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0 25px;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #475569;
            font-size: 14px;
            cursor: pointer;
        }

        .checkbox-label input {
            width: 18px;
            height: 18px;
            accent-color: #009fa5;
            cursor: pointer;
        }

        .forgot-link {
            color: #009fa5;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s;
        }

        .forgot-link:hover {
            color: #006d72;
            text-decoration: underline;
        }

        .btn-submit {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, #009fa5 0%, #007b82 100%);
            color: white;
            border: none;
            border-radius: 16px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            position: relative;
            overflow: hidden;
        }

        .btn-submit::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .btn-submit:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(0, 159, 165, 0.4);
        }

        .btn-submit:disabled {
            opacity: 0.7;
            cursor: not-allowed;
            transform: none;
        }

        /* Alert styles */
        .alert {
            padding: 14px 16px;
            border-radius: 16px;
            margin-bottom: 25px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideIn 0.4s ease;
            border: none;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .alert-danger {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            color: #dc2626;
            border-left: 4px solid #dc2626;
        }

        .alert-success {
            background: linear-gradient(135deg, #ecfdf5, #d1fae5);
            color: #10b981;
            border-left: 4px solid #10b981;
        }

        .alert-warning {
            background: linear-gradient(135deg, #fffbeb, #fef3c7);
            color: #d97706;
            border-left: 4px solid #d97706;
        }

        .alert i {
            font-size: 20px;
        }

        .form-footer {
            text-align: center;
            margin-top: 30px;
            padding-top: 25px;
            border-top: 1px solid #e2e8f0;
        }

        .footer-text {
            color: #94a3b8;
            font-size: 12px;
        }

        .footer-link {
            color: #009fa5;
            text-decoration: none;
            font-weight: 500;
        }

        .footer-link:hover {
            text-decoration: underline;
        }

        /* Loading spinner */
        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: white;
            animation: spin 0.8s linear infinite;
            display: inline-block;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Eye toggle button */
        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.3s;
            z-index: 2;
            background: transparent;
            border: none;
        }

        .toggle-password:hover {
            color: #009fa5;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .home-grid {
                flex-direction: column;
            }

            .brand-panel {
                padding: 45px 35px;
            }

            .feature-grid {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .feature-item {
                flex: 1;
                min-width: 200px;
            }

            .form-panel {
                padding: 45px 35px;
            }
        }

        @media (max-width: 768px) {
            .feature-grid {
                flex-direction: column;
            }

            .brand-title {
                font-size: 34px;
            }

            .form-title {
                font-size: 28px;
            }

            .tabs-container {
                flex-direction: column;
                border-radius: 24px;
            }

            .tab-btn {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            body {
                padding: 10px;
            }

            .brand-panel, .form-panel {
                padding: 30px 25px;
            }

            .brand-icon {
                width: 70px;
                height: 70px;
                font-size: 35px;
            }

            .brand-title {
                font-size: 28px;
            }
        }
    </style>
</head>

<body>
    <div class="home-container">
        <div class="home-grid">
            <!-- Left Panel - Branding -->
            <div class="brand-panel" data-aos="fade-right" data-aos-duration="1000">
                <div class="brand-logo">
                    <div class="brand-icon">
                        <i class="fas fa-warehouse"></i>
                    </div>
                    <h1 class="brand-title">GudangPro</h1>
                    <p class="brand-desc">Solusi Cerdas Manajemen Gudang & Inventaris</p>
                </div>

                <div class="feature-grid">
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Real-Time Monitoring</h4>
                            <p>Pantau stok dan transaksi secara langsung</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-truck-fast"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Tracking Barang</h4>
                            <p>Catat semua pergerakan barang masuk & keluar</p>
                        </div>
                    </div>
                    <div class="feature-item">
                        <div class="feature-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="feature-text">
                            <h4>Manajemen Event</h4>
                            <p>Kelola penyewaan untuk event Anda</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Panel - Forms -->
            <div class="form-panel" data-aos="fade-left" data-aos-duration="1000">
                <!-- Tabs -->
                <div class="tabs-container">
                    <button class="tab-btn active" id="loginTab" onclick="switchTab('login')">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </button>
                    <button class="tab-btn" id="registerTab" onclick="switchTab('register')">
                        <i class="fas fa-user-plus"></i>
                        Register
                    </button>
                </div>

                <!-- Forms Wrapper -->
                <div class="forms-wrapper">
                    <!-- Login Form -->
                    <div class="auth-form active" id="loginForm">
                        <h2 class="form-title">Selamat Datang Kembali</h2>
                        <p class="form-subtitle">Masuk untuk mengakses dashboard Anda</p>

                        <div id="loginAlert"></div>

                        <form id="loginFormElement" action="<?= base_url('/login/authenticate'); ?>" method="post" autocomplete="off">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label class="form-label">Alamat Email</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-envelope input-icon"></i>
                                    <input type="email" class="form-control"
                                        id="loginEmail"
                                        placeholder="contoh@email.com"
                                        name="email"
                                        autocomplete="off"
                                        required>
                                </div>
                                <div class="invalid-feedback" id="loginEmailError"></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-lock input-icon"></i>
                                    <input type="password" class="form-control"
                                        id="loginPassword"
                                        placeholder="Masukkan password"
                                        name="password"
                                        autocomplete="off"
                                        required>
                                    <button type="button" class="toggle-password" onclick="togglePassword('loginPassword', 'toggleIconLogin')">
                                        <i id="toggleIconLogin" class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-hint">
                                    <i class="fas fa-info-circle"></i>
                                    Password minimal 8 karakter
                                </div>
                            </div>

                            <div class="form-options">
                                <label class="checkbox-label">
                                    <input type="checkbox" name="remember" id="rememberCheckbox">
                                    <span>Ingat saya</span>
                                </label>
                                <a href="#" class="forgot-link" onclick="showForgotPassword(event)">Lupa password?</a>
                            </div>

                            <button type="submit" class="btn-submit" id="loginBtn">
                                <i class="fas fa-sign-in-alt"></i>
                                Masuk
                            </button>
                        </form>
                    </div>

                    <!-- Register Form -->
                    <div class="auth-form" id="registerForm">
                        <h2 class="form-title">Buat Akun Baru</h2>
                        <p class="form-subtitle">Daftar sekarang dan kelola gudang Anda dengan mudah</p>

                        <div id="registerAlert"></div>

                        <form id="registerFormElement" action="<?= base_url('/register/save'); ?>" method="post" autocomplete="off">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label class="form-label">Nama Lengkap</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-user input-icon"></i>
                                    <input type="text" class="form-control"
                                        id="registerName"
                                        placeholder="Masukkan nama lengkap"
                                        name="name"
                                        value="<?= set_value('name') ?>"
                                        autocomplete="off"
                                        required>
                                </div>
                                <div class="invalid-feedback" id="registerNameError"></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Alamat Email</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-envelope input-icon"></i>
                                    <input type="email" class="form-control"
                                        id="registerEmail"
                                        placeholder="contoh@email.com"
                                        name="email"
                                        value="<?= set_value('email') ?>"
                                        autocomplete="off"
                                        required>
                                </div>
                                <div class="invalid-feedback" id="registerEmailError"></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-lock input-icon"></i>
                                    <input type="password" class="form-control"
                                        id="registerPassword"
                                        placeholder="Minimal 8 karakter"
                                        name="password"
                                        autocomplete="new-password"
                                        required>
                                    <button type="button" class="toggle-password" onclick="togglePassword('registerPassword', 'toggleIconRegPassword')">
                                        <i id="toggleIconRegPassword" class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="password-hint">
                                    <i class="fas fa-info-circle"></i>
                                    Minimal 8 karakter (huruf, angka, dan simbol)
                                </div>
                                <div class="invalid-feedback" id="registerPasswordError"></div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Konfirmasi Password</label>
                                <div class="input-wrapper">
                                    <i class="fas fa-lock input-icon"></i>
                                    <input type="password" class="form-control"
                                        id="registerConfirmPassword"
                                        placeholder="Ulangi password"
                                        name="confirm_password"
                                        autocomplete="off"
                                        required>
                                    <button type="button" class="toggle-password" onclick="togglePassword('registerConfirmPassword', 'toggleIconRegConfirm')">
                                        <i id="toggleIconRegConfirm" class="fas fa-eye"></i>
                                    </button>
                                </div>
                                <div class="invalid-feedback" id="registerConfirmError"></div>
                            </div>

                            <div class="form-group">
                                <label class="checkbox-label">
                                    <input type="checkbox" id="termsCheckbox" required>
                                    <span>Saya menyetujui <a href="#" class="footer-link">Syarat & Ketentuan</a> yang berlaku</span>
                                </label>
                            </div>

                            <button type="submit" class="btn-submit" id="registerBtn">
                                <i class="fas fa-user-plus"></i>
                                Daftar Sekarang
                            </button>
                        </form>

                        <div class="form-footer">
                            <p class="footer-text">
                                Dengan mendaftar, Anda menyetujui
                                <a href="#" class="footer-link">Syarat & Ketentuan</a> dan
                                <a href="#" class="footer-link">Kebijakan Privasi</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Forgot Password Modal -->
    <div class="modal fade" id="forgotPasswordModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 28px; border: none;">
                <div class="modal-header border-0" style="padding: 28px 28px 0 28px;">
                    <h5 class="modal-title fw-bold">
                        <i class="fas fa-key text-primary me-2" style="color: #009fa5 !important;"></i>
                        Reset Password
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="padding: 24px 28px;">
                    <p class="text-muted">Masukkan alamat email Anda, kami akan mengirimkan link untuk mereset password.</p>
                    <div class="form-group">
                        <label class="form-label">Alamat Email</label>
                        <div class="input-wrapper">
                            <i class="fas fa-envelope input-icon"></i>
                            <input type="email" class="form-control" id="forgotEmail" placeholder="Masukkan email">
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0" style="padding: 0 28px 28px 28px;">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="border-radius: 14px; padding: 10px 24px;">Batal</button>
                    <button type="button" class="btn btn-primary" onclick="sendResetLink()" style="background: linear-gradient(135deg, #009fa5, #007b82); border: none; border-radius: 14px; padding: 10px 28px;">
                        <i class="fas fa-paper-plane me-2"></i>Kirim Link
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init({
            once: true,
            duration: 800
        });

        // Get flash messages from PHP
        const flashError = '<?= session()->getFlashdata("error") ?>';
        const flashSuccess = '<?= session()->getFlashdata("success") ?>';

        function displayFlashMessages() {
            if (flashError && flashError !== '') {
                showAlert('login', flashError, 'danger');
            }
            if (flashSuccess && flashSuccess !== '') {
                showAlert('login', flashSuccess, 'success');
            }
        }

        function showAlert(formType, message, type) {
            const alertDiv = document.getElementById(formType === 'login' ? 'loginAlert' : 'registerAlert');
            if (alertDiv) {
                const icon = type === 'danger' ? 'fa-exclamation-triangle' : (type === 'success' ? 'fa-check-circle' : 'fa-info-circle');
                alertDiv.innerHTML = `
                    <div class="alert alert-${type}">
                        <i class="fas ${icon}"></i>
                        <span>${message}</span>
                    </div>
                `;

                setTimeout(() => {
                    const alert = alertDiv.querySelector('.alert');
                    if (alert) {
                        alert.style.transition = 'opacity 0.5s';
                        alert.style.opacity = '0';
                        setTimeout(() => alert.remove(), 500);
                    }
                }, 5000);
            }
        }

        function switchTab(tab) {
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');

            if (tab === 'login') {
                loginTab.classList.add('active');
                registerTab.classList.remove('active');
                loginForm.classList.add('active');
                registerForm.classList.remove('active');
                window.location.hash = 'login';
                document.getElementById('loginAlert').innerHTML = '';
            } else {
                loginTab.classList.remove('active');
                registerTab.classList.add('active');
                loginForm.classList.remove('active');
                registerForm.classList.add('active');
                window.location.hash = 'register';
                document.getElementById('registerAlert').innerHTML = '';
            }
        }

        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const icon = document.getElementById(iconId);
            
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        function validateRegisterForm() {
            let isValid = true;
            const name = document.getElementById('registerName').value.trim();
            const email = document.getElementById('registerEmail').value.trim();
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('registerConfirmPassword').value;
            const terms = document.getElementById('termsCheckbox').checked;

            if (name.length < 3) {
                document.getElementById('registerNameError').innerText = 'Nama lengkap minimal 3 karakter';
                document.getElementById('registerName').classList.add('is-invalid');
                isValid = false;
            } else {
                document.getElementById('registerName').classList.remove('is-invalid');
                document.getElementById('registerNameError').innerText = '';
            }

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('registerEmailError').innerText = 'Format email tidak valid';
                document.getElementById('registerEmail').classList.add('is-invalid');
                isValid = false;
            } else {
                document.getElementById('registerEmail').classList.remove('is-invalid');
                document.getElementById('registerEmailError').innerText = '';
            }

            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d@$!%*#?&]{8,}$/;
            if (!passwordRegex.test(password)) {
                document.getElementById('registerPasswordError').innerHTML = 'Password minimal 8 karakter, mengandung huruf dan angka';
                document.getElementById('registerPassword').classList.add('is-invalid');
                isValid = false;
            } else {
                document.getElementById('registerPassword').classList.remove('is-invalid');
                document.getElementById('registerPasswordError').innerText = '';
            }

            if (password !== confirmPassword) {
                document.getElementById('registerConfirmError').innerText = 'Password tidak cocok';
                document.getElementById('registerConfirmPassword').classList.add('is-invalid');
                isValid = false;
            } else {
                document.getElementById('registerConfirmPassword').classList.remove('is-invalid');
                document.getElementById('registerConfirmError').innerText = '';
            }

            if (!terms) {
                showAlert('register', 'Anda harus menyetujui Syarat & Ketentuan', 'warning');
                isValid = false;
            }

            return isValid;
        }

        function validateLoginForm() {
            let isValid = true;
            const email = document.getElementById('loginEmail').value.trim();
            const password = document.getElementById('loginPassword').value;

            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                document.getElementById('loginEmailError').innerText = 'Format email tidak valid';
                document.getElementById('loginEmail').classList.add('is-invalid');
                isValid = false;
            } else {
                document.getElementById('loginEmail').classList.remove('is-invalid');
                document.getElementById('loginEmailError').innerText = '';
            }

            if (password.length < 1) {
                if (!document.getElementById('loginEmailError').innerText) {
                    document.getElementById('loginEmailError').innerText = 'Password harus diisi';
                }
                isValid = false;
            }

            return isValid;
        }

        function showForgotPassword(event) {
            event.preventDefault();
            const modal = new bootstrap.Modal(document.getElementById('forgotPasswordModal'));
            modal.show();
        }

        function sendResetLink() {
            const email = document.getElementById('forgotEmail').value;
            if (!email) {
                showAlert('login', 'Masukkan email Anda', 'warning');
                return;
            }
            showAlert('login', 'Link reset password telah dikirim ke email Anda', 'success');
            const modal = bootstrap.Modal.getInstance(document.getElementById('forgotPasswordModal'));
            modal.hide();
        }

        function setButtonLoading(button, isLoading) {
            if (isLoading) {
                button.disabled = true;
                button.innerHTML = '<span class="spinner"></span> Memproses...';
            } else {
                button.disabled = false;
                const isLogin = button.id === 'loginBtn';
                button.innerHTML = isLogin ?
                    '<i class="fas fa-sign-in-alt"></i> Masuk' :
                    '<i class="fas fa-user-plus"></i> Daftar Sekarang';
            }
        }

        // DOM Ready
        document.addEventListener('DOMContentLoaded', function() {
            if (window.location.hash === '#register') {
                switchTab('register');
            } else {
                switchTab('login');
            }

            displayFlashMessages();

            const loginForm = document.getElementById('loginFormElement');
            if (loginForm) {
                loginForm.addEventListener('submit', function(e) {
                    if (!validateLoginForm()) {
                        e.preventDefault();
                    } else {
                        setButtonLoading(document.getElementById('loginBtn'), true);
                    }
                });
            }

            const registerForm = document.getElementById('registerFormElement');
            if (registerForm) {
                registerForm.addEventListener('submit', function(e) {
                    if (!validateRegisterForm()) {
                        e.preventDefault();
                    } else {
                        setButtonLoading(document.getElementById('registerBtn'), true);
                    }
                });
            }

            // Real-time validation
            const inputs = ['registerName', 'registerEmail', 'registerPassword', 'registerConfirmPassword', 'loginEmail'];
            inputs.forEach(id => {
                const el = document.getElementById(id);
                if (el) {
                    el.addEventListener('input', function() {
                        this.classList.remove('is-invalid');
                        const errorId = id + 'Error';
                        if (document.getElementById(errorId)) {
                            document.getElementById(errorId).innerText = '';
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>