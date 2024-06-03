<h1>Buat Driver</h1>

<form action="<?= BASEURL; ?>/driver/store" method="post">
    <ul>
        <li>
            <label for="nama_driver">Nama Driver: </label>
            <input type="text" name="nama_driver" id="nama_driver" autofocus required>
        </li>
        <li>
            <label for="no_telp_driver">No Telephon Driver: </label>
            <input type="number" name="no_telp_driver" id="no_telp_driver" required>
        </li>
        <li>
            <label for="status_driver">Status Driver: </label>
            <select id="status_driver" name="status_driver" required>
                <option value="1">Driver Tersedia</option>
                <option value="0">Driver Tidak Tersedia</option>
            </select>
        </li>
        <li>
            <button type="submit" name="store">Buat Driver Baru</button>
        </li>
    </ul>
</form>