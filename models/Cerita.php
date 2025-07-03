<?php
require_once '../../../config/database.php';

class Cerita
{
    private $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function getAll()
    {
        return $this->conn->query("SELECT * FROM cerita ORDER BY created_at DESC");
    }

    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM cerita WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function insert($user_id, $judul, $isi)
    {
        $stmt = $this->conn->prepare("INSERT INTO cerita (user_id, judul, isi, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("iss", $user_id, $judul, $isi);
        return $stmt->execute();
    }

    public function update($id, $judul, $isi)
    {
        $stmt = $this->conn->prepare("UPDATE cerita SET judul=?, isi=? WHERE id=?");
        $stmt->bind_param("ssi", $judul, $isi, $id);
        return $stmt->execute();
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM cerita WHERE id=?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}