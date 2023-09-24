<?php
if(!$hp->is_admin()) {
	 die('<center><h1>Access Denied!!!</h1></center>');
}else {
	$row = mysqli_fetch_assoc(mysqli_query($hp->connect_db(), "SELECT * FROM `random_freefire` WHERE `id`='".$_GET['id']."'"));	
	mysqli_query($hp->connect_db(), "DELETE FROM `random_freefire_nick` WHERE `cname`='".$row['cname']."' AND `status`='true'");	
	mysqli_query($hp->connect_db(), "DELETE FROM `random_freefire` WHERE `id`='".$_GET['id']."'");


	//echo $row['cname'];

	echo '<script>location.href="/adminisrtator/?modun=random_freefire&act=index";</script>';
}
?>