<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

$time = time();
$id = $_POST['id'];
$giftcode = addslashes($_POST['voucher']);

if(!$_SESSION['token']) {
    die(json_encode(array('status' => 'error', 'msg' => 'Bạn chưa đăng nhập!')));
}


$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `id`='".$id."' AND `status`='true'"));


if(!$row['id']) {
   die(json_encode(array('status' => 'error', 'msg' => 'Tài khoản không tồn tại hoặc đã được mua!')));
}



$gift = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `giftcode` WHERE `giftcode`='".$giftcode."' AND `action`='mua_acc' AND `status`='true' AND `expire` > '".$time."'"));
if($gift['id']) {
   $sale = 100 - $gift['percent'];
   $giatien =   $row['giatien']*$sale/100;
    $mota = 'Áp dụng mã GiftCode:'.$giftcode.' cho Tk #'.$row['id'].' giảm '.$row['giatien']-$giatien.'';
}else{
    $giatien =   $row['giatien'];
    $mota = 'Mua Nick FreeFire #'.$row['id'].'';
}


if($giatien > $user['money']) {
     die(json_encode(array('status' => 'error', 'msg' => 'Bạn không đủ tiền để thực hiện giao dịch này!')));
}

        // Update GiftCode
    mysqli_query($kun->connect_db(),"UPDATE `giftcode` SET `username` = '".$user['username']."', `status` = 'false' WHERE `giftcode` = '".$giftcode."'");
    	// Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`,`history`, `hisnick`) VALUES ('".$user['username']."', 'Mua Account', 'Mua Nick FreeFire #".$row['id']."', '-".number_format($giatien)."đ', 'Mua Nick FreeFire #".$row['id']."', '".time()."', '".$row['id']."','1')");
    	// Update Tiền User
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` - '".$giatien."' WHERE `username` = '".$user["username"]."'");
    	// Update Trạng thái account
    mysqli_query($kun->connect_db(),"UPDATE `nickff` SET `nguoimua` = '".$user['username']."', `status`='false' WHERE `id` = '".$id."'");
     die(json_encode(array('status' => 'success', 'msg' => 'Mua Nick Freefire #'.$row['id'].' Thành Công! Vui Lòng Kiểm Tra Lại Thông Tin Nick Trong Phần Tài Khoản Đã Mua!')));

 
?>
