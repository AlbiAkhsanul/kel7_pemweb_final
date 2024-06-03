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
                        <?= $penalty['jenis_penalty'] ?>
                    </h5>
                </a>
            </li>
        <?php endforeach; ?>
    <?php endif ?>
</ul>