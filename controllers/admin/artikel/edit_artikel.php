<?php
require_once '../../../config/database.php';
require_once '../../../models/Artikel.php';
require_once '../../../models/Kategori.php';
require_once '../../../models/Tag.php';

$db = new Database();
$conn = $db->getConnection();

$artikelModel = new Artikel($conn);
$kategoriModel = new Kategori($conn);
$tagModel = new Tag($conn);

$error = '';
$success = '';
$artikel = null;
$kategoriList = $kategoriModel->getAll();
$tagList = $tagModel->getAll();

$id = $_GET['id'] ?? null;

if (!$id || !is_numeric($id)) {
    die('ID Artikel tidak valid.');
}

// Ambil data artikel untuk ditampilkan di form
$artikel = $artikelModel->getByIdWithTags($id);
if (!$artikel) {
    die('Artikel tidak ditemukan.');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = trim($_POST['judul'] ?? '');
    $isi = trim($_POST['isi'] ?? '');
    $kategori_id = $_POST['kategori_id'] ?? null;
    $gambar = trim($_POST['gambar'] ?? '');
    $tag_ids = $_POST['tag_id'] ?? [];

    if (!empty($judul) && !empty($isi) && $kategori_id) {
        $berhasil = $artikelModel->updateLengkap($id, $judul, $isi, $kategori_id, $tag_ids, $gambar);
        if ($berhasil) {
            header('Location: ../../../views/admin/artikel/index.php');
            exit;
        } else {
            $error = "Gagal memperbarui artikel.";
        }
    } else {
        $error = "Judul, isi, dan kategori wajib diisi!";
    }
}

include '../../../views/admin/artikel/edit_artikel.php';
