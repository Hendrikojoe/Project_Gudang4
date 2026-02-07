<!DOCTYPE html>
<html>
<head>
    <title>Admin Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            min-height: 100vh;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #343a40;
            color: #fff;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
            display: block;
            padding: 10px 20px;
        }
        .sidebar a:hover {
            background-color: #495057;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar flex-shrink-0 p-3">
        <h4 class="text-center mb-4">Admin Gudang</h4>
        <a href="/admin/dashboard">Dashboard</a>
        <a href="/barang">Barang</a>
        <a href="/supplier">Supplier</a>
        <a href="/transaksi">Transaksi</a>
        <a href="/user">User</a>
        <a href="/logout" class="mt-4 btn btn-danger w-100">Logout</a>
    </div>

    <!-- Main content -->
    <div class="content flex-grow-1">
        <?= $this->renderSection('content') ?>
    </div>
</div>
</body>
</html>