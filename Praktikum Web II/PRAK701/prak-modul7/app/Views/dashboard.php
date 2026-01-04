<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap');

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #fce4ec 0%, #f8bbd0 100%);
            color: #6a1b4d;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            justify-content: center;
            align-items: center;
        }

        h1 {
            font-size: 2.8rem;
            margin-bottom: 0.2em;
            text-shadow: 1px 1px 3px #ad1457;
        }

        p {
            font-size: 1.3rem;
            margin-bottom: 2em;
            font-weight: 500;
            color: #880e4f;
        }

        .menu {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            justify-content: center;
            margin-bottom: 3em;
        }

        a.button {
            background: #d81b60;
            color: white;
            text-decoration: none;
            padding: 1.1em 2.5em;
            border-radius: 40px;
            font-weight: 600;
            font-size: 1.25rem;
            box-shadow: 0 4px 12px rgba(216, 27, 96, 0.4);
            transition: background 0.3s ease, transform 0.2s ease;
            user-select: none;
        }

        a.button:hover {
            background: #ad1457;
            transform: translateY(-4px) scale(1.05);
            box-shadow: 0 8px 18px rgba(173, 20, 87, 0.6);
        }

        a.logout {
            font-size: 1rem;
            color: #6a1b4d;
            text-decoration: underline;
            cursor: pointer;
            transition: color 0.25s ease;
        }

        a.logout:hover {
            color: #880e4f;
        }
    </style>
</head>

<body>
    <h1>Selamat datang di Dashboard</h1>
    <div class="menu">
        <a href="<?= base_url('users_view') ?>" class="button">Kelola Member</a>
        <a href="<?= base_url('daftarbuku') ?>" class="button">Kelola Buku</a>
        <a href="<?= base_url('logout') ?>" class="button">Logout</a>
    </div>
</body>

</html>