<?php
session_start();
require_once 'config/database.php';

$db = new Database();
$conn = $db->getConnection();

// Cek apakah pengguna ingin melihat semua artikel
$lihatSemua = isset($_GET['semua']) && $_GET['semua'] == 'true';

// Query artikel: 3 dulu, semua kalau ?semua=true
if ($lihatSemua) {
    $sql = "SELECT * FROM artikel ORDER BY created_at DESC";
} else {
    $sql = "SELECT * FROM artikel ORDER BY created_at DESC LIMIT 3";
}
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Artikel Terkini</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(to bottom right, #fff0f5, #fce4ec);
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .judul-section {
            text-align: center;
            color: #c2185b;
            font-size: 28px;
            margin-bottom: 30px;
        }

        .artikel-container {
            display: flex;
            flex-direction: column;
            gap: 25px;
        }

        .artikel-item {
            display: flex;
            gap: 20px;
            background: #fff9fb;
            border: 1px solid #ffe6ec;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 3px 10px rgba(255, 192, 203, 0.1);
        }

        .artikel-item img {
            width: 160px;
            height: auto;
            border-radius: 10px;
        }

        .artikel-content h3 {
            margin: 0;
            color: #ad1457;
        }

        .artikel-content p {
            color: #555;
            margin: 10px 0;
        }

        .artikel-content small {
            color: #888;
            font-style: italic;
        }

        .baca-link {
            display: inline-block;
            margin-top: 10px;
            color: #d81b60;
            text-decoration: none;
            font-weight: bold;
        }

        .baca-link:hover {
            text-decoration: underline;
        }

        .no-article {
            text-align: center;
            color: #777;
        }

        .lihat-lebih-btn {
            display: inline-block;
            background-color: #ffd6e0;
            color: #874356;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 3px 10px rgba(135, 67, 86, 0.1);
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 30px;
            text-align: center;
        }

        .lihat-lebih-btn:hover {
            background-color: #fcb6d0;
            transform: scale(1.05);
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #999;
        }
    </style>
</head>

<body>

    <?php include 'views/partials/header.php'; ?>

    <div class="container">
        <h2 class="judul-section">Artikel Terkini</h2>
        <div class="artikel-container">
            <?php if ($result && $result->num_rows > 0): ?>
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="artikel-item">
                        <?php if (!empty($row['gambar'])): ?>
                            <img src="<?= htmlspecialchars($row['gambar']) ?>" alt="Gambar Artikel">
                        <?php else: ?>
                            <img src="public/images/artikel-placeholder.jpg" alt="Gambar Default">
                        <?php endif; ?>
                        <div class="artikel-content">
                            <h3><?= htmlspecialchars($row['judul']) ?></h3>
                            <p><?= nl2br(htmlspecialchars(substr($row['isi'], 0, 150))) ?>...</p>
                            <small>Diposting pada: <?= date('d M Y', strtotime($row['created_at'])) ?></small>
                            <br>
                            <a href="artikel_detail.php?id=<?= $row['id'] ?>" class="baca-link">Baca Selengkapnya...</a>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php else: ?>
                <p class="no-article">Belum ada artikel yang tersedia.</p>
            <?php endif; ?>
        </div>

        <?php if (!$lihatSemua): ?>
            <div style="text-align: center;">
                <a href="index.php?semua=true" class="lihat-lebih-btn">Lihat Artikel Lebih Banyak</a>
            </div>
        <?php endif; ?>
    </div>

    <?php include 'views/partials/footer.php'; ?>

</body>

</html>