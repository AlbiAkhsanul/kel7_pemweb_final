<h1>Profile Saya</h1>
<br>
<h4>Nama: <?= $data['user']['nama_user'] ?></h4>
<h4>Email: <?= $data['user']['email_user'] ?></h4>
<h4>No. Telp: <?= $data['user']['no_telp_user'] ?></h4>

<ul>
    <li>
        <a href="<?= BASEURL . "/user/edit/" . $data['user']['user_id'] ?>">Edit Profil</a>
    </li>
    <li>
        <a href="<?= BASEURL . "/order/index" ?>">Pesanan Sewa Saya</a>
    </li>
    <li>
        <a href="<?= BASEURL . "/penalty/index" ?>">Penalty Saya</a>
    </li>
</ul>

<hr>

<?php if ($data['user']['is_admin'] == 1) : ?>
    <li>
        <h5>
            <a href="<?= BASEURL . "/admin/dashboard" ?>">Dashboard Admin</a>
        </h5>
    </li>
<?php endif ?>