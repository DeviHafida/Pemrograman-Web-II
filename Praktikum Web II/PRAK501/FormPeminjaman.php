<?php
require_once("Model.php");

date_default_timezone_set('Asia/Makassar'); 

$members = getAllMember();
$buku = getAllBuku();

$today = new DateTime('now', new DateTimeZone('Asia/Makassar'));
$tanggal_pinjam = $today->format('Y-m-d H:i:s');
$tanggal_kembali = (clone $today)->modify('+7 days')->format('Y-m-d H:i:s');

$tanggal_pinjam_display = (new DateTime($tanggal_pinjam))->format('Y-m-d');
$tanggal_kembali_display = (new DateTime($tanggal_kembali))->format('Y-m-d');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_POST['tgl_pinjam'] = $tanggal_pinjam;
    $_POST['tgl_kembali'] = $tanggal_kembali;

    insertPeminjaman($_POST);
    header("Location: Peminjaman.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Peminjaman</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f7f9;
            padding: 30px;
        }
        h2 {
            color: #2c3e50;
            text-align: center;
        }
        form {
            max-width: 500px;
            margin: auto;
            background-color: #ffffff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        label {
            font-weight: bold;
            display: block;
            margin-top: 15px;
        }
        input[type="text"],
        input[type="date"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #27ae60;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            margin-top: 20px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #219150;
        }
        input[readonly] {
            background-color: #eaeaea;
        }
    </style>
</head>
<body>

<h2>Form Peminjaman</h2>
<form method="post">
    <label>Nama Member:</label>
    <select name="id_member" required>
        <option value="">-- Pilih Member --</option>
        <?php foreach ($members as $m): ?>
            <option value="<?= $m['id_member'] ?>"><?= htmlspecialchars($m['nama_member']) ?></option>
        <?php endforeach; ?>
    </select>

    <label>Judul Buku:</label>
    <select name="id_buku" required>
        <option value="">-- Pilih Buku --</option>
        <?php foreach ($buku as $b): ?>
            <option value="<?= $b['id_buku'] ?>"><?= htmlspecialchars($b['judul_buku']) ?></option>
        <?php endforeach; ?>
    </select>

    <label>Tanggal Pinjam:</label>
    <input type="date" name="tgl_pinjam_display" value="<?= $tanggal_pinjam_display ?>" readonly>
    <input type="hidden" name="tgl_pinjam" value="<?= $tanggal_pinjam ?>">
    <label>Tanggal Kembali:</label>
    <input type="date" name="tgl_kembali_display" value="<?= $tanggal_kembali_display ?>" readonly>
    <input type="hidden" name="tgl_kembali" value="<?= $tanggal_kembali ?>">
    <input type="submit" value="Simpan">
</form>

</body>
</html>