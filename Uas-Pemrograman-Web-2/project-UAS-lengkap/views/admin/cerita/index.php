<?php
require_once '../../../models/Cerita.php';
$cerita = new Cerita();
$data = $cerita->getAll();
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Daftar Cerita</title>
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

    h2 {
      text-align: center;
      color: #9b59b6;
      font-size: 2.5rem;
      margin-bottom: 30px;
    }

    .container {
      max-width: 1000px;
      margin: auto;
      background: #ffffffdd;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 25px rgba(0, 0, 0, 0.1);
      position: relative;
      z-index: 2;
    }

    .action-bar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
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
    }

    .btn:hover {
      background-color: #fcdff0;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      background: white;
      border-radius: 10px;
      overflow: hidden;
    }

    th,
    td {
      padding: 14px 16px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f7dcf7;
      color: #6c3483;
    }

    tr:hover {
      background-color: #fcebf9;
    }

    a.hapus {
      color: #e74c3c;
      font-weight: bold;
      text-decoration: none;
    }

    a.hapus:hover {
      text-decoration: underline;
    }

    a.edit {
      color: #3498db;
      font-weight: bold;
      margin-right: 8px;
      text-decoration: none;
    }

    a.edit:hover {
      text-decoration: underline;
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

  <!-- Emot lucu melayang -->
  <?php
  $emots = ['🐰', '🪷', '🌸', '🎀', '🧁', '💖', '✨', '📖', '🧸'];
  for ($i = 0; $i < 20; $i++) {
    $emo = $emots[array_rand($emots)];
    $left = rand(0, 100);
    $delay = rand(0, 10) / 2;
    echo "<div class='emot' style='left: {$left}vw; animation-delay: {$delay}s;'>$emo</div>";
  }
  ?>

  <div class="container">
    <h2>📚 Daftar Cerita ✨</h2>

    <div class="action-bar">
      <a href="../../../views/admin/dashboard.php" class="btn">🔙 Kembali ke Dashboard</a>
      <a href="tambah.php" class="btn">➕ Tambah Cerita</a>
      <a href="../../../controllers/admin/cerita/export_cerita.php?action=pdf" class="btn">📄 Download PDF</a>
      <a href="../../../controllers/admin/cerita/export_cerita.php?action=excel" class="btn">📊 Download Excel</a>
      <a href="import_form_cerita.php" class="btn">📥 Import Excel</a>

    </div>

    <table>
      <tr>
        <th>Judul Cerita</th>
        <th>Aksi</th>
      </tr>
      <?php while ($c = $data->fetch_assoc()): ?>
        <tr>
          <td><?= htmlspecialchars($c['judul']) ?></td>
          <td>
            <a href="edit.php?id=<?= $c['id'] ?>" class="edit">Edit</a>
            <a href="/project-UAS-lengkap/controllers/admin/cerita/hapus.php?id=<?= $c['id'] ?>" class="hapus" onclick="return confirm('Hapus cerita ini?')">Hapus</a>
          </td>
        </tr>
      <?php endwhile ?>
    </table>
  </div>

</body>

</html>