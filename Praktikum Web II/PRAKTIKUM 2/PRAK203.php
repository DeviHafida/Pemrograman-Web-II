<!DOCTYPE html>
<html>
<head>
    <title>Konversi Suhu</title>
</head>
<body>

<h3>Output yang diinginkan:</h3>
<form method="post">
    Nilai: <input type="number" name="nilai" step="any" required><br><br>
    Dari: <br>
    <input type="radio" name="dari" value="celcius" required> Celcius<br>
    <input type="radio" name="dari" value="fahrenheit"> Fahrenheit<br>
    <input type="radio" name="dari" value="reamur"> Reamur<br>
    <input type="radio" name="dari" value="kelvin"> Kelvin<br><br>
    Ke: <br>
    <input type="radio" name="ke" value="celcius" required> Celcius<br>
    <input type="radio" name="ke" value="fahrenheit"> Fahrenheit<br>
    <input type="radio" name="ke" value="reamur"> Reamur<br>
    <input type="radio" name="ke" value="kelvin"> Kelvin<br><br>
    <input type="submit" name="konversi" value="Konversi">
</form>

<?php
function toCelcius($nilai, $dari) {
    switch ($dari) {
        case "celcius": return $nilai;
        case "fahrenheit": return ($nilai - 32) * 5/9;
        case "reamur": return $nilai * 5/4;
        case "kelvin": return $nilai - 273.15;
    }
}
function fromCelcius($nilai, $ke) {
    switch ($ke) {
        case "celcius": return $nilai;
        case "fahrenheit": return ($nilai * 9/5) + 32;
        case "reamur": return $nilai * 4/5;
        case "kelvin": return $nilai + 273.15;
    }
}
if (isset($_POST['konversi'])) {
    $nilai = $_POST['nilai'];
    $dari = $_POST['dari'];
    $ke = $_POST['ke'];

    if ($dari === $ke) {
        $hasil = $nilai;
    } else {
        $celcius = toCelcius($nilai, $dari);
        $hasil = fromCelcius($celcius, $ke);
    }
    $simbol = [
        "celcius" => "°C",
        "fahrenheit" => "°F",
        "reamur" => "°Re",
        "kelvin" => "K"
    ];
    echo "<h2>Hasil Konversi: " . round($hasil, 2) . " " . $simbol[$ke] . "</h2>";
}
?>

</body>
</html>