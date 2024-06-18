<?php
$orders = $data['orders'];
$user = $data['user'];
?>
<h1>
    List Order Milik <?= $user['nama_user'] ?>
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
            <?php if ($order['status_order'] != "Closed" && $order['status_order'] != "Cancelled") : ?>
                <a href="<?= BASEURL ?>/order/action/<?= $order['order_id'] ?>">
                    <button>Action</button>
                </a>
                <a href="<?= BASEURL ?>/order/edit/<?= $order['order_id'] ?>">
                    <button>Edit Order</button>
                </a>
            <?php endif ?>
        </li>
    <?php endforeach; ?>
<?php endif ?>