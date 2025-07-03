<?php
// controllers/admin/ExportCerita.php
require '../../../config/Database.php';
require '../../../models/Cerita.php';
require '../../../libraries/fpdf/fpdf.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$cerita = new Cerita();
$data = $cerita->getAll()->fetch_all(MYSQLI_ASSOC);

if (isset($_GET['action']) && $_GET['action'] == 'pdf') {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Laporan Cerita', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $row) {
        $pdf->MultiCell(0, 10, $row['judul'] . "\n" . substr($row['isi'], 0, 50) . "...", 0);
    }
    $pdf->Output('D', 'laporan_cerita.pdf');
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == 'excel') {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'User ID');
    $sheet->setCellValue('B1', 'Judul');
    $sheet->setCellValue('C1', 'Isi');

    $rowNum = 2;
    foreach ($data as $row) {
        $sheet->setCellValue('A' . $rowNum, $row['user_id']);
        $sheet->setCellValue('B' . $rowNum, $row['judul']);
        $sheet->setCellValue('C' . $rowNum, $row['isi']);
        $rowNum++;
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan_cerita.xlsx"');
    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");
    exit;
}