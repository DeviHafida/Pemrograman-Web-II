<?php
$gambar = "star-images-9441.png";
if (isset($_POST['submit'])) {
    $jumlah = $_POST['jumlah'];
} else if (isset($_POST['tambah'])) {
    $jumlah = $_POST['jumlah'] + 1;
} else if (isset($_POST['kurang'])) {
    $jumlah = $_POST['jumlah'] - 1;
} else {
    $jumlah = null;
}
?>

<!DOCTYPE html>
<html>
<body>

<?php if ($jumlah === null): ?>
    <h3>Contoh Output 1 (Sebelum disubmit)</h3>
    <form method="post">
        Jumlah bintang <input type="number" name="jumlah">
        <br><br>
        <input type="submit" name="submit" value="Submit">
    </form>

<?php else: ?>
    <h3>Contoh Output 2:</h3>
    <p>Jumlah bintang <?= $jumlah ?></p>

    <?php
    for ($i = 0; $i < $jumlah; $i++) {
        echo "<img src='$gambar' width='70'>";
    }
    ?>

    <form method="post" style="margin-top: 10px;">
        <input type="hidden" name="jumlah" value="<?= $jumlah ?>">
        <button type="submit" name="tambah">Tambah</button>
        <button type="submit" name="kurang">Kurang</button>
    </form>

<?php endif; ?>

</body>
</html>