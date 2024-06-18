<?php
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
<?php endif ?>