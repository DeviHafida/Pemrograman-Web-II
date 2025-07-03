<?php
require_once '../../../models/User.php';
$user = new User();
$id = $_GET['id'] ?? null;

if (!$id || !$data = $user->getById($id)) {
  echo "<script>alert('User tidak ditemukan!'); window.location.href='index.php';</script>";
  exit;
}

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];

  if (empty($_POST['username'])) $errors[] = "Username wajib diisi.";
  if (empty($_POST['nama'])) $errors[] = "Nama wajib diisi.";
  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) $errors[] = "Email tidak valid.";
  if (empty($_POST['telepon']) || !preg_match('/^[0-9]{10,15}$/', $_POST['telepon'])) $errors[] = "Telepon harus terdiri dari 10-15 digit angka.";
  if (empty($_POST['role']) || !in_array($_POST['role'], ['user', 'admin'])) $errors[] = "Role harus dipilih.";

  if (empty($errors)) {
    $user->update($id, $_POST);
    $success = true;
  } else {
    $error = implode('<br>', $errors);
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Edit User</title>
  <style>
    body {
      background: linear-gradient(135deg, #ffe4f2, #e0eaff);
      font-family: 'Comic Sans MS', cursive;
      padding: 60px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .form-container {
      background: #fff;
      padding: 30px 40px;
      border-radius: 25px;
      box-shadow: 0 0 30px rgba(255, 192, 203, 0.3);
      max-width: 500px;
      width: 100%;
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      color: #d46dbf;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      color: #7a41a1;
      margin-top: 10px;
      display: block;
    }

    input,
    select {
      width: 100%;
      padding: 10px;
      border-radius: 12px;
      border: 1px solid #ddd;
      margin-bottom: 15px;
      font-size: 1rem;
      background: #f9f9f9;
    }

    button {
      width: 100%;
      padding: 12px;
      border-radius: 12px;
      background: linear-gradient(to right, #f48fb1, #ce93d8);
      color: white;
      font-weight: bold;
      border: none;
      cursor: pointer;
    }

    .back-btn {
      margin-top: 15px;
      text-align: center;
    }

    .back-btn a {
      text-decoration: none;
      color: #8e44ad;
      font-weight: bold;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 15px;
      font-weight: bold;
    }
  </style>
</head>

<body>

  <div class="form-container">
    <h2>👤 Edit Data User</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <label>Username</label>
      <input type="text" name="username" value="<?= htmlspecialchars($data['username']) ?>" required>

      <label>Nama</label>
      <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']) ?>" required>

      <label>Email</label>
      <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>" required>

      <label>Telepon</label>
      <input type="text" name="telepon" value="<?= htmlspecialchars($data['telepon']) ?>" required>

      <label>Role</label>
      <select name="role" required>
        <option value="user" <?= $data['role'] === 'user' ? 'selected' : '' ?>>User</option>
        <option value="admin" <?= $data['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
      </select>

      <button type="submit">💾 Simpan Perubahan</button>
    </form>

    <div class="back-btn">
      <a href="index.php">← Kembali ke Daftar User</a>
    </div>
  </div>

  <?php if ($success): ?>
    <script>
      alert("✅ User berhasil diubah!");
      window.location.href = "index.php";
    </script>
  <?php endif; ?>

</body>

</html>