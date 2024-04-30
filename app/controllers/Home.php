<?php

class Home extends Controller {
    public function index() {
        $data['judul'] = "Home";
        $data['nama'] = $this->model('User_model')->getUser();
        // Header
        $this->view('templates/header', $data);
        // Method view
        $this->view('home/index', $data);
        // Footer
        $this->view('templates/footer');
    }
}