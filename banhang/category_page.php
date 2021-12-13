<?php
require_once('./libs/database.php');
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql_id = 'SELECT * FROM LoaiHangHoa WHERE MaLoaiHang=' . $id;
    $result = db_get_row($sql_id);
    if ($result != 1) {
        $name_category = $result['TenLoaiHang'];
        $img_category = $result['url'];
    }
}
// Lay dc id thi show noi dung cua id do ra thoi
$sql_list = 'SELECT * FROM hanghoa WHERE MaLoaiHang=' . $id;
$list = db_get_list($sql_list);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assests/logo/favicon.ico" type="image/ico">
    <title><?= $name_category ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assests/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
</head>
<?php include_once('./widgets/header.php'); ?>
<div id="page_category">
    <div class="category container" data-aos="fade-down">
        <div class="rounded p-3 p-md-2 m-md-3 text-center bg-light d-flex align-items-center">
            <img src=<?= $img_category ?> alt="" width="25%" height="auto" class="img-fluid">
            <div class="col-md-5 p-lg-5 mx-auto my-5">
                <h1 class="display-3 fw-normal"><?= $name_category ?></h1>
            </div>
        </div>
    </div>
    <div class="container px-4 py-3" id="custom-cards">
        <div class="container px-4 py-3" id="custom-cards">
            <a href="#danh_muc" class="btn link-dark">
                <h2 class="text-center">Sản phẩm</h2>
            </a>
            <p class="pb-2 border-bottom"></p>
            <div id="danh_muc" class="row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-2">
                <!-- close col -->
                <?php
                foreach ($list as $row) {
                    $sql_list_img = 'SELECT url FROM hinhhanghoa WHERE MSHH=' . $row['MSHH'];
                    $url_img = db_get_row($sql_list_img);
                    echo '<div class="col">
                    <div class="card card-cover rounded shadow h-100">
                        <div class="d-flex flex-column h-100 p-1 text-shadow-1">
                            <a href="./single_page.php?id=' . $row['MSHH'] . '" class="btn link-dark h-100">
                                <img src="' . $url_img['url'] . '" alt="" class="img-fluid mb-3" id=url' . $row['MSHH'] . '>
                                <div class="content_item mt-2 ">
                                <p class="name_product mt-3 lh-3" id=ten' . $row['MSHH'] . '>' . $row['TenHH'] . '</p>
                                <h5 class="cost my-2 d-inline" id=gia' . $row['MSHH'] . '>' . number_format($row['Gia'], 0, '.', ',') . '</h5>
                                <span><strong>VND</strong></span>
                                <p class="inventory mb-3" name=' . $row['SoLuongHang'] . '  id=soluonghang' . $row['MSHH'] . '>Còn ' . $row['SoLuongHang'] . ' sản phẩm</p>
                                <p class="intro"></p>
                                </div>
                            </a>
                            <div class="buy_item d-flex w-100 flex-column justify-content-center align-items-center bg-white shadow">
                                <div class="input-group input-group-sm mb-3 w-75">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroup-sizing-sm">
                                            Số lượng:
                                        </span>
                                    </div>
                                    <input type="number" value=1 min="1" max=' . $row['SoLuongHang'] . ' class="form-control" id=soluong' . $row['MSHH'] . ' aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                                </div>
                                <p class="error text-danger p-0 mb-1"></p>
                                <button class="btn btn-success " id=' . $row['MSHH'] . ' onclick="getInfo(this.id)">
                                    <i class="bi bi-basket"></i>
                                    <span>Thêm vào giỏ</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>
<?php include_once('./widgets/footer.php'); ?>