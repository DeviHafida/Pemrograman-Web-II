<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Import Tag</title>
  <style>
    body {
      font-family: serif;
      background: linear-gradient(135deg, #fff0f5, #ffe6fa, #e0c3fc);
      background-size: 300% 300%;
      animation: shiftBG 12s ease infinite;
      overflow-x: hidden;
      padding: 40px 20px;
    }

    @keyframes shiftBG {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    h2 {
      text-align: center;
      color: #9b59b6;
      font-size: 2.2rem;
      margin-bottom: 25px;
    }

    .container {
      max-width: 600px;
      margin: auto;
      background: #ffffffdd;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(0,0,0,0.1);
      position: relative;
      z-index: 2;
    }

    .form-group {
      margin-bottom: 20px;
    }

    label {
      font-weight: bold;
      color: #6c3483;
      display: block;
      margin-bottom: 8px;
    }

    input[type="file"] {
      width: 100%;
      padding: 10px;
      border: 2px solid #dcd0ff;
      border-radius: 8px;
      background-color: #fff;
      font-size: 1rem;
    }

    .btn {
      display: inline-block;
      background-color: #ffffff;
      color: #8e44ad;
      padding: 10px 18px;
      border-radius: 10px;
      text-decoration: none;
      font-weight: bold;
      box-shadow: 2px 2px 6px rgba(0,0,0,0.2);
      transition: 0.2s;
      margin-top: 10px;
    }

    .btn:hover {
      background-color: #fcdff0;
    }

    .btn-group {
      display: flex;
      justify-content: space-between;
      gap: 10px;
    }

    .emot {
      position: absolute;
      font-size: 32px;
      animation: bounceEmot 6s infinite ease-in-out alternate;
      z-index: 1;
      user-select: none;
      pointer-events: none;
    }

    @keyframes bounceEmot {
      0% { transform: translateY(-60px) rotate(0deg); opacity: 0.8; }
      50% { transform: translateY(100vh) rotate(360deg); opacity: 1; }
      100% { transform: translateY(-60px) rotate(-360deg); opacity: 0.8; }
    }
  </style>
</head>
<body>

<!-- Emotikon melayang -->
<?php
$emots = ['📝', '✨', '📚', '🎀', '🌸', '📖'];
for ($i = 0; $i < 15; $i++) {
  $emo = $emots[array_rand($emots)];
  $left = rand(0, 100);
  $delay = rand(0, 10) / 2;
  echo "<div class='emot' style='left: {$left}vw; animation-delay: {$delay}s;'>$emo</div>";
}
?>

<div class="container">
  <h2>📥 Import Data Tag</h2>
  <form action="../../../controllers/admin/tag/import_tag.php" method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label>Upload file Excel untuk Tag:</label>
      <input type="file" name="file_excel" accept=".xls,.xlsx" required>
      <a href="index.php" class="btn">🔙 Kembali ke Data tag</a>
      <button type="submit" name="import" class="btn">📤 Import</button>
    </div>
  </form>
</div>

</body>
</html>