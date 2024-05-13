<?php
class Login extends Controller
{
    private $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = new Database;
    }
    public function index()
    {
        if (isset($_COOKIE["num"]) && isset($_COOKIE["key"])) {
            $num = $_COOKIE["num"] - 7;
            $key = $_COOKIE["key"];

            // Pakai mysqli agar cepat
            $dbUser = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            // ambil username berdasarkan id
            $result = mysqli_query($dbUser, "SELECT username FROM users WHERE id = '$num' ");
            $row = mysqli_fetch_assoc($result);

            // cek cookie dan username
            if ($key === hash('sha256', $num . $row["username"] . $num)) {
                $_SESSION["login"] = true;
            }
        }

        if (isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/home/index");
            exit;
        }
        $data['judul'] = "Login Page";
        $this->view('templates/header', $data);
        $this->view('login/index');
        $this->view('templates/footer');
    }

    public function verifikasi()
    {
        $result = $this->model('User_model')->verify($_POST);

        if ($result) {
            $_SESSION["login"] = true;
            header("Location:" . BASEURL . "/home");
            exit;
        } else {
            header("Location:" . BASEURL . "/login");
        }
    }
}
