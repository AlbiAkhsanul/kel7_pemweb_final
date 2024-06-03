<?php
$cars = $data['cars'];
$order = $data['order'];
$drivers = $data['drivers'];
var_dump($cars);
echo "<hr>";
var_dump($order);
echo "<hr>";
var_dump($drivers);
?>
<h1>Edit Order</h1>

<form action="<?= BASEURL; ?>/order/update/<?= $order['order_id'] ?>" method="post">
    <input type="hidden" name="old_driver_id" id="old_driver_id" value="<?= $order['driver_id']; ?>">
    <li>
        <label for="car_id">Mobil Yang Di Sewa : </label>
        <select id="car_id" name="car_id" required>
            <?php $i = 1 ?>
            <?php foreach ($cars as $car) : ?>
                <option value="<?= $i ?>" <?= $i === $order['car_id'] ? 'selected' : '' ?>><?= $car['nama_mobil'] ?></option>
                <?php $i++ ?>
            <?php endforeach; ?>
        </select>
    </li>
    <li>
        <label for="tanggal_sewa">Tanggal Sewa: </label>
        <input type="date" name="tanggal_sewa" id="tanggal_sewa" value="<?= date('Y-m-d', strtotime($order['tanggal_sewa'])) ?>" required>
    </li>
    <?php if ($order['jenis_sewa'] === 1) : ?>
        <li>
            <label for="driver_id">Driver : </label>
            <select id="driver_id" name="driver_id" required>
                <?php $i = 1 ?>
                <?php foreach ($drivers as $driver) : ?>
                    <?php if ($driver['status_driver'] === 1 || $driver['driver_id'] === $order['driver_id']) : ?>
                        <option value="<?= $i ?>" <?= $i === $order['driver_id'] ? 'selected' : '' ?>><?= $driver['nama_driver'] ?></option>
                        <?php $i++ ?>
                    <?php endif ?>
                <?php endforeach; ?>
            </select>
        </li>
    <?php else : ?>
        <input type="hidden" name="driver_id" id="driver_id" value="<?= $order['driver_id']; ?>">
        <li>
            <label for="driver_id">Driver : </label>
            <select id="driver_id" name="driver_id" required disabled>
                <option value="0">Order Ini Tidak Memiliki Driver</option>
            </select>
        </li>
    <?php endif ?>
    <li>
        <button type="submit" name="store">Edit Order</button>
    </li>
</form>