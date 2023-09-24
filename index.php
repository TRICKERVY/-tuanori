<?php
if (!(file_exists('config.php'))) {   
header("Location: /install");            
}


 // Define Chống vào thẳng file
define("KUNKEYPR", true); // gán defined chống khách vào thẳng file

 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user(); // gọi giá trị user đang login
?>
<?php
$tadvn = mysqli_fetch_array(mysqli_query($kun->connect_db(), "SELECT * FROM `users` WHERE `id` > 0"));
if(!$tadvn){
if (isset($_GET['i'])) {
    echo '<script>alert("'.$_GET['i'].'");</script>';
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cài Đặt Tài Khoản</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<style>
body {
    color: #000;
    overflow-x: hidden;
    height: 100%;
    background-image: linear-gradient(to right, #D500F9, #FFD54F);
    background-repeat: no-repeat
}

input,
textarea {
    background-color: #F3E5F5;
    border-radius: 50px !important;
    padding: 12px 15px 12px 15px !important;
    width: 100%;
    box-sizing: border-box;
    border: none !important;
    border: 1px solid #F3E5F5 !important;
    font-size: 16px !important;
    color: #000 !important;
    font-weight: 400
}

input:focus,
textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #D500F9 !important;
    outline-width: 0;
    font-weight: 400
}

button:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    outline-width: 0
}

.card {
    border-radius: 0;
    border: none
}

.card1 {
    width: 50%;
    padding: 40px 30px 10px 30px
}

.card2 {
    width: 50%;
    background-image: linear-gradient(to right, #FFD54F, #D500F9)
}

#logo {
    width: 70px;
    height: 60px
}

.heading {
    margin-bottom: 60px !important
}

::placeholder {
    color: #000 !important;
    opacity: 1
}

:-ms-input-placeholder {
    color: #000 !important
}

::-ms-input-placeholder {
    color: #000 !important
}

.form-control-label {
    font-size: 12px;
    margin-left: 15px
}

.msg-info {
    padding-left: 15px;
    margin-bottom: 30px
}

.btn-color {
    border-radius: 50px;
    color: #fff;
    background-image: linear-gradient(to right, #FFD54F, #D500F9);
    padding: 15px;
    cursor: pointer;
    border: none !important;
    margin-top: 40px
}

.btn-color:hover {
    color: #fff;
    background-image: linear-gradient(to right, #D500F9, #FFD54F)
}

.btn-white {
    border-radius: 50px;
    color: #D500F9;
    background-color: #fff;
    padding: 8px 40px;
    cursor: pointer;
    border: 2px solid #D500F9 !important
}

.btn-white:hover {
    color: #fff;
    background-image: linear-gradient(to right, #FFD54F, #D500F9)
}

a {
    color: #000
}

a:hover {
    color: #000
}

.bottom {
    width: 100%;
    margin-top: 50px !important
}

.sm-text {
    font-size: 15px
}

@media screen and (max-width: 992px) {
    .card1 {
        width: 100%;
        padding: 40px 30px 10px 30px
    }

    .card2 {
        width: 100%
    }

    .right {
        margin-top: 100px !important;
        margin-bottom: 100px !important
    }
}

@media screen and (max-width: 768px) {
    .container {
        padding: 10px !important
    }

    .card2 {
        padding: 50px
    }

    .right {
        margin-top: 50px !important;
        margin-bottom: 50px !important
    }
}</style>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript"></script>
 </head>

<body oncontextmenu="return false" class="snippet-body">
<div class="container px-4 py-5 mx-auto">
    <div class="card card0">
        <div class="d-flex flex-lg-row flex-column-reverse">
            <div class="card card1">
                <div class="row justify-content-center my-auto">
                    <div class="col-md-8 col-10 my-5">
                        <h3 class="mb-5 text-center heading">Bước 2</h3>
                        <h6 class="msg-info">Vui Lòng Nhập Tài Khoản Mật Khẩu Muốn Làm Admin</h6>
                       
                        <div class="form-group"> <label class="form-control-label text-muted">Tài Khoản</label> 
                            <input type="text" id="username" placeholder="Nhập Tài Khoản" class="form-control"> </div>
                        <div class="form-group"> <label class="form-control-label text-muted">Mật Khẩu</label> 
                            <input type="password" id="pass" placeholder="Mật Khẩu" class="form-control"> </div>
                        <div class="form-group"> <label class="form-control-label text-muted">Nhập Lại Mật Khẩu</label> 
                            <input type="password" id="password" placeholder="Nhập Lại Mật Khẩu" class="form-control"> </div>
                        
                        <div class="row justify-content-center my-3 px-3"> 
                            <button type="submit" id="submit" class="btn-block btn-color">Cài Đặt</button> 
                        </div>
                        
                    </div>
                </div>

            </div>
            <div class="card card2">
                <div class="my-auto mx-md-5 px-md-5 right">
                    <h3 class="text-white">Trang cài đặt Tài Khoản Mật Khẩu Cho Admin!</h3> <small class="text-white">Chúng tôi sẽ tạo 1 tài khoản mật khẩu của bạn đã nhập ở trên thành admin shop!<br>
                       </small>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="result"></div>
<script src="/assets/Scripts/toastr/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    $('#submit').click(function() {
        document.getElementById("submit").disabled = true;
        document.getElementById('submit').innerHTML = "Đang thực hiện...";

    $.ajax({
        type: "POST",
        url: '/model/buoc2.php',
        data: {
            username: $("#username").val(),         
            pass: $("#pass").val(),
            password: $("#password").val()
           
        },
        success: function(result)
        {
                    document.getElementById("submit").disabled = false;
            document.getElementById('submit').innerHTML = "Cài Đặt";

           $("#result").html(result);
        }
    });

});

});

    $(document).on('keypress',function(e) {
    if(e.which == 13) {
        $('#submit').click();
    }
});
</script>
                            
                        </body></html>
                        <?php }else{
	// web setting

$_logo = $kun->settings('logo');
$_banner = $kun->settings('banner');
$_title = $kun->settings('title');
$_admin = $kun->settings('admin');
$_color = $kun->settings('color');
$thongbao = $kun->settings('tb');


	// Title

$exec_url = $_SERVER['REQUEST_URI'];
	
	if($exec_url == '/' || $exec_url == '/index.php' || $exec_url == '/index.html') {
		$title = $_title['title'];
	}else if ($kun->tim_chuoi($exec_url, 'whell-')) {
		$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong` WHERE `id`='".$_GET['id']."' AND `status`='true'"));
		$title = $row['name'];
	}else if ($kun->tim_chuoi($exec_url, 'body/random/KC2')) {
		$title = 'Shop Bán Acc KC2 - Bán Acc KC2 Giá Rẻ, Uy Tín Hàng Đầu Việt Nam';
	}else if ($kun->tim_chuoi($exec_url, 'body/random/KC1')) {
		$title = 'Shop Bán Acc KC1 - Bán Acc KC1 Giá Rẻ, Uy Tín Hàng Đầu Việt Nam';		
	}else if ($kun->tim_chuoi($exec_url, 'html/quay11')) {
		$title = 'Shop Free Fire, Nhận Kim Cương/Nick Khủng - shopbacgau.comOEL';
	}else if ($kun->tim_chuoi($exec_url, 'html/quay12')) {
		$title = 'Shop Free Fire, Nhận Kim Cương/Nick Khủng - shopbacgau.com';
	}else if ($kun->tim_chuoi($exec_url, 'html/quay6')) {
		$title = 'Shop Free Fire, Nhận Kim Cương/Nick Khủng - shopbacgau.com';	
	}else if ($kun->tim_chuoi($exec_url, 'html/quay9')) {
		$title = 'Shop Free Fire, Nhận Kim Cương/Nick Khủng - shopbacgau.com';
	}else if ($kun->tim_chuoi($exec_url, 'html/quayso3')) {
		$title = 'Shop Free Fire, Nhận Kim Cương/Nick Khủng - shopbacgau.com';			
	}else if ($kun->tim_chuoi($exec_url, 'account-game/freefire')) {
		$title = 'Tài Khoản Free Fire';
	}else if ($kun->tim_chuoi($exec_url, 'body/lienquan')) {
		$title = 'Shop Bán Acc Liên Quân - Bán Acc Liên Quân Giá Rẻ, Uy Tín Hàng Đầu Việt Nam ';		
	}else if ($kun->tim_chuoi($exec_url, 'nap-tien.html')) {
		$title = 'Nạp Thẻ';
	}else if ($kun->tim_chuoi($exec_url, 'doimatkhau')) {
		$title = 'Đổi Mật Khẩu';
	}else if ($kun->tim_chuoi($exec_url, 'lichsugiaodich')) {
		$title = 'Lịch Sử Giao Dịch';
	}else if ($kun->tim_chuoi($exec_url, 'html/lichsuquay')) {
		$title = 'Lịch Sử Quay';		
	}else if ($kun->tim_chuoi($exec_url, 'lichsunapthe')) {
		$title = 'Lịch Sử Nạp Thẻ';
	}else if ($kun->tim_chuoi($exec_url, '/html/kimcuong')) {
		$title = 'Rút Kim Cương';
	}else if ($kun->tim_chuoi($exec_url, '/html/quanhuy')) {
		$title = 'Rút Quân Huy';
	}else if ($kun->tim_chuoi($exec_url, 'lich-su-mua.html')) {
		$title = 'Lịch Sử Mua';
	}else if ($kun->tim_chuoi($exec_url, '/user')) {
		$title = 'Trang Cá Nhân';
	}else if ($kun->tim_chuoi($exec_url, 'login/doipass')) {
		$title = 'Đổi Mật Khẩu';
	}else if ($kun->tim_chuoi($exec_url, 'lich-su-giaodich.html')) {
		$title = 'Lịch Sử Giao Dịch';
	}else if ($kun->tim_chuoi($exec_url, '/user/napthe')) {
		$title = 'Nạp Thẻ';
	}else if ($kun->tim_chuoi($exec_url, '/lich-su-nap.html')) {
		$title = 'Lịch Sử Nạp Thẻ';
	}else if ($kun->tim_chuoi($exec_url, '/latbai')) {
		$title = 'Shop Free Fire, Nhận Kim Cương/Nick Khủng - shopbacgau.com';
	}else if ($kun->tim_chuoi($exec_url, '/sieucap')) {
		$title = 'Shop Free Fire, Nhận Kim Cương/Nick Khủng - shopbacgau.com'; 
	}else if ($kun->tim_chuoi($exec_url, 'account')) {
		if($kun->tim_chuoi($_GET['cname'], '/page=')) {
			$exp = explode("/page=", $_GET['cname']);
			$_GET['cname'] = $exp[0];
			$_REQUEST['page'] = $exp[1];
		}
		$thread = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` WHERE `cname`='".$_GET['cname']."'"));
		$title = $thread['name'];
	}else if ($kun->tim_chuoi($exec_url, '/random/lienquan/')) {
		$title = 'RANDOM LIÊN QUÂN';		
	}else if ($kun->tim_chuoi($exec_url, 'lich-su-random.html')) {
		$title = 'LỊCH SỬ MUA RANDOM';
	}else if ($kun->tim_chuoi($exec_url, '/login')) {
		$title = 'Đăng Nhập';
	}else if ($kun->tim_chuoi($exec_url, '/register')) {
		$title = 'Đăng Kí';
	}else if ($kun->tim_chuoi($exec_url, 'vongquaycodesung.html')) {
		$title = 'Vòng Quay Code Súng';
	}



 // một vài cái linh tinh
$token = $_SESSION['token'];
if($token) $btn_login = $user['name'].' - $ '.number_format($user['money']).''; else $btn_login = "Đăng nhập";
if($token) $btn_fbid = ''.$user['name'].' - $ '.number_format($user['money']).''; else $btn_fbid = "Đăng nhập";
if($token) $btn_reg = "Đăng Xuất"; else $btn_reg = "Đăng Kí";
if($token) $href_login = '/user.html'; else $href_login = "/login";
if($token) $href_reg = "/body/logout"; else $href_reg = "/register";
if($kun->is_admin()) $btn_admin = '<li><a href="/admin" class="c-btn-border-opacity-04 c-btn btn-no-focus c-btn-header btn btn-sm c-btn-border-1x c-btn-white c-btn-uppercase c-btn-sbold"><i class="icon-user"></i> Admin</a></li>'; else $btn_admin = '';

    require $root.'/view/header.php';
      
		if(!$_GET['modun'] && !$_GET['act']) {
			require $root.'/view/Widget/Top_Widget.php';
		    require $root.'/view/home.php';

}else if($_GET['modun'] == "account" || $_GET['modun'] == "users" || $_GET['modun'] == "vongquaykimcuong"  || $_GET['modun'] == "freefire" || $_GET['modun'] == "random_freefire"){
			$modun = $_GET['modun'];
			$act = $_GET['act'];
			require $root.'/view/nav.php';
					if (file_exists($root.'/view/'.$modun.'/'.$act.'.php')){
		    			require $root.'/view/'.$modun.'/'.$act.'.php';
					}else{
					    echo "<center>404 - Not Found</center>";
					}

		}
		else {
$modun = $_GET['modun'];
			$act = $_GET['act'];
			require $root.'/view/Widget/Top_Widget.php';
			require $root.'/view/nav.php';
					if (file_exists($root.'/view/'.$modun.'/'.$act.'.php')){
		    			require $root.'/view/'.$modun.'/'.$act.'.php';
					}else{
					    echo "<center>404 - Not Found</center>";
					}


		}

    require $root.'/view/footer.php';
                        }
