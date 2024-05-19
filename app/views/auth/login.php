<h1>Halaman Login</h1>

<form action="<?= BASEURL; ?>/auth/authenticate" method="post">
    <ul>
        <li>
            <label for="email">Email: </label>
            <input type="text" name="email" id="email" autofocus required>
        </li>
        <li>
            <label for="password">Password: </label>
            <input type="password" name="password" id="password" autocomplete="off" required>
        </li>
        <li>
            <input type="checkbox" name="remember">
            <label for="remember">Ingat saya</label>
        </li>
        <br>
        <li>
            <button type="submit" name="login">Login</button>
        </li>
    </ul>
</form>