<section style="background-color: white; color: black;">
    <div class="container col-xl-10 col-xxl-12 py-5">
        <div class="row align-items-center g-0 py-5">
            <h1 style="font-weight: bold;">Tambah Driver Baru</h1>
            <hr>

            <form action="<?= BASEURL; ?>/driver/store" method="post">
                <ul class="list-unstyled">
                    <li>
                        <label for="nama_driver">Nama Driver</label>
                        <input type="text" name="nama_driver" id="nama_driver" class="form-control" autofocus required>
                    </li>
                    <br>
                    <li>
                        <label for="no_telp_driver">Nomor Telepon Driver</label>
                        <input type="text" name="no_telp_driver" id="no_telp_driver" class="form-control" required>
                    </li>
                    <br>
                    <li>
                        <label for="status_driver">Status Driver</label>
                        <select id="status_driver" name="status_driver" class="form-control" required>
                            <option value="1">Driver Tersedia</option>
                            <option value="0">Driver Tidak Tersedia</option>
                        </select>
                    </li>
                    <br>
                    <li>
                        <button type="submit" name="store" class="btn btn-primary mt-3">Buat Driver Baru</button>
                    </li>
                </ul>
            </form>

            <hr>

            <a href="<?= BASEURL ?>/admin/drivers/index" class="btn btn-dark">Kembali ke List Driver</a>
        </div>
    </div>
</section>
