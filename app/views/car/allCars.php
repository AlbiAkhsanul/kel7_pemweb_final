<?php
$cars = $data['cars'];
?>

<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= BASEURL ?>/css/main.css">
<link rel="stylesheet" href="<?= BASEURL ?>/css/allCars.css">
<script src="<?= BASEURL; ?>/js/allCars.js"></script>

<section id="listmobil-bg">
    <div class="container col-xl-1 0 col-xxl-12 py-5">
        <div class="row">
            <aside class="col-md-3">
                <div class="card">
                    <article class="filter-group">
                        <div class="filter-content collapse show" id="collapse_1">
                            <div class="card-body">
                                <form class="pb-3">
                                <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-light" type="button"><i class="fa fa-search"></i></button>
                                </div>
                                </div>
                                </form>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group  .// -->
                    <article class="filter-group">
                        <header class="card-header d-flex justify-content-center align-items-center">
                            <a>
                                <h6 class="title mb-0">Brands </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_2">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Toyota
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Honda
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Nissan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Suzuki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Ford
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Daihatsu
                                    </label>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->
                    <article class="filter-group">
                        <header class="card-header d-flex justify-content-center align-items-center">
                            <a>
                                <h6 class="title mb-0">Jenis </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_2">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        MPV
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        SUV
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Hatchback
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        LMPV
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Sedan
                                    </label>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->
                    <article class="filter-group">
                        <header class="card-header d-flex justify-content-center align-items-center">
                            <a>
                                <h6 class="title">Transmisi </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_5">
                            <div class="card-body">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Manual
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="">
                                    <label class="form-check-label">
                                        Matic
                                    </label>
                                </div>
                            </div> <!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->
                    <article class="filter-group">
                        <header class="card-header d-flex justify-content-center align-items-center">
                            <a>
                                <h6 class="title">Price range </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse_3">
                            <div class="card-body">
                                <input type="range" class="custom-range w-100" min="0" max="10000" id="price-slider" step="100">
                                <div class="form-row d-flex">
                                    <div class="form-group col-md-5">
                                        <label>Min</label>
                                        <input class="form-control" id="min-price" placeholder="$0" type="number" readonly>
                                    </div>
                                    <div class="form-group col-md-5 max">
                                        <label>Max</label>
                                        <input class="form-control" id="max-price" placeholder="$10000" type="number" readonly>
                                    </div>
                                </div> <!-- form-row.// -->
                            </div><!-- card-body.// -->
                        </div>
                    </article> <!-- filter-group .// -->
                    <article class="filter-group">
                        <div class="filter-content collapse show" id="collapse_1">
                            <div class="card-body">
                                <form class="pb-2">
                                    <button class="btn btn-block btn-primary mt-2 d-flex apply-button">Apply</button>
                                </form>
                            </div> <!-- card-body.// -->
                        </div>
                    </article>
                </div> <!-- card.// -->
            </aside>
            <main class="col-md-9">
                <header class="border-bottom mb-4 pb-3">
                        <div class="form-inline d-flex justify-content-between align-items-center">
                            <span class="mr-md-auto">Periode Sewa: <?= $_SESSION['tanggal_sewa'] ?> - <?= $_SESSION['tanggal_kembali_sewa'] ?> [<?= $_SESSION['durasi_sewa'] ?> Hari. </span>
                            <span class="mr-md-auto">32 Items found </span>
                            <div class="dropdown sort">
                                <a class="btn btn-light dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Sort by
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end mt-1">
                                <li><a class="dropdown-item" href="#">A - Z</a></li>
                                <li><a class="dropdown-item" href="#">Z - A</a></li>
                                <li><a class="dropdown-item" href="#">Lorem ipsum</a></li>
                                </ul>
                            </div>
                        </div>
                </header><!-- sect-heading -->
                <div class="row">
                    <?php if ($cars) : ?>
                        <?php foreach ($cars as $car) : ?>
                            <div class="col-md-4">
                                <div class="car-wrap rounded ftco-animate fade-in-up" style="visibility: visible;">
                                    <div class="d-flex align-items-end img-fluid">
                                        <img class="img rounded" src="<?= BASEURL ?>/img/cars/<?= $car["foto_mobil"]; ?>" alt="FotoMobil">
                                    </div>
                                    <div class="text">
                                        <h2 class="cat d-flex align-items-center"><a href="#!"><?= $car['nama_mobil'] ?></a></h2>
                                        <div class="d-flex mb-3 align-items-center">
                                            <span class="cat"><?= $car['jenis_mobil'] ?></span>
                                        </div>
                                        <p class="d-flex mb-0 d-block"><a onclick="window.location.href='<?= BASEURL ?>/order/create/<?= $data['car']['car_id'] ?>'" class="btn btn-primary py-2 ms-1 me-2">Book now</a> <a onclick="window.location.href='<?= BASEURL ?>/car/show/<?= $car['car_id'] ?>'" class="btn btn-secondary py-2">Details</a></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <li>
                            <h5>
                                Tidak Ada Mobil Saat Ini
                            </h5>
                        </li>
                    <?php endif ?>
                </div> <!-- row end.// -->
                
                
                <nav class="mt-4" aria-label="Page navigation sample">
                <ul class="pagination">
                    <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
                </nav>
            </main>
        </div>
    </div>
</section>

