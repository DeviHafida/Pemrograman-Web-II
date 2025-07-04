<?php
// Koneksi ke database
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'lentera pustaka'; 

$koneksi = new mysqli($host, $username, $password, $dbname);

// Cek koneksi
if ($koneksi->connect_error) {
    die("Connection failed: " . $koneksi->connect_error);
}

// Fungsi untuk mendapatkan semua member
function getAllMember() {
    global $koneksi;
    $query = "SELECT * FROM member";
    $result = $koneksi->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fungsi untuk menghapus member
function deleteMember($id) {
    global $koneksi;
    $query = "DELETE FROM member WHERE id_member = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Fungsi untuk mendapatkan member berdasarkan ID
function getMemberById($id) {
    global $koneksi;
    $query = "SELECT * FROM member WHERE id_member = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Fungsi untuk mendapatkan semua buku
function getAllBuku() {
    global $koneksi;
    $query = "SELECT * FROM buku";
    $result = $koneksi->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fungsi untuk mendapatkan buku berdasarkan ID
function getBukuById($id) {
    global $koneksi;
    $query = "SELECT * FROM buku WHERE id_buku = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

// Fungsi untuk mengupdate buku
function updateBuku($id, $data) {
    global $koneksi;
    $query = "UPDATE buku SET judul_buku = ?, penulis = ?, penerbit = ?, tahun_terbit = ? WHERE id_buku = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssii", $data['judul_buku'], $data['penulis'], $data['penerbit'], $data['tahun_terbit'], $id);
    $stmt->execute();
    $stmt->close();
}

// Fungsi untuk menambah buku
function insertBuku($data) {
    global $koneksi;
    $query = "INSERT INTO buku (judul_buku, penulis, penerbit, tahun_terbit) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("sssi", $data['judul_buku'], $data['penulis'], $data['penerbit'], $data['tahun_terbit']);
    $stmt->execute();
    $stmt->close();
}

// Fungsi untuk menghapus buku
function deleteBuku($id) {
    global $koneksi;
    $query = "DELETE FROM buku WHERE id_buku = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}

// Fungsi untuk menambah peminjaman
function insertPeminjaman($data) {
    global $koneksi;
    $query = "INSERT INTO peminjaman (id_member, id_buku, tgl_pinjam, tgl_kembali) VALUES (?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("iiss", $data['id_member'], $data['id_buku'], $data['tgl_pinjam'], $data['tgl_kembali']);
    $stmt->execute();
    $stmt->close();
}

// Fungsi untuk mendapatkan semua peminjaman
function getAllPeminjaman() {
    global $koneksi;
    $query = "SELECT p.*, m.nama_member, b.judul_buku FROM peminjaman p
              JOIN member m ON p.id_member = m.id_member
              JOIN buku b ON p.id_buku = b.id_buku";
    $result = $koneksi->query($query);
    return $result->fetch_all(MYSQLI_ASSOC);
}

// Fungsi untuk menghapus peminjaman
function deletePeminjaman($id) {
    global $koneksi;
    $query = "DELETE FROM peminjaman WHERE id_peminjaman = ?";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
}
?>