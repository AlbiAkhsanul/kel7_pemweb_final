<style>
    header {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    section {
        font-family: 'Plus Jakarta Sans', sans-serif;
        margin-top: 64px;
        margin-bottom: 64px;
    }

    .btn {
        border-radius: 20px;
    }
</style>

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="<?= BASEURL ?>/properties/stockimg1.jpg">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <h4 class="text-center">Edit Profil</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="<?= BASEURL . "/user/update/" . $data['user']['user_id'] ?>" method="post">
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="nama_user" value="<?= $data['user']['nama_user'] ?>" id="nama_user" placeholder="Nama" autocomplete="off" required>
                                                    <label for="nama_user" class="form-label">Nama</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="no_telp_user" value="<?= $data['user']['no_telp_user'] ?>" id="no_telp_user" placeholder="Nomor Telepon" autocomplete="off" required>
                                                    <label for="no_telp_user" class="form-label">Nomor Telepon</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control" name="email_user" value="<?= $data['user']['email_user'] ?>" id="email_user" placeholder="Email" autocomplete="off" required>
                                                    <label for="email_user" class="form-label">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password_baru" id="password_baru" placeholder="Password Baru" autocomplete="off">
                                                    <label for="password_baru" class="form-label">Password Baru</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="konfirmasi_password_baru" id="konfirmasi_password_baru" placeholder="Konfirmasi Password Baru" autocomplete="off">
                                                    <label for="konfirmasi_password_baru" class="form-label">Konfirmasi Password Baru</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password_lama" id="password_lama" placeholder="Password Lama" autocomplete="off" required>
                                                    <label for="password_lama" class="form-label">Password Lama</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                <p>
                                                    <a href="<?= BASEURL . "/user/details/" . $data['user']['user_id'] ?>" class="btn btn-secondary">Kembali</a>
                                                </p>
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
    </div>
</section>