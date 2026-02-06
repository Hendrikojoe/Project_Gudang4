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
            --primary-color: #3498db;
            --secondary-color: #2c3e50;
            --accent-color: #e74c3c;
            --success-color: #2ecc71;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            color: #333;
        }
        
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
        }
        
        .navbar-brand i {
            color: var(--accent-color);
        }
        
        /* Hero Section */
        .hero-section {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9) 0%, rgba(118, 75, 162, 0.9) 100%);
            color: white;
            padding: 100px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?ixlib=rb-4.0.3&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            opacity: 0.2;
            z-index: 1;
        }
        
        .hero-content {
            position: relative;
            z-index: 2;
        }
        
        .hero-title {
            font-size: 3.5rem;
            font-weight: 800;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }
        
        .hero-subtitle {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
            opacity: 0.9;
        }
        
        /* Greeting Animation */
        .greeting-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 20px;
            margin: 30px auto;
            max-width: 500px;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Features */
        .features-section {
            padding: 80px 0;
            background: white;
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-title h2 {
            font-size: 2.5rem;
            color: var(--secondary-color);
            position: relative;
            display: inline-block;
        }
        
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            background: var(--primary-color);
            border-radius: 2px;
        }
        
        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 40px 30px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            text-align: center;
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid rgba(0,0,0,0.05);
        }
        
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
        }
        
        .feature-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, var(--primary-color), #667eea);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 25px;
            color: white;
            font-size: 2rem;
        }
        
        /* Stats */
        .stats-section {
            padding: 80px 0;
            background: linear-gradient(135deg, #2c3e50 0%, #4a6491 100%);
            color: white;
        }
        
        .stat-item {
            text-align: center;
            padding: 20px;
        }
        
        .stat-value {
            font-size: 3rem;
            font-weight: 700;
            color: var(--success-color);
            margin-bottom: 10px;
        }
        
        /* Buttons */
        .btn-custom {
            padding: 12px 30px;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s;
            border: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .btn-custom-primary {
            background: var(--success-color);
            color: white;
        }
        
        .btn-custom-primary:hover {
            background: #27ae60;
            transform: translateY(-3px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        
        .btn-custom-secondary {
            background: transparent;
            color: white;
            border: 2px solid white;
        }
        
        .btn-custom-secondary:hover {
            background: white;
            color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        /* Cards */
        .info-card {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
            height: 100%;
            transition: transform 0.3s;
        }
        
        .info-card:hover {
            transform: translateY(-5px);
        }
        
        /* Footer */
        .main-footer {
            background: var(--secondary-color);
            color: white;
            padding: 60px 0 30px;
        }
        
        .social-links a {
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            color: white;
            margin-right: 10px;
            transition: all 0.3s;
            text-decoration: none;
        }
        
        .social-links a:hover {
            background: var(--primary-color);
            transform: translateY(-3px);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .section-title h2 {
                font-size: 2rem;
            }
            
            .stat-value {
                font-size: 2.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .hero-title {
                font-size: 2rem;
            }
            
            .btn-custom {
                width: 100%;
                margin-bottom: 10px;
            }
        }
        
        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease forwards;
        }
        
        .delay-1 { animation-delay: 0.2s; opacity: 0; }
        .delay-2 { animation-delay: 0.4s; opacity: 0; }
        .delay-3 { animation-delay: 0.6s; opacity: 0; }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url('/') ?>">
                <i class="fas fa-crown me-2"></i>Elegant<span style="color: #3498db;">Site</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?= base_url('/') ?>">
                            <i class="fas fa-home"></i> Beranda
                        </a>
                    </li>
                    <?php if($isLoggedIn): ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/dashboard') ?>">
                                <i class="fas fa-dashboard"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/logout') ?>">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/register') ?>">
                                <i class="fas fa-user-plus"></i> Daftar
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('/login') ?>">
                                <i class="fas fa-sign-in-alt"></i> Login
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title animate-fade-in-up">Selamat Datang di <br><span style="color: #ffd166;">Website Elegan</span></h1>
                
                <p class="hero-subtitle animate-fade-in-up delay-1">
                    <?php
                    if ($hour < 10) {
                        echo "🌅 Selamat pagi! Saatnya memulai hari dengan penuh semangat.";
                    } elseif ($hour < 15) {
                        echo "☀️ Selamat siang! Semoga harimu menyenangkan.";
                    } elseif ($hour < 19) {
                        echo "🌇 Selamat sore! Waktunya bersantai sejenak.";
                    } else {
                        echo "🌙 Selamat malam! Semoga hari ini produktif.";
                    }
                    ?>
                </p>
                
                <div class="greeting-box animate-fade-in-up delay-2">
                    <div class="row">
                        <div class="col-md-4">
                            <i class="fas fa-calendar-alt"></i>
                            <h5>Tanggal</h5>
                            <p><?= $date ?></p>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-clock"></i>
                            <h5>Waktu Server</h5>
                            <p id="liveTime"><?= $time ?></p>
                        </div>
                        <div class="col-md-4">
                            <i class="fas fa-code"></i>
                            <h5>PHP Version</h5>
                            <p><?= $php_version ?></p>
                        </div>
                    </div>
                </div>
                
                <div class="mt-4 animate-fade-in-up delay-3">
                    <?php if($isLoggedIn): ?>
                        <a href="<?= base_url('/dashboard') ?>" class="btn btn-custom btn-custom-primary me-2">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>
                        <a href="<?= base_url('/logout') ?>" class="btn btn-custom btn-custom-secondary">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    <?php else: ?>
                        <a href="<?= base_url('/register') ?>" class="btn btn-custom btn-custom-primary me-2">
                            <i class="fas fa-rocket"></i> Mulai Sekarang
                        </a>
                        <a href="<?= base_url('/login') ?>" class="btn btn-custom btn-custom-secondary">
                            <i class="fas fa-user-circle"></i> Masuk Akun
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
        <div class="container">
            <div class="section-title">
                <h2>Keunggulan Platform Kami</h2>
                <p class="text-muted">Solusi terbaik untuk kebutuhan digital Anda</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="feature-card animate-fade-in-up delay-1">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3>Keamanan Tinggi</h3>
                        <p class="text-muted">Dilengkapi dengan sistem enkripsi terbaru untuk melindungi data Anda</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card animate-fade-in-up delay-2">
                        <div class="feature-icon">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h3>Cepat & Responsif</h3>
                        <p class="text-muted">Loading super cepat dan tampilan optimal di semua perangkat</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="feature-card animate-fade-in-up delay-3">
                        <div class="feature-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3>Support 24/7</h3>
                        <p class="text-muted">Tim support siap membantu Anda kapan saja, 24 jam sehari</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats-section">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-value" data-count="150">0</div>
                        <div class="stat-label">Proyek Selesai</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-value" data-count="95">0</div>
                        <div class="stat-label">% Kepuasan</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-value" data-count="50">0</div>
                        <div class="stat-label">Klien Aktif</div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="stat-item">
                        <div class="stat-value">24/7</div>
                        <div class="stat-label">Dukungan</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section style="padding: 80px 0; background: #f8f9fa;">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-6">
                    <div class="info-card">
                        <h3><i class="fas fa-info-circle text-primary me-2"></i> Informasi Sistem</h3>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-primary text-white rounded-circle p-3 me-3">
                                        <i class="fas fa-calendar"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Tanggal Server</h6>
                                        <p class="mb-0"><?= $date ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-success text-white rounded-circle p-3 me-3">
                                        <i class="fas fa-code"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">CodeIgniter</h6>
                                        <p class="mb-0">v<?= $ci_version ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-warning text-white rounded-circle p-3 me-3">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Status Login</h6>
                                        <p class="mb-0"><?= $isLoggedIn ? 'Masuk' : 'Tamu' ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-info text-white rounded-circle p-3 me-3">
                                        <i class="fas fa-server"></i>
                                    </div>
                                    <div>
                                        <h6 class="mb-0">Environment</h6>
                                        <p class="mb-0"><?= ENVIRONMENT ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6">
                    <div class="info-card">
                        <h3><i class="fas fa-cogs text-primary me-2"></i> Teknologi</h3>
                        <hr>
                        <div class="row mt-4">
                            <div class="col-md-6 mb-3">
                                <div class="tech-item">
                                    <i class="fab fa-php fa-2x text-primary mb-2"></i>
                                    <h6>PHP <?= $php_version ?></h6>
                                    <small class="text-muted">Backend</small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="tech-item">
                                    <i class="fab fa-js-square fa-2x text-warning mb-2"></i>
                                    <h6>JavaScript</h6>
                                    <small class="text-muted">Frontend</small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="tech-item">
                                    <i class="fab fa-bootstrap fa-2x text-purple mb-2"></i>
                                    <h6>Bootstrap 5</h6>
                                    <small class="text-muted">UI Framework</small>
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div class="tech-item">
                                    <i class="fas fa-database fa-2x text-success mb-2"></i>
                                    <h6>MySQL</h6>
                                    <small class="text-muted">Database</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="main-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h4><i class="fas fa-crown me-2"></i>ElegantSite</h4>
                    <p class="mt-3">Platform digital terbaik untuk solusi bisnis Anda dengan teknologi terkini.</p>
                    <div class="social-links mt-4">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Link Cepat</h4>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><a href="<?= base_url('/') ?>" class="text-white-50 text-decoration-none"><i class="fas fa-chevron-right me-2"></i>Beranda</a></li>
                        <li class="mb-2"><a href="<?= base_url('/register') ?>" class="text-white-50 text-decoration-none"><i class="fas fa-chevron-right me-2"></i>Daftar</a></li>
                        <li class="mb-2"><a href="<?= base_url('/login') ?>" class="text-white-50 text-decoration-none"><i class="fas fa-chevron-right me-2"></i>Login</a></li>
                        <li class="mb-2"><a href="<?= base_url('/dashboard') ?>" class="text-white-50 text-decoration-none"><i class="fas fa-chevron-right me-2"></i>Dashboard</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h4>Kontak</h4>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><i class="fas fa-map-marker-alt me-2"></i> Jakarta, Indonesia</li>
                        <li class="mb-2"><i class="fas fa-phone me-2"></i> +62 21 1234 5678</li>
                        <li class="mb-2"><i class="fas fa-envelope me-2"></i> info@elegantsite.com</li>
                    </ul>
                </div>
            </div>
            <hr class="mt-4" style="border-color: rgba(255,255,255,0.1);">
            <div class="row mt-4">
                <div class="col-md-6">
                    <p class="mb-0">&copy; <?= date('Y') ?> ElegantSite. Hak Cipta Dilindungi.</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">Dibuat dengan <i class="fas fa-heart text-danger"></i> menggunakan CodeIgniter 4</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap & JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Live time update
        function updateLiveTime() {
            const now = new Date();
            const options = { 
                weekday: 'long', 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: false
            };
            const timeString = now.toLocaleDateString('id-ID', options);
            document.getElementById('liveTime').textContent = timeString.split(',')[1].trim();
        }
        
        // Update time every second
        setInterval(updateLiveTime, 1000);
        updateLiveTime(); // Initial call
        
        // Animated counter for stats
        function animateCounters() {
            const counters = document.querySelectorAll('.stat-value[data-count]');
            
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-count'));
                const increment = target / 100;
                let current = 0;
                
                const updateCounter = () => {
                    if (current < target) {
                        current += increment;
                        counter.textContent = Math.ceil(current);
                        setTimeout(updateCounter, 20);
                    } else {
                        counter.textContent = target + '+';
                    }
                };
                
                updateCounter();
            });
        }
        
        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.3,
            rootMargin: '0px 0px -50px 0px'
        };
        
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    if (entry.target.classList.contains('stats-section')) {
                        animateCounters();
                    }
                    entry.target.classList.add('animate-fade-in-up');
                }
            });
        }, observerOptions);
        
        // Observe elements
        document.querySelectorAll('.stats-section, .feature-card, .info-card').forEach(el => {
            observer.observe(el);
        });
        
        // Initialize animations
        document.addEventListener('DOMContentLoaded', function() {
            // Animate elements on load
            setTimeout(() => {
                document.querySelectorAll('.animate-fade-in-up').forEach((el, index) => {
                    setTimeout(() => {
                        el.style.opacity = '1';
                        el.style.transform = 'translateY(0)';
                    }, index * 200);
                });
            }, 300);
        });
    </script>
</body>
</html>