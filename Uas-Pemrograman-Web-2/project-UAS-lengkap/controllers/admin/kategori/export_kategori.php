<?php
// controllers/admin/ExportKategori.php
require '../../../config/Database.php';
require '../../../models/Kategori.php';
require '../../../libraries/fpdf/fpdf.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = new Database();
$conn = $db->getConnection();
$kategori = new Kategori($conn);
$data = $kategori->getAll();

if ($_GET['action'] == 'pdf') {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Laporan Kategori Artikel', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $row) {
        $pdf->Cell(0, 10, "{$row['id']}. {$row['nama_kategori']}", 0, 1);
    }
    $pdf->Output('D', 'laporan_kategori.pdf');
    exit;
}

if ($_GET['action'] == 'excel') {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Nama Kategori');

    $rowNum = 2;
    foreach ($data as $row) {
        $sheet->setCellValue('A' . $rowNum, $row['id']);
        $sheet->setCellValue('B' . $rowNum, $row['nama_kategori']);
        $rowNum++;
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan_kategori.xlsx"');
    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");
    exit;
}