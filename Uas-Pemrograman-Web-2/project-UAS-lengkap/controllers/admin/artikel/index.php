<?php
require_once '../../../config/database.php';
require_once '../../../models/Artikel.php';

$db = (new Database())->getConnection();
$artikel = new Artikel($db);
$data = $artikel->getAll();

include '../../../views/admin/artikel/index.php';
