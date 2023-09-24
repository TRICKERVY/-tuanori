<?php
if($_SESSION['token']) {
    die('<meta http-equiv="refresh" content="0;URL=/"/>');
}
?>

<div class="page-bottom">
			<div class="container">
				<div class="row">
				    <div class="col-12 col-lg-4 col-md-3 col-sm-4 col-xs-4"></div>
					<div class="col-12 col-lg-4 col-md-6 col-sm-12 col-xs-12">
					    <div class="team-item">
					        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
    							<li class="nav-item" role="presentation">
    							    <button class="nav-link font-weight-bolder active"  role="tab" type="button" style="padding: 12px;">ĐĂNG KÝ</button>
    							</li>
    						</ul>
    						<form id="fregister" class="team-content contact-form">
    						    
                                <div class="col-md-12">
                                    <div class="mb-3">
    						            <input class="form-control" placeholder="Tài khoản" name="username" type="text">
    						        </div>
    						    </div>
    						    <div class="col-md-12">
                                    <div class="mb-3">
    						            <input class="form-control" placeholder="Mật khẩu" name="password" type="password">
    						        </div>
    						    </div>
    						    <div class="col-md-12">
                                    <div class="mb-3">
    						            <input class="form-control" placeholder="Nhập lại mật khẩu" name="repassword" type="password">
    						        </div>
    						    </div>
    						    <div class="col-md-12">
                                    <div class="mb-3">
    						                						        </div>
    						    </div>
    						    <div class="col-md-12">
    						        <div class="mb-1">
    						            <button class="btn-primary-line" type="submit">Đăng Ký</button>
    						        </div>
    						    </div>
    						    <div class="col-md-12">
    						        <div class="p-1">Hoặc</div>
    						    </div>
    						    <div class="col-md-12">
    						        <div class="mb-3">
    						            <a class="btn btn-info w-100 text-white" href="/oauth.php">Đăng Ký Bằng Facebook</a>
    						        </div>
    						    </div>
    						    <div class="col-md-12">
    						        <div class="mb-1">
    						            <a class="btn btn-danger w-100 text-white" href="/login">Đăng Nhập Tài Khoản</a>
    						        </div>
    						    </div>
    						</form>
    					</div>
					</div>
				</div>
			</div>
		</div>
    </section>