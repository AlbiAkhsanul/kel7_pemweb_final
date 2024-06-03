<?php
$cars = $data['cars'];
$old_car = $data['old_car'];
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
    <input type="hidden" name="old_car_id" id="old_car_id" value="<?= $order['car_id']; ?>">
    <li>
        <label for="car_id">Mobil Yang Di Sewa : </label>
        <select id="car_id" name="car_id" required>
            <?php foreach ($cars as $car) : ?>
                <?php if ($car['car_id'] === $order['car_id']) : ?>
                    <option value="<?= $car['car_id'] ?>" selected><?= $car['nama_mobil'] ?></option>
                <?php elseif ($car['status_mobil'] === 1 && $car['harga_sewa'] === $old_car['harga_sewa']) : ?>
                    <option value="<?= $car['car_id'] ?>"><?= $car['nama_mobil'] ?></option>
                <?php endif ?>
            <?php endforeach; ?>
        </select>
        <p>
            [Hanya Bisa Ganti Mobil Dengan Harga Yang Sama]
        </p>
    </li>
    <li>
        <label for="tanggal_sewa">Tanggal Sewa: </label>
        <input type="date" name="tanggal_sewa" id="tanggal_sewa" value="<?= date('Y-m-d', strtotime($order['tanggal_sewa'])) ?>" required>
    </li>
    <?php if ($order['jenis_sewa'] === 1) : ?>
        <li>
            <label for="driver_id">Driver : </label>
            <select id="driver_id" name="driver_id" required>
                <?php foreach ($drivers as $driver) : ?>
                    <?php if ($driver['driver_id'] === $order['driver_id']) : ?>
                        <option value="<?= $driver['driver_id'] ?>" selected><?= $driver['nama_driver'] ?></option>
                    <?php elseif ($driver['status_driver'] === 1) : ?>
                        <option value="<?= $driver['driver_id'] ?>"><?= $driver['nama_driver'] ?></option>
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
        <button type="submit" name="store">Update Order</button>
    </li>
</form>