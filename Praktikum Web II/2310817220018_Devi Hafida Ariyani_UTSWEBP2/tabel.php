<?php
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tabel Data</title>
    <style>
        body {
            font-family: serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h2>Data yang Disimpan</h2>

<?php
if (isset($_SESSION['form_data'])) {
    $form_data = $_SESSION['form_data'];

    $nama_array = $form_data['nama'];
    $gambar_array = $form_data['gambar'];

    if (is_array($nama_array) && is_array($gambar_array)) {
        echo '<table>';
        echo '<tr><th>No</th><th>Nama</th><th>Gambar</th></tr>';
        $jumlah = min(count($nama_array), count($gambar_array));

        // Menampilkan semua gambar yang disubmit
        for ($i = 0; $i < $jumlah; $i++) {
            echo '<tr>';
            echo '<td>' . ($i + 1) . '</td>';
            echo '<td>' . htmlspecialchars($nama_array[$i]) . '</td>';
            // Jika gambar disubmit lebih dari satu
            $gambar_list = explode(',', $gambar_array[$i]);  // Misalnya, gambar disimpan sebagai string yang dipisahkan koma
            echo '<td>';
            foreach ($gambar_list as $gambar) {
                echo '<img src="' . htmlspecialchars($gambar) . '" width="100" style="margin-right: 10px;">';
            }
            echo '</td>';
            echo '</tr>';
        }

        echo '</table>';
    } else {
        echo "Data tidak valid.";
    }
} else {
    echo "Data tidak tersedia.";
}
?>

<br><a href="index.php">Kembali Ke Form</a>
</body>
</html>
