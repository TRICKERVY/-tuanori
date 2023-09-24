<?php
if(!$kun->is_admin()) {
	 die('<center><h1>Access Denied!!!</h1></center>');
}else {
	mysqli_query($kun->connect_db(), "DELETE FROM `nickff` WHERE `id`='".$_GET['id']."' AND `status`='1'");
	echo '<script>location.href="/adminisrtator/?modun=nick&act=index";</script>';
}
?>