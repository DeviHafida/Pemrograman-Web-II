<?php
$produk = [
    "nama" => "Waterymelon Deep Hydration Toner",
    "harga" => "Rp145.000,00",
    "gambar" => "waterymelon-deep-hydration-toner.jpeg",
    "merek" => "Harlette",
    "kondisi_kulit" => "Dry, Dehydrated, Combination, Sensitive Skin",
    "waktu_penggunaan" => "Pagi hari dan Malam hari",
    "berat_bersih" => "200ml",
    "tekstur" => "Cair",
    "stok" => "50",
    "umur_simpan" => "12 Bulan",
    "deskripsi" => "Hydrating toner ini diformulasikan dengan kombinasi bahan aktif seperti Watermelon, Sodium Hyaluronate, Centella Asiatica, dan Niacinamide, yang efektif memberikan lapisan hidrasi sekaligus menenangkan kulit. Dengan tekstur yang ringan dan mudah menyerap, toner ini membantu menjaga keseimbangan pH kulit serta memperkuat skin barrier, sehingga kulit menjadi lebih sehat dan tidak rentan mengalami breakouts. Berkat kandungan Watermelon yang menghidrasi secara optimal, Aloe Vera Juice yang menenangkan dan meregenerasi kulit, serta Niacinamide yang mencerahkan dan memudarkan bekas jerawat, toner ini menjadi solusi sempurna bagi kulit yang kering, sensitif, atau bermasalah. Selain itu, Centella Asiatica bekerja meredakan kemerahan dan memberikan perlindungan antioksidan, sementara Sodium Hyaluronate membantu menjaga kelembapan kulit lebih lama.

Cocok untuk semua jenis kulit, termasuk kulit sensitif, toner ini dapat digunakan pada pagi dan malam hari setelah mencuci muka. Cukup tuangkan secukupnya pada kapas atau telapak tangan, lalu usapkan ke seluruh wajah dan tepuk halus hingga menyerap. Dengan formula bebas alkohol, paraben, minyak, serta aman untuk kulit yang rentan fungal acne, toner ini memberikan kelembapan intens sekaligus menjaga kesehatan kulit tanpa risiko iritasi. Hadir dalam ukuran 200 ml, hydrating toner ini menjadi langkah penting dalam rutinitas perawatan kulit untuk mendapatkan kulit yang lebih sehat, lembap, dan bercahaya.",
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $produk['nama'] ?></title>
    <link rel="stylesheet" href="style.css">
    <style>
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

        /* Desain tombol */
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
            background: #ff6600;
            color: white;
        }

        .btn-buy {
            background: #008000;
            color: white;
        }

        .btn:hover {
            opacity: 0.8;
        }
    </style>
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
        <a href="#search">🔍</a>
        <a href="#notifications">🔔</a>
        <a href="#cart">🛒</a>
        <a href="#logout">🔚</a>
    </div>
</div>

<div class="produk-detail-container">
    <!-- Bagian kiri: Gambar produk -->
    <div class="produk-image">
        <img src="images/<?= $produk['gambar'] ?>" alt="<?= $produk['nama'] ?>">

        <!-- Spesifikasi di bawah gambar -->
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
                    <td>Stok</td>
                    <td><?= $produk['stok'] ?></td>
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
        <a href="Halaman Utama.php" class="back-link">← Kembali</a>
    </div>
</div>

<footer>
    <p>© 2025 Derin Beauty. All Rights Reserved.</p>
</footer>

</body>
</html>
