<?php
defined('HUYPLAY') or exit('Restricted Access');
$cname = $_GET['cname'];

 $sql1 = mysqli_query($hp->connect_db(), "SELECT * FROM `nickff` WHERE `status`='1' ORDER BY `time` DESC");
 $sql2 = mysqli_query($hp->connect_db(), "SELECT * FROM `nickff` WHERE `status`='0' ORDER BY `time` DESC");
  $sql3 = mysqli_query($hp->connect_db(), "SELECT * FROM `nicklq` WHERE `status`='1' ORDER BY `time` DESC");
 $sql4 = mysqli_query($hp->connect_db(), "SELECT * FROM `nicklq` WHERE `status`='0' ORDER BY `time` DESC");
  $sql5 = mysqli_query($hp->connect_db(), "SELECT * FROM `nicknro` WHERE `status`='1' ORDER BY `time` DESC");
 $sql6 = mysqli_query($hp->connect_db(), "SELECT * FROM `nicknro` WHERE `status`='0' ORDER BY `time` DESC");
  $sql7 = mysqli_query($hp->connect_db(), "SELECT * FROM `nickpubg` WHERE `status`='1' ORDER BY `time` DESC");
 $sql8 = mysqli_query($hp->connect_db(), "SELECT * FROM `nickpubg` WHERE `status`='0' ORDER BY `time` DESC");

?>


<div class="row">


      <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">DANH SÁCH ACC FREEFIRE ĐANG BÁN</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                               <th>STT</th>
                                               <th>Username</th>
                                               <th>Password</th>
                                               <th>Thời Gian</th>
                                               <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?php 

                          while ($row = mysqli_fetch_array($sql1)) {
                            ?>
<tr>
   <th scope="row">#<?php echo $row['id'];?></th>
   <td><?php echo $row['taikhoan'];?></td>
   <td><?php echo $row['matkhau'];?></td>
   <td><?php echo date('d/m G:i', $row['time']);?></td>
   <td>
             <button onclick="del_ff(<?php echo $row['id'];?>)" type="button" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="fa fa-trash"></i></button>
    </td>
</tr> 


                          <?php
                            }
                          ?>
                          
                          


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


 <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">DANH SÁCH ACC LIÊN QUÂN ĐANG BÁN</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                               <th>STT</th>
                                               <th>Username</th>
                                               <th>Password</th>
                                               <th>Thời Gian</th>
                                               <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?php 

                          while ($row = mysqli_fetch_array($sql3)) {
                            ?>
<tr>
   <th scope="row">#<?php echo $row['id'];?></th>
   <td><?php echo $row['taikhoan'];?></td>
   <td><?php echo $row['matkhau'];?></td>
   <td><?php echo date('d/m G:i', $row['time']);?></td>
   <td>
             <button onclick="del_lq(<?php echo $row['id'];?>)" type="button" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="fa fa-trash"></i></button>
    </td>
</tr> 


                          <?php
                            }
                          ?>
                          
                          


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


 <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">DANH SÁCH ACC NGOC RỒNG ĐANG BÁN</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                               <th>STT</th>
                                               <th>Username</th>
                                               <th>Password</th>
                                               <th>Thời Gian</th>
                                               <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?php 

                          while ($row = mysqli_fetch_array($sql5)) {
                            ?>
<tr>
   <th scope="row">#<?php echo $row['id'];?></th>
   <td><?php echo $row['taikhoan'];?></td>
   <td><?php echo $row['matkhau'];?></td>
   <td><?php echo date('d/m G:i', $row['time']);?></td>
   <td>
             <button onclick="del_nro(<?php echo $row['id'];?>)" type="button" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="fa fa-trash"></i></button>
    </td>
</tr> 


                          <?php
                            }
                          ?>
                          
                          


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
 <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">DANH SÁCH ACC PUBG ĐANG BÁN</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                               <th>STT</th>
                                               <th>Username</th>
                                               <th>Password</th>
                                               <th>Thời Gian</th>
                                               <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?php 

                          while ($row = mysqli_fetch_array($sql7)) {
                            ?>
<tr>
   <th scope="row">#<?php echo $row['id'];?></th>
   <td><?php echo $row['taikhoan'];?></td>
   <td><?php echo $row['matkhau'];?></td>
   <td><?php echo date('d/m G:i', $row['time']);?></td>
   <td>
             <button onclick="del_pubg(<?php echo $row['id'];?>)" type="button" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="fa fa-trash"></i></button>
    </td>
</tr> 


                          <?php
                            }
                          ?>
                          
                          


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


      <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">DANH SÁCH ACC ĐÃ BÁN</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                       <th>STT</th>
                                       <th>Username</th>
                                       <th>Game</th>
                                       <th>Người Mua</th>
                                       <th>Thời Gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?php 

                          while ($row2 = mysqli_fetch_array($sql2)) {
                            ?>
<tr>
   <th scope="row">#<?php echo $row2['id'];?></th>
   <td><?php echo $row2['taikhoan'];?></td>
   <td>Free Fire</td>
   <td><?php echo $row2['nguoimua'];?></td>
   <td><?php echo date('d/m G:i', $row2['time']);?></td>
</tr> 


                          <?php
                            }
                          ?>

 <?php 

                          while ($row2 = mysqli_fetch_array($sql4)) {
                            ?>
<tr>
   <th scope="row">#<?php echo $row2['id'];?></th>
   <td><?php echo $row2['taikhoan'];?></td>
   <td>Liên Quân</td>
   <td><?php echo $row2['nguoimua'];?></td>
   <td><?php echo date('d/m G:i', $row2['time']);?></td>
</tr> 


                          <?php
                            }
                          ?>
                          
                           <?php 

                          while ($row2 = mysqli_fetch_array($sql6)) {
                            ?>
<tr>
   <th scope="row">#<?php echo $row2['id'];?></th>
   <td><?php echo $row2['taikhoan'];?></td>
   <td>Ngọc Rồng</td>
   <td><?php echo $row2['nguoimua'];?></td>
   <td><?php echo date('d/m G:i', $row2['time']);?></td>
</tr> 


                          <?php
                            }
                          ?>
                          
                           <?php 

                          while ($row2 = mysqli_fetch_array($sql8)) {
                            ?>
<tr>
   <th scope="row">#<?php echo $row2['id'];?></th>
   <td><?php echo $row2['taikhoan'];?></td>
   <td>Pubg</td>
   <td><?php echo $row2['nguoimua'];?></td>
   <td><?php echo date('d/m G:i', $row2['time']);?></td>
</tr> 


                          <?php
                            }
                          ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


</div>





<script type="text/javascript">
function del_ff(id) {
   if (confirm('Bạn có chắc muốn xóa acc freefire này?')) {
      location.href = '/adminisrtator/?modun=accff&act=delete&id='+id;
    } else {
      alert('Hãy suy nghĩ kĩ trước khi xóa gì đó nhé!');
    }
}

function del_lq(id) {
   if (confirm('Bạn có chắc muốn xóa acc liên quân này?')) {
      location.href = '/adminisrtator/?modun=acclq&act=delete&id='+id;
    } else {
      alert('Hãy suy nghĩ kĩ trước khi xóa gì đó nhé!');
    }
}

function del_nro(id) {
   if (confirm('Bạn có chắc muốn xóa acc ngọc rồng này?')) {
      location.href = '/adminisrtator/?modun=accnro&act=delete&id='+id;
    } else {
      alert('Hãy suy nghĩ kĩ trước khi xóa gì đó nhé!');
    }
}

function del_pubg(id) {
   if (confirm('Bạn có chắc muốn xóa acc pubg mobile này?')) {
      location.href = '/adminisrtator/?modun=accpubg&act=delete&id='+id;
    } else {
      alert('Hãy suy nghĩ kĩ trước khi xóa gì đó nhé!');
    }
}
</script>