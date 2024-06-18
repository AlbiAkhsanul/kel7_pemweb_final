<?php
var_dump($_SESSION);
?>
<h1>
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
</form>

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