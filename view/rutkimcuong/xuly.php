<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user(); // gọi giá trị user đang login


      require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';

      $xss = new Xss_Anti;

      $idgame = mysqli_real_escape_string($kun->connect_db(), $xss->xss_clean($_POST['idgame']));
      $kimcuong = intval($xss->xss_clean($_POST['type']));
      $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `idgame`='".$idgame."' AND `status` = '2'"));
      $nguoirut = $user['username'];

  if(empty($idgame) || empty($kimcuong)) {
     die(json_encode(array('error' => 1, 'message' => 'Vui lòng nhập đầy đủ thông tin!')));
  }else if($user['kimcuong'] < 90){
    die(json_encode(array('error' => 1, 'message' => 'Bạn không đủ kim cương để rút!')));
  }else if($kimcuong >= $user['kimcuong']){
     die(json_encode(array('error' => 1, 'message' => 'Kim cương bạn cần rút không được lớn hơn kim cương hiện tại!')));

   
  } else {




    // update kimcuong user
  mysqli_query($kun->connect_db(), "UPDATE `users` SET `kimcuong` = `kimcuong` - '".$kimcuong."' WHERE `username` = '".$user['username']."' ");
   // update vào lịch sử rút
  mysqli_query($kun->connect_db(), "INSERT INTO `rut_kim_cuong` SET 
  `username` = '".$user['username']."',
  `idgame` = '".$idgame."',
  `kimcuong` = '".$kimcuong."',
  `noidung` = 'HUY PLAY',
  `status` = '2',
  `time` = '".time()."'");

        // Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Rút Kim Cương Freefire', 'Rút Kim Cương Freefire', '-".number_format($kimcuong)." kc', 'Rút ".number_format($kimcuong)." kim cương vào ID ".$idgame."', '".time()."')");


     die(json_encode(array('error' => 1, 'message' => 'Rút kim cương thành công. Đã trừ "'.$kimcuong.'" kim cương trên tài khoản!')));
}


    



  ?>