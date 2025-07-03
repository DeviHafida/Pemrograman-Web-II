<?php
require '../../../config/Database.php';
require '../../../models/Tag.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$db = new Database();
$conn = $db->getConnection();
$tag = new Tag($conn);

if (isset($_POST['import'])) {
    $file = $_FILES['file_excel']['tmp_name'];
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet()->toArray();

    foreach ($sheet as $key => $row) {
        if ($key === 0) continue; // Skip header
        $nama = trim($row[0]);
        if (!empty($nama)) {
            $tag->insert($nama);
        }
    }

    header("Location: ../../../views/admin/tag/index.php?import=success");
    exit;
}
