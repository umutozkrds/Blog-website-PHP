<?php
include("login_process.php");
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php include 'menu.php'; ?> <!-- Menü Dahil Ediliyor -->

    <div class="container">
      <div class="row justify-content-center align-items-center vh-100">
        <div class="col-12 col-md-6 col-lg-4">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title text-center mb-4">Giriş Yap</h5>

              <!-- Hata Mesajı -->
              <?php if (!empty($loginError)): ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo $loginError; ?>
                </div>
              <?php endif; ?>

              <!-- Başarı Mesajı -->
              <?php if (!empty($loginSuccess)): ?>
                <div class="alert alert-success" role="alert">
                  <?php echo $loginSuccess; ?>
                </div>
              <?php endif; ?>

              <form method="POST">
                <div class="mb-3">
                  <label for="email" class="form-label">E-posta</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="E-posta adresiniz" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Şifre</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Şifreniz" required>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Giriş Yap</button>
                </div>
              </form>
              <p class="mt-3 text-center">Hesabınız yok mu? <a href="register.php">Kayıt Ol</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

