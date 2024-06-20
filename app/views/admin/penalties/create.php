<?php
$order = $data['order'];
$user = $data['user'];
$car = $data['car'];

//var_dump($order);
//echo "<hr>";
//var_dump($user);
//echo "<hr>";
//var_dump($car);
?>

<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <h1 style="font-weight: bold;">Buat Penalty</h1>
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
                            <td><?= $user['nama_user'] ?></td>
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
                            <th>Nama Mobil [Id Mobil]</th>
                            <td><?= $car['nama_mobil'] ?> [<?= $car['car_id'] ?>]</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <form action="<?= BASEURL; ?>/penalty/store/" method="post" enctype="multipart/form-data" class="mt-4">
                <input type="hidden" name="order_id" id="order_id" value="<?= $order['order_id']; ?>">
                <div class="form-group">
                    <label for="jenis_penalty">Jenis Penalty</label>
                    <input type="text" class="form-control" name="jenis_penalty" id="jenis_penalty" autofocus required>
                </div>
                <br>
                <div class="form-group">
                    <label for="biaya_penalty">Biaya Penalty</label>
                    <input type="number" class="form-control" name="biaya_penalty" id="biaya_penalty" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="foto_penalty">Foto Penalty</label><br>
                    <input type="file" class="form-control-file" name="foto_penalty" id="foto_penalty" required>
                </div>
                <br>
                <div class="form-group">
                    <label for="status_penalty">Status Penalty</label>
                    <select id="status_penalty" name="status_penalty" class="form-control" required>
                        <option value="Pending">Pending</option>
                        <option value="Closed">Closed</option>
                    </select>
                </div>
                <br>
                <button type="submit" name="store" class="btn btn-primary">Buat Penalty</button>
            </form>
        </div>
    </div>
</section>
