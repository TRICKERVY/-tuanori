<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();


$giftcode = addslashes($_POST['voucher']);
//die(json_encode(array('status' => 'error', 'msg' => 'Mã GiftCode không chính xác hoặc đã được sử dụng!')));
if(!$_SESSION['token']) {

     die(json_encode(array('status' => 'error', 'msg' => 'Bạn cần đăng nhập!')));
}

if(!$giftcode) {
    die(json_encode(array('status' => 'error', 'msg' => 'Bạn chưa nhập mã giftcode!')));
}
if(!$_POST['id']) {
    die(json_encode(array('status' => 'error', 'msg' => 'Bạn mua account nào vậy?')));
}
$acc = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `id`='".$_POST['id']."' AND `status`='1'"));
if(!$acc) {
	 die(json_encode(array('status' => 'error', 'msg' => 'Bạn mua account nào vậy?')));
}


$time = time(); 

$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `giftcode` WHERE `giftcode`='".$giftcode."' AND `action`='mua_acc' AND `status`='true' AND `expire` > ".$time));

if(!$row['id']) {
   die(json_encode(array('status' => 'error', 'msg' => 'Mã GiftCode không chính xác hoặc đã được sử dụng!')));
}
 $sale = 100 - $row['percent'];
 $giatien = $acc['giatien']*$sale/100;
 $giam = $acc['giatien']*$row['percent']/100;
 die(json_encode(array('status' => 'success', 'realCash' => number_format($giatien), 'msg' =>'Mã Giảm Giá: <b>'.$giftcode.'</b><br>Giá Trị: <b>'.$row['percent'].'%</b> => Giảm '.number_format($giam).' VNĐ<br>Hạn Dùng: <b>'.date('H:i:s d/m/y' ,$row['expire']).'</b>')));

?>