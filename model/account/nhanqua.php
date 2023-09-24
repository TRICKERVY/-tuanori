<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';

$kun = new System;
$user = $kun->user();


if(!$_SESSION['token']) {
   die(json_encode(array('status' => false, 'msg' => 'Bạn Chưa Đăng Nhập!')));
}

$kimcuong = rand(1,50);
// {"typeMoney":"vatpham","slugGroup":"","status":"chuacong","moneyAdd":10}
if($user['nhanqua'] == 0){
die(json_encode(array('typeMoney' => 'vatpham', 'slugGroup' => '', 'status' => 'chuacong', 'moneyAdd' => $kimcuong, 'msg' => 'Bạn đã trúng '.$kimcuong.' kim cương!')));
}else{
    
}