<?php

class Car extends Controller
{
    public function index()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        $data['title'] = 'Car List Ready';
        $this->view('templates/header', $data);
        $this->view('car/index');
        $this->view('templates/footer');
    }

    public function createOrderSession()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if (empty($_POST)) {
            header('Location: ' . BASEURL . '/car/index');
            exit;
        }

        $dateNow = new DateTime('now');
        $dateMulai = new DateTime($_POST['tanggal_sewa']);
        $dateAkhir = new DateTime($_POST['tanggal_kembali_sewa']);

        if ($dateMulai < $dateNow) {
            FlashMsg::setFlash('Failed', 'Created', 'danger');
            header('Location: ' . BASEURL . '/car/index');
        }
        if ($dateMulai >= $dateAkhir) {
            FlashMsg::setFlash('Failed', 'Created', 'danger');
            header('Location: ' . BASEURL . '/car/index');
        }

        $interval = $dateMulai->diff($dateAkhir);
        $_SESSION['tanggal_sewa'] = $_POST['tanggal_sewa'];
        $_SESSION['tanggal_kembali_sewa'] = $_POST['tanggal_kembali_sewa'];

        $_SESSION['durasi_sewa'] = $interval->days;

        header('Location: ' . BASEURL . '/car/allCars');
    }

    public function allCars()
    {
        if (!isset($_SESSION["login"])) {
            header("Location: " . BASEURL . "/auth/login");
            exit;
        }
        if (!isset($_SESSION['tanggal_sewa']) || !isset($_SESSION['tanggal_kembali_sewa']) || !isset($_SESSION['durasi_sewa'])) {
            header('Location: ' . BASEURL . '/car/index');
        }
        $data['title'] = 'Car List Ready';
        $data['cars'] = $this->model('Car_model')->getAllAvailableCars($_SESSION['tanggal_sewa'], $_SESSION['tanggal_kembali_sewa']);
        $this->view('templates/header', $data);
        $this->view('car/allCars', $data);
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
            FlashMsg::setFlash('Berhasil Membuat Mobil Baru!', 'success');
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
            FlashMsg::setFlash('Berhasil Mengupdate Mobil!', 'success');
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
            FlashMsg::setFlash('Berhasil Menghapus Mobil!', 'success');
            header('Location: ' . BASEURL . '/admin/cars');
            exit;
        } else {
            FlashMsg::setFlash('Gagal Menghapus Mobil!', 'danger');
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
