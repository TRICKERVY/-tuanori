<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
require $_SERVER['DOCUMENT_ROOT'].'/lib/GoogleAuth/GGAuth.php';
$huy = new HuyPlay();
$kun = new System;
$user = $kun->user();
);  
if(!$_SESSION['token']) {
   die(json_encode(array('status' => 'error', 'message' => 'Bạn Chưa Đăng Nhập!')));
}

 if(isset($_POST['very_2fa'])) {
$code= $_POST['code'];
 if(!isset($_POST['code'])) {
     die(json_encode(array('status' => 'error', 'message' => 'Vui lòng nhập mã xác thực!')));
 }
 if(!$user['gg2fa']) {
     die(json_encode(array('status' => 'error', 'message' => 'Lỗi hệ thống. Vui lòng báo HuyPlay ngay!')));
 
 }
   if($huy->verifyKey($ma,$code) == true) {
     $huy = mysqli_query($kun->connect_db(), "UPDATE `users` SET `status_2fa`='GGAuth' WHERE `username`='".$user['username']."'");
if(!$huy) {
      die(json_encode(array('status' => 'error', 'message' => 'Lỗi hệ thống. Vui lòng báo HuyPlay ngay!')));
}
    die(json_encode(array('status' => 'success', 'message' => 'Xác thực thành công!')));

   }else{
    die(json_encode(array('status' => 'erron', 'message' => 'Mã xác thực không đúng!')));
   }


 }



                       
     