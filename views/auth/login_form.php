<?php if (isset($_GET['error'])): ?>
  <div class="alert-error">
    Email atau password salah.
  </div>
<?php endif; ?>
<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      margin: 0;
      padding: 20px;
      font-family: serif;
      background: linear-gradient(135deg, #f9c5d1, #fbc2eb, #fcd8e3, #e0c3fc);
      background-size: 400% 400%;
      animation: gradientShift 16s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
    }

    .login-container {
      max-width: 420px;
      padding: 35px 30px;
      background-color: rgba(255, 255, 255, 0.94);
      border-radius: 18px;
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.2);
      animation: fadeInLogin 1s ease-out;
      backdrop-filter: blur(4px);
      position: relative;
      z-index: 2;
    }

    .login-container h2 {
      font-size: 26px;
      margin-bottom: 25px;
      text-align: center;
      color: #c2185b;
      border-bottom: 2px solid #fceff9;
      padding-bottom: 8px;
    }

    .alert-error {
      background-color: #ffe6e6;
      border: 1px solid #ff4d4d;
      color: #cc0000;
      padding: 12px 15px;
      border-radius: 10px;
      margin-bottom: 18px;
      text-align: center;
      font-weight: bold;
    }

    .login-form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    .login-form input {
      padding: 12px 16px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 15px;
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .login-form input:focus {
      border-color: #a18cd1;
      box-shadow: 0 0 0 4px rgba(161, 140, 209, 0.2);
    }

    .login-form button {
      padding: 12px;
      font-size: 16px;
      background: linear-gradient(to right, #f9c5d1, #fbc2eb);
      color: #fff;
      font-weight: 600;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .login-form button:hover {
      background: linear-gradient(to right, #f9a8d4, #c2185b);
    }

    .forgot-password {
      text-align: center;
      margin-top: 10px;
    }

    .forgot-password a {
      font-size: 14px;
      color: #c2185b;
      text-decoration: none;
      font-weight: bold;
    }

    .forgot-password a:hover {
      color: #a18cd1;
      text-decoration: underline;
    }

    @keyframes fadeInLogin {
      from {
        opacity: 0;
        transform: translateY(40px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes gradientShift {
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

    @media (max-width: 500px) {
      .login-container {
        margin: 30px 20px;
        padding: 25px 20px;
      }
    }

    .floating-emoji {
      position: absolute;
      font-size: 24px;
      animation: floatEmoji 12s linear infinite;
      opacity: 0.7;
      z-index: 1;
      pointer-events: none;
    }

    @keyframes floatEmoji {
      0% {
        transform: translateY(120vh) translateX(0);
        opacity: 0;
      }

      10% {
        opacity: 1;
      }

      50% {
        transform: translateY(50vh) translateX(20px);
      }

      100% {
        transform: translateY(-20vh) translateX(-20px);
        opacity: 0;
      }
    }
  </style>
</head>

<body>

  <!-- FLOATING EMOJIS -->
  <?php
  $emojis = ['♀', '👩‍🎓', '📚', '🌈', '💪', '🎓', '👭', '💖', '📖', '🌟'];
  foreach ($emojis as $index => $emoji) {
    $delay = 1 + ($index * 0.8);
    $left = 5 + ($index * 9);
    echo "<div class='floating-emoji' style='left: {$left}%; animation-delay: {$delay}s;'>{$emoji}</div>";
  }
  ?>

  <div class="login-container">
    <h2>Login</h2>

    <?php if (!empty($error)): ?>
      <div class="alert-error">
        <?= htmlspecialchars($error) ?>
      </div>
    <?php endif; ?>

    <form action="../../controllers/auth/login.php" method="POST" class="login-form">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Login</button>

      <div class="forgot-password">
        <a href="reset_form.php">🔒 Lupa Password?</a>
      </div>

      <div class="forgot-password">
        <a href="../../index.php">← Kembali ke Beranda</a>
      </div>
    </form>
  </div>

</body>

</html>