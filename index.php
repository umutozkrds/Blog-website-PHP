<?php
session_start()
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ana Sayfa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>
    <?php  
    if (!isset($_SESSION['username'])) {
      include("menu.php");
      }
      else {
        include("loginMenu.php");
      }
      ?>
    

    <!-- Hero/Banner Section -->
    <div class="bg-light py-5">
      <div class="container text-center">
      <?php if (!isset($_SESSION['username'])) { ?> 
            <h1>Yeni bir sayfa, yeni bir hayat</h1>
      <?php }  else {?>
            <h1>Hoş Geldiniz <?php echo $_SESSION['username']; ?></h1>
      <?php } ?>
        <p class="lead">Bu, sade ve başlangıç odaklı bir Bootstrap ana sayfa düzenidir. Kolayca özelleştirebilirsiniz.</p>
        <a href="#" class="btn btn-primary btn-lg">Keşfet</a>
      </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-light py-3">
      <div class="container text-center">
        <p class="mb-0">&copy; 2024 WebSitem. Tüm hakları saklıdır.</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>