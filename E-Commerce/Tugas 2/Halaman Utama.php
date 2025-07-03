<?php
session_start();
$produk = [
    ["id" => 1, "nama" => "Indonesian Waterose Face Mist", "harga" => "Rp35.000,00", "gambar" => "indonesian-waterose-face-mist.jpeg"],
    ["id" => 2, "nama" => "Waterymelon Deep Hydration Toner", "harga" => "Rp145.000,00", "gambar" => "waterymelon-deep-hydration-toner.jpeg"],
    ["id" => 3, "nama" => "Waterymelon Deep Hydration Unscented Toner", "harga" => "Rp82.000,00", "gambar" => "waterymelon-deep-hydration-unscented-toner.jpeg"],
    ["id" => 4, "nama" => "Waterymelon Deep Hydration Emulsion", "harga" => "Rp105.000,00", "gambar" => "waterymelon-deep-hydration-emulsion.jpeg"],
    ["id" => 5, "nama" => "Oatmilk Gentle Facial Wash", "harga" => "Rp78.000,00", "gambar" => "oatmilk-gentle-facial-wash.jpeg"],
    ["id" => 6, "nama" => "Chill Out Calming Serum", "harga" => "Rp80.000,00", "gambar" => "chill-out-calming-serum.jpeg"],
    ["id" => 7, "nama" => "Oatmilk Day Creme", "harga" => "Rp70.000,00", "gambar" => "oatmilk-day-cream.jpeg"],
    ["id" => 8, "nama" => "Oat Probiotic Lightweight Sunscreen SPF 50", "harga" => "Rp90.000,00", "gambar" => "oat-probiotic-lightweight.jpeg"]
];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Derin Beauty</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="images/logo.jpeg" alt="Derin Beauty" style="height: 40px; vertical-align: middle;">
            <span>Derin Beauty</span>
        </div>
        <div class="menu">
            <a href="Halaman Utama.php">HOME</a>
            <a href="#category">CATEGORY</a>
            <a href="#event">EVENT</a>
        </div>
        <div class="icons">
            <?php if (isset($_SESSION['username'])): ?>
                <span>👤 <?= htmlspecialchars($_SESSION['username']) ?></span>
            <?php endif; ?>
            
            <a href="Logout.php">🔚 Logout</a>
        </div>
    </div>
    <div class="produk-container">
        <?php 
        $jumlah_produk = count($produk);
        for ($i = 0; $i < $jumlah_produk; $i++) : 
            if ($i % 4 == 0) echo '<div class="produk-row">'; 
        ?>
            <div class="produk">
                <img src="images/<?= $produk[$i]['gambar'] ?>" alt="<?= $produk[$i]['nama'] ?>">
                <h3><?= $produk[$i]['nama'] ?></h3>
                <p><?= $produk[$i]['harga'] ?></p>
                <?php 
                    $detail_page = "detail-" . strtolower(str_replace([' ', '/'], '-', $produk[$i]['nama'])) . ".php"; 
                ?>
                <a href="<?= $detail_page ?>">Lihat Detail</a>
            </div>
        <?php 
            if ($i % 4 == 3 || $i == $jumlah_produk - 1) echo '</div>'; 
        endfor; 
        ?>
    </div>

    <footer>
        <p>© 2025 Derin Beauty. All Rights Reserved.</p>
        <p><a href="about.php">About Us</a> | <a href="contact.php">Contact</a> | <a href="faq.php">FAQ</a></p>
    </footer>
</body>
</html>