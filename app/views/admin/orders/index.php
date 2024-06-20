<?php
$orders = $data['orders'];
?>

<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <div>
                <?php FlashMsg::flash(); ?>
            </div>
            <h1 style="font-weight: bold;">Order Admin</h1>
            <?php //var_dump($data); 
            ?>
            <hr>

            <?php if (!$orders) : ?>
                <div class="alert alert-warning" role="alert">
                    <h5>Tidak Ada Order Saat Ini</h5>
                </div>
            <?php else : ?>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Tanggal Order</th>
                                <th>Status Order</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($orders as $order) : ?>
                                <tr>
                                    <td><?= $order['order_id'] ?></td>
                                    <td><?= $order['tanggal_order'] ?></td>
                                    <td><?= $order['status_order'] ?></td>
                                    <td>
                                        <a href="<?= BASEURL ?>/order/show/<?= $order['order_id'] ?>" class="btn btn-dark btn-sm">View</a>
                                        <?php if ($order['status_order'] != "Closed" && $order['status_order'] != "Cancelled") : ?>
                                            <a href="<?= BASEURL ?>/order/action/<?= $order['order_id'] ?>" class="btn btn-warning btn-sm">Action</a>
                                            <a href="<?= BASEURL ?>/order/edit/<?= $order['order_id'] ?>" class="btn btn-warning btn-sm">Edit Order</a>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            <?php endif ?>

            <hr>
            <a href="<?= BASEURL ?>/admin/dashboard" class="btn btn-dark">Kembali ke Dashboard</a>
        </div>
    </div>
</section>