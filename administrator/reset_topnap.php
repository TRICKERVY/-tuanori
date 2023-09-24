<?php
 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();



if(empty($_SESSION['token'])) {
 die('<center><h1>Login???</h1></center>');
}else {
	if(!$kun->is_admin()) {
  		die('<center><h1>Access Denied!!!</h1></center>');
 	}	
	if($kun->is_admin()) {
		mysqli_query($kun->connect_db(), "UPDATE `users` SET  `money_nap`='0'");
		echo '<script>window.location=\'/admin\';</script>';
	}
}


