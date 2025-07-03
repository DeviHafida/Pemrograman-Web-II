<?php
require_once '../../../config/database.php';
require_once '../../../models/Artikel.php';
require_once '../../../models/Kategori.php';
require_once '../../../models/Tag.php';

$db = new Database();
$conn = $db->getConnection();
$artikel = new Artikel($conn);
$kategoriModel = new Kategori($conn);
$tagModel = new Tag($conn);

$kategoriList = $kategoriModel->getAll();
$tagList = $tagModel->getAll();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $isi = trim($_POST['isi'] ?? '');
    $kategori_id = $_POST['kategori_id'] ?? null;
    $tag_ids = $_POST['tag_id'] ?? [];

    if (!empty($judul) && !empty($isi) && $kategori_id) {
        $berhasil = $artikel->tambahLengkap($judul, $isi, $kategori_id, $tag_ids);
        if ($berhasil) {
            header('Location: ../../../views/admin/artikel/index.php');
            exit;
        } else {
            $error = "Gagal menyimpan artikel.";
        }
    } else {
        $error = "Judul, isi, dan kategori wajib diisi!";
    }
}

include '../../../views/admin/artikel/tambah_artikel.php';
