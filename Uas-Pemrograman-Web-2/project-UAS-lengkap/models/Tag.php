<?php
class Tag
{
    private $conn;

    public function __construct($db)
    {
        $this->conn = $db;
    }

    public function getAll()
    {
        $result = $this->conn->query("SELECT * FROM tag");
        if ($result && $result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        }
        return [];
    }

    public function insert($nama_tag)
    {
        $stmt = $this->conn->prepare("INSERT INTO tag (nama_tag) VALUES (?)");
        $stmt->bind_param("s", $nama_tag);
        return $stmt->execute();
    }

    // Fungsi tambah agar kompatibel dengan pemanggilan $tag->tambah(...)
    public function tambah($nama_tag)
    {
        return $this->insert($nama_tag);
    }
}
