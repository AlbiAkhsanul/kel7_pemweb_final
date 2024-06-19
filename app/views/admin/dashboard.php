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
<h1>
    Ini Halaman Dashboard Admin
</h1>

<ul>
    <hr>
    <a href="<?= BASEURL ?>/admin/orders/index">
        <h3>
            Orders
        </h3>
    </a>
    <hr>
    <hr>
    <a href="<?= BASEURL ?>/admin/penalties/index">
        <h3>
            Penalties
        </h3>
    </a>
    <hr>
    <hr>
    <a href="<?= BASEURL ?>/admin/drivers/index">
        <h3>
            Drivers
        </h3>
    </a>
    <hr>
    <hr>
    <a href="<?= BASEURL ?>/admin/cars/index">
        <h3>
            Cars
        </h3>
    </a>
    <hr>
    <hr>
</ul>