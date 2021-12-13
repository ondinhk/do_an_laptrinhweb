<?php
require_once('../../libs/database.php');
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$sql = 'SELECT * FROM loaihanghoa WHERE MaLoaiHang=' . $id;
$result = db_get_row($sql);
$ten = $result['TenLoaiHang'];
$url = $result['url'];
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
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh sửa danh mục: <?= $ten ?></h5>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-8">
                        <label for="inputEmail4" class="form-label justify-content-center align-items-center">Tên danh mục:</label>
                        <input type="text" class="form-control" id="tendanhmuc" value="<?= $ten ?>">
                    </div>
                    <div>
                        <label for="inputZip" class="form-label">Url hình ảnh: (ảnh minh họa sẽ thay đổi khi nhập đúng url)</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control my-1" placeholder="url 1" id="url_input_1" value="<?= $url ?>">
                        </div>
                        <div class=" col-md-3 d-flex">
                            <img onerror="this.src='../../assets/logo/logo_600x600.png'" src="<?= $url ?>" id="img_add_1" alt="" width="400px" height="500px" class="img-fluid img-thumbnail p-1 m-2" style="object-fit: contain;">
                        </div>
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" class="btn btn-primary" id="<?= $id ?>" onclick="checkSubmit(this.id)">Sửa danh mục</button>
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
        url_defaul = '/assets/logo/logo_600x600.png';

        function checkimg(url) {
            if (url.indexOf(url_defaul) == -1) {
                return 0;
            } else {
                return -1;
            }
        }

        function checkSubmit(data_id) {
            url_1 = img1.src;
            if (checkimg(url_1)) {
                alert("Vui lòng kiểm tra lại link hình ảnh");
                return false;
            } else {
                var tendanhmuc = document.getElementById('tendanhmuc').value;
                var themdanhmuc = fetch('/B1812346_OnDinhKhang/admin/api/db_sanpham.php', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            action: "edit_category",
                            tendanhmuc: tendanhmuc,
                            url1: url_1,
                            id: data_id
                        })
                    })
                    .then(Response => Response.json())
                    .then(data => {
                        if (data == 1) {
                            alert('Cập nhật thành công');
                            var home = 'http://127.0.0.1/B1812346_OnDinhKhang/admin/index.php?m=sanpham&a=danhmuc';
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