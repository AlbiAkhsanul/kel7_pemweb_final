<?php

class Home extends Controller
{
    private $activePage = 0;
    public function index()
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'Home';
        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
