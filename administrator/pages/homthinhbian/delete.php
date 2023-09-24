<?php
if(!$hp->is_admin()) {
	 die('<center><h1>Access Denied!!!</h1></center>');
}else {
	mysqli_query($hp->connect_db(), "DELETE FROM `homthinhbian` WHERE `id`='".$_GET['id']."' AND `status`='1'");
	echo '<script>location.href="/adminisrtator/?modun=homthinhbian&act=index";</script>';
}
?>