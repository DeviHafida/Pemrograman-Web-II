<?php
require '../../../config/Database.php';
require '../../../models/Kategori.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;

$db = new Database();
$conn = $db->getConnection();
$kategori = new Kategori($conn);

if (isset($_POST['import'])) {
    $file = $_FILES['file_excel']['tmp_name'];
    $spreadsheet = IOFactory::load($file);
    $sheet = $spreadsheet->getActiveSheet()->toArray();

    foreach ($sheet as $key => $row) {
        if ($key === 0) continue; // Skip baris header
        $nama = trim($row[0]);

        // Validasi kosong
        if (!empty($nama)) {
            $kategori->insert($nama);
        }
    }

    header("Location: ../../../views/admin/kategori/index.php?import=success");
    exit;
}
