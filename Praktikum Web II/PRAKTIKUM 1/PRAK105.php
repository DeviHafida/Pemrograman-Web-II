<?php
$data = [
    "S22" => "Samsung Galaxy S22",
    "S22Plus" => "Samsung Galaxy S22+",
    "A03" => "Samsung Galaxy AO3",
    "Xcover5" => "Samsung Galaxy Xcover 5",
];

echo "<h3 style='background-color: red; color: white; padding: 5px; margin: 5px 0;'>Daftar Smartphone Samsung</h3>";
echo "<ul style='list-style-type: none; padding: 0;'>";
foreach ($data as $key => $item) {
    echo "<li><strong>$key:</strong> $item</li>";
}
echo "</ul>";
?>