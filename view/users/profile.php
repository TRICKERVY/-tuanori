<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
?>

<?php $row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `username`='".$user['username']."'")) ?>

               


					<div class="col-12 col-lg-9 col-md-9 col-sm-12 col-xs-12">
					    <div class="team-item">
					        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
    							<li class="nav-item" role="presentation">
    							    <button class="nav-link font-weight-bolder active"  role="tab" type="button" style="padding: 12px;">THÔNG TIN TÀI KHOẢN</button>
    							</li>
    						</ul>
    						<form id="info" class="row team-content contact-form">
                                <div class="col-md-2">
                                    <div class="mb-4">
                                        <label class="float-left">ID</label>
    						            <input class="form-control" value="#<?php echo$user['id'];?>" disabled>
    						        </div>
    						    </div>
    						    <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="float-left">Tài Khoản</label>
    						            <input class="form-control" value="<?php echo$user['username'];?>" disabled>
    						        </div>
    						    </div>
    						    <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="float-left">Tên Hiển Thị</label>
    						            <input class="form-control" value="<?php echo$user['username'];?>" disabled>
    						        </div>
    						    </div>
    						    <div class="col-md-4">
                                    <div class="mb-2">
                                        <label class="float-left">Email</label>
    						            <input class="form-control" value="<?php echo$user['email'];?>" disabled>
    						        </div>
    						    </div>
    						    <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="float-left">Cấp Bậc</label>
    						            <input class="form-control" value="Thành Viên" disabled>
    						        </div>
    						    </div>
    						    <div class="col-md-3">
                                    <div class="mb-2">
                                        <label class="float-left">Số Dư</label>
    						            <input class="form-control" value="<?php echo number_format($user['money']);?> VNĐ" disabled>
    						        </div>
    						    </div>
    						    <div class="col-md-3">
                                    <div class="mb-4">
                                        <label class="float-left">Số Kim Cương</label>
    						            <input class="form-control" value="<?php echo number_format($user['kc']);?> " disabled>
    						        </div>
    						    </div>
                                <div class="col-md-3">
                                    <div class="mb-4">
                                        <label class="float-left">Ngày Tham Gia</label>
    						            <input class="form-control" value="<?php echo date('d/m/20y', $row['time']);?>" disabled>
    						        </div>
    						    </div>
    						    <div class="col-md-6">
                                    <div class="mb-3">
                                        <a class="btn btn-danger w-100 p-2" href="/logout">Đăng Xuất</a>
    						        </div>
    						    </div>
    						    <div class="col-md-6">
                                    <div class="mb-3">
                                        <a class="btn-primary-line" href="#">Đổi Thông Tin</a>
    						        </div>
    						    </div>
    						</form>
    					</div>
					</div>
				</div>
			</div>
		</div>
    </section> 