<?php
$order = $data['order'];
$penalties = $data['penalties'];
var_dump($data);
echo "<hr>";
var_dump($order);
echo "<hr>";
var_dump($penalties);
?>
<h1>
    Ini Halaman Detail Orders
</h1>
<hr>
<?php if ($_SESSION['is_admin'] === 1) : ?>
    <a href="<?= BASEURL ?>/penalty/create/<?= $order['order_id'] ?>">
        <button>Buat Penalty Untuk Order Ini</button>
    </a>
<?php endif ?>
<hr>
<h3>
    List Penalties
</h3>
<ul>
    <?php if (!$penalties) : ?>
        <li>
            <h5>
                Tidak Ada Penalty Untuk Order Ini
            </h5>
        </li>
    <?php else : ?>
        <?php foreach ($penalties as $penalty) : ?>
            <li>
                <a href="<?= BASEURL ?>/penalty/show/<?= $penalty['penalty_id'] ?>">
                    <h5>
                        <?= $penalty['jenis_penalty'] ?> [<?= $penalty['status_penalty'] ?>]
                    </h5>
                </a>
                <?php if ($_SESSION['is_admin'] === 1) : ?>
                    <a href="<?= BASEURL ?>/penalty/action/<?= $penalty['penalty_id'] ?>">
                        <button>Action</button>
                    </a>
                    <a href="<?= BASEURL ?>/penalty/edit/<?= $penalty['penalty_id'] ?>">
                        <button>Edit Penalty</button>
                    </a>
                <?php endif ?>
            </li>
        <?php endforeach; ?>
    <?php endif ?>
</ul>