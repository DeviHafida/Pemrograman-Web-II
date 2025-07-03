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
    ["id" => 8, "nama" => "Oat Probiotic Lightweight Sunscreen SPF 50", "harga" => "Rp90.000,00", "gambar" => "oat-probiotic-lightweight.jpeg"],
    ["id" => 9, "nama" => "Gentle Facial Wash Avoskin Natural Sublime Facial Cleanser", "harga" => "Rp124.000,00", "gambar" => "natural-sublime-facial-cleanser.jpg"],
    ["id" => 10, "nama" => "Ampoule Avoskin Miraculous Retinol", "harga" => "Rp299.000,00", "gambar" => "miraculous-retinol-ampoule.webp"],
    ["id" => 11, "nama" => "Your Skin Bae Acne & Pores Savior Balm Stick", "harga" => "Rp169.000,00", "gambar" => "your-skin-bae-acne-&-pores-savior-balm-stick.jpg"],
    ["id" => 12, "nama" => "Votre Peau Serum Peptide Concentrate", "harga" => "Rp185.000,00", "gambar" => "votre-peau-serum-peptide-concentrate.avif"],
    ["id" => 13, "nama" => "Votre Peau Niacinamide Booster Ampoule", "harga" => "Rp185.000,00", "gambar" => "votre-peau-niacinamide-booster-ampoule.avif"],
    ["id" => 14, "nama" => "Votre Peau Skin Care Daily Facial Sun Shield SPF 50 PA ++ ", "harga" => "Rp265.000,00", "gambar" => "votre-peau-skin-care-daily-facial-sun-shield-spf-50-pa+++.webp"],
    ["id" => 15, "nama" => "Votre Peau Brightening Essence With Niacinamide, Hyaluronic Acid", "harga" => "Rp249.000,00", "gambar" => "votre-peau-brightening-essence-with-niacinamide-hyaluronic-acid.png"],
    ["id" => 16, "nama" => "Votre Peau Serum Vitamin C pour Maharis", "harga" => "Rp385.000,00", "gambar" => "votre-peau-serum-vitamin-C-pour-Maharis.jpg"],
    ["id" => 17, "nama" => "Honey, I Dew Gel Cleanser", "harga" => "Rp108.000,00", "gambar" => "hale-honey-i-dew-gel-cleanser.png"],
    ["id" => 18, "nama" => "Smooth Like Butter Bifida & 5 Ceramides Cream Moisturizer", "harga" => "Rp159.000,00", "gambar" => "smooth-like-butter-bifida-&-5-ceramides-cream-moisturizer.png"],
    ["id" => 19, "nama" => "Deep Oasis Sleeping Mask + Night Moisturizer + Eye Cream", "harga" => "Rp159.000,00", "gambar" => "deep-oasis-sleeping-mask-+-night-moisturizer-+-eye-cream.png"],
    ["id" => 20, "nama" => "HALE Even Tone Potion", "harga" => "Rp149.000,00", "gambar" => "hale-even-tone-potion.webp"],
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Haflesta Allure</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode';
            background: linear-gradient(135deg, #f8c5d2, #f8d9e1);
        }
        .haflesta-title {
            font-family: 'Playfair Display SC', serif;
            font-weight: 600;
            font-size: 25px;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 70px; /* Tentukan tinggi navbar */
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            align-items: center;
            padding: 10px 20px;
        }
        .produk-container {
            margin-top: 80px !important;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: stretch;
            padding: 30px 15px;
        }
        .produk {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: 0.3s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }
        .produk:hover {
            transform: translateY(-5px);
        }
        .produk img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }
        .btn {
            padding: 12px 20px;
            border: none;
            cursor: pointer;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #fff;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="images/Logo Bulat Haflesta.png" alt="Haflesta Allure" style="height: 50px;" class="me-2">
                <span class="fw-bold haflesta-title">HAFLESTA ALLURE</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="Halaman Utama.php">HOME</a></li>
                    <li class="nav-item"><a class="nav-link" href="#category">CATEGORY</a></li>
                    <li class="nav-item"><a class="nav-link" href="#event">EVENT</a></li>
                </ul>
            </div>
            <div class="d-flex align-items-center">
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="me-2">👤 <?= htmlspecialchars($_SESSION['username']) ?></span>
                <?php endif; ?>
                <a href="Logout.php" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <!-- Produk -->
    <div class="container produk-container">
        <div class="row">
            <?php foreach ($produk as $item) : ?>
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="produk p-3">
                        <img src="images/<?= htmlspecialchars($item['gambar']) ?>" alt="<?= htmlspecialchars($item['nama']) ?>">
                        <h5 class="mt-2"><?= htmlspecialchars($item['nama']) ?></h5>
                        <p class="text-danger fw-bold"><?= htmlspecialchars($item['harga']) ?></p>
                        <?php 
                            $detail_page = "detail-" . strtolower(str_replace([' ', '/'], '-', $item['nama'])) . ".php"; 
                        ?>
                        <a href="<?= htmlspecialchars($detail_page) ?>" class="btn btn-primary btn-sm">Lihat Detail</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>2025 © Haflesta Allure. All Rights Reserved.</p>
        <p>
            <a href="about.php">About Us</a> | 
            <a href="contact.php">Contact</a> 
        </p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
