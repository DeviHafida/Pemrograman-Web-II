<?php
require_once '../../../config/database.php';

$conn = (new Database())->getConnection();

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = trim($_POST['nama_tag']);
  $errors = [];

  if (empty($nama)) {
    $errors[] = "Nama tag wajib diisi.";
  } elseif (strlen($nama) < 3) {
    $errors[] = "Nama tag minimal 3 karakter.";
  }

  if (empty($errors)) {
    $stmt = $conn->prepare("INSERT INTO tag (nama_tag) VALUES (?)");
    $stmt->bind_param("s", $nama);
    $stmt->execute();
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
  <title>➕ Tambah Tag</title>
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

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 15px;
      font-weight: bold;
    }

    label {
      font-weight: bold;
      color: #6a1b9a;
      display: block;
      margin-top: 15px;
      margin-bottom: 5px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #d8bfd8;
      background: #fff9fd;
      font-family: inherit;
      font-size: 1rem;
    }

    input:focus {
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

    .btn {
      display: inline-block;
      background-color: #ffffff;
      color: #8e44ad;
      padding: 10px 18px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
      transition: 0.2s;
      text-align: center;
      margin-top: 20px;
    }

    .btn:hover {
      background-color: #fcdff0;
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
  </style>
</head>

<body>

  <!-- Awan -->
  <div class="cloud cloud1"></div>
  <div class="cloud cloud2"></div>
  <div class="cloud cloud3"></div>

  <!-- Emoticon Melayang -->
  <?php
  $emots = ['🐰', '🪷', '🌸', '🎀', '🧁', '💖', '✨', '🐥'];
  for ($i = 0; $i < 12; $i++) {
    $emo = $emots[array_rand($emots)];
    $left = rand(0, 100);
    $delay = rand(0, 10) / 2;
    echo "<div class='emot' style='left: {$left}vw; animation-delay: {$delay}s;'>$emo</div>";
  }
  ?>

  <!-- Form Tambah Tag -->
  <div class="form-wrapper">
    <h2>🏷️ Tambah Tag Baru</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <label for="nama_tag">📌 Nama Tag:</label>
      <input type="text" name="nama_tag" id="nama_tag" required>

      <button type="submit">✨ Simpan Tag</button>

      <div style="text-align:center;">
        <a href="index.php" class="btn">← Kembali ke Daftar Tag</a>
      </div>
    </form>
  </div>

  <?php if ($success): ?>
    <script>
      alert("✅ Tag berhasil ditambahkan!");
      window.location.href = "index.php";
    </script>
  <?php endif; ?>

</body>

</html>