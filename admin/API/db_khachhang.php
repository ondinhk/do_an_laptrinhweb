<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
require_once('../libs/database.php');
// get input
$data = json_decode(file_get_contents('php://input'), true);
if ($data['action'] == "get_khachhang") {
    $sql = 'SELECT * FROM khachhang';
    $query = db_get_list($sql);
    echo json_encode($query);
}
