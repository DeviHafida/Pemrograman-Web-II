<?php
require_once '../../config/database.php';
require_once '../../models/UserModel.php';

$db = new Database();
$userModel = new UserModel($db->getConnection());

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $telepon = $_POST['telepon'];

    if ($userModel->register($nama, $password, $email, $telepon)) {
        header("Location: ../../views/auth/login_form.php?success=1");
        exit;
    } else {
        header("Location: ../../views/auth/register_form.php?error=1");
        exit;
    }
}
