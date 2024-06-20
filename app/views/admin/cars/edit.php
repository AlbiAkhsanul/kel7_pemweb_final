<?php $car = $data['car']; ?>

<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <div>
                <?php FlashMsg::flash(); ?>
            </div>
            <h1 style="font-weight: bold;">Edit Informasi Mobil</h1>
            <hr>

            <form action="<?= BASEURL; ?>/car/update/<?= $car['car_id']; ?>" method="post" enctype="multipart/form-data">
                <ul class="list-unstyled">
                    <input type="hidden" name="old_foto_mobil" id="foto" value="<?= $car['foto_mobil']; ?>">
                    <li class="mb-3">
                        <label for="car_brand">Merk Mobil</label>
                        <select id="car_brand" name="car_brand" class="form-control" required>
                            <option value="Toyota" <?= $car['car_brand'] == 'Toyota' ? 'selected' : '' ?>>Toyota</option>
                            <option value="Honda" <?= $car['car_brand'] == 'Honda' ? 'selected' : '' ?>>Honda</option>
                            <option value="Nissan" <?= $car['car_brand'] == 'Nissan' ? 'selected' : '' ?>>Nissan</option>
                            <option value="Suzuki" <?= $car['car_brand'] == 'Suzuki' ? 'selected' : '' ?>>Suzuki</option>
                            <option value="Ford" <?= $car['car_brand'] == 'Ford' ? 'selected' : '' ?>>Ford</option>
                            <option value="Daihatsu" <?= $car['car_brand'] == 'Daihatsu' ? 'selected' : '' ?>>Daihatsu</option>
                            <option value="Mitsubishi" <?= $car['car_brand'] == 'Mitsubishi' ? 'selected' : '' ?>>Mitsubishi</option>
                            <option value="Wuling" <?= $car['car_brand'] == 'Wuling' ? 'selected' : '' ?>>Wuling</option>
                        </select>
                    </li>
                    <li class="mb-3">
                        <label for="nama_mobil">Nama Mobil</label>
                        <input type="text" name="nama_mobil" id="nama_mobil" value="<?= $car['nama_mobil']; ?>" class="form-control" autofocus required>
                    </li>
                    <li class="mb-3">
                        <label for="jenis_mobil">Jenis Mobil</label>
                        <select id="jenis_mobil" name="jenis_mobil" class="form-control" required>
                            <option value="MPV" <?= $car['jenis_mobil'] === 'MPV' ? 'selected' : '' ?>>MPV</option>
                            <option value="SUV" <?= $car['jenis_mobil'] === 'SUV' ? 'selected' : '' ?>>SUV</option>
                            <option value="Hatchback" <?= $car['jenis_mobil'] === 'Hatchback' ? 'selected' : '' ?>>Hatchback</option>
                            <option value="LMPV" <?= $car['jenis_mobil'] === 'LMPV' ? 'selected' : '' ?>>LMPV</option>
                            <option value="Sedan" <?= $car['jenis_mobil'] === 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                        </select>
                    </li>
                    <li class="mb-3">
                        <label for="tipe_transmisi">Tipe Transmisi</label>
                        <select id="tipe_transmisi" name="tipe_transmisi" class="form-control" required>
                            <option value="Manual" <?= $car['tipe_transmisi'] === 'Manual' ? 'selected' : '' ?>>Manual</option>
                            <option value="Matic" <?= $car['tipe_transmisi'] === 'Matic' ? 'selected' : '' ?>>Matic</option>
                        </select>
                    </li>
                    <li class="mb-3">
                        <label for="harga_sewa">Harga Sewa</label>
                        <input type="number" name="harga_sewa" id="harga_sewa" value="<?= $car['harga_sewa']; ?>" class="form-control" required>
                    </li>
                    <li class="mb-3">
                        <label for="status_mobil">Status Mobil</label>
                        <select id="status_mobil" name="status_mobil" class="form-control" required>
                            <option value="1" <?= $car['status_mobil'] == '1' ? 'selected' : '' ?>>Mobil Tersedia</option>
                            <option value="0" <?= $car['status_mobil'] == '0' ? 'selected' : '' ?>>Mobil Tidak Tersedia</option>
                        </select>
                    </li>
                    <li class="mb-3">
                        <label for="foto_mobil">Foto Mobil</label>
                        <input type="file" name="foto_mobil" id="foto_mobil" class="form-control-file">
                        <br>
                        <img src="<?= BASEURL ?>/img/cars/<?= $car["foto_mobil"]; ?>" alt="FotoMobil" class="img-thumbnail" style="max-width: 200px;">
                    </li>
                    <li>
                        <button type="submit" name="store" class="btn btn-primary">Update Informasi Mobil</button>
                    </li>
                </ul>
            </form>
            <hr>
            <a href="<?= BASEURL ?>/admin/cars/index" class="btn btn-dark">Kembali ke List Mobil</a>
        </div>
    </div>
</section>