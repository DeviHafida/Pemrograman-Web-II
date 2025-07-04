<!DOCTYPE html>
<html lang="eng">
    <body>
        <form action="" method="post">
            Tinggi: <input type="number" name="tinggi" required><br>
            Alamat Gambar : 
                <input type="text" name="gambar" required><br>
                <input type="submit" name="submit" value="Cetak">
        </form>

        <?php 
            if(isset($_POST['submit'])) {
                $tinggi = $_POST["tinggi"];
                $gambar = trim($_POST["gambar"]);

                for ($i = $tinggi; $i >= 1; $i--) {
                    for ($k = 1; $k <= $tinggi - $i; $k++) {
                        echo "<span style='display:inline-block; width:30px;'></span>";
                    }
                
                    for ($j = 1; $j <= $i; $j++) {
                        echo "<img src='$gambar' width='30'>";
                    }
                    echo "<br>";
                }
             }
        ?>
    </body>
</html>