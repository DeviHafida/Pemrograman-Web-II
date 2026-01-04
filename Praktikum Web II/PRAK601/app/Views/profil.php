<!DOCTYPE html>
<html>

<head>
    <title>Profil Praktikan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .profile-img {
            width: 200px;
            height: 200px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px black;
        }

        .kpop-font {
            font-family: 'Segoe UI', sans-serif;
        }

        .centered {
            text-align: center;
        }

        .profile-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin-top: 30px;
        }

        .info-list {
            max-width: 400px;
        }
    </style>
</head>

<body class="container mt-5">
    <div class="centered">
        <h1 class="kpop-font">💎Profil Praktikan💛</h1>
        <nav class="mb-4">
            <a href="/" class="btn btn-primary">Beranda</a>
            <a href="/home/profil" class="btn btn-secondary">Profil</a>
        </nav>
    </div>

    <div class="profile-container">
        <?php if (!empty($praktikan['gambar'])): ?>
            <img src="/image/<?= $praktikan['gambar'] ?>" alt="Gambar Profil" class="profile-img">
        <?php endif; ?>

        <ul class="list-group info-list">
            <li class="list-group-item"><strong>Nama:</strong> <?= $praktikan['nama'] ?></li>
            <li class="list-group-item"><strong>NIM:</strong> <?= $praktikan['nim'] ?></li>
            <li class="list-group-item"><strong>Prodi:</strong> <?= $praktikan['prodi'] ?></li>
            <li class="list-group-item"><strong>Hobi:</strong> <?= $praktikan['hobi'] ?></li>
            <li class="list-group-item"><strong>Skill:</strong> <?= $praktikan['skill'] ?></li>
        </ul>
    </div>
</body>

</html>