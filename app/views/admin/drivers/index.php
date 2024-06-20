<?php
$drivers = $data['drivers'];
?>

<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <div>
                <?php FlashMsg::flash(); ?>
            </div>
            <h1 style="font-weight: bold;">Driver Manager</h1>
            <hr>

            <div class="table-responsive">
                <table class="table table-striped table-fixed">
                    <thead>
                        <tr>
                            <th style="width: 100px;">Driver ID</th>
                            <th style="width: 300px;">Nama Driver</th>
                            <th style="width: 150px;">Status</th>
                            <th style="width: 200px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!$drivers) : ?>
                            <tr>
                                <td colspan="4">Tidak Ada Driver Saat Ini</td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($drivers as $driver) : ?>
                                <tr>
                                    <td><?= $driver['driver_id'] ?></td>
                                    <td>
                                        <a href="<?= BASEURL ?>/driver/show/<?= $driver['driver_id'] ?>">
                                            <?= $driver['nama_driver'] ?>
                                        </a>
                                    </td>
                                    <td><?= $driver['status_driver'] === 1 ? 'Available' : 'Not Available' ?></td>
                                    <td>
                                        <a href="<?= BASEURL ?>/driver/edit/<?= $driver['driver_id'] ?>" class="btn btn-primary btn-sm">Edit Driver</a>
                                        <a href="<?= BASEURL ?>/driver/delete/<?= $driver['driver_id'] ?>" class="btn btn-danger btn-sm delete-driver">Hapus Driver</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>

            <hr>
            <a href="<?= BASEURL ?>/driver/create" class="btn btn-warning">Tambah Driver</a>
            <br>
            <a href="<?= BASEURL ?>/admin/dashboard" class="btn btn-dark mt-3">Kembali ke Dashboard</a>
        </div>
    </div>
</section>

<script>
    // JavaScript untuk konfirmasi saat tombol Hapus Driver ditekan
    document.querySelectorAll('.delete-driver').forEach(item => {
        item.addEventListener('click', function(event) {
            if (!confirm('Apakah Anda yakin ingin menghapus driver ini?')) {
                event.preventDefault();
            }
        });
    });
</script>