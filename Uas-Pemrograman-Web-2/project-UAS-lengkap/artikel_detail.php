<?php
require_once 'config/database.php';
require_once 'models/Artikel.php';

// Cek apakah ID artikel tersedia di URL
if (!isset($_GET['id'])) {
    echo "Artikel tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']); // pastikan ID berupa integer

// Buat koneksi dan ambil artikel berdasarkan ID
$db = new Database();
$conn = $db->getConnection();
$artikelModel = new Artikel($conn);
$artikel = $artikelModel->getById($id);

// Jika tidak ditemukan
if (!$artikel) {
    echo "Artikel tidak ditemukan atau sudah dihapus.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($artikel['judul']) ?></title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(270deg, #fff0f5, #fce4ec, #ffe0f0, #f8bbd0);
            background-size: 800% 800%;
            animation: gradientFlow 15s ease infinite;
            color: #4a4a4a;
        }

        main {
            padding: 40px 20px;
            max-width: 960px;
            margin: 40px auto;
            background-color: #ffffffdd;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(255, 192, 203, 0.3);
            animation: fadeIn 1.5s ease;
        }

        h2 {
            font-size: 32px;
            color: #c2185b;
            margin-bottom: 10px;
            text-align: center;
        }

        small {
            display: block;
            text-align: center;
            color: #888;
            margin-bottom: 30px;
        }

        p {
            max-width: 800px;
            line-height: 1.8;
            font-size: 16px;
            margin: 0 auto;
            text-align: justify;
        }

        .gambar {
            display: block;
            margin: 30px auto 20px auto;
            border-radius: 12px;
            max-width: 100%;
            max-height: 400px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes gradientFlow {
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
    </style>
</head>

<body>

    <?php include 'views/partials/header.php'; ?>

    <main>
        <h2><?= htmlspecialchars($artikel['judul']) ?></h2>
        <small>Diposting pada: <?= date('d M Y', strtotime($artikel['created_at'])) ?></small>

        <?php if (!empty($artikel['gambar'])): ?>
            <img src="<?= htmlspecialchars($artikel['gambar']) ?>" alt="Gambar Artikel" class="gambar">
        <?php endif; ?>

        <p><?= nl2br(htmlspecialchars($artikel['isi'])) ?></p>
    </main>

    <?php include 'views/partials/footer.php'; ?>

</body>

</html>