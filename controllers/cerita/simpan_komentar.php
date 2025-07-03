<?php
session_start();
require_once '../../models/Database.php';
$db = new Database();
$conn = $db->getConnection();

$isi = trim($_POST['isi'] ?? '');
$cerita_id = (int)($_POST['cerita_id'] ?? 0);
$user_id = (int)($_SESSION['user_id'] ?? 0);

if (!empty($isi) && $cerita_id > 0 && $user_id > 0) {
    $stmt = $conn->prepare("INSERT INTO komentar (isi, user_id, cerita_id) VALUES (?, ?, ?)");
    $stmt->bind_param("sii", $isi, $user_id, $cerita_id);
    $stmt->execute();
}

header("Location: ../../bilik_cerita.php");
exit;