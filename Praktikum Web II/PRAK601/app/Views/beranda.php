<!DOCTYPE html>
<html>

<head>
    <title>Beranda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .kpop-font {
            font-family: 'Segoe UI', sans-serif;
        }

        .centered {
            text-align: center;
            margin-top: 100px;
        }

        .info-box {
            padding: 20px;
            border-radius: 12px;
            display: inline-block;
        }
    </style>
</head>

<body>
    <div class="container centered">
        <h1 class="kpop-font mb-4">Selamat Datang</h1>

        <div class="info-box mb-4">
            <h3>Halo, <?= $praktikan['nama'] ?>!</h3>
            <p><strong>NIM:</strong> <?= $praktikan['nim'] ?></p>
        </div>

        <nav class="mb-3">
            <a href="/" class="btn btn-primary me-2">Beranda</a>
            <a href="/home/profil" class="btn btn-secondary">Profil</a>
        </nav>
    </div>
</body>

</html>