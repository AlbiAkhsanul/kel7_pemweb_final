<!-- <h1>
    Ini Halaman Detail Penalti
</h1> -->
<?php // var_dump($data['penalty']);
$penalties = $data['penalty']; ?>

<style>
    .right-row {
        margin-top: -50px;
    }

    section {
        margin-bottom: 262px;
    }
</style>

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-12">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <label style="margin-left: -300px; margin-top: 90px;" for="foto_penalty" class="form-label col-12 text-center">Foto Penalty:</label>
                        <div class="image col-12 col-md-6 text-center" style="margin-top: 10px; padding-left: 100px; margin-bottom: 10px;">
                            <img class="img rounded" style="width: auto; height: auto;" loading="lazy" src="<?= BASEURL ?>/img/penalties/<?= $penalties["foto_penalty"]; ?>" alt="Foto Penalty">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center right-row">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <h4 class="text-center">Detail Penalty</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row gy-3 overflow-hidden">
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="penalty_id" class="form-label">Penalty ID:</label>
                                            <div class="ms-auto">
                                                <?= $penalties['penalty_id'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="order_id" class="form-label">Order ID:</label>
                                            <div class="ms-auto">
                                                <?= $penalties['order_id'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="jenis_penalty" class="form-label">Jenis Penalty:</label>
                                            <div class="ms-auto">
                                                <?= $penalties['jenis_penalty'] ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="biaya_penalty" class="form-label">Biaya Penalty:</label>
                                            <div class="ms-auto">
                                                Rp <?= number_format($penalties['biaya_penalty'], 0, ',', '.') ?>
                                            </div>
                                        </div>
                                        <div class="col-12 d-flex justify-content-between">
                                            <label for="status_penalty" class="form-label">Status Penalty:</label>
                                            <div class="ms-auto">
                                                <?= $penalties['status_penalty'] ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>