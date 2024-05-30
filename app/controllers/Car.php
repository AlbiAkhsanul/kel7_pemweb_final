<?php

class Car extends Controller
{
    private $activePage = 2;
    public function index()
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'RentACar - Car Rental';
        // $data['students'] = $this->model('Students_model')->getAllcar();
        $this->view('templates/header', $data);
        $this->view('car/index', $data);
        $this->view('templates/footer');
    }

    public function details($id)
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'Student-details-';
        $data['students'] = $this->model('Students_model')->getCarById($id);
        $this->view('templates/header', $data);
        $this->view('car/details', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($this->model('Students_model')->createNewCar($_POST) > 0) {
            FlashMsg::setFlash('Succesfully', 'Created', 'success');
            header('Location: ' . BASEURL . '/car');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Created', 'danger');
            header('Location: ' . BASEURL . '/car');
            exit;
        }
    }

    public function delete($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($this->model('Students_model')->deleteCarById($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Deleted', 'success');
            header('Location: ' . BASEURL . '/car');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Deleted', 'danger');
            header('Location: ' . BASEURL . '/car');
            exit;
        }
    }

    public function edit()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($this->model('Students_model')->editCarById($_POST) > 0) {
            FlashMsg::setFlash('Succesfully', 'Edited', 'success');
            header('Location: ' . BASEURL . '/car');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Edited', 'danger');
            header('Location: ' . BASEURL . '/car');
            exit;
        }
    }

    public function search()
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'Students-list-';
        $data['students'] = $this->model('Students_model')->getcarByKeyword();
        $this->view('templates/header', $data);
        $this->view('car/index', $data);
        $this->view('templates/footer');
    }
}
