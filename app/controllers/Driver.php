<?php

class Driver extends Controller
{
    public function index()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        $data['title'] = 'Driver List';
        $data['drivers'] = $this->model('Driver_model')->getAllDrivers();
        $this->view('templates/header', $data);
        $this->view('driver/index', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }

        $data['title'] = 'Create Driver';
        $this->view('templates/header', $data);
        $this->view('driver/create', $data);
        $this->view('templates/footer');
    }

    public function store()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        if (empty($_POST) && empty($_FILES)) {
            header('Location: ' . BASEURL . '/driver/create');
            exit;
        }
        if ($this->model('Driver_model')->createNewDriver($_POST, $_FILES) > 0) {
            FlashMsg::setFlash('Succesfully', 'Created', 'success');
            header('Location: ' . BASEURL . '/driver');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Created', 'danger');
            header('Location: ' . BASEURL . '/driver');
            exit;
        }
    }

    public function show($id)
    {
        $data['title'] = 'Driver Details';
        $data['driver'] = $this->model('Driver_model')->getDriverById($id);
        $this->view('templates/header', $data);
        $this->view('driver/details', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        $data['title'] = 'Edit driver';
        $data['driver'] = $this->model('Driver_model')->getDriverById($id);
        $this->view('templates/header', $data);
        $this->view('driver/edit', $data);
        $this->view('templates/footer');
    }

    public function update($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        if ($this->model('Driver_model')->editDriverById($_POST, $_FILES, $id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Edited', 'success');
            header('Location: ' . BASEURL . '/driver');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Edited', 'danger');
            header('Location: ' . BASEURL . '/driver');
            exit;
        }
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        if ($this->model('Driver_model')->deleteDriverById($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Deleted', 'success');
            header('Location: ' . BASEURL . '/driver');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Deleted', 'danger');
            header('Location: ' . BASEURL . '/driver');
            exit;
        }
    }

    public function changeStatus($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        if ($this->model('Driver_model')->changeDriverStatusById($_POST, $id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Deleted', 'success');
            header('Location: ' . BASEURL . '/driver');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Deleted', 'danger');
            header('Location: ' . BASEURL . '/driver');
            exit;
        }
    }
}
