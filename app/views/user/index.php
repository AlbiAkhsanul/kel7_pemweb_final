<style>
    section {
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin-top: 80px;
        margin-bottom: 80px;
    }
</style>

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div>
                <?php FlashMsg::flash(); ?>
            </div>
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0 justify-content-center">
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <h4 class="text-center">Profile Saya</h4>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2 mt-2">
                                                <p>Nama: <?= $data['user']['nama_user'] ?></p>
                                                <p>Email: <?= $data['user']['email_user'] ?></p>
                                                <p>No. Telp: <?= $data['user']['no_telp_user'] ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="mb-3 mt-3">
                                            <a class="btn btn-dark btn-md w-100" href="<?= BASEURL . "/user/edit/" . $data['user']['user_id'] ?>">Edit Profil</a>
                                        </li>
                                        <li class="mb-3 mt-3">
                                            <a class="btn btn-dark btn-md w-100" href="<?= BASEURL . "/order/index" ?>">Pesanan Sewa Saya</a>
                                        </li>
                                        <li class="mb-3 mt-3">
                                            <a class="btn btn-danger btn-md w-100" href="<?= BASEURL . "/penalty/index" ?>">Penalty Saya</a>
                                        </li>
                                    </ul>
                                    <hr>
                                    <?php if ($data['user']['is_admin'] == 1) : ?>
                                        <div class="text-center">
                                            <h5>
                                                <a class="btn btn-dark btn-md w-100" href="<?= BASEURL . "/admin/dashboard" ?>">Dashboard Admin</a>
                                            </h5>
                                        </div>
                                    <?php endif ?>
                                    <div class="text-center">
                                        <h5>
                                            <a class="btn btn-danger btn-md w-100" href="<?= BASEURL . "/auth/logout" ?>">Logout</a>
                                        </h5>
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