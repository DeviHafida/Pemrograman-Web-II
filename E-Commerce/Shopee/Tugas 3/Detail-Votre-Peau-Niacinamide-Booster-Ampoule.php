<?php
$produk = [
    "nama" => "Votre Peau Niacinamide Booster Ampoule",
    "harga" => "Rp185.000,00",
    "gambar" => "votre-peau-niacinamide-booster-ampoule.avif",
    "merek" => "Votre Peau",
    "kondisi_kulit" => "Normal skin that tends to be oily, appears dull, and has mild acne with a slightly rough or pimpled texture.",
    "waktu_penggunaan" => "Pagi hari dan Malam hari",
    "berat_bersih" => "30ml",
    "tekstur" => "Gel",
    "umur_simpan" => "6 Bulan",
    "deskripsi" => "Niacinamide Booster Ampoule adalah serum yang diformulasikan dengan kandungan aktif Niacinamide dan Zinc PCA untuk membantu mengatasi berbagai permasalahan kulit, seperti kulit kusam, pori-pori besar, serta jerawat. Dengan 5% Niacinamide atau yang dikenal sebagai Vitamin B3/Nicotinamide, serum ini bekerja efektif dalam meregulasi produksi sebum, mencerahkan warna kulit yang tidak merata, serta memperkuat lapisan pelindung kulit agar lebih tahan terhadap paparan polusi dan radikal bebas. Selain itu, Niacinamide juga membantu meningkatkan hidrasi kulit dan mengurangi kemerahan, sehingga kulit tampak lebih sehat dan bercahaya.
Dilengkapi dengan 1% Zinc PCA, bahan aktif yang memiliki sifat antibakteri dan anti-fungal, serum ini juga efektif dalam mengurangi tampilan jerawat serta mencegah munculnya kembali dengan cara mengontrol produksi minyak berlebih tanpa membuat kulit menjadi kering. Dengan kombinasi bahan aktif yang bekerja sinergis, Niacinamide Booster Ampoule tidak hanya membantu mengatasi masalah jerawat dan kulit kusam, tetapi juga menjadikan pori-pori tampak lebih halus, warna kulit lebih merata, serta tekstur kulit terasa lebih lembut dan kenyal. "
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
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: 'Segoe UI', sans-serif;
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
  height: 70px;
  background-color: #fff;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 15px 30px;
  border-bottom: 1px solid #eee;
}
.logo {
  font-size: 24px;
  font-weight: bold;
  color: #e91e63;
  text-decoration: none;
}
.search-bar input {
  padding: 10px 20px;
  border: 1px solid #ddd;
  border-radius: 25px;
  width: 300px;
  font-size: 14px;
  color: #555;
}
.nav-actions {
  display: flex;
  align-items: center;
  gap: 20px;
}
.cart {
  font-size: 16px;
  color: #e91e63;
  position: relative;
}
.cart-count {
  background-color: #e91e63;
  color: white;
  font-size: 12px;
  border-radius: 50%;
  padding: 2px 8px;
  position: absolute;
  top: -10px;
  right: -20px;
}
.cart-count:empty {
  display: none;
}
.logout-btn {
  background-color: #fde3ec;
  color: #d81b60;
  border: none;
  padding: 8px 16px;
  border-radius: 8px;
  font-weight: bold;
  cursor: pointer;
}
.logout-btn:hover {
  background-color: #f8bcd0;
}
.menu {
  display: flex;
  gap: 30px;
  padding: 15px 30px;
  border-bottom: 1px solid #eee;
  list-style: none;
  font-size: 16px;
  margin-top: 70px; /* agar tidak ketutup navbar */
  background-color: white;
}
.menu li {
  color: #333;
  cursor: pointer;
}
.menu li.active {
  color: #e91e63;
  font-weight: bold;
}
.produk-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: stretch;
  padding: 30px 15px;
}
.produk-detail-container {
  margin-top: 100px;
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
  background: rgb(248, 30, 164);
  color: white;
}
.btn-buy {
  background: rgb(255, 0, 89);
  color: white;
}
.btn:hover {
  opacity: 0.8;
}
</style>
</head>
<body>
  <nav class="navbar">
  <a href="Halaman Utama.php" class="logo">Haflesta Allure</a>

    <div class="nav-actions">
      <div class="cart">
        🛒 Keranjang <span class="cart-count"></span>
      </div>
      <a href="Logout.php" class="btn btn-danger btn-sm"> Logout</a>
    </div>
  </nav>
</body>

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