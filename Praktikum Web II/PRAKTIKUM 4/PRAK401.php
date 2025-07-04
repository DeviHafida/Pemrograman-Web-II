<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 10px;
        }
        td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
            width: 40px;
        }
    </style>
</head>
<body>

<form method="post">
    Panjang : <input type="text" name="panjang"><br><br>
    Lebar : <input type="text" name="lebar"><br><br>
    Nilai : <input type="text" name="nilai"><br><br>
    <input type="submit" value="Cetak">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $panjang = (int)$_POST["panjang"];
    $lebar = (int)$_POST["lebar"];
    $input = trim($_POST["nilai"]);
    $nilai = explode(" ", $input);

    if (count($nilai) != $panjang * $lebar) {
        echo "<p>Panjang nilai tidak sesuai dengan ukuran matriks</p>";
    } else {
        echo "<table>";
        $index = 0;
        for ($i = 0; $i < $panjang; $i++) {
            echo "<tr>";
            for ($j = 0; $j < $lebar; $j++) {
                echo "<td>" . htmlspecialchars($nilai[$index]) . "</td>";
                $index++;
            }
            echo "</tr>";
        }
        echo "</table>";
    }
}
?>
</body>
</html>