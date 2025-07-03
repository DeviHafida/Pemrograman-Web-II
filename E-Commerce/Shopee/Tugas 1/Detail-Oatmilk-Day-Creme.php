<?php
$produk = [
    "nama" => "Oatmilk Day Creme",
    "harga" => "Rp70.000,00",
    "gambar" => "oatmilk-day-cream.jpeg",
    "merek" => "Harlette",
    "kondisi_kulit" => "Sensitive, Acne Prone, Combination, Dry",
    "waktu_penggunaan" => "Pagi hari",
    "berat_bersih" => "25ml",
    "tekstur" => "Krim",
    "stok" => "2660",
    "umur_simpan" => "6 bulan",
    "deskripsi" => "Deskripsi :
Harlette Oatmilk Day Crème adalah pelembap wajah yang diformulasikan dengan oat, susu, dan niacinamide untuk memberikan hidrasi optimal serta perlindungan dari paparan sinar matahari. Dengan tekstur ringan yang mudah meresap, pelembap ini membantu mengontrol produksi sebum, menjaga keseimbangan pH kulit, serta memberikan tampilan fresh glow finish tanpa meninggalkan whitecast. Kandungan hero ingredients seperti Oat yang menenangkan kulit sensitif, Sodium Lactate dari susu yang menjaga kelembapan, serta Niacinamide yang memperkuat skin barrier dan mencerahkan kulit, menjadikan produk ini cocok untuk semua jenis kulit, termasuk kulit sensitif. Rice Bran juga turut berperan dalam melembapkan dan melindungi kulit agar tetap halus dan sehat.

Untuk mendapatkan manfaat maksimal, Oatmilk Day Crème diaplikasikan sebagai langkah terakhir dalam rutinitas skincare pada pagi hari dengan cara mengoleskan secukupnya ke seluruh wajah. Produk ini bebas dari alkohol, paraben, dan minyak sehingga nyaman digunakan tanpa rasa lengket. Dengan perlindungan dari sinar UV dan efek melembapkannya, pelembap ini membantu kulit tetap sehat, segar, dan bercahaya sepanjang hari."
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
            <h2><?= $produk['nama'] ?></h2> <!-- Judul diganti dengan Nama Produk -->
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
