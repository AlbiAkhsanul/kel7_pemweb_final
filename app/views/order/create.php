<?php
$car = $data['car'];
// var_dump($data);
?>

<style>

</style>

<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-12">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="image col-12 col-md-6" style="text-align: center; margin-top: 100px; padding-left:100px;">
                            <img class="img rounded" style="width: auto; height:auto;" loading="lazy" src="<?= BASEURL ?>/img/cars/<?= $car["foto_mobil"]; ?>" for="foto_mobil">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <h4 class="text-center">Buat Order Baru</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="<?= BASEURL; ?>/order/confirm/<?= $car['car_id'] ?>" method="post">
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <label for="car_brand" class="form-label">Merek Mobil</label>
                                                <div class="form mb-2">
                                                    <select id="car_brand"  class="form-control"  name="car_brand" required disabled>
                                                        <option value="Toyota" <?= $car['car_brand'] == 'Toyota' ? 'selected' : '' ?>>Toyota</option>
                                                        <option value="Honda" <?= $car['car_brand'] == 'Honda' ? 'selected' : '' ?>>Honda</option>
                                                        <option value="Nissan" <?= $car['car_brand'] == 'Nissan' ? 'selected' : '' ?>>Nissan</option>
                                                        <option value="Suzuki" <?= $car['car_brand'] == 'Suzuki' ? 'selected' : '' ?>>Suzuki</option>
                                                        <option value="Daihatsu" <?= $car['car_brand'] == 'Daihatsu' ? 'selected' : '' ?>>Daihatsu</option>
                                                        <option value="Daihatsu" <?= $car['car_brand'] == 'Daihatsu' ? 'selected' : '' ?>>Mitsubishi</option>
                                                        <option value="Daihatsu" <?= $car['car_brand'] == 'Daihatsu' ? 'selected' : '' ?>>Isuzu</option>
                                                        <option value="Daihatsu" <?= $car['car_brand'] == 'Daihatsu' ? 'selected' : '' ?>>Wuling</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="nama_mobil">Model Mobil</label>
                                                <div class="form mb-2 mt-2">
                                                    <input type="text" class="form-control" name="nama_mobil" id="nama_mobil" value="<?= $car['nama_mobil']; ?>" required disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="jenis_mobil">Jenis Mobil</label>
                                                <div class="form mb-2 mt-2">
                                                    <select id="jenis_mobil" class="form-control" name="jenis_mobil" required disabled>
                                                        <option value="MPV" <?= $car['jenis_mobil'] === 'MPV' ? 'selected' : '' ?>>MPV</option>
                                                        <option value="SUV" <?= $car['jenis_mobil'] === 'SUV' ? 'selected' : '' ?>>SUV</option>
                                                        <option value="Hatchback" <?= $car['jenis_mobil'] === 'Hatchback' ? 'selected' : '' ?>>Hatchback</option>
                                                        <option value="LMPV" <?= $car['jenis_mobil'] === 'LMPV' ? 'selected' : '' ?>>LMPV</option>
                                                        <option value="Sedan" <?= $car['jenis_mobil'] === 'Sedan' ? 'selected' : '' ?>>Sedan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="tipe_transmisi">Tipe Transmisi</label>
                                                <div class="form mb-2 mt-2">    
                                                    <select id="tipe_transmisi" class="form-control" name="tipe_transmisi" required disabled>
                                                        <option value="Manual" <?= $car['tipe_transmisi'] === 'Manual' ? 'selected' : '' ?>>Manual</option>
                                                        <option value="Matic" <?= $car['tipe_transmisi'] === 'Matic' ? 'selected' : '' ?>>Matic</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="harga_sewa">harga Sewa (Harian)</label>
                                                <div class="form mb-2 mt-2">
                                                    <input type="number" class="form-control" name="harga_sewa" id="harga_sewa" value="<?= $car['harga_sewa']; ?>" required disabled>
                                                </div>
                                            </div>
                                            <input type="hidden" name="harga_sewa" value="<?= $car['harga_sewa']; ?>">
                                            <input type="hidden" name="car_id" value="<?= $car['car_id']; ?>">
                                            <input type="hidden" name="nama_mobil" value="<?= $car['nama_mobil']; ?>">
                                            <input type="hidden" name="jenis_mobil" value="<?= $car['jenis_mobil']; ?>">
                                            <div class="col-12">
                                            <label for="tanggal_sewa">Tanggal Sewa</label>
                                                <div class="form mb-2 mt-2">
                                                    <input type="date" class="form-control" name="tanggal_sewa" id="tanggal_sewa" value="<?= $_SESSION['tanggal_sewa'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            <label for="tanggal_kembali_sewa">Tanggal Kembali</label>
                                                <div class="form mb-2 mt-2">
                                                    <input type="date" class="form-control" name="tanggal_kembali_sewa" id="tanggal_kembali_sewa" value="<?= $_SESSION['tanggal_kembali_sewa'] ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                            <label for="durasi_sewa">Durasi Sewa (Harian)</label>
                                                <div class="form mb-2 mt-2">
                                                    <input type="number" class="form-control" name="durasi_sewa" id="durasi_sewa" value="<?= $_SESSION['durasi_sewa'] ?>" disabled>
                                                </div>
                                            </div>
                                            <?php if ($data['is_driver'] === 0) : ?>
                                                <div class="col-12">
                                                <label for="jenis_sewa_dummy">Jenis Sewa : </label>
                                                    <div class="form mb-2 mt-2">
                                                        <input type="hidden" name="jenis_sewa" value="0">
                                                        <select id="jenis_sewa_dummy" name="jenis_sewa_dummy" class="form-control" required disabled>
                                                            <option value="0">Sewa Mobil Tanpa Supir</option>
                                                        </select>
                                                    </div>
                                                    <p style="color:red;">[Sewa Mobil Dengan Supir Sedang Tidak Tersedia Karena Tidak Ada Supir Yang Tersedia Saat ini]</p>
                                                </div>
                                            <?php else : ?>
                                                <div class="col-12">
                                                <label for="jenis_sewa">Jenis Sewa : </label>
                                                    <div class="form mb-2 mt-2">
                                                        <select id="jenis_sewa" name="jenis_sewa" class="form-control" required>
                                                            <option value="0">Sewa Mobil Tanpa Supir</option>
                                                            <option value="1">Sewa Mobil Dengan Supir</option>
                                                        </select>
                                                    </div>
                                                    <p style="color:red;">[Sewa Dengan Supir Akan Menambah Biaya Sewa Sebesar Rp 100.000 / Hari]</p>
                                                </div>
                                            <?php endif ?>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" type="submit">Daftar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>