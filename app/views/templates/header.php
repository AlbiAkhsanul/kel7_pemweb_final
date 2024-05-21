<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title']; ?></title>
  <!-- CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus Jakarta Sans:wght@400;600;700&display=swap" />
  <link rel="stylesheet" href="<?= BASEURL; ?>/css/styles.css" >
</head>

<body>

  <!-- <nav class="header">
      <div class="logo-lock-up">
          <img class="logo-icon" alt="Logo" src="<?= BASEURL; ?>/src/logobrand.svg"> -->
          <!-- <div class="rentacarcom-parent">
              <div class="rentacarcom">RentACar.com</div>
              <div class="travel-easily">Travel easily.</div>
          </div> -->
      <!-- </div>
      <div class="account">
          <div class="masuk-daftar">Masuk  |  Daftar</div>
      </div>
      <div class="mendaftar-mitra-parent">
          <a class="mendaftar-mitra">Mendaftar Mitra</a>
          <a class="mendaftar-mitra">Transaksi</a>
          <a class="mendaftar-mitra">Bantuan</a>
          <a class="mendaftar-mitra">Laporkan Masalah</a>
      </div>
  </nav> -->
  <!-- <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <a class="navbar-brand " href="<?= BASEURL; ?>">PHP MVC</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <?php switch ($data['activePage']):
            case 1: ?>
              <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>">Home</a>
              <a class="nav-link active" href="<?= BASEURL; ?>/about">About</a>
              <a class="nav-link" href="<?= BASEURL; ?>/students">Students</a>
              <?php break;
            case 2: ?>
              <a class="nav-link" aria-current="page" href="<?= BASEURL; ?>">Home</a>
              <a class="nav-link" href="<?= BASEURL; ?>/about">About</a>
              <a class="nav-link active" href="<?= BASEURL; ?>/students">Students</a>
              <?php break;
            default: ?>
              <a class="nav-link active" aria-current="page" href="<?= BASEURL; ?>">Home</a>
              <a class="nav-link" href="<?= BASEURL; ?>/about">About</a>
              <a class="nav-link" href="<?= BASEURL; ?>/students">Students</a>
          <?php endswitch; ?>
        </div>
      </div>
    </div>
  </nav> -->

  <header class="p-3 text-bg-dark">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
        <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
          <img class="bi me-2" width="213" height="48" alt="Logo" src="<?= BASEURL; ?>/src/logobrand.svg">
        </a>
        <ul class="nav col-12 col-lg-auto ms-auto me-4 mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-white">Mendaftar Mitra</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Transaksi</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Bantuan</a></li>
          <li><a href="#" class="nav-link px-2 text-white">Laporkan Masalah</a></li>
          <!-- <li><a href="#" class="nav-link px-2 text-white">About</a></li> -->
        </ul>

        <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
          <input type="search" class="form-control form-control-dark text-bg-dark" placeholder="Search..." aria-label="Search">
        </form> -->

        <div class="text-end">
          <button type="button" class="btn btn-outline-light me-2">Masuk | Daftar</button>
          <!-- <button type="button" class="btn btn-warning">Sign-up</button> -->
        </div>
      </div>
    </div>
  </header>
