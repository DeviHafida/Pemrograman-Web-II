<?php
// controllers/admin/ExportKomentar.php
require '../../../config/Database.php';
require '../../../models/Komentar.php';
require '../../../libraries/fpdf/fpdf.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = new Database();
$conn = $db->getConnection();
$komentar = new Komentar($conn);
$data = $komentar->getAll()->fetch_all(MYSQLI_ASSOC);

if ($_GET['action'] == 'pdf') {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Laporan Komentar', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $row) {
        $pdf->MultiCell(0, 10, "{$row['username']} - {$row['judul']}\n{$row['isi']}\n{$row['created_at']}", 0);
        $pdf->Ln(2);
    }
    $pdf->Output('D', 'laporan_komentar.pdf');
    exit;
}

if ($_GET['action'] == 'excel') {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Cerita');
    $sheet->setCellValue('C1', 'User');
    $sheet->setCellValue('D1', 'Isi');
    $sheet->setCellValue('E1', 'Waktu');

    $rowNum = 2;
    foreach ($data as $row) {
        $sheet->setCellValue('A' . $rowNum, $row['id']);
        $sheet->setCellValue('B' . $rowNum, $row['judul']);
        $sheet->setCellValue('C' . $rowNum, $row['username']);
        $sheet->setCellValue('D' . $rowNum, $row['isi']);
        $sheet->setCellValue('E' . $rowNum, $row['created_at']);
        $rowNum++;
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan_komentar.xlsx"');
    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");
    exit;
}