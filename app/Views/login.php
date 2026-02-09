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
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
  }

  .login-left {
    background: #fff;
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
  }

  .btn-teal:hover {
    background: #00818a;
  }

  .social-icons i {
    font-size: 22px;
    margin: 0 10px;
    color: #555;
    cursor: pointer;
  }
</style>

<div class="wrapper">
  <div class="card-login">
    <div class="login-left">
      <h3 class="fw-bold mb-4">Sign In</h3>

      <?php if(session()->getFlashdata('error')):?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
      <?php endif;?>

      <div class="social-icons mb-3">
        <i class="bi bi-facebook"></i>
        <i class="bi bi-google"></i>
        <i class="bi bi-linkedin"></i>
      </div>

      <p class="text-muted small mb-4">Atau gunakan akun anda</p>

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
    </div>

    <div class="login-right">
      <h2>Halo, Teman!</h2>
      <p class="mt-2">Daftarkan diri anda dan mulai gunakan layanan kami segera</p>
      <a href="<?= base_url('/register'); ?>" class="btn btn-outline-light mt-3">SIGN UP</a>
    </div>
  </div>
</div>

<?=$this->endSection()?>
