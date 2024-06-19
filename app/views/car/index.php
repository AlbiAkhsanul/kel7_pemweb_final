<?php
// var_dump($_SESSION);
?>
<!-- <h1>
    Mau Sewa Mobil Kapan?
</h1>
<form action="<?= BASEURL; ?>/car/createOrderSession" method="post">
    <ul>
        <li>
            <label for="tanggal_sewa">Tanggal Sewa: </label>
            <input type="date" name="tanggal_sewa" value="<?= isset($_SESSION['tanggal_sewa']) ? $_SESSION['tanggal_sewa'] : '' ?>" id="tanggal_sewa" required>
            <br>
            <span id="tanggalSewaWarning" style="color: red; display: none;">Tanggal sewa tidak boleh lebih kecil dari tanggal saat ini.</span>
        </li>
        <li>
            <label for="tanggal_kembali_sewa">Tanggal Selesai: </label>
            <input type="date" name="tanggal_kembali_sewa" id="tanggal_kembali_sewa" value="<?= isset($_SESSION['tanggal_kembali_sewa']) ? $_SESSION['tanggal_kembali_sewa'] : '' ?>" required>
            <br>
            <span id="tanggalKembaliWarning" style="color: red; display: none;">Tanggal kembali sewa harus lebih besar daripada tanggal sewa.</span>
        </li>
        <li>
            <button type="submit" name="store">Buat Order</button>
        </li>
    </ul>
</form> -->

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
        margin-top: 98px;
        margin-bottom: 98px;
    }

    .btn {
        border-radius: 20px;
    }
</style>

<!-- Login 8 - Bootstrap Brain Component -->
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
                                                <h4 class="text-center">Mau Sewa Mobil Kapan?</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-container">
                                        <form action="<?= BASEURL; ?>/car/createOrderSession" method="post">
                                            <div class="col-12">
                                                <label for="tanggal_sewa" class="form-label">Tanggal Sewa</label>
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" name="tanggal_sewa" value="<?= isset($_SESSION['tanggal_sewa']) ? $_SESSION['tanggal_sewa'] : '' ?>" id="tanggal_sewa" required>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="tanggal_kembali_sewa" class="form-label">Tanggal Selesai</label>
                                                <div class="form-floating mb-3">
                                                    <input type="date" class="form-control" name="tanggal_kembali_sewa" id="tanggal_kembali_sewa" value="<?= isset($_SESSION['tanggal_kembali_sewa']) ? $_SESSION['tanggal_kembali_sewa'] : '' ?>" required>
                                                </div>
                                            </div>
                                            <span id="tanggalKembaliWarning" style="color: red; display: none;">Tanggal kembali sewa harus lebih besar daripada tanggal sewa.</span>
                                            <div class="d-grid">
                                                <button type="submit" name="store" class="btn btn-primary">Cari Mobil</button>
                                            </div>
                                        </form>
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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const tanggalSewaInput = document.getElementById('tanggal_sewa');
        const tanggalKembaliInput = document.getElementById('tanggal_kembali_sewa');
        const tanggalSewaWarning = document.getElementById('tanggalSewaWarning');
        const tanggalKembaliWarning = document.getElementById('tanggalKembaliWarning');
        const submitBtn = document.getElementById('submitBtn');

        // Function to check if the rental date is valid
        function checkRentalDate() {
            const today = new Date().toISOString().split('T')[0]; // Get today's date in YYYY-MM-DD format
            const tanggalSewa = tanggalSewaInput.value;
            const tanggalKembali = tanggalKembaliInput.value;

            let isValid = true;

            if (tanggalSewa < today) {
                tanggalSewaWarning.style.display = 'inline';
                isValid = false;
            } else {
                tanggalSewaWarning.style.display = 'none';
            }

            if (tanggalKembali && tanggalSewa && tanggalKembali <= tanggalSewa) {
                tanggalKembaliWarning.style.display = 'inline';
                isValid = false;
            } else {
                tanggalKembaliWarning.style.display = 'none';
            }

            submitBtn.disabled = !isValid;
        }

        // Add event listeners to the rental date inputs
        tanggalSewaInput.addEventListener('input', checkRentalDate);
        tanggalKembaliInput.addEventListener('input', checkRentalDate);

        // Initial check
        // checkRentalDate();
    });
</script>