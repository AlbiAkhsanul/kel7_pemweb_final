<h1>Buat List Mobil Baru</h1>

<form action="<?= BASEURL; ?>/car/store" method="post">
    <ul>
        <input type="hidden" name="foto_mobil" id="foto" value="fotolibomaokwokwokw">
        <br>
        <li>
            <label for="car_brand_id">Merk Mobil: </label>
            <select id="car_brand_id" name="car_brand_id" required>
                <option value="1">Toyota</option>
                <option value="2">Honda</option>
                <option value="3">Nissan</option>
                <option value="4">Suzuki</option>
                <option value="5">Ford</option>
                <option value="6">Daihatsu</option>
            </select>
        </li>
        <li>
            <label for="nama_mobil">Nama Mobil: </label>
            <input type="text" name="nama_mobil" id="nama_mobil" autofocus required>
        </li>
        <li>
            <label for="jenis_mobil">Jenis Mobil: </label>
            <select id="jenis_mobil" name="jenis_mobil" required>
                <option value="MPV">MPV</option>
                <option value="SUV">SUV</option>
                <option value="Hatchback">Hatchback</option>
                <option value="LMPV">LMPV</option>
                <option value="Sedan">Sedan</option>
            </select>
        </li>
        <li>
            <label for="tipe_transmisi">Tipe Transmisi: </label>
            <select id="tipe_transmisi" name="tipe_transmisi" required>
                <option value="Manual">Manual</option>
                <option value="Matic">Matic</option>
            </select>
        </li>
        <li>
            <label for="branch_id">Cabang Perusahaan: </label>
            <select id="branch_id" name="branch_id" required>
                <option value="1">Kenjeran</option>
                <option value="2">Rungkut</option>
                <option value="3">Wonokromo</option>
                <option value="4">LMPV</option>
            </select>
        </li>
        <li>
            <label for="harga_sewa">Harga Sewa: </label>
            <input type="number" name="harga_sewa" id="harga_sewa" required>
        </li>
        <li>
            <label for="status_mobil">Status Mobil: </label>
            <select id="status_mobil" name="status_mobil" required>
                <option value="1">Mobil Tersedia</option>
                <option value="0">Mobil Tidak Tersedia</option>
            </select>
        </li>
        <li>
            <button type="submit" name="store">Buat List Mobil</button>
        </li>
    </ul>
</form>