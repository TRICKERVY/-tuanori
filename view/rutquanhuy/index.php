<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);
$result = mysqli_query($kun->connect_db(), "SELECT * FROM `rut_quan_huy` WHERE `username`='".$user['username']."' ORDER BY time DESC LIMIT $start, $kmess");
$tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_quan_huy` WHERE `username`='".$user['username']."'"));

?>

<div class="sa-mainsa">
    <div class="container">

            <div class="sa-logmain sa-themain">

<style type="text/css">
	#type-error,#serial-error,#code-error {
        color: #ff502e;
}

</style>


<form class="form-horizontal" method="POST">
<?php

    
    if(isset($_POST['rutquanhuy'])) {

      require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';

      $xss = new Xss_Anti;

      $account = mysqli_real_escape_string($kun->connect_db(), $xss->xss_clean($_POST['account']));
      $quanhuy = intval($xss->xss_clean($_POST['quanhuy']));
      $pass = strip_tags(mysqli_real_escape_string($kun->connect_db(), $xss->xss_clean($_POST['pass'])));
      $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_quan_huy` WHERE `t`='".$account."' AND `status` = '2'"));
      $nguoirut = $user['username'];

  if(empty($user) || empty($quanhuy)) {
    echo '<div class="alert alert-danger"> Xin vui lòng nhập đầy đủ thông tin!</div>';
  }else if($user['quanhuy'] < 84){
    echo '<div class="alert alert-danger"> Bạn Không Đủ Quân Huy Để Rút !</div>';
  }else if($quanhuy > $user['quanhuy']){
    echo '<div class="alert alert-danger"> Quân Huy Bạn Cần Rút Phải Nhỏ Hơn Số Quân Huy Hiện Tại !</div>';
  }else if($check > 0){
    echo '<div class="alert alert-danger"> Đơn Rút Này Đã Tồn Tại Ở Hệ Thống. Vui Lòng Chờ Admin Xử Lý ! ( Trừ '.$quanhuy.' Quân Huy Tại Hệ Thống)</div>';
  } else {

    // update quanhuy user
  mysqli_query($kun->connect_db(), "UPDATE `users` SET `quanhuy` = `quanhuy` - '".$quanhuy."' WHERE `username` = '".$user['username']."' ");
   // update vào lịch sử rút
  mysqli_query($kun->connect_db(), "INSERT INTO `rut_quan_huy` SET 
  `username` = '".$user['username']."',
  `t` = '".$account."',
  `quanhuy` = '".$quanhuy."',
  `p` = '".$pass."',
  `status` = '2',
  `time` = '".time()."'");



        // Update vào lịch sử user
    mysqli_query($kun->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Rút Quân Huy Freefire', 'Rút Quân Huy Freefire', '-".number_format($quanhuy)." kc', 'Rút ".number_format($quanhuy)." Quân Huy vào ID ".$account."', '".time()."')");
    

    echo '<div class="alert alert-success"> Bạn rút Quân Huy thành công, xin chờ Admin duyệt! (Trừ '.$quanhuy.' Quân Huy Tại Hệ Thống )</div>';  
}


    }



  ?>
                           <div class="mess"></div>

													  <p>Bạn đang có <?php echo $user['quanhuy'];?> KC</p>
                                                           <label class="control-label" for="amount">Gói Quân Huy rút<span class="text-danger">*</span></label>
																<select name="quanhuy" class="form-control">

																        <option value="84">84 Quân Huy</option>
																        <option value="168">168 Quân Huy</option>
																        <option value="340">340 Quân Huy</option>
																        <option value="856">856 Quân Huy</option>




																</select>


                            </div>
                            <div class="form-group">
                                <label class="control-label" for="serial">Tên Đăng Nhập trong Garena<span class="text-danger">*</span></label>
                                <input type="text"  name="account" class="form-control" placeholder="Tên Đăng Nhập" value="" required="required" autocorrect="off" spellcheck="false" autocapitalize="off" tabindex="3">
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="serial">Mật Khẩu trong Garena<span class="text-danger">*</span></label>
                                <input type="text" name="pass" class="form-control" placeholder="Mật Khẩu" value="" required="required" autocorrect="off" spellcheck="false" autocapitalize="off" tabindex="3">
                            </div>

                             <div class="groupbtn">
                                <button class="btn-cs"  type="submit" name="rutquanhuy">Rút</button>
                             </div>


                    </form>







     

		           <table id="datatable-responsive" class="table table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
		             <thead>
		               <tr>
		                 <th>Mã Đơn</th>
		                 <th>Tài Khoản Nhận</th>
		                 <th>Số Quân Huy</th>
					 	 <th>Thời Gian</th>
		                 <th>Trạng thái</th>

		               </tr>
		             </thead>
		             <tbody>
<?php 
	while($row = mysqli_fetch_array($result)) {
		if($row['status'] == 0) {
			$status = '<p style="color: red;">Thất Bại</p>';
		}else if($row['status'] == 1) {
			$status = '<p style="color: green;">Thành Công</p>';
		}else if($row['status'] == 2) {
			$status = '<p style="color: yellow;">Chờ Duyệt</p>';
		}
		?>
		                                      <tr>
                                        <td>#<?php echo $row['id'];?></td>
                                        <td><?php echo $row['t'];?></td>                                        
                                        <td><span class="c-font-bold text-danger"><?php echo number_format($row['quanhuy']);?> Quân Huy</span></td>
                                        <td><?php echo date('d/m H:i', $row['time']);?></td>
                                        <td><?php echo $status;?></td>
                                    </tr>

		<?php } ?>

                        </tbody>
                    </table>

  <div class="text-center">	<center>
<?php
if ($tong > $kmess){
echo '<center>' . $kun->phantrang('/html/quanhuy/', $start, $tong, $kmess) . '</center>';
}
?></div>
</div>
</div>

<script type="text/javascript" src="/assets/lib/jquery-2.1.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>