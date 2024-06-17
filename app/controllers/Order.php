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
        if (!isset($_SESSION['tanggal_sewa']) || !isset($_SESSION['tanggal_kembali_sewa']) || !isset($_SESSION['durasi_sewa'])) {
            header('Location: ' . BASEURL . '/car/index');
            exit;
        }
        $data['is_driver'] = 0;
        if ($this->model('Driver_model')->getAllAvailableDrivers($_SESSION['tanggal_sewa'], $_SESSION['tanggal_kembali_sewa'])) {
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
        if (!isset($_SESSION['tanggal_sewa']) || !isset($_SESSION['tanggal_kembali_sewa']) || !isset($_SESSION['durasi_sewa'])) {
            header('Location: ' . BASEURL . '/car/index');
            exit;
        }
        $data['title'] = 'Confirm Order';
        $data = $this->model('Order_model')->calculateTotalHarga($_POST);
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
        if (empty($_POST)) {
            header('Location: ' . BASEURL . '/order/create/' . $id);
            exit;
        }
        if (!isset($_SESSION['tanggal_sewa']) || !isset($_SESSION['tanggal_kembali_sewa']) || !isset($_SESSION['durasi_sewa'])) {
            header('Location: ' . BASEURL . '/car/index');
        }
        if ($_POST['jenis_sewa'] == 1) {
            $drivers = $this->model('Driver_model')->getAllAvailableDrivers($_SESSION['tanggal_sewa'], $_SESSION['tanggal_kembali_sewa']);
            $count = count($drivers);
            if ($count > 0) {
                $rand = rand(0, $count - 1);
                $data['driver_id'] = $drivers[$rand]['driver_id'];
            } else {
                FlashMsg::setFlash('Unsuccesfully', 'Created', 'danger');
                header('Location: ' . BASEURL . '/order');
                exit;
            }
        } else {
            $data['driver_id'] = 0;
        }
        $data['order'] = $_POST;
        if ($this->model('Order_model')->createNewOrder($data) > 0) {
            FlashMsg::setFlash('Succesfully', 'Created', 'success');
            header('Location: ' . BASEURL . '/order');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Created', 'danger');
            header('Location: ' . BASEURL . '/order');
            exit;
        }
    }

    public function show($id)
    {
        $data['title'] = 'Order Details';
        $data['order'] = $this->model('Order_model')->getOrderById($id);
        if (!$data['order']) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
        $data['penalties'] = $this->model('Penalty_model')->getPenaltiesyByOrderId($id);
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
        if ($_SESSION['is_admin'] !== 1) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
        $data['title'] = 'Edit Order';
        $data['order'] = $this->model('Order_model')->getOrderById($id);

        if (!$data['order']) {
            header('Location: ' . BASEURL . '/admin/orders');
            exit;
        }
        $oldDriverId = $data['order']['driver_id'];
        $tanggalSewa = $data['order']['tanggal_sewa'];
        $tanggalKembaliSewa = $data['order']['tanggal_kembali_sewa'];
        $data['old_driver'] = $this->model('Driver_model')->getDriverById($oldDriverId);
        $data['drivers'] = $this->model('Driver_model')->getAllAvailableDrivers($tanggalSewa, $tanggalKembaliSewa);
        $data['cars'] = $this->model('Car_model')->getAllAvailableCars($tanggalSewa, $tanggalKembaliSewa);
        $car_id = $data['order']['car_id'];
        $data['old_car'] = $this->model('Car_model')->getCarById($car_id);
        $this->view('templates/header', $data);
        $this->view('admin/orders/edit', $data);
        $this->view('templates/footer');
    }

    public function update($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION['is_admin'] !== 1) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
        if ($this->model('Order_model')->editOrderById($_POST, $id) > 0) {
            FlashMsg::setFlash('Succesfully', 'Edited', 'success');
            header('Location: ' . BASEURL . '/admin/orders');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Edited', 'danger');
            header('Location: ' . BASEURL . '/admin/orders');
            exit;
        }
    }

    public function action($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION['is_admin'] !== 1) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }
        $data['title'] = 'Order Action';
        $data['order'] = $this->model('Order_model')->getOrderById($id);

        if (!$data['order']) {
            header('Location: ' . BASEURL . '/admin/penalties');
            exit;
        }

        $user_id = $data['order']['user_id'];
        $user = $this->model('User_model')->getUserById($user_id);
        $data['nama_user'] = $user['nama_user'];
        $car_id = $data['order']['car_id'];
        $data['car'] = $this->model('Car_model')->getCarById($car_id);
        $this->view('templates/header', $data);
        $this->view('admin/orders/action', $data);
        $this->view('templates/footer');
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
        if ($this->model('Order_model')->changeOrderStatus($id, 'Accepted') > 0) {
            FlashMsg::setFlash('Succesfully', 'Accept', 'success');
            header('Location: ' . BASEURL . '/admin/orders');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Accept', 'danger');
            header('Location: ' . BASEURL . '/admin/orders');
            exit;
        }
    }

    public function cancel($id)
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if ($_SESSION["is_admin"] !== 1) {
            header("Location: " . BASEURL . "/home");
            exit;
        }
        if ($this->model('Order_model')->changeOrderStatus($id, 'Cancelled') > 0) {
            FlashMsg::setFlash('Succesfully', 'Reject', 'success');
            header('Location: ' . BASEURL . '/admin/orders');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Reject', 'danger');
            header('Location: ' . BASEURL . '/admin/orders');
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
        if ($this->model('Order_model')->changeOrderStatus($id, 'Closed') > 0) {
            FlashMsg::setFlash('Succesfully', 'Reject', 'success');
            header('Location: ' . BASEURL . '/admin/orders');
            exit;
        } else {
            FlashMsg::setFlash('Unsuccesfully', 'Reject', 'danger');
            header('Location: ' . BASEURL . '/admin/orders');
            exit;
        }
    }
}
