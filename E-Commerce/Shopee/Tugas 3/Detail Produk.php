<?php
include 'Data Produk.php'; 

$id = $_GET['id'] ?? null;

$produk = null;
foreach ($produkList as $item) {
    if ($item['id'] == $id) {
        $produk = $item;
        break;
    }
}

if (!$produk) {
    echo "Produk tidak ditemukan!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $produk['nama'] ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <a href="index.php" class="logo">HAFLESTA ALLURE</a>
        <div class="nav-links">
            <a href="Halaman Utama.php">HOME</a>
            <a href="#category">CATEGORY</a>
            <a href="#event">EVENT</a>
        </div>
    </nav>

    <div class="produk-container">
        <div class="produk-gambar">
            <img src="images/<?= $produk['gambar'] ?>" alt="<?= $produk['nama'] ?>">
        </div>
        <div class="produk-info">
            <h1><?= $produk['nama'] ?></h1>
            <p class="harga"><?= $produk['harga'] ?></p>
            <p><?= $produk['deskripsi'] ?></p>
            <table>
                <tr><td>Merek</td><td><?= $produk['merek'] ?></td></tr>
                <tr><td>Kondisi Kulit</td><td><?= $produk['kondisi_kulit'] ?></td></tr>
                <tr><td>Waktu Penggunaan</td><td><?= $produk['waktu_penggunaan'] ?></td></tr>
                <tr><td>Berat Bersih</td><td><?= $produk['berat_bersih'] ?></td></tr>
                <tr><td>Tekstur</td><td><?= $produk['tekstur'] ?></td></tr>
                <tr><td>Umur Simpan</td><td><?= $produk['umur_simpan'] ?></td></tr>
            </table>
            <div class="button-group">
                <button class="btn-cart">Tambah ke Keranjang</button>
                <button class="btn-buy">Beli Sekarang</button>
            </div>
        </div>
    </div>

    <footer>
        <p>© 2025 Haflesta Allure. All Rights Reserved.</p>
    </footer>
</body>
</html>
