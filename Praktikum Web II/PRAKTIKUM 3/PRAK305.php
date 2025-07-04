<!DOCTYPE html>
<html>
<body>
<form method="post">
    <input type="text" name="input">
    <input type="submit" name="submit" value="submit">
</form>

<?php
if (isset($_POST['submit'])) {
    $input = $_POST['input'];
    $panjang = strlen($input);

    echo "<br><strong>Input:</strong><br>";
    echo $input . "<br><br>";

    echo "<strong>Output:</strong><br>";

    for ($i = 0; $i < $panjang; $i++) {
        $huruf_awal = strtoupper($input[$i]);   // kapital di awal
        $huruf_sisa = strtolower($input[$i]);   // sisa huruf kecil
        echo $huruf_awal;
        for ($j = 1; $j < $panjang; $j++) {
            echo $huruf_sisa;
        }
    }
}
?>

</body>
</html>

<a href="https://www.freepnglogos.com/images/star-images-9441.html">Get it on yellow star image transparent</a>