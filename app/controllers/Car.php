<?php

class Car extends Controller
{
    private $activePage = 2;
    public function index()
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'Car List';
        $data['students'] = $this->model('Students_model')->getAllCars();
        $this->view('templates/header', $data);
        $this->view('students/index', $data);
        $this->view('templates/footer');
    }

    public function details($id)
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'Student-details-';
        $data['students'] = $this->model('Students_model')->getCarById($id);
        $this->view('templates/header', $data);
        $this->view('students/details', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        if ($this->model('Students_model')->createNewCar($_POST) > 0) {
            FlashMsg::setFlash('Succesfully', 'Created', 'success');
            header('Location: ' . BASEURL . '/students');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Created', 'danger');
            header('Location: ' . BASEURL . '/students');
            exit;
        }
    }

    public function delete($id)
    {
        if ($this->model('Students_model')->deleteCarById($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Deleted', 'success');
            header('Location: ' . BASEURL . '/students');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Deleted', 'danger');
            header('Location: ' . BASEURL . '/students');
            exit;
        }
    }

    public function edit()
    {
        if ($this->model('Students_model')->editCarById($_POST) > 0) {
            FlashMsg::setFlash('Succesfully', 'Edited', 'success');
            header('Location: ' . BASEURL . '/students');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Edited', 'danger');
            header('Location: ' . BASEURL . '/students');
            exit;
        }
    }

    public function search()
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'Students-list-';
        $data['students'] = $this->model('Students_model')->getCarsByKeyword();
        $this->view('templates/header', $data);
        $this->view('students/index', $data);
        $this->view('templates/footer');
    }
}
