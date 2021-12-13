<?php
if (!defined('protect')) {
    die('Not found');
}
$title = "Quản lí đơn đã duyệt";
include_once('./modules/widgets/header.php');
include_once('./modules/widgets/navbar.php');
?>
<div class=' row mt-3'>
    <div class="col">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <h4 class="py-2">Có <span id="title_daduyet">15</span> đơn đang chờ giao</h4>
            <button class="btn btn-outline-success" onclick=" {location.reload()}" id="new_list">Làm mới danh sách</button>
        </div>
        <div>
            <p class="fst-italic">Click <strong> Giao</strong> để xác nhận đơn đã giao</p>
            <table class="table text-center  align-middle table-hover table-bordered">
                <thead>
                    <tr class="table-secondary align-items-center">
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Tên Khách</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th>Xác nhận</th>
                    </tr>
                </thead>
                <tbody id='tbody_daduyet'>
                    <!-- Js render data -->
                </tbody>
            </table>

        </div>
    </div>
    <div class="col">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <h4 class="py-2">Có <span id="title_dagiao"></span> đã giao thành công</h4>
        </div>
        <div>
            <p class="fst-italic d-hidden">Danh sách đơn đã giao thành công</p>
            <table class="table text-center  align-middle table-hover table-bordered">
                <thead>
                    <tr class="table-secondary align-items-center">
                        <th scope="col">Mã đơn</th>
                        <th scope="col">Tên Khách</th>
                        <th scope="col">Ngày giao hàng</th>
                        <th scope="col">Trạng thái</th>
                    </tr>
                </thead>
                <tbody id='tbody_dagiao'>
                    <!-- Js render data -->
                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
    get_list_daduyet();
    get_list_dagiao();

    function get_list_daduyet() {
        let list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_donhang.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "get_donhang_daduyet"
                })
            })
            .then(Response => Response.json())
            .then(data => render_list_daduyet(data))
    }

    function render_list_daduyet(data) {
        data = data.reverse();
        let tbody_daduyet = document.getElementById('tbody_daduyet');
        let title_daduyet = document.getElementById('title_daduyet');
        let result = data.map(function(item) {
            return `<tr>
                    <th>#${item.SoDonDH}</th>
                    <td><strong>${item.TenKH} </strong></td>
                    <td>${item.NgayDH}</td>
                    <td class="text-primary">${item.TrangThaiDH}</td>
                    <td><button class="btn btn-outline-success" id=${item.SoDonDH} onclick="daGiao(id)" data-bs-toggle="modal" data-bs-target="#modalChiTiet">Giao</button></td>
                </tr>`;
        })
        tbody_daduyet.innerHTML = result.join('');
        title_daduyet.innerHTML = data.length;
    }

    function get_list_dagiao() {
        let list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_donhang.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "get_donhang_dagiao"
                })
            })
            .then(Response => Response.json())
            .then(data => render_list_dagiao(data))
    }

    function render_list_dagiao(data) {
        console.log(data);
        let tbody_dagiao = document.getElementById('tbody_dagiao');
        let title_dagiao = document.getElementById('title_dagiao');
        let result = data.map(function(item) {
            return `<tr>
                    <th>#${item.SoDonDH}</th>
                    <td><strong>${item.TenKH} </strong></td>
                    <td>${item.NgayGH}</td>
                    <td class="text-success   bg-light ">${item.TrangThaiDH}</td>
                </tr>`;
        })
        tbody_dagiao.innerHTML = result.join('');
        title_dagiao.innerHTML = data.length;
    }

    function daGiao(id) {
        let list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_donhang.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "dagiao",
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
<!-- "Đã xác nhận" -->