<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
require_once('../libs/database.php');
$data = json_decode(file_get_contents('php://input'), true);
if ($data['action'] == "login") {
    $user = trim($data['user']);
    $pass = md5(trim($data['pass']));
    // set query
    $sql = "SELECT * from login_khachhang WHERE username = '{$user}'";

    $result = db_get_row($sql);
    // get data
    $arr = array();
    $username = '';
    $error = '';
    if (count($result) == 0) {
        $error = "not_user";
        array_push($arr, $error);
    } else if ($pass == $result['pass']) {
        $sql_name = "SELECT * from khachhang WHERE MSKH='{$result['MSKH']}'";
        $name = db_get_row($sql_name);
        $error = "true";
        $username = $name['HoTen'];
        $MSKH = $name['MSKH'];
        // echo json_encode($username);
        array_push($arr, $error, $username, $MSKH);
    } else {
        $error = "not_pass";
        array_push($arr, $error);
    }
    echo json_encode($arr);
}
if ($data['action'] == 'get_username') {
    $user = $data['user'];
    $sql = "SELECT username from login_khachhang WHERE username = '{$user}'";
    $resul = db_get_row($sql);
    echo json_encode($resul);
}
if ($data['action'] == 'dangky') {
    $hoten = $data['hoten'];
    $sdt = $data['sdt'];
    $email = $data['email'];
    $username = $data['username'];
    $pass = md5($data['pass']);
    $sql_info = 'INSERT INTO khachhang (MSKH, HoTen, SoDienThoai, Email) 
    VALUES ("","' . $hoten . '","' . $sdt . '"," ' . $email . '")';
    $resul = db_execute($sql_info);
    if ($resul) {
        $mskh = mysqli_insert_id($conn);
        $sql_login = 'INSERT INTO login_khachhang (username,pass,MSKH)
        VALUES ("' . $username . '","' . $pass . '","' . $mskh . '")';
        $resul_login = db_execute($sql_login);
        if ($resul_login) {
            echo json_encode("true");
        } else {
            echo json_encode("flase");
        }
    } else {
        echo json_encode("flase");
    }
}
if ($data['action'] == "getInfo") {
    $mskh = $data['mskh'];
    $sql =  "SELECT * from khachhang WHERE MSKH = '{$mskh}'";
    $resul = db_get_row($sql);
    echo json_encode($resul);
}
if ($data['action'] == "getInfoAddress") {
    $mskh = $data['mskh'];
    $sql =  "SELECT * from diachikh WHERE MSKH = '{$mskh}' ORDER BY MaDC DESC";
    $resul = db_get_list($sql);
    echo json_encode($resul);
}
if ($data['action'] == "themDiaChi") {
    $mskh = $data['mskh'];
    $diachi = trim($data['diachi']);
    $sql = 'INSERT INTO diachikh (MaDC,DiaChi,MSKH)
    VALUES ("","' . $diachi . '","' . $mskh . '")';
    if (db_execute($sql)) {
        $err = "Đã lưu địa chỉ";
    } else {
        $err = "Lưu địa chỉ thất bại";
    }
    echo json_encode($err);
}
