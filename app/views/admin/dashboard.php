<?php
$cars = $data['cars'];
$orders = $data['orders'];
$drivers = $data['drivers'];
$penalties = $data['penalties'];
// var_dump($data);
// echo "<hr>";
// var_dump($cars);
// echo "<hr>";
// var_dump($orders);
// echo "<hr>";
// var_dump($drivers);
// echo "<hr>";
// var_dump($penalties);
?>

<section class="card border-light-subtle shadow-sm">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <h1 style="font-weight: bold;">Dashboard Admin</h1>
            <hr>
            <div class="d-grid gap-3">
                <a href="<?= BASEURL ?>/admin/orders/index" class="btn btn-outline-dark btn-lg">Orders</a>
                <a href="<?= BASEURL ?>/admin/penalties/index" class="btn btn-outline-dark btn-lg">Penalties</a>
                <a href="<?= BASEURL ?>/admin/drivers/index" class="btn btn-outline-dark btn-lg">Drivers</a>
                <a href="<?= BASEURL ?>/admin/cars/index" class="btn btn-outline-dark btn-lg">Cars</a>
            </div>
            <hr>
        </div>
    </div>
</section>
