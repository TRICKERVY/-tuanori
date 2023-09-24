<?php
if(!$hp->is_admin()) {
	 die('<center><h1>Access Denied!!!</h1></center>');
}else {
	mysqli_query($hp->connect_db(), "DELETE FROM `bannick` WHERE `id`='".$_GET['id']."'");

	echo '<script>location.href="/adminisrtator/?modun=bannick&act=index";</script>';
}
?>