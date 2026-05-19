<?= $this->extend('admin/layout') ?>
<?= $this->section('content') ?>

<style>
    /* Custom Properties */
    :root {
        --primary: #2a2a72;
        --secondary: #009ffd;
        --accent: #00d4ff;
        --dark: #1a1a2e;
        --light: #f1f5f9;
        --gradient-primary: linear-gradient(145deg, #2a2a72 0%, #009ffd 100%);
        --shadow-sm: 0 10px 30px rgba(0,0,0,0.05);
        --shadow-md: 0 15px 40px rgba(42,42,114,0.1);
        --shadow-lg: 0 20px 50px rgba(0,159,253,0.15);
    }

    /* Main Container */
    .dashboard-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
        animation: fadeIn 1s ease-out;
    }

    /* Header / Brand */
    .brand-header {
        margin-bottom: 30px;
        position: relative;
    }

    .brand-title {
        font-size: 3rem;
        font-weight: 800;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 10px;
        letter-spacing: 2px;
        animation: slideInDown 0.8s ease-out;
        position: relative;
        display: inline-block;
    }

    .brand-title::after {
        content: '';
        position: absolute;
        bottom: -5px;
        left: 0;
        width: 80px;
        height: 4px;
        background: var(--gradient-primary);
        border-radius: 2px;
        animation: expandWidth 0.8s ease-out 0.3s forwards;
        width: 0;
    }

    /* Welcome Card */
    .welcome-card {
        background: white;
        border-radius: 25px;
        padding: 30px;
        margin-bottom: 35px;
        box-shadow: var(--shadow-md);
        position: relative;
        overflow: hidden;
        animation: slideInRight 0.8s ease-out;
        border: 1px solid rgba(255,255,255,0.3);
        backdrop-filter: blur(10px);
    }

    .welcome-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 5px;
        background: var(--gradient-primary);
        animation: shimmer 3s infinite;
    }

    .welcome-header {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 15px;
    }

    .welcome-icon {
        width: 60px;
        height: 60px;
        background: var(--gradient-primary);
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 28px;
        animation: pulse 2s infinite, float 3s ease-in-out infinite;
        box-shadow: 0 10px 20px rgba(42,42,114,0.3);
    }

    .welcome-message {
        flex: 1;
    }

    .welcome-message h2 {
        font-size: 1.8rem;
        font-weight: 700;
        margin-bottom: 8px;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: fadeInUp 0.8s ease-out;
    }

    .welcome-message h2 i {
        -webkit-text-fill-color: initial;
        color: #00d4ff;
        margin-right: 10px;
    }

    .date-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        background: linear-gradient(145deg, #f8fafc, #eef2f6);
        padding: 10px 20px;
        border-radius: 50px;
        font-size: 0.95rem;
        color: var(--primary);
        font-weight: 600;
        box-shadow: inset 0 2px 5px rgba(0,0,0,0.02);
        border: 1px solid rgba(0,159,253,0.2);
        animation: slideInLeft 0.8s ease-out 0.2s both;
    }

    .date-badge i {
        color: var(--secondary);
        animation: spin 4s linear infinite;
    }

    /* Section Title - Daftar Operator */
    .section-title {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 25px;
        animation: fadeInUp 0.8s ease-out 0.3s both;
    }

    .section-title-icon {
        width: 50px;
        height: 50px;
        background: var(--gradient-primary);
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 22px;
        transform: rotate(0deg);
        transition: all 0.5s ease;
        animation: rotateIn 0.8s ease-out;
    }

    .section-title:hover .section-title-icon {
        transform: rotate(360deg);
    }

    .section-title h3 {
        font-size: 2rem;
        font-weight: 700;
        margin: 0;
        background: linear-gradient(145deg, #2a2a72, #1a1a2e);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        letter-spacing: 1px;
        position: relative;
    }

    /* Stats Cards */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 25px;
        margin-bottom: 40px;
        animation: fadeInUp 0.8s ease-out 0.4s both;
    }

    .stat-card {
        background: white;
        padding: 25px;
        border-radius: 20px;
        box-shadow: var(--shadow-sm);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .stat-card::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: linear-gradient(145deg, transparent, rgba(0,159,253,0.03));
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-10px) scale(1.02);
        box-shadow: var(--shadow-lg);
    }

    .stat-card:hover::after {
        opacity: 1;
    }

    .stat-label {
        font-size: 0.9rem;
        text-transform: uppercase;
        letter-spacing: 2px;
        color: #64748b;
        margin-bottom: 12px;
        display: flex;
        align-items: center;
        gap: 8px;
        font-weight: 600;
    }

    .stat-label i {
        color: var(--secondary);
        font-size: 1rem;
    }

    .stat-number {
        font-size: 3rem;
        font-weight: 800;
        line-height: 1;
        background: var(--gradient-primary);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        margin-bottom: 5px;
        animation: countUp 1s ease-out;
    }

    .stat-trend {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #10b981;
        font-size: 0.85rem;
        font-weight: 600;
        margin-top: 10px;
    }

    /* Table Container */
    .table-main-container {
        background: white;
        border-radius: 25px;
        padding: 30px;
        box-shadow: var(--shadow-md);
        animation: slideInUp 0.8s ease-out 0.6s both;
        position: relative;
        overflow: hidden;
    }

    .table-main-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: radial-gradient(circle at top right, rgba(0,159,253,0.02), transparent);
        pointer-events: none;
    }

    .table-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        flex-wrap: wrap;
        gap: 15px;
    }

    .table-title-section {
        display: flex;
        align-items: center;
        gap: 15px;
    }

    .table-icon {
        width: 45px;
        height: 45px;
        background: var(--gradient-primary);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        animation: pulse 2s infinite;
    }

    .table-title {
        margin: 0;
    }

    .table-title h4 {
        font-size: 1.3rem;
        font-weight: 700;
        margin: 0 0 5px 0;
        color: var(--dark);
    }

    .table-title small {
        color: #64748b;
        font-size: 0.9rem;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .record-badge {
        background: var(--gradient-primary);
        color: white;
        padding: 8px 18px;
        border-radius: 50px;
        font-size: 0.85rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 5px 15px rgba(42,42,114,0.3);
        animation: pulse 3s infinite;
    }

    /* Enhanced Table Design */
    .table-responsive {
        overflow-x: auto;
        border-radius: 15px;
        margin-bottom: 20px;
    }

    .table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0 8px;
        margin-bottom: 0;
    }

    .table thead th {
        background: linear-gradient(145deg, #f8fafc, #f1f5f9);
        padding: 18px 20px;
        font-weight: 700;
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        color: var(--primary);
        border: none;
        position: relative;
        text-align: left;
    }

    .table thead th:first-child {
        border-radius: 15px 0 0 15px;
        padding-left: 25px;
    }

    .table thead th:last-child {
        border-radius: 0 15px 15px 0;
        padding-right: 25px;
    }

    .table thead th i {
        margin-right: 8px;
        color: var(--secondary);
    }

    .table tbody tr {
        background: white;
        border-radius: 15px;
        transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 2px 10px rgba(0,0,0,0.02);
        animation: slideInRow 0.5s ease-out forwards;
        opacity: 0;
        transform: translateX(-10px);
    }

    .table tbody tr:hover {
        transform: translateY(-3px) scale(1.01);
        box-shadow: 0 15px 35px rgba(42,42,114,0.1);
        background: linear-gradient(to right, white, #f8fafc);
    }

    .table tbody td {
        padding: 18px 20px;
        vertical-align: middle;
        border: none;
        border-bottom: 1px solid #eef2f6;
    }

    .table tbody td:first-child {
        border-radius: 15px 0 0 15px;
        padding-left: 25px;
    }

    .table tbody td:last-child {
        border-radius: 0 15px 15px 0;
        padding-right: 25px;
    }

    /* Number Badge */
    .number-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 40px;
        height: 40px;
        background: linear-gradient(145deg, #2a2a72, #1a1a2e);
        color: white;
        font-weight: 700;
        border-radius: 12px;
        font-size: 1rem;
        box-shadow: 0 5px 15px rgba(42,42,114,0.3);
        transition: all 0.3s ease;
        animation: pulse 2s infinite;
    }

    .number-badge:hover {
        transform: rotate(360deg);
        background: var(--gradient-primary);
    }

    /* ID Badge */
    .id-container {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .id-label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 6px 14px;
        background: linear-gradient(145deg, #f1f5f9, #e2e8f0);
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        color: var(--dark);
        border: 1px solid rgba(0,159,253,0.2);
        transition: all 0.3s ease;
    }

    .id-label:hover {
        background: var(--gradient-primary);
        color: white;
        transform: translateY(-2px);
    }

    .id-label i {
        color: var(--secondary);
        transition: all 0.3s ease;
    }

    .id-label:hover i {
        color: white;
    }

    /* Email Style */
    .email-wrapper {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .email-avatar {
        width: 42px;
        height: 42px;
        background: var(--gradient-primary);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        transition: all 0.5s ease;
        position: relative;
        overflow: hidden;
    }

    .email-avatar::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(255,255,255,0.3), transparent);
        opacity: 0;
        transition: opacity 0.3s ease;
    }

    .email-avatar:hover {
        transform: scale(1.1) rotate(10deg);
    }

    .email-avatar:hover::before {
        opacity: 1;
        animation: rotate 4s linear infinite;
    }

    .email-link {
        color: var(--dark);
        text-decoration: none;
        font-weight: 500;
        font-size: 1rem;
        transition: all 0.3s ease;
        position: relative;
    }

    .email-link:hover {
        color: var(--secondary);
        text-decoration: none;
    }

    .email-link::after {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 0;
        width: 0;
        height: 2px;
        background: var(--gradient-primary);
        transition: width 0.3s ease;
    }

    .email-link:hover::after {
        width: 100%;
    }

    /* Role Badge */
    .role-badge {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 22px;
        background: linear-gradient(145deg, #00d4ff, #009ffd);
        color: white;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
        text-transform: capitalize;
        letter-spacing: 0.5px;
        box-shadow: 0 8px 20px rgba(0,159,253,0.3);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
        border: 1px solid rgba(255,255,255,0.3);
    }

    .role-badge::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
        animation: shine 2s infinite;
    }

    .role-badge:hover {
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 12px 30px rgba(0,159,253,0.5);
    }

    .role-badge i {
        font-size: 0.95rem;
        filter: drop-shadow(0 2px 3px rgba(0,0,0,0.2));
    }

    /* Action Buttons */
    .action-buttons {
        display: flex;
        gap: 10px;
    }

    .btn-edit, .btn-delete {
        width: 36px;
        height: 36px;
        border-radius: 10px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        text-decoration: none;
        border: none;
        cursor: pointer;
    }

    .btn-edit {
        background: linear-gradient(145deg, #4e73df, #224abe);
        color: white;
    }

    .btn-edit:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(78, 115, 223, 0.4);
    }

    .btn-delete {
        background: linear-gradient(145deg, #e74a3b, #c0392b);
        color: white;
    }

    .btn-delete:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px rgba(231, 74, 59, 0.4);
    }

    /* Footer */
    .table-footer {
        margin-top: 25px;
        padding-top: 20px;
        border-top: 2px dashed #e2e8f0;
        display: flex;
        justify-content: flex-end;
        align-items: center;
    }

    .last-updated {
        display: inline-flex;
        align-items: center;
        gap: 12px;
        background: linear-gradient(145deg, #f8fafc, #f1f5f9);
        padding: 10px 25px;
        border-radius: 50px;
        color: var(--primary);
        font-weight: 600;
        font-size: 0.9rem;
        border: 1px solid rgba(0,159,253,0.2);
        animation: pulse 3s infinite;
    }

    .last-updated i {
        color: var(--secondary);
        animation: spin 4s linear infinite;
    }

    /* Animations */
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideInDown {
        from {
            opacity: 0;
            transform: translateY(-30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideInRight {
        from {
            opacity: 0;
            transform: translateX(30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInLeft {
        from {
            opacity: 0;
            transform: translateX(-30px);
        }
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes slideInRow {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes expandWidth {
        from { width: 0; }
        to { width: 80px; }
    }

    @keyframes pulse {
        0%, 100% {
            transform: scale(1);
        }
        50% {
            transform: scale(1.05);
        }
    }

    @keyframes float {
        0%, 100% {
            transform: translateY(0);
        }
        50% {
            transform: translateY(-10px);
        }
    }

    @keyframes shine {
        0% {
            left: -100%;
        }
        20% {
            left: 100%;
        }
        100% {
            left: 100%;
        }
    }

    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes rotate {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }

    @keyframes rotateIn {
        from {
            opacity: 0;
            transform: rotate(-180deg) scale(0.3);
        }
        to {
            opacity: 1;
            transform: rotate(0) scale(1);
        }
    }

    @keyframes shimmer {
        0% {
            background-position: -100% 0;
        }
        100% {
            background-position: 200% 0;
        }
    }

    @keyframes countUp {
        0% {
            opacity: 0;
            transform: translateY(20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Row Animation Delays */
    .table tbody tr:nth-child(1) { animation-delay: 0.2s; }
    .table tbody tr:nth-child(2) { animation-delay: 0.4s; }
    .table tbody tr:nth-child(3) { animation-delay: 0.6s; }
    .table tbody tr:nth-child(4) { animation-delay: 0.8s; }
    .table tbody tr:nth-child(5) { animation-delay: 1s; }

    /* Responsive */
    @media (max-width: 768px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
        
        .brand-title {
            font-size: 2.2rem;
        }
        
        .welcome-message h2 {
            font-size: 1.3rem;
        }
        
        .section-title h3 {
            font-size: 1.5rem;
        }
        
        .table thead {
            display: none;
        }
        
        .table tbody tr {
            display: block;
            margin-bottom: 20px;
            border-radius: 15px;
            padding: 15px;
        }
        
        .table tbody td {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 15px;
            border-bottom: 1px solid #eef2f6;
        }
        
        .table tbody td:before {
            content: attr(data-label);
            font-weight: 700;
            color: var(--primary);
            margin-right: 15px;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 1px;
        }
        
        .table tbody td:first-child {
            padding-left: 15px;
        }
        
        .table tbody td:last-child {
            padding-right: 15px;
        }
        
        .action-buttons {
            justify-content: flex-end;
        }
    }
</style>

<div class="dashboard-container">
    <!-- Header / Brand -->
    <div class="brand-header">
        <h1 class="brand-title">
            <i class="fas fa-users-gear"></i> Operator Management
        </h1>
        <div class="date-badge">
            <i class="fas fa-calendar-alt"></i>
            <?= date('l, d F Y') ?>
            <i class="fas fa-clock ms-2"></i>
            <?= date('H:i') ?> WIB
        </div>
    </div>

    <!-- Welcome Card -->
    <div class="welcome-card">
        <div class="welcome-header">
            <div class="welcome-icon">
                <i class="fas fa-user-shield"></i>
            </div>
            <div class="welcome-message">
                <h2>
                    <i class="fas fa-hand-peace"></i> 
                    Selamat Datang, <?= session()->get('email') ?>
                </h2>
                <p style="color: #64748b; margin: 0;">
                    Kelola operator dan user yang memiliki akses ke sistem
                </p>
            </div>
        </div>
    </div>

    <!-- Section Title: Daftar Operator -->
    <div class="section-title">
        <div class="section-title-icon">
            <i class="fas fa-users"></i>
        </div>
        <h3>Daftar Operator & User</h3>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
        <!-- Total Operator -->
        <div class="stat-card">
            <div class="stat-label">
                <i class="fas fa-users"></i>
                TOTAL OPERATOR
            </div>
            <div class="stat-number"><?= $totalOperator ?? 0 ?></div>
            <div class="stat-trend">
                <i class="fas fa-users"></i>
                Terdaftar di sistem
            </div>
        </div>
        
        <!-- Total User Biasa -->
        <div class="stat-card">
            <div class="stat-label">
                <i class="fas fa-user"></i>
                TOTAL USER
            </div>
            <div class="stat-number"><?= ($totalOperator ?? 0) > 0 ? ($totalOperator - 1) : 0 ?></div>
            <div class="stat-trend" style="color: #64748b;">
                <i class="fas fa-user-check"></i>
                User biasa
            </div>
        </div>
    </div>

    <!-- Table Data Operator -->
    <div class="table-main-container">
        <div class="table-header">
            <div class="table-title-section">
                <div class="table-icon">
                    <i class="fas fa-database"></i>
                </div>
                <div class="table-title">
                    <h4>Data Operator & User</h4>
                    <small>
                        <i class="fas fa-info-circle"></i>
                        Daftar operator dan user yang terdaftar
                    </small>
                </div>
            </div>
            <div class="record-badge">
                <i class="fas fa-chart-bar"></i>
                <?= count($users) ?> Total Records
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th><i class="fas fa-id-card"></i> ID</th>
                        <th><i class="fas fa-envelope"></i> EMAIL</th>
                        <th><i class="fas fa-tag"></i> ROLE</th>
                        <th><i class="fas fa-cog"></i> AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach($users as $u): ?>
                    <tr>
                        <td data-label="ID">
                            <div class="id-container">
                                <span class="id-label">
                                    <i class="fas fa-id-badge"></i>
                                    <?= $u['id'] ?>
                                </span>
                            </div>
                        </td>
                        <td data-label="EMAIL">
                            <div class="email-wrapper">
                                <div class="email-avatar">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <a href="mailto:<?= $u['email'] ?>" class="email-link">
                                    <?= $u['email'] ?>
                                </a>
                            </div>
                        </td>
                        <td data-label="ROLE">
                            <span class="role-badge">
                                <i class="fas <?= $u['role'] == 'operator' ? 'fa-user-check' : 'fa-user' ?>"></i>
                                <?= ucfirst($u['role']) ?>
                            </span>
                        </td>
                        <td data-label="AKSI">
                            <div class="action-buttons">
                                <a href="<?= base_url('operator/edit/' . $u['id']) ?>" class="btn-edit" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button onclick="confirmDelete(<?= $u['id'] ?>)" class="btn-delete" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Footer: Last updated -->
        <div class="table-footer">
            <div class="last-updated">
                <i class="fas fa-clock"></i>
                Last updated: <?= date('H:i:s') ?>
                <i class="fas fa-sync-alt" style="animation: spin 2s linear infinite;"></i>
            </div>
        </div>
    </div>
</div>

<!-- Font Awesome 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<script>
function confirmDelete(id) {
    if (confirm('⚠️ Apakah Anda yakin ingin menghapus data ini?\n\nData yang dihapus tidak dapat dikembalikan!')) {
        window.location.href = '<?= base_url('operator/delete') ?>/' + id;
    }
}

// Add dynamic animations
document.addEventListener('DOMContentLoaded', function() {
    // Animate stat numbers
    const statNumbers = document.querySelectorAll('.stat-number');
    statNumbers.forEach(number => {
        number.style.animation = 'countUp 1s ease-out';
    });
    
    // Add hover effect to table rows
    const rows = document.querySelectorAll('tbody tr');
    rows.forEach((row, index) => {
        row.style.animationDelay = (index * 0.2) + 's';
        
        row.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px) scale(1.01)';
        });
        
        row.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0) scale(1)';
        });
    });
    
    // Animate welcome icon
    const welcomeIcon = document.querySelector('.welcome-icon');
    if(welcomeIcon) {
        setInterval(() => {
            welcomeIcon.style.animation = 'pulse 2s infinite, float 3s ease-in-out infinite';
        }, 100);
    }
});
</script>

<?= $this->endSection() ?>