<!DOCTYPE html>
<html>
<head>
    <title>Admin Gudang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">Admin Gudang</span>

        <div>
            <a href="/dashboard" class="btn btn-sm btn-light">Dashboard</a>
            <a href="/barang" class="btn btn-sm btn-light">Barang</a>
            <a href="/logout" class="btn btn-sm btn-danger">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?= $this->renderSection('content') ?>
</div>

</body>
</html>