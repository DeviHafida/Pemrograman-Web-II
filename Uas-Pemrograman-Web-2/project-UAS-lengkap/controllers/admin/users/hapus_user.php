<?php
require_once '../../../models/User.php';

if (!isset($_GET['id'])) {
    echo "<script>alert('ID user tidak ditemukan!'); window.location.href='../../../views/admin/users/index.php';</script>";
    exit;
}

$id = $_GET['id'];
$user = new User();
$data = $user->getById($id);

if (!$data) {
    echo "<script>alert('User tidak ditemukan!'); window.location.href='../../../views/admin/users/index.php';</script>";
    exit;
}

$user->delete($id);
echo "<script>alert('✅ User berhasil dihapus!'); window.location.href='../../../views/admin/users/index.php';</script>";
exit;
