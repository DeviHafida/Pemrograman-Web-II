<?php
class AdminModel
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function login($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = ? AND role = 'admin'");
        $stmt->bind_param("s", $email); // 's' berarti string
        $stmt->execute();

        $result = $stmt->get_result();
        return $result->fetch_assoc(); // ambil satu baris data
    }
}
