<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-4">
    <h3>User Dashboard</h3>

    <div class="alert alert-info">
        Selamat datang <b><?= session('email') ?></b>
    </div>

    <div class="card">
        <div class="card-body">
            Anda login sebagai <b>USER</b>.
            <br>
            Anda hanya dapat melihat informasi dashboard.
        </div>
    </div>

    <a href="/logout" class="btn btn-danger mt-3">Logout</a>
</div>

</body>
</html>