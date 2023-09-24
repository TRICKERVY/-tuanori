<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

$id = $_POST['csrf'];
$type = $_POST['type'];
$amount = substr($_POST['amount'], 1);

$vongquay = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong` WHERE `id`='".$id."'"));
if(!$vongquay) die(json_encode(array('status' => false,'item' => '','location' => '', 'msg' => 'Lỗi hệ thống!')));

switch ($type) {
	case 'play':
// xử lí rút gọn giá //
$giatien = substr($vongquay['giatien'], 0, -3); // giá tiền gốc rút gọn 3 số 0
if($amount == 1){
$gia = $giatien;
} else if($amount == 3){
$gia = round($giatien*3, -1);
} else if($amount == 7){
$gia = round($giatien*7, -1);
} else if($amount == 10){
$gia = $giatien*10-10;
} else {
 $gia = $giatien*$amount;
}
$price = $gia*1000;//giá thật
if(!$_SESSION['token']){
die(json_encode(array('status' => 3,'msg' => 'Vui lòng đăng nhập để chơi!')));
}else if($user['money'] < $price){
die(json_encode(array('status' => 4,'msg' => 'Vui lòng nạp thêm tiền để chơi!')));
}else{

	require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Element.php';
	require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Randomizer.php';

	    for ($i = 0; $i < $amount; $i++) {
	  $randomizer = new Randomizer();
  
	  $randomizer          ->add( new Element('1', $kun->vongquaykimcuong_gift($id, 1, 'tyle'))) 
	                       ->add( new Element('2', $kun->vongquaykimcuong_gift($id, 2, 'tyle'))) 
	                       ->add( new Element('3', $kun->vongquaykimcuong_gift($id, 3, 'tyle')))
	                       ->add( new Element('4', $kun->vongquaykimcuong_gift($id, 4, 'tyle'))) 
	                       ->add( new Element('5', $kun->vongquaykimcuong_gift($id, 5, 'tyle')))
	                       ->add( new Element('6', $kun->vongquaykimcuong_gift($id, 6, 'tyle'))) 
	                       ->add( new Element('7', $kun->vongquaykimcuong_gift($id, 7, 'tyle'))) 
	                       ->add( new Element('8', $kun->vongquaykimcuong_gift($id, 8, 'tyle'))) 
	                          ;
      	$huyplay = $randomizer->get();       
 	
		switch ($huyplay) {
		    case '1':
		    $location = 360;
		        break;
		    case '2':
		    $location = 320;        
		        break;
		    case '3':
		    $location = 270;        
		        break;
		    case '4':
		    $location = 230;        
		        break;
		    case '5':
		    $location = 180;       
		        break;
		    case '6':
		    $location = 130;        
		        break;
		    case '7':
		    $location = 85;        
		        break;
		    case '8':
		    $location = 44;        
		        break;
		    default:
		    $location = "";   
		        break;
		}

	$status = 1; // true

    $msg = $kun->vongquaykimcuong_gift($id, $huyplay, 'text');
    if($vongquay['type'] == 'kc'){
    	//UPDATE Kimcuong vào acc
    	 mysqli_query($kun->connect_db(),"UPDATE `users` SET `kimcuong` = `kimcuong` + '".$kun->vongquaykimcuong_gift($id, $huyplay, 'kimcuong')."' WHERE `username` = '".$user["username"]."'");
    	 $action = 'FreeFire';
    	 $his = '5';
    	 $vp = 'KC';
    	 $vp_r = 'Kim Cương';
    }else{

    	//UPDATE Kimcuong vào acc
    	 mysqli_query($kun->connect_db(),"UPDATE `users` SET `quanhuy` = `quanhuy` + '".$kun->vongquaykimcuong_gift($id, $huyplay, 'kimcuong')."' WHERE `username` = '".$user["username"]."'");
    	 $action = 'Liên Quân';
    	 $his = '6';
          $vp = 'QH';
          $vp_r = 'Quân Huy';
    }
   
    	// Update Lần sử dụng vòng quay
    mysqli_query($kun->connect_db(), "UPDATE `vongquay_kimcuong` SET `sudung` = `sudung` + 1 WHERE `id` = '".$id."'");
    	// Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`, `history`, `hisnick`) VALUES ('".$user['username']."', 'Vòng Quay ".$action."', '".$vongquay['name']."', '-".number_format($vongquay['giatien'])."đ', 'Nhận được ".$kun->vongquaykimcuong_gift($id, $huyplay, 'kimcuong')." ".$vp_r."', '".time()."', '', '".$his."')");
    

$hp[$i] = array('status' => 1, 'item' => $huyplay,'location' => $location,'msg' => $msg);
$total = $kun->vongquaykimcuong_gift($id, $huyplay, 'kimcuong');
$totalfull += $total;
}
	// Update Tiền User
    mysqli_query($kun->connect_db(),"UPDATE `users` SET `money` = `money` - '$price' WHERE `username` = '".$user["username"]."'"); 

$huy = array('status' => 1, 'amount' => $amount,'location' => $location,'msg' => $msg,'total' => $totalfull.' '.$vp.'','type' => 'Thật', 'price'=> $gia);

echo json_encode($huy+$hp);


}
break;

	case 'test':
	    
	   
	require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Element.php';
	require $_SERVER['DOCUMENT_ROOT'].'/lib/BiasedRandom/Randomizer.php';

$n = $amount;
for ($i = 0; $i < $n; $i++) {
  

	  $randomizer = new Randomizer();
  
	  $randomizer          ->add( new Element('1', $kun->vongquaykimcuong_gift($id, 1, 'tyle'))) 
	                       ->add( new Element('2', $kun->vongquaykimcuong_gift($id, 2, 'tyle'))) 
	                       ->add( new Element('3', $kun->vongquaykimcuong_gift($id, 3, 'tyle')))
	                       ->add( new Element('4', $kun->vongquaykimcuong_gift($id, 4, 'tyle'))) 
	                       ->add( new Element('5', $kun->vongquaykimcuong_gift($id, 5, 'tyle')))
	                       ->add( new Element('6', $kun->vongquaykimcuong_gift($id, 6, 'tyle'))) 
	                       ->add( new Element('7', $kun->vongquaykimcuong_gift($id, 7, 'tyle'))) 
	                       ->add( new Element('8', $kun->vongquaykimcuong_gift($id, 8, 'tyle'))) 
	                          ;
      	$kundeptrai = $randomizer->get();       
 	
		switch ($kundeptrai) {
		    case '1':
		    $location = 360;
		        break;
		    case '2':
		    $location = 320;        
		        break;
		    case '3':
		    $location = 270;        
		        break;
		    case '4':
		    $location = 230;        
		        break;
		    case '5':
		    $location = 180;       
		        break;
		    case '6':
		    $location = 130;        
		        break;
		    case '7':
		    $location = 85;        
		        break;
		    case '8':
		    $location = 44;        
		        break;
		    default:
		    $location = "";   
		        break;
		}

	$status = 1; // true

    $msg = $kun->vongquaykimcuong_gift($id, $kundeptrai, 'text');
    	// Play Try Don't Update Service!
 if($vongquay['type'] == 'kc'){
    	
    	 $vp = 'KC';
    }else{
    	
          $vp = 'QH';
    }
$hp[$i] = array('status' => 1, 'item' => $kundeptrai,'location' => $location,'msg' => $msg);
$total = $kun->vongquaykimcuong_gift($id, $kundeptrai, 'kimcuong');
$totalfull += $total;
}

$huy = array('status' => 1, 'amount' => $amount,'location' => $location,'type' => 'Thử', 'price' => '0','msg' => $msg,'total' => $totalfull.' '.$vp.'');


echo json_encode($huy+$hp);



	    	break;
			
	default:
		die(json_encode(array('status' => false,'item' => '','location' => '', 'msg' => 'Lỗi hệ thống!')));
		break;
}