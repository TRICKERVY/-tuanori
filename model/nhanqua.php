<?php
 // Define Chống vào thẳng file
define("KUNKEYPR", true); // gán defined chống khách vào thẳng file

 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user(); // gọi giá trị user đang login
if(!$user['username']) {
	die(json_encode(array(
		'status' => false, 
		'code' => 3,
		'msg' => 'Bạn chưa đăng nhập!'
	)));
}
if($user['username']) {
	$sql = mysqli_query($kun->connect_db(), "SELECT * FROM `gift_user` WHERE `username`='".$user['username']."'");
	if(mysqli_num_rows($sql) > 0) { // > 0 là đã tồn tại bản ghi trong database
		die(json_encode(array(
			'status' => false, 
			'code' => 2,
			'msg' => 'Bạn đã nhận quà mất rồi!'
		)));
	}else {
		// thêm vào dâtbase
		$rand = rand(10, 15);// muốn chúng nó nhận trong khoảng bao nhiểu kc ?tầm 10kc đến bao nheeiur?15
		// chenf vao databse
		mysqli_query($kun->connect_db(), "INSERT INTO `gift_user` (`username`, `kc`, `time`) VALUES ('".$user['username']."', '".$rand."', '".time()."')");
		// cộng kim cương cho user
    	mysqli_query($kun->connect_db(),"UPDATE `users` SET `kimcuong` = `kimcuong` + '".$rand."' WHERE `username` = '".$user["username"]."'");
		die(json_encode(array(
			'status' => true, 
			'code' => 1,
			'msg' => 'Mùa Hè Này Bạn Nhận Được '.$rand.' Kim Cương!'
		)));
	}
}
