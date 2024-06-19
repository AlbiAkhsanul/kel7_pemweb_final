<?php
$order = $data['order'];
$user = $data['user'];
$car = $data['car'];
$penalty = $data['penalty'];

var_dump($order);
echo "<hr>";
var_dump($user);
echo "<hr>";
var_dump($car);
echo "<hr>";
var_dump($penalty);
?>
<h1>Buat Penalty</h1>

<h3>
    Data Order
</h3>

<ul>
    <li>
        <h5>
            Order Id : <?= $order['order_id'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Nama User : <?= $user['nama_user'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Tanggal Sewa : <?= $order['tanggal_sewa'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Durasi Sewa : <?= $order['durasi_sewa'] ?> Hari
        </h5>
    </li>
    <li>
        <h5>
            Jenis Sewa : <?= $order['jenis_sewa'] === 1 ? 'Dengan Supir' : 'Tanpa Supir' ?>
        </h5>
    </li>
    <li>
        <h5>
            Nama Mobil [Id Mobil] : <?= $car['nama_mobil'] ?> [<?= $car['car_id'] ?>]
        </h5>
    </li>
</ul>

<form action="<?= BASEURL; ?>/penalty/update/<?= $penalty['penalty_id'] ?>" method="post" enctype="multipart/form-data">
    <ul>
        <input type="hidden" name="order_id" id="order_id" value="<?= $order['order_id']; ?>">
        <li>
            <label for="jenis_penalty">Jenis Penalty: </label>
            <input type="text" value="<?= $penalty['jenis_penalty'] ?>" name="jenis_penalty" id="jenis_penalty" autofocus required>
        </li>
        <li>
            <label for="biaya_penalty">Biaya Penalty: </label>
            <input type="number" value="<?= $penalty['biaya_penalty'] ?>" name="biaya_penalty" id="biaya_penalty" required>
        </li>
        <li>
            <label for="foto_penalty">Foto Penalty: </label>
            <input type="file" name="foto_penalty" id="foto_penalty" required>
            <img src="<?= BASEURL ?>/img/penalties/<?= $penalty["foto_penalty"]; ?>" alt="FotoPenalty">
        </li>
        <li>
            <button type="submit" name="store">Update Penalty</button>
        </li>
    </ul>
</form>