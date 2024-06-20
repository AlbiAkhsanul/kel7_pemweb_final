<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="<?= BASEURL ?>/css/main.css">

<style>
    header {
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    body::before {
        background-image: none !important;
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

<!-- Login 8 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div>
            <?php FlashMsg::flash(); ?>
        </div>
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
                                                <h4 class="text-center">Buat Akun</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="<?= BASEURL; ?>/auth/store" method="post">
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="john jane doe" autocomplete="off" autofocus required>
                                                    <label for="nama" class="form-label">Nama</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="email" id="email" placeholder="name@example.com" autocomplete="off" autofocus required>
                                                    <label for="email" class="form-label">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password" id="password" value="" placeholder="Password" autocomplete="off" required>
                                                    <label for="password" class="form-label">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control" name="password_confirm" id="password_confirm" value="" placeholder="Confirm Password" autocomplete="off" required>
                                                    <label for="password_confirm" class="form-label">Confirm Password</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="name@example.com" autocomplete="off" required>
                                                    <label for="no_telp" class="form-label">No. Telp</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" type="submit">Daftar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                <p>Sudah punya akun?
                                                    <a href="<?= BASEURL ?>/auth/login" class="link-secondary text-decoration-none">Masuk</a>
                                                    disini
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