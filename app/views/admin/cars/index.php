<?php
$cars = $data['cars'];
?>

<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <div>
                <?php FlashMsg::flash(); ?>
            </div>
            <h1 style="font-weight: bold;">Car Admin</h1>
            <hr>

            <div class="table-responsive">
                <table class="table table-striped table-fixed">
                    <thead>
                        <tr>
                            <th style="width: 100px;">Car ID</th>
                            <th style="width: 150px;">Jenis Mobil</th>
                            <th style="width: 300px;">Nama Mobil</th>
                            <th style="width: 150px;">Status</th>
                            <th style="width: 200px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$cars) : ?>
                            <tr>
                                <td colspan="5">Tidak Ada Mobil Saat Ini</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($cars as $car) : ?>
                                <tr>
                                    <td><?= $car['car_id'] ?></td>
                                    <td><?= $car['jenis_mobil'] ?></td>
                                    <td>
                                        <a href="<?= BASEURL ?>/car/show/<?= $car['car_id'] ?>">
                                            <?= $car['nama_mobil'] ?>
                                        </a>
                                    </td>
                                    <td><?= $car['status_mobil'] === 1 ? 'Available' : 'Not Available' ?></td>
                                    <td>
                                        <a href="<?= BASEURL ?>/car/edit/<?= $car['car_id'] ?>" class="btn btn-primary btn-sm">Edit Mobil</a>
                                        <a href="<?= BASEURL ?>/car/delete/<?= $car['car_id'] ?>" class="btn btn-danger btn-sm delete-car">Delete Mobil</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <hr>
            <a href="<?= BASEURL ?>/car/create" class="btn btn-warning">Tambah Mobil</a>
            <br>
            <a href="<?= BASEURL ?>/admin/dashboard" class="btn btn-dark mt-3">Kembali ke Dashboard</a>
        </div>
    </div>
</section>

<script>
    // JavaScript untuk konfirmasi saat tombol Delete Mobil ditekan
    document.querySelectorAll('.delete-car').forEach(item => {
        item.addEventListener('click', function(event) {
            if (!confirm('Apakah Anda yakin ingin menghapus mobil ini?')) {
                event.preventDefault();
            }
        });
    });
</script>