<?php
require_once("koneksi.php");

$id = $_GET['id'] ?? null;
$data = $id ? getMemberById($id) : [];
$nama_member = htmlspecialchars($data['nama_member'] ?? '');
$nomor_member = htmlspecialchars($data['no_member'] ?? '');
$alamat = htmlspecialchars($data['alamat'] ?? '');
$tgl_mendaftar = $data['tgl_mendaftar'] ?? '';
$tgl_terakhir_bayar = $data['tgl_terakhir_bayar'] ?? '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($id) {
        updateMember($id, $_POST);
    } else {
        insertMember($_POST);
    }
    header("Location: Member.php");
    exit;
}

function getMemberById($id) {
    $conn = koneksi();
    $query = "SELECT * FROM member WHERE id_member = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function insertMember($data) {
    $conn = koneksi();
    
    $date = new DateTime('now', new DateTimeZone('Asia/Makassar'));
    $tgl_mendaftar = $date->format('Y-m-d H:i:s'); // Format waktu sesuai zona waktu

    $query = "INSERT INTO member (nama_member, no_member, alamat, tgl_mendaftar, tgl_terakhir_bayar) 
              VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $data['nama_member'], $data['no_member'], $data['alamat'], $tgl_mendaftar, $data['tgl_terakhir_bayar']);
    $stmt->execute();
    $stmt->close();
}

function updateMember($id, $data) {
    $conn = koneksi();
    
    $date = new DateTime('now', new DateTimeZone('Asia/Makassar'));
    $tgl_mendaftar = $date->format('Y-m-d H:i:s');

    $query = "UPDATE member SET nama_member = ?, no_member = ?, alamat = ?, tgl_terakhir_bayar = ? 
              WHERE id_member = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssssi", $data['nama_member'], $data['no_member'], $data['alamat'], $data['tgl_terakhir_bayar'], $id);
    $stmt->execute();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $id ? "Edit" : "Tambah" ?> Member</title>
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
        input[type="date"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 6px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }
        textarea {
            resize: vertical;
            height: 100px;
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
    <h2><?= $id ? "Edit Data Member" : "Tambah Data Member" ?></h2>
    <form method="post">
        <label for="nama_member">Nama Member:</label>
        <input type="text" name="nama_member" id="nama_member" value="<?= $nama_member ?>" required>
        <label for="no_member">Nomor Member:</label>
        <input type="text" name="no_member" id="no_member" value="<?= $nomor_member ?>" required>
        <label for="alamat">Alamat:</label>
        <textarea name="alamat" id="alamat" required><?= $alamat ?></textarea>
        <?php if ($id): ?>
            <label for="tgl_mendaftar">Tanggal Mendaftar:</label>
            <input type="text" name="tgl_mendaftar" id="tgl_mendaftar" value="<?= $tgl_mendaftar ?>" readonly>
        <?php endif; ?>
        <label for="tgl_terakhir_bayar">Tanggal Terakhir Bayar:</label>
        <input type="date" name="tgl_terakhir_bayar" id="tgl_terakhir_bayar" value="<?= $tgl_terakhir_bayar ?>" required>
        <input type="submit" value="Simpan">
    </form>
    <a class="back-link" href="Member.php">← Kembali ke Daftar Member</a>
</div>

</body>
</html>