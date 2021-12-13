<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
require_once('../libs/database.php');
$data = json_decode(file_get_contents('php://input'), true);

// Lay san pham
if ($data['action'] == "get_list") {
    $sql = "SELECT * FROM hanghoa";
    $query = db_get_list($sql);
    $result = array();
    foreach ($query as $item) {
        $sql_img = "SELECT url from hinhhanghoa WHERE MSHH=" . $item['MSHH'];
        $sql_category = "SELECT TenLoaiHang from loaihanghoa WHERE MaLoaiHang=" . $item['MaLoaiHang'];
        $img = db_get_row($sql_img);
        $category = db_get_row($sql_category);
        $gia = number_format($item['Gia']);
        array_push($item, $img);
        array_push($item, $gia);
        array_push($item, $category);
        array_push($result, $item);
        // print_r($item);        
    }
    echo json_encode($result);
}
// Them san pham
if ($data['action'] == "add_product") {
    $name_product = $data['tensanpham'];
    $content = trim($data['thongtin']);
    $cost = $data['gia'];
    $number = $data['soluong'];
    $caterogy = $data['loaisanpham'];
    $url_input_1 = $data['url1'];
    $url_input_2 = $data['url2'];
    $url_input_3 = $data['url3'];
    // query
    $sql = 'INSERT INTO hanghoa (MSHH, TenHH, QuyCach, Gia, SoLuongHang, MaLoaiHang)
    VALUES ("", "' . $name_product . '", "' . $content . '", "' . $cost . '", "' . $number . '", "' . $caterogy . '");';
    $resul = db_execute($sql);
    $mshh = mysqli_insert_id($conn);
    $sql_img_1 = 'INSERT INTO hinhhanghoa (MaHinh,TenHinh, url, MSHH)
    VALUES ("","' . $name_product . '","' . $url_input_1 . '","' . $mshh . '")';
    $sql_img_2 = 'INSERT INTO hinhhanghoa (MaHinh,TenHinh, url, MSHH)
    VALUES ("","' . $name_product . '","' . $url_input_2 . '","' . $mshh . '")';
    $sql_img_3 = 'INSERT INTO hinhhanghoa (MaHinh,TenHinh, url, MSHH)
    VALUES ("","' . $name_product . '","' . $url_input_3 . '","' . $mshh . '")';
    $resul_img_1 = db_execute($sql_img_1);
    $resul_img_2 = db_execute($sql_img_2);
    $resul_img_3 = db_execute($sql_img_3);
    if ($resul && $resul_img_1 && $resul_img_2 && $resul_img_3) {
        echo json_encode("Thêm thành công");
    } else {
        echo json_encode("Thêm thất bại");
    }
}
// Xoa san pham
if ($data['action'] == "delete_product") {
    $id = $data['id'];
    $sql = 'DELETE FROM hanghoa WHERE MSHH=' . $id;
    if (db_execute($sql)) {
        echo json_encode("Xóa thành công");
    } else {
        echo json_encode("Xóa thất bại");
    }
}
// Sua san pham
if ($data['action'] == "edit_product") {
    $i = 0;
    $id = $data['id'];
    $name_product = $data['tensanpham'];
    $number = $data['soluong'];
    $cost = $data['gia'];
    $caterogy = $data['loaisanpham'];
    $url_input_1 = $data['url1'];
    $url_input_2 = $data['url2'];
    $url_input_3 = $data['url3'];
    $content = trim($data['thongtin']);
    $url = array($url_input_1, $url_input_2, $url_input_3);
    $sql_info = 'UPDATE hanghoa SET TenHH = "' . $name_product . '", QuyCach="' . $content . '",Gia="' . $cost . '", SoLuongHang="' . $number . '", MaLoaiHang="' . $caterogy . '" WHERE MSHH=' . $id;
    $sql_list_img = 'SELECT MaHinh FROM hinhhanghoa WHERE MSHH=' . $id;
    $list_img = db_get_list($sql_list_img);
    foreach ($list_img as $row) {
        $sql_update_img = 'UPDATE hinhhanghoa SET url ="' . $url[$i] . '" WHERE  MaHinh=' . $row['MaHinh'];
        db_execute($sql_update_img);
        $i++;
    }
    if (db_execute($sql_info)) {
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }
}
// #########################
// Lay loai hang hoa
if ($data['action'] == "get_category") {
    $sql = "SELECT * FROM loaihanghoa";
    $query = db_get_list($sql);
    echo json_encode($query);
}
// Them loai hang
if ($data['action'] == "add_category") {
    $tendanhmuc = $data['tendanhmuc'];
    $url1 = $data['url1'];
    $sql = 'INSERT INTO loaihanghoa (MaLoaiHang, TenLoaiHang, url ) VALUES ("","' . $tendanhmuc . '","' . $url1 . '")';
    if (db_execute($sql)) {
        $comm = "Thêm thành công";
    } else {
        $comm = "Thêm thất bại";
    }
    echo json_encode($comm);
}
// Xoa loai hang
if ($data['action'] == "delete_category") {
    $id = $data['id'];
    $sql = 'DELETE FROM loaihanghoa WHERE MaLoaiHang=' . $id;
    if (db_execute($sql)) {
        $comm = "Xóa thành công";
    } else {
        $comm = "Xóa thất bại";
    }
    echo json_encode($comm);
}
// Sua loai hang
if ($data['action'] == 'edit_category') {
    $name = $data['tendanhmuc'];
    $url = $data['url1'];
    $maloaihang = $data["id"];
    $sql = 'UPDATE loaihanghoa SET TenLoaiHang ="' . $name . '", url = "' . $url . '" WHERE  MaLoaiHang=' . $maloaihang;
    if (db_execute($sql)) {
        echo json_encode(1);
    } else {
        echo json_encode(0);
    }
}
