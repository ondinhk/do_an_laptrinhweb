<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha512-NhSC1YmyruXifcj/KFRWoC561YpHpc5Jtzgvbuzx5VozKpWvQ+4nXhPdFgmx8xqexRcpAglTj9sIBWINXa8x5w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="container">
        <div class="frame">
            <div class="content">
                <div class="frame_logo">
                    <span class="logo">Quản lí hệ thống</span>
                </div>
                <div class="frame_input">
                    <input type="text" class="input user" id='user' placeholder="Tên đăng nhập" required>
                    <div class="error" id='error_user'></div>
                    <input type="password" class="input password" id='pass' placeholder="Mật khẩu" required>
                    <div class="error" id='error_pass'></div>
                </div>
                <div class="frame_button">
                    <button id='send' class="btn-sign_in">Sign In</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        if (sessionStorage.username != null) {
            var home = 'index.php?m=donhang&a=duyetdon';
            console.log(sessionStorage.username)
            window.location = home;
        }
        var e_user_name = document.getElementById('user');
        var e_pass = document.getElementById('pass');
        var send = document.getElementById('send');
        var error_user = document.getElementById('error_user');
        var error_pass = document.getElementById('error_pass');
        send.addEventListener("click", send_data)

        function send_data() {
            let user = e_user_name.value;
            let pass = e_pass.value;
            var send = fetch('/B1812346_OnDinhKhang/admin/api/db_user.php', {
                    method: 'POST',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({
                        user: user,
                        pass: pass
                    })
                })
                .then(Response => Response.json())
                .then(data => check(data))
        }

        function check(data) {
            console.log(data)
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
                var home = 'index.php?m=donhang&a=duyetdon';
                alert("Đăng nhập thành công");
                sessionStorage.setItem('username', data[1]);
                sessionStorage.setItem('admin', data[2]);
                sessionStorage.setItem('msnv', data[3]);
                window.location = home;
            }
        }
        e_pass.addEventListener("keyup", function(event) {
            // Number 13 is the "Enter" key on the keyboard
            if (event.keyCode === 13) {
                event.preventDefault();
                send_data();
            }
        });
    </script>
</body>

</html>