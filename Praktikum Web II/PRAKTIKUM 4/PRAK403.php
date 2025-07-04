<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            margin-top: 20px;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px 12px;
            text-align: center;
        }
        th {
            background-color: #ccc;
        }
        .revisi {
            background-color: red;
            color: white;
        }
        .tidak-revisi {
            background-color: green;
            color: white;
        }
    </style>
</head>
<body>

<h2>Data Mata Kuliah Mahasiswa</h2>

<?php
$data = [
    [
        "Nama" => "Ridho",
        "Matkul" => [
            ["nama" => "Pemrograman I", "sks" => 2],
            ["nama" => "Praktikum Pemrograman I", "sks" => 1],
            ["nama" => "Pengantar Lingkungan Lahan Basah", "sks" => 2],
            ["nama" => "Arsitektur Komputer", "sks" => 3]
        ]
    ],
    [
        "Nama" => "Ratna",
        "Matkul" => [
            ["nama" => "Basis Data I", "sks" => 2],
            ["nama" => "Praktikum Basis Data I", "sks" => 1],
            ["nama" => "Kalkulus", "sks" => 3]
        ]
    ],
    [
        "Nama" => "Tono",
        "Matkul" => [
            ["nama" => "Rekayasa Perangkat Lunak", "sks" => 3],
            ["nama" => "Analisis dan Perancangan Sistem", "sks" => 3],
            ["nama" => "Komputasi Awan", "sks" => 3],
            ["nama" => "Kecerdasan Bisnis", "sks" => 3]
        ]
    ]
];

echo "<table>";
echo "<tr>
        <th>No</th>
        <th>Nama</th>
        <th>Mata Kuliah diambil</th>
        <th>SKS</th>
        <th>Total SKS</th>
        <th>Keterangan</th>
    </tr>";

$no = 1;
foreach ($data as $mhs) {
    $total_sks = array_sum(array_column($mhs["Matkul"], "sks"));
    $keterangan = $total_sks < 7 ? "Revisi KRS" : "Tidak Revisi";
    $class_ket = $total_sks < 7 ? "revisi" : "tidak-revisi";

    foreach ($mhs["Matkul"] as $i => $mk) {
        echo "<tr>";

        if ($i === 0) {
            echo "<td>$no</td>";
            echo "<td>{$mhs['Nama']}</td>";
            echo "<td>{$mk['nama']}</td>";
            echo "<td>{$mk['sks']}</td>";
            echo "<td>$total_sks</td>";
            echo "<td class='$class_ket'>$keterangan</td>";
        } else {
            echo "<td></td><td></td>";
            echo "<td>{$mk['nama']}</td>";
            echo "<td>{$mk['sks']}</td>";
            echo "<td></td><td></td>";
        }

        echo "</tr>";
    }

    $no++;
}

echo "</table>";
?>

</body>
</html>