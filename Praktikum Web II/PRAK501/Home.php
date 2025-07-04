<?php
?>

<!DOCTYPE html>
<html>
<head>
    <title>Beranda - Sistem Perpustakaan Lentera Pustaka</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;600&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-image: url('https://static01.nyt.com/images/2015/10/24/opinion/24manguel/24manguel-superJumbo.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
        }
        .container {
            background-color: rgba(0, 0, 0, 0.75);
            max-width: 600px;
            margin: 100px auto;
            padding: 40px 30px;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.1);
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            font-weight: 600;
        }
        p {
            font-size: 18px;
            font-style: italic;
            margin-bottom: 30px;
        }
        ul {
            list-style: none;
            padding: 0;
        }
        li {
            margin: 15px 0;
        }
        a {
            display: inline-block;
            padding: 10px 25px;
            background-color: #ffc107;
            color: black;
            text-decoration: none;
            font-weight: 600;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #ffdb4d;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang di Sistem<br>Perpustakaan Lentera Pustaka</h1>
        <ul>
            <li><a href="Member.php">Kelola Member</a></li>
            <li><a href="Buku.php">Kelola Buku</a></li>
            <li><a href="Peminjaman.php">Kelola Peminjaman</a></li>
        </ul>
    </div>
</body>
</html>
