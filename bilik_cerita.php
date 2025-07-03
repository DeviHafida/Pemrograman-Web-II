<?php
session_start();

require_once 'models/Database.php';
$db = new Database();
$conn = $db->getConnection();

// Cek apakah semua cerita diminta
$semua = isset($_GET['semua']);

// Ambil cerita dari database
$query = $semua
    ? "SELECT cerita.*, users.nama FROM cerita LEFT JOIN users ON cerita.user_id = users.id ORDER BY created_at DESC"
    : "SELECT cerita.*, users.nama FROM cerita LEFT JOIN users ON cerita.user_id = users.id ORDER BY created_at DESC LIMIT 3";

$ceritaResult = $conn->query($query);

// Fungsi untuk ambil komentar per cerita
function getComments($conn, $cerita_id)
{
    $stmt = $conn->prepare("SELECT komentar.*, users.nama FROM komentar LEFT JOIN users ON komentar.user_id = users.id WHERE cerita_id = ?");
    $stmt->bind_param("i", $cerita_id);
    $stmt->execute();
    return $stmt->get_result();
}

include 'views/partials/header.php';
?>

<main style="padding: 20px; max-width: 800px; margin: auto; margin-top: 60px;">
    <style>
        body {
            background: #fff8f9;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
            padding: 0;
            color: #444;
        }

        main {
            padding: 30px 20px;
            max-width: 800px;
            margin: 60px auto;
            background-color: #fff;
            border-radius: 16px;
            box-shadow: 0 5px 25px rgba(255, 105, 180, 0.15);
        }

        h2 {
            text-align: center;
            font-size: 28px;
            color: #d81b60;
            margin-bottom: 30px;
        }

        form textarea,
        form input[type="text"] {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin-bottom: 10px;
            font-size: 15px;
            background: #fffdfd;
        }

        form button {
            background-color: #f06292;
            border: none;
            padding: 10px 16px;
            border-radius: 8px;
            color: white;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        form button:hover {
            background-color: #ec407a;
        }

        .cerita-box {
            border: 1px solid #f3c4d1;
            padding: 15px;
            border-radius: 12px;
            margin-bottom: 20px;
            background: #fff5f8;
        }

        .cerita-box strong {
            color: #c2185b;
        }

        .cerita-box p {
            margin: 10px 0;
        }

        .cerita-box small {
            color: #888;
        }

        details summary {
            cursor: pointer;
            font-weight: bold;
            color: #ab003c;
            margin-top: 10px;
        }

        details summary:hover {
            text-decoration: underline;
        }

        .komentar p {
            margin: 5px 0;
            padding-left: 10px;
            border-left: 3px solid #f48fb1;
        }

        .komentar form input[type="text"] {
            margin-top: 10px;
            border-radius: 6px;
        }

        .lihat-lebih {
            margin-top: 30px;
            text-align: center;
        }

        .lihat-lebih a {
            text-decoration: none;
            background: #f8bbd0;
            color: #880e4f;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .lihat-lebih a:hover {
            background: #f48fb1;
        }

        .emoji {
            font-size: 1.2em;
        }

        footer {
            text-align: center;
            padding: 20px;
            color: #999;
        }
    </style>

    <h2>Bilik Cerita</h2>

    <?php if (isset($_SESSION['user_id'])): ?>
        <form action="controllers/cerita/simpan_cerita.php" method="post" style="margin-bottom: 30px;">
            <input type="text" name="judul" placeholder="Judul cerita" required style="width:100%; padding:10px; margin-bottom:10px;">
            <textarea name="isi" placeholder="Bagikan ceritamu..." required style="width:100%; height:100px; padding:10px;"></textarea>
            <button type="submit">Kirim Cerita</button>
        </form>
    <?php else: ?>
        <div style="text-align:center; margin-bottom: 30px;">
            <p>💬 Ingin berbagi cerita juga?</p>
            <a href="views/auth/login_form.php" style="margin-right: 10px;">Login</a> atau <a href="views/auth/register_form.php">Daftar</a> dulu ya!
        </div>
    <?php endif; ?>

    <?php if ($ceritaResult && $ceritaResult->num_rows > 0): ?>
        <?php while ($row = $ceritaResult->fetch_assoc()): ?>
            <div class="cerita-box">
                <strong>@<?= htmlspecialchars($row['nama'] ?? 'Anonim') ?></strong> <br>
                <p><?= nl2br(htmlspecialchars($row['isi'])) ?></p>
                <small><?= date("d M Y, H:i", strtotime($row['created_at'])) ?></small>

                <details style="margin-top: 10px;">
                    <summary>Lihat balasan</summary>
                    <div class="komentar">
                        <?php
                        $komentarResult = getComments($conn, $row['id']);
                        if ($komentarResult->num_rows > 0):
                            while ($komentar = $komentarResult->fetch_assoc()):
                        ?>
                                <p><strong>@<?= htmlspecialchars($komentar['nama']) ?>:</strong> <?= htmlspecialchars($komentar['isi']) ?></p>
                            <?php endwhile;
                        else: ?>
                            <p><i>Belum ada balasan.</i></p>
                        <?php endif; ?>

                        <?php if (isset($_SESSION['user_id'])): ?>
                            <form action="controllers/cerita/simpan_komentar.php" method="post">
                                <input type="hidden" name="cerita_id" value="<?= $row['id'] ?>">
                                <input type="text" name="isi" placeholder="↩ Balas cerita ini..." required style="width: 100%; padding: 8px;">
                                <button type="submit">Balas 💬</button>
                            </form>
                        <?php else: ?>
                            <p style="margin-top:10px; font-style: italic;">
                                🔒 <a href="views/auth/login_form.php" style="margin-right: 10px;">Login</a>atau <a href="views/auth/register_form.php">Daftar</a> dulu ya!
                            </p>
                        <?php endif; ?>
                    </div>
                </details>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p>Belum ada cerita yang dibagikan 😿</p>
    <?php endif; ?>

    <div class="lihat-lebih">
        <?php if ($semua): ?>
            <a href="bilik_cerita.php">🔽 Tampilkan Lebih Sedikit</a>
        <?php else: ?>
            <a href="?semua=1">🔍 Lihat lebih banyak cerita</a>
        <?php endif; ?>
    </div>
</main>

<?php include 'views/partials/footer.php'; ?>