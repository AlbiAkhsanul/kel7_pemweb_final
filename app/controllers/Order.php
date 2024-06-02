<?php

class Order extends Controller
{
    public function index()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        $data['title'] = 'Order List';
        $data['orders'] = $this->model('Order_model')->getAllOrders();
        $this->view('templates/header', $data);
        $this->view('order/index', $data);
        $this->view('templates/footer');
    }

    public function create($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        $data['is_driver'] = 0;
        if ($this->model('Driver_model')->getAllActiveDrivers()) {
            $data['is_driver'] = 1;
        }
        $data['title'] = 'Create Order';
        $data['car'] = $this->model('Car_model')->getCarById($id);
        $this->view('templates/header', $data);
        $this->view('order/create', $data);
        $this->view('templates/footer');
    }

    public function confirm()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        $data['title'] = 'Confirm Order';
        $data = $this->model('Order_model')->calculateTotalHarga($_POST);
        var_dump($data);
        $this->view('templates/header', $data);
        $this->view('order/confirmation', $data);
        $this->view('templates/footer');
    }

    public function store($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if (empty($_POST) && empty($_FILES)) {
            header('Location: ' . BASEURL . '/order/create/' . $id);
            exit;
        }
        if ($this->model('Order_model')->createNewOrder($_POST, $_FILES) > 0) {
            FlashMsg::setFlash('Succesfully', 'Created', 'success');
            header('Location: ' . BASEURL . '/car');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Created', 'danger');
            header('Location: ' . BASEURL . '/car');
            exit;
        }
    }

    public function show($id)
    {
        $data['title'] = 'Order Details';
        $data['orders'] = $this->model('Order_model')->getCarById($id);
        $this->view('templates/header', $data);
        $this->view('order/details', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        $data['title'] = 'Edit Order';
        $data['order'] = $this->model('Order_model')->getCarById($id);
        $this->view('templates/header', $data);
        $this->view('order/edit', $data);
        $this->view('templates/footer');
    }

    public function update($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($this->model('Order_model')->editCarById($_POST, $_FILES, $id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Edited', 'success');
            header('Location: ' . BASEURL . '/car');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Edited', 'danger');
            header('Location: ' . BASEURL . '/car');
            exit;
        }
    }

    public function accept($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        if ($this->model('Order_model')->acceptOrder($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Accept', 'success');
            header('Location: ' . BASEURL . '/admin/dashboard');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Accept', 'danger');
            header('Location: ' . BASEURL . '/admin/dashboard');
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
        if ($this->model('Order_model')->rejectOrder($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Reject', 'success');
            header('Location: ' . BASEURL . '/admin/dashboard');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Reject', 'danger');
            header('Location: ' . BASEURL . '/admin/dashboard');
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
        if ($this->model('Order_model')->closeOrder($id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Reject', 'success');
            header('Location: ' . BASEURL . '/admin/dashboard');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Reject', 'danger');
            header('Location: ' . BASEURL . '/admin/dashboard');
            exit;
        }
    }
}
