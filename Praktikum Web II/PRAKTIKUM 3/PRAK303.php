<!DOCTYPE html>
<html>
<body>
    <form method="post">
        Batas bawah: <input type="number" name="bawah" required><br>
        Batas atas: <input type="number" name="atas" required><br>
        <input type="submit" value="Tampilkan">
    </form>
    <br>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $bawah = $_POST["bawah"];
        $atas = $_POST["atas"];
        $gambar = "https://www.freepnglogos.com/uploads/star-png/star-vector-png-transparent-image-pngpix-21.png";

        $i = $bawah;
        do {
            if (($i + 7) % 5 == 0) {
                echo "<img src='$gambar' width='25'>";
            } else {
                echo "$i ";
            }
            $i++;
        } while ($i <= $atas);
    }
    ?>
</body>
</html>