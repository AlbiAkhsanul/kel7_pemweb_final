<!-- <h1>
    Ini Halaman Detail Car
</h1>
<?php
$cars = $data['car'];
// var_dump($data['car']); ?>
<hr>
<?php if ($data['car']['status_mobil'] === 1) : ?>
    <a href="<?= BASEURL ?>/order/create/<?= $data['car']['car_id'] ?>">
        <button>
            Buat Order
        </button>
    </a>
<?php endif ?> -->

<link rel="stylesheet" href="<?= BASEURL ?>/css/main.css">
<link rel="stylesheet" href="<?= BASEURL ?>/css/allCars.css">
<script src="<?= BASEURL; ?>/js/allCars.js"></script>

<style>
.container-car {
    margin: 20px auto;
    max-width: 1280px;
    min-width: auto;
    background-color: rgb(255,255,255,0.6);
    padding: 0;
    border-radius: 20px;
    margin-top: 32px;
    margin-bottom: 32px;
}

.form-control {
    height: 25px;
    width: 150px;
    border: none;
    border-radius: 0;
    font-weight: 800;
    padding: 0 0 5px 0;
    background-color: transparent;
    box-shadow: none;
    outline: none;
    border-bottom: 2px solid #ccc;
    margin: 0;
    font-size: 14px;
}

.form-control:focus {
    box-shadow: none;
    border-bottom: 2px solid #ccc;
    background-color: transparent;
}

.row .details {
    color: #121212;
}

.row .bg-light {
    border-radius: 20px;
}

p {
    margin: 0;
}

img {
    width: 100%;
    height: 100%;
    object-fit: fill;
}

.text-muted {
    font-size: 10px;
}

.h5 .detail {
    font-size: 13px;
}

.fs-14 {
    font-size: 14px;
}

.btn.btn-primary {
    width: 50%;
    height: 55px;
    border-radius: 20px;
    padding: 13px 0;
    background-color: black;
    border: none;
    margin-left: 5px;
}

.btn.btn-primary:hover .fas {
    transform: translateX(10px);
    transition: transform 0.5s ease
}


.fw-900 {
    font-weight: 900;
}

::placeholder {
    font-size: 12px;
}

.ps-30 {
    padding-left: 30px;
}

.h4 {
    font-weight: 800 !important;
}

</style>

<body>

<div class="container-car">
    <div class="row m-0">
        <div class="col-lg-7 pb-5 pe-lg-5">
            <div class="row">
                <div class="col-12 p-5">
                    <img src="<?= BASEURL ?>/img/cars/<?= $cars["foto_mobil"]; ?>"
                        alt="">
                </div>
            </div>
        </div>
        <div class="col-lg-5 p-0 ps-lg-4">
            <div class="row details m-0">
                <div class="col-12 px-4">
                    <div class="d-flex align-items-end mt-4 mb-2">
                        <p class="h4 m-0"><span class="pe-1">Detail Mobil</span>
                    </div>
                    <div class="row m-0 bg-light">
                        <div class="col-md-4 col-6 ps-30 pe-0 my-4">
                            <p class="textmuted">Merek & Model</p>
                            <p class="h5 detail"><?= $cars['car_brand']?> <?= $cars['nama_mobil'] ?></p>
                        </div>
                        <div class="col-md-4 col-6  ps-30 my-4">
                            <p class="textmuted">Transmisi</p>
                            <p class="h5 detail m-0"><?= $cars['tipe_transmisi'] ?></p>
                        </div>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="textmuted">Jenis</p>
                            <p class="h5 detail m-0"><?= $cars['jenis_mobil'] ?></p>
                        </div>
                        <?php if ($cars['status_mobil'] === 1) :?>
                            <div class="col-md-4 col-6 ps-30 my-4">
                                <p class="textmuted">Status</p>
                                <p class="h5 detail m-0">Tersedia</p>
                            </div>
                        <?php else : ?>
                            <div class="col-md-4 col-6 ps-30 my-4">
                                <p class="textmuted">Status</p>
                                <p class="h5 detail m-0">Tidak Tersedia</p>
                            </div>
                        <?php endif ?>
                        <div class="col-md-4 col-6 ps-30 my-4">
                            <p class="textmuted">Harga</p>
                            <p class="h5 detail m-0 fw-bold"><?= $cars['harga_sewa'] ?></p><span class="d-flex text-muted">/hari</span>
                        </div>
                    </div>
                </div>
                <div class="row m-0">
                    <div class="col-12 mb-4 p-2">
                    <?php if ($data['car']['status_mobil'] === 1) : ?>
                        <div class="btn btn-primary" onclick="window.location.href='<?= BASEURL ?>/order/create/<?= $cars['car_id'] ?>'">Order Sekarang</span>
                        </div>
                    <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>