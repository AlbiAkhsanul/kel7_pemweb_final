<?php
$order = $data['order'];
$car = $data['car'];
//var_dump($order);
//echo "<hr>";
//var_dump($car);
?>

<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <h1 style="font-weight: bold;">Halaman Action Order</h1>
            <hr>
            <h3>Data Order</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <th>Order Id</th>
                            <td><?= $order['order_id'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama User</th>
                            <td><?= $data['nama_user'] ?></td>
                        </tr>
                        <tr>
                            <th>Tanggal Sewa</th>
                            <td><?= $order['tanggal_sewa'] ?></td>
                        </tr>
                        <tr>
                            <th>Durasi Sewa</th>
                            <td><?= $order['durasi_sewa'] ?> Hari</td>
                        </tr>
                        <tr>
                            <th>Jenis Sewa</th>
                            <td><?= $order['jenis_sewa'] === 1 ? 'Dengan Supir' : 'Tanpa Supir' ?></td>
                        </tr>
                        <tr>
                            <th>Total Harga</th>
                            <td>Rp<?= $order['total_harga'] ?></td>
                        </tr>
                        <tr>
                            <th>Nama Mobil [Id Mobil]</th>
                            <td><?= $car['nama_mobil'] ?> [<?= $car['car_id'] ?>]</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="<?= BASEURL; ?>/order/cancel/<?= $order['order_id'] ?>" class="btn btn-danger">
                    Cancel Order
                </a>
                <a href="<?= BASEURL; ?>/order/accept/<?= $order['order_id'] ?>" class="btn btn-success">
                    Accept Order
                </a>
                <a href="<?= BASEURL; ?>/order/close/<?= $order['order_id'] ?>" class="btn btn-primary">
                    Close Order
                </a>
            </div>
            <br>
            <hr>
            <a href="<?= BASEURL ?>/admin/orders/index" class="btn btn-dark">Kembali ke List Order</a>
        </div>
    </div>
</section>
