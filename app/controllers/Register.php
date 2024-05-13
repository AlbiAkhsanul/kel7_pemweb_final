<?php
class Register extends Controller
{
    public function index()
    {
        if (isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/home/index");
            exit;
        }
        $data['judul'] = "Register";
        $this->view('templates/header', $data);
        $this->view('register/index');
        $this->view('templates/footer');
    }

    public function register()
    {
        if ($this->model('User_model')->addUser($_POST) > 0) {
            header("Location: " . BASEURL . '/login/index');
            exit;
        }
    }
}
