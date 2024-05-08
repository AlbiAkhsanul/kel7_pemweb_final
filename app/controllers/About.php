<?php

class About extends Controller
{
    public $activePage = 1;
    public function index($name = 'Albi', $job = 'College Student', $age = 19)
    {
        $data['activePage'] = $this->activePage;
        $data['name'] = $name;
        $data['job'] = $job;
        $data['age'] = $age;
        $data['title'] = 'About';
        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['activePage'] = $this->activePage;
        $data['title'] = 'About';
        $this->view('templates/header', $data);
        $this->view('about/page');
    }
}
