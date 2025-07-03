<?php
require '../../../config/Database.php';
require '../../../models/Tag.php';
require '../../../libraries/PhpSpreadsheet/vendor/autoload.php';
require '../../../libraries/fpdf/fpdf.php'; // ✅ Ganti dari tcpdf ke fpdf

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

$db = new Database();
$conn = $db->getConnection();
$tag = new Tag($conn);

$action = $_GET['action'] ?? 'pdf';
$data = $tag->getAll();

if (!$data || !is_array($data) || count($data) === 0) {
    die("Tidak ada data tag yang ditemukan atau query gagal.");
}

if ($action === 'excel') {
    // ✅ Export Excel
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'ID');
    $sheet->setCellValue('B1', 'Nama Tag');

    $rowIndex = 2;
    foreach ($data as $row) {
        $sheet->setCellValue("A{$rowIndex}", $row['id']);
        $sheet->setCellValue("B{$rowIndex}", $row['nama_tag']);
        $rowIndex++;
    }

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="data_tag.xlsx"');
    header('Cache-Control: max-age=0');
    $writer = new Xlsx($spreadsheet);
    $writer->save('php://output');
    exit;
} elseif ($action === 'pdf') {
    // ✅ Export PDF pakai FPDF
    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0, 10, 'Data Tag', 0, 1, 'C');
    $pdf->Ln(5);

    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(20, 10, 'ID', 1);
    $pdf->Cell(100, 10, 'Nama Tag', 1);
    $pdf->Ln();

    $pdf->SetFont('Arial', '', 12);
    foreach ($data as $row) {
        $pdf->Cell(20, 10, $row['id'], 1);
        $pdf->Cell(100, 10, $row['nama_tag'], 1);
        $pdf->Ln();
    }

    $pdf->Output('I', 'data_tag.pdf');
    exit;
}
