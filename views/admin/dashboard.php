<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard</title>
  <style>
    body {
      font-family: serif;
      background: linear-gradient(135deg, #fceff9, #a18cd1, #fbc2eb);
      padding: 40px 20px;
      text-align: center;
      background-size: 300% 300%;
      animation: gradientShift 12s ease infinite;
      position: relative;
      overflow: hidden;
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

    .top-bar {
      position: absolute;
      top: 10px;
      left: 0;
      right: 0;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      z-index: 10;
    }

    .top-bar a {
      padding: 10px 16px;
      background-color: white;
      border-radius: 10px;
      font-weight: bold;
      text-decoration: none;
      color: #6c3483;
      box-shadow: 2px 2px 6px rgba(0, 0, 0, 0.2);
      transition: 0.2s ease;
    }

    .top-bar a:hover {
      background-color: #fbc2eb;
    }

    h1 {
      color: #6c3483;
      font-size: 3rem;
      margin-bottom: 40px;
      text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
      position: relative;
      z-index: 5;
    }

    .button-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
      gap: 25px;
      max-width: 700px;
      margin: 0 auto;
      position: relative;
      z-index: 5;
    }

    .btn {
      background: linear-gradient(145deg, #e5d4f9, #ffffff);
      border: 4px solid #fff;
      border-radius: 20px;
      padding: 16px;
      color: #6c3483;
      font-weight: bold;
      font-size: 16px;
      cursor: pointer;
      width: 100%;
      box-shadow: 6px 6px 15px #c5b4d6, -6px -6px 15px #ffffff;
      transition: all 0.3s ease-in-out;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
    }

    a {
      text-decoration: none;
    }

    .btn:hover {
      transform: scale(1.06);
      background: linear-gradient(145deg, #fbc2eb, #e0d6ff);
    }

    .welcome-msg {
      background-color: white;
      padding: 15px 20px;
      border-radius: 20px;
      display: inline-block;
      font-size: 18px;
      color: #6c3483;
      font-weight: bold;
      box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.1);
      animation: popIn 1s ease forwards;
      opacity: 0;
      margin-bottom: 30px;
      position: relative;
      transition: all 0.5s ease;
      z-index: 5;
    }

    .welcome-msg::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 30px;
      width: 0;
      height: 0;
      border-left: 10px solid transparent;
      border-right: 10px solid transparent;
      border-top: 10px solid white;
    }

    @keyframes popIn {
      0% {
        transform: scale(0.7);
        opacity: 0;
      }

      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    .wave {
      display: inline-block;
      animation: wave 2s infinite;
      transform-origin: 70% 70%;
    }

    @keyframes wave {

      0%,
      100% {
        transform: rotate(0deg);
      }

      20% {
        transform: rotate(14deg);
      }

      40% {
        transform: rotate(-8deg);
      }

      60% {
        transform: rotate(14deg);
      }

      80% {
        transform: rotate(-4deg);
      }
    }

    .floating-emoji {
      position: absolute;
      top: -50px;
      animation: bounceDown 6s infinite ease-in;
      pointer-events: none;
      user-select: none;
      opacity: 0.9;
      z-index: 2;
    }

    @keyframes bounceDown {
      0% {
        transform: translateY(-60px) scale(1);
        opacity: 0;
      }

      10% {
        opacity: 1;
      }

      40% {
        transform: translateY(300px) scale(1.1);
      }

      60% {
        transform: translateY(200px) scale(0.95);
      }

      80% {
        transform: translateY(300px) scale(1.05);
      }

      100% {
        transform: translateY(100vh) scale(1);
        opacity: 0;
      }
    }
  </style>
</head>

<body>

  <div class="top-bar">
    <a href="../../index.php">← Kembali dan Logout</a>
  </div>

  <h1>Dashboard Admin</h1>

  <div id="welcomeBubble" class="welcome-msg">
    👋 <span class="wave">Halo Admin!</span>
  </div>

  <div class="button-container">
    <a href="../../views/admin/users/index.php"><button class="btn">🐰 Users</button></a>
    <a href="../../views/admin/artikel/index.php"><button class="btn">📚 Artikel</button></a>
    <a href="../../views/admin/cerita/index.php"><button class="btn">📖 Cerita</button></a>
    <a href="../../views/admin/komentar/index.php"><button class="btn">💬 Komentar</button></a>
    <a href="../../views/admin/kategori/index.php"><button class="btn">🐱 Kategori</button></a>
    <a href="../../views/admin/tag/index.php"><button class="btn">🏷️ Tag</button></a>
  </div>

  <!-- Emoji Animasi Lucu -->
  <div class="floating-emoji" style="left: 28%; animation-delay: 1.8s; font-size: 31px;">🐇</div>
  <div class="floating-emoji" style="left: 38%; animation-delay: 1.2s; font-size: 36px;">🐇</div>
  <div class="floating-emoji" style="left: 24%; animation-delay: 4.4s; font-size: 36px;">🍭</div>
  <div class="floating-emoji" style="left: 90%; animation-delay: 0.9s; font-size: 25px;">🍭</div>
  <div class="floating-emoji" style="left: 63%; animation-delay: 4.7s; font-size: 30px;">🪷</div>
  <div class="floating-emoji" style="left: 67%; animation-delay: 3s; font-size: 33px;">🍭</div>
  <div class="floating-emoji" style="left: 1%; animation-delay: 2.9s; font-size: 35px;">💫</div>
  <div class="floating-emoji" style="left: 31%; animation-delay: 2.1s; font-size: 29px;">🪷</div>
  <div class="floating-emoji" style="left: 45%; animation-delay: 2.8s; font-size: 23px;">💫</div>
  <div class="floating-emoji" style="left: 26%; animation-delay: 1.1s; font-size: 21px;">🍭</div>
  <div class="floating-emoji" style="left: 12%; animation-delay: 2.5s; font-size: 30px;">🌸</div>
  <div class="floating-emoji" style="left: 72%; animation-delay: 0.7s; font-size: 28px;">🐇</div>
  <div class="floating-emoji" style="left: 85%; animation-delay: 3.5s; font-size: 26px;">🎀</div>
  <div class="floating-emoji" style="left: 17%; animation-delay: 2.3s; font-size: 30px;">🐇</div>
  <div class="floating-emoji" style="left: 50%; animation-delay: 1.9s; font-size: 32px;">🪷</div>

  <script>
    window.addEventListener("DOMContentLoaded", () => {
      const bubble = document.getElementById('welcomeBubble');
      if (bubble) {
        bubble.style.opacity = '1';
        setTimeout(() => {
          bubble.style.opacity = '0';
          bubble.style.transform = 'scale(0.8)';
          bubble.style.transition = 'all 0.5s ease';
          setTimeout(() => bubble.remove(), 500);
        }, 5000);
      }
    });
  </script>

</body>

</html>