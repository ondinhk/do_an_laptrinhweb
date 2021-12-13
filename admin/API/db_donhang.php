<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
require_once('../libs/database.php');
// get input
$data = json_decode(file_get_contents('php://input'), true);
if ($data['action'] == "get_donhang") {
    $sql = 'SELECT * FROM dathang WHERE TrangThaiDH="Chờ Xác Nhận"';
    $query = db_get_list($sql);
    echo json_encode($query);
}
if ($data['action'] == "get_donhang_daduyet") {
    $sql = 'SELECT * FROM dathang WHERE TrangThaiDH="Đã xác nhận"';
    $query = db_get_list($sql);
    echo json_encode($query);
}
if ($data['action'] == "get_donhang_dagiao") {
    $sql = 'SELECT * FROM dathang WHERE TrangThaiDH="Đã giao"';
    $query = db_get_list($sql);
    echo json_encode($query);
}

if ($data['action'] == "get_chitiet_donhang") {
    $arr_items = array();
    $sodonhang = $data['sodonhang'];
    $sql = "SELECT * FROM chitietdathang WHERE SoDonDH =" . $sodonhang;
    $query = db_get_list($sql);
    // info
    foreach ($query as $key => $value) {
        # code...
        $mshh = $value['MSHH'];
        $sql_ten = 'SELECT TenHH FROM hanghoa WHERE mshh=' . $mshh;
        $ten = db_get_row($sql_ten);
        $arr_item[$key] = array(
            "MSHH" => $mshh,
            "TenHH" => $ten['TenHH'],
            "SoLuong" => $value['SoLuong'],
            "Gia" => $value['GiaDatHang']
        );
        array_push($arr_items, $arr_item[$key]);
    }
    echo json_encode($arr_items);
}
if ($data['action'] == "get_info") {
    $msdh = $data['sodonhang'];
    $sql = 'SELECT * FROM dathang WHERE SoDonDH=' . $msdh;
    $query = db_get_row($sql);
    $sql_sdt = "SELECT * FROM khachhang WHERE MSKH =" . $query['MSKH'];
    $query_sdt = db_get_row($sql_sdt);
    $arr_info = array("Ten" => $query['TenKH'], "SDT" => $query_sdt['SoDienThoai'], "DiaChi" => $query['DiaChi'], "Email" => $query_sdt['Email']);
    $arr = array();
    array_push($arr, $arr_info);
    echo json_encode($arr);
}
if ($data['action'] == 'duyetdon') {
    $msdh = $data['sodonhang'];
    $sql = 'UPDATE dathang SET TrangThaiDH = "Đã xác nhận" WHERE SoDonDH = ' . $msdh;
    if (db_execute($sql)) {
        echo json_encode("Đã duyệt thành công");
    } else {
        echo json_encode("Duyệt thất bại, vui lòng thử lại");
    }
}
if ($data['action'] == 'dagiao') {
    $msdh = $data['sodonhang'];
    $sql = 'UPDATE dathang SET TrangThaiDH = "Đã giao" WHERE SoDonDH = ' . $msdh;
    if (db_execute($sql)) {
        echo json_encode("Xác nhận thành công");
    } else {
        echo json_encode("Xác nhận thất bại, vui lòng thử lại");
    }
}
