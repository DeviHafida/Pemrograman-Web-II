<?php
require_once '../../../models/User.php';
$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $errors = [];

  if (empty($_POST['username'])) {
    $errors[] = "Username wajib diisi.";
  }
  if (empty($_POST['nama'])) {
    $errors[] = "Nama wajib diisi.";
  }
  if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Email tidak valid.";
  }
  if (empty($_POST['telepon']) || !preg_match('/^[0-9]{10,15}$/', $_POST['telepon'])) {
    $errors[] = "Telepon harus terdiri dari 10-15 digit angka.";
  }
  if (empty($_POST['password']) || strlen($_POST['password']) < 6) {
    $errors[] = "Password minimal 6 karakter.";
  }
  if (empty($_POST['role']) || !in_array($_POST['role'], ['user', 'admin'])) {
    $errors[] = "Role harus dipilih (user/admin).";
  }

  if (empty($errors)) {
    $user = new User();
    $user->add($_POST);
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
  <title>Tambah User</title>
  <style>
    body {
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background: linear-gradient(135deg, #fff0f5, #ffe6fa, #e0c3fc);
      background-size: 300% 300%;
      animation: shiftBG 12s ease infinite;
      padding: 40px 20px;
      min-height: 100vh;
      box-sizing: border-box;
    }

    @keyframes shiftBG {
      0% {
        background-position: 0% 50%;
      }

      50% {
        background-position: 100% 50%;
      }

      100% {
        background-position: 0% 50%;
      }
    }

    .form-wrapper {
      max-width: 500px;
      margin: auto;
      background: #ffffffdd;
      border-radius: 20px;
      padding: 30px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 2;
    }

    h2 {
      font-size: 2rem;
      text-align: center;
      color: #9b59b6;
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      color: #6a1b9a;
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"],
    input[type="email"],
    input[type="number"],
    select {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #d8bfd8;
      background: #fff9fd;
      font-family: inherit;
      font-size: 1rem;
    }

    input:focus,
    select:focus {
      border-color: #ce93d8;
      background-color: #f3e5f5;
      outline: none;
    }

    button {
      width: 100%;
      padding: 12px;
      border-radius: 12px;
      background: linear-gradient(to right, #f48fb1, #ce93d8);
      color: white;
      font-size: 1rem;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: 0.3s ease;
      margin-top: 20px;
    }

    button:hover {
      background: linear-gradient(to right, #ce93d8, #f48fb1);
    }

    .btn-back {
      display: inline-block;
      margin-top: 15px;
      background-color: #ffffff;
      color: #8e44ad;
      padding: 10px 18px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
      text-align: center;
    }

    .btn-back:hover {
      background-color: #fcdff0;
    }

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 15px;
      font-weight: bold;
    }

    .cloud {
      position: absolute;
      background: #ffffff;
      border-radius: 50%;
      opacity: 0.2;
      animation: floatCloud 40s linear infinite;
    }

    .cloud1 {
      width: 100px;
      height: 60px;
      top: 10%;
      left: -100px;
      animation-delay: 0s;
    }

    .cloud2 {
      width: 140px;
      height: 70px;
      top: 30%;
      left: -200px;
      animation-delay: 10s;
    }

    .cloud3 {
      width: 180px;
      height: 80px;
      bottom: 15%;
      left: -300px;
      animation-delay: 20s;
    }

    @keyframes floatCloud {
      0% {
        transform: translateX(0);
      }

      100% {
        transform: translateX(160vw);
      }
    }
  </style>
</head>

<body>

  <div class="cloud cloud1"></div>
  <div class="cloud cloud2"></div>
  <div class="cloud cloud3"></div>

  <div class="form-wrapper">
    <h2>👤 Tambah User</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <label for="username">🆔 Username</label>
      <input type="text" name="username" id="username" required>

      <label for="nama">👩 Nama Lengkap</label>
      <input type="text" name="nama" id="nama" required>

      <label for="email">📧 Email</label>
      <input type="email" name="email" id="email" required>

      <label for="telepon">📱 Telepon</label>
      <input type="text" name="telepon" id="telepon" required>

      <label for="password">🔐 Password</label>
      <input type="password" name="password" id="password" required>

      <label for="role">🛡️ Role</label>
      <select name="role" id="role" required>
        <option value="user">User</option>
        <option value="admin">Admin</option>
      </select>

      <button type="submit">💾 Simpan</button>

      <div style="text-align:center;">
        <a href="index.php" class="btn-back">← Kembali ke Daftar User</a>
      </div>
    </form>
  </div>

  <?php if ($success): ?>
    <script>
      alert("✅ User berhasil ditambahkan!");
      window.location.href = "index.php";
    </script>
  <?php endif; ?>

</body>

</html>