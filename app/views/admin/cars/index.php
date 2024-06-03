<?php
$cars = $data['cars'];
?>
<h1>
    Ini Halaman Car Admin
</h1>
<?php var_dump($data); ?>
<hr>
<a href="<?= BASEURL ?>/admin/dashboard">
    <button>Dashboard</button>
</a>
<hr>

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
                    >> [<?= $car['car_id'] ?>][<?= $car['jenis_mobil'] ?>] <?= $car['nama_mobil'] ?> (<?= $car['status_mobil'] === 1 ? 'Available' : 'Not Available' ?>)
                </h5>
            </a>
            <a href="<?= BASEURL ?>/car/edit/<?= $car['car_id'] ?>">
                <button>Edit Mobil</button>
            </a>
            <a href="<?= BASEURL ?>/car/delete/<?= $car['car_id'] ?>">
                <button>Delete Mobil</button>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif ?>