<?php
// Nilai celcius yang diberikan
$celcius = 37.841;

// Rumus 
$reamur = (4/5) * $celcius;
$fahrenheit = (9/5) * $celcius + 32;
$kelvin = $celcius + 273.15;

// Menampilkan hasil dengan 4 angka di belakang koma
echo "Celcius = $celcius<br>";
echo "Reamur (R) = " . number_format($reamur, 4) . "<br>";
echo "Fahrenheit (F) = " . number_format($fahrenheit, 4) . "<br>";
echo "Kelvin (K) = " . number_format($kelvin, 4);
?>