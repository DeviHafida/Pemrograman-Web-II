<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/views/partials/header.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Artikel Terkini - Empowerment</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(270deg, #fff0f5, #fce4ec, #ffe0f0, #f8bbd0);
            background-size: 800% 800%;
            animation: gradientFlow 15s ease infinite;
            color: #4a4a4a;
        }

        main {
            padding: 40px 20px;
            max-width: 960px;
            margin: 40px auto;
            background-color: #ffffffdd;
            border-radius: 16px;
            box-shadow: 0 5px 20px rgba(255, 192, 203, 0.3);
            animation: fadeIn 1.5s ease;
        }

        h2 {
            font-size: 32px;
            color: #c2185b;
            margin-bottom: 20px;
            text-align: center;
            position: relative;
            animation: slideDown 1s ease;
        }

        h2::after {
            content: '🌇';
            position: absolute;
            right: -30px;
            top: 0;
            font-size: 28px;
            animation: floatEmoji 3s ease-in-out infinite;
        }

        h3 {
            font-size: 24px;
            color: #ad1457;
            margin-top: 40px;
            animation: slideUp 1s ease 0.3s;
            animation-fill-mode: both;
        }

        p,
        ul {
            max-width: 800px;
            line-height: 1.8;
            font-size: 16px;
            margin: 10px auto;
            animation: slideUp 1s ease 0.5s;
            animation-fill-mode: both;
        }

        ul li {
            margin-bottom: 10px;
        }

        img {
            width: 50%;
            max-width: 700px;
            display: block;
            margin: 20px auto;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            animation: zoomIn 1.2s ease;
        }

        /* Animations */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-40px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.8);
                opacity: 0;
            }

            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        @keyframes floatEmoji {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        @keyframes gradientFlow {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        @media screen and (max-width: 600px) {
            main {
                padding: 20px 15px;
            }

            h2 {
                font-size: 26px;
            }

            h3 {
                font-size: 20px;
            }
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #999;
        }
    </style>
</head>

<body>

    <main>
        <h2>Apa Itu Empowerment?</h2>
        <p>
            Empowerment atau pemberdayaan adalah proses di mana individu atau kelompok memperoleh kekuatan, otoritas, dan pengaruh atas kehidupan mereka sendiri dan masyarakat sekitarnya. Dalam konteks perempuan, pemberdayaan mencakup peningkatan akses terhadap pendidikan, pekerjaan yang layak, pengambilan keputusan, dan perlindungan terhadap kekerasan.
        </p>

        <img src="https://altomerge.com/wp-content/uploads/2024/04/Empowering-Women-1.jpg" alt="Empowerment">

        <h3>Hak-Hak Perempuan</h3>
        <ul>
            <li>Hak atas pendidikan tanpa diskriminasi gender</li>
            <li>Hak untuk bekerja dan memperoleh upah yang setara</li>
            <li>Hak untuk mendapatkan layanan kesehatan, termasuk kesehatan reproduksi</li>
            <li>Hak atas kebebasan dari kekerasan dan pelecehan</li>
            <li>Hak untuk berpartisipasi dalam pengambilan keputusan publik</li>
            <li>Hak atas kepemilikan dan warisan</li>
        </ul>

        <p>
            Penting bagi kita semua untuk terus memperjuangkan kesetaraan gender dan mendukung setiap perempuan untuk tumbuh, berkembang, dan menentukan arah hidupnya sendiri.
        </p>
    </main>

    <?php require_once __DIR__ . '/views/partials/footer.php'; ?>
</body>

</html>