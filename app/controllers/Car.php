<?php

class Car extends Controller
{
    public function index()
    {
        $data['title'] = 'Car List';
        $data['cars'] = $this->model('Car_model')->getAllActiveCars();
        $this->view('templates/header', $data);
        $this->view('car/index', $data);
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

        $data['title'] = 'Create Car';
        $this->view('templates/header', $data);
        $this->view('admin/cars/create', $data);
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
            header('Location: ' . BASEURL . '/car/create');
            exit;
        }
        if ($this->model('Car_model')->createNewCar($_POST, $_FILES) > 0) {
            FlashMsg::setFlash('Succesfully', 'Created', 'success');
            header('Location: ' . BASEURL . '/admin/cars');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Created', 'danger');
            header('Location: ' . BASEURL . '/admin/cars');
            exit;
        }
    }

    public function show($id)
    {
        $data['title'] = 'Car Details';
        $data['car'] = $this->model('Car_model')->getCarById($id);
        $this->view('templates/header', $data);
        $this->view('car/details', $data);
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
        $data['title'] = 'Edit Car';
        $data['car'] = $this->model('Car_model')->getCarById($id);
        $this->view('templates/header', $data);
        $this->view('admin/cars/edit', $data);
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
        if ($this->model('Car_model')->editCarById($_POST, $_FILES, $id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Edited', 'success');
            header('Location: ' . BASEURL . '/admin/cars');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Edited', 'danger');
            header('Location: ' . BASEURL . '/admin/cars');
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
        if ($this->model('Car_model')->deleteCarById($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Deleted', 'success');
            header('Location: ' . BASEURL . '/admin/cars');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Deleted', 'danger');
            header('Location: ' . BASEURL . '/admin/cars');
            exit;
        }
    }

    public function search()
    {
        $data['title'] = 'Car List';
        $data['cars'] = $this->model('Car_model')->getCarsByKeyword();
        $this->view('templates/header', $data);
        $this->view('car/index', $data);
        $this->view('templates/footer');
    }
}
