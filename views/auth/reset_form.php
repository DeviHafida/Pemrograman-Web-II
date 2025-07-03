<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Reset Password</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(135deg, #f9c5d1, #fbc2eb, #fcd8e3, #e0c3fc);
      background-size: 400% 400%;
      animation: gradientShift 12s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    .reset-container {
      background-color: rgba(255, 255, 255, 0.95);
      padding: 30px;
      border-radius: 18px;
      box-shadow: 0 8px 24px rgba(0,0,0,0.2);
      width: 360px;
      z-index: 2;
    }

    .reset-container h2 {
      text-align: center;
      color: #a052af;
      margin-bottom: 20px;
    }

    .reset-container form {
      display: flex;
      flex-direction: column;
      gap: 15px;
    }

    .reset-container input {
      padding: 12px 15px;
      border: 1px solid #ccc;
      border-radius: 10px;
      font-size: 14px;
    }

    .reset-container button {
      background: linear-gradient(to right, #f9c5d1 , #fbc2eb);
      color: white;
      font-weight: bold;
      border: none;
      padding: 12px;
      border-radius: 10px;
      cursor: pointer;
      transition: 0.3s ease;
    }

    .reset-container button:hover {
      background: linear-gradient(to right, #fbc2eb, #c2185b);
      color: #333;
    }

    .back-link {
      display: block;
      margin-top: 15px;
      text-align: center;
      font-size: 14px;
      color: #c2185b;
      text-decoration: none;
      font-weight: 600;
    }

    .back-link:hover {
      text-decoration: underline;
      color: #a18cd1;
    }

    /* Emoji animation */
    .emoji {
      position: absolute;
      font-size: 24px;
      opacity: 0.8;
      animation: flyUp 12s linear infinite;
      pointer-events: none;
    }

    @keyframes flyUp {
      0% {
        transform: translateY(100vh) scale(0.5) rotate(0deg);
        opacity: 0;
      }
      10% {
        opacity: 1;
      }
      90% {
        opacity: 1;
      }
      100% {
        transform: translateY(-120vh) scale(1.2) rotate(360deg);
        opacity: 0;
      }
    }
  </style>
</head>
<body>

  <!-- Emoji Fly Animation -->
  <script>
    const emojis = ["✨", "🌸", "💜", "🦋", "💫", "🎀", "⭐", "🌷"];
    for (let i = 0; i < 25; i++) {
      const emoji = document.createElement("div");
      emoji.className = "emoji";
      emoji.innerText = emojis[Math.floor(Math.random() * emojis.length)];
      emoji.style.left = Math.random() * 100 + "vw";
      emoji.style.animationDelay = Math.random() * 10 + "s";
      emoji.style.fontSize = (20 + Math.random() * 20) + "px";
      document.body.appendChild(emoji);
    }
  </script>

  <div class="reset-container">
    <h2>Reset Password 🔒</h2>
    <form method="POST" action="reset_password_process.php">
      <input type="email" name="email" placeholder="Email Anda" required>
      <input type="password" name="password" placeholder="Password Baru" required>
      <input type="password" name="confirm_password" placeholder="Konfirmasi Password" required>
      <button type="submit">Simpan Password</button>
    </form>

    <!-- Tombol Kembali -->
    <a href="login_form.php" class="back-link">← Kembali ke Login</a>
  </div>

</body>
</html>