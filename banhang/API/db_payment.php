<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json; charset=utf-8');
require_once('../libs/database.php');
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['object_mskh'])) {
    $err = 1;
    $object = $data['object_mskh'];
    // Mã địa chỉ
    $madiachi = $object['info']['diachi'];
    // Mã khách
    $mskh = $object['info']['mskh'];
    $tenkh = $object['info']['ten'];
    // Sql lấy địa chỉ
    $sql_diachi = 'SELECT DiaChi FROM diachikh WHERE MaDC = ' . $madiachi;
    $diachi = db_get_row($sql_diachi);
    // Sql đặt hàng 
    $sql_dathang = 'INSERT INTO dathang (SoDonDH, mskh,TenKH, msnv, NgayGH,  TrangThaiDH, DiaChi) 
    VALUES ("","' . $mskh . '","' . $tenkh . '", "2", "","Chờ Xác Nhận","' . $diachi['DiaChi'] . '")';
    //(count($object) - 1)
    if (db_execute($sql_dathang)) {
        // Lấy id mới tạo
        $id = mysqli_insert_id($conn);
        foreach ($object as $mshh => $value) {
            if ($mshh == 'info') continue;
            //Lấy giá tiền
            $gia_string = $value['gia'];
            $gia = (int)str_replace(",", "", $gia_string);
            // cap nhat so luong hang
            $sql_soluongconlai = "SELECT SoLuongHang from hanghoa WHERE mshh=" . $mshh;
            $soluongconlai = db_get_row($sql_soluongconlai);
            $temp = ((int)$soluongconlai['SoLuongHang']) - ((int)$value['soluong']);
            $sql_update_soluonghang = 'UPDATE hanghoa SET SoLuongHang=' . $temp . ' WHERE MSHH=' . $mshh;
            db_execute($sql_update_soluonghang);
            //Sql chi tiết
            $sql_chitiet = 'INSERT INTO chitietdathang (SoDonDH, MSHH , SoLuong, GiaDatHang) 
            VALUES ("' . $id . '","' . $mshh . '", "' . $value['soluong'] . '","' . $gia . '")';
            db_execute($sql_chitiet);
        }
        $err = 0;
    } else {
        $err = 1;
    }
} else {
    $err = 1;
}
echo json_encode(($err));
