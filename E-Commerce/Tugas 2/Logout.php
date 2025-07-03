<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logout</title>
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', Arial, sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #2980b9, #6dd5fa);
            overflow: hidden;
            animation: bgAnimation 10s ease infinite alternate;
        }
        @keyframes bgAnimation {
            0% { background-position: left; }
            100% { background-position: right; }
        }
        .container {
            width: 350px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            animation: fadeIn 0.8s ease-out forwards;
        }
        @keyframes fadeIn {
            0% { transform: scale(0.8) translateY(-50px); opacity: 0; }
            100% { transform: scale(1) translateY(0); opacity: 1; }
        }
        h1 {
            margin-bottom: 15px;
            font-size: 28px;
            color: #333;
        }
        p {
            margin-bottom: 20px;
            color: #555;
            font-size: 16px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
        }
        button:hover {
            background-color: #1f618d;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <?php
    session_start();
    // Cek apakah user sudah login
    if (!isset($_SESSION['loggedin'])) {
        header('Location: Sign-Up-&-Login.php');
        exit();
    }
    // Proses logout
    if (isset($_POST['logout'])) {
        session_unset(); // Bersihkan semua sesi
        session_destroy(); // Hapus sesi
        echo "<script>alert('Anda telah berhasil logout!'); window.location.href = 'Sign-Up-&-Login.php';</script>";
        exit();
    }
    ?>

    <div class="container">
        <h1>Logout</h1>
        <p>Apakah Anda yakin ingin keluar, <b><?php echo htmlspecialchars($_SESSION['loggedin']); ?></b>?</p>
        <form method="post">
            <button type="submit" name="logout">Ya, Logout</button>
        </form>
    </div>
</body>
</html>