<?php
function koneksi() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db   = "lentera pustaka";

    $conn = mysqli_connect($host, $user, $pass, $db);
    if (!$conn) {
        die("Koneksi gagal: " . mysqli_connect_error());
    }
    return $conn;
}
?>