<!DOCTYPE html>
<html>
<head>
    <title>Form Validasi</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>

<?php
$nama = $nim = $jk = "";
$errNama = $errNim = $errJk = "";

if (isset($_POST['submit'])) {
    if (empty($_POST['nama'])) {
        $errNama = " * nama tidak boleh kosong";
    } else {
        $nama = $_POST['nama'];
    }
    if (empty($_POST['nim'])) {
        $errNim = " * nim tidak boleh kosong";
    } else {
        $nim = $_POST['nim'];
    }
    if (empty($_POST['jk'])) {
        $errJk = " * jenis kelamin tidak boleh kosong";
    } else {
        $jk = $_POST['jk'];
    }
    $valid = empty($errNama) && empty($errNim) && empty($errJk);
}
?>

<form method="post">
    Nama: <input type="text" name="nama" value="<?php echo $nama; ?>">
    <span class="error"><?php echo $errNama; ?></span><br>
    Nim: <input type="text" name="nim" value="<?php echo $nim; ?>">
    <span class="error"><?php echo $errNim; ?></span><br>
    Jenis Kelamin:
    <span class="error"><?php echo $errJk; ?></span><br>
    <input type="radio" name="jk" value="Laki-Laki" <?php if ($jk=="Laki-Laki") echo "checked"; ?>> Laki-Laki<br>
    <input type="radio" name="jk" value="Perempuan" <?php if ($jk=="Perempuan") echo "checked"; ?>> Perempuan<br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
if (isset($valid) && $valid) {
    echo "<h3>Output:</h3>";
    echo "$nama <br>";
    echo "$nim <br>";
    echo "$jk <br>";
}
?>
</body>
</html>