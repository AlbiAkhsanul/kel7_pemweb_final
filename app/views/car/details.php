<h1>
    Ini Halaman Detail Car
</h1>
<?php var_dump($data['car']); ?>
<hr>
<?php if ($data['car']['status_mobil'] === 1) : ?>
    <a href="<?= BASEURL ?>/order/create/<?= $data['car']['car_id'] ?>">
        <button>
            Buat Order
        </button>
    </a>
<?php endif ?>