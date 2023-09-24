<?php
 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$hp = new System;
$user = $hp->user();

?>

            <div class="page-heading">
                <center><h3>QUẢN TRỊ HỆ THỐNG </h3></center>
            </div>
            <h5>Thống Kê Hôm Nay</h5>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Lượt Truy Cập</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Đăng Ký</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $hp->thong_ke_today('user');?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                   <i class="fas fa-credit-card"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Thẻ Nạp</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $hp->thong_ke_today('napthedung');?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Thu Nhập</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo number_format($hp->thong_ke_today('thunhaphomnay'));?>đ</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <BR>
                             <h5>Tổng Thống Kê</h5>
                         <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Lượt Truy Cập</h6>
                                                <h6 class="font-extrabold mb-0">112.000</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Đăng Ký</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $hp->thong_ke_he_thong('user');?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="fas fa-credit-card"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Thẻ Nạp</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo $hp->thong_ke_he_thong('napthedung');?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="fas fa-money-bill-wave"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Thu Nhập</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo number_format($hp->thong_ke_he_thong('thunhap'));?>đ</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Giao Dịch Gần Đây</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                            <th>Thời Gian</th>
                                            <th>Người Dùng</th>
                                            <th>Hoạt Động</th>
                                            <th>Mô Tả</th>
                                        </tr>
                                                </thead>
                                                <tbody>
<?php 
$sql = mysqli_query($hp->connect_db(), "SELECT * FROM `user_history_system` ORDER BY `time` DESC LIMIT 0,5");
    while ($row = mysqli_fetch_array($sql)) {
        $is_new = $row['time'] + 300;
        if($is_new > time()) $new = 'class="active"'; else $new = '';
     ?>
                                         <tr>
                                             
                                          <td class="col-auto">
                                                            <p class=" mb-0"><?php echo date('H:i d/m', $row['time']);?></td>
                                          
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="dist/assets/images/faces/5.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0"><?php echo $row['username'];?></p>
                                                            </div>
                                                        </td>
                                                        
                                           <td class="col-auto">
                                                            <p class=" mb-0"><?php echo $row['action'];?></td>
                                                            <td class="col-auto">
                                                            <p class=" mb-0"><?php echo $row['mota'];?>
                                                        </td>
                                        </tr>
<?php } ?>

                                    </tbody>
                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
                   
                                 
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Url Access</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                           <th>Thời Gian</th>
                                            <th>Người Dùng</th>
                                            <th>Access</th>
                                            <th>IP</th>
                                        </tr>
                                                </thead>
                                                <tbody>

            <?php
            $array = $hp->parse_access_url();

            for($i=1;$i<=10;$i++) {
                
                ?>
                                         <tr>
                                             
                                          <td class="col-auto">
                                                            <p class=" mb-0"><?php echo $hp->time_ago($array[$i]['time']); ?></td>
                                          
                                                        <td class="col-3">
                                                            <div class="d-flex align-items-center">
                                                                <div class="avatar avatar-md">
                                                                    <img src="dist/assets/images/faces/5.jpg">
                                                                </div>
                                                                <p class="font-bold ms-3 mb-0"><?php echo $array[$i]['username']; ?></p>
                                                            </div>
                                                        </td>
                                                        
                                           <td class="col-auto">
                                                            <p class=" mb-0"><?php echo $array[$i]['url']; ?></td>
                                                            <td class="col-auto">
                                                            <p class=" mb-0"><?php echo $array[$i]['ip']; ?>
                                                        </td>
                                        </tr>
<?php } ?>

                                    </tbody>
                                </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                  
 
                   
                   
                   
                                       <div class="col-12 col-lg-3">
                        <div class="card">
                            <div class="card-body py-4 px-5">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl">
                                        <img src="dist/assets/images/faces/1.jpg" alt="Face 1">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold"><?php echo $user['name'];?></h5>
                                        <h6 class="text-muted mb-0">@<?php echo $user['username'];?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Thành Viên Quản Trị</h4>
                            </div>
                            <div class="card-content pb-4">
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="dist/assets/images/faces/4.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Hank Schrader</h5>
                                        <h6 class="text-muted mb-0">@johnducky</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="dist/assets/images/faces/5.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">Dean Winchester</h5>
                                        <h6 class="text-muted mb-0">@imdean</h6>
                                    </div>
                                </div>
                                <div class="recent-message d-flex px-4 py-3">
                                    <div class="avatar avatar-lg">
                                        <img src="dist/assets/images/faces/1.jpg">
                                    </div>
                                    <div class="name ms-4">
                                        <h5 class="mb-1">John Dodol</h5>
                                        <h6 class="text-muted mb-0">@dodoljohn</h6>
                                    </div>
                                </div>
                                <div class="px-4">
                                    <button class='btn btn-block btn-xl btn-light-primary font-bold mt-3'>Start
                                        Conversation</button>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4>Visitors Profile</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>