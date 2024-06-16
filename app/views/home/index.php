<!-- <div class="container mt-3">
    <div class="jumbotron">
        <h1 class="display-4">Welcome To My Homepage</h1>
        <p class="lead">
        <h3>Hi!</h3>
    </div>
</div> -->

<style>
    .video-background {
        position: fixed;
        right: 0;
        bottom: 0;
        min-width: 100%; 
        min-height: 100%;
        z-index: -1;
    }
    .content {
        position: relative;
        z-index: 1;
    }
</style>
      
<video autoplay muted loop class="video-background">
  <source src="src/nighttrafficjakarta.mp4" type="video/mp4">
</video>

<section>
    <div class="container col-xl-1 0 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <div class="hero-left text-center text-lg-center">
                <div class="display-1 fw-bold lh-1 text-body-emphasis mb-3 text-white">
                    <h1 class="pembuka">Rental mobil aman & terpercaya<br>No.1 di Indonesia!</h1>
                </div>
                <!-- <img src="../src/OBJECTS.png"> -->
            </div>
            <div class="container mb-1 mb-md-6" style="margin-top: -50px;">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                        <div class="sewa-mobil-button">
                        <button class="sewa-mobil" onclick="window.location.href='<?= BASEURL; ?>/car'">Pesan Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-right col-md-10 d-flex justify-content-end">
                <div class="container mt-5 text-right">
                    <div class="row justify-content-center">
                        <div class="col-md-16 col-lg-12">
                            <!-- <div class="form-container">
                                <div class="form-title">
                                    <h2 class="m-0">Pesan Mobil</h2>
                                </div>
                                <form action="../public/car/index.php" method="post">
                                    <div class="mb-3">
                                    <label for="lokasiRental" class="form-label">Lokasi Rental Mobil</label>
                                    <input type="text" class="form-control" id="lokasiRental" placeholder="Pilih kota atau nama tempat...">
                                    </div>
                                    <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="tanggalMulai" class="form-label">Tanggal Mulai Rental</label>
                                        <input type="date" class="form-control" id="tanggalMulai" placeholder="Senin, 29 Februari 2030">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jamMulai" class="form-label">Jam Mulai</label>
                                        <input type="time" class="form-control" id="jamMulai" placeholder="10:00">
                                    </div>
                                    </div>
                                    <div class="row g-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="tanggalSelesai" class="form-label">Tanggal Selesai Rental</label>
                                        <input type="date" class="form-control" id="tanggalSelesai" placeholder="Rabu, 31 Februari 2030">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="jamSelesai" class="form-label">Jam Selesai</label>
                                        <input type="time" class="form-control" id="jamSelesai" placeholder="10:00">
                                    </div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label d-block">Tipe Rental</label>
                                        <ul class="nav nav-pills nav-fill gap-2 p-1 small bg-primary rounded-5 shadow-sm" id="pillNav2" role="tablist" style="--bs-nav-link-color: var(--bs-white); --bs-nav-pills-link-active-color: var(--bs-primary); --bs-nav-pills-link-active-bg: var(--bs-white);">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active rounded-5" id="home-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="true">Dengan Supir</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link rounded-5" id="profile-tab2" data-bs-toggle="tab" type="button" role="tab" aria-selected="false">Tanpa Supir</button>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Cari Mobil</button>
                                    </div>
                                </form>
                            </div> -->
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
                            <img class="icon icon1" src="src/ICON.png">
                        </span>
                        <h6>Mudah & praktis</h6>
                        <p>Sewa mobil mudah melalui smartphone anda.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <span class="icon feature_box_col_two">
                            <img class="icon icon2" src="src/symbols_fact-check.png">
                        </span>
                        <h6>Layanan berkualitas</h6>
                        <p>Layanan terbaik oleh mitra yang telah lulus kompetensi.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <span class="icon feature_box_col_three">
                            <img class="icon icon3" src="src/money.png">
                        </span>
                        <h6>Harga terjangkau</h6>
                        <p>Pilihan rental mobil bervariasi dengan harga sewa termurah.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="item">
                        <span class="icon feature_box_col_four">
                            <img class="icon icon4" src="src/clock.png">
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
                        <img src="src/mitra-mitra/mitra1.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="src/mitra-mitra/mitra2.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="src/mitra-mitra/mitra3.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="src/mitra-mitra/mitra4.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="src/mitra-mitra/mitra5.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="src/mitra-mitra/mitra6.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="src/mitra-mitra/mitra7.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="src/mitra-mitra/mitra8.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="src/mitra-mitra/mitra9.png">
                    </div>
                    <div class="custom-col-2-4 col-md-3 align-self-center text-center">
                        <img src="src/mitra-mitra/mitra10.png">
                    </div>
                </div>
            </div>
            <div class="container mb-5 mb-md-6">
                <div class="row justify-content-md-center">
                    <div class="col-12 col-md-10 col-lg-8 col-xl-7 col-xxl-6 text-center">
                        <h4 class="mb-4 display-5 mitra mitra-bottom">Tunggu apa lagi? Yuk pesan sekarang juga!</h4>
                        <div class="sewa-mobil-button-bottom">
                            <button class="sewa-mobil-bottom" onclick="window.location.href='<?= BASEURL; ?>/car'">Pesan Mobil Sekarang</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="footer">
        <!-- <div class="container p-3">
        <div class="row">
            <div class="d-flex align-items-center mb-3 mb-md-0 me-md-auto">
                <img src="../src/logobrand.svg" alt="Logo" class="img-fluid mb-3">
            </div>
            <div class="col-md-4 mb-3 kerjasama">
                <h5>Kerjasama</h5>
            <div class="divider"></div>
                <ul class="list-unstyled">
                    <li><a href="#">Mendaftar Mitra</a></li>
                    <li><a href="#">Kantor Cabang</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3 layanan">
                <h5>Layanan Pelanggan</h5>
            <div class="divider"></div>
                <ul class="list-unstyled">
                    <li><a href="#">Kantor Cabang</a></li>
                    <li><a href="#">Pengembalian Dana</a></li>
                    <li><a href="#">Pusat Bantuan</a></li>
                    <li><a href="#">Laporkan Masalah</a></li>
                </ul>
            </div>
            <div class="col-md-4 mb-3 icons">
                <h5>Download Aplikasi</h5>
                    <div class="divider"></div>
                        <ul class="list-inline">    
                            <li class="list-inline-item"><a href="#"><i class="fa-brands fa-apple"></i></a></li>
                            <li class="list-inline-item"><a href="#"><i class="fa-brands fa-google-play"></i></a></li>
                        </ul>
                <h5 class="mt-3">Media sosial kami</h5>
                <div class="divider"></div>
                    <ul class="list-inline">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-tiktok"></i></a></li>
                    </ul>
            </div>
        </div>
        </div> -->
    <div class="container">
        <footer class="row row-cols-1 row-cols-sm-2 row-cols-md-5 py-5 my-5 border-top">
            <div class="col mb-3">
            <a href="/" class="d-flex align-items-center mb-3 link-body-emphasis text-decoration-none">
                <img src="src/logobrand.svg" alt="Logo" class="img-fluid mb-3">
            </a>
            <p class="text-body-primary">Copyright © 2024<br>PT. RentACar Indonesia</p>
            </div>
        
            <div class="col mb-3">
        
            </div>
        
            <div class="col mb-3">
            <h5>Kerjasama</h5>
            <div class="divider"></div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Mendaftar Mitra</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Kantor Cabang</a></li>
            </ul>
            </div>
        
            <div class="col mb-3">
            <h5>Layanan Pelanggan</h5>
            <div class="divider"></div>
            <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Tentang Kami</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Pengembalian Dana</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Pusat Bantuan</a></li>
                <li class="nav-item mb-2"><a href="#" class="nav-link p-0">Laporkan Masalah</a></li>
            </ul>
            </div>
        
            <div class="col mb-3">
            <h5>Download Aplikasi</h5>
            <div class="divider"></div>
            <ul class="nav mb-2">    
                <li class="list-inline-item"><a href="#"><i class="fa-brands fa-apple"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fa-brands fa-google-play"></i></a></li>
            </ul>
            <h5 class="mt-4">Media sosial kami</h5>
            <div class="divider"></div>
            <ul class="nav mb-2">
                <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li class="list-inline-item"><a href="#"><i class="fab fa-tiktok"></i></a></li>
            </ul>
            </div>
        </footer>
    </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.3/js/bootstrap.min.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>