<?php
if($_SESSION['token']) {
    die('<meta http-equiv="refresh" content="0;URL=/home"/>');
}
?>

<link rel="stylesheet" href="/assets/Scripts/toastr/toastr.min.css"/>
<o id="result"></o>

<div class="c-layout-page">
<div class="container" style="background-color: rgba(0,0,0,0.8);     margin-bottom: 15px;       margin-bottom: 20px;">

<div class="login-box-body box-custom">
<p class="login-box-msg">Đăng nhập hệ thống</p>
<span class="help-block" style="text-align: center;color: #dd4b39">
<strong></strong>
</span>

<div class="form-group has-feedback  ">
<input type="text" class="form-control" id="username" value="" placeholder="Tên Tài khoản">
<span class=""></span>
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" id="password" placeholder="Mật khẩu" aria-autocomplete="list">
<span class=""></span>
</div>

<div class="row">
<div class="col-xs-6">
<div class="checkbox icheck">
<label style="color:white">
<input type="checkbox" name="remember" id="remember"> Ghi nhớ
</label>
</div>
</div>

<div class="col-xs-6" style="text-align: right">
<a href="#" style="color:white;margin-top: 10px;margin-bottom: 10px;display: block;font-style: italic;">Quên mật khẩu?</a><br>
</div>

</div>

<div class="row">
<div class="col-xs-12">
<button type="submit" id="submit" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng Nhập</button>
</div>
</div>

<div class="social-auth-links text-center">
    <p style="margin-top: 5px">- HOẶC -</p>
    <a href="/vai.php" class="btn  btn-social btn-facebook btn-flat d-inline-block"><i class="fa fa-facebook"></i>Login FB</a>
    <a href="/reg.html" class="btn  btn-social btn-google btn-flat d-inline-block" style="margin-bottom:5px"><i class="icon-key icons" ></i>Tạo tài
                    khoản</a>
</div>

</div>

</div>
</div>

<style>
    .login-box, .register-box {
           
            padding: 70px;border: 1px solid #cccccc;
        }
		        .login-box-body {
           
             width: 400px;
            margin: 7% auto;
        }

        @media (max-width: 767px){
            .login-box, .register-box {width: 100%;}
			.login-box-body {width: 100%;}
        }

        .login-box-msg, .register-box-msg {
            margin: 0;color:#fff;
            text-align: center;
            padding: 0 20px 20px 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .box-custom{
            padding: 15px;
            color: #fff;
        }
</style>



<script src="/assets/Scripts/toastr/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    $('#submit').click(function() {
        document.getElementById("submit").disabled = true;
        document.getElementById('submit').innerHTML = "Đang đăng nhập";

    $.ajax({
        type: "POST",
        url: 'system/user',
        data: {
            type : 'login',
            username: $("#username").val(),
            password: $("#password").val()
        },
        success: function(result)
        {
                    document.getElementById("submit").disabled = false;
            document.getElementById('submit').innerHTML = "Đăng nhập";

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


<script>
    $(document).ready(function () {
        toastr.options = {
            "debug": false,
            "newestOnTop": false,
            "positionClass": "toast-top-right",
            "closeButton": true,
            "progressBar": true
        };
    });
</script>

</body>

</html>
</div>