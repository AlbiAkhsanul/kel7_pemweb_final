<?php

class Students extends Controller
{
    public $activePage = 2;
    public function index()
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'Students-list-';
        $data['students'] = $this->model('Students_model')->getAllStudents();
        $this->view('templates/header', $data);
        $this->view('students/index', $data);
        $this->view('templates/footer');
    }

    public function details($id)
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'Student-details-';
        $data['students'] = $this->model('Students_model')->getStudentById($id);
        $this->view('templates/header', $data);
        $this->view('students/details', $data);
        $this->view('templates/footer');
    }

    public function create()
    {
        if ($this->model('Students_model')->createNewStudent($_POST) > 0) {
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
        if ($this->model('Students_model')->deleteStudentById($id) > 0) {
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
        if ($this->model('Students_model')->editStudentById($_POST) > 0) {
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
        $data['students'] = $this->model('Students_model')->getStudentsByKeyword();
        $this->view('templates/header', $data);
        $this->view('students/index', $data);
        $this->view('templates/footer');
    }
}
