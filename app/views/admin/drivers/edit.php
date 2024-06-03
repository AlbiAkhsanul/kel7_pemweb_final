<?php
$driver = $data['driver'];
var_dump($driver);
?>
<h1>Edit Driver</h1>

<form action="<?= BASEURL; ?>/driver/update/<?= $driver['driver_id'] ?>" method="post">
    <ul>
        <li>
            <label for="nama_driver">Nama Driver: </label>
            <input type="text" name="nama_driver" id="nama_driver" value="<?= $driver['nama_driver']; ?>" autofocus required>
        </li>
        <li>
            <label for="no_telp_driver">No Telephon Driver: </label>
            <input type="number" name="no_telp_driver" id="no_telp_driver" value="<?= $driver['no_telp_driver']; ?>" required>
        </li>
        <li>
            <label for="status_driver">Status Driver: </label>
            <select id="status_driver" name="status_driver" required>
                <option value="1" <?= $driver['status_driver'] == '1' ? 'selected' : '' ?>>Driver Tersedia</option>
                <option value="0" <?= $driver['status_driver'] == '0' ? 'selected' : '' ?>>Driver Tidak Tersedia</option>
            </select>
        </li>
        <li>
            <button type="submit" name="store">Update Driver</button>
        </li>
    </ul>
</form>