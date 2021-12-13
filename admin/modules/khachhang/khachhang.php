<?php
if (!defined('protect')) {
    die('Not found');
}
$title = "Danh sách khách hàng";
include_once('./modules/widgets/header.php');
include_once('./modules/widgets/navbar.php');
?>
<div>
    <div class="container mt-3">
        <div class="d-flex justify-content-between align-items-center border-bottom">
            <h1>Danh sách khách hàng</h1>

            <div>
                <button class="btn btn-outline-success" onclick="get_list()" id="new_list">Lấy danh sách</button>
                <!-- Button trigger modal -->
            </div>
        </div>
        <h4 class="py-2">Hiện tại có: <span id="title"></span> khách hàng</h4>
        <div>
            <table class="table  align-middle table-hover table-bordered">
                <thead>
                    <tr class="table-secondary align-items-center">
                        <th scope="col">MSKH</th>
                        <th scope="col">Họ Tên</th>
                        <th scope="col">Số điện thoại</th>
                        <th scope="col">Email</th>
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
        var list_product = fetch('/B1812346_OnDinhKhang/admin/api/db_khachhang.php', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    action: "get_khachhang"
                })
            })
            .then(Response => Response.json())
            .then(data => render_list(data))
    }


    function render_list(data) {
        data = data.reverse();
        // console.log(data);
        var result = data.map(function(item) {
            return `<tr>
                        <th scope="row">#${item.MSKH}</th>
                        <td><strong>${item.HoTen}</strong></td>
                        <td>${item.SoDienThoai  }</td>
                        <td>${item.Email}</td>
                    </tr>`;
        })
        container.innerHTML = result.join('');
        title.innerHTML = data.length;
    }
</script>