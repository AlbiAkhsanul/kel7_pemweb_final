<?php

class Penalty extends Controller
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
        $data['title'] = 'Penalty List';
        $data['penalties'] = $this->model('Penalty_model')->getAllPenalties();
        $this->view('templates/header', $data);
        $this->view('admin/penalties/index', $data);
        $this->view('templates/footer');
    }

    public function create($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        $data['title'] = 'Create Penalty';
        $data['order'] = $this->model('order_model')->getOrderById($id);
        $user_id = $data['order']['user_id'];
        $data['user'] = $this->model('User_model')->getUserById($user_id);
        $car_id = $data['order']['car_id'];
        $data['car'] = $this->model('Car_model')->getCarById($car_id);
        $this->view('templates/header', $data);
        $this->view('admin/penalties/create', $data);
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
            header('Location: ' . BASEURL . '/penalty/create');
            exit;
        }
        if ($this->model('Penalty_model')->createNewPenalty($_POST, $_FILES) > 0) {
            FlashMsg::setFlash('Succesfully', 'Created', 'success');
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Created', 'danger');
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        }
    }

    public function show($id)
    {
        $data['title'] = 'Penalty Details';
        $data['penalties'] = $this->model('Penalty_model')->getPenaltyById($id);
        $this->view('templates/header', $data);
        $this->view('penalty/details', $data);
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
        $data['title'] = 'Edit Penalty';
        $data['penalty'] = $this->model('Penalty_model')->getPenaltyById($id);
        $this->view('templates/header', $data);
        $this->view('admin/penalties/edit', $data);
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
        if (empty($_POST) && empty($_FILES)) {
            header('Location: ' . BASEURL . '/penalty/edit/' . $id);
            exit;
        }
        if ($this->model('Penalty_model')->editPenaltyById($_POST, $_FILES, $id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Edited', 'success');
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Edited', 'danger');
            header('Location: ' . BASEURL . '/admin/penalties');
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
        if ($this->model('Penalty_model')->deletePenaltyById($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Deleted', 'success');
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Deleted', 'danger');
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        }
    }

    public function close($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        if ($this->model('Penalty_model')->closePenalty($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Accept', 'success');
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Accept', 'danger');
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        }
    }

    public function reject($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        if ($this->model('Penalty_model')->rejectPenalty($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Reject', 'success');
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Reject', 'danger');
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        }
    }
}
