<?php
require '../../../config/Database.php';
require '../../../models/Artikel.php';
require '../../../libraries/fpdf/fpdf.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = (new Database())->getConnection();
$artikel = new Artikel($db);
$data = $artikel->getAll()->fetch_all(MYSQLI_ASSOC);

if (isset($_GET['action']) && $_GET['action'] == 'pdf') {
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Laporan Artikel', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $row) {
        $pdf->Cell(0, 10, $row['judul'] . ' - ' . $row['created_at'], 0, 1);
    }
    $pdf->Output('D', 'laporan_artikel.pdf');
    exit;
}

if (isset($_GET['action']) && $_GET['action'] == 'excel') {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Judul');
    $sheet->setCellValue('B1', 'Isi');
    $sheet->setCellValue('C1', 'Kategori ID');

    $rowNum = 2;
    foreach ($data as $row) {
        $sheet->setCellValue('A' . $rowNum, $row['judul']);
        $sheet->setCellValue('B' . $rowNum, $row['isi']);
        $sheet->setCellValue('C' . $rowNum, $row['kategori_id']);
        $rowNum++;
    }

    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="laporan_artikel.xlsx"');
    $writer = new Xlsx($spreadsheet);
    $writer->save("php://output");
    exit;
}