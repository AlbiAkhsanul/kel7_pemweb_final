<?php
$order = $data['order'];
$user = $data['user'];
$car = $data['car'];
var_dump($order);
echo "<hr>";
var_dump($user);
echo "<hr>";
var_dump($car);
?>
<h1>
    Halaman Action Order
</h1>

<ul>
    <li>
        <h5>
            Order Id : <?= $order['order_id'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Nama User : <?= $user['nama_user'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Tanggal Sewa : <?= $order['tanggal_sewa'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Durasi Sewa : <?= $order['durasi_sewa'] ?> Hari
        </h5>
    </li>
    <li>
        <h5>
            Jenis Sewa : <?= $order['jenis_sewa'] === 1 ? 'Dengan Supir' : 'Tanpa Supir' ?>
        </h5>
    </li>
    <li>
        <h5>
            Total Harga : Rp<?= $order['total_harga'] ?>
        </h5>
    </li>
    <li>
        <h5>
            Nama Mobil [Id Mobil] : <?= $car['nama_mobil'] ?> [<?= $car['car_id'] ?>]
        </h5>
    </li>
</ul>

<ul>
    <li>
        <a href="<?= BASEURL; ?>/order/accept/<?= $order['order_id'] ?>">
            <button>
                Accept Order
            </button>
        </a>
    </li>
    <li>
        <a href="<?= BASEURL; ?>/order/reject/<?= $order['order_id'] ?>">
            <button>
                Reject Order
            </button>
        </a>
    </li>
    <li>
        <a href="<?= BASEURL; ?>/order/close/<?= $order['order_id'] ?>">
            <button>
                Close Order
            </button>
        </a>
    </li>
</ul>