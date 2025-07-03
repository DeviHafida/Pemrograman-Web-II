<?php
require '../../config/database.php';

$db = new Database();
$conn = $db->getConnection();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';
$confirm_password = $_POST['confirm_password'] ?? '';

if (!$email || !$password || !$confirm_password) {
    die("Semua kolom wajib diisi.");
}

if ($password !== $confirm_password) {
    die("Password dan konfirmasi tidak cocok.");
}

$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Cek user berdasarkan email
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Email tidak ditemukan.");
}

$user = $result->fetch_assoc();
$user_id = $user['id'];

// Update password
$update = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
$update->bind_param("si", $hashed_password, $user_id);

if ($update->execute()) {
    echo "<script>alert('Password berhasil diubah!'); window.location.href='login_form.php';</script>";
} else {
    echo "Gagal mengubah password.";
}