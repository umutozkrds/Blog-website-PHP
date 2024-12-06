<?php 
include('register_process.php');
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
              <h5 class="card-title text-center mb-4">Kayıt Ol</h5>

              <!-- Hata mesajı kutusu -->
              <div id="errorAlert" class="alert alert-danger d-none" role="alert">
                <!-- Hata mesajı buraya yazılacak -->
              </div>

              <!-- Başarı mesajı kutusu -->
              <div id="successAlert" class="alert alert-success d-none" role="alert">
                <!-- Başarı mesajı buraya yazılacak -->
              </div>

              <form id="registerForm">
                <div class="mb-3">
                  <label for="username" class="form-label">Kullanıcı adı</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Kullanıcı adınız" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">E-posta</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="E-posta adresiniz" required>
                </div>
                <div class="mb-3">
                  <label for="password" class="form-label">Şifre</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Şifreniz" required>
                </div>
                <div class="mb-3">
                  <label for="password_confirm" class="form-label">Şifreyi Tekrarla</label>
                  <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Şifrenizi tekrar girin" required>
                </div>
                <div class="d-grid">
                  <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                </div>
              </form>
              <p class="mt-3 text-center">Zaten hesabınız var mı? <a href="login.html">Giriş Yap</a></p>
            </div>
          </div>
        </div>
      </div>
    </div>

  <script>
    document.getElementById('registerForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Formun varsayılan gönderimini engelle

    // Şifreleri al
    const password = document.getElementById('password').value;
    const passwordConfirm = document.getElementById('password_confirm').value;

    // Şifre kontrolü
    if (password !== passwordConfirm) {
      const errorAlert = document.getElementById('errorAlert');
      errorAlert.classList.remove('d-none');
      errorAlert.textContent = 'Şifreler uyuşmuyor. Lütfen tekrar deneyin.';

      // 5 saniye sonra hata mesajını gizle
      setTimeout(() => {
        errorAlert.classList.add('d-none');
      }, 5000);
      return; // İşlem durdurulur
    }

    // Form verilerini al
    const formData = new FormData(this);

    // PHP'ye gönder
    fetch('register_process.php', {
      method: 'POST',
      body: formData
    })
      .then(response => response.json()) // JSON olarak yanıt al
      .then(data => {
        const errorAlert = document.getElementById('errorAlert');
        const successAlert = document.getElementById('successAlert');

        if (data.success) {
          // Başarı mesajı
          errorAlert.classList.add('d-none');
          successAlert.classList.remove('d-none');
          successAlert.textContent = data.message;

          // Formu temizle
          document.getElementById('registerForm').reset();

          // 5 saniye sonra başarı mesajını gizle
          setTimeout(() => {
            successAlert.classList.add('d-none');
          }, 5000);
        } else {
          // Hata mesajı
          successAlert.classList.add('d-none');
          errorAlert.classList.remove('d-none');
          errorAlert.textContent = data.message;

          // 5 saniye sonra hata mesajını gizle
          setTimeout(() => {
            errorAlert.classList.add('d-none');
          }, 5000);
        }
      })
      .catch(error => {
        const errorAlert = document.getElementById('errorAlert');
        errorAlert.classList.remove('d-none');
        errorAlert.textContent = 'Bir hata oluştu: ' + error.message;

        setTimeout(() => {
          errorAlert.classList.add('d-none');
        }, 5000);
      });
  });
  </script>
</body>
</html>
