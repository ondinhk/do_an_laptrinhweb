<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
require_once('../libs/database.php');
// get input
$data = json_decode(file_get_contents('php://input'), true);
$user = trim($data['user']);
$pass = md5(trim($data['pass']));
// set query
$sql = "SELECT * from login WHERE username = '{$user}'";
$result = db_get_row($sql);
// get data

$username = '';
if (count($result) == 0) {
    $arr = array();
    $error = "not_user";
    array_push($arr, $error);
} elseif ($pass == $result['password']) {
    $arr = array();
    $error = "true";
    $username = $user;
    $admin = $result['admin'];
    $msnv = $result['msnv'];
    array_push($arr, $error, $username, $admin, $msnv);
} else {
    $arr = array();
    $error = "not_pass";
    array_push($arr, $error);
}
// array_push($arr, $admin);
echo json_encode($arr);
