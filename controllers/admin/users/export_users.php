<?php
// controllers/admin/ExportUsers.php
require '../../../config/Database.php';
require '../../../models/User.php';
require '../../../libraries/fpdf/fpdf.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$user = new User();
$data = $user->getAll()->fetch_all(MYSQLI_ASSOC);

if (isset($_GET['action']) && $_GET['action'] == 'pdf') {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Laporan Users', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $row) {
        $pdf->Cell(0, 10, $row['username'] . ' - ' . $row['email'], 0, 1);
    }
    $pdf->Output('D', 'laporan_users.pdf');
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == 'excel') {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Username');
    $sheet->setCellValue('B1', 'Nama');
    $sheet->setCellValue('C1', 'Email');
    $sheet->setCellValue('D1', 'Telepon');
    $sheet->setCellValue('E1', 'Role');

    $rowNum = 2;
    foreach ($data as $row) {
        $sheet->setCellValue('A' . $rowNum, $row['username']);
        $sheet->setCellValue('B' . $rowNum, $row['nama']);
        $sheet->setCellValue('C' . $rowNum, $row['email']);
        $sheet->setCellValue('D' . $rowNum, $row['telepon']);
        $sheet->setCellValue('E' . $rowNum, $row['role']);
        $rowNum++;
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan_users.xlsx"');
    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");
    exit;
}