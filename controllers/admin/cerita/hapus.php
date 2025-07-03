<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../views/admin/login_form");
    exit;
}

require_once '../../../models/Cerita.php';
$cerita = new Cerita();

$message = "";

// Ambil ID dari parameter GET
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($id > 0) {
    if ($cerita->delete($id)) {
        $message = "Cerita berhasil dihapus.";
    } else {
        $message = "Gagal menghapus cerita.";
    }
} else {
    $message = "ID cerita tidak valid.";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Hapus Cerita</title>
    <script>
        alert("<?= htmlspecialchars($message, ENT_QUOTES, 'UTF-8') ?>");
        window.location.href = "/project-UAS-lengkap/views/admin/cerita/index.php";
    </script>
</head>

<body></body>

</html>