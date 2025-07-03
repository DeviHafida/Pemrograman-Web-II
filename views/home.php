<?php
// views/home.php

// Include file database (gunakan path absolut agar tidak error)
include_once __DIR__ . '/../config/database.php';

// Buat koneksi ke database
$db = new Database();
$conn = $db->getConnection();

// Query untuk mengambil 3 artikel terbaru
$query = "SELECT * FROM artikel ORDER BY tanggal_upload DESC LIMIT 3";
$result = mysqli_query($conn, $query);

// Jika query gagal, tampilkan pesan error
if (!$result) {
    die("Query error: " . mysqli_error($conn));
}
?>

<div class="container" style="padding: 30px; background-color: #fff0f5; min-height: 80vh;">
    <h2 style="color: #d36b9a; margin-bottom: 20px;">Artikel Terkini</h2>

    <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="article" style="display: flex; margin-bottom: 20px; background: #ffffff; border-radius: 10px; box-shadow: 0 2px 6px rgba(0,0,0,0.1); padding: 10px;">
            <div class="image" style="flex: 1;">
                <img src="<?= htmlspecialchars($row['source'] ?? 'assets/images/default.jpg') ?>" alt="Thumbnail" style="width: 100%; border-radius: 8px;">
            </div>
            <div class="content" style="flex: 3; padding-left: 20px; display: flex; align-items: center;">
                <h3><?= htmlspecialchars($row['judul'] ?? '(Judul tidak tersedia)') ?></h3>
            </div>
        </div>
    <?php endwhile; ?>
</div>