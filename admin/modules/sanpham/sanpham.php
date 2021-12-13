<?php
if (!defined('protect')) {
    die('Not found');
}
$title = "Quản lí sản phẩm";
include_once('./modules/widgets/header.php');
include_once('./modules/widgets/navbar.php');
?>

<div>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <h1>Quản lí sản phẩm</h1>

            <div>
                <button class="btn btn-outline-success" id="new_list">Lấy danh sách</button>
                <!-- Button trigger modal -->
                <button type="button" id='themsanpham' class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Thêm sản phẩm
                </button>
            </div>
        </div>
        <h4 class="py-2">Hiện tại có: <span id="title"></span> sản phẩm</h4>
        <div>
            <table class="table text-center  align-middle table-hover">
                <thead>
                    <tr class="table-secondary align-items-center">
                        <th scope="col">STT</th>
                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">Tên Sản Phẩm</th>
                        <th scope="col">Loại hàng</th>
                        <th scope="col">Giá</th>
                        <th scope="col">Số lượng tồn</th>
                        <th scope="col">Ngày thêm</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id='tbody'>
                    <!-- Js render data -->
                </tbody>
            </table>
        </div>
        <!-- Modal Thêm sản phẩm -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Thêm sản phẩm</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label for="inputEmail4" class="form-label justify-content-center align-items-center">Tên sản phẩm:</label>
                                <input type="text" class="form-control" id="tensanpham">
                            </div>
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <label for="inputState" class="form-label">Loại sản phẩm:</label>
                                <select id="loaisanpham" class="form-select">
                                </select>
                            </div>
                            <div class="col-md-8"></div>
                            <div class="col-md-3">
                                <label for="inputCity" class="form-label">Giá:</label>
                                <input type="number" class="form-control" id="gia">
                            </div>
                            <div class="col-md-3">
                                <label for="inputZip" class="form-label">Số lượng nhập:</label>
                                <input type="number" class="form-control" id="soluong">
                            </div>
                            <div>
                                <label for="inputZip" class="form-label">Url hình ảnh: (ảnh minh họa sẽ thay đổi khi nhập đúng url)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control my-1" placeholder="url 1" id="url_input_1">
                                    <input type="text" class="form-control my-1" placeholder="url 2" id="url_input_2">
                                    <input type="text" class="form-control my-1" placeholder="url 3" id="url_input_3">
                                </div>
                                <div class=" col-md-3 d-flex">
                                    <img onerror="this.alt='check again url';this.src='./assets/logo/logo_600x600.png'" src="./assets/logo/logo_600x600.png" id="img_add_1" alt="" width="250px" height="250px" class="img-fluid img-thumbnail p-1 m-2" style="object-fit: contain;">
                                    <img onerror="this.alt='check again url';this.src='./assets/logo/logo_600x600.png'" src="./assets/logo/logo_600x600.png" id="img_add_2" alt="" width="250px" height="250px" class="img-fluid img-thumbnail p-1 m-2" style="object-fit: contain;">
                                    <img onerror="this.alt='check again url';this.src='./assets/logo/logo_600x600.png'" src="./assets/logo/logo_600x600.png" id="img_add_3" alt="" width="250px" height="250px" class="img-fluid img-thumbnail p-1 m-2" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label fw-bold">Mô
                                    tả sản phẩm:</label>
                                <textarea class="form-control" id='thongtin' name="content" rows="3">
                        </textarea>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" onclick="checkSubmit()">Thêm sản phẩm</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    // Lay danh sach san pham va hien thi
    {
        // url '/B1812346_OnDinhKhang/admin/api/db_sanpham.php'
        // Danh sach san pham
        var new_list = document.getElementById('new_list');
        var container = document.getElementById('tbody');
        var title = document.getElementById('title');
        // Click lay danh sach
        get_list();
        new_list.addEventListener("click", get_list)
        // Lay danh sach
        async function get_list() {
            var list_product = await fetch('/B1812346_OnDinhKhang/admin/api/db_sanpham.php', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: "get_list"
                    })
                })
                .then(Response => Response.json())
                .then(data => render_list(data))
        }
        // hien thi san pham ra bảng
        function render_list(data) {
            var i = 0;
            data = data.reverse();
            var result = data.map(function(item) {
                i++;
                return `
                                <tr>
                                    <th scope="row">${i}</th>
                                    <td class="position-relative"><img src="${item[0].url}" alt="" class="img-fluid" width="100px" height="50px"
                                    style="object-fit: contain;"></img></td>
                                    <td class="text-start px-3">${item.TenHH}</td>
                                    <td>${item[2].TenLoaiHang}</td>
                                    <td>${item[1]} VND</td>
                                    <td>${item.SoLuongHang}</td>
                                    <td>${item.adddate}</td>
                                    <td class="col-2">
                                        <div>
                                        <button id="${item.MSHH}" name="${item.TenHH}" onclick="xoaSanPham(this.id)" class="btn btn-outline-danger">Xóa</button>
                                        <button name="${item.MSHH}" onclick="window.location='modules/sanpham/edit_sanpham.php?id=${item.MSHH}'" class="btn btn-outline-info">Sửa</button>
                                        </div>
                                    </td>
                                </tr>
                                `
            })
            container.innerHTML = result.join('');
            title.innerHTML = data.length;
        }

    }
    // xu li hien thi option category
    {

        var themsanpham = document.getElementById('themsanpham');
        var loaisanpham = document.getElementById('loaisanpham');
        themsanpham.addEventListener("click", function() {
            var list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_sanpham.php', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: "get_category"
                    })
                })
                .then(Response => Response.json())
                .then(data => render_option(data))
        })

        function render_option(data) {
            var result = data.map(function(item) {
                return `
            <option  value="${item.MaLoaiHang}">${item.TenLoaiHang}</option>
            `
            })
            loaisanpham.innerHTML = result;
        }
    }
    // xu li them san pham
    {
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

                var add_product = fetch('/B1812346_OnDinhKhang/admin/api/db_sanpham.php', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            action: "add_product",
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
                        alert(data);
                        location.reload();
                    })
            }
        }
    }
    // Xoa san pham
    {
        function xoaSanPham(id) {
            var name = document.getElementById(id).name;
            var option = confirm("Bạn có muốn xóa " + name);
            if (!option)
                return;
            var delete_product = fetch('/B1812346_OnDinhKhang/admin/api/db_sanpham.php', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: "delete_product",
                        id: id,
                    })
                })
                .then(Response => Response.json())
                .then(data => {
                    alert(data);
                    location.reload();
                })
        }
    }
</script>
<?php
include_once('./modules/widgets/footer.php');
?>