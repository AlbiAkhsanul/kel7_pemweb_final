<h1>Halaman Registration</h1>

<form action="<?= BASEURL; ?>/auth/store" method="post">
    <ul>
        <li>
            <label for="nama">Nama: </label>
            <input type="text" name="nama" id="nama" autocomplete="off" autofocus required>
        </li>
        <li>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" autocomplete="off" autofocus required>
        </li>
        <li>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" autocomplete="off" required>
        </li>
        <li>
            <label for="password_confirm">Konfirmasi Password : </label>
            <input type="password" name="password_confirm" id="password_confirm" autocomplete="off" required>
        </li>
        <li>
            <label for="no_telp">No Telp : </label>
            <input type="number" name="no_telp" id="no_telp" autocomplete="off" required>
        </li>
        <li>
            <button type="submit" name="SignUp">Sign Up</button>
        </li>
    </ul>
</form>