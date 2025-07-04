<!DOCTYPE html>
<html>
<head><title>Ejaan Bilangan</title></head>
<body>

<form method="post">
    Masukkan bilangan (0-999): <input type="number" name="bilangan"><br>
    <input type="submit" name="submit" value="Tampilkan">
</form>

<?php
if (isset($_POST['submit'])) {
    $bil = $_POST['bilangan'];

    if ($bil < 0 || $bil >= 1000) {
        echo "Anda Menginput Melebihi Limit Bilangan";
    } elseif ($bil == 0) {
        echo "Nol";
    } elseif ($bil < 10) {
        echo "Satuan";
    } elseif ($bil < 20) {
        echo "Belasan";
    } elseif ($bil < 100) {
        echo "Puluhan";
    } else {
        echo "Ratusan";
    }
}
?>

</body>
</html>