<?php
$produk = [
    "nama" => "Waterymelon Deep Hydration Unscented Toner",
    "harga" => "Rp82.000,00",
    "gambar" => "waterymelon-deep-hydration-unscented-toner.jpeg",
    "merek" => "Harlette",
    "kondisi_kulit" => "Dry, Dehydrated, Combination, Sensitive Skin",
    "waktu_penggunaan" => "Pagi hari dan Malam hari",
    "berat_bersih" => "100ml",
    "tekstur" => "Cair",
    "umur_simpan" => "12 Bulan",
    "deskripsi" => "Hydrating toner ini diformulasikan dengan Watermelon, Sodium Hyaluronate, Centella Asiatica, dan Niacinamide, yang bekerja efektif untuk menghidrasi serta menenangkan kulit. Dengan tekstur ringan dan mudah menyerap, toner ini membantu menjaga keseimbangan pH kulit, memperkuat skin barrier, serta mengurangi kemerahan atau peradangan pada kulit wajah. Kandungan Watermelon memberikan hidrasi optimal, Aloe Vera Juice menenangkan dan meregenerasi kulit, sementara Niacinamide membantu mencerahkan kulit dan memudarkan bekas jerawat. Selain itu, Centella Asiatica berperan sebagai antioksidan yang meredakan kemerahan pada kulit berjerawat, sedangkan Sodium Hyaluronate menjaga kelembapan kulit lebih lama.
Cocok untuk semua jenis kulit, termasuk kulit sensitif, toner ini bebas dari fragrance, alkohol, paraben, dan minyak, sehingga aman bagi kulit yang rentan fungal acne. Hadir dalam ukuran 100 ml, toner ini dapat digunakan setiap pagi dan malam hari setelah mencuci wajah. Hydrating toner ini membantu kulit tetap sehat, dan segar seharian.",
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $produk['nama'] ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display+SC:ital,wght@0,400;0,700;0,900;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f8c5d2, #f8d9e1);
        }
        h1 {
            text-shadow: none !important;
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
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: stretch;
            padding: 30px 15px;
        }
       .produk-spesifikasi {
            margin-top: 15px;
            padding: 15px;
            background: #f9f9f9;
            border-radius: 8px;
            width: 100%;
            text-align: left;
            font-size: 16px;
        }
        .produk-spesifikasi h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .produk-spesifikasi table {
            width: 100%;
            border-collapse: collapse;
        }
        .produk-spesifikasi table tr {
            border-bottom: 1px solid #ddd;
        }
        .produk-spesifikasi table td {
            padding: 8px;
            font-weight: 500;
        }
        .produk-spesifikasi table td:first-child {
            text-align: left;
            width: 40%;
            font-weight: bold;
        }
        .produk-spesifikasi table td:last-child {
            text-align: right;
            width: 60%;
        }
        .produk-buttons {
            margin-top: 15px;
            display: flex;
            gap: 10px;
        }
        .btn {
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            border: none;
        }
        .btn-cart {
            background:rgb(248, 30, 164);
            color: white;
        }
        .btn-buy {
            background:rgb(255, 0, 89);
            color: white;
        }
        .btn:hover {
            opacity: 0.8;
        }
        .produk-detail-container {
            margin-top: 100px; 
        }
    </style>
</head>
<body>
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
                <a href="Logout.php" class="btn btn-danger btn-sm"> Logout</a>
            </div>
        </div>
</nav>

<div class="produk-detail-container">
    <!-- Bagian kiri: Gambar produk -->
    <div class="produk-image">
        <img src="images/<?= $produk['gambar'] ?>" alt="<?= $produk['nama'] ?>">

        <!-- Informasi produk di bawah gambar -->
        <div class="produk-spesifikasi">
        <table>
                <tr>
                    <td>Merek</td>
                    <td><?= $produk['merek'] ?></td>
                </tr>
                <tr>
                    <td>Kondisi Kulit</td>
                    <td><?= $produk['kondisi_kulit'] ?></td>
                </tr>
                <tr>
                    <td>Waktu Penggunaan</td>
                    <td><?= $produk['waktu_penggunaan'] ?></td>
                </tr>
                <tr>
                    <td>Berat Bersih</td>
                    <td><?= $produk['berat_bersih'] ?></td>
                </tr>
                <tr>
                    <td>Tekstur Produk</td>
                    <td><?= $produk['tekstur'] ?></td>
                </tr>
                <tr>
                    <td>Umur Simpan</td>
                    <td><?= $produk['umur_simpan'] ?></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Bagian kanan: Deskripsi dan tombol aksi -->
    <div class="produk-info">
        <h1><?= $produk['nama'] ?></h1>
        <p class="produk-harga"><?= $produk['harga'] ?></p>
        <p class="produk-deskripsi"><?= $produk['deskripsi'] ?></p>
        <div class="produk-buttons">
            <button class="btn btn-cart">Tambah ke Keranjang</button>
            <button class="btn btn-buy">Beli Sekarang</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<footer>
    <p>© 2025 Haflesta Allure. All Rights Reserved.</p>
</footer>

</body>
</html>