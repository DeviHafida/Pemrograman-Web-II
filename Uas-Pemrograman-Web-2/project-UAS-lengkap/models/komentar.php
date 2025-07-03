<?php
class Komentar
{
    private $conn;
    private $table = "komentar";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Tampilkan semua komentar dengan nama user dan judul cerita
    public function getAll()
    {
        $query = "SELECT k.id, k.isi, k.created_at, u.username, c.judul 
                  FROM komentar k
                  JOIN users u ON k.user_id = u.id
                  JOIN cerita c ON k.cerita_id = c.id
                  ORDER BY k.created_at DESC";
        return $this->conn->query($query);
    }

    // Tambah komentar
    public function tambah($cerita_id, $user_id, $isi)
    {
        $query = "INSERT INTO komentar (cerita_id, user_id, isi) VALUES (?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iis", $cerita_id, $user_id, $isi);
        return $stmt->execute();
    }

    // Hapus komentar
    public function hapus($id)
    {
        $query = "DELETE FROM komentar WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    // 🔍 Ambil komentar berdasarkan ID
    public function getById($id)
    {
        $query = "SELECT * FROM komentar WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // ✏️ Update komentar berdasarkan ID
    public function update($id, $cerita_id, $user_id, $isi)
    {
        $query = "UPDATE komentar SET cerita_id = ?, user_id = ?, isi = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("iisi", $cerita_id, $user_id, $isi, $id);
        return $stmt->execute();
    }
}
?>
