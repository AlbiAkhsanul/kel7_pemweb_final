<?php
$order = $data['order'];
$penalty = $data['penalty'];
?>

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-12">
                <div class="card border-light-subtle shadow-sm">
                    <div class="card-body p-3 p-md-4 p-xl-5">
                        <div class="row">
                            <div class="col-12 text-center mb-4">
                                <h1>Halaman Action Penalty</h1>
                            </div>
                        </div>
                        <div class="row gy-3">
                            <div class="col-12">
                                <h5>Order ID: <?= $order['order_id'] ?></h5>
                            </div>
                            <div class="col-12">
                                <h5>Tanggal Sewa: <?= $order['tanggal_sewa'] ?></h5>
                            </div>
                            <div class="col-12">
                                <h5>Jenis Sewa: <?= $order['jenis_sewa'] === 1 ? 'Dengan Supir' : 'Tanpa Supir' ?></h5>
                            </div>
                            <div class="col-12">
                                <h5>Penalty ID: <?= $penalty['penalty_id'] ?></h5>
                            </div>
                            <div class="col-12">
                                <h5>Jenis Penalty: <?= $penalty['jenis_penalty'] ?></h5>
                            </div>
                            <div class="col-12">
                                <h5>Biaya Penalty: <?= $penalty['biaya_penalty'] ?></h5>
                            </div>
                            <div class="col-12">
                                <h5>Foto Penalty:</h5>
                                <img class="img-fluid rounded" src="<?= BASEURL ?>/img/penalties/<?= $penalty["foto_penalty"]; ?>" alt="Foto Penalty">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-12">
                                <div class="d-grid gap-2">
                                    <a href="<?= BASEURL; ?>/penalty/close/<?= $penalty['penalty_id'] ?>" class="btn btn-dark btn-lg">Close Penalty</a>
                                    <a href="<?= BASEURL; ?>/penalty/reject/<?= $penalty['penalty_id'] ?>" class="btn btn-danger btn-lg">Cancel Penalty</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
