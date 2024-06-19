<?php
$namaArray = explode(" ", $data['user']['nama_user']);
$namaPertama = $namaArray[0];
?>
<h1>Profile <?= $namaPertama ?> <?= $data['user']['is_admin'] == 1 ? '[Admin]' : '' ?></h1>
<br>
<h4>Nama: <?= $data['user']['nama_user'] ?></h4>
<h4>Email: <?= $data['user']['email_user'] ?></h4>
<h4>No. Telp: <?= $data['user']['no_telp_user'] ?></h4>