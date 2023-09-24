<?php

require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';

$xss = new Xss_Anti;

$kun = new System;

$user = $kun->user();

$_get_settings = $kun->settings('napthe');





 
switch ($_GET['action']) {
    case 'kimcuong':

if (!$_SESSION['token']) {

   die(json_encode(array(
		'title' => 'Lỗi',
		'message' => 'Bạn chưa đăng nhập?',
		'type' => 'error',
		'reload' => false
	   )));

}
if (!$_POST['idgame']) {

   die(json_encode(array(
		'title' => 'Lỗi',
		'message' => 'Bạn cần nhập ID Game',
		'type' => 'error',
		'reload' => false
	   )));
   }
      $goi_kc =  array('1'=> '90', '2'=> '230','3'=> '465', '4'=> '950', '5'=> '2375');
      $account = mysqli_real_escape_string($kun->connect_db(), $xss->xss_clean($_POST['idgame']));
      $select = intval($xss->xss_clean($_POST['type']));
      $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_vat_pham` WHERE `type` = 'kc' AND`idgame`='".$account."' AND `status` = '2'"));
      $amount = $goi_kc[$select];
      if ($select < 1 && $select > 5) {
         die(json_encode(array(
            'title' => 'Lỗi',
            'message' => 'Bạn muốn rút gói nào thế?',
            'type' => 'error',
            'reload' => false
            )));
       }
    if(!isset($amount)) {
      die(json_encode(array(
         'title' => 'Lỗi',
         'message' => 'Bạn muốn rút gói nào thế?',
         'type' => 'error',
         'reload' => false
         )));
       }
    if (!$kun->check_int($amount)) {
      die(json_encode(array(
         'title' => 'Lỗi',
         'message' => 'Bạn muốn rút gói nào thế?',
         'type' => 'error',
         'reload' => false
         )));
       }
        if (!$kun->check_int_positive($amount)) {
         die(json_encode(array(
            'title' => 'Lỗi',
            'message' => 'Bạn muốn rút gói nào thế?',
            'type' => 'error',
            'reload' => false
            )));
       }
        if ($amount > $user['kimcuong']) {
         die(json_encode(array(
            'title' => 'Lỗi',
            'message' => 'Bạn không đủ kim cương để rút gói này',
            'type' => 'error',
            'reload' => false
            )));
       }
       if ($check > 5) {
         die(json_encode(array(
            'title' => 'Lỗi',
            'message' => 'Bạn đang hiện có hơn 5 đơn rút đang chờ xử lý. Vui lòng chờ Admin xử lý các đơn trước rồi hãy rút nhé!',
            'type' => 'error',
            'reload' => false
            )));
    
         }

    // update kimcuong user
  mysqli_query($kun->connect_db(), "UPDATE `users` SET `kimcuong` = `kimcuong` - '".$amount."' WHERE `username` = '".$user['username']."' ");
   // update vào lịch sử rút vật phẩm
  mysqli_query($kun->connect_db(), "INSERT INTO `rut_vat_pham` SET 
  `username` = '".$user['username']."',
  `type` = 'kc',
  `select` = '".$select."',
  `idgame` = '".$account."',
  `vp` = '".$amount."',
  `status` = '1',
  `time` = '".time()."'");



        // Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Rút Kim Cương', 'Rút Kim Cương Free Fire', '-".number_format($amount)." KC', 'Rút ".number_format($amount)." Kim Cương vào ID ".$account."', '".time()."')");
    
    die(json_encode(array(
      'title' => 'Thành Công',
      'message' => 'Rút kim cương thành công! (Đã Trừ '.$amount.' Kim Cương Tại Hệ Thống!)',
      'type' => 'success',
      'reload' => true
      )));
    




break;

    case 'quanhuy':

  if (!$_SESSION['token']) {

   die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn chưa đăng nhập?')));

}
 if (!$_POST['select']) {

           die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn muốn rút gói nào thế?')));
 }
if (!$_POST['user']) {

           die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn cần nhập tài khoản đăng nhập Garena!')));
 }
 if (!$_POST['pass']) {

           die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn cần nhập mật khẩu tài khoản Garena!')));
 }
      $goi_qh =  array('1'=> '84', '2'=> '168','3'=> '340', '4'=> '856');
      $account = mysqli_real_escape_string($kun->connect_db(), $xss->xss_clean($_POST['user']));
      $pass = strip_tags(mysqli_real_escape_string($kun->connect_db(), $xss->xss_clean($_POST['pass'])));
      $select = intval($xss->xss_clean($_POST['select']));
      $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_vat_pham` WHERE `type` = 'qh' AND `user`='".$account."' AND `pass`='".$pass."'  AND `status` = '2'"));
      $amount = $goi_qh[$select];
      if ($select < 1 && $select > 4) {
    die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn muốn rút gói nào thế?')));
       }
    if(!isset($amount)) {
    die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn muốn rút gói nào thế?')));
       }
    if (!$kun->check_int($amount)) {
    die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn muốn rút gói nào thế?')));
       }
        if (!$kun->check_int_positive($amount)) {
    die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn muốn rút gói nào thế?')));
       }
        if ($amount > $user['quanhuy']) {
    die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn không đủ quân huy để thực hiện giao dịch này!')));
       }
       if ($check > 5) {
    die(json_encode(array('status'=> 'error', 'msg'=> 'Bạn đang hiện có hơn 5 đơn rút đang chờ xử lý. Vui lòng chờ Admin xử lý các đơn trước rồi hãy rút nhé!')));
       }


    // update kimcuong user
  mysqli_query($kun->connect_db(), "UPDATE `users` SET `quanhuy` = `quanhuy` - '".$amount."' WHERE `username` = '".$user['username']."' ");
   // update vào lịch sử rút vật phẩm
  mysqli_query($kun->connect_db(), "INSERT INTO `rut_vat_pham` SET 
  `username` = '".$user['username']."',
  `type` = 'qh',
  `select` = '".$select."',
  `user` = '".$account."',
  `pass` = '".$pass."',
  `vp` = '".$amount."',
  `status` = '1',
  `time` = '".time()."'");



        // Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Rút Quân Huy', 'Rút Quân Huy Liên Quân', '-".number_format($amount)." QH', 'Rút ".number_format($amount)." Quân Huy về TK ".$account."', '".time()."')");
    

    die(json_encode(array('status'=> 'success', 'msg'=> 'Rút quân huy thành công, xin chờ Admin duyệt! (Đã Trừ '.$amount.' Quân Huy Tại Hệ Thống!)')));


    break;
    
    
    default:
       die(json_encode(array('status'=> 'error', 'msg'=> 'Lỗi hệ thống. Lệnh không hợp lệ!')));
        break;
}

?>