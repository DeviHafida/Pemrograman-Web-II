<?php
$produk = [
    "nama" => "Oat Probiotic Lightweight Sunscreen SPF 50",
    "harga" => "Rp90.000,00",
    "gambar" => "oat-probiotic-lightweight.jpeg",
    "merek" => "Harlette",
    "deskripsi" => "Tabir surya ini memiliki tekstur ringan, mudah meresap, dan cocok untuk semua jenis kulit, termasuk kulit sensitif dan berjerawat. Dengan SPF 50 dan PA++++, produk ini memberikan perlindungan optimal dari sinar UVA dan UVB tanpa meninggalkan whitecast, sehingga wajah tetap tampak natural dan segar.
Selain perlindungan dari sinar matahari, sunscreen ini juga mengandung bahan aktif yang mampu melindungi kulit dari dampak buruk polusi dan blue light yang dihasilkan dari gadget. Formulanya yang non-komedogenik memastikan pori-pori tidak tersumbat, sehingga aman digunakan untuk kulit yang mudah berjerawat. Ditambah dengan finish yang ringan dan matte, sunscreen ini nyaman dipakai sehari-hari, bahkan cocok digunakan di bawah makeup tanpa membuat riasan luntur atau terasa berminyak. Teksturnya yang cepat meresap juga membuatnya praktis digunakan saat sedang buru-buru.
Dengan kombinasi perlindungan maksimal, kelembapan tahan lama, dan bahan-bahan yang menutrisi kulit, Oat Probiotic Lightweight Sunscreen SPF 50 adalah pilihan sempurna untuk menjaga kulit tetap sehat, segar, dan terlindungi sepanjang hari — baik saat beraktivitas di luar ruangan maupun di dalam ruangan. ",
    "kondisi_kulit" => "Normal, Oily, Dry, Combination, Sensitive, Acne Prone",
    "waktu_penggunaan" => "Pagi hari",
    "berat_bersih" => "40ml",
    "tekstur" => "Krim",
    "stok" => "444",
    "umur_simpan" => "12 bulan",
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
