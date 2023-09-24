


<div class="col-12 col-lg-9 col-md-9 col-sm-12 col-xs-12">
					    <div class="team-item">
					        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
    							<li class="nav-item" role="presentation">
    							    <button class="nav-link font-weight-bolder active"  role="tab" type="button" style="padding: 12px;">ĐỔI THÔNG TIN & MẬT KHẨU</button>
    							</li>
    						</ul>
    						<?php
if(isset($_POST['submit'])) {
    if($_POST['old_password'] && $_POST['password'] && $_POST['repassword']) {

        $check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT `password` FROM `users` WHERE `password`='".md5($_POST['old_password'])."' AND `username`='".$user['username']."' "));
        if($check < 1) {
            echo '<div class="alert alert-danger"> Mật khẩu cũ của bạn không đúng!</div>';
        }else {
            if(strlen($_POST['password']) > 6) {
                if($_POST['password'] != $_POST['repassword']) {
                    echo '<div class="alert alert-danger"> 2 Mật Khẩu bạn vừa nhập không giống nhau!</div>';
                }else {
                    mysqli_query($kun->connect_db(), "UPDATE `users` SET `password`='".md5($_POST['password'])."' WHERE `username`='".$user['username']."'");
                    echo '<div class="alert alert-success"> Đổi Mật Khẩu Thành Công!</div>';                    
                }
            }else {
                echo '<div class="alert alert-danger"> Mật Khẩu mới phải lớn hơn 6 kí tự!</div>';
            }

        }


    }else {
        echo '<div class="alert alert-danger"> Vui lòng nhập đầy đủ thông tin!</div>';
    }
}
?>
    						<form  method="POST" action="" accept-charset="UTF-8" class="row team-content">
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="float-left">Mật Khẩu</label>
    						            <input class="form-control" placeholder="Mật khẩu" name="old_password" type="password">
    						        </div>
    						    </div>
    						    <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="float-left">Mật Khẩu Mới</label>
    						            <input class="form-control" placeholder="Mật khẩu mới" name="password" type="password">
    						        </div>
    						    </div>
    						    <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="float-left">Nhập Lại Mật Khẩu Mới</label>
    						            <input class="form-control" placeholder="Xác nhận mật khẩu mới" name="repassword" type="password">
    						        </div>
    						    </div>
    						    <div class="col-md-2">
    						        <div class="mt-4 mb-1">
    						            <button class="btn-primary-line" name="submit" type="submit">Cập Nhật</button>
    						        </div>
    						    </div>
    						</form>
    					</div>
					</div>
				</div>
			</div>
		</div>
    </section>    
  



