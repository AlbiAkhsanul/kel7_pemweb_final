<?php
// if (session_status() === PHP_SESSION_NONE) {
//     session_start();
// }

// if (isset($_COOKIE["num"]) && isset($_COOKIE["key"])) {
//     $num = $_COOKIE["num"] - 7;
//     $key = $_COOKIE["key"];

//     // Pakai mysqli agar cepat
//     $dbUser = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

//     // ambil username berdasarkan id
//     $result = mysqli_query($db, "SELECT username FROM users WHERE id = '$num' ");
//     $row = mysqli_fetch_assoc($result);

//     // cek cookie dan username
//     if ($key === hash('sha256', $num . $row["username"] . $num)) {
//         $_SESSION["login"] = true;
//     }
// }

// if (isset($_SESSION["login"])) {
//     header("Location: " . BASEURL . "/home/index");
//     exit;
// }

// if (!isset($_SESSION["login"])) {
//     header("Location: " . BASEURL . "/login/index");
//     exit;
// }
