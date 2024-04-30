<?php

// Menjalankan session
if (!session_id()) {
    session_start();
}

// Panggil file dari folder app

// TEKNIK BOOTSTRAPING
require_once '../app/init.php'; 
// init_php -> memanggil semua file yang dibutuhkan

$app = new App;
