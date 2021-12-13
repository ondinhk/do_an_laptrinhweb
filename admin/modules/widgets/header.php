<?php
if (!isset($title)) {
    $title = "Trang chủ";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- icon title -->
    <link rel="icon" href="./assets/logo/favicon.ico" type="image/ico">
    <title><?= $title ?></title>
    <!-- Css -->
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">
    <!-- Js bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- css -->
    <link href="./assets/css/dashboard.css" rel="stylesheet">
    <link href="./assets/css/style.css" rel="stylesheet">
    <!-- Js -->
    <script src="./assets/js/app.js" type="text/javascript" async></script>
</head>

<body>
    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap shadow p-0">
        <a class="navbar-brand col-md-3 col-lg-2 me-0 px-1 py-2 d-flex align-items-center" style="background-color: #23333f;" href="./index.php">
            <img src="./assets/logo/logo_600x600.png" width="40px" height="auto" alt="">
            <h4 class="m-0">Phone Store</h4>
        </a>
        <div class="d-flex flex-wrap align-items-center justify-content-center ">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0 ">
                <div class="mx-3 d-flex justify-content-center align-items-center" id='name_user'>

                </div>
            </ul>
        </div>
    </header>
    <script>
        var name_user = document.getElementById('name_user');
        if (sessionStorage != null) {
            var name = sessionStorage.username;
            var button = `
                <h5 class="text-light mb-0 p-1 me-3">Tài khoản: ${name}</h5>
                <button type="button" class="btn btn-my-color" id='logout' onclick="logout()">Đăng xuất</button>
                `;
            name_user.innerHTML = button;
        }

        function logout() {
            var url_login = "index.php?m=common&a=login";
            var logout = document.getElementById('logout');
            clearSession();
            window.location = url_login;
        }
    </script>