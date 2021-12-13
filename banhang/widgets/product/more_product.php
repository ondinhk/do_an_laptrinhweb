<?php
require_once('./libs/database.php');
// Lay dc id thi show noi dung cua id do ra thoi
$sql_list = 'SELECT * FROM hanghoa LIMIT 4';
$list = db_get_list($sql_list);
?>
<h2 class="mt-5">Sản phẩm khác</h2>
<div class="container pb-5">
    <div class="container px-4">
        <p class="pb-2 border-bottom"></p>
        <div class=" row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-2">
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