<style>
  header {
    background: linear-gradient(to right, #fce4ec, #f8bbd0);
    padding: 15px 25px;
    box-shadow: 0 2px 8px rgba(240, 128, 128, 0.25);
    position: sticky;
    top: 0;
    z-index: 999;
  }

  .navbar {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
  }

  .logo {
    font-size: 20px;
    font-weight: bold;
    color: #ad1457;
    font-family: 'Segoe UI', sans-serif;
    display: flex;
    align-items: center;
    gap: 5px;
  }

  .menu a {
    margin: 0 10px;
    text-decoration: none;
    color: #6a1b9a;
    font-weight: 500;
    font-size: 14px;
    transition: color 0.3s ease;
  }

  .menu a:hover {
    color: #d81b60;
  }

  .auth-buttons {
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 14px;
  }

  .auth-buttons span {
    color: #6a1b9a;
    font-weight: bold;
  }

  .btn {
    padding: 6px 12px;
    background-color: #f8bbd0;
    color: #6a1b9a;
    border: none;
    border-radius: 6px;
    font-weight: bold;
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .btn:hover {
    background-color: #f06292;
    color: white;
  }

  @media (max-width: 768px) {
    .navbar {
      flex-direction: column;
      align-items: flex-start;
    }

    .menu {
      margin-top: 10px;
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    .auth-buttons {
      margin-top: 10px;
      flex-wrap: wrap;
    }
  }
</style>

<header>
  <div class="navbar">
    <div class="logo">🌸 Web Edukasi</div>

    <div class="menu">
      <a href="index.php">Home</a>
      <a href="ruang_literasi.php">Ruang Literasi</a>
      <a href="ruang_kami.php">Ruang Kami</a>
      <a href="bilik_cerita.php">Bilik Cerita</a>
    </div>

    <div class="auth-buttons">
      <?php if (isset($_SESSION['user'])): ?>
        <span>Halo, <?= htmlspecialchars($_SESSION['user']) ?></span>
        <a class="btn" href="controllers/auth/logout.php">Logout</a>
      <?php else: ?>
        <a class="btn" href="views/auth/login_form.php">Login</a>
        <a class="btn" href="views/auth/register_form.php">Register</a>
      <?php endif; ?>
    </div>
  </div>
</header>
