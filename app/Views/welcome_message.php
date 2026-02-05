<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?> - CodeIgniter <?= $ci_version ?></title>
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #3498db;
            --secondary: #2c3e50;
            --success: #2ecc71;
            --danger: #e74c3c;
        }
        
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .hero {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 20px;
            padding: 50px;
            margin-top: 50px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        
        .btn-lg {
            padding: 15px 40px;
            font-size: 1.2rem;
            border-radius: 50px;
        }
        
        .features {
            background: white;
            border-radius: 15px;
            padding: 30px;
            margin: 20px 0;
            transition: transform 0.3s;
        }
        
        .features:hover {
            transform: translateY(-10px);
        }
        
        .info-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 25px;
            color: white;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <!-- Hero Section -->
        <div class="hero text-center">
            <div class="display-4 mb-4 text-primary">
                <i class="fas fa-check-circle"></i>
            </div>
            <h1 class="display-4 fw-bold mb-3">🎉 BERHASIL! CODEIGNITER 4 BERJALAN</h1>
            <p class="lead mb-4">Halaman Utama Elegan Anda Siap Digunakan</p>
            
            <div class="info-box mb-4">
                <h4><i class="fas fa-info-circle"></i> Informasi Sistem</h4>
                <div class="row mt-3">
                    <div class="col-md-3">
                        <i class="fas fa-calendar"></i>
                        <strong>Tanggal:</strong><br>
                        <?= $date ?>
                    </div>
                    <div class="col-md-3">
                        <i class="fas fa-clock"></i>
                        <strong>Waktu:</strong><br>
                        <span id="liveTime"><?= $time ?></span>
                    </div>
                    <div class="col-md-3">
                        <i class="fas fa-code"></i>
                        <strong>PHP:</strong><br>
                        <?= $php_version ?>
                    </div>
                    <div class="col-md-3">
                        <i class="fas fa-cube"></i>
                        <strong>CI Version:</strong><br>
                        <?= $ci_version ?>
                    </div>
                </div>
            </div>
            
            <div class="row mt-5">
                <div class="col-md-4 mb-4">
                    <div class="features">
                        <div class="h1 text-primary mb-3">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h4>Halaman Utama</h4>
                        <p>Ini adalah halaman utama website Anda yang elegan</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="features">
                        <div class="h1 text-success mb-3">
                            <i class="fas fa-check"></i>
                        </div>
                        <h4>CodeIgniter 4</h4>
                        <p>Framework PHP yang cepat dan ringan</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="features">
                        <div class="h1 text-warning mb-3">
                            <i class="fas fa-bolt"></i>
                        </div>
                        <h4>Responsif</h4>
                        <p>Tampil optimal di semua perangkat</p>
                    </div>
                </div>
            </div>
            
            <div class="mt-5">
                <?php if($isLoggedIn): ?>
                    <a href="/dashboard" class="btn btn-success btn-lg me-3">
                        <i class="fas fa-tachometer-alt"></i> Dashboard
                    </a>
                    <a href="/logout" class="btn btn-danger btn-lg">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                <?php else: ?>
                    <a href="/register" class="btn btn-primary btn-lg me-3">
                        <i class="fas fa-user-plus"></i> Daftar Sekarang
                    </a>
                    <a href="/login" class="btn btn-success btn-lg">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                <?php endif; ?>
            </div>
            
            <div class="mt-4">
                <a href="/test" class="btn btn-outline-secondary">
                    <i class="fas fa-vial"></i> Test Page
                </a>
                <a href="/index" class="btn btn-outline-secondary">
                    <i class="fas fa-home"></i> Index Page
                </a>
            </div>
        </div>
        
        <!-- Debug Info -->
        <div class="mt-5 info-box">
            <h5><i class="fas fa-bug"></i> Informasi Debug:</h5>
            <p><strong>URL:</strong> <?= current_url() ?></p>
            <p><strong>Base URL:</strong> <?= base_url() ?></p>
            <p><strong>Environment:</strong> <?= ENVIRONMENT ?></p>
            <p><strong>Session Status:</strong> <?= $isLoggedIn ? 'Logged In' : 'Not Logged In' ?></p>
        </div>
    </div>

    <!-- JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Live time update
        function updateTime() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID');
            document.getElementById('liveTime').textContent = timeString;
        }
        
        setInterval(updateTime, 1000);
        updateTime();
        
        // Animasi
        document.addEventListener('DOMContentLoaded', function() {
            const features = document.querySelectorAll('.features');
            features.forEach((feature, index) => {
                setTimeout(() => {
                    feature.style.opacity = '1';
                    feature.style.transform = 'translateY(0)';
                }, index * 200);
            });
            
            // Set initial state for animation
            document.querySelectorAll('.features').forEach(feature => {
                feature.style.opacity = '0';
                feature.style.transform = 'translateY(20px)';
                feature.style.transition = 'opacity 0.5s, transform 0.5s';
            });
        });
    </script>
</body>
</html>