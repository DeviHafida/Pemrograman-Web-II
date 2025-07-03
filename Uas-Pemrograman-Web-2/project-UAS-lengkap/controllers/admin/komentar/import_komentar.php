<?php
require '../../../config/Database.php';
require '../../../models/Komentar.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$db = new Database();
$conn = $db->getConnection();
$komentar = new Komentar($conn);

if (isset($_POST['import'])) {
    $file = $_FILES['file_excel']['tmp_name'];
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet()->toArray();

    foreach ($sheet as $key => $row) {
        if ($key === 0) continue; // skip header
        $komentar->tambah($row[0], $row[1], $row[2]); // cerita_id, user_id, isi
    }

    header("Location: ../../views/admin/komentar/index.php?import=success");
    exit;
}
