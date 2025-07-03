<?php
require '../../../config/Database.php';
require '../../../models/Artikel.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['import'])) {
    $file = $_FILES['file_excel']['tmp_name'];
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet()->toArray();

    $db = (new Database())->getConnection();
    $artikel = new Artikel($db);

    foreach ($sheet as $key => $row) {
        if ($key === 0) continue; // Skip header
        $artikel->insert([
            'judul' => $row[0],
            'isi' => $row[1],
            'kategori_id' => $row[2]
        ]);
    }
    header('Location: ../../../views/admin/artikel/index.php?import=success');
    exit;
}
