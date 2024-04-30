<?php


class App {

    // Properti untuk class App
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];



    public function __construct() {
        $url = $this->parseUrl(); // Ini isinya apapun yang ditulis di URL

        if(isset($url[0])) {
            // CONTROLLER
            // Anggap kalau kita lagi ada di index.php
            if(file_exists('../app/controllers/' . $url[0] . '.php')) {
                // Kalau file-nya ada
                $this->controller = $url[0];

                // Keluarkan Controller dari elemen Array
                unset($url[0]);
            }
        }

        // Instansiasi Class
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;



        // METHOD
        // Cek apakah Method ada ditulis atau tidak, bisa saja hanya ditulis Controller saja, Methodnya tidak
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                // Kalau Methodnya juga ada 
                // Timpa methodnya dengan URL yang baru
                $this->method = $url[1];

                unset($url[1]);
            }
        }



        // PARAMETER
        // Cek apakah Parameter ada
        if (!empty($url)) {
            $this->params = array_values($url);
        }



        // Jalankan Controller, Method, dan kirimkan Params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);

    }

    // Method untuk mengambil URL dan memecahnya
    public function parseUrl() {
        if (isset($_GET["url"])) {
            // Hapus tanda '/' di akhir
            $url = rtrim($_GET["url"], '/');

            // Bersihkan URL dari karakter-karakter aneh
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // URL dipecah dari tanda '/'
            $url = explode('/', $url);

            return $url;
        }
    }

}