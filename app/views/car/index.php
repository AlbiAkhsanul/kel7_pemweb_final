<h1>
    Mau Sewa Mobil Kapan?
</h1>
<form action="<?= BASEURL; ?>/car/createOrderSession" method="post">
    <ul>
        <li>
            <label for="tanggal_sewa">Tanggal Sewa: </label>
            <input type="date" name="tanggal_sewa" id="tanggal_sewa" required>
        </li>
        <li>
            <label for="tanggal_kembali_sewa">Tanggal Selesai: </label>
            <input type="date" name="tanggal_kembali_sewa" id="tanggal_kembali_sewa" required>
        </li>
        <li>
            <button type="submit" name="store">Buat Order</button>
        </li>
    </ul>
</form>