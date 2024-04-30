<?php


class Mahasiswa_model {
    
    private $table = 'mahasiswa';

    private $db;

    // Begitu panggil construct, langsung instansiasi Database
    public function __construct() {
        $this->db = new Database;
    }

    // Ambil data mahassiwa
    public function getMahasiswa() {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    // Ambil detail mahasiswa dengan $id
    public function getMahasiswaById($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    // Tambah data
    public function tambahDataMahasiswa($data) {
        $query = "INSERT INTO mahasiswa
                VALUES
                ('', :nama, :jurusan, :email, :nim)";

        // Jalankan query
        $this->db->query($query);

        // Binding query
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        // Mengembalikan angka
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id) {
        $query = "DELETE FROM mahasiswa WHERE id = :id";
    
        // Jalankan query
        $this->db->query($query);

        // Binding query
        $this->db->bind('id', $id);

        $this->db->execute();

        // Menghasilkan angka (1 kalau berhasil)
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data) {
        $query = "UPDATE mahasiswa SET 
                nama = :nama,
                nim = :nim,
                email = :email,
                jurusan = :jurusan
                WHERE id = :id";

        // Jalankan query
        $this->db->query($query);

        // Binding query
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        // Mengembalikan angka
        return $this->db->rowCount();
    }

    public function cariDataMahasiswa() {
        $keyword = $_POST['keyword'];
        $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";

        $this->db->query($query);

        $this->db->bind('keyword', "%$keyword%");
        
        $result = $this->db->resultSet();
        return $result;
    }
}