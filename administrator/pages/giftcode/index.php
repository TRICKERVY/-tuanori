<?php
defined('HUYPLAY') or exit('Restricted Access');
$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);


 $sql = mysqli_query($hp->connect_db(), "SELECT * FROM `giftcode` WHERE `status`='true' ORDER BY `time` DESC LIMIT $start, $kmess");
 $sql2 = mysqli_query($hp->connect_db(), "SELECT * FROM `giftcode` WHERE `status`='false' ORDER BY `time` DESC LIMIT $start, $kmess");
 $tong1 = mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `giftcode` WHERE `status`='true'"));
 $tong2 = mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `giftcode` WHERE `status`='false'"));
?>

<?php 
if(isset($_POST['submit'])) {

$giftcode = $_POST['giftcode'];
$percent = intval($_POST['percent']);
$action = $_POST['action'];
$expire = intval($_POST['expire']);
$time = time();
$expire_time = $time + $expire;

    if($giftcode && $percent && $action && $expire) {

        mysqli_query($hp->connect_db(), "INSERT INTO `giftcode` (`username`, `action`, `giftcode`, `percent`, `status`, `expire`, `time`) VALUES (NULL, '".$action."', '".$giftcode."', '".$percent."', 'true', '".$expire_time."', '".time()."')");

echo '<div class="alert alert-info bg-info text-white border-0" role="alert"> Đăng GiftCode thành công</div>
</div>';
echo '<meta http-equiv=refresh content="1; URL=">';

    }else {
echo '<div class="alert alert-danger bg-danger text-white border-0" role="alert"><strong>Lỗi!</strong> Vui lòng nhập đầy đủ thông tin!</div>';        
    }

}
?>



                            <form method="post" action="">
<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title">Đăng GIFTCODE</h3>

<div class="row">

                                            <div class="col-md-3 col-lg-3 col-xs-12">
                                                <label>Mã GiftCode:</label>
                                                <div class="form-group">
                                                     <input name="giftcode" type="text" class="form-control" placeholder="Nhập Mã GifCode">
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-lg-3 col-xs-12">
                                                <label>Giảm Giá (% Tổng Tiền):</label>
                                                <div class="form-group">
                                                     <input name="percent" type="number" class="form-control" placeholder="Nhập Số % Tiền Giảm....">
                                                </div>
                                            </div>



                                            <div class="col-md-3 col-lg-3 col-xs-12">
                                                <label>Loại GiftCode :</label>
                                                <div class="form-group">
                                                   <select name="action" class="form-control show-tick" tabindex="-98">
                                                      <option value="">-- Vui Lòng Chọn Loại GiftCode --</option>
                                                      <option value="mua_acc">Mua Account Freefire</option>
                                                  </select>
                                                </div>
                                            </div>


                                            <div class="col-md-3 col-lg-3 col-xs-12">
                                                <label>Hết Hạn :</label>
                                                <div class="form-group">
                                                  <select name="expire" class="form-control show-tick" tabindex="-98">
                                                      <option value="">-- Vui Lòng Chọn Thời Gian--</option>
                                                      <option value="3600">1 Giờ</option>
                                                      <option value="86400">1 Ngày</option>
                                                      <option value="259200">3 Ngày</option>
                                                      <option value="604800">1 Tuần</option>
                                                      <option value="2592000">1 Tháng</option>
                                                      <option value="31536000">1 Năm</option>
                                                  </select>
                                                </div>
                                            </div>





                            <div class="col-md-12"> 
                                <center><button type="submit" name="submit" class="btn btn-info">ĐĂNG GIFTCODE</button></center>
                            </div>


</div>


                            </div>
                        </div>
                    </div>
</div>



</form>






<div class="row">


      <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">GIFTCODE ĐANG HOẠT ĐỘNG</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                           <th>ID #</th>
                                           <th>GiftCode</th>
                                           <th>Loại GiftCode</th>
                                           <th>Giảm (%)</th>
                                           <th>Hết Hạn</th>
                                           <th>Thời Gian</th>
                                           <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          

  <?php
    while ($row = mysqli_fetch_array($sql)) {
            switch ($row['action']) {
                case 'mua_acc':
                    $action = 'Mua Nick FreeFire';
                    break;
            }

      ?>

    <tr>
       <th scope="row">#<?php echo $row['id'];?></th>
       <td><?php echo $row['giftcode'];?></td>
           <td><?php echo $action;?></td>
       <td><?php echo number_format($row['percent']);?> <sup>%</sup></td>
           <td><?php echo date('H:i d/m', $row['expire']);?></td>
       <td><?php echo date('H:i d/m', $row['time']);?></td>
    <td>
       <button onclick="del(<?php echo $row['id'];?>)" type="button" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="fa fa-trash"></i></button>
    </td>
    </tr> 

    <?php
    }
    ?>

                                    </tbody>
                                </table>
                            </div>

<?php
if ($tong1 > $kmess){
    echo '<center>' . $hp->phantrang('/admin/giftcode/', $start, $tong1, $kmess) . '</center>';
}
?>

                        </div>
                    </div>










      <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">GIFTCODE ĐÃ SỬ DỤNG</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                         <th>ID #</th>
                                         <th>Người Mua</th>
                                         <th>GiftCode</th>
                                         <th>Loại GiftCode</th>
                                         <th>Giảm (%)</th>
                                         <th>Thời Gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                            
  <?php
    while ($row = mysqli_fetch_array($sql2)) {
      ?>

        <tr>
           <th scope="row">#<?php echo $row['id'];?></th>
           <td><?php echo $row['username'];?></td>
           <td><?php echo $row['giftcode'];?></td>
           <td><?php echo $action;?></td>
           <td><?php echo number_format($row['percent']);?> <sup>%</sup></td>
           <td><?php echo date('H:i d/m', $row['time']);?></td>
        </tr> 

    <?php
    }
    ?>
                                    </tbody>
                                </table>
                            </div>
<?php
if ($tong2 > $kmess){
  echo '<center>' . $hp->phantrang('/admin/homthinhbian/', $start, $tong2, $kmess) . '</center>';
}
?>


                        </div>
                    </div>


</div>





<script type="text/javascript">
function del(id, name) {
   if (confirm('Bạn có chắc muốn xóa GifCode này?')) {
      location.href = '?modun=giftcode&act=delete&id='+id;
    } else {
      alert('Hãy suy nghĩ kĩ trước khi xóa gì đó nhé!');
    }
}
</script>







