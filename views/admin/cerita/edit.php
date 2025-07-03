<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../../views/auth/login_form");
  exit;
}

require_once '../../../models/Cerita.php';

$success = false;
$error = '';
$cerita = new Cerita();

// Ambil ID dari parameter GET
$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
$data = $id ? $cerita->getById($id) : null;

if (!$data) {
  $error = "Cerita tidak ditemukan.";
}

// Proses ketika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $judul = $_POST['judul'] ?? '';
  $isi = $_POST['isi'] ?? '';

  if (!empty($judul) && !empty($isi)) {
    if ($cerita->update($id, $judul, $isi)) {
      $success = true;
    } else {
      $error = "Gagal mengedit cerita.";
    }
  } else {
    $error = "Judul dan isi cerita wajib diisi.";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>💖 Edit Cerita</title>
  <style>
    body {
      background: linear-gradient(135deg, #ffe4f2, #e0eaff);
      font-family: 'Comic Sans MS', cursive, sans-serif;
      padding: 60px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow-x: hidden;
    }

    .form-container {
      background: #fff;
      padding: 30px 40px;
      border-radius: 25px;
      box-shadow: 0 0 30px rgba(255, 192, 203, 0.3);
      max-width: 600px;
      width: 100%;
      position: relative;
    }

    h2 {
      text-align: center;
      font-size: 2rem;
      color: #d46dbf;
      margin-bottom: 20px;
      text-shadow: 1px 1px 2px #ffd6f9;
    }

    label {
      display: block;
      font-weight: bold;
      margin-top: 15px;
      color: #7a41a1;
    }

    input[type="text"],
    textarea {
      width: 90%;
      padding: 12px 15px;
      border-radius: 12px;
      border: 2px solid #f3d1f7;
      background: #fff8fc;
      font-family: inherit;
      font-size: 1rem;
      margin-top: 5px;
      margin-bottom: 10px;
      box-shadow: inset 0 0 4px rgba(0, 0, 0, 0.05);
      transition: 0.3s;
    }

    input:focus,
    textarea:focus {
      border-color: #dda0f0;
      background-color: #fef0ff;
      outline: none;
    }

    button {
      margin-top: 15px;
      width: 100%;
      padding: 12px;
      border-radius: 15px;
      background: linear-gradient(to right, #ff91c1, #d491ff);
      color: white;
      font-size: 1.1rem;
      font-weight: bold;
      border: none;
      cursor: pointer;
      transition: 0.4s ease;
      box-shadow: 0 5px 12px rgba(220, 100, 200, 0.4);
    }

    button:hover {
      transform: scale(1.05);
      background: linear-gradient(to right, #d491ff, #ff91c1);
    }

    .back-btn {
      text-align: center;
      margin-top: 15px;
    }

    .back-btn a {
      display: inline-block;
      text-decoration: none;
      padding: 10px 20px;
      border-radius: 12px;
      background-color: #ffd3f5;
      color: #914d94;
      font-weight: bold;
      border: 2px solid #ffb5e9;
      box-shadow: 0 3px 10px rgba(255, 182, 193, 0.4);
      transition: 0.3s ease;
    }

    .back-btn a:hover {
      background-color: #fce2ff;
      transform: scale(1.05);
    }

    .emoticon {
      position: absolute;
      font-size: 24px;
      animation: float 6s infinite ease-in-out alternate;
      opacity: 0.7;
      pointer-events: none;
    }

    .e1 {
      top: -20px;
      left: -10px;
      animation-delay: 0s;
    }

    .e2 {
      bottom: -10px;
      right: -10px;
      animation-delay: 1s;
    }

    .e3 {
      top: 20px;
      right: 20px;
      animation-delay: 2s;
    }

    @keyframes float {
      0% {
        transform: translateY(0);
      }

      100% {
        transform: translateY(10px);
      }
    }
  </style>
</head>

<body>

  <div class="form-container">
    <!-- Emotikon dekoratif -->
    <div class="emoticon e1">🌷</div>
    <div class="emoticon e2">💌</div>
    <div class="emoticon e3">🐱</div>

    <h2>🌸 Edit Cerita Yuk!</h2>

    <form method="POST">
      <label for="judul">📝 Judul Cerita:</label>
      <input type="text" name="judul" id="judul" value="<?= htmlspecialchars($data['judul'] ?? '') ?>">

      <label for="isi">💬 Isi Cerita:</label>
      <textarea name="isi" id="isi" rows="6"><?= htmlspecialchars($data['isi'] ?? '') ?></textarea>

      <button type="submit">✨ Simpan Perubahan</button>

      <div class="back-btn">
        <a href="index.php">← Kembali ke Daftar Cerita</a>
      </div>
    </form>
  </div>

  <?php if ($success): ?>
    <script>
      alert("✅ Cerita berhasil diperbarui!");
      window.location.href = "index.php";
    </script>
  <?php elseif (!empty($error)): ?>
    <script>
      alert("<?= htmlspecialchars($error) ?>");
    </script>
  <?php endif; ?>

</body>

</html>