<?php
if (!defined('protect')) {
    die('Not found');
}
$title = "Quản lí đơn chưa duyệt";
include_once('./modules/widgets/header.php');
include_once('./modules/widgets/navbar.php');
?>
<div class='container row mt-3'>
    <div class="col">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <h4 class="py-2">Hiện tại có: <span id="title">15</span> đơn đang chờ duyệt</h4>
            <button class="btn btn-outline-success" onclick="get_list()" id="new_list">Làm mới danh sách</button>
        </div>
        <div>
            <table class="table text-center  align-middle table-hover table-bordered">
                <thead>
                    <tr class="table-secondary align-items-center">
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Tên Khách</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id='tbody'>
                    <!-- Js render data -->
                </tbody>
            </table>

        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="modalChiTiet" tabindex="-1" aria-labelledby="modalChiTietLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalChiTietLabel">Chi tiết đơn hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="body_modal">
                <table class="table  align-middle table-hover table-bordered">
                    <thead>
                        <tr class="table-secondary align-items-center">
                            <th scope="col">Mã hàng</th>
                            <th scope="col">Tên Hàng</th>
                            <th scope="col">Số lượng</th>
                            <th scope="col">Giá</th>
                        </tr>
                    </thead>
                    <tbody id='tbody_chitiet'>
                        <!-- Js render data -->

                    </tbody>
                </table>
                <div id='info'>
                    <!-- Js render info -->
                </div>
            </div>
            <div class="modal-footer" id='btn_duyet'>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
<script>
    var body = document.getElementById('tbody');
    // Lay danh sach
    get_list();

    function get_list() {
        var list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_donhang.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "get_donhang"
                })
            })
            .then(Response => Response.json())
            .then(data => render_list(data))
    }

    function render_list(data) {
        data = data.reverse();
        let result = data.map(function(item) {
            return `<tr>
                        <th>#${item.SoDonDH}</th>
                        <td><strong>${item.TenKH} </strong></td>
                        <td>${item.NgayDH}</td>
                        <td class="text-info">${item.TrangThaiDH}</td>
                        <td><button class="btn btn-success" id=${item.SoDonDH} onclick="chiTiet(id)" data-bs-toggle="modal" data-bs-target="#modalChiTiet">Chi tiết</button></td>
                    </tr>`;
        })
        body.innerHTML = result.join('');
        title.innerHTML = data.length;
    }

    function chiTiet(id) {
        let body_modal = document.getElementById('body_modal');
        let list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_donhang.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "get_chitiet_donhang",
                    sodonhang: id
                })
            })
            .then(Response => Response.json())
            .then(data => {
                renderChiTiet(data);
                info(id);
            })
        let btn_duyet = document.getElementById('btn_duyet');
        let btn = `  <button type="button" class="btn btn-success" name="${id}" onclick="duyetDon(this.name)">Duyệt đơn</button>`
        btn_duyet.innerHTML = btn;
    }

    function info(id) {
        let list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_donhang.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "get_info",
                    sodonhang: id
                })
            })
            .then(Response => Response.json())
            .then(data => renderInfo(data))
    }

    function renderInfo(data) {
        let info = document.getElementById('info');
        let result = data.map(function(item) {
            return `<h3 class="text-danger text-center">Tổng đơn hàng: ${Intl.NumberFormat().format(sum)} VNĐ</h3>
                    <h3>Thông tin khách hàng</h3>
                    <p>Tên: <strong>${item['Ten']}</strong> </p>
                    <p>SĐT: <strong>${item['SDT']}</strong> </p>
                    <p>Địa Chỉ: <strong>${item['DiaChi']}</strong></p>
                    <p>Email: <strong>${item['Email']}</strong></p>
                    `;
        })
        info.innerHTML = result.join('');
    }
    var sum = 0;

    function renderChiTiet(data) {
        let tbody_chitiet = document.getElementById('tbody_chitiet');
        let result = data.map(function(item) {
            let gia = parseInt(item['Gia']) * parseInt(item['SoLuong']);
            sum += gia;
            return `<tr>
                            <th>#${item['MSHH']}</th>
                            <td><strong>${item['TenHH']} </strong></td>
                            <td>${item['SoLuong']}</td>
                            <td class="text-danger">${item['Gia']}</td>
                        </tr>`;
        })
        tbody_chitiet.innerHTML = result.join('');

    }

    function duyetDon(id) {
        console.log(id);
        let list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_donhang.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "duyetdon",
                    sodonhang: id
                })
            })
            .then(Response => Response.json())
            .then(data => {
                alert(data);
                location.reload();
            })
    }
</script>