<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $data['title']; ?></title>
  <!-- CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <!-- Main Style -->
  <link rel="stylesheet" href="<?= BASEURL ?>/css/main.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Plus Jakarta Sans:wght@400;600;700&display=swap" />
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://fontawesome.com/v4.7.0/assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="../styles.css" >
</head>

<body>
    <style>
        header {
            width: 100%;
            position: sticky;
            top: 0;
            z-index: 99;
        }

        .text-end .btn {
            border-radius: 20px;
        }

        .nav ul:hover {
            color: white;
        }
        
        .text-end.d-flex {
            justify-content: flex-end;
            align-items: center;
        }

        body {
            margin: 0;
            line-height: normal;
            color: #eaecee;
            background-color: #121212;
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
            position: relative; /* Make sure body is positioned */
        }
        
        body::before {
            content: "";
            background-image: url('<?= BASEURL ?>/properties/2024cx5.png') !important;
            background-position: no-repeat center center;
            background-size: cover;
            opacity: 0.5;
            position: fixed; /* Fixes the background relative to the viewport */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1; /* Places the pseudo-element behind the body content */
        }
    </style>
<header class="p-3 text-bg-dark">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start navbar-fixed-top">
            <a href="" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img class="bi me-2" width="213" height="48" alt="Logo" src="<?= BASEURL ?>/properties/logobrand.svg">
            </a>
            <ul class="nav col-12 col-lg-auto ms-auto me-4 mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 text-white">Home</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Tentang Kami</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Mobil</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Pricing</a></li>
                <li><a href="#" class="nav-link px-2 text-white">Bantuan</a></li>
            </ul>
            <?php if (isset($_SESSION['login']) && $_SESSION['login'] == true):?>
            <div class="text-end d-flex align-items-center">
                <a href="#" class="nav-link px-2 text-white me-2">
                    <img width="32" height="32"  alt="user" style="border-radius: 24px;" src="<?= BASEURL ?>/properties/user.png">
                    <a href="#" class="mb-0"> Welcome!</a>
                </a>
                <!-- <p> Welcome, <?php // htmlspecialchars($user['nama_user'])?></p> -->
            </div>  
            <?php else: ?>
            <div class="text-end">
                <button type="button" onclick="window.location.href='<?= BASEURL ?>/auth/login'" class="btn btn-outline-light me-2">Masuk</button>
                <button type="button" onclick="window.location.href='<?= BASEURL ?>/auth/register'" class="btn btn-outline-light me-2">Daftar</button>
            </div>
            <?php endif; ?>
        </div>
    </div>
</header>