	<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
?>

<?php
if($kun->is_admin()) {
    $level = 'Administrator'; 
}else { 
    $level = 'Thành Viên';
}
//echo var_dump($user);


if($user['fbid'] != 0) {
    $avatar = 'https://graph.facebook.com/'.$user['username'].'/picture?width=1000&height=1000';
}else {
    $avatar = '/images/avatar.jpg';
}
?>
			<style>

.swal2-container {
  zoom: 1.5;
}

</style>

<div class="c-layout-page" style="    background-color: rgba(0,0,0,0.8);     margin-bottom: 15px;">

<div class="m-t-20 visible-sm visible-xs"></div>

<center style="max-width:1140px; margin: 0 auto;">
        <div class="c-subtitle c-fonts-uppercase c-fonts-bold c-bg-img-center" style="
		background-position: center;width:100%;height: 200px;
		background-repeat: no-repeat;background-position: center;
		background-size: cover;">
            <div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">&nbsp;</h3>
                </div>
            </div>
        </div>
 </center>
<div class="container">
                <div class="c-page-title c-pull-left">
                    <h3 class="c-font-uppercase c-font-bold c-font-white c-font-20 c-font-slim">&nbsp;</h3>
                </div>
            </div>

<div class="c-layout-sidebar-content ">

    <div class="col-md-12">
        <div class="text-center" >
            <center>
                <?php
                if($user['fbid'] <> 0) {
                    ?>
                <img class="img-responsive img-thumbnail hidden-xs" width="256" height="256" src="<?php echo $avatar;?>" alt="">
                <?php
                }else {
                ?>
<?php
}
?>
                <h2 class="c-font-bold c-font-28">UID: <?php echo $user['username'];?></h2>
                <h2 class="c-font-bold c-font-28"><?php echo $user['username'];?></h2>
                <h2 class="c-font-22"><?php echo $level;?></h2>
                <h2 class="c-font-22"></h2>
                <h2 class="c-font-22 c-font-red"><?php echo number_format($user['money']);?>đ</h2>
            </center>

        </div>

    </div>
    <?php 
if($_GET['cmd']) {
    require $root.'/view/napthe/'.$_GET['cmd'].'.php';
}else {
?>
Chức Năng này không tồn tại!


<?php
}
?>
<?php require $root.'/view/napthe/left_menu.php';?>
  </main>
    </div>

    <script src="/assets/topup.js" defer>
    </script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            jQuery(function () {
                App.initHelpers('select2');
            });
        });
    </script><!-- Global site tag (gtag.js) - Google Analytics -->


