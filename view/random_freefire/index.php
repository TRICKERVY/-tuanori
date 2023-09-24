<?php
defined('KUNKEYPR') or exit('Restricted Access');

// phân trang trang 2 trở đi bị lỗi nên phải thêm đoạn này
if($kun->tim_chuoi($_GET['cname'], '/page=')) {
	$exp = explode("/page=", $_GET['cname']);
	$_GET['cname'] = $exp[0];
	$_REQUEST['page'] = $exp[1];
}


$kmess = 16; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $thread = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` WHERE `cname`='".$_GET['cname']."'"));
 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `status`='true' AND `cname`='".$_GET['cname']."' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `status`='true' AND `cname`='".$_GET['cname']."'"));
?>


<div class="page-bottom">
			<div class="container">
				<div class="list_account" style=""><div class="row team-content contact-form">
                <?php 
while ($row = mysqli_fetch_array($result)) { ?>
    <div class="col-6 col-lg-3 col-md-3 col-sm-6 col-xs-6">
		<div class="team-item text-center">
		    <h6 class="game-title font-weight-bolder">Thử Vận May Free Fire #<?php echo $row['id'];?></h6>
		    <img src="<?=$thread['thumb'];?>" class="img-fluid card-img-top vh-20">
		    <div class="row">
		        <div class="col-md-12 text-center">
		            <span class="btn-nav-line btn-end-line"> <?php echo number_format($thread['giatien']);?>đ</span>
		            <a href="javascript:;" onclick="buy_accounts(<?php echo $row['id'];?>);">
		                <img class="button-view p-3" src="https://cdns.diongame.com/static/image-60bf62c0-1d16-4c36-8c1e-a29003fec9c1.png">
		            </a>
		        </div>
		    </div>
		</div>
	</div>
    <?php } ?>

   
    

            </div>
                        <div class="mt-3 md:mt-6 w-full flex justify-center items-center">
               <?php
if ($tong > $kmess){
echo  $kun->phantrang_user('/account/'.$_GET['cname'].'/', $start, $tong, $kmess);
}
?>
            </div>
                    </div></div>



<script>
    function buy_accounts(id) {
        $.ajax({
            url: "/handler/execute/buy.php?id=" + id,
            type: "GET",
            success: function(data) {
                var data = JSON.parse(data);
                swal(data.title, data.message, data.type).then(function() {
                    if (data.reload) {
                        window.location.assign("/user/tran/account")
                    }
                });
            }
        });
    }
</script>