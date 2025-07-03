<?php
require_once '../../../config/database.php';

$conn = (new Database())->getConnection();

$id = $_GET['id'] ?? null;
$error = '';
$success = false;

// Cek keberadaan tag
if (!$id) {
  echo "<script>alert('ID tag tidak ditemukan!'); window.location.href='index.php';</script>";
  exit;
}

$query = $conn->prepare("SELECT * FROM tag WHERE id = ?");
$query->bind_param("i", $id);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_assoc();

if (!$data) {
  echo "<script>alert('Data tag tidak ditemukan!'); window.location.href='index.php';</script>";
  exit;
}

// Jika form disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nama = trim($_POST['nama_tag']);
  $errors = [];

  if (empty($nama)) {
    $errors[] = "Nama tag wajib diisi.";
  } elseif (strlen($nama) < 3) {
    $errors[] = "Nama tag minimal 3 karakter.";
  }

  if (empty($errors)) {
    $stmt = $conn->prepare("UPDATE tag SET nama_tag = ? WHERE id = ?");
    $stmt->bind_param("si", $nama, $id);
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
  <title>Edit Tag</title>
  <style>
    body {
      font-family: 'Comic Sans MS', cursive;
      background: linear-gradient(135deg, #fff0f5, #e1bee7);
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      padding: 20px;
    }

    .form-container {
      background: #fff;
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      width: 400px;
    }

    h2 {
      text-align: center;
      color: #8e44ad;
      margin-bottom: 20px;
    }

    input[type="text"] {
      width: 100%;
      padding: 12px;
      border-radius: 10px;
      border: 2px solid #f3c6f3;
      margin-bottom: 15px;
      font-family: inherit;
    }

    button {
      width: 100%;
      padding: 12px;
      border: none;
      background: linear-gradient(to right, #ec407a, #ba68c8);
      color: white;
      font-weight: bold;
      border-radius: 12px;
      cursor: pointer;
      font-size: 1rem;
    }

    button:hover {
      background: linear-gradient(to right, #ba68c8, #ec407a);
    }

    .back {
      text-align: center;
      margin-top: 10px;
    }

    .back a {
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
    <h2>✏️ Edit Tag</h2>

    <?php if (!empty($error)): ?>
      <div class="error-message"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST">
      <input type="text" name="nama_tag" value="<?= htmlspecialchars($data['nama_tag']) ?>" required>
      <button type="submit">💾 Simpan Perubahan</button>
    </form>

    <div class="back">
      <a href="index.php">← Kembali ke Data Tag</a>
    </div>
  </div>

  <?php if ($success): ?>
    <script>
      alert("✅ Tag berhasil diperbarui!");
      window.location.href = "index.php";
    </script>
  <?php endif; ?>
</body>

</html>