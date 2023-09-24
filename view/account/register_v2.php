<?php
if($_SESSION['token']) {
    die('<meta http-equiv="refresh" content="0;URL=/home"/>');
}
?>
<link rel="stylesheet" href="/assets/Scripts/toastr/toastr.min.css"/>
<o id="result"></o>

<div class="c-layout-page">
<div class="container" style="background-color: rgba(0,0,0,0.8);     margin-bottom: 15px;       margin-bottom: 20px;">
<div class="login-box" style="margin-top: -10px;margin-bottom: 100px;">

<div class="login-box-body box-custom">
<p class="login-box-msg">Đăng ký thành viên</p>
<span class="help-block" style="text-align: center;color: #dd4b39">
<strong></strong>
</span>

<div class="form-group has-feedback">
<input type="text" class="form-control" id="name" value="" placeholder="Họ Và Tên">

</div>
<div class="form-group has-feedback  ">
<input type="text" class="form-control" id="username" value="" placeholder="Tên Tài khoản">

</div>
<div class="form-group has-feedback">
<input type="text" class="form-control" id="email" value="" placeholder="Email">
<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" id="password" placeholder="Mật khẩu" aria-autocomplete="list">

</div>
<div class="form-group has-feedback">
<input type="password" class="form-control" id="repassword" placeholder="Nhập lại mật khẩu">
</div>
<div class="row">

<div class="col-xs-12">
<button type="submit" id="submit" class="btn btn-primary btn-block btn-flat" style="margin: 0 auto;">Đăng ký</button>
</div>

</div>

<div class="social-auth-links text-center">
        <p style="margin-top: 5px">- HOẶC -</p>
    <a href="/login-fb.html" class="btn  btn-social btn-facebook btn-flat d-inline-block"><i class="fa fa-facebook"></i>Login FB</a>
    <a href="/signin.html" class="btn  btn-social btn-google btn-flat d-inline-block"><i class="icon-key icons"></i>Đăng Nhập</a>
</div>

</div>

</div>

<style>
        .login-box, .register-box {
            width: 400px;
            margin: 7% auto;
            padding: 20px;;
        }

        @media (max-width: 767px){
            .login-box, .register-box {
                width: 100%;
            }

        }

        .login-box-msg, .register-box-msg {
            margin: 0;
            text-align: center;
            padding: 0 20px 20px 20px;
            text-align: center;
            font-size: 20px;
            font-weight: bold;
        }
        .box-custom{
			background: rgb(0 0 0 / 53%);
			border: 1px solid #3d3d3d;
			padding: 20px;
			color: #fff;
        }
    </style>

</div>




<script src="/assets/Scripts/toastr/toastr.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

    $('#submit').click(function() {
        document.getElementById("submit").disabled = true;
        document.getElementById('submit').innerHTML = "Đang kiểm tra";

    $.ajax({
        type: "POST",
        url: 'system/user',
        data: {
            type : 'register',
            name: $("#name").val(),   
            username: $("#username").val(),         
            email: $("#email").val(),
            password: $("#password").val(),
            repassword: $("#repassword").val()
        },
        success: function(result)
        {
                    document.getElementById("submit").disabled = false;
            document.getElementById('submit').innerHTML = "Đăng kí";

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