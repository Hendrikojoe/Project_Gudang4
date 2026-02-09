<?=$this->extend("layout")?>
<?=$this->section("content")?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

</head>

<style>
  body {
    background-color: #2f2f2f;
    font-family: 'Poppins', sans-serif;
    margin: 0;
  }

  .wrapper {
    display: flex;
    justify-content: center;
    align-items: center;
    min-height: 100vh;
  }

  .card-register {
    display: flex;
    width: 850px;
    border-radius: 12px;
    overflow: hidden;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
  }

  .register-left {
    background: #009fa5;
    color: #fff;
    flex: 1;
    padding: 60px 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .register-right {
    background: #fff;
    flex: 1;
    padding: 60px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  .btn-teal {
    background: #009fa5;
    border: none;
  }

  .btn-teal:hover {
    background: #00818a;
  }
</style>

<div class="wrapper">
  <div class="card-register">
    <div class="register-left">
      <h2>Selamat Datang!</h2>
      <p class="mt-2">Masuk dengan akun anda jika sudah terdaftar</p>
      <a href="<?= base_url('/login'); ?>" class="btn btn-outline-light mt-3">SIGN IN</a>
    </div>

    <div class="register-right">
      <h3 class="fw-bold mb-4">Buat Akun</h3>

      <?php if(isset($validation)):?>
        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
      <?php endif;?>

      <form action="<?= base_url('/register/save'); ?>" method="post">
        <div class="mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" value="<?= set_value('email') ?>" required>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Konfirmasi Password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-teal w-100 text-white">DAFTAR</button>
      </form>
    </div>
  </div>
</div>

<?=$this->endSection()?>
