<?php

if (isset($_POST["SignUp"])) {
    if (register($_POST) > 0) {
        echo "
            <script>
                alert('Berhasil Menambahkan User');

            </script>
        ";
    } else {
        echo mysqli_error($db);
    }
}

?>

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

    <form action="" method="post">
        <ul>
            <li>
                <label for="Username">Username: </label>
                <input type="text" name="Username" id="Username" autocomplete="off" autofocus required>
            </li>
            <li>
                <label for="Password">Password: </label>
                <input type="password" name="Password" id="Password" autocomplete="off" required>
            </li>
            <li>
                <label for="PasswordConfirm">Konfirmasi Password : </label>
                <input type="password" name="PasswordConfirm" id="PasswordConfirm" autocomplete="off" required>
            </li>
            <br>
            <li>
                <button type="submit" name="SignUp">Sign Up</button>
            </li>
        </ul>
    </form>

</body>

</html>