<?=$this->extend("layout")?>
<?=$this->section("content")?>

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

  .card-login {
    display: flex;
    width: 850px;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
  }

  .login-left {
    flex: 1;
    padding: 50px 40px;
  }

  .login-right {
    background: #009fa5;
    color: #fff;
    flex: 1;
    padding: 50px 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
  }

  .btn-teal {
    background: #009fa5;
    border: none;
    transition: 0.3s;
  }

  .btn-teal:hover {
    background: #007b82;
  }

  .btn-outline-light:hover {
    color: #009fa5 !important;
    background: #fff !important;
    border-color: #fff !important;
  }

  .back-btn {
    display: block;
    text-align: center;
    margin-top: 20px;
    color: #555;
    text-decoration: none;
    font-size: 14px;
  }

  .back-btn:hover {
    color: #009fa5;
  }
</style>

<div class="wrapper">
  <div class="card-login">
    <div class="login-left">
      <h3 class="fw-bold mb-4 text-dark">Masuk Akun</h3>

      <?php if(session()->getFlashdata('error')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif;?>

      <form action="<?= base_url('/login/authenticate'); ?>" method="post">
        <div class="mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" placeholder="Password" name="password" required>
        </div>
        <a href="#" class="small text-muted d-block mb-3">Lupa kata sandi?</a>
        <button type="submit" class="btn btn-teal w-100 text-white">SIGN IN</button>
      </form>

      <a href="<?= base_url('/') ?>" class="back-btn">
        ← Kembali ke Beranda
      </a>
    </div>

    <div class="login-right">
      <h2>Selamat Datang!</h2>
      <p class="mt-2 text-center">Belum punya akun? Daftar sekarang dan nikmati layanan kami.</p>
      <a href="<?= base_url('/register'); ?>" class="btn btn-outline-light mt-3">SIGN UP</a>
    </div>
  </div>
</div>

<?=$this->endSection()?>
