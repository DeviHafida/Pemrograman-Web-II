<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header("Location: ../../views/auth/login_form");
  exit;
}

require_once '../../../models/Cerita.php';

$success = false;
$error = '';

if ($_POST) {
  $cerita = new Cerita();
  $user_id = $_SESSION['user_id'];
  $judul = ($_POST['judul']);
  $isi = ($_POST['isi']);

  if (!empty($judul) && !empty($isi)) {
    if ($cerita->insert($user_id, $judul, $isi)) {
      $success = true;
    } else {
      $error = "Gagal menyimpan cerita";
    }
  } else {
    $error = "Judul dan cerita wajib diisi";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Tambah Cerita</title>
  <style>
    body {
      font-family: 'Comic Sans MS', cursive, sans-serif;
      background: linear-gradient(135deg, #fff0f5, #ffe6fa, #e0c3fc);
      background-size: 300% 300%;
      animation: shiftBG 12s ease infinite;
      overflow-x: hidden;
      overflow-y: auto;
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
      max-width: 600px;
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
    textarea {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #d8bfd8;
      background: #fff9fd;
      font-family: inherit;
      font-size: 1rem;
    }

    input:focus,
    textarea:focus {
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
      box-shadow: 0 5px 12px rgba(255, 192, 203, 0.3);
      margin-top: 15px;
    }

    button:hover {
      background: linear-gradient(to right, #ce93d8, #f48fb1);
    }

    .back-btn {
      display: block;
      text-align: center;
      margin-top: 15px;
    }

    .back-btn a {
      display: inline-block;
      background-color: #ffffff;
      color: #8e44ad;
      padding: 10px 20px;
      border-radius: 12px;
      font-weight: bold;
      text-decoration: none;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
      transition: 0.2s;
    }

    .back-btn a:hover {
      background-color: #fcdff0;
      transform: scale(1.05);
    }

    .emot {
      position: absolute;
      font-size: 28px;
      animation: bounceEmot 6s infinite ease-in-out alternate;
      z-index: 1;
      user-select: none;
      pointer-events: none;
    }

    @keyframes bounceEmot {
      0% {
        transform: translateY(-60px) rotate(0deg);
        opacity: 0.8;
      }

      50% {
        transform: translateY(100vh) rotate(360deg);
        opacity: 1;
      }

      100% {
        transform: translateY(-60px) rotate(-360deg);
        opacity: 0.8;
      }
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

  <!-- Awan -->
  <div class="cloud cloud1"></div>
  <div class="cloud cloud2"></div>
  <div class="cloud cloud3"></div>

  <!-- Emoticon Melayang -->
  <?php
  $emots = ['🌸', '🐰', '🎀', '💖', '✨', '🦄', '💌', '🐥'];
  for ($i = 0; $i < 10; $i++) {
    $emo = $emots[array_rand($emots)];
    $left = rand(0, 100);
    $delay = rand(0, 10) / 2;
    echo "<div class='emot' style='left: {$left}vw; animation-delay: {$delay}s;'>$emo</div>";
  }
  ?>

  <!-- Form Tambah Cerita -->
  <div class="form-wrapper">
    <h2>📖 Tambah Cerita Baru</h2>
    <form method="POST">
      <label for="judul">📝 Judul Cerita</label>
      <input type="text" name="judul" id="judul" placeholder="Masukkan judul cerita..." required>

      <label for="isi">💬 Isi Cerita</label>
      <textarea name="isi" id="isi" rows="6" placeholder="Tulis ceritamu di sini..." required></textarea>

      <button type="submit">💾 Simpan Cerita</button>

      <div class="back-btn">
        <a href="index.php">← Kembali ke Daftar Cerita</a>
      </div>
    </form>
  </div>

  <!-- Validasi Pop-up -->
  <?php if ($success): ?>
    <script>
      alert("✅ Cerita berhasil ditambahkan!");
      window.location.href = "index.php";
    </script>
  <?php elseif (!empty($error)): ?>
    <script>
      alert("<?= $error ?>");
    </script>
  <?php endif; ?>

</body>

</html>