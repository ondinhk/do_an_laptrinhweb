<div class="container-fluid">
    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column ">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?m=donhang&a=duyetdon">
                                <span data-feather="file"></span>
                                Đơn chưa duyệt
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?m=donhang&a=donhang">
                                <span data-feather="file"></span>
                                Đơn đã duyệt
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?m=sanpham&a=sanpham">
                                <span data-feather="shopping-cart"></span>
                                Quản lí sản phẩm
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?m=sanpham&a=danhmuc">
                                <span data-feather="archive"></span>
                                Danh mục sản phẩm
                            </a>
                        </li>
                    </ul>
                    <h6 class="sidebar-heading d-flex border-top justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php?m=khachhang&a=khachhang">
                                <span data-feather="users"></span>
                                Danh sách khách hàng
                            </a>
                        </li>
                        <li class="nav-item" id='tag_nhanvien'>
                            <a class="nav-link" href="./index.php?m=nhanvien&a=nhanvien">
                                <span data-feather="bar-chart-2"></span>
                                Quản lí nhân sự
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <script>
                    isAdmin();

                    function isAdmin() {
                        let tag = document.getElementById('tag_nhanvien');
                        let flag = sessionStorage.admin;
                        if (flag == 0) {
                            tag.classList.add('d-none');
                        }
                    }
                </script>