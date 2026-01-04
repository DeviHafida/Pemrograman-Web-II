<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #ffeef3;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #fff0f5;
            border: 2px solid #ffc0cb;
            padding: 30px 40px;
            border-radius: 20px;
            box-shadow: 0 8px 20px rgba(255, 182, 193, 0.4);
            width: 400px;
        }

        h2 {
            text-align: center;
            color: #d6336c;
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            color: #c71585;
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ffb6c1;
            border-radius: 8px;
            background-color: #fff;
            box-sizing: border-box;
        }

        button {
            background-color: #ff69b4;
            color: white;
            border: none;
            padding: 12px;
            border-radius: 10px;
            width: 100%;
            font-weight: bold;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #ff1493;
        }

        .alert {
            background-color: #ffccd5;
            border-left: 4px solid #d6336c;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            color: #66001e;
        }
    </style>
</head>

<body>
    <div class="form-container">
        <h2><?= isset($buku) ? 'Edit Data Buku' : 'Tambah Data Buku' ?></h2>

        <?php if (session()->getFlashdata('errors')): ?>
            <div class="alert">
                <?php foreach (session()->getFlashdata('errors') as $error): ?>
                    <p><?= esc($error) ?></p>
                <?php endforeach ?>
            </div>
        <?php endif ?>

        <form action="<?= isset($buku) ? '/buku/update/' . $buku['id_buku'] : '/buku/store'; ?>" method="post">
            <?php if (isset($buku)): ?>
                <input type="hidden" name="id_buku" value="<?= esc($buku['id_buku']) ?>">
            <?php endif ?>

            <label for="judul_buku">Judul Buku</label>
            <input type="text" id="judul_buku" name="judul_buku" required
                value="<?= isset($buku) ? esc($buku['judul_buku']) : '' ?>">

            <label for="penulis">Penulis</label>
            <input type="text" id="penulis" name="penulis" required
                value="<?= isset($buku) ? esc($buku['penulis']) : '' ?>">

            <label for="penerbit">Penerbit</label>
            <input type="text" id="penerbit" name="penerbit" required
                value="<?= isset($buku) ? esc($buku['penerbit']) : '' ?>">

            <label for="tahun_terbit">Tahun Terbit</label>
            <input type="number" id="tahun_terbit" name="tahun_terbit" required min="1801" max="2025"
                value="<?= isset($buku) ? esc($buku['tahun_terbit']) : '' ?>">

            <button type="submit"><?= isset($buku) ? 'Update' : 'Simpan' ?></button>
        </form>
    </div>
</body>

</html>