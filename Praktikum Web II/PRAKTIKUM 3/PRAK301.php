<!DOCTYPE html>
<html lang="eng">
    <body>
        <form action="" method="post">
            Jumlah Peserta: <input type="text" name="peserta">
            <button type="submit" name="submit">Cetak</button>
        </form>

        <?php
            if(isset($_POST['submit'])) {
                $jumlah = $_POST['peserta'];
                $i = 1;

                while ($i <= $jumlah) {
                    $warna = ($i % 2 == 1) ? "red" : "green";
                    echo "<p style='color:$warna'>Peserta ke-$i</p>";
                    $i++;
                }
            }
        ?>
    </body>
</html>