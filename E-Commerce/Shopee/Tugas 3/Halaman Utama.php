<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: Sign-Up-&-Login.php'); 
    exit();
}
if (isset($_GET['logout'])) {
    session_destroy();
    header('Location: Logout.php');
    exit();
}
$produk = [
    [
        'nama' => 'Indonesian Waterose Face Mist',
        'harga' => 35000,
        'rating' => 4.5,
        'brand' => 'Harlette',
        'gambar' => 'images/indonesian-waterose-face-mist.jpeg',
        'label' => '',
        'diskon' => ''
    ],
    [
        'nama' => 'Waterymelon Deep Hydration Toner',
        'harga' => 145000,
        'rating' => 4.7,
        'brand' => 'Harlette',
        'gambar' => 'images/waterymelon-deep-hydration-toner.jpeg',
        'label' => 'Baru',
        'diskon' => '10%'
    ],
    [
        'nama' => 'Waterymelon Deep Hydration Unscented Toner',
        'harga' => 82000,
        'rating' => 4.4,
        'brand' => 'Harlette',
        'gambar' => 'images/waterymelon-deep-hydration-unscented-toner.jpeg',
        'label' => '',
        'diskon' => ''
    ],
    [
        'nama' => 'Waterymelon Deep Hydration Emulsion',
        'harga' => 105000,
        'rating' => 4.3,
        'brand' => 'Harlette',
        'gambar' => 'images/waterymelon-deep-hydration-emulsion.jpeg',
        'label' => '',
        'diskon' => '5%'
    ],
    [
        'nama' => 'Oatmilk Gentle Facial Wash',
        'harga' => 78000,
        'rating' => 4.6,
        'brand' => 'Harlette',
        'gambar' => 'images/oatmilk-gentle-facial-wash.jpeg',
        'label' => '',
        'diskon' => ''
    ],
    [
        'nama' => 'Chill Out Calming Serum',
        'harga' => 80000,
        'rating' => 4.8,
        'brand' => 'Harlette',
        'gambar' => 'images/chill-out-calming-serum.jpeg',
        'label' => 'Baru',
        'diskon' => ''
    ],
    [
        'nama' => 'Oatmilk Day Creme',
        'harga' => 70000,
        'rating' => 4.1,
        'brand' => 'Harlette',
        'gambar' => 'images/oatmilk-day-cream.jpeg',
        'label' => '',
        'diskon' => '10%'
    ],
    [
        'nama' => 'Oat Probiotic Lightweight Sunscreen SPF 50',
        'harga' => 90000,
        'rating' => 4.3,
        'brand' => 'Harlette',
        'gambar' => 'images/oat-probiotic-lightweight.jpeg',
        'label' => '',
        'diskon' => ''
    ],
    [
        'nama' => 'Gentle Facial Wash Avoskin Natural Sublime Facial Cleanser',
        'harga' => 124000,
        'rating' => 4.7,
        'brand' => 'Avoskin',
        'gambar' => 'images/natural-sublime-facial-cleanser.jpg',
        'label' => '',
        'diskon' => '15%'
    ],
    [
        'nama' => 'Ampoule Avoskin Miraculous Retinol',
        'harga' => 299000,
        'rating' => 4.9,
        'brand' => 'Avoskin',
        'gambar' => 'images/miraculous-retinol-ampoule.webp',
        'label' => 'Best Seller',
        'diskon' => ''
    ],
    [
        'nama' => 'Your Skin Bae Acne & Pores Savior Balm Stick',
        'harga' => 169000,
        'rating' => 4.6,
        'brand' => 'Avoskin',
        'gambar' => 'images/your-skin-bae-acne-&-pores-savior-balm-stick.jpg',
        'label' => '',
        'diskon' => ''
    ],
    [
        'nama' => 'Votre Peau Serum Peptide Concentrate',
        'harga' => 185000,
        'rating' => 4.4,
        'brand' => 'Votre Peau',
        'gambar' => 'images/votre-peau-serum-peptide-concentrate.avif',
        'label' => '',
        'diskon' => '5%'
    ],
    [
        'nama' => 'Votre Peau Niacinamide Booster Ampoule',
        'harga' => 185000,
        'rating' => 4.5,
        'brand' => 'Votre Peau',
        'gambar' => 'images/votre-peau-niacinamide-booster-ampoule.avif',
        'label' => '',
        'diskon' => ''
    ],
    [
        'nama' => 'Votre Peau Skin Care Daily Facial Sun Shield SPF 50 PA ++',
        'harga' => 265000,
        'rating' => 4.7,
        'brand' => 'Votre Peau',
        'gambar' => 'images/votre-peau-skin-care-daily-facial-sun-shield-spf-50-pa+++.webp',
        'label' => 'Best Seller',
        'diskon' => ''
    ],
    [
        'nama' => 'Votre Peau Brightening Essence With Niacinamide, Hyaluronic Acid',
        'harga' => 249000,
        'rating' => 4.3,
        'brand' => 'Votre Peau',
        'gambar' => 'images/votre-peau-brightening-essence-with-niacinamide-hyaluronic-acid.png',
        'label' => '',
        'diskon' => '10%'
    ],
    [
        'nama' => 'Votre Peau Serum Vitamin C pour Maharis',
        'harga' => 385000,
        'rating' => 4.9,
        'brand' => 'Votre Peau',
        'gambar' => 'images/votre-peau-serum-vitamin-C-pour-Maharis.jpg',
        'label' => '',
        'diskon' => ''
    ],
    [
        'nama' => 'Honey, I Dew Gel Cleanser',
        'harga' => 108000,
        'rating' => 4.4,
        'brand' => 'Hale',
        'gambar' => 'images/hale-honey-i-dew-gel-cleanser.png',
        'label' => '',
        'diskon' => ''
    ],
    [
        'nama' => 'Smooth Like Butter Bifida & 5 Ceramides Cream Moisturizer',
        'harga' => 159000,
        'rating' => 4.6,
        'brand' => 'Hale',
        'gambar' => 'images/smooth-like-butter-bifida-&-5-ceramides-cream-moisturizer.png',
        'label' => 'Baru',
        'diskon' => '5%'
    ],
    [
        'nama' => 'Deep Oasis Sleeping Mask + Night Moisturizer + Eye Cream',
        'harga' => 159000,
        'rating' => 4.5,
        'brand' => 'Hale',
        'gambar' => 'images/deep-oasis-sleeping-mask-+-night-moisturizer-+-eye-cream.png',
        'label' => '',
        'diskon' => ''
    ],
    [
        'nama' => 'HALE Even Tone Potion',
        'harga' => 149000,
        'rating' => 4.8,
        'brand' => 'Hale',
        'gambar' => 'images/hale-even-tone-potion.webp',
        'label' => 'Best Seller',
        'diskon' => '10%'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Haflesta Allure</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body {
      font-family: 'Poppins', sans-serif;
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
        .btn:class {
          background-color: #ec4899;
          color: white;
          transform: scale(1.05);
        }
        footer {
            text-align: center;
            padding: 20px;
            background: #fff;
            margin-top: 20px;
        }
  </style>
</head>
<script>
  const searchInput = document.getElementById('searchInput');
  const produkItems = document.querySelectorAll('.produk-item');

  searchInput.addEventListener('input', () => {
    const keyword = searchInput.value.toLowerCase();
    produkItems.forEach(item => {
      const nama = item.dataset.nama;
      if (nama.includes(keyword)) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  });
</script>
<body class="bg-white text-gray-800">
  <header class="bg-white shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
      <h1 class="text-2xl font-bold text-pink-500">Haflesta Allure</h1>
      <input type="text" id="searchInput" placeholder="Cari produk..." class="border px-4 py-2 rounded-full w-1/3">
      <div class="flex items-center space-x-6">
        <a href="#" class="relative">
          <span class="text-pink-500">🛒 Keranjang</span>
          <span class="absolute -top-2 -right-3 bg-pink-500 text-white text-xs px-2 rounded-full">3</span>
        </a>
        <span>Selamat datang, <strong><?= htmlspecialchars($_SESSION['username']) ?></strong></span>
        <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
            <a href="Logout.php" class="bg-pink-100 text-pink-600 px-4 py-1 rounded">Logout</a>
            <?php else: ?>
                <a href="Sign-Up-&-Login.php" class="bg-pink-100 text-pink-600 px-4 py-1 rounded">Sign Up/Login</a>
            <?php endif; ?>
      </div>
    </div>
    <nav class="bg-white border-t border-b py-2">
      <div class="max-w-7xl mx-auto flex space-x-6 px-6 text-sm font-medium text-gray-600">
        <a href="#" class="text-pink-500">Beranda</a>
        <a href="#">Pembersih</a>
        <a href="#">Pelembab</a>
        <a href="#">Serum</a>
        <a href="#">Masker</a>
      </div>
    </nav>
  </header>

  <section class="bg-pink-50 py-12">
    <div class="max-w-7xl mx-auto px-6 flex flex-col lg:flex-row items-center">
      <div class="lg:w-1/2 space-y-6">
        <h2 class="text-4xl font-bold">Perawatan Kulit Premium 2025</h2>
        <p class="text-gray-600">Temukan rahasia kulit sehat dan bercahaya dengan produk skincare berbahan alami dan formula inovatif. Eksklusif hanya di Haflesta Allure.</p>
        <div class="space-x-4">
          <button class="bg-pink-500 text-white px-6 py-2 rounded">Belanja Sekarang</button>
          <button class="border border-pink-500 text-pink-500 px-6 py-2 rounded">Lihat Produk</button>
        </div>
      </div>
      <div class="lg:w-1/2 mt-10 lg:mt-0 flex justify-center">
        <img src="Images/Skincare.jpg" alt="Banner Skincare" class="w-3/4 max-w-md">
      </div>
    </div>
  </section>

  <section class="py-12">
    <div class="max-w-7xl mx-auto px-6">
      <h3 class="text-2xl font-semibold mb-6">Produk Skincare Unggulan</h3>
      <div class="flex flex-col lg:flex-row">

        <!-- Grid Produk -->
        <div class="lg:w-full grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
    <?php foreach ($produk as $item): ?>
        <div class="border rounded-xl p-4 shadow transition-transform duration-300 transform hover:-translate-y-2 hover:shadow-xl relative bg-white flex flex-col justify-between">
            <?php if ($item['label']): ?>
                <span class="absolute top-2 left-2 bg-pink-500 text-white text-xs px-2 py-1 rounded"><?= $item['label'] ?></span>
            <?php endif; ?>
            <?php if ($item['diskon']): ?>
                <span class="absolute top-2 right-2 bg-red-500 text-white text-xs px-2 py-1 rounded">-<?= $item['diskon'] ?></span>
            <?php endif; ?>
            
            <div>
                <img src="<?= $item['gambar'] ?>" alt="<?= $item['nama'] ?>" class="w-full h-48 object-cover mb-3 rounded">
                <h3 class="text-lg font-semibold"><?= $item['nama'] ?></h3>
                <p class="text-sm text-gray-500 mb-1"><?= $item['brand'] ?></p>
                <div class="flex items-center text-yellow-500 text-sm mb-1">
                    <?= str_repeat("★", floor($item['rating'])) ?>
                    <?= ($item['rating'] - floor($item['rating']) >= 0.5) ? '½' : '' ?>
                    <span class="ml-2 text-gray-600">(<?= $item['rating'] ?>)</span>
                </div>
                <p class="text-pink-600 font-bold mb-3">Rp <?= number_format($item['harga'], 0, ',', '.') ?></p>
            </div>

            <?php 
                $detail_page = "detail-" . strtolower(str_replace([' ', '/'], '-', $item['nama'])) . ".php"; 
            ?>
            <a href="<?= htmlspecialchars($detail_page) ?>" class="mt-auto inline-block bg-pink-500 hover:bg-pink-600 text-white text-sm font-semibold py-2 px-4 rounded text-center">Lihat Detail</a>
        </div>
    <?php endforeach; ?>
</div>

      </div>
    </div>
  </section>
</body>
<!-- Footer -->
<footer>
        <p>2025 © Haflesta Allure. All Rights Reserved.</p>
</footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</html>