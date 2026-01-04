<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Daftar Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffeef3;
            padding: 30px;
        }

        h2 {
            color: #d6336c;
            text-align: center;
            margin-bottom: 25px;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 0 4px 10px rgba(115, 191, 118, 0.3);
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .btn-tambah {
            display: inline-block;
            background-color: #ff69b4;
            color: white;
            padding: 12px 25px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
            margin-bottom: 20px;
        }

        .btn-tambah:hover {
            background-color: #ff1493;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff0f5;
            border: 2px solid #ffc0cb;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(255, 182, 193, 0.4);
        }

        thead tr {
            background-color: #ff69b4;
            color: white;
            border-radius: 15px 15px 0 0;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: center;
            border-bottom: 1px solid #ffc0cb;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        tbody tr:hover {
            background-color: #ffd6e8;
        }

        a.action-link {
            color: #d6336c;
            font-weight: bold;
            text-decoration: none;
            margin: 0 8px;
            transition: color 0.3s ease;
        }

        a.action-link:hover {
            color: #ff1493;
        }
    </style>
</head>

<body>

    <h2>Daftar Buku</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="success-message"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="btn-container">
        <a href="<?= base_url('buku/create') ?>" class="btn-tambah">Tambah Buku</a>
        <a href="<?= base_url('dashboard') ?>" class="btn-tambah">Kembali ke Dashboard</a>
    </div>


    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Penerbit</th>
                <th>Tahun Terbit</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($bukus)): ?>
                <tr>
                    <td colspan="6" style="color:#d6336c; font-weight:bold;">Data buku kosong.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($bukus as $buku): ?>
                    <tr>
                        <td><?= $buku['id_buku'] ?></td>
                        <td><?= esc($buku['judul_buku']) ?></td>
                        <td><?= esc($buku['penulis']) ?></td>
                        <td><?= esc($buku['penerbit']) ?></td>
                        <td><?= esc($buku['tahun_terbit']) ?></td>
                        <td>
                            <a href="<?= base_url('buku/edit/' . $buku['id_buku']) ?>" class="action-link">Edit</a> |
                            <a href="<?= base_url('buku/delete/' . $buku['id_buku']) ?>" class="action-link" onclick="return confirm('Yakin ingin hapus?')">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

</body>

</html>