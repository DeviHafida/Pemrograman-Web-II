<?php
// Deklarasi nilai
$panjang = 8.9;
$lebar = 14.7;
$tinggi = 5.4;

// Menghitung volume limas
$volume = (1/3) * $panjang * $lebar * $tinggi;

// Menampilkan hasil dengan 3 angka di belakang koma
echo "Panjang = $panjang m<br>";
echo "Lebar = $lebar m<br>";
echo "Tinggi = $tinggi m<br>";
echo "Volume Limas = " . number_format($volume, 3) . " m³";
?>