<?php
$order = $data['order'];
$penalties = $data['penalties'];
$car = $data['car'];
?>
<!-- <h1>
    Ini Halaman Detail Orders
</h1> -->

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-12">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="image col-12 col-md-6 text-center" style="margin-top: 100px; padding-left: 100px;">
                            <img class="img rounded" style="width: auto; height: auto;" loading="lazy" src="<?= BASEURL ?>/img/cars/<?= $car["foto_mobil"]; ?>" alt="foto_mobil">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <h4 class="text-center">Order Details</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="car_brand" class="form-label">Merek :</label>
                                            <div class="ms-auto">
                                                <?= $car['car_brand'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="nama_mobil">Model :</label>
                                            <div class="ms-auto">
                                                <?= $car['nama_mobil'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="jenis_mobil">Jenis Mobil:</label>
                                            <div class="ms-auto">
                                                <?= $car['jenis_mobil'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="tipe_transmisi">Tipe Transmisi:</label>
                                            <div class="ms-auto">
                                                <?= $car['tipe_transmisi'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="total_harga">Total Harga:</label>
                                            <div class="ms-auto">
                                                <?= $order['total_harga'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="tanggal_sewa">Tanggal Sewa:</label>
                                            <div class="ms-auto">
                                                <?= $order['tanggal_sewa'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="tanggal_kembali">Tanggal Kembali:</label>
                                            <div class="ms-auto">
                                                <?= $order['tanggal_kembali_sewa'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="durasi_sewa">Durasi Sewa:</label>
                                            <div class="ms-auto">
                                                <?= $order['durasi_sewa'] ?> Hari
                                            </div>
                                        </div>
                                        <?php if ($order['driver_id'] == 0) : ?>
                                            <div class="col-12 d-flex justify-content-between">
                                                <label for="tipe_sewa">Tipe Sewa:</label>
                                                <div class="ms-auto">
                                                    Tanpa Supir
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="col-12 d-flex justify-content-between">
                                                <label for="tipe_sewa">Tipe Sewa:</label>
                                                <div class="ms-auto">
                                                    Dengan Supir
                                                </div>
                                            </div>
                                        <?php endif ?>
                                        <h3 class="mt-4">List Penalties</h3>
                                        <ul class="list-group">
                                            <?php if (!$penalties) : ?>
                                                <li class="list-group-item">
                                                    <h5>
                                                        Tidak Ada Penalty Untuk Order Ini
                                                    </h5>
                                                </li>
                                            <?php else : ?>
                                                <?php foreach ($penalties as $penalty) : ?>
                                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                                        <div>
                                                            <h5>
                                                                <?= $penalty['jenis_penalty'] ?> [<?= $penalty['status_penalty'] ?>]
                                                            </h5>
                                                            <a href="<?= BASEURL ?>/penalty/show/<?= $penalty['penalty_id'] ?>">View Details</a>
                                                        </div>
                                                        <?php if ($_SESSION['is_admin'] === 1) : ?>
                                                            <div>
                                                                <a href="<?= BASEURL ?>/penalty/action/<?= $penalty['penalty_id'] ?>" class="btn btn-warning btn-sm">Action</a>
                                                                <a href="<?= BASEURL ?>/penalty/edit/<?= $penalty['penalty_id'] ?>" class="btn btn-info btn-sm">Edit Penalty</a>
                                                            </div>
                                                        <?php endif ?>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif ?>
                                        </ul>
                                    </div>
                                    <hr>
                                    <?php if ($_SESSION['is_admin'] === 1 && ($order['status_order'] == 'Accepted' || $order['status_order'] == 'Pending')) : ?>
                                        <a href="<?= BASEURL ?>/penalty/create/<?= $order['order_id'] ?>" class="btn btn-danger w-100 mt-3">Buat Penalty Untuk Order Ini</a>
                                    <?php endif ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>