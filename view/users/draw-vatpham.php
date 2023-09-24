 <?php
 defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';
$xss = new Xss_Anti; 

$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `rut_vat_pham` WHERE `username`='".$user['username']."' ORDER BY id DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_vat_pham` WHERE `username`='".$user['username']."' "));

 ?>
 <div class="col-12 col-lg-9 col-md-9 col-sm-12 col-xs-12">
					    <div class="team-item">
					        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
    							<li class="nav-item" role="presentation">
    							    <button class="nav-link font-weight-bolder active"  role="tab" type="button" style="padding: 12px;">RÚT KIM CƯƠNG</button>
    							</li>
    						</ul>
    						<form id="diamond" class="row team-content">
    						    <p>Rút Xong Vui Lòng Đợi 5p - 30p Để Duyệt Đơn Và Nạp Kim Cương Vào Tài Khoản</p>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="float-left">Số Kim Cương Của Bạn</label>
    						            <input class="form-control" value="<?=$user['kimcuong'];?>" disabled>
    						        </div>
    						    </div>
    						    <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="float-left">ID Player</label>
    						            <input class="form-control" placeholder="ID Player Game Của Bạn" name="idgame" type="text">
    						        </div>
    						    </div>
    						    <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="float-left">Gói Rút</label>
    						            <select class="form-control" name="type">
                                            <option value="1">Gói rút 90 kim cương</option>
                                            <option value="2">Gói rút 230 kim cương</option>
                                            <option value="3">Gói rút 465 kim cương</option>
                                            <option value="4">Gói rút 950 kim cương</option>
                                            <option value="5">Gói rút 2375 kim cương</option>
                                        </select>
    						        </div>
    						    </div>
    						    <div class="col-md-12">
                                    <div class="mb-3">
    						                						        </div>
    						    </div>
    						    <div class="col-md-12">
    						        <div class="mb-1">
    						            <button class="btn-primary-line" type="submit">Rút Kim Cương</button>
    						        </div>
    						    </div>
    						</form>
    					</div>
					</div>
				</div>
				<div class="row">
				    <div class="col-md-12">
				        <div class="team-item">
					        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
    							<li class="nav-item" role="presentation">
    							    <button class="nav-link font-weight-bolder active"  role="tab" type="button" style="padding: 12px;">LỊCH SỬ RÚT KIM CƯƠNG</button>
    							</li>
    						</ul>
    						<div class="row">
    						    <div class="col-md-12 p-4">
    						        <table id="history_diamond" class="table table-striped table-bordered table-responsive bg-white" style="width:100%">
                						<thead>
                                            <tr>
                                                <th>Loại Vật Phẩm</th>
                                                <th>Mã Giao Dịch</th>
                                                <th>Số Kim Cương</th>
                                                <th>ID Game</th>
                                                <th>Trạng Thái</th>
                                                <th>Thời Gian</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 

    while($row = mysqli_fetch_array($result)) {
        if($row['status'] == 0) {
      $status = '<span class="badge badge-danger">Thất Bại</span>';
    }else if($row['status'] == 1) {
      $status = '<span class="badge badge-success">Thành Công</span>';
    }else if($row['status'] == 2) {
      $status = '<span class="badge badge-info">Chờ duyệt</span>';
    }else{
            $status = '<p style="color: red;">Không Xác Định</p>';
        }
         if($row['type'] == 'qh') {
           $huy = 'Quân Huy';
           $huy2 = 'QH';
           $acc = $row['user'];
        }elseif($row['type'] == 'kc'){
           $huy = 'Kim Cương';
           $huy2 = 'KC';
           $acc = $row['idgame'];
        }else{
           $huy = 'Không Xác Định';
        }
        ?>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($huy);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">#<?php echo $xss->xss_clean($row['id']);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo number_format($xss->xss_clean($row['vp'])).' '.$huy2;?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($acc);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($status);?></td>
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


          