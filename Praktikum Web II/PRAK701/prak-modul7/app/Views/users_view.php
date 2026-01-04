<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Daftar Users</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #ffeef3;
            color: #4a324a;
            margin: 40px auto;
            max-width: 700px;
            padding: 0 15px;
        }

        h1 {
            color: #d6336c;
            text-align: center;
            margin-bottom: 30px;
            font-weight: 600;
            font-size: 2rem;
        }

        .btn-container {
            text-align: right;
            margin-bottom: 20px;
        }

        .btn-dashboard {
            display: inline-block;
            background-color: #ff69b4;
            color: white;
            padding: 10px 20px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .btn-dashboard:hover {
            background-color: #ff1493;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff0f5;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(255, 182, 193, 0.4);
            font-size: 0.95rem;
            overflow: hidden;
        }

        thead {
            background-color: #ff69b4;
            color: white;
        }

        thead th {
            padding: 12px 16px;
            text-align: left;
            font-weight: 600;
        }

        tbody tr {
            border-bottom: 1px solid #ffc0cb;
            transition: background-color 0.2s ease;
        }

        tbody tr:last-child {
            border-bottom: none;
        }

        tbody tr:hover {
            background-color: #ffd6e8;
        }

        tbody td {
            padding: 12px 16px;
            color: #4a324a;
        }

        p {
            text-align: center;
            font-style: italic;
            color: #92617a;
            font-size: 1.1rem;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <h1>Daftar Users</h1>

    <div class="btn-container">
        <a href="<?= base_url('dashboard') ?>" class="btn-dashboard">Kembali ke Dashboard</a>
    </div>

    <?php if (!empty($users) && is_array($users)) : ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td><?= esc($user['password']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else : ?>
        <p>Tidak ada data user.</p>
    <?php endif; ?>
</body>

</html>