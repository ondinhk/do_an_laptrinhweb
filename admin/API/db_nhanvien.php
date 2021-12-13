<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
require_once('../libs/database.php');
// get input
$data = json_decode(file_get_contents('php://input'), true);
if ($data['action'] == "get_nhanvien") {
    $sql = "SELECT * FROM nhanvien";
    $query = db_get_list($sql);
    echo json_encode($query);
}
if ($data['action'] == "get_admin") {
    $id = $data['msnv'];
    $sql = "SELECT admin FROM login WHERE msnv=" . $id;
    $query = db_get_row($sql);
    echo json_encode($query);
}
if ($data['action'] == "add_nhanvien") {
    $ten = $data['ten'];
    $chucvu = $data['chucvu'];
    $diachi = $data['diachi'];
    $sdt = $data['sdt'];
    $username = $data['username'];
    $pass = md5($data['pass']);
    $admin = $data['admin'];

    $sql = 'INSERT INTO nhanvien (msnv, HoTenNV, ChucVu, DiaChi, SoDienThoai ) VALUES ("","' . $ten . '","' . $chucvu . '","' . $diachi . '","' . $sdt . '")';
    $excute = db_execute($sql);
    $msnv = mysqli_insert_id($conn);
    $sql_user = 'INSERT INTO login (username, password, msnv, admin ) VALUES ("' . $username . '","' . $pass . '","' . $msnv . '","' . $admin . '")';
    if (db_execute($sql_user)) {
        $err = "Thêm thành công !!";
    } else {
        $err = "Thêm thất bại";
    }
    echo json_encode($err);
}
if ($data['action'] == "xoa_nhanvien") {
    $id = $data['id'];
    $sql = "DELETE FROM nhanvien WHERE msnv=" . $id;
    if (db_execute($sql)) {
        $err = "Xóa thành công !!";
    } else {
        $err = "Xóa thất bại";
    }
    echo json_encode($err);
}
if ($data['action'] == 'get_username') {
    $user = $data['user'];
    $sql = "SELECT username from login WHERE username = '{$user}'";
    $resul = db_get_row($sql);
    echo json_encode($resul);
}
