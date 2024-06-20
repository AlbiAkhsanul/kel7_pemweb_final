<?php
$order = $data['order'];
$user = $data['user'];
$car = $data['car'];
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
                                <h1>Buat Penalty</h1>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-12">
                                <h3>Data Order</h3>
                            </div>
                            <div class="col-12">
                                <ul class="list-unstyled">
                                    <li><h5>Order Id: <?= $order['order_id'] ?></h5></li>
                                    <li><h5>Nama User: <?= $user['nama_user'] ?></h5></li>
                                    <li><h5>Tanggal Sewa: <?= $order['tanggal_sewa'] ?></h5></li>
                                    <li><h5>Durasi Sewa: <?= $order['durasi_sewa'] ?> Hari</h5></li>
                                    <li><h5>Jenis Sewa: <?= $order['jenis_sewa'] === 1 ? 'Dengan Supir' : 'Tanpa Supir' ?></h5></li>
                                    <li><h5>Nama Mobil [Id Mobil]: <?= $car['nama_mobil'] ?> [<?= $car['car_id'] ?>]</h5></li>
                                </ul>
                            </div>
                        </div>
                        <form action="<?= BASEURL; ?>/penalty/update/<?= $penalty['penalty_id'] ?>" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="order_id" id="order_id" value="<?= $order['order_id']; ?>">
                            <div class="mb-3">
                                <label for="jenis_penalty" class="form-label">Jenis Penalty:</label>
                                <input type="text" class="form-control" name="jenis_penalty" id="jenis_penalty" value="<?= $penalty['jenis_penalty'] ?>" autofocus required>
                            </div>
                            <div class="mb-3">
                                <label for="biaya_penalty" class="form-label">Biaya Penalty:</label>
                                <input type="number" class="form-control" name="biaya_penalty" id="biaya_penalty" value="<?= $penalty['biaya_penalty'] ?>" required>
                            </div>
                            <div class="mb-3">
                                <label for="foto_penalty" class="form-label">Foto Penalty:</label>
                                <input type="file" class="form-control" name="foto_penalty" id="foto_penalty" required>
                                <img class="img-fluid mt-3 rounded" src="<?= BASEURL ?>/img/penalties/<?= $penalty["foto_penalty"]; ?>" alt="Foto Penalty">
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-dark btn-lg" name="store">Update Penalty</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
