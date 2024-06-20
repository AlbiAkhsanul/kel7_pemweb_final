<?php
$driver = $data['driver'];
?>

<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <h1 style="font-weight: bold;">Edit Driver</h1>
            <hr>

            <form action="<?= BASEURL; ?>/driver/update/<?= $driver['driver_id'] ?>" method="post">
                <ul class="list-unstyled">
                    <li>
                        <label for="nama_driver">Nama Driver: </label>
                        <input type="text" name="nama_driver" id="nama_driver" value="<?= $driver['nama_driver']; ?>" class="form-control" autofocus required>
                    </li>
                    <li>
                        <label for="no_telp_driver">No Telepon Driver: </label>
                        <input type="text" name="no_telp_driver" id="no_telp_driver" value="<?= $driver['no_telp_driver']; ?>" class="form-control" required>
                    </li>
                    <li>
                        <label for="status_driver">Status Driver: </label>
                        <select id="status_driver" name="status_driver" class="form-control" required>
                            <option value="1" <?= $driver['status_driver'] == '1' ? 'selected' : '' ?>>Driver Tersedia</option>
                            <option value="0" <?= $driver['status_driver'] == '0' ? 'selected' : '' ?>>Driver Tidak Tersedia</option>
                        </select>
                    </li>
                    <li>
                        <button type="submit" name="store" class="btn btn-primary mt-3">Update Driver</button>
                    </li>
                </ul>
            </form>
            <hr>
            <a href="<?= BASEURL ?>/admin/drivers/index" class="btn btn-dark">Kembali ke List Driver</a>
        </div>
    </div>
</section>
