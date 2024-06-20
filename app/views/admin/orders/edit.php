<?php
$cars = $data['cars'];
$old_car = $data['old_car'];
$old_driver = $data['old_driver'];
$order = $data['order'];
$drivers = $data['drivers'];
//var_dump($cars);
//echo "<hr>";
//var_dump($order);
//echo "<hr>";
//var_dump($drivers);
?>

<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <h1 style="font-weight: bold;">Edit Order</h1>
            <hr>

            <form action="<?= BASEURL; ?>/order/update/<?= $order['order_id'] ?>" method="post">
                <input type="hidden" name="old_driver_id" id="old_driver_id" value="<?= $order['driver_id']; ?>">
                <input type="hidden" name="old_car_id" id="old_car_id" value="<?= $order['car_id']; ?>">

                <div class="form-group">
                    <label for="car_id">Mobil Yang Di Sewa</label>
                    <select id="car_id" name="car_id" class="form-control" required>
                        <option value="<?= $old_car['car_id'] ?>" selected><?= $old_car['nama_mobil'] ?></option>
                        <?php foreach ($cars as $car) : ?>
                            <?php if ($car['harga_sewa'] === $old_car['harga_sewa']) : ?>
                                <option value="<?= $car['car_id'] ?>"><?= $car['nama_mobil'] ?></option>
                            <?php endif ?>
                        <?php endforeach; ?>
                    </select>
                    <small class="form-text text-muted">[Hanya Bisa Ganti Mobil Dengan Harga Yang Sama]</small>
                </div>
                <br>
                <?php if ($order['jenis_sewa'] === 1) : ?>
                    <div class="form-group">
                        <label for="driver_id">Driver</label>
                        <select id="driver_id" name="driver_id" class="form-control" required>
                            <option value="<?= $old_driver['driver_id'] ?>" selected><?= $old_driver['nama_driver'] ?></option>
                            <?php foreach ($drivers as $driver) : ?>
                                <option value="<?= $driver['driver_id'] ?>"><?= $driver['nama_driver'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                <?php else : ?>
                    <input type="hidden" name="driver_id" id="driver_id" value="<?= $order['driver_id']; ?>">
                    <div class="form-group">
                        <label for="driver_id">Driver</label>
                        <select id="driver_id" name="driver_id" class="form-control" required disabled>
                            <option value="0">Order Ini Tidak Memiliki Driver</option>
                        </select>
                    </div>
                <?php endif ?>
                <hr>
                <button type="submit" name="store" class="btn btn-warning my-3">Update Order</button>
            </form>
            <a href="<?= BASEURL ?>/admin/orders/index" class="btn btn-dark">Kembali ke List Order</a>
        </div>
    </div>
</section>