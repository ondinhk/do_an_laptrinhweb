// Login
{
    var e_username = document.querySelector('#username');
    var e_pass = document.querySelector('#pass');
    var error_user = document.getElementById('error_user');
    var error_pass = document.getElementById('error_pass');
    var username = '';
    var pass = '';
    e_pass.addEventListener("keyup", function (event) {
        // Number 13 is the "Enter" key on the keyboard
        if (event.keyCode === 13) {
            event.preventDefault();
            login();
        }
    });
    e_username.onchange = function () {
        username = this.value;
    }
    e_pass.onchange = function () {
        pass = this.value;
    }

    function login() {
        // console.log(username + " " + pass);
        var send = fetch('API/db_user.php', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                user: username,
                pass: pass,
                action: 'login'
            })
        })
            .then(Response => Response.json())
            .then(data => check(data))
            .catch(err => console.log(err))
    }

    function check(data) {
        if (data[0] === "not_user") {
            error_user.innerHTML = "*Tài khoản không tồn tại"
        } else {
            error_user.innerHTML = "";
        }
        if (data[0] === "not_pass") {
            error_pass.innerHTML = "*Mật khẩu không đúng";
        } else {
            error_pass.innerHTML = "";
        }
        //them ad or user sao do set js session
        if (data[0] === "true") {
            alert("Đăng nhập thành công");
            sessionStorage.setItem('username', data[1]);
            sessionStorage.setItem('MSKH', data[2]);
            location.reload();
        }
    }

}
// hien thi login - info
{
    function isLogin() {
        var login_info = document.querySelector('#info_user');
        if (sessionStorage.username == null) {
            var btn = ` <button type="button" class="btn btn-my-color" data-bs-toggle="modal" data-bs-target="#loginModal">
                        Đăng nhập
                    </button>`;
            login_info.innerHTML = btn;
        } else {
            var name = sessionStorage.username;
            var btn = `<button type="button" class="btn btn-outline-light me-2" data-bs-toggle="modal" data-bs-target="#modalStore" onclick="showCard()">
            <span class="rounded px-2 btn-my-color" id="num_cart">0</span> <i class="bi bi-basket"></i>
            Giỏ hàng
        </button>
        <div class="alert alert-success position-absolute top-100 start-0 d-none fade show" id='alert_add' role="alert">
            Thêm sản phẩm thành công !!!
        </div>
        <div id="info_login">
            <li class="nav-item dropdown">
                <a class="btn me-2 dropdown-toggle btn-my-color" href="#" id="dropdown2" data-bs-toggle="dropdown" aria-expanded="True">${name}</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown2">
                    <li><a href="#" class="nav-link px-3 link-dark rounded btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalDonHang" onclick="donHang()">Đơn
                            hàng</a>
                    </li>
                    <li><a href="#" class="nav-link px-3 link-dark rounded btn-outline-secondary" onclick="logout()">Đăng
                            xuất</a>
                    </li>
                </ul>
            </li>
        </div>`;
            login_info.innerHTML = btn;
        }
    }

    function logout() {
        sessionStorage.clear();
        location.reload();
    }
    isLogin();

}
$('#loginModal').on('hidden.bs.modal', function () {
    dangnhap();
});
// form dang nhap
function dangnhap() {
    let container_dk = document.querySelector('#modal_content')
    let content = `<div class="modal-header">
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
        </div>`;
    container_dk.innerHTML = content;
}
// dang ky
var flag = false;
var hoten_vl = '';
var sdt_vl = '';
var email_vl = '';
var username_vl = '';
var pass_vl = '';
// form dang ky
function dangky() {
    let container_dk = document.querySelector('#modal_content')
    let content = `
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Đăng ký</h5>
        </div>
        <div class="modal-body">
            <div class="container" autocomplete="off">
                <div class="mb-3">
                    <label for="hoten" class="form-label">Họ Tên:</label>
                    <input type="text" class="form-control" id="hoten" required>
                </div>
                <div class="mb-3">
                    <label for="sdt" class="form-label">Số điện thoại:</label>
                    <input type="text" pattern="[0-9]{11}" class="form-control" id='sdt' required>
                    <div id="error_phone" class="form-text text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" required>
                    <div id="error_email" class="form-text text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id='username' value="..." required>
                    <div id="error_username" class="form-text text-danger"></div>
                </div>
                <div class="mb-3">
                    <label for="pass" class="form-label">Password:</label>
                    <input type="password" class="form-control" value="." id="pass" minlength="5" required>
                    <div id="error_username" class="form-text text-danger"></div>
                </div>
                <button type="submit" class="btn btn-primary my-3" onclick='register()'>Đăng Ký</button>
            </div>
        </div>`;
    container_dk.innerHTML = content;
    var e_hoten = document.querySelector('#hoten');
    var e_sdt = document.querySelector('#sdt');
    var e_email = document.querySelector('#email');
    var e_username = document.querySelector('#username');
    var e_pass = document.querySelector('#pass');

    e_hoten.onchange = function () {
        hoten_vl = this.value;
        flag = true;
    }
    e_sdt.onchange = function () {
        var err_phone = document.querySelector("#error_phone")
        if (phonenumber(this.value)) {
            err_phone.innerHTML = "";
            sdt_vl = this.value;
            flag = true;
        } else {
            flag = false;
            err_phone.innerHTML = "Số điện thoại bạn nhập không đúng định dạng";
        }
    }
    e_email.onchange = function () {
        var err_email = document.querySelector("#error_email")
        if (ValidateEmail(this.value)) {
            err_email.innerHTML = "";
            email_vl = this.value;
            flag = true;
        } else {
            flag = false;
            err_email.innerHTML = "Sai định dạng email";
        }
    }
    e_username.onchange = function () {
        username_vl = this.value;
        var error_username = document.querySelector('#error_username');
        var send = fetch('API/db_user.php', {
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
                }
            })
            .catch(err => console.log(err))

    }
    e_pass.onchange = function () {
        pass_vl = this.value;
        flag = true;
    }
}


function register() {
    if (flag == true) {
        console.log(username_vl);
        const a = fetch('API/db_user.php', {
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({
                action: 'dangky',
                hoten: hoten_vl,
                sdt: sdt_vl,
                email: email_vl,
                username: username_vl,
                pass: pass_vl
            })
        })
            .then(Response => Response.json())
            .then(data => {
                if (data == 'true') {
                    alert("Đăng ký thành công");
                    dangnhap();
                } else {
                    alert("Đăng ký thất bại")
                }
            })
    } else {
        alert("Bạn chưa điền thông tin");
    }
}

function ValidateEmail(uemail) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (uemail.match(mailformat)) {
        return true;
    } else {
        return false;
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
function donHang() {
    let mskh = sessionStorage.MSKH;
    get_list(mskh);
}
function get_list(mskh) {
    var list_product = fetch('API/db_donhang.php', {
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({
            action: "get_donhang",
            mskh: mskh
        })
    })
        .then(Response => Response.json())
        .then(data => render_list(data))
}

function render_list(data) {
    let tbody_chitiet = document.getElementById('tbody_chitiet');
    data = data.reverse();
    let result = data.map(function (item) {
        return `<tr>
                        <th>#${item.SoDonDH}</th>
                        <td>${item.NgayDH}</td>
                        <td class="text-info">${item.TrangThaiDH}</td>
                    </tr>`;
    })
    tbody_chitiet.innerHTML = result.join('');
}