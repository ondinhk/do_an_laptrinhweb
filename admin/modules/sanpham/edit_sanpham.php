<?php
require_once('../../libs/database.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$index = 0;
$sql = 'SELECT * FROM hanghoa WHERE MSHH=' . $id;
$result = db_get_row($sql);
$ten = $result['TenHH'];
$quycach = $result['QuyCach'];
$gia = $result['Gia'];
$soluong = $result['SoLuongHang'];
$maloaihang = $result['MaLoaiHang'];
$sql_img = 'SELECT url FROM hinhhanghoa WHERE MSHH=' . $id;
$result_img = db_get_list($sql_img);
foreach ($result_img as $url_img) {
    foreach ($url_img as $row) {
        $img[$index] = $row;
        $index++;
    }
}
$sql_type = 'SELECT TenLoaiHang FROM loaihanghoa WHERE MaLoaiHang=' . $maloaihang;
$result_type = db_get_row($sql_type);
if ($result_type != 1) {
    $tenloaihang = $result_type['TenLoaiHang'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $ten ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh sửa hàng hóa: <?= $ten ?></h5>
                <input type="text" hidden id="idhang" value="<?= $id ?>">
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="inputEmail4" class="form-label justify-content-center align-items-center">Tên
                            sản phẩm:</label>
                        <input type="text" class="form-control" id="tensanpham" value="<?= $ten ?>">
                    </div>
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Loại sản phẩm:</label>
                        <select class="form-select" id='loaisanpham' required>
                            <?php
                            echo '<option value="' . $maloaihang . '">' .  $tenloaihang . '</option>';
                            $sql_danhmuc = "SELECT * FROM loaihanghoa";
                            $result_danhmuc = db_get_list($sql_danhmuc);
                            foreach ($result_danhmuc as $row_type) {
                                echo '
                                            <option value="' . $row_type["MaLoaiHang"] . '">' . $row_type["TenLoaiHang"] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-8"></div>
                    <div class="col-md-3">
                        <label for="inputCity" class="form-label">Giá:</label>
                        <input type="number" class="form-control" id="gia" value="<?= $gia ?>">
                    </div>
                    <div class="col-md-3">
                        <label for="inputZip" class="form-label">Số lượng nhập:</label>
                        <input type="number" class="form-control" id="soluong" value="<?= $soluong ?>">
                    </div>
                    <div>
                        <label for="inputZip" class="form-label">Url hình ảnh: (ảnh minh họa sẽ thay đổi khi
                            nhập đúng url)</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control my-1" placeholder="url 1" value="<?= $img[0] ?>" id="url_input_1">
                            <input type="text" class="form-control my-1" placeholder="url 2" value="<?= $img[1] ?>" id="url_input_2">
                            <input type="text" class="form-control my-1" placeholder="url 3" value="<?= $img[2] ?>" id="url_input_3">
                        </div>
                        <div class=" col-md-3 d-flex">
                            <img onerror="this.src='../assets/logo/logo_600x600.png'" src="<?= $img[0] ?>" id="img_add_1" alt="" width="250px" height="250px" class="img-fluid img-thumbnail p-1 m-2" style="object-fit: contain;">
                            <img onerror="this.src='../assets/logo/logo_600x600.png'" src="<?= $img[1] ?>" id="img_add_2" alt="" width="250px" height="250px" class="img-fluid img-thumbnail p-1 m-2" style="object-fit: contain;">
                            <img onerror="this.src='../assets/logo/logo_600x600.png'" src="<?= $img[2] ?>" id="img_add_3" alt="" width="250px" height="250px" class="img-fluid img-thumbnail p-1 m-2" style="object-fit: contain;">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Mô
                            tả sản phẩm:</label>
                        <textarea class="form-control" id="thongtin" rows="3">
                            <?= $quycach ?>
                        </textarea>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary" onclick="checkSubmit()">Cập nhật sản
                            phẩm</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var img1 = document.getElementById('img_add_1');
        var input1 = document.getElementById('url_input_1');
        input1.onchange = function() {
            img1.src = this.value;
        }
        var img2 = document.getElementById('img_add_2');
        var input2 = document.getElementById('url_input_2');
        input2.onchange = function() {
            img2.src = this.value;
        }
        var img3 = document.getElementById('img_add_3');
        var input3 = document.getElementById('url_input_3');
        input3.onchange = function() {
            img3.src = this.value;
        }
        url_defaul = '/assets/logo/logo_600x600.png';

        function checkimg(url) {
            if (url.indexOf(url_defaul) == -1) {
                return 0;
            } else {
                return -1;
            }
        }

        function checkSubmit() {
            url_1 = img1.src;
            url_2 = img2.src;
            url_3 = img3.src;
            if (checkimg(url_1) || checkimg(url_2) || checkimg(url_3)) {
                alert("Vui lòng kiểm tra lại link hình ảnh");
                return false;
            } else {
                var tensanpham = document.getElementById('tensanpham').value;
                var gia = document.getElementById('gia').value;
                var loaisanpham = document.getElementById('loaisanpham').value;
                var soluong = document.getElementById('soluong').value;
                var thongtin = document.getElementById('thongtin').value;
                var id = document.getElementById('idhang').value;
                var add_product = fetch('/B1812346_OnDinhKhang/admin/api/db_sanpham.php', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            action: "edit_product",
                            id: id,
                            tensanpham: tensanpham,
                            loaisanpham: loaisanpham,
                            gia: gia,
                            soluong: soluong,
                            thongtin: thongtin,
                            url1: url_1,
                            url2: url_2,
                            url3: url_3
                        })
                    })
                    .then(Response => Response.json())
                    .then(data => {
                        if (data == 1) {
                            alert('Cập nhật thành công');
                            var home = 'http://127.0.0.1/B1812346_OnDinhKhang/admin/index.php?m=sanpham&a=sanpham';
                            window.location.href = home;
                        } else {
                            alert('Cập nhật thất bại');
                        }
                    })
            }
        }
    </script>
</body>

</html>