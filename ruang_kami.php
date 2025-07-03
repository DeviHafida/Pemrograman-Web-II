<?php
session_start();
include 'views/partials/header.php';
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tentang Website Ini</title>
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
            content: '💡';
            position: absolute;
            right: -30px;
            top: 0;
            font-size: 24px;
            animation: floatIcon 3s ease-in-out infinite;
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
            max-width: 300px;
            display: block;
            margin: 20px auto;
            border-radius: 12px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
            animation: zoomIn 1s ease;
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
        <h2>Tentang Website Ini</h2>
        <p>
            Titik Balik adalah ruang yang kami ciptakan dengan satu harapan agar setiap perempuan bisa merasa aman, didengar, dan diberdayakan.

            Kami tahu, hidup sebagai perempuan sering kali dipenuhi oleh ekspektasi, batasan, dan stigma yang membuat suara kita mengecil, seolah harus selalu kuat, selalu sempurna, atau diam saja. Tapi di sini, kamu nggak perlu jadi apa pun selain dirimu sendiri.

            Kami ingin Titik Balik menjadi tempat kamu bisa berhenti sejenak, menarik napas, dan memulai semuanya kembali. Entah itu mulai memahami hakmu, mulai menulis ceritamu sendiri, atau mulai menyadari bahwa kamu pantas untuk tumbuh, tanpa rasa takut.

            Lewat Ruang Literasi, kami ingin kamu tahu bahwa pengetahuan adalah kekuatan. Kamu berhak tahu apa saja hakmu sebagai perempuan, dan bagaimana kamu bisa memperjuangkannya, baik dalam hal hukum, pendidikan, kesehatan, maupun ruang sosial.

            Di Bilik Cerita, kamu bisa menuliskan apa pun yang ingin kamu bagi seperti kisahmu, luka atau harapanmu. Karena saat satu suara berani muncul, suara-suara lain mulai menemukan keberaniannya.
            Di sini, cerita bukan sekadar rangkaian kata, ia bisa menjadi pelipur lara, sumber kekuatan, bahkan cahaya yang menuntun keluar dari gelap.

            Lalu di Ruang Kami, kami berbagi tentang siapa kami, alasan kenapa website ini lahir, dan bagaimana semuanya berawal dari keresahan yang sama, perempuan butuh lebih dari sekadar suara. Perempuan butuh ruang. Ruang untuk hidup, untuk pulih, dan untuk melangkah.

            Titik Balik bukan sekadar website. Ini adalah langkah kecil menuju perubahan besar. Sebuah ruang yang tumbuh bersama kamu, perlahan tapi pasti, menuju hari-hari yang lebih adil, lebih ramah, dan lebih penuh harapan.

            Yuk, mulai perjalananmu di sini. Karena setiap perubahan besar selalu dimulai dari satu titik balik kecil. </p>

        <img src="public/images/ruang-kami.jpg" alt="Tentang Kami">

        <h3>Fitur-fitur yang Tersedia</h3>
        <ul>
            <li><strong>Home</strong> – Menampilkan artikel-artikel terkini seputar isu sosial, perempuan, dan edukasi</li>
            <li><strong>Ruang Literasi</strong> – Memberikan pemahaman tentang pemberdayaan dan hak-hak perempuan</li>
            <li><strong>Bilik Cerita</strong> – Ruang untuk berbagi cerita pengalaman dan dukungan antar pengguna</li>
            <li><strong>Sistem Login/Register</strong> – Memberikan hak akses personal bagi user untuk berbagi cerita</li>
            <li><strong>Admin Panel</strong> – Khusus untuk admin mengatur dan memperbarui artikel</li>
        </ul>

        <p>
            Kami berharap website ini menjadi tempat yang aman, nyaman, dan edukatif bagi siapa pun yang ingin belajar dan berbagi.
        </p>
    </main>

    <?php include 'views/partials/footer.php'; ?>
</body>

</html>