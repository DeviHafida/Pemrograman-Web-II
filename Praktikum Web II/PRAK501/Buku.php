<?php
require_once("Model.php");

$daftarBuku = getAllBuku();

if (isset($_GET['hapus'])) {
    deleteBuku($_GET['hapus']);
    header("Location: Buku.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f7f9;
            padding: 20px;
        }
        .container {
            max-width: 1000px;
            margin: auto;
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #2c3e50;
            margin-bottom: 20px;
        }
        .btn-add {
            text-decoration: none;
            background-color: #27ae60;
            color: white;
            padding: 10px 16px;
            border-radius: 6px;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
        }
        .btn-add:hover {
            background-color: #219150;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #e0e0e0;
        }
        th {
            background-color: #2980b9;
            color: white;
        }
        td {
            color: #2c3e50;
        }
        .aksi-buttons {
            display: flex;
            gap: 8px;
        }
        .btn-action {
            background-color: #3498db;
            color: white;
            padding: 6px 12px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 13px;
            transition: background-color 0.2s ease-in-out;
        }
        .btn-action:hover {
            background-color: #2980b9;
        }
        .btn-delete {
            background-color: #e74c3c;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Daftar Buku</h2>
    <a class="btn-add" href="FormBuku.php">+ Tambah Buku</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($daftarBuku as $b): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($b['judul_buku']) ?></td>
                    <td><?= htmlspecialchars($b['penulis']) ?></td>
                    <td><?= htmlspecialchars($b['penerbit']) ?></td>
                    <td><?= htmlspecialchars($b['tahun_terbit']) ?></td>
                    <td>
                        <div class="aksi-buttons">
                            <a class="btn-action" href="FormBuku.php?id=<?= $b['id_buku'] ?>">Edit</a>
                            <a class="btn-action btn-delete" href="Buku.php?hapus=<?= $b['id_buku'] ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

</body>
</html>