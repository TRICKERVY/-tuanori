<?php
error_reporting(1);

 // DEfine Chống vào thẳng file
define("HUYPLAY", true); // gán defined chống khách vào thẳng file

 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$hp = new System;
$user = $hp->user();
$root = $_SERVER['DOCUMENT_ROOT'].'/administrator';


if(empty($_SESSION['token'])) {
 die('<center><h1>BẠN CHƯA ĐĂNG NHẬP!</h1></center>');
}else {
	if(!$hp->is_admin()) {
  		die('<center><h1>BẠN KHÔNG CÓ QUYỀN TRUY CẬP!</h1></center>');
 	}	
	if($hp->is_admin()) {
			if(!$_GET['modun'] && !$_GET['act']) {
			      $active = "main";
			      require $root.'/dist/header.php';
			    require $root.'/dist/index.php';
			   
			}else {
				$modun = $_GET['modun'];
				$act = $_GET['act'];
				$cname = $_GET['cname'];
				$active = $modun;
				require $root.'/dist/header.php';
               
						if (file_exists($root.'/pages/'.$modun.'/'.$act.'.php')){
			    			require $root.'/pages/'.$modun.'/'.$act.'.php';
						}else{
						    echo "<center>404 - Not Found</center>";
						}
			}

	    require $root.'/dist/footer.php';
	}
}


