<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $gambar = $_FILES['gambar'];

    $gambarPaths = [];

    foreach ($nama as $i => $name) {
        if ($gambar['error'][$i] === UPLOAD_ERR_OK) {
            $upload_dir = 'gambar/';
            $upload_file = $upload_dir . basename($gambar['name'][$i]);

            if (move_uploaded_file($gambar['tmp_name'][$i], $upload_file)) {
                $gambarPaths[] = $upload_file;
            }
        }
    }

   if (!isset($_SESSION['form_data'])) {
    $_SESSION['form_data'] = ['nama' => [], 'gambar' => []];
}

$_SESSION['form_data']['nama'] = array_merge($_SESSION['form_data']['nama'], $nama);
$_SESSION['form_data']['gambar'] = array_merge($_SESSION['form_data']['gambar'], $gambarPaths);

    if (isset($_POST['reset'])) {
        unset($_SESSION['form_data']);
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Dinamis: Nama & Gambar</title>
    <style>
        body {
            font-family: serif;
        }
        .input-row {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 200px;
        }
        .alert {
            color: red;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
    <script>
        function tambahInput() {
            const row = document.createElement("div");
            row.className = "input-row";
            row.innerHTML = `
                <div><strong>Nama:</strong><br><input type="text" name="nama[]" required></div>
                <div><strong>Gambar:</strong><br><input type="file" name="gambar[]" accept=".jpg,.jpeg,.png,.gif,.webp" required></div>
                <div class="hapus-col"><br><button type="button" onclick="hapusBaris(this)">Hapus</button></div>
            `;
            document.getElementById("input-container").appendChild(row);
            updateTombolHapus();
        }

        function hapusBaris(btn) {
            const rows = document.querySelectorAll(".input-row");
            btn.closest(".input-row").remove();
            updateTombolHapus(); 
        }

        function updateTombolHapus() {
            const rows = document.querySelectorAll(".input-row");
            rows.forEach((row, index) => {
                const btnCol = row.querySelector(".hapus-col");
                if (rows.length === 1) {
                    btnCol.style.display = "none"; 
                } else {
                    btnCol.style.display = "block"; 
                }
            });
        }

        function validasiForm(e) {
            const nama = document.querySelectorAll('input[name="nama[]"]');
            const gambar = document.querySelectorAll('input[name="gambar[]"]');
            const allowed = /\.(jpg|jpeg|png|gif|webp)$/i;
            const alertBox = document.getElementById("alertMessage");
            alertBox.style.display = "none"; // Reset alert

            for (let i = 0; i < nama.length; i++) {
                if (!nama[i].value.trim() || !gambar[i].value.trim()) {
                    e.preventDefault();
                    alertBox.innerText = "Semua field harus diisi!";
                    alertBox.style.display = "block";
                    return false;
                }
                if (!allowed.test(gambar[i].value)) {
                    e.preventDefault();
                    alertBox.innerText = "Hanya file gambar yang diperbolehkan (.jpg, .jpeg, .png, .gif, .webp)!";
                    alertBox.style.display = "block";
                    return false;
                }
            }
        }

        function resetData() {
        if (confirm("Apakah Anda yakin ingin mereset data?")) {
        const form = document.querySelector("form");
        const resetInput = document.createElement("input");
        resetInput.type = "hidden";
        resetInput.name = "reset"; 
        form.appendChild(resetInput);

        form.submit();
    }
}


        window.onload = updateTombolHapus; 
    </script>
</head>
<body>

<h2>Form Dinamis: Nama & Gambar</h2>

<div id="alertMessage" class="alert" style="display: none;"></div>

<form action="index.php" method="post" enctype="multipart/form-data" onsubmit="return validasiForm(event)">
    <div id="input-container">
        <div class="input-row">
            <div><strong>Nama:</strong><br><input type="text" name="nama[]" required></div>
            <div><strong>Gambar:</strong><br><input type="file" name="gambar[]" accept=".jpg,.jpeg,.png,.gif,.webp" required></div>
            <div class="hapus-col"><br><button type="button" onclick="hapusBaris(this)">Hapus</button></div>
        </div>
    </div>
    <br>
    <button type="button" onclick="tambahInput()">Tambah Input</button><br><br>
    <input type="submit" value="Submit"><br><br>
    <input type="button" value="Reset Data" onclick="resetData()"><br><br>
</form>

<a href="tabel.php">Lihat Tabel Data</a>

</body>
</html>