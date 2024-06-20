<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <h1 style="font-weight: bold;">Tambah Data Mobil Baru</h1>
            <hr>

            <form action="<?= BASEURL; ?>/car/store" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="car_brand" class="form-label">Merk Mobil</label>
                    <select id="car_brand" name="car_brand" class="form-select" required>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">Honda</option>
                        <option value="Nissan">Nissan</option>
                        <option value="Suzuki">Suzuki</option>
                        <option value="Ford">Ford</option>
                        <option value="Daihatsu">Daihatsu</option>
                        <option value="Mitsubishi">Mitsubishi</option>
                        <option value="Wuling">Wuling</option>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="nama_mobil" class="form-label">Nama Mobil</label>
                    <input type="text" name="nama_mobil" id="nama_mobil" class="form-control" autofocus required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="jenis_mobil" class="form-label">Jenis Mobil</label>
                    <select id="jenis_mobil" name="jenis_mobil" class="form-select" required>
                        <option value="MPV">MPV</option>
                        <option value="SUV">SUV</option>
                        <option value="Hatchback">Hatchback</option>
                        <option value="LMPV">LMPV</option>
                        <option value="Sedan">Sedan</option>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="tipe_transmisi" class="form-label">Tipe Transmisi</label>
                    <select id="tipe_transmisi" name="tipe_transmisi" class="form-select" required>
                        <option value="Manual">Manual</option>
                        <option value="Matic">Matic</option>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="harga_sewa" class="form-label">Harga Sewa</label>
                    <input type="number" name="harga_sewa" id="harga_sewa" class="form-control" required>
                </div>
                <br>
                <div class="mb-3">
                    <label for="status_mobil" class="form-label">Status Mobil</label>
                    <select id="status_mobil" name="status_mobil" class="form-select" required>
                        <option value="1">Mobil Tersedia</option>
                        <option value="0">Mobil Tidak Tersedia</option>
                    </select>
                </div>
                <br>
                <div class="mb-3">
                    <label for="foto_mobil" class="form-label">Foto Mobil</label>
                    <input type="file" name="foto_mobil" id="foto_mobil" class="form-control-file" required>
                </div>
                <br>
                <button type="submit" name="store" class="btn btn-primary">Tambah Mobil Baru</button>
            </form>
            <hr>
            <a href="<?= BASEURL ?>/admin/cars/index" class="btn btn-dark">Kembali ke List Mobil</a>
        </div>
    </div>
</section>