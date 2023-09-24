<?php
if(!$hp->is_admin()) {
	 die('<center><h1>Access Denied!!!</h1></center>');
}else {	
	mysqli_query($hp->connect_db(), "DELETE FROM `random_freefire_nick` WHERE `id`='".$_GET['id']."'");	
	echo '<script>location.href="/adminisrtator/?modun=random_freefire&act=index";</script>';
}
?>