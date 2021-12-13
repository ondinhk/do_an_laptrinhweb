<?php
$conn;
function db_connect()
{
    global $conn;
    if (!$conn) {
        $conn = mysqli_connect('localhost', 'root', '', 'quanlydathang') or die('Not connect database');
        mysqli_set_charset($conn, 'UTF-8');
    }
}
function db_close()
{
    global $conn;
    if ($conn) {
        mysqli_close($conn);
    }
}
// SELECT * FROM hanghoa
function db_get_list($sql)
{
    db_connect();
    global $conn;
    $data = array();
    $resul = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($resul)) {
        $data[] = $row;
    }
    return $data;
}
// SELECT * FROM hanghoa WHERE MSHH="1"
function db_get_row($sql)
{
    db_connect();
    global $conn;
    $resul = mysqli_query($conn, $sql);
    $row = array();
    if (mysqli_num_rows($resul) > 0) {
        $row = mysqli_fetch_assoc($resul);
    }
    return $row;
}
// them sua xoa
function db_execute($sql)
{
    db_connect();
    global $conn;
    return mysqli_query($conn, $sql);
}
