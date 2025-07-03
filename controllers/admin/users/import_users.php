<?php
require '../../../config/Database.php';
require '../../../models/User.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['import'])) {
    $file = $_FILES['file_excel']['tmp_name'];
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet()->toArray();

    $user = new User();

    foreach ($sheet as $key => $row) {
        if ($key === 0) continue; // Skip header

        // Validasi minimal kolom dan isi tidak kosong
        if (count($row) < 6 || in_array(null, array_slice($row, 0, 6))) {
            continue; // skip baris yang tidak lengkap
        }

        // Siapkan data
        $data = [
            'username' => trim($row[0]),
            'nama'     => trim($row[1]),
            'email'    => trim($row[2]),
            'telepon'  => trim($row[3]),
            'password' => trim($row[4]),
            'role'     => trim($row[5]),
        ];

        // Pastikan semua kolom utama tidak kosong
        if ($data['username'] && $data['nama'] && $data['email'] && $data['password']) {
            $user->insert($data);
        }
    }

    header('Location: ../../../views/admin/users/index.php?import=success');
    exit;
}
