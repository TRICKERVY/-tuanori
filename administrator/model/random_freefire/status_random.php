<?php
error_reporting(1);
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$hp = new System;
$user = $hp->user();
	if(!$hp->is_admin()) {
  		die('<center><h1>Access Denied!!!</h1></center>');
 	}	
 	if($_POST['id'] && $_POST['status']) {
 		mysqli_query($hp->connect_db(), "UPDATE `random_freefire` SET `status`='".$_POST['status']."' WHERE `id`='".$_POST['id']."'");
 	}

