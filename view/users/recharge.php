 <?php
 defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';
$xss = new Xss_Anti; 

$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `username`='".$user['username']."' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `username`='".$user['username']."'"));

 ?>
  <div class="col-12 col-lg-9 col-md-9 col-sm-12 col-xs-12">
					    <div class="team-item">
					        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
    							<li class="nav-item" role="presentation">
    							    <button class="nav-link font-weight-bolder active"  role="tab" type="button" style="padding: 12px;">NẠP TIỀN BẰNG THẺ CÀO</button>
    							</li>
    						</ul>
    						<form id="card" class="row team-content contact-form">
    						    <div class="col-md-6">
                                    <div class="mb-4">
    						            <select name="card_type" class="form-control">
                                            <option selected>Chọn Loại Thẻ</option>
                                            <option value="Viettel">Viettel</option>
                                            <option value="Mobifone">Mobifone</option>
                                            <option value="Vinaphone">Vinaphone</option>
                                            <option value="Vietnamobile">Vietnamobile</option>
                                            <option value="Gate">Gate</option>
                                            <option value="Garena">Garena</option>
                                            <option value="Zing">Zing</option>
                                            <option value="Vcoin">Vcoin</option>
                                        </select>
    						        </div>
    						    </div>
                                <div class="col-md-6">
                                    <div class="mb-4">
    						            <input class="form-control" placeholder="Mã thẻ" name="pin" type="text">
    						        </div>
    						    </div>
    						    <div class="col-md-6">
                                    <div class="mb-2">
    						            <input class="form-control" placeholder="Số seri" name="serial" type="text">
    						        </div>
    						    </div>
    						    <div class="col-md-6">
                                    <div class="mb-2">
    						            <select name="card_amount" class="form-control">
                                            <option>Chọn Mệnh Giá - Chọn Sai Mất Thẻ</option>
                                            <option value="10000">10.000</option>
                                            <option value="20000">20.000</option>
                                            <option value="30000">30.000</option>
                                            <option value="50000">50.000</option>
                                            <option value="100000">100.000</option>
                                            <option value="200000">200.000</option>
                                            <option value="300000">300.000</option>
                                            <option value="500000">500.000</option>
                                            <option value="1000000">1.000.000</option>
                                        </select>
    						        </div>
    						    </div>
    						    <div class="col-md-12">
                                    <div class="mb-2">
    						                						        </div>
    						    </div>
    						    <p class="mb-3">Vui Lòng Chọn Đúng Mệnh Giá Của Thẻ - Chọn Sai Mệnh Giá Bị Mất Thẻ Và Không Cộng Tiền</p>
    						    <div class="col-md-12">
    						        <div class="mb-1">
    						            <button class="btn-primary-line" id="card">Nạp Thẻ Ngay</button>
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
    							    <button class="nav-link font-weight-bolder active"  role="tab" type="button" style="padding: 12px;">LỊCH SỬ NẠP THẺ CÀO</button>
    							</li>
    						</ul>
    						<div class="row">
    						    <div class="col-md-12 p-4">
    						        <table id="history_buy" class="table table-striped table-bordered table-responsive bg-white" style="width:100%">
                						<thead>
                                            <tr>
                                                <th>Loại Thẻ</th>
                                                <th>Mã Thẻ</th>
                                                <th>Mã Serial</th>
                                                <th>Mệnh Giá</th>
                                                <th>Trạng Thái</th>
                                                <th>Thời Gian</th>
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
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($row['type']);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo number_format($xss->xss_clean($row['amount']));?> VNĐ</td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($row['pin']);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($row['serial']);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($status);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo date('d/m H:i', $row['time']);?></td>
                        </tr>
                        <?php } ?>
                          
                        

                        <?php if(!$result) {echo'<div class="v-found-table h-32 w-full text-sm select-none flex items-center justify-center text-gray-800 opacity-50">
                            Không có dữ liệu
                        </div>'; } ?>
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
                                        