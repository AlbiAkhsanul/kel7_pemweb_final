<?php
$penalties = $data['penalties'];
?>
<link rel="stylesheet" href="<?= BASEURL ?>/css/main.css">

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-12">
                <div class="card border-light-subtle shadow-sm">
                    <div>
                        <?php FlashMsg::flash(); ?>
                    </div>
                    <div class="row g-0">
                        <div class="container my-5">
                            <h3 class="mb-4">Riwayat Penalty <?= $data['nama_user'] ?>: </h3>
                            <?php if (!$penalties) : ?>
                                <div class="alert alert-info" role="alert">
                                    Tidak Ada Penalty Saat Ini
                                </div>
                            <?php else : ?>
                                <div class="table-responsive" style="border-radius: 5px;">
                                    <table class="table table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Penalty ID</th>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Status Penaltyr</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($penalties as $penalty) : ?>
                                                <tr>
                                                    <td><?= $penalty['penalty_id'] ?></td>
                                                    <td><?= $penalty['order_id'] ?></td>
                                                    <td><?= $penalty['status_penalty'] ?></td>
                                                    <td>
                                                        <a href="<?= BASEURL ?>/penalty/show/<?= $penalty['penalty_id'] ?>" class="btn btn-dark btn-sm">
                                                            View Penalty
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>