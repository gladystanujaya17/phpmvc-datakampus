<?php


class Controller {
    public function view($view, $data = []) {
        // Parameter $view: URL yang arahkan ke index.php
        // Parameter $data: Kepakai kalau ada data yang dikirimkan


        
        // Anggap lagi ada di index.php folder public!!!
        require_once '../app/views/' . $view . '.php';
    }

    public function model($model) {
        // Sama seperti view, kita akan require model

        require_once '../app/models/' . $model . '.php';
        return new $model;
    }
}