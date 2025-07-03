<?php
session_start();

require_once '../../config/database.php';
require_once '../../models/UserModel.php';

$db = new Database();
$conn = $db->getConnection();
$userModel = new UserModel($conn);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $user = $userModel->login($email);

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['nama'] = $user['nama']; // lebih aman daripada 'username'
        $_SESSION['role'] = $user['role'];

        if ($user['role'] === 'admin') {
            header("Location: ../../views/admin/dashboard.php");
        } else {
            header("Location: ../../index.php");
        }
        exit;
    } else {
        // Kirim error balik ke login_form.php
        header("Location: ../../views/auth/login_form.php?error=1");
        exit;
    }
}
