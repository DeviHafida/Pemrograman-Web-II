<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body {
            background: linear-gradient(to right, #ffe0ec, #fff0f5);
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-box {
            background-color: #ffffff;
            padding: 40px 50px;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(255, 105, 180, 0.3);
            width: 340px;
            text-align: center;
        }

        h2 {
            color: #d63384;
            margin-bottom: 25px;
            font-size: 1.8rem;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #5a2351;
            text-align: left;
            font-weight: 500;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px 12px;
            margin-bottom: 18px;
            border: 1px solid #f3b6c4;
            border-radius: 8px;
            background-color: #fffafc;
            transition: border-color 0.3s ease;
            font-size: 0.95rem;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #d63384;
            box-shadow: 0 0 5px rgba(214, 51, 132, 0.4);
        }

        button {
            background-color: #d63384;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1rem;
            width: 100%;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button:hover {
            background-color: #ad2167;
            transform: translateY(-1px);
        }

        .error-message {
            color: #e74c3c;
            font-size: 0.9em;
            margin-bottom: 15px;
            background-color: #ffe3e3;
            border-left: 4px solid #e74c3c;
            padding: 8px 12px;
            border-radius: 6px;
            text-align: left;
        }
    </style>
</head>

<body>

    <div class="login-box">
        <h2>Login</h2>

        <?php if (session()->getFlashdata('error')): ?>
            <div class="error-message"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form method="post" action="/login">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" required>

            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Login</button>
        </form>
    </div>

</body>

</html>