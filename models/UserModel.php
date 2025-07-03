<?php
class UserModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function register($nama, $password, $email, $telepon)
    {
        $stmt = $this->conn->prepare("INSERT INTO users (nama, password, email, telepon, role, created_at) 
                                  VALUES (?, ?, ?, ?, 'user', NOW())");
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssss", $nama, $hashedPassword, $email, $telepon);
        return $stmt->execute();
    }

    public function login($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
