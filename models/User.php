<?php
require_once '../../../config/database.php';

class User
{
    private $conn;

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getAll()
    {
        return $this->conn->query("SELECT * FROM users");
    }

    public function getById($id)
    {
        $id = intval($id);
        return $this->conn->query("SELECT * FROM users WHERE id = $id")->fetch_assoc();
    }

    public function add($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (username, nama, email, telepon, password, role, created_at)
            VALUES (?, ?, ?, ?, ?, ?, NOW())");
        $hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt->bind_param("ssssss", $data['username'], $data['nama'], $data['email'], $data['telepon'], $hash, $data['role']);
        $stmt->execute();
    }

    public function update($id, $data)
    {
        $stmt = $this->conn->prepare("UPDATE users SET username=?, nama=?, email=?, telepon=?, role=? WHERE id=?");
        $stmt->bind_param("sssssi", $data['username'], $data['nama'], $data['email'], $data['telepon'], $data['role'], $id);
        $stmt->execute();
    }

    public function delete($id)
    {
        $id = intval($id);
        $this->conn->query("DELETE FROM users WHERE id = $id");
    }

    public function insert($data)
    {
        // Validasi sederhana
        if (empty($data['username']) || empty($data['nama']) || empty($data['email']) || empty($data['password']) || empty($data['role'])) {
            throw new Exception("Data user tidak lengkap. Gagal insert.");
        }

        $stmt = $this->conn->prepare("INSERT INTO users (username, nama, email, telepon, password, role, created_at)
        VALUES (?, ?, ?, ?, ?, ?, NOW())");

        $hash = password_hash($data['password'], PASSWORD_DEFAULT);
        $stmt->bind_param("ssssss", $data['username'], $data['nama'], $data['email'], $data['telepon'], $hash, $data['role']);
        $stmt->execute();

        return $stmt;
    }
}
