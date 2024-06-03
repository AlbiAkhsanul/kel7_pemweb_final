<?php
$drivers = $data['drivers'];
?>
<h1>
    Ini Halaman Driver Admin
</h1>
<?php var_dump($data); ?>
<hr>
<a href="<?= BASEURL ?>/admin/dashboard">
    <button>Dashboard</button>
</a>
<hr>

<?php if (!$drivers) : ?>
    <li>
        <h5>
            Tidak Ada Driver Saat Ini
        </h5>
    </li>
<?php else : ?>
    <?php foreach ($drivers as $driver) : ?>
        <li>
            <a href="<?= BASEURL ?>/driver/show/<?= $driver['driver_id'] ?>">
                <h5>
                    >> [<?= $driver['driver_id'] ?>] <?= $driver['nama_driver'] ?> (<?= $driver['status_driver'] === 1 ? 'Available' : 'Not Available' ?>)
                </h5>
            </a>
            <a href="<?= BASEURL ?>/driver/edit/<?= $driver['driver_id'] ?>">
                <button>Edit Driver</button>
            </a>
            <a href="<?= BASEURL ?>/driver/delete/<?= $driver['driver_id'] ?>">
                <button>Hapus Driver</button>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif ?>