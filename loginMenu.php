<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand" href="index.php">ComLog</a>
    <!-- Hamburger Menüsü -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Menü Öğeleri -->
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" href="index.php">Ana Sayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">Hakkımızda</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Hizmetler
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Hizmet 1</a></li>
            <li><a class="dropdown-item" href="#">Hizmet 2</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Hizmet 3</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">İletişim</a>
        </li>
      </ul>
      <form class="d-flex me-2">
        <input class="form-control me-2" type="search" placeholder="Ara" aria-label="Search">
        <button class="btn btn-outline-light" type="submit">Ara</button>
      </form>
      <a class="btn btn-danger" href="logout.php">Çıkış Yap</a>
    </div>
  </div>
</nav>
