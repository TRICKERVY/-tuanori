

<!DOCTYPE html>
<html lang="vi" src-by="TUANORI.VN">
<head>
	<title><?=$title;?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="description" content="shop game free fire, minigame free fire"/>
    <meta name="keywords" content="free fire, shop free fire, shop game free fire"/>
    <meta name="author" content="TUANORI.VN"/>
    <meta property="og:title" content="<?=$title;?>"/>
    <meta property="og:url" content=""/>
    <meta property="og:locale" content="vi_VN"/>
    <meta property="og:site_name" content="TUANORI.VN"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="/assets/images/favicon/favicon.png"/>
	<link rel="icon" type="image/png" href="/assets/images/favicon/favicon.png" />
	<link href="/assets/css/bootstrap.min.css?v=<?=time();?>" rel="stylesheet" type="text/css">
	<link href="/assets/css/fontawesome.min.css?v=<?=time();?>" rel="stylesheet" type="text/css">
	<link href="/assets/css/lilzzy.css?v=<?=time();?>" rel="stylesheet" type="text/css">
	<link href="/assets/css/green.css?v=<?=time();?>" rel="stylesheet" type="text/css">
	<link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet">
	
	



	<script src="/assets/frontend/plugins/jquery/jquery-2.1.0.min.js"></script>
        
       
      
            <script src="https://kit.fontawesome.com/7ab1e50c08.js" crossorigin="anonymous"></script>
      
         <script type="text/javascript" src="/assets/Scripts/rotate.js"></script>



</head>
<body>
	<header class="header-area header-white">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<nav class="main-nav">
						<a href="/" class="logo">
							<img class="logo-webshop" src="<?php echo $_logo['url'];?>" alt="logo"/>
						</a>
                        <?php if($_SESSION['token']) { ?>
												<div class="float-start d-md-none d-lg-none">
						    <a class="btn-nav-line btn-nav-mobile" href="user/profile"><?=$user['username'];?> - <?=number_format($user['money']);?><sup>đ</sup></a>
						</div>

                         <ul class="nav">
							<li><a class="active" href="/">Trang Chủ</a></li>
							<li><a class="" href="/user/recharge">Nạp Tiền</a></li>
							<li><a class="" href="/user/draw-vatpham">Rút Kim Cương</a></li>
							<?php if($user['level'] == 'administrator'){
								echo'<li><a class="" style="color:red" href="/administrator"><b>Administrator</b></a></li>';
							} ?>
																				</ul>
						<a class="menu-trigger">
							<span>Menu</span>
						</a>
												<ul class="header-buttons">
							<li><a class="btn-nav-line" href="/user/profile"><?=$user['username'];?> - <?=number_format($user['money']);?><sup>đ</sup></a></li>
						</ul>

                        <?php } else { ?>

                            <div class="float-start d-md-none d-lg-none">
						    <a class="btn-nav-line btn-nav-mobile" href="/login">Đăng Nhập</a>
						</div>
												<ul class="nav">
							<li><a class="active" href="/">Trang Chủ</a></li>
							<li><a class="" href="/user/recharge">Nạp Tiền</a></li>
							<li><a class="" href="/user/draw-vatpham">Rút Kim Cương</a></li>
							<?php if($user['level'] == 'administrator'){
								echo'<li><a class="" style="color:red" href="/administrator"><b>Administrator</b></a></li>';
							} ?>
																				</ul>
						<a class="menu-trigger">
							<span>Menu</span>
						</a>
												<ul class="header-buttons">
							<li><a class="btn-nav-line" href="/login">Đăng Nhập</a></li>
						</ul>
                      <?php  } ?>


											</nav>
				</div>
			</div>
		</div>
	</header>	
        
        
        