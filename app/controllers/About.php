<?php


class About extends Controller {
    // Method Default
    public function index($nama = "dataKampus") {
        // Data dikirim ke views/index
        $data['nama'] = $nama;
        $data['judul'] = 'About Me';

        $this->view('templates/header', $data);
        $this->view('about/index', $data);
        $this->view('templates/footer');
    }

    public function page() {
        $data['judul'] = 'About';

        $this->view('templates/header', $data);
        $this->view('about/page');
        $this->view('templates/footer');
    }
}