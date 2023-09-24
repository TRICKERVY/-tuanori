<?php
defined('HUYPLAY') or exit('Restricted Access');
$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $sql = mysqli_query($hp->connect_db(), "SELECT * FROM `rut_vat_pham` ORDER BY `time` DESC LIMIT $start, $kmess");
 $sql2 = mysqli_query($hp->connect_db(), "SELECT * FROM `rut_vat_pham`  ORDER BY `time` DESC LIMIT $start, $kmess");
 $tong1 = mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `rut_vat_pham` "));
 $tong2 = mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `rut_vat_pham` "));
?>



<?php 

if(isset($_POST['accept_all'])) {
        mysqli_query($hp->connect_db(), "UPDATE `rut_vat_pham` SET `status` = '0' WHERE `status` = '2'");

echo '<div class="alert alert-success"> Duyệt Thành công!<meta http-equiv="refresh" content="2"></div>';

    }

if(isset($_POST['accept'])) {
        mysqli_query($hp->connect_db(), "UPDATE `rut_vat_pham` SET `status` = '1' WHERE `id` = '".$_POST['id']."'");

echo '<div class="alert alert-success"> Duyệt Thành công!
    <meta http-equiv="refresh" content="2">
</div>';

    }

if(isset($_POST['not_accept'])) {

        $get_info = mysqli_fetch_assoc(mysqli_query($hp->connect_db(), "SELECT * FROM `rut_vat_pham` WHERE `id`='".$_POST['id']."'"));
        if( $get_info['type'] == 'kc') {
            
        
            // update kimcuong user
        mysqli_query($hp->connect_db(), "UPDATE `users` SET `kimcuong` = `kimcuong` + '".$get_info['vp']."' WHERE `username` = '".$get_info['username']."' ");
            // Update vào lịch sử user
        mysqli_query($hp->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Rút Kim Cương', 'Rút Kim Cương Free Fire', '+".number_format($get_info['vp'])." kc', 'Hoàn Lại ".number_format($get_info['vp'])." cho đơn rút #".$_POST['id']."', '".time()."')");
  }else {
      // update kimcuong user
        mysqli_query($hp->connect_db(), "UPDATE `users` SET `quanhuy` = `quanhuy` + '".$get_info['vp']."' WHERE `username` = '".$get_info['username']."' ");
            // Update vào lịch sử user
        mysqli_query($hp->connect_db(), "INSERT INTO `user_history_system` (`username`, `action`, `action_name`, `sotien`, `mota`, `time`) VALUES ('".$user['username']."', 'Rút Quân Huy', 'Rút Quân Huy Liên Quân', '+".number_format($get_info['vp'])." kc', 'Hoàn Lại ".number_format($get_info['vp'])." cho đơn rút #".$_POST['id']."', '".time()."')");
  }
        mysqli_query($hp->connect_db(), "UPDATE `rut_vat_pham` SET `status` = '0' WHERE `id` = '".$_POST['id']."'");

echo '<div class="alert alert-danger">
    <strong>Error !</strong> Đơn hàng này thất bại hoàn !
    <meta http-equiv="refresh" content="2"> 
</div>';

    }

?>






<div class="row">


      <div class="col-md-12 col-lg-12 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <b>TỔNG SỐ ĐƠN RÚT VẬT PHẨM </b>
                            </div>

                            <!--
                              <center>
                              <form action="" method="post" id="accept_all">
                                <button type="submit" name="accept_all" class="btn bg-deep-purple waves-effect">
                                    <i class="material-icons">done_all</i>
                                    <span>Hủy Tất Cả Đơn Rút</span>
                                </button>
                              </form>                                
                            </center>
                          -->
                        <script type="text/javascript">
                          $("#accept_all").submit(function(e) {
                            if(confirm('Bạn Có Muốn Xóa Tất Cả Đơn Rút không?') == true){
                              if(confirm('Bạn Có Muốn Xóa Tất Cả Đơn Rút không? Hỏi lần thứ 2') == true){
                                if(confirm('Bạn Có Muốn Xóa Tất Cả Đơn Rút không? Lần cuối?') == true){
                                  $("#accept_all").submit();
                                }
                              }
                            }
                          });
                        </script>


                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                       <tr>
                                         <th>STT</th>
                                          <th>Người rút</th>
                                          <th>Loại</th>
                                        
                                         <th>ID GAME/TK</th>
                                         <th>MK</th>
                                         <th>Vật Phẩm</th>
                                         <th>Thời gian</th>
                                         <th>Tình Trạng</th>
                                         <th>Thao tác</th>
                                       </tr>
                                    </thead>
                                    <tbody>

  <?php

    while ($row = mysqli_fetch_array($sql)) {
        if($row['type'] == 'kc') {
            $name="Kim Cương";
            $vp = 'KC';
        }else{
            $name = "Quân Huy";
             $vp = 'QH';
        }
          if($row['status'] == 0) {
            $status = '<p style="color: red;">Thất Bại</p>';
          }else if($row['status'] == 1) {
            $status = '<p style="color: green;">Thành Công</p>';
          }else if($row['status'] == 2) {
            $status = '<p style="color: black;">Chờ Duyệt</p>';
          }
      ?>
<tr>
   <th scope="row">#<?php echo $row['id'];?></th>
    <td><?php echo $row['username'];?></td>
   <td><?php echo $name;?></td>
   
    <?php if($row['type'] == 'kc') { echo'<td>'.$row['idgame'].'</td><td></td>';}else{ echo'<td>'.$row['user'].'</td><td>'.$row['pass'].'</td>'; }?>
   <td><?php echo $row['vp'].' '.$vp;?></td>
   <td><?php echo date('d/m G:i', $row['time']);?></td>
   <td><?php echo $status;?></td>
  
  <?php if($row['status'] == '2') {
  echo'<td>
    <div class="col-md-1 col-sm-1">
    <form action="" method="post">
    <input type="hidden" name="id" value="'.$row['id'].'">
      <button type="submit" name="accept" data-toggle="tooltip" data-placement="top" title="" data-original-title="Duyệt thẻ" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="fa fa-check"></i></button>
    </form>
   </div>
    <div class="col-md-1 col-sm-1">
    <form action="" method="post">
    <input type="hidden" name="id" value="'.$row['id'].'">
      <button type="submit" name="not_accept" data-toggle="tooltip" data-placement="top" title="" data-original-title="Xóa yêu cầu" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="fa fa-times"></i></button>
    </form>
       </div>
   </td>'; }else{ echo'<td></td>'; } ?>
</tr> 
    <?php
    }
    ?>

                                    </tbody>
                                </table>
                            </div>

<?php
if ($tong1 > $kmess){
echo '<center>' . $hp->phantrang('/administrator/rutvatpham/', $start, $tong1, $kmess) . '</center>';
}
?>

                        </div>
                    </div>




</div>