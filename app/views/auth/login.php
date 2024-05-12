<?php

// cek session
if (isset($_SESSION["Login"])) {
    header("Location: ../index.php");
    exit;
}

if (isset($_POST["Login"])) {
    $Username = $_POST["Username"];
    $Password = $_POST["Password"];

    $result = mysqli_query($db, "SELECT * FROM users WHERE Username = '$Username' ");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($Password, $row["Password"])) {
            // cek session
            $_SESSION["Login"] = true;

            // Pindah ke main page
            header("Location: ../index.php");
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
        <h3 style="color: red; font-style: italic;">Username / Password Anda Salah!</h3>
    <?php endif; ?>

    <form action="" method="post">
        <ul>
            <li>
                <label for="Username">Username: </label>
                <input type="text" name="Username" id="Username" autofocus required>
            </li>
            <li>
                <label for="Password">Password: </label>
                <input type="password" name="Password" id="Password" autocomplete="off" required>
            </li>
            <br>
            <li>
                <button type="submit" name="Login">Login</button>
            </li>
        </ul>
    </form>

</body>

</html>