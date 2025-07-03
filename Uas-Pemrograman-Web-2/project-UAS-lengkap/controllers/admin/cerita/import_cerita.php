<?php
require '../../../config/Database.php';
require '../../../models/Cerita.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

if (isset($_POST['import'])) {
    $file = $_FILES['file_excel']['tmp_name'];
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet()->toArray();

    $cerita = new Cerita();
    foreach ($sheet as $key => $row) {
        if ($key === 0) continue; // Skip header
        $cerita->insert($row[0], $row[1], $row[2]);
    }
    header('Location: ../../../views/admin/cerita/index.php?import=success');
    exit;
}
