<?php
$produk = [
    "nama" => "Waterymelon Deep Hydration Emulsion",
    "harga" => "Rp105.000,00",
    "gambar" => "waterymelon-deep-hydration-emulsion.jpeg",
    "merek" => "Harlette",
    "kondisi_kulit" => "Dry, Dehydrated, Combination, Oily, Acne Prone Skin",
    "waktu_penggunaan" => "Pagi hari dan Malam hari",
    "berat_bersih" => "30ml",
    "tekstur" => "Cair",
    "stok" => "346",
    "umur_simpan" => "12 Bulan",
    "deskripsi" => "Emulsion ini merupakan pelembap ringan yang cocok untuk kulit kombinasi dan berminyak, dengan tekstur lebih ringan dari krim tetapi lebih kental dari serum, sehingga mampu mengunci kelembapan secara optimal tanpa rasa lengket. Diformulasikan dengan Watermelon, Aloe Vera, Licorice, dan Sodium Hyaluronate, emulsion ini tidak hanya melembapkan tetapi juga menutrisi kulit, menenangkan iritasi, serta membantu mencerahkan kulit dan memudarkan bekas jerawat. Watermelon memberikan hidrasi intensif, Aloe Vera Juice menenangkan serta meregenerasi kulit, Licorice membantu mengatasi hiperpigmentasi dan melindungi dari radikal bebas, sementara Sodium Hyaluronate menjaga kelembapan dan memperkuat skin barrier.

Cocok untuk semua jenis kulit, termasuk kulit sensitif, emulsion ini bebas dari alkohol, paraben, dan minyak, sehingga aman digunakan setiap pagi dan malam hari setelah toner. Cukup oleskan secukupnya ke seluruh wajah hingga menyerap untuk mendapatkan kulit yang lebih segar, sehat, dan bercahaya. Hadir dalam ukuran 30 ml, emulsion ini menjadi pilihan ideal bagi kamu yang menginginkan hidrasi maksimal tanpa rasa berat di kulit.",
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
