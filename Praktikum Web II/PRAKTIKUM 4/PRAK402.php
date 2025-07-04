<!DOCTYPE html>
<html>
<head>
    <title>PRAK402 - Nilai Mahasiswa</title>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h3>Data Nilai Mahasiswa</h3>

<?php
$data = [
    [
        "Nama" => "Andi",
        "NIM" => "2101001",
        "UTS" => 87,
        "UAS" => 65
    ],
    [
        "Nama" => "Budi",
        "NIM" => "2101002",
        "UTS" => 76,
        "UAS" => 79
    ],
    [
        "Nama" => "Tono",
        "NIM" => "2101003",
        "UTS" => 50,
        "UAS" => 41
    ],
    [
        "Nama" => "Jessica",
        "NIM" => "2101004",
        "UTS" => 60,
        "UAS" => 75
    ]
];

echo "<table>";
echo "<tr>
        <th>Nama</th>
        <th>NIM</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Akhir</th>
        <th>Huruf</th>
    </tr>";

foreach ($data as $mhs) {
    $nilai_akhir = 0.4 * $mhs["UTS"] + 0.6 * $mhs["UAS"];

    if ($nilai_akhir >= 80) {
        $huruf = "A";
    } elseif ($nilai_akhir >= 70) {
        $huruf = "B";
    } elseif ($nilai_akhir >= 60) {
        $huruf = "C";
    } elseif ($nilai_akhir >= 50) {
        $huruf = "D";
    } else {
        $huruf = "E";
    }

    echo "<tr>";
    echo "<td>{$mhs['Nama']}</td>";
    echo "<td>{$mhs['NIM']}</td>";
    echo "<td>{$mhs['UTS']}</td>";
    echo "<td>{$mhs['UAS']}</td>";
    echo "<td>" . number_format($nilai_akhir, 1) . "</td>";
    echo "<td>$huruf</td>";
    echo "</tr>";
}
echo "</table>";
?>

</body>
</html>