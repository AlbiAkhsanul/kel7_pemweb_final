<?php

class PenaltyController extends Controller
{
    public function __construct()
    {
        $this->penaltyModel = $this->model('Penalty');
    }

    public function index($orderID)
    {
        $data['penalties'] = $this->penaltyModel->getPenalties($orderID);
        $data['title'] = 'Daftar Penalti';
        $this->view('templates/header', $data);
        $this->view('penalty/index', $data);
        $this->view('templates/footer');
    }

    public function add($orderID)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'order_id' => $orderID,
                'penalty_type' => $_POST['penalty_type'],
                'penalty_amount' => $_POST['penalty_amount'],
                'penalty_photo' => $_FILES['penalty_photo']['name']
            ];

            // Lakukan validasi data dan pindahkan file foto ke direktori yang diinginkan

            if ($this->penaltyModel->addPenalty($data)) {
                // Penalti berhasil ditambahkan
                header('Location: ' . BASEURL . '/penalty/index/' . $orderID);
                exit;
            } else {
                // Gagal menambahkan penalti
                die('Gagal menambahkan penalti.');
            }
        } else {
            $data['title'] = 'Tambah Penalti';
            $this->view('templates/header', $data);
            $this->view('penalty/add', $data);
            $this->view('templates/footer');
        }
    }

    // Tambahkan metode lain yang diperlukan, seperti mengupdate atau menghapus penalty
}