  <?php

defined('KUNKEYPR') or exit('CHỨC NĂNG KHÔNG TỒN TẠI!');

$kun->login_required();

require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';

$xss = new Xss_Anti; 



$kmess = 8; // Số phim hiện trong mỗi page

$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;

$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);



 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` WHERE `action` LIKE  'Mua%' AND `username`='".$user['username']."' ORDER BY id DESC LIMIT $start, $kmess");

 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` WHERE `action`='Mua Random'AND `action`='Mua Account' AND `username`='".$user['username']."'"));

?>

<div class="col-12 col-lg-9 col-md-9 col-sm-12 col-xs-12">
					    <div class="team-item">
					        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
    							<li class="nav-item" role="presentation">
    							    <button class="nav-link font-weight-bolder active"  role="tab" type="button" style="padding: 12px;">LỊCH SỬ MUA</button>
    							</li>
    						</ul>
    						<div class="row p-3">
                                <div class="col-md-12">
                                    <table id="history_buy" class="table table-striped table-bordered table-responsive bg-white" style="width:100%">
                						<thead>
                                            <tr>
                                                <th>ID Tài Khoản</th>
                                                <th>Loại</th>
                                                <th>Thông Tin</th>
                                                <th>Mã Đăng Nhập</th>
                                                <th>Ghi Chú</th>
                                                <th>Thời Gian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <tbody class="text-sm font-semibold">

<?php 

while($row = mysqli_fetch_array($result)) {



$id_acc = $row['history'];

if($row['hisnick'] == 1) {

$type = 'nickff';

}elseif($row['hisnick'] == 2){

$type = 'nicklq';

}elseif($row['hisnick'] == 3) {

$type = 'random_freefire_nick';

}else{

$type = 'random_lienquan_nick';

}

$acc = mysqli_fetch_array(mysqli_query($kun->connect_db(), "SELECT * FROM `".$type."` WHERE `id`='".$id_acc."'AND `nguoimua`='".$user['username']."' AND `status`= 'false' "));



if($row['action'] == 'Mua Random') {

$huy = 'Random';

$tk = $acc['username'];

$mk = $acc['password'];

}else{

$huy = 'Account';

$tk = $acc['taikhoan'];

$mk = $acc['matkhau'];

}

?>
<td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($huy);?></td>

<td class="text-sm text-gray-800 text-left px-1 py-1 border-b">#<?php echo $xss->xss_clean($row['history']);?></td>

<td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($tk);?></td>

<td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($mk);?></td>

<td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php if($acc['2fa']){echo'2FA: '; } echo $xss->xss_clean($acc['2fa']);?></td>

<td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($row['sotien']);?></td>

<td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo date('d/m H:i', $row['time']);?></td>

</tr>

<?php } ?>

                                                                                    </tbody>
                                    </table>
    						    </div>
    						</div>
    					</div>
					</div>
				</div>
			</div>
		</div>
    </section>
                   
                            


         

                          
