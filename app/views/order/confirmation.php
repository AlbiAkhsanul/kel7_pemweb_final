<section class="p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0 justify-content-center">
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-3">
                                                <h4 class="text-center">Konfirmasi Order</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="<?= BASEURL; ?>/order/store/<?= $data['car_id'] ?>" method="post">
                                        <div class="row gy-3 overflow-hidden">
                                            <input type="hidden" name="car_id" value="<?= $data['car_id']; ?>">
                                            <input type="hidden" name="jenis_sewa" value="<?= $data['jenis_sewa']; ?>">
                                            <input type="hidden" name="tanggal_sewa" value="<?= $_SESSION['tanggal_sewa']; ?>">
                                            <input type="hidden" name="tanggal_kembali_sewa" value="<?= $_SESSION['tanggal_kembali_sewa']; ?>">
                                            <input type="hidden" name="durasi_sewa" value="<?= $_SESSION['durasi_sewa']; ?>">
                                            <input type="hidden" name="total_harga" value="<?= $data['total_harga']; ?>">
                                            <input type="hidden" name="nama_mobil" value="<?= $data['nama_mobil']; ?>">
                                            <input type="hidden" name="jenis_mobil" value="<?= $data['jenis_mobil']; ?>">
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
                                            <div class="col-12">
                                                <label for="total_harga">Total Harga Rp: </label>
                                                <div class="form mb-2 mt-2">
                                                    <input type="number" name="total_harga" id="total_harga" value="<?= $data['total_harga'] ?>" required disabled>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label for="method_id">Metode Pembayaran: </label>
                                                <div class="form mb-2 mt-2">
                                                    <select id="method_id" class="form-control" name="method_id" required>
                                                        <option value="1">BNI</option>
                                                        <option value="2">BCA</option>
                                                        <option value="3">OVO</option>
                                                        <option value="4">Shopee Pay</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="d-grid">
                                                            <button class="btn btn-dark btn-lg" type="submit" name="store">Buat Order</button>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="d-grid">
                                                            <button class="btn btn-dark btn-lg" type="button" onclick="window.location.href='<?= BASEURL; ?>/order/create/<?= $data['car_id'] ?>'">Edit Order</button>
                                                        </div>
                                                    </div>
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