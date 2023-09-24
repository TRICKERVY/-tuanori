	<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
 // Require Hàm hệ thống

?>

<?php
if($kun->is_admin()) {
    $level = 'Quản Trị Viên'; 
}else { 
    $level = 'Thành Viên';
}
//echo var_dump($user);


if($user['fbid'] != 0) {
    $avatar = 'https://graph.facebook.com/'.$user['username'].'/picture?width=1000&height=1000';
}else {
    $avatar = 'https://nick.vn/assets/frontend/images/unknown-avatar.jpg';
}
?>


<?php require $root.'/view/users/right_menu.php';?>



<?php 
if($_GET['cmd']) {
    require $root.'/view/users/'.$_GET['cmd'].'.php';
}else {
?>
This Service Not Found!


<?php
}
?>