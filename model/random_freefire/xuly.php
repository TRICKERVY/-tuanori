<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

$id = addslashes($_GET['id']);

if(!$_SESSION['token']) {
    die(json_encode(array(
        'title' => 'Lỗi',
        'message' => 'Bạn cần đăng nhập để thực hiện giao dịch!',
        'type' => 'error',
        'reload' => false
    )));

}

$thread = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `id`='".$id."' AND `status`='true'"));

//echo var_dump($thread);

if(!$thread['id']) {
    die(json_encode(array(
        'title' => 'Lỗi',
        'message' => 'Tài khoản này không tồn tại',
        'type' => 'error',
        'reload' => false
    )));

}

$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` WHERE `cname`='".$thread['cname']."'"));
//echo var_dump($row);

if($row['giatien'] > $user['money']) {
    die(json_encode(array(
        'title' => 'Lỗi',
        'message' => 'Bạn không đủ tiền để thực hiện giao dịch',
        'type' => 'error',
        'reload' => false
    )));
}


    	// Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`,`history`, `hisnick`) VALUES ('".$user['username']."', 'Mua Random', 'Mua Acc Random ".$row['name']."', '-".number_format($row['giatien'])."đ', 'Mua Acc #".$id." Loại ".$row['name']."', '".time()."', '".$thread['id']."', '3')");


    	// Update Tiền User
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` - '".$row['giatien']."' WHERE `username` = '".$user["username"]."'");
    	// Update Trạng thái hòm thính
    mysqli_query($kun->connect_db(),"UPDATE `random_freefire_nick` SET `nguoimua` = '".$user['username']."', `status`='false', `time`='".time()."' WHERE `id` = '".$id."'");

    die(json_encode(array(
        'title' => 'Thành Công',
        'message' => 'Mua tài khoản thành công. Đang chuyển hướng đến trang xem tài khoản',
        'type' => 'success',
        'reload' => true
    )));
 
?>
