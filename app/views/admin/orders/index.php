<?php
$orders = $data['orders'];
?>
<h1>
    Ini Halaman Order Admin
</h1>
<?php var_dump($data); ?>
<hr>

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
            <a href="<?= BASEURL ?>/order/action/<?= $order['order_id'] ?>">
                <button>Action</button>
            </a>
            <a href="<?= BASEURL ?>/order/edit/<?= $order['order_id'] ?>">
                <button>Edit Order</button>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif ?>