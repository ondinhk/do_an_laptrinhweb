<?php
if (!defined('protect')) {
    die('Not found');
}
$title = "Quản lí nhân viên";
include_once('./modules/widgets/header.php');
include_once('./modules/widgets/navbar.php');
?>
<div>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <h1>Quản lí nhân sự</h1>

            <div>
                <button class="btn btn-outline-success" onclick="get_list()" id="new_list">Lấy danh sách</button>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Thêm nhân viên
                </button>

                <!-- Modal Thêm nhân viên -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Nhập thông tin nhân viên</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div>
                                    <div class="mb-3">
                                        <label class="form-label">Tên nhân viên</label>
                                        <input type="text" class="form-control" id="tennhanvien" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Chức vụ</label>
                                        <input type="text" class="form-control" id="chucvu" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Địa chỉ</label>
                                        <input type="text" class="form-control" id="diachi" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" required>
                                        <div id="error_username" class="form-text text-danger"></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" class="form-control" id="pass" required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Quyền quản trị:</label>
                                        <select class="form-select" aria-label="Default select example" id='admin'>
                                            <option value="0">Không có quyền quản trị</option>
                                            <option value="1">Có quyền quản trị</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="sdt" class="form-label">Số điện thoại:</label>
                                        <input type="text" pattern="[0-9]{11}" class="form-control" id='sdt' required>
                                        <div id="error_phone" class="form-text text-danger"></div>
                                    </div>
                                    <button type="button" onclick="themNhanVien()" class="btn btn-primary" id="btn_add">Thêm nhân viên</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h4 class="py-2">Hiện tại có: <span id="title"></span> nhân sự</h4>
        <div>
            <table class="table text-center  align-middle table-hover table-bordered">
                <thead>
                    <tr class="table-secondary align-items-center">
                        <th scope="col">MSNV</th>
                        <th scope="col">Tên nhân viên</th>
                        <th scope="col">Chức vụ</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col"></th>

                    </tr>
                </thead>
                <tbody id='tbody'>
                    <!-- Js render data -->
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
<script>
    var container = document.getElementById('tbody');
    get_list();
    // Lay danh sach
    async function get_list() {
        var list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_nhanvien.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "get_nhanvien"
                })
            })
            .then(Response => Response.json())
            .then(data => render_list(data))
    }


    function render_list(data) {
        data = data.reverse();
        console.log(data);
        var result = data.map(function(item) {
            return `<tr>
                        <th scope="row">#${item.msnv}</th>
                        <td><strong>${item.HoTenNV}</strong></td>
                        <td>${item.ChucVu}</td>
                        <td>${item.DiaChi}</td>
                        <td>${item.SoDienThoai}</td>
                        <td class="col-2">
                            <div>
                                <button id="${item.msnv}" onclick="xoaNhanVien(this.id)" class="btn btn-outline-danger">Xóa</button>
                            </div>
                        </td>
                    </tr>`;
        })
        container.innerHTML = result.join('');
        title.innerHTML = data.length;
    }
    var flag = false;

    function themNhanVien() {
        let ten = document.getElementById('tennhanvien').value;
        let chucvu = document.getElementById('chucvu').value;
        let diachi = document.getElementById('diachi').value;
        let sdt = document.getElementById('sdt').value;
        let username = document.getElementById('username').value;
        let pass = document.getElementById('pass').value;
        let admin = document.getElementById('admin').value;
        if (flag) {
            let list = fetch('/B1812346_OnDinhKhang/admin/api/db_nhanvien.php', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        action: "add_nhanvien",
                        ten: ten,
                        chucvu: chucvu,
                        diachi: diachi,
                        sdt: sdt,
                        username: username,
                        pass: pass,
                        admin: admin
                    })
                })
                .then(Response => Response.json())
                .then(data => {
                    alert(data);
                    location.reload();
                })
                .catch(err => console.log(err));
        }
    }

    function xoaNhanVien(id) {
        var list = fetch('/B1812346_OnDinhKhang/admin/api/db_nhanvien.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "xoa_nhanvien",
                    id: id
                })
            })
            .then(Response => Response.json())
            .then(data => {
                alert(data);
                location.reload();
            })
            .catch(err => console.log(err));
    }
    var e_sdt = document.querySelector('#sdt');
    e_sdt.onchange = function() {
        var err_phone = document.querySelector("#error_phone")
        if (phonenumber(this.value)) {
            err_phone.innerHTML = "";
            sdt_vl = this.value;
            flag = true;
        } else {
            flag = false;
            err_phone.innerHTML = "Tối thiểu 11 số";
        }
    }

    function phonenumber(inputtxt) {
        var phoneno = /^\d{11}$/;
        if ((inputtxt.match(phoneno))) {
            return true;
        } else {
            return false;
        }
    }
    var e_username = document.querySelector('#username');
    e_username.onchange = function() {
        username_vl = this.value;
        var error_username = document.querySelector('#error_username');
        var send = fetch('API/db_nhanvien.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    user: username_vl,
                    action: 'get_username'
                })
            })
            .then(Response => Response.json())
            .then(data => {
                if (data.length == 0) {
                    error_username.innerHTML = "Tên tài khoản được phép sử dụng"
                    error_username.classList.remove("text-danger")
                    error_username.classList.add("text-success")
                    flag = true;
                } else {
                    flag = false;
                    error_username.innerHTML = "Tên tài khoản đã tồn tại"
                    error_username.classList.add("text-danger")
                    error_username.classList.remove("text-success")
                }
            })
            .catch(err => console.log(err))

    }
</script>