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

  .card-register {
    display: flex;
    width: 850px;
    border-radius: 12px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.25);
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
    flex: 1;
    padding: 60px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
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
  <div class="card-register">
    <div class="register-left">
      <h2>Halo!</h2>
      <p class="mt-2 text-center">Sudah punya akun? Silakan masuk sekarang.</p>
      <a href="<?= base_url('/login'); ?>" class="btn btn-outline-light mt-3">SIGN IN</a>
    </div>

    <div class="register-right">
      <h3 class="fw-bold mb-4 text-dark">Buat Akun Baru</h3>

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

      <a href="<?= base_url('/') ?>" class="back-btn">
        ← Kembali ke Beranda
      </a>
    </div>
  </div>
</div>

<?=$this->endSection()?>
