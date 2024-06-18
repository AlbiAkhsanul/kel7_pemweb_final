<?php
$penalties = $data['penalties'];
?>
<h1>
    List Penalti Milik <?= $data['nama_user'] ?>
</h1>
<?php if (!$penalties) : ?>
    <li>
        <h5>
            Tidak Ada Penalti Saat Ini
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
        </li>
    <?php endforeach; ?>
<?php endif ?>