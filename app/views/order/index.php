<!-- <?php
        $orders = $data['orders'];
        ?>
<h1>
    List Order Milik <?= $data['nama_user'] ?>
</h1>
<?php if (!$orders) : ?>
    <li>
        <h5>
            Tidak Ada Order Saat Ini
        </h5>
    </li>
<?php else : ?>
    <?php foreach ($orders as $order) : ?>
        <li>
            <a href="<?= BASEURL ?>/order/show/<?= $order['order_id'] ?>">
                <h5>
                    >> [<?= $order['order_id'] ?>] <?= $order['tanggal_order'] ?> [<?= $order['status_order'] ?>]
                </h5>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif ?> -->

<link rel="stylesheet" href="<?= BASEURL ?>/css/main.css">

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-12">
                <div class="card border-light-subtle shadow-sm">
                    <div>
                        <?php FlashMsg::flash(); ?>
                    </div>
                    <div class="row g-0">
                        <div class="container my-5">
                            <h3 class="mb-4">Riwayat Pesanan <?= $data['nama_user'] ?>: </h3>
                            <?php if (!$orders) : ?>
                                <div class="alert alert-info" role="alert">
                                    Tidak Ada Order Saat Ini
                                </div>
                            <?php else : ?>
                                <div class="table-responsive" style="border-radius: 5px;">
                                    <table class="table table-hover">
                                        <thead class="table-dark">
                                            <tr>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Tanggal Order</th>
                                                <th scope="col">Status Order</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($orders as $order) : ?>
                                                <tr>
                                                    <td><?= $order['order_id'] ?></td>
                                                    <td><?= $order['tanggal_order'] ?></td>
                                                    <td><?= $order['status_order'] ?></td>
                                                    <td>
                                                        <a href="<?= BASEURL ?>/order/show/<?= $order['order_id'] ?>" class="btn btn-dark btn-sm">
                                                            View Order
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>