<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

if(!$_SESSION['token']) {
    die("<script>swal('Lỗi', 'Bạn Cần Đăng Nhập', 'error');setTimeout(function(){location.href='/signin.html';}, 1500);</script>");
}

if(!$_POST['giftcode']) {
    die("<script>swal('Lỗi', 'Bạn Chưa Nhập Mã Giảm Giá!', 'error');</script>");
}

$giftcode = addslashes($_POST['giftcode']);

$time = time();

$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `giftcode` WHERE `giftcode`='".$giftcode."' AND `action`='mua_acc' AND `status`='true' AND `expire` > ".$time));

if(!$row['id']) {
    die("<script>swal('Lỗi', 'Mã Giảm Giá Không Chính Xác Hoặc Đã Được Sử Dụng!', 'error');</script>");
}

echo 'Mã Giảm Giá: <b>'.$giftcode.'</b><br>Giá Trị: <b>'.$row['percent'].'%</b><br>Hạn Dùng: <b>'.date('H:i:s d/m/y' ,$row['expire']).'</b>';
?>