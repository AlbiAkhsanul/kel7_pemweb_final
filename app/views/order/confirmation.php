<h1>Konfirmasi Order</h1>
<a href="<?= BASEURL; ?>/order/create/<?= $data['car_id'] ?>">
    <button>
        Edit Order
    </button>
</a>
<form action="<?= BASEURL; ?>/order/store/<?= $data['car_id'] ?>" method="post">
    <input type="hidden" name="car_id" value="<?= $data['car_id']; ?>">
    <input type="hidden" name="jenis_sewa" value="<?= $data['jenis_sewa']; ?>">
    <input type="hidden" name="durasi_sewa" value="<?= $data['durasi_sewa']; ?>">
    <input type="hidden" name="total_harga" value="<?= $data['total_harga']; ?>">
    <input type="hidden" name="tanggal_sewa" value="<?= $data['tanggal_sewa']; ?>">
    <li>
        <label for="tanggal_sewa">Tanggal Sewa: </label>
        <input type="date" name="tanggal_sewa" id="tanggal_sewa" value="<?= $data['tanggal_sewa'] ?>" required disabled>
    </li>
    <li>
        <label for="durasi_sewa">Durasi Sewa [Dalam Hari]: </label>
        <input type="number" name="durasi_sewa" id="durasi_sewa" value="<?= $data['durasi_sewa'] ?>" required min="3" disabled>
    </li>
    <li>
        <label for="jenis_sewa">Jenis Sewa : </label>
        <select id="jenis_sewa" name="jenis_sewa" required disabled>
            <option value="0" <?= $data['jenis_sewa'] === 1 ? 'selected' : '' ?>>Sewa Mobil Dengan Supir</option>
            <option value="1" <?= $data['jenis_sewa'] === 0 ? 'selected' : '' ?>>Sewa Mobil Tanpa Supir</option>
        </select>
    </li>
    <li>
        <label for="total_harga">Total Harga Rp: </label>
        <input type="number" name="total_harga" id="total_harga" value="<?= $data['total_harga'] ?>" required disabled>
    </li>
    <li>
        <label for="method_id">Metode Pembayaran: </label>
        <select id="method_id" name="method_id" required>
            <option value="1">BNI</option>
            <option value="2">BCA</option>
            <option value="3">OVO</option>
            <option value="4">Shopee Pay</option>
        </select>
    </li>
    <li>
        <button type="submit" name="store">Buat Order</button>
    </li>
</form>