<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Sign Up</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; font-family: Arial, sans-serif; }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #2980b9, #6dd5fa);
            overflow: hidden;
        }
        .container {
            width: 350px;
            padding: 20px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            overflow: hidden;
            position: relative;
        }
        h1 {
            margin-bottom: 15px;
            font-size: 24px;
            color: #333;
        }
        input {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
        }
        button {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            background-color: #2980b9;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #1f618d;
            transform: scale(1.05);
        }
        .toggle-btn {
            margin-top: 10px;
            color: #555;
            cursor: pointer;
            text-decoration: underline;
            font-size: 14px;
        }
        .toggle-btn:hover {
            color: #2980b9;
        }
        .form-container {
            display: flex;
            width: 200%;
            transition: transform 0.5s;
        }
        .form-wrapper {
            width: 50%;
            padding: 20px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    if (isset($_SESSION['loggedin'])) {
        header('Location: Halaman Utama.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $action = $_POST['action'] ?? '';

        if ($action === 'signup') {
            if (!empty($username) && !empty($password)) {
                $_SESSION['registered_user'] = $username;
                $_SESSION['registered_pass'] = $password;
                echo "<script>alert('Akun berhasil dibuat! Silakan login.');</script>";
            } else {
                echo "<script>alert('Username dan password tidak boleh kosong!');</script>";
            }
        }

        if ($action === 'login') {
            if (
                isset($_SESSION['registered_user']) && isset($_SESSION['registered_pass']) &&
                $_SESSION['registered_user'] === $username &&
                $_SESSION['registered_pass'] === $password
            ) {
                $_SESSION['loggedin'] = $username;
                header('Location: Halaman Utama.php');
                exit();
            } else {
                echo "<script>alert('Username atau password salah!');</script>";
            }
        }
    }
    ?>

    <div class="container">
        <div class="form-container" id="formContainer">
            <!-- Form Login -->
            <div class="form-wrapper" id="loginForm">
                <h1>Sign In</h1>
                <form method="post">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit" name="action" value="login">Login</button>
                </form>
                <div class="toggle-btn" onclick="toggleForm()">Don't have an account? Sign Up</div>
            </div>

            <!-- Form Signup -->
            <div class="form-wrapper" id="signupForm">
                <h1>Sign Up</h1>
                <form method="post">
                    <input type="text" name="username" placeholder="New Username" required>
                    <input type="password" name="password" placeholder="New Password" required>
                    <button type="submit" name="action" value="signup">Sign Up</button>
                </form>
                <div class="toggle-btn" onclick="toggleForm()">Already have an account? Sign In</div>
            </div>
        </div>
    </div>

    <script>
        const formContainer = document.getElementById('formContainer');
        function toggleForm() {
            formContainer.style.transform = formContainer.style.transform === 'translateX(-50%)'
                ? 'translateX(0)'
                : 'translateX(-50%)';
        }
    </script>
</body>
</html>