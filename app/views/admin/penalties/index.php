<?php
$penalties = $data['penalties'];
?>
<h1>
    Ini Halaman Penalty Admin
</h1>
<?php var_dump($data); ?>
<hr>

<?php if (!$penalties) : ?>
    <li>
        <h5>
            Tidak Ada Penalty Saat Ini
        </h5>
    </li>
<?php else : ?>
    <?php foreach ($penalties as $penalty) : ?>
        <li>
            <a href="<?= BASEURL ?>/penalty/show/<?= $penalty['penalty_id'] ?>">
                <h5>
                    >> [<?= $penalty['penalty_id'] ?>] <?= $penalty['jenis_penalty'] ?>
                </h5>
            </a>
            <a href="<?= BASEURL ?>/penalty/action/<?= $penalty['penalty_id'] ?>">
                <button>Action</button>
            </a>
            <a href="<?= BASEURL ?>/penalty/edit/<?= $penalty['penalty_id'] ?>">
                <button>Edit Penalty</button>
            </a>
        </li>
    <?php endforeach; ?>
<?php endif ?>