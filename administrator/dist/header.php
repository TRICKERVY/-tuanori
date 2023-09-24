<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/administrator/dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="/administrator/dist/assets/vendors/iconly/bold.css">
    <link rel="stylesheet" href="/administrator/dist/assets/vendors/simple-datatables/style.css">
    <link rel="stylesheet" href="/administrator/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="/administrator/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/administrator/dist/assets/vendors/summernote/summernote-lite.min.css">
<script src="/administrator/dist/assets/vendors/jquery/jquery.min.js"></script>
<script src="/administrator/dist/assets/vendors/summernote/summernote-lite.min.js"></script>
      <script src='/assets/js/jquery.min.js'></script>
      <!--- <script src='/administrator/dist/assets/css/style.css'></script>--->
 <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/administrator/dist/assets/css/app.css">
    <link rel="shortcut icon" href="/administrator/dist/assets/images/favicon.svg" type="image/x-icon">
</head>


<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
               <center>
                        
                        
                  </center>
               
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?php if($active == "main") {
                        echo 'active';  
                        } ?> ">
                            <a href="/administrator" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item <?php if($active == "vongquay_kimcuong") {
                        echo 'active';  
                        } ?>">
                            <a href="/administrator/?modun=vongquay_kimcuong&act=index" class='sidebar-link'>
                                <i class="bi bi-stack"></i>
                                <span>Vòng Quay 8 Ô</span>
                            </a>                                                                          
                        <li class="sidebar-item <?php if($active == "random_freefire") {
                        echo 'active';  
                        } ?> has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Random FreeFire</span>
                            </a>
                            <ul class="submenu <?php if($active == "random_freefire") {
                        echo 'active';  
                        } ?>">
                                <li class="submenu-item  <?php if($active == "random_freefire") {  if($act == "index") {
                        echo 'active';  } }
                         ?>">
                                    <a href="/administrator/?modun=random_freefire&act=index">Danh Sách Gói Random</a>
                                </li>
                                <li class="submenu-item  <?php if($active == "random_freefire") {  if($act == "add_nick") {
                        echo 'active';  } }
                         ?>">
                                    <a href="/administrator/?modun=random_freefire&act=add_nick">Đăng Nick Random</a>
                                </li>
                                <?php 
                                    $quas = mysqli_query($hp->connect_db(), "SELECT * FROM `random_freefire`");
                                    while ($rose = mysqli_fetch_array($quas)) {
                                            ?>
                                       <li class="submenu-item <?php if($active == "random_freefire") {  if($cname == $rose['cname']) {
                        echo 'active';  } }
                         ?>">
                                    <a href="/administrator/list_acc_random/<?php echo $rose['cname'];?>"><?php echo $rose['name'];?></a>
                                </li>
                                    <?php
                                        }
                                    ?>
                              
                            </ul>
                        </li>


                        <li class="sidebar-item <?php if($active == "giftcode") {
                        echo 'active';  
                        } ?> ">
                            <a href="/administrator/?modun=giftcode&act=index" class='sidebar-link'>
                                <i class="bi bi-hexagon-fill"></i>
                                <span>GiftCode Giảm Giá</span>
                            </a>
                           </li>
                      
<?php if(mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `status`='2'")) > 0) $new = '<span class="badge bg-warning">'.mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `status`='2'")).'</span>'; ?>
                        <li class="sidebar-item <?php if($active == "rut_kim_cuong") {
                        echo 'active';  
                        } ?>">
                            <a href="/administrator/?modun=rut_kim_cuong&act=index" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Duyệt Đơn Rút<?=$new;?></span>
                            </a>
                        </li>
                        <?php if(mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `napthe` WHERE `status`='2'")) > 0) $new2 = '<span class="badge bg-warning">'.mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `napthe` WHERE `status`='2'")).'</span>'; ?>
 <li class="sidebar-item <?php if($active == "thenap") {
                        echo 'active';  
                        } ?>">
                            <a href="/administrator/thenap" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Thẻ/ATM/Ví Nạp<?=$new2;?></span>
                            </a>
                        </li>
                        <li class="sidebar-item <?php if($active == "account") {
                        echo 'active';  
                        } ?>">
                            <a href="/administrator/users" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Thành Viên</span>
                            </a>
                        </li>
  <li class="sidebar-title">Seting Website</li>
                      

                

                        <li class="sidebar-item <?php if($active == "web_setting") {
                        echo 'active';  
                        } ?> has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-pentagon-fill"></i>
                                <span>Cài Đặt Website</span>
                            </a>
                            <ul class="submenu <?php if($active == "web_setting") {
                        echo 'active';  
                        } ?>">
                                <li class="submenu-item <?php if($active == "web_setting") {  if($act == "chung") {
                        echo 'active';  } }
                         ?>">
                                    <a href="/administrator/?modun=web_setting&act=chung">Cài Đặt Chung</a>                                
                                </li>
                                <li class="submenu-item ">
                                    <a href="javascript:void(cc())" >Reset Top Nạp</a>
                                </li>
                            </ul>
                        </li>
 <script type="text/javascript">
                            function cc() {
                                if(confirm('Bạn Có Muốn Reset Top Nạp Không?') == true){
                                    if(confirm('Bạn Có Muốn Reset Top Nạp Không? Hỏi lần thứ 2') == true){
                                        if(confirm('Bạn Có Muốn Reset Top Nạp Không? Lần cuối?') == true){
                                            window.location.href = "/administrator/reset_topnap.php";
                                        }
                                    }
                                }
                            }
                            </script>

                        <li class="sidebar-item ">
                            <a href="/administrator/?modun=update&act=update" class='sidebar-link'>
                                <i class="bi bi-egg-fill"></i>
                                <span>Liên hệ hỗ trợ</span>
                            </a>
                            
                        </li>

                        
                  </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
         <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light ">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                <li class="nav-item dropdown me-1">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-envelope bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Mail</h6>
                                        </li>
                                        <li><a class="dropdown-item" href="#">No new mail</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown me-3">
                                    <a class="nav-link active dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class='bi bi-bell bi-sub fs-4 text-gray-600'></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <h6 class="dropdown-header">Notifications</h6>
                                        </li>
                                        <li><a class="dropdown-item">No notification available</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?=$user['username'];?></h6>
                                            <p class="mb-0 text-sm text-gray-600">Administrator</p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="/administrator/dist/assets/images/faces/1.jpg">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <h6 class="dropdown-header">Hello, <?=$user['username'];?>!</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-person me-2"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i>
                                            Settings</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-wallet me-2"></i>
                                            Wallet</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="/logout"><i
                                                class="icon-mid bi bi-box-arrow-left me-2"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>
            <div id="main-content">