<?php

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $password = DB_PASS;
    private $dbname = DB_NAME;

    // Menampung database
    // dbh = database handler
    private $dbh;
    // Menampung query
    private $stmt;



    public function __construct() {
        // data source name
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;

        // Mengoptimasi koneksi ke database
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn,$this->user, $this->password, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    // Function untuk menjalankan query
    public function query($sql) {
        // Persiapan query
        $this->stmt = $this->dbh->prepare($sql);
        // $this -> handler -> query
    }

    // Binding data (menghindari SQL Injection)
    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch(true) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        $this->stmt->execute();
    }

    // Hasil banyak
    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Hasil cuma satu
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Menghitung berapa baris yang baru
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}
