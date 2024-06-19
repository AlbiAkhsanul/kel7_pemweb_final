<?php $car = $data['car'] ?>
<h1>Edit List Mobil</h1>

<form action="<?= BASEURL; ?>/car/update/<?= $car['car_id']; ?>" method="post" enctype="multipart/form-data">
    <ul>
        <input type="hidden" name="old_foto_mobil" id="foto" value="<?= $car['foto_mobil']; ?>">
        <br>
        <li>
            <label for="car_brand_id">Merk Mobil: </label>
            <select id="car_brand_id" name="car_brand_id" required>
                <option value="Toyota" <?= $car['car_brand_id'] == 'Toyota' ? 'selected' : '' ?>>Toyota</option>
                <option value="Honda" <?= $car['car_brand_id'] == 'Honda' ? 'selected' : '' ?>>Honda</option>
                <option value="Nissan" <?= $car['car_brand_id'] == 'Nissan' ? 'selected' : '' ?>>Nissan</option>
                <option value="Suzuki" <?= $car['car_brand_id'] == 'Suzuki' ? 'selected' : '' ?>>Suzuki</option>
                <option value="Ford" <?= $car['car_brand_id'] == 'Ford' ? 'selected' : '' ?>>Ford</option>
                <option value="Daihatsu" <?= $car['car_brand_id'] == 'Daihatsu' ? 'selected' : '' ?>>Daihatsu</option>
                <option value="Mitsubishi" <?= $car['car_brand_id'] == 'Mitsubishi' ? 'selected' : '' ?>>Daihatsu</option>
                <option value="Wuling" <?= $car['car_brand_id'] == 'Wuling' ? 'selected' : '' ?>>Daihatsu</option>
            </select>
        </li>
        <li>
            <label for="nama_mobil">Nama Mobil: </label>
            <input type="text" name="nama_mobil" id="nama_mobil" value="<?= $car['nama_mobil']; ?>" autofocus required>
        </li>
        <li>
            <label for="jenis_mobil">Jenis Mobil: </label>
            <select id="jenis_mobil" name="jenis_mobil" required>
                <option value="MPV" <?= $car['jenis_mobil'] === 'MPV' ? 'selected' : '' ?>>MPV</option>
                <option value="SUV" <?= $car['jenis_mobil'] === 'SUV' ? 'selected' : '' ?>>SUV</option>
                <option value="Hatchback" <?= $car['jenis_mobil'] === 'Hatchback' ? 'selected' : '' ?>>Hatchback</option>
                <option value="LMPV" <?= $car['jenis_mobil'] === 'LMPV' ? 'selected' : '' ?>>LMPV</option>
                <option value="Sedan" <?= $car['jenis_mobil'] === 'Sedan' ? 'selected' : '' ?>>Sedan</option>
            </select>
        </li>
        <li>
            <label for="tipe_transmisi">Tipe Transmisi: </label>
            <select id="tipe_transmisi" name="tipe_transmisi" required>
                <option value="Manual" <?= $car['tipe_transmisi'] === 'Manual' ? 'selected' : '' ?>>Manual</option>
                <option value="Matic" <?= $car['tipe_transmisi'] === 'Matic' ? 'selected' : '' ?>>Matic</option>
            </select>
        </li>
        <li>
            <label for="harga_sewa">Harga Sewa: </label>
            <input type="number" name="harga_sewa" id="harga_sewa" value="<?= $car['harga_sewa']; ?>" required>
        </li>
        <li>
            <label for="status_mobil">Status Mobil: </label>
            <select id="status_mobil" name="status_mobil" required>
                <option value="1" <?= $car['status_mobil'] == '1' ? 'selected' : '' ?>>Mobil Tersedia</option>
                <option value="0" <?= $car['status_mobil'] == '0' ? 'selected' : '' ?>>Mobil Tidak Tersedia</option>
            </select>
        </li>
        <li>
            <label for="foto_mobil">Foto Mobil: </label>
            <input type="file" name="foto_mobil" id="foto_mobil">
            <img src="<?= BASEURL ?>/img/cars/<?= $car["foto_mobil"]; ?>" alt="FotoMobil">
        </li>
        <li>
            <button type="submit" name="store">Update List Mobil</button>
        </li>
    </ul>
</form>