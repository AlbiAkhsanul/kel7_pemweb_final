<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        ul {
            list-style-type: none;
        }

        label {
            display: block;
        }
    </style>
</head>

<body>
    <h1>Halaman Login</h1>

    <?php if (isset($error)) : ?>
        <h3 style="color: red; font-style: italic;">username / password Anda Salah!</h3>
    <?php endif; ?>

    <form action="<?= BASEURL; ?>/auth/authenticate" method="post">
        <ul>
            <li>
                <label for="username">username: </label>
                <input type="text" name="username" id="username" autofocus required>
            </li>
            <li>
                <label for="password">password: </label>
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

</body>

</html>