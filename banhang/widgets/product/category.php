<div class="features">
    <div class="container px-4 py-3" id="custom-cards">
        <h2>Danh mục sản phẩm</h2>
        <p class="pb-2 border-bottom"></p>
        <div class=" row row-cols-1 row-cols-lg-4 align-items-stretch g-4 py-2">
            <?php
            $sql = 'SELECT * FROM loaihanghoa LIMIT 4';
            $resul = db_get_list($sql);
            foreach ($resul as $row) {
                echo '<div class="col">
                <div class="card card-cover h-100 overflow-hidden rounded shadow">
                    <div class="d-flex flex-column h-100 p-0 text-shadow-1">
                        <a href="./category_page.php?id=' . $row['MaLoaiHang'] . '" class="btn link-dark">
                            <img src="' . $row['url'] . '" alt="" class="img-fluid mb-3">
                            <h5 class="mt-3 lh-1 text-center">' . $row['TenLoaiHang'] . '</h5>
                        </a>
                    </div>
                </div>
            </div>';
            }
            ?>
        </div>
    </div>
    <!-- Close Thuong hieu -->
</div>