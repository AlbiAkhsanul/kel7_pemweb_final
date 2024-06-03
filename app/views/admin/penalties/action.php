<?php
$order = $data['order'];
$penalty = $data['penalty'];
var_dump($order);
echo "<hr>";
var_dump($penalty);
?>
<h1>
    Halaman Action Penalty
</h1>

<ul>
    <li>
        <h5>
            Order Id : <?= $order['order_id'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Tanggal Sewa : <?= $order['tanggal_sewa'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Jenis Sewa : <?= $order['jenis_sewa'] === 1 ? 'Dengan Supir' : 'Tanpa Supir' ?>
        </h5>
    </li>
    <li>
        <h5>
            Penalty Id : <?= $penalty['penalty_id'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Jenis Penalty : <?= $penalty['jenis_penalty'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Biaya Penalty : <?= $penalty['biaya_penalty'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Foto Penalty :
        </h5>
        <img src="<?= BASEURL ?>/img/penalties/<?= $penalty["foto_penalty"]; ?>" alt="FotoPenalty">
    </li>
</ul>

<ul>
    <li>
        <a href="<?= BASEURL; ?>/penalty/close/<?= $penalty['penalty_id'] ?>">
            <button>
                Close Penalty
            </button>
        </a>
    </li>
    <li>
        <a href="<?= BASEURL; ?>/penalty/reject/<?= $penalty['penalty_id'] ?>">
            <button>
                Cancel Penalty
            </button>
        </a>
    </li>
</ul>