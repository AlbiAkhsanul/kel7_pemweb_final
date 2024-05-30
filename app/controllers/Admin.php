<?php
class Admin extends Controller
{
    public function dashboard()
    {
        if (!isset($_SESSION["login"])) {
            header('Location: ' . BASEURL . '/auth/login');
            exit;
        }

        if ($_SESSION['is_admin'] !== 1) {
            header('Location: ' . BASEURL . '/home');
            exit;
        }

        $data['title'] = "Admin Page";
        $this->view('templates/header', $data);
        $this->view('admin/Dashboard');
        $this->view('templates/footer');
    }
}
