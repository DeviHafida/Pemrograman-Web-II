<?php
class Kategori {
    private $conn;
    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $result = $this->conn->query("SELECT * FROM kategori_artikel");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function insert($nama_kategori) {
        $stmt = $this->conn->prepare("INSERT INTO kategori_artikel (nama_kategori) VALUES (?)");
        $stmt->bind_param("s", $nama_kategori);
        return $stmt->execute();
    }

}
