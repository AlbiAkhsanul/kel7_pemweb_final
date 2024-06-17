<?php
$cars = $data['cars'];
?>

<h1>
    Ini Data Mobil Yang Bisa Di Sewa Untuk Periode <?= $_SESSION['tanggal_sewa'] ?> - <?= $_SESSION['tanggal_kembali_sewa'] ?> [<?= $_SESSION['durasi_sewa'] ?> Hari]
</h1>

<?php if (!$cars) : ?>
    <li>
        <h5>
            Tidak Ada Mobil Saat Ini
        </h5>
    </li>
<?php else : ?>
    <?php foreach ($cars as $car) : ?>
        <li>
            <a href="<?= BASEURL ?>/car/show/<?= $car['car_id'] ?>">
                <h5>
                    >> [<?= $car['car_id'] ?>][<?= $car['jenis_mobil'] ?>] <?= $car['nama_mobil'] ?>
                </h5>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif ?>