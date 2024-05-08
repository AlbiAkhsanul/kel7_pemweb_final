<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$data['title'];?>page</title>
    <!-- CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container">
    <a class="navbar-brand " href="<?=BASEURL;?>">PHP MVC</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <?php switch ($data['activePage']) : 
          case 1 :?>
          <a class="nav-link" aria-current="page" href="<?=BASEURL;?>">Home</a>
          <a class="nav-link active" href="<?=BASEURL;?>/about">About</a>
          <a class="nav-link" href="<?=BASEURL;?>/students">Students</a>
          <?php break;?>
          <?php case 2 : ?>
          <a class="nav-link" aria-current="page" href="<?=BASEURL;?>">Home</a>
          <a class="nav-link" href="<?=BASEURL;?>/about">About</a>
          <a class="nav-link active" href="<?=BASEURL;?>/students">Students</a>
          <?php break;?>
          <?php default : ?>
          <a class="nav-link active" aria-current="page" href="<?=BASEURL;?>">Home</a>
          <a class="nav-link" href="<?=BASEURL;?>/about">About</a>
          <a class="nav-link" href="<?=BASEURL;?>/students">Students</a>
       <?php endswitch;?>
      </div>
    </div>
  </div>
</nav>