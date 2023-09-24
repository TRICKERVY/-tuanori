<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user(); // gọi giá trị user đang login



switch ($_POST['type']) {
	case 'info':

$n = $_POST['name'];
$e = $_POST['email'];
$s = $_POST['sex'];
$a = $_POST['avatar'];


if(!$n || !$e || !$s || !$a) {
	die('<script>toastr["error"]("Hãy điền đầy đủ thông tin! ", "Lỗi")</script>');
}


$syntax = array('<' , '>' , '"' , "'" , '$'  , ',' , '*' , '!' , '(' , ')' , ';' , '?' , '#');


foreach ($syntax as $key) {

	if($kun->tim_chuoi($n,$key) == true) {
	die('<script>toastr["error"]("Tên của bạn không được có kí tự lạ! ", "Lỗi")</script>');
	}

	if($kun->tim_chuoi($e,$key) == true) {
	die('<script>toastr["error"]("Email không hợp lệ! ", "Lỗi")</script>');
	}	
	if($kun->tim_chuoi($a,$key) == true) {
	die('<script>toastr["error"]("Ảnh đại diện của bạn không được có kí tự lạ! ", "Lỗi")</script>');
	}

	if($kun->tim_chuoi($s,$key) == true) {
	die('<script>toastr["error"]("Bạn không thể Bug đâu :)! ", "Lỗi")</script>');
	}

}



if(strlen($n) > 30) {
	die('<script>toastr["error"]("Tên của bạn không được quá 30 kí tự! ", "Lỗi")</script>');
}

if(strlen($n) < 6) {
	die('<script>toastr["error"]("Tên của bạn không được nhỏ hơn 6 kí tự! ", "Lỗi")</script>');
}




if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    die('<script>toastr["error"]("Email không đúng định dạng!", "Lỗi")</script>');
  }


    $result = mysqli_query($kun->connect_db(), "SELECT `email` FROM `users` WHERE `email`='".$e."' ");
	$rowcount = mysqli_num_rows($result);
if($rowcount > 0) {
    die('<script>toastr["error"]("Email này đã tồn tại trên hệ thống!", "Lỗi")</script>');
}


$arr_sex = array('male', 'female');
if(in_array($s, $arr_sex) == false) {
	die('<script>toastr["error"]("System Error!", "Lỗi")</script>');
}






    $res = mysqli_query($kun->connect_db(), "UPDATE users SET name = '".$n."', email = '".$e."', sex = '".$s."', avatar = '".$a."' WHERE `token`='".$_SESSION['token']."'");


    	die('<script>toastr["success"]("Chỉnh sửa tài khoản thành công! ", "Thông báo!")</script>');



	break;

	case 'pass':
    if($_POST['old_password'] && $_POST['password'] && $_POST['repassword']) {

        $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT `password` FROM `users` WHERE `password`='".md5($_POST['old_password'])."' AND `username`='".$user['username']."' "));
        if($check < 1) {
            die(json_encode(array('status' => 'error','msg' => 'Mật khẩu cũ của bạn không đúng')));
        }else {
            if(strlen($_POST['password']) > 6) {
                if($_POST['password'] != $_POST['repassword']) {
                   die(json_encode(array('status' => 'error','msg' => 'Xác nhận mật khẩu mới không khớp!')));
                }else {
                    mysqli_query($kun->connect_db(), "UPDATE `users` SET `password`='".md5($_POST['password'])."' WHERE `username`='".$user['username']."'");
                    die(json_encode(array('status' => 'success','msg' => 'Đổi mật khẩu thành công!')));   
                }
            }else {
               die(json_encode(array('status' => 'error','msg' => 'Mật khẩu mới phải có ít nhất 6 ký tự!')));
            }

        }


    }else {
       die(json_encode(array('status' => 'error','msg' => 'Vui lòng nhập đầy đủ thông tin!')));
    }

		break;
	
	
	default:
		echo 'Lỗi hệ thống vui lòng thử lại sau!';
		break;
}

?>






