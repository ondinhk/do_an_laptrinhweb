<?php
$sql = 'SELECT * FROM loaihanghoa';
$resul = db_get_list($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./assests/logo/favicon.ico" type="image/ico">
    <title>Fashion Store</title>
    <!-- Boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- Css -->
    <link rel="stylesheet" href="./assests/css/style.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <!-- Icon Boostrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- Jquery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Font GG -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yuji+Mai&display=swap" rel="stylesheet">
</head>

<body>
    <header class="site-header sticky-top">
        <div class="container-fluid p-0 d-flex justify-content-between bg-dark btn-outline-light">
            <div class="logo w-25 my-color-header rounded">
                <a href="./index.php" class="d-flex d-inline-block justify-content-center align-items-center btn p-0">
                    <!-- <img src=" ./assests/img/logo/logo_600x600.png" alt="" width="50px" height="auto" class=""> -->
                    <h3 class="text-light mx-2 text-logo">Fashion Store</h3>
                </a>
            </div>
            <div class="d-flex flex-wrap align-items-center justify-content-center ">
                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 mobile" id="navbarToggleExternalContent">
                    <li><a href="./index.php" class="nav-link px-3 rounded  btn-outline-secondary link-light upcase">Trang chủ</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle px-3 link-light rounded btn-outline-secondary upcase" href="#" id="dropdown01" data-bs-toggle="dropdown" aria-expanded="True">Sản phẩm</a>
                        <ul class="dropdown-menu" aria-labelledby="dropdown01">
                            <?php
                            foreach ($resul as $row) {
                                echo '<li><a class="dropdown-item upcase" href="./category_page.php?id=' . $row['MaLoaiHang'] . '">' . $row['TenLoaiHang'] . '</a></li>';
                            }
                            ?>
                        </ul>
                    </li>
                    <li><a href="#" class="nav-link px-3 link-light rounded btn-outline-secondary upcase" data-bs-toggle="modal" data-bs-target="#modalAbout">About !</a></li>
                    <div class="mx-3 d-flex justify-content-center align-items-center position-relative" id='info_user'>
                        <!-- Button Login vs Cart JS render -->
                    </div>
                </ul>
                <button class="navbar-toggler btn-mobile" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="bi bi-toggles btn-my-color"></i>
                </button>
            </div>
    </header>
    <!-- Button trigger modal -->
    <!-- Modal giỏ hàng -->
    <div class="modal fade" id="modalStore" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLabel">Giỏ hàng:</h3>
                    <div>
                        <!-- <button type="button" class="btn btn-success" onclick="update_cart()">Cập nhật giỏ hàng</button> -->
                        <button type="button" class="btn btn-primary " data-bs-dismiss="modal" onclick="update_cart()">Tiếp tục mua hàng</button>
                    </div>
                </div>
                <div class="modal-body">
                    <table class="table text-center table-bordered align-middle table-hover">
                        <thead>
                            <tr class="table-dark">
                                <th scope="col">#ID</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên sản phầm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Còn lại</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="tbody_cart" id='cart_body'>
                            <!-- Js render content  -->
                        </tbody>
                    </table>
                    <div class="row my-3" id='info_user_cart'>
                        <!-- Js render info -->
                    </div>
                </div>
                <button type="button" class="btn btn-success mx-5 mb-3" id='btn_thanhtoan' onclick="thanhToan()">Thanh Toán</button>
                <div class="modal-footer">
                    <!-- Footer cart -->
                </div>
            </div>

        </div>
    </div>
    <!-- Modal login-->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" id="modal_content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đăng nhập</h5>
                </div>
                <div class="modal-body">
                    <div class="container" id="form" autocomplete="off">
                        <div class="mb-3" autocomplete="off">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" autofocus autocomplete="off">
                            <div id="error_user" class="form-text text-danger"></div>
                        </div>
                        <div class="mb-3" autocomplete="off">
                            <label for="pass" class="form-label">Password</label>
                            <input type="password" class="form-control" id="pass" required autocomplete="off">
                            <div id="error_pass" class="form-text text-danger"></div>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="login()">Đăng nhập</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <p>Nếu bạn chưa có tài khoản</p>
                    <button type="button" class="btn btn-outline-success" onclick="dangky()">Đăng ký</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal don hang -->
    <div class="modal fade" id="modalDonHang" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Đơn hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id='modal_donhang_body'>
                    <table class="table  align-middle table-hover table-bordered">
                        <thead>
                            <tr class="table-secondary align-items-center">
                                <th scope="col">Mã đơn</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Trạng thái</th>
                                <!-- <th scope="col">Giá</th> -->
                            </tr>
                        </thead>
                        <tbody id='tbody_chitiet'>
                            <!-- Js render data -->

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modalAbout" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Abouts:</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id='modal_donhang_body'>
                    <p class="mb-0">Họ Tên</p>
                    <h3 class="mb-3">Ôn Đình Khang</h3>
                    <p class=" mb-0">MSSV: </p>
                    <h3 class="mb-3">B1812346</h3>
                    <p class="mb-0">Email: </p>
                    <h3 class="mb-3">Khangb1812346</h3>
                    <p class="mb-0">Giảng viên hướng dẫn: </p>
                    <h3 class="mb-3">Nguyễn Minh Trung</h3>
                </div>
            </div>
        </div>
    </div>