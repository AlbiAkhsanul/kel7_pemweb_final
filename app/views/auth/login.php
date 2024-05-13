<?php

// cek session
if (isset($_SESSION["login"])) {
    header("Location: " . BASEURL . "/home.php");
    exit;
}

if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($db, "SELECT * FROM users WHERE username = '$username' ");
    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // cek session
            $_SESSION["login"] = true;
            // cek remember me 
            if (isset($_POST["remember"])) {
                // buat cookie
                setcookie('num', $row["id"] + 7, time() + 3600); //samaran untuk cookie id
                setcookie('key', hash('sha256', $row["id"] . $row["username"] . $row["id"]), time() + 3600); //samaran untuk cookie username
            }
            // Pindah ke main page
            header("Location: " . BASEURL . "/home.php");
            exit;
        }
    }

    $error = true;
}
?>

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

    <form action="" method="post">
        <ul>
            <li>
                <label for="username">username: </label>
                <input type="text" name="username" id="username" autofocus required>
            </li>
            <li>
                <label for="password">password: </label>
                <input type="password" name="password" id="password" autocomplete="off" required>
            </li>
            <br>
            <li>
                <button type="submit" name="login">Login</button>
            </li>
        </ul>
    </form>

</body>

</html>