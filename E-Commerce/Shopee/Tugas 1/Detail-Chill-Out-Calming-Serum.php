<?php
$produk = [
    "nama" => "Chill Out Calming Serum",
    "harga" => "Rp80.000,00",
    "gambar" => "chill-out-calming-serum.jpeg",
    "merek" => "Harlette",
    "kondisi_kulit" => "Normal, Oily, Dry, Combination, Sensitive",
    "waktu_penggunaan" => "Pagi hari dan Malam hari",
    "berat_bersih" => "30ml",
    "tekstur" => "Cair",
    "stok" => "3457",
    "umur_simpan" => "12 bulan",
    "deskripsi" => "Deskripsi :
Chill Oat Calming Serum adalah serum yang diformulasikan khusus untuk menenangkan dan merawat kulit yang mengalami iritasi serta kemerahan. Diperkaya dengan Oat Extract (Avenaplex 1%), Niacinamide, Turmeric Extract, Ceramide, dan Allantoin, serum ini membantu memperkuat skin barrier, menjaga kelembapan, serta meningkatkan elastisitas kulit. Avenaplex 1% terbukti dapat meningkatkan kadar hyaluronic acid dan ceramide pada wajah hingga 14% dan 10%, sehingga kulit tetap terhidrasi dan sehat. Kandungan Pyrus Malus (Apple) Fruit Extract serta Phragmites Karka Extract & Poria Cocos Extract memberikan efek menyejukkan dan merawat kelembapan kulit wajah, sementara Curcuma Longa (rhizome) Extract bertindak sebagai antioksidan yang melindungi kulit dari radikal bebas.

Serum ini cocok untuk semua jenis kulit, termasuk kulit sensitif dan berjerawat, karena bebas dari alkohol, paraben, dan pewangi. Cara penggunaannya cukup mudah, yaitu dengan mengoleskan secukupnya setelah toner pada pagi dan malam hari hingga meresap sempurna. Dengan kombinasi bahan aktif yang menenangkan dan memperbaiki skin barrier, Chill Oat Calming Serum membantu kulit terasa lebih lembap, kenyal, dan terlindungi dari iritasi."
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
