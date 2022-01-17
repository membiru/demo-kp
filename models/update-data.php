<?php 
require_once('../config/+koneksi.php');
require_once('../models/database.php');
include "../models/m_dTable.php";

$connection = new Database($host, $user, $pass, $database);
$tbl = new DTable($connection);

$hasil_prediksi = $_POST['result'];

$tbl->edit("UPDATE `data_text` SET `prediction` = '$hasil_prediksi' WHERE `id` = (SELECT `id` FROM `data_text` ORDER BY date DESC LIMIT 1);");

?>