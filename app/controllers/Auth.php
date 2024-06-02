<?php
class Auth extends Controller
{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function login()
    {
        if (isset($_COOKIE['num']) && isset($_COOKIE['key'])) {
            $num = $_COOKIE['num'] - 7;
            $key = $_COOKIE['key'];

            $query = "SELECT username FROM users WHERE user_id = :user_id";

            $this->db->query($query);
            $this->db->bind('user_id', $num);

            $row = $this->db->single();
            if ($row) {
                $username = $row['username'];
                $hashedValue = hash('sha256', $num . $username . $num);

                if ($key === $hashedValue) {
                    $_SESSION['login'] = true;
                    $_SESSION['user_id'] = $num;
                    $_SESSION['is_admin'] = $row['is_admin'];
                }
            }
        }

        if (isset($_SESSION['login'])) {
            header('Location: ' . BASEURL . '/home/index');
            exit;
        }

        $data['title'] = "Login Page";
        $this->view('templates/header', $data);
        $this->view('auth/login');
        $this->view('templates/footer');
    }

    public function authenticate()
    {
        $result = $this->model('Auth_model')->verify($_POST);

        if ($result) {
            $_SESSION['login'] = true;
            header('Location:' . BASEURL . '/home/index');
            exit;
        } else {
            header('Location:' . BASEURL . '/auth/login');
        }
    }

    public function register()
    {
        if (isset($_SESSION['login'])) {
            header("Location: " . BASEURL . "/home/index");
            exit;
        }
        $data['title'] = "Register Page";
        $this->view('templates/header', $data);
        $this->view('auth/register');
        $this->view('templates/footer');
    }

    public function store()
    {
        if ($this->model('User_model')->addUser($_POST) > 0) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }
    }

    public function logout()
    {
        ob_start();
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();

        setcookie('key', '', time() - 3600, '/');
        setcookie('num', '', time() - 3600, '/');

        header("Location: " . BASEURL . "/auth/login");
        ob_end_flush();
        exit;
    }
}
