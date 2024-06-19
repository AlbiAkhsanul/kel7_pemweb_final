<?php
$car = $data['car'];
var_dump($data);
?>
<h1>Buat Order Baru</h1>

<form>
    <ul>
        <br>
        <li>
            <label for="car_brand_id">Merk Mobil: </label>
            <select id="car_brand_id" name="car_brand_id" required disabled>
                <option value="1" <?= $car['car_brand_id'] == '1' ? 'selected' : '' ?>>Toyota</option>
                <option value="2" <?= $car['car_brand_id'] == '2' ? 'selected' : '' ?>>Honda</option>
                <option value="3" <?= $car['car_brand_id'] == '3' ? 'selected' : '' ?>>Nissan</option>
                <option value="4" <?= $car['car_brand_id'] == '4' ? 'selected' : '' ?>>Suzuki</option>
                <option value="5" <?= $car['car_brand_id'] == '5' ? 'selected' : '' ?>>Ford</option>
                <option value="6" <?= $car['car_brand_id'] == '6' ? 'selected' : '' ?>>Daihatsu</option>
            </select>
        </li>
        <li>
            <label for="nama_mobil">Nama Mobil: </label>
            <input type="text" name="nama_mobil" id="nama_mobil" value="<?= $car['nama_mobil']; ?>" required disabled>
        </li>
        <li>
            <label for="jenis_mobil">Jenis Mobil: </label>
            <select id="jenis_mobil" name="jenis_mobil" required disabled>
                <option value="MPV" <?= $car['jenis_mobil'] === 'MPV' ? 'selected' : '' ?>>MPV</option>
                <option value="SUV" <?= $car['jenis_mobil'] === 'SUV' ? 'selected' : '' ?>>SUV</option>
                <option value="Hatchback" <?= $car['jenis_mobil'] === 'Hatchback' ? 'selected' : '' ?>>Hatchback</option>
                <option value="LMPV" <?= $car['jenis_mobil'] === 'LMPV' ? 'selected' : '' ?>>LMPV</option>
                <option value="Sedan" <?= $car['jenis_mobil'] === 'Sedan' ? 'selected' : '' ?>>Sedan</option>
            </select>
        </li>
        <li>
            <label for="tipe_transmisi">Tipe Transmisi: </label>
            <select id="tipe_transmisi" name="tipe_transmisi" required disabled>
                <option value="Manual" <?= $car['tipe_transmisi'] === 'Manual' ? 'selected' : '' ?>>Manual</option>
                <option value="Matic" <?= $car['tipe_transmisi'] === 'Matic' ? 'selected' : '' ?>>Matic</option>
            </select>
        </li>
        <li>
            <label for="harga_sewa">Harga Sewa [Harian]: </label>
            <input type="number" name="harga_sewa" id="harga_sewa" value="<?= $car['harga_sewa']; ?>" required disabled>
        </li>
        <li>
            <label for="status_mobil">Status Mobil: </label>
            <select id="status_mobil" name="status_mobil" required disabled>
                <option value="1" <?= $car['status_mobil'] == '1' ? 'selected' : '' ?>>Mobil Tersedia</option>
                <option value="0" <?= $car['status_mobil'] == '0' ? 'selected' : '' ?>>Mobil Tidak Tersedia</option>
            </select>
        </li>
        <li>
            <label for="foto_mobil">Foto Mobil: </label>
            <img src="<?= BASEURL ?>/img/cars/<?= $car["foto_mobil"]; ?>" alt="FotoMobil">
        </li>
    </ul>
</form>

<form action="<?= BASEURL; ?>/order/confirm/<?= $car['car_id'] ?>" method="post">
    <input type="hidden" name="harga_sewa" value="<?= $car['harga_sewa']; ?>">
    <input type="hidden" name="car_id" value="<?= $car['car_id']; ?>">
    <input type="hidden" name="nama_mobil" value="<?= $car['nama_mobil']; ?>">
    <input type="hidden" name="jenis_mobil" value="<?= $car['jenis_mobil']; ?>">
    <li>
        <label for="tanggal_sewa">Tanggal Sewa: </label>
        <input type="date" name="tanggal_sewa" id="tanggal_sewa" value="<?= $_SESSION['tanggal_sewa'] ?>" disabled>
    </li>
    <li>
        <label for="tanggal_kembali_sewa">Tanggal Kembali: </label>
        <input type="date" name="tanggal_kembali_sewa" id="tanggal_kembali_sewa" value="<?= $_SESSION['tanggal_kembali_sewa'] ?>" disabled>
    </li>
    <li>
        <label for="durasi_sewa">Durasi Sewa [Dalam Hari]: </label>
        <input type="number" name="durasi_sewa" id="durasi_sewa" value="<?= $_SESSION['durasi_sewa'] ?>" disabled>
    </li>
    <?php if ($data['is_driver'] === 0) : ?>
        <li>
            <input type="hidden" name="jenis_sewa" value="0">
            <label for="jenis_sewa_dummy">Jenis Sewa : </label>
            <select id="jenis_sewa_dummy" name="jenis_sewa_dummy" required disabled>
                <option value="0">Sewa Mobil Tanpa Supir</option>
            </select>
            <p style="color:red;">[Sewa Mobil Dengan Supir Sedang Tidak Tersedia Karena Tidak Ada Supir Yang Tersedia Saat ini]</p>
        </li>
    <?php else : ?>
        <li>
            <label for="jenis_sewa">Jenis Sewa : </label>
            <select id="jenis_sewa" name="jenis_sewa" required>
                <option value="0">Sewa Mobil Tanpa Supir</option>
                <option value="1">Sewa Mobil Dengan Supir</option>
            </select>
            <p style="color:red;">[Sewa Dengan Supir Akan Menambah Biaya Sewa Sebesar Rp 100.000 / Hari]</p>
        </li>
    <?php endif ?>
    <li>
        <button type="submit" name="store">Buat Order</button>
    </li>
</form>