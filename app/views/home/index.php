<link rel="stylesheet" href="<?= BASEURL ?>/css/main.css">

<style>
    body {
        margin: 0;
        line-height: normal;
        color: #eaecee;
        background-color: #121212;
        font-family: 'Plus Jakarta Sans', sans-serif;
        background-repeat: no-repeat;
        background-attachment: fixed;
        background-size: cover;
        position: relative;
        /* Make sure body is positioned */
    }

    body::before {
        content: "";
        background-image: url('<?= BASEURL ?>/properties/2024cx5.png') !important;
        background-position: no-repeat center center;
        background-size: cover;
        opacity: 0.5;
        position: fixed;
        /* Fixes the background relative to the viewport */
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
        /* Places the pseudo-element behind the body content */
    }
</style>

<section>
    <div class="container col-xl-1 0 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <div class="hero-left text-center text-lg-center">
                <div>
                    <?php FlashMsg::flash(); ?>
                </div>
                <div class="display-1 fw-bold lh-1 text-body-emphasis mb-3 text-white">
                    <h1 class="pembuka">Rental mobil aman & terpercaya No.1 di Indonesia!</h1>
                </div>
                <!-- <img src="../src/OBJECTS.png"> -->
            </div>
            <div class="container mb-5 mb-md-6">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                        <div class="sewa-mobil-button">
                            <button class="sewa-mobil" onclick="window.location.href='<?= BASEURL ?>/car/allcars'">Sewa Mobil</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-right col-md-10 d-flex justify-content-end">
                <div class="container mt-5 text-right">
                    <div class="row justify-content-center">
                        <div class="col-md-16 col-lg-12">
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
            </div>
        </div>
    </div>
</section>
<section class="whychooseus">
    <div class="feat pt-5 pb-5 bg-box">
        <div class="container">
            <div class="row">
                <div class="section-1 col-sm-12">
                    <h4 class="kenalkami"><span>Kenal lebih dekat dengan RentACar</span></h4>
                    <p>RentACar menyediakan layanan rental mobil online yang murah serta mudah diakses. Rental mobil kapanpun dan dimanapun. Dengan banyaknya pilihan jenis mobil serta harga yang kompetitif, RentACar bisa jadi andalanmu untuk melakukan perjalanan yang menyenangkan!</p>
                </div>
                <div class="section-2 col-sm-12">
                    <h4 class="mengapakami"><span>Kenapa Rental Mobil di </span> RentACar?</h4>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <span class="icon feature_box_col_one">
                            <img class="icon icon1" src="<?= BASEURL ?>/properties/ICON.png">
                        </span>
                        <h6>Mudah & praktis</h6>
                        <p>Sewa mobil mudah melalui smartphone anda.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <span class="icon feature_box_col_two">
                            <img class="icon icon2" src="<?= BASEURL ?>/properties/symbols_fact-check.png">
                        </span>
                        <h6>Layanan berkualitas</h6>
                        <p>Layanan terbaik oleh mitra yang telah lulus kompetensi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <span class="icon feature_box_col_three">
                            <img class="icon icon3" src="<?= BASEURL ?>/properties/money.png">
                        </span>
                        <h6>Harga terjangkau</h6>
                        <p>Pilihan rental mobil bervariasi dengan harga sewa termurah.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <span class="icon feature_box_col_four">
                            <img class="icon icon4" src="<?= BASEURL ?>/properties/clock.png">
                        </span>
                        <h6>Layanan 24 jam</h6>
                        <p>Akses kapanpun anda membutuhkan jasa rental mobil</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="divider"></div>
<section>
    <div class="bg">
        <div class="mitrakami bg-light py-5 py-xl-6">
            <div class="container mb-5 mb-md-6">
                <div class="row justify-content-md-center">
                    <div class="text-center">
                        <h4 class="mb-4 display-5 mitra">Mitra Kami</h4>
                        <p class="text-secondary mb-4 mb-md-5">RentACar telah menjalin kerja sama dengan mitra yang berpengalaman dan terpercaya di seluruh Indonesia demi mewujudkan kenyamanan dan keamanan perjalanan anda!</p>
                    </div>
                </div>
            </div>
            <div class="container overflow-hidden">
                <div class="row gy-5 gy-md-6">
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra1.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra2.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra3.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra4.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra5.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra6.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra7.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra8.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra9.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="<?= BASEURL ?>/properties/mitra-mitra/mitra10.png">
                    </div>
                </div>
            </div>
            <div class="container mb-5 mb-md-6">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                        <h4 class="mb-4 display-5 mitra mitra-bottom">Tunggu apa lagi? Yuk pesan sekarang juga!</h4>
                        <div class="sewa-mobil-button-bottom">
                            <button class="sewa-mobil-bottom" onclick="window.location.href='<?= BASEURL ?>/car/allcars'">Sewa Mobil</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>