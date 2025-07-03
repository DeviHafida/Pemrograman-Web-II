<?php
class Artikel
{
    private $conn;
    private $table_name = "artikel";

    public function __construct($db)
    {
        $this->conn = $db;
    }

    // Ambil semua artikel
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY created_at DESC";
        return $this->conn->query($query);
    }

    // Ambil artikel berdasarkan ID
    public function getById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM " . $this->table_name . " WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Ambil artikel + tag
    public function getByIdWithTags($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM artikel WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $artikel = $result->fetch_assoc();

        $stmtTags = $this->conn->prepare("SELECT tag_id FROM artikel_tag WHERE artikel_id = ?");
        $stmtTags->bind_param("i", $id);
        $stmtTags->execute();
        $resultTags = $stmtTags->get_result();
        $tag_ids = [];
        while ($row = $resultTags->fetch_assoc()) {
            $tag_ids[] = $row['tag_id'];
        }

        $artikel['tags'] = $tag_ids;
        return $artikel;
    }

    // Tambah artikel lengkap (judul, isi, kategori, gambar, tag)
    public function tambahLengkap($judul, $isi, $kategori_id, $tag_ids = [], $gambar = null)
    {
        $this->conn->begin_transaction();

        try {
            $stmt = $this->conn->prepare("INSERT INTO artikel (judul, isi, kategori_id, gambar) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssis", $judul, $isi, $kategori_id, $gambar);
            $stmt->execute();

            $artikel_id = $stmt->insert_id;

            if (!empty($tag_ids)) {
                $stmtTag = $this->conn->prepare("INSERT INTO artikel_tag (artikel_id, tag_id) VALUES (?, ?)");
                foreach ($tag_ids as $tag_id) {
                    $stmtTag->bind_param("ii", $artikel_id, $tag_id);
                    $stmtTag->execute();
                }
            }

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollback();
            return false;
        }
    }

    // Update artikel lengkap (judul, isi, kategori, gambar, tag)
    public function updateLengkap($id, $judul, $isi, $kategori_id, $tag_ids = [], $gambar = null)
    {
        $this->conn->begin_transaction();

        try {
            $stmt = $this->conn->prepare("UPDATE artikel SET judul = ?, isi = ?, kategori_id = ?, gambar = ? WHERE id = ?");
            $stmt->bind_param("ssisi", $judul, $isi, $kategori_id, $gambar, $id);
            $stmt->execute();

            $stmtDelete = $this->conn->prepare("DELETE FROM artikel_tag WHERE artikel_id = ?");
            $stmtDelete->bind_param("i", $id);
            $stmtDelete->execute();

            if (!empty($tag_ids)) {
                $stmtTag = $this->conn->prepare("INSERT INTO artikel_tag (artikel_id, tag_id) VALUES (?, ?)");
                foreach ($tag_ids as $tag_id) {
                    $stmtTag->bind_param("ii", $id, $tag_id);
                    $stmtTag->execute();
                }
            }

            $this->conn->commit();
            return true;
        } catch (Exception $e) {
            $this->conn->rollback();
            return false;
        }
    }

    // Update sederhana
    public function update($id, $judul, $isi)
    {
        $stmt = $this->conn->prepare("UPDATE " . $this->table_name . " SET judul = ?, isi = ? WHERE id = ?");
        $stmt->bind_param("ssi", $judul, $isi, $id);
        return $stmt->execute();
    }

    // Hapus artikel
    public function hapus($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM " . $this->table_name . " WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }

    public function insert($data)
    {
        $stmt = $this->conn->prepare("INSERT INTO " . $this->table_name . " (judul, isi, kategori_id, gambar) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssis", $data['judul'], $data['isi'], $data['kategori_id'], $data['gambar']);
        return $stmt->execute();
    }
}
