<?php
 // Require Hàm hệ thống
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$hp = new System;
$user = $hp->user();

?>

            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->

                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Thống Kê Hệ Thống!</h3>

            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->






            <div class="card-group">
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $hp->thong_ke_today('user');?></h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Đăng Kí Hôm Nay</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 w-100 text-truncate font-weight-medium"><?php echo $hp->thong_ke_today('napthe');?></h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Thẻ Nạp Hôm Nay
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card border-right">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-dark mb-1 font-weight-medium"><?php echo $hp->thong_ke_today('napthedung');?></h2>
                                    </div>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Thẻ Đúng Hôm Nay</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-dark mb-1 font-weight-medium"><?php echo number_format($hp->thong_ke_today('thunhaphomnay'));?>đ</h2>
                                    <h6 class="text-muted font-weight-normal mb-0 w-100 text-truncate">Thu Nhập Hôm Nay</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-muted"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>





                                <div class="row">
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-primary text-center">
                                                <h1 class="font-light text-white"><?php echo $hp->thong_ke_he_thong('user');?></h1>
                                                <h6 class="text-white">Tổng Thành Viên</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-cyan text-center">
                                                <h1 class="font-light text-white"><?php echo $hp->thong_ke_he_thong('napthe');?></h1>
                                                <h6 class="text-white">Tổng Thẻ Nạp</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-success text-center">
                                                <h1 class="font-light text-white"><?php echo $hp->thong_ke_he_thong('napthedung');?></h1>
                                                <h6 class="text-white">Tổng Thẻ Đúng</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                    <div class="col-md-6 col-lg-3 col-xlg-3">
                                        <div class="card card-hover">
                                            <div class="p-2 bg-danger text-center">
                                                <h1 class="font-light text-white"><?php echo number_format($hp->thong_ke_he_thong('thunhap'));?>đ</h1>
                                                <h6 class="text-white">Tổng Thu Nhập</h6>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Column -->
                                </div>




<div class="row">

<div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Url Access</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
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
                                            <td><?php echo $hp->time_ago($array[$i]['time']); ?></td>
                                            <td><?php echo $array[$i]['username']; ?></td>
                                            <td><?php echo $array[$i]['url']; ?></td>
                                            <td><?php echo $array[$i]['ip']; ?></td>
                                        </tr>
                <?php
                } 
                ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



<div class="row">
<div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Giao Dịch Gần Đây</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Thời Gian</th>
                                            <th>Người Dùng</th>
                                            <th>Hoạt Động</th>
                                            <th>Mô Tả</th>
                                        </tr>
                                    </thead>
                                    <tbody>
<?php 
$sql = mysqli_query($hp->connect_db(), "SELECT * FROM `user_history_system` ORDER BY `time` DESC LIMIT 0,10");
    while ($row = mysqli_fetch_array($sql)) {
        $is_new = $row['time'] + 300;
        if($is_new > time()) $new = 'class="active"'; else $new = '';
     ?>
                                        <tr <?php echo $new;?>>
                                            <td><?php echo date('H:i d/m', $row['time']);?></td>
                                            <td><?php echo $row['username'];?></td>
                                            <td><?php echo $row['action'];?></td>
                                            <td><?php echo $row['mota'];?></td>
                                        </tr>
<?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>



</div>

