<?php
require_once("Model.php");

$id = $_GET['id'] ?? null;
$data = $id ? getBukuById($id) : [
    "judul_buku" => "",
    "penulis" => "",
    "penerbit" => "",
    "tahun_terbit" => ""
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($id) {
        updateBuku($id, $_POST);
    } else {
        insertBuku($_POST);
    }
    header("Location: Buku.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $id ? "Edit" : "Tambah" ?> Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f7f9;
            padding: 30px;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background-color: #fff;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }
        h2 {
            color: #2c3e50;
            text-align: center;
            margin-bottom: 25px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            color: #34495e;
        }
        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #2980b9;
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
        }
        input[type="submit"]:hover {
            background-color: #1f6391;
        }
        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #2980b9;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h2><?= $id ? "Edit Data Buku" : "Tambah Data Buku" ?></h2>
    <form method="post">
        <label for="judul_buku">Judul Buku:</label>
        <input type="text" name="judul_buku" id="judul_buku" value="<?= htmlspecialchars($data['judul_buku']) ?>" required>
        <label for="penulis">Penulis:</label>
        <input type="text" name="penulis" id="penulis" value="<?= htmlspecialchars($data['penulis']) ?>" required>
        <label for="penerbit">Penerbit:</label>
        <input type="text" name="penerbit" id="penerbit" value="<?= htmlspecialchars($data['penerbit']) ?>" required>
        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="number" name="tahun_terbit" id="tahun_terbit" value="<?= htmlspecialchars($data['tahun_terbit']) ?>" required>
        <input type="submit" value="Simpan">
    </form>
    <a class="back-link" href="Buku.php">← Kembali ke Daftar Buku</a>
</div>

</body>
</html>