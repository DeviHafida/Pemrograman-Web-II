<?php
require_once '../../../config/database.php';
require_once '../../../models/Artikel.php';

$db = (new Database())->getConnection();
$artikel = new Artikel($db);

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    echo "<script>alert('❌ ID artikel tidak valid!'); window.location.href = '../../../views/admin/artikel/index.php';</script>";
    exit;
}

$berhasil = $artikel->hapus($id);

if ($berhasil) {
    echo "<script>alert('✅ Artikel berhasil dihapus!'); window.location.href = '../../../views/admin/artikel/index.php';</script>";
} else {
    echo "<script>alert('❌ Gagal menghapus artikel!'); window.location.href = '../../../views/admin/artikel/index.php';</script>";
}
exit;
