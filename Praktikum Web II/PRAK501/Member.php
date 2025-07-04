<?php
require_once("Model.php");

$members = getAllMember();

if (isset($_GET['hapus'])) {
    deleteMember($_GET['hapus']);
    header("Location: Member.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Member</title>
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
    <h2>Daftar Member</h2>
    <a class="btn-add" href="FormMember.php">+ Tambah Member</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Nomor</th>
                <th>Alamat</th>
                <th>Tanggal Mendaftar</th>
                <th>Tanggal Terakhir Bayar</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; foreach ($members as $m): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= htmlspecialchars($m['nama_member']) ?></td>
                    <td><?= $m['no_member'] ?></td>
                    <td><?= htmlspecialchars($m['alamat']) ?></td>
                    <td><?= $m['tgl_mendaftar'] ?></td>
                    <td><?= $m['tgl_terakhir_bayar'] ?></td>
                    <td>
                        <div class="aksi-buttons">
                            <a class="btn-action" href="FormMember.php?id=<?= $m['id_member'] ?>">Edit</a>
                            <a class="btn-action btn-delete" href="Member.php?hapus=<?= $m['id_member'] ?>" onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>