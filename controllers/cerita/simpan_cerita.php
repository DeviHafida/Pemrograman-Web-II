<?php
session_start();
require_once '../../models/Database.php';

$db = new Database();
$conn = $db->getConnection();

// ✅ Pastikan user login
if (!isset($_SESSION['user_id'])) {
    $_SESSION['message'] = "Silakan login terlebih dahulu.";
    $_SESSION['message_type'] = "warning";
    header("Location: ../../views/auth/login_form.php");
    exit;
}

// ✅ Ambil dan validasi input
$judul    = trim($_POST['judul'] ?? '');
$isi      = trim($_POST['isi'] ?? '');
$user_id  = $_SESSION['user_id'];

// ✅ Cek input wajib
if (empty($judul) || empty($isi)) {
    $_SESSION['message'] = "Judul dan isi cerita wajib diisi.";
    $_SESSION['message_type'] = "error";
    header("Location: ../../bilik_cerita.php");
    exit;
}

// ✅ Simpan cerita ke database
try {
    $stmt = $conn->prepare("INSERT INTO cerita (user_id, judul, isi) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $user_id, $judul, $isi);

    if ($stmt->execute()) {
        $_SESSION['message'] = "Cerita berhasil dibagikan!";
        $_SESSION['message_type'] = "success";
    } else {
        $_SESSION['message'] = "Gagal menyimpan cerita. Silakan coba lagi.";
        $_SESSION['message_type'] = "error";
    }

    $stmt->close();
} catch (Exception $e) {
    $_SESSION['message'] = "Terjadi kesalahan: " . $e->getMessage();
    $_SESSION['message_type'] = "error";
}

$conn->close();

header("Location: ../../bilik_cerita.php");
exit;
