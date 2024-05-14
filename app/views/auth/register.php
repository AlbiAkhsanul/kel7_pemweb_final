<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
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

    <h1>Halaman Registration</h1>

    <form action="<?= BASEURL; ?>/auth/store" method="post">
        <ul>
            <li>
                <label for="username">Username: </label>
                <input type="text" name="username" id="username" autocomplete="off" autofocus required>
            </li>
            <li>
                <label for="password">Password: </label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </li>
            <li>
                <label for="passwordConfirm">Konfirmasi Password : </label>
                <input type="password" name="passwordConfirm" id="passwordConfirm" autocomplete="off" required>
            </li>
            <br>
            <li>
                <button type="submit" name="SignUp">Sign Up</button>
            </li>
        </ul>
    </form>

</body>

</html>