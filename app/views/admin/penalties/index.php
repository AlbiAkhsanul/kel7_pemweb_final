<?php
$penalties = $data['penalties'];
?>

<style>
    section {
        margin-bottom: 73px;
    }
</style>

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-12">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-12 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div>
                                        <?php FlashMsg::flash(); ?>
                                    </div>
                                    <hr>
                                    <h3>List Penalties</h3>
                                    <?php if (!$penalties) : ?>
                                        <div class="alert alert-warning" role="alert">
                                            <h5>Tidak Ada Penalty Untuk Order Ini</h5>
                                        </div>
                                    <?php else : ?>
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Penalty ID</th>
                                                        <th>Jenis Penalty</th>
                                                        <th>Status Penalty</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($penalties as $penalty) : ?>
                                                        <tr>
                                                            <td><?= $penalty['penalty_id'] ?></td>
                                                            <td><?= $penalty['jenis_penalty'] ?></td>
                                                            <td><?= $penalty['status_penalty'] ?></td>
                                                            <td>
                                                                <a href="<?= BASEURL ?>/penalty/show/<?= $penalty['penalty_id'] ?>" class="btn btn-dark btn-sm">View</a>
                                                                <?php if ($penalty['status_penalty'] != "Closed") : ?>
                                                                    <a href="<?= BASEURL ?>/penalty/action/<?= $penalty['penalty_id'] ?>" class="btn btn-warning btn-sm">Action</a>
                                                                    <a href="<?= BASEURL ?>/penalty/edit/<?= $penalty['penalty_id'] ?>" class="btn btn-info btn-sm">Edit Penalty</a>
                                                                <?php endif ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endif ?>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>