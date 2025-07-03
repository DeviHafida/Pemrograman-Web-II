<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>💖 Edit Artikel</title>
  <style>
    body {
      background: linear-gradient(135deg, #ffe4f2, #e0eaff);
      font-family: 'Comic Sans MS', cursive, sans-serif;
      padding: 60px 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    .form-container {
      background: #fff;
      padding: 30px 40px;
      border-radius: 25px;
      box-shadow: 0 0 30px rgba(255, 192, 203, 0.3);
      max-width: 700px;
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
    textarea,
    select {
      width: 100%;
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
    textarea:focus,
    select:focus {
      border-color: #dda0f0;
      background-color: #fef0ff;
      outline: none;
    }

    .checkbox-group label {
      font-weight: normal;
      display: block;
      margin-left: 5px;
      margin-bottom: 8px;
      color: #6a1b9a;
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

    .error-message {
      color: red;
      text-align: center;
      margin-bottom: 10px;
    }
  </style>
</head>

<body>

  <?php
  $emojiSet = ['🧁', '🐱', '🌷', '🍇', '🎀', '💖', '🐰', '💎', '🦋'];
  echo "<div class='emoticon e1'>" . $emojiSet[array_rand($emojiSet)] . "</div>";
  echo "<div class='emoticon e2'>" . $emojiSet[array_rand($emojiSet)] . "</div>";
  echo "<div class='emoticon e3'>" . $emojiSet[array_rand($emojiSet)] . "</div>";
  ?>

  <div class="form-container">
    <h2>📝 Form Edit Artikel</h2>

    <?php if (!empty($error)) echo "<p class='error-message'>" . htmlspecialchars($error) . "</p>"; ?>

    <form method="POST">
      <label for="judul">📌 Judul:</label>
      <input type="text" name="judul" id="judul" value="<?= htmlspecialchars($artikel['judul'] ?? '') ?>" required>

      <label for="isi">📄 Isi:</label>
      <textarea name="isi" id="isi" rows="8" required><?= htmlspecialchars($artikel['isi'] ?? '') ?></textarea>
      <label for="gambar">🖼️ Link Gambar:</label>
      <input type="text" name="gambar" id="gambar" value="<?= htmlspecialchars($artikel['gambar'] ?? '') ?>" placeholder="https://contoh.com/gambar.jpg">

      <?php if (!empty($artikel['gambar'])): ?>
        <img src="<?= htmlspecialchars($artikel['gambar']) ?>" alt="Preview Gambar" style="max-width:100%; margin-top: 10px; border-radius: 12px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
      <?php endif; ?>

      <label for="kategori_id">📂 Kategori:</label>
      <select name="kategori_id" id="kategori_id" required>
        <option value="">-- Pilih Kategori --</option>
        <?php foreach ($kategoriList as $kategori): ?>
          <option value="<?= $kategori['id'] ?>" <?= ($kategori['id'] == ($artikel['kategori_id'] ?? '')) ? 'selected' : '' ?>>
            <?= htmlspecialchars($kategori['nama_kategori']) ?>
          </option>
        <?php endforeach; ?>
      </select>

      <label>🏷️ Tag:</label>
      <div class="checkbox-group">
        <?php foreach ($tagList as $tag): ?>
          <label>
            <input type="checkbox" name="tag_id[]" value="<?= $tag['id'] ?>"
              <?= in_array($tag['id'], $artikel['tags'] ?? []) ? 'checked' : '' ?>>
            <?= htmlspecialchars($tag['nama_tag']) ?>
          </label>
        <?php endforeach; ?>
      </div>

      <button type="submit">💾 Perbarui</button>

      <div class="back-btn">
        <a href="../../../views/admin/artikel/index.php">← Kembali</a>
      </div>
    </form>
  </div>

</body>

</html>