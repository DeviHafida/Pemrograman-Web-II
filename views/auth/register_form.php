<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Register</title>
  <style>
    body {
      margin: 0;
      padding: 20px;
      font-family: 'Georgia', serif;
      background: linear-gradient(135deg, #f9c5d1, #fbc2eb, #fcd8e3, #e0c3fc);
      background-size: 500% 500%;
      animation: gradientShift 14s ease infinite;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      overflow: hidden;
    }

    .register-container {
      max-width: 420px;
      padding: 35px 30px;
      background-color: rgba(255, 255, 255, 0.92);
      border-radius: 18px;
      width: 80%;
      box-shadow: 0 12px 28px rgba(0, 0, 0, 0.15);
      animation: fadeInRegister 1s ease-out;
      backdrop-filter: blur(5px);
      position: relative;
      z-index: 2;
    }

    .register-container h2 {
      font-size: 26px;
      margin-bottom: 25px;
      text-align: center;
      color: #c2185b;
      border-bottom: 2px solid #fceff9;
      padding-bottom: 8px;
    }

    .register-form {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }

    .register-form input {
      padding: 12px 16px;
      border: 1px solid #ddd;
      border-radius: 10px;
      font-size: 15px;
      outline: none;
      transition: border-color 0.3s, box-shadow 0.3s;
    }

    .register-form input:focus {
      border-color: #a18cd1;
      box-shadow: 0 0 0 4px rgba(161, 140, 209, 0.2);
    }

    .register-form button {
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

    .register-form button:hover {
      background: linear-gradient(to right, #c2185b, #f8bbd0);
      color: #fff;
    }

    .back-link {
      text-align: center;
      margin-top: 18px;
    }

    .back-link a {
      font-size: 14px;
      color: #c2185b;
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s;
    }

    .back-link a:hover {
      color: #a18cd1;
      text-decoration: underline;
    }

    @keyframes fadeInRegister {
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
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    @media (max-width: 500px) {
      .register-container {
        margin: 50px 20px;
        padding: 25px 20px;
      }
    }

    .floating-emoji {
      position: absolute;
      font-size: 22px;
      animation: floatEmoji 12s linear infinite;
      opacity: 0.7;
      z-index: 1;
      pointer-events: none;
    }

    @keyframes floatEmoji {
      0% {
        transform: translateY(100vh) translateX(0);
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

  <!-- EMOJI TERBANG -->
  <div class="floating-emoji" style="left: 5%; animation-delay: 1s;">🌸</div>
  <div class="floating-emoji" style="left: 15%; animation-delay: 2.5s;">✨</div>
  <div class="floating-emoji" style="left: 25%; animation-delay: 4s;">📝</div>
  <div class="floating-emoji" style="left: 35%; animation-delay: 5.5s;">👭</div>
  <div class="floating-emoji" style="left: 55%; animation-delay: 3s;">📚</div>
  <div class="floating-emoji" style="left: 70%; animation-delay: 6s;">💖</div>
  <div class="floating-emoji" style="left: 85%; animation-delay: 7s;">🌈</div>

  <!-- FORM REGISTER -->
  <div class="register-container">
    <h2>Register</h2>
    <form action="../../controllers/auth/register.php" method="POST" class="register-form">
      <input type="text" name="username" placeholder="Username" required>
      <input type="text" name="nama" placeholder="Nama Lengkap" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="text" name="telepon" placeholder="No. Telepon" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit">Register</button>
    </form>

    <!-- Tombol Kembali -->
    <div class="back-link">
      <a href="../../index.php">← Kembali ke Beranda</a>
    </div>
  </div>

</body>
</html>