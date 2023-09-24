<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
require $_SERVER['DOCUMENT_ROOT'].'/lib/GoogleAuth/GGAuth.php';
$huy = new HuyPlay();
$kun = new System;


switch ($_GET['action']) {
	case 'login':
		$kun->check_login();

$u = addslashes($_POST['username']);
$p = addslashes($_POST['password']);

if(!$u) {
 die(json_encode(array(
		 'title' => 'Thông báo',
		 'message' => 'Vui lòng nhập username',
		 'type' => 'error',
		 'reload' => false
		)));
}
if(!$p) {
	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Vui lòng nhập mật khẩu',
		'type' => 'error',
		'reload' => false
	   )));
}
if($kun->check_user($u,$p) == true) {

$token = $kun->Creat_Token(30);

 
    $res = mysqli_query($kun->connect_db(), "UPDATE users SET token = '".$token."', ip = '".$_SERVER['REMOTE_ADDR']."' WHERE `username`='".$u."'");

    $_SESSION['token'] = $token;

	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Đăng nhập thành công',
		'type' => 'success',
		'reload' => true
	   )));
	
}else {
	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Đăng nhập thất bại',
		'type' => 'error',
		'reload' => false
	   )));
}




break;

case 'register':
$kun->check_login();



$u = $_POST['username'];
$p = $_POST['password'];
$rp = $_POST['repassword'];


if(!$u) {
die(json_encode(array(
	'title' => 'Thông báo',
	'message' => 'Vui lòng nhập username',
	'type' => 'error',
	'reload' => false
   )));
}if(!$p) {
die(json_encode(array(
	'title' => 'Thông báo',
	'message' => 'Vui lòng nhập mật khẩu',
	'type' => 'error',
	'reload' => false
   )));
}
if(!$rp) {
die(json_encode(array(
	'title' => 'Thông báo',
	'message' => 'Vui lòng nhập lại mật khẩu',
	'type' => 'error',
	'reload' => false
   )));
}
$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , ':' , '?' , '+' , '=', '/', '-' , '.' ,'^');


foreach ($syntax as $key) {
	
	if($kun->tim_chuoi($u,$key) == true) {
		die(json_encode(array(
			'title' => 'Thông báo',
			'message' => 'Tên tài khoản không được có ký tự lạ',
			'type' => 'error',
			'reload' => false
		   )));
	}

	if($kun->tim_chuoi($p,$key) == true) {
		die(json_encode(array(
			'title' => 'Thông báo',
			'message' => 'Mật khẩu không được có lý tự lạ',
			'type' => 'error',
			'reload' => false
		   )));
}
}
	

if(strlen($u) > 30) {
	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Tên tài khoản không được quá 30 ký tự',
		'type' => 'error',
		'reload' => false
	   )));
}

if(strlen($p) < 6) {
	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Mật khẩu không được nhỏ hơn 6 ký tự',
		'type' => 'error',
		'reload' => false
	   )));
}
if(strlen($p) > 50) {
	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Mật khẩu không được có hơn 50 ký tự',
		'type' => 'error',
		'reload' => false
	   )));
}

if($rp !== $p) {
	
	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Nhập lại mật khẩu không khớp',
		'type' => 'error',
		'reload' => false
	   )));

}
if($u == $p) {
	
	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Mật khẩu không được trùng với tài khoản',
		'type' => 'error',
		'reload' => false
	   )));

}


$u = $kun->rewrite($u);


if($kun->check_user_register($u) == false) {

$token = $kun->Creat_Token(30);
$auth =  $kun->Creat_Token(30);

$time = time();
  
  
$verify_code = rand(10000, 99999);
 
 $cmd = "INSERT INTO users (fbid, level, username, money,kimcuong,quanhuy, password, token, auth, ip, verify_code, verify,gg2fa ,time) VALUES ('0', 0, '".$u."',0,0,0, '".md5($p)."', '".$token."','".$auth."', '".$_SERVER['REMOTE_ADDR']."', '".$verify_code."', 'true','".$huy->createSecret()."', '".$time."')";

    $res = mysqli_query($kun->connect_db(), $cmd);

    $_SESSION['token'] = $token;


	
	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Đăng ký tài khoản thành công',
		'type' => 'success',
		'reload' => true
	   )));
}else {

	die(json_encode(array(
		'title' => 'Thông báo',
		'message' => 'Tên tài khoản đã có người khác sử dụng',
		'type' => 'error',
		'reload' => false
	   )));


}

		break;
		

	
	case 'get-money':
		if($_SESSION['token']) {
			$user = $kun->user();
			die(json_encode(array('status'=>true, 'code'=> 200, 'money'=> number_format($user['money']), 'msg'=>'success')));
		}else {
			die(json_encode(array('status'=>false, 'code'=> 500, 'money'=> '', 'msg'=>'disconnect to server!')));
		}

		break;
	
	
	default:
		echo '<script>toastr["error"]("Lỗi hệ thống! Vui lòng thử lại sau!", "Thông Báo")</script>';
		break;
}

?>
