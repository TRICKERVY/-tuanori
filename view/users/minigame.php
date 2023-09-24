  <?php
defined('KUNKEYPR') or exit('CHỨC NĂNG KHÔNG TỒN TẠI!');
$kun->login_required();
require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';
$xss = new Xss_Anti; 

$kmess = 12; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` WHERE `action` ='Vòng Quay FreeFire' OR `action` ='Vòng Quay Liên Quân' AND `username`='".$user['username']."' ORDER BY id DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` WHERE `action` ='Vòng Quay FreeFire'  AND `username`='".$user['username']."'"));
?>
<div class="col-12 col-lg-9 col-md-9 col-sm-12 col-xs-12">
					    <div class="team-item">
					        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
    							<li class="nav-item" role="presentation">
    							    <button class="nav-link font-weight-bolder active"  role="tab" type="button" style="padding: 12px;">LỊCH SỬ CHƠI MINIGAME</button>
    							</li>
    						</ul>
    						<div class="row p-3">
                                <div class="col-md-12">
                                    <table id="history_minigame" class="table table-striped table-bordered table-responsive bg-white" style="width:100%">
                						<thead>
                                            <tr>
                                                <th>Loại</th>
                                                <th>Phần Thưởng</th>
                                                <th>Giá Chơi</th>
                                                <th>Thời Gian</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
    while($row = mysqli_fetch_array($result)) {
      if($row['hisnick'] == '5') {
            $type = 'V.Quay KC';
        }elseif($row['hisnick'] == '6') {
            $type = 'V.Quay QH';
        }
      
        ?>
      <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">#<?php echo $xss->xss_clean($row['id']);?></td>
         <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($type);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($row['sotien']);?></td>
                               <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($row['mota']);?></td>
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