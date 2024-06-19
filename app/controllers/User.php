<?php

class User extends Controller
{
    public function index()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        $data['user'] = $this->model('User_model')->getUserById($_SESSION['user_id']);
        $data['title'] = "Detail Profil";
        $this->view('templates/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function show($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        $data['user'] = $this->model('User_model')->getUserById($id);
        $data['title'] = "Detail Profil";
        $this->view('templates/header', $data);
        $this->view('user/details', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($id !== $_SESSION['user_id'] && $_SESSION['is_admin'] != 1) {
            header("Location: " . BASEURL . "/user");
            exit;
        }
        $data['user'] = $this->model('User_model')->getUserById($id);
        $data['title'] = "Edit Profil";
        $this->view('templates/header', $data);
        $this->view('user/edit', $data);
        $this->view('templates/footer');
    }

    public function update($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($this->model('User_model')->editUserById($_POST, $id) > 0) {
            FlashMsg::setFlash('Berhasil Membuat Penalty!', 'success');
            header('Location: ' . BASEURL . '/home');
            exit;
        } else {
            FlashMsg::setFlash('Gagal Mengupdate Profile!', 'danger');
            header('Location: ' . BASEURL . '/home');
            exit;
        }
    }
}
