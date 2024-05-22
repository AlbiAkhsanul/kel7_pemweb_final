<!-- <div class="container mt-3">
    <div class="jumbotron">
        <h1 class="display-4">Welcome To My Homepage</h1>
        <p class="lead">
        <h3>Hi!</h3>
    </div>
</div> -->

<video autoplay muted loop>
  <source src="<?= BASEURL; ?>/src/nighttrafficjakarta.mp4" type="video/mp4">
</video>

<div class="container col-xl-10 col-xxl-12 py-5">
    <div class="row align-items-center g-0 py-5">
      <div class="hero-left col-lg-6 text-left text-lg-start">
        <div class="display-1 fw-bold lh-1 text-body-emphasis mb-3 text-white">
            <h1 class="pembuka">Rental mobil</h1>
            <h1 class="pembuka">aman & terpercaya</h1>
            <h1 class="pembuka">No.1 di Indonesia!</h1>
        </div>
            <img src="<?= BASEURL; ?>/src/OBJECTS.png">
        </div>
        <div class="hero-right col-md-10 d-flex justify-content-end">
            <div class="container mt-5 text-right">
                <div class="row justify-content-center">
                    <div class="col-md-16 col-lg-12">
                        <div class="form-container">
                            <div class="form-title">
                                <h2 class="m-0">Pesan Mobil</h2>
                            </div>
                            <form>
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
                        </div>
                    </div>
                </div>
            </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </div>
</div>