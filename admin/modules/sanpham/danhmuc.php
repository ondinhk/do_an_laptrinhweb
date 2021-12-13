<?php
if (!defined('protect')) {
    die('Not found');
}
$title = "Quản lí danh mục";
include_once('./modules/widgets/header.php');
include_once('./modules/widgets/navbar.php');
?>
<div>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <h1>Quản lí danh mục</h1>

            <div>
                <button class="btn btn-outline-success" id="new_list">Lấy danh sách</button>
                <!-- Button trigger modal -->
                <button type="button" id='themsanpham' class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Thêm danh mục
                </button>
            </div>
        </div>
        <h4 class="py-2">Hiện tại có: <span id="title"></span> danh mục</h4>
        <div>
            <table class="table text-center  align-middle table-hover table-bordered">
                <thead>
                    <tr class="table-secondary align-items-center">
                        <th scope="col">STT</th>
                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody id='tbody'>
                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-8">
                                <label for="inputEmail4" class="form-label justify-content-center align-items-center">Tên danh mục:</label>
                                <input type="text" class="form-control" id="tendanhmuc">
                            </div>
                            <div>
                                <label for="inputZip" class="form-label">Url hình ảnh: (ảnh minh họa sẽ thay đổi khi nhập đúng url)</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control my-1" placeholder="url 1" id="url_input_1">
                                </div>
                                <div class=" col-md-3 d-flex">
                                    <img onerror="this.alt='check again url';this.src='./assets/logo/logo_600x600.png'" src="./assets/logo/logo_600x600.png" id="img_add_1" alt="" width="250px" height="250px" class="img-fluid img-thumbnail p-1 m-2" style="object-fit: contain;">
                                </div>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary" onclick="checkSubmit()">Thêm danh mục</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // Hien thi danh muc
        {
            var container = document.getElementById('tbody');
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
                            action: "get_category"
                        })
                    })
                    .then(Response => Response.json())
                    .then(data => render_list(data))
            }

            function render_list(data) {
                var i = 0;
                data = data.reverse();
                var result = data.map(function(item) {
                    i++;
                    return `
                                <tr>
                                    <th scope="row">${i}</th>
                                    <td class="position-relative"><img src="${item.url}" alt="" class="img-fluid" width="100px" height="50px"
                                    style="object-fit: contain;"></img></td>
                                    <th>${item.TenLoaiHang}</th>
                                    <td class="col-2">
                                        <div>
                                        <button id="${item.MaLoaiHang}" name="${item.TenLoaiHang}" onclick="xoaDanhMuc(this.id)" class="btn btn-outline-danger">Xóa</button>
                                        <button name="${item.TenLoaiHang}" onclick="window.location='modules/sanpham/edit_category.php?id=${item.MaLoaiHang}'" class="btn btn-outline-info">Sửa</button>
                                        </div>
                                    </td>
                                </tr>
                                `
                })
                container.innerHTML = result.join('');
                title.innerHTML = data.length;
            }
        }
        // Them danh muc
        {
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

            function checkSubmit() {
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
                                action: "add_category",
                                tendanhmuc: tendanhmuc,
                                url1: url_1
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
        // Xoa danh muc
        {
            function xoaDanhMuc(id) {
                var name = document.getElementById(id).name;
                console.log(id);
                var option = confirm("Bạn có muốn xóa danh mục " + name);
                if (!option)
                    return;
                var delete_product = fetch('/B1812346_OnDinhKhang/admin/api/db_sanpham.php', {
                        method: 'POST',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            action: "delete_category",
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
</div>
</div>