<?php
// Định nghĩa một hằng số bảo vệ project
define('protect', true);

// Lấy module và action trên URL
$module = isset($_GET['m']) ? $_GET['m'] : '';
$action = isset($_GET['a']) ? $_GET['a'] : '';
if (empty($module) || empty($action)) {
    $module = 'common';
    $action = 'login';
}
$path = 'modules/' . $module . '/' . $action . '.php';
if (file_exists($path)) {
    include_once('./libs/database.php');
    include_once($path);
} else {
    // Trường hợp URL không tồn tại thì thông báo lỗi
    include_once('./modules/common/404.php');
}
