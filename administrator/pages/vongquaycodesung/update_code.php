<?php
if(isset($_POST['submit'])) {

      if($_POST['item'] && $_POST['code']){

    $prefix = 'item_';
    $row = $prefix.$_POST['item'];

$cmd = "UPDATE `vongquay_codesung_gift` SET
        `".$row."` = '".$_POST['code']."'
        ";

         mysqli_query($hp->connect_db(), $cmd);


        echo '<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">Chỉnh sửa thành công</div>';
        echo '<meta http-equiv=refresh content="1; URL=">';
    }else{
        echo '<div class="alert alert-danger alert-dismissible bg-primary text-white border-0 fade show" role="alert">Vui lòng nhập đủ thông tin</div>';
    }
}
?>





                            <form method="POST">
<div class="row">
                    <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title"><b>VÒNG QUAY CODE SÚNG</b></h3>


                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                                <label>Ak47 Giác Đấu</label>
                                                <div class="form-group">
                                                    <select name="item" class="form-control">

                                                        <option value="1">Ak47 Giác Đấu</option>
                                                        <option value="2">Scar Titan</option>
                                                        <option value="3">Thêm 30% Trúng</option>
                                                        <option value="4">M1014 Địa Ngục</option>
                                                        <option value="5">Mp40 Sấm Sét</option>
                                                        <option value="6">Ak47 Tình Yêu</option>
                                                        <option value="7">Ak47 Hỏa Kỳ Lân</option>
                                                        <option value="8">XM8 Cá Mập Vàng</option>

                                                     </select>
                                                </div>
                                            </div>



                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                                <label>CODE SÚNG TẠI ĐÂY !</label>
                                                <div class="form-group">
                                                    <input type="text" name="code" id="info" rows="9" placeholder="Update code từng loại tại đây" class="form-control">
                                                </div>
                                            </div>



                            <div class="col-md-12"> 
                                <center><button type="submit" name="submit" class="btn btn-info">Cập Nhật</button></center>
                            </div>


</div>


                            </div>
                        </div>

                            </form>



      <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Danh Sách Code Súng</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                           <th>Loại Code</th>
                                           <th>Mã Code</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php
$try = mysqli_fetch_assoc(mysqli_query($hp->connect_db(), "SELECT * FROM `vongquay_codesung_gift` LIMIT 0,1")); ?>

<tr>
   <td>Ak47 Giác Đấu</td>
   <td><?php echo $try['item_1'];?></td>
</tr> 
<tr>
   <td>Scar Titan</td>
   <td><?php echo $try['item_2'];?></td>
</tr> 
<tr>
   <td>Thêm 30% Trúng</td>
   <td><?php echo $try['item_3'];?></td>
</tr> 
<tr>
   <td>M1014 Địa Ngục</td>
   <td><?php echo $try['item_4'];?></td>
</tr> 
<tr>
   <td>Mp40 Sấm Sét</td>
   <td><?php echo $try['item_5'];?></td>
</tr> 
<tr>
   <td>Ak47 Tình Yêu</td>
   <td><?php echo $try['item_6'];?></td>
</tr> 
<tr>
   <td>Ak47 Hỏa Kỳ Lân</td>
   <td><?php echo $try['item_7'];?></td>
</tr> 
<tr>
   <td>XM8 Cá Mập Vàng</td>
   <td><?php echo $try['item_8'];?></td>
</tr> 


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

















</div>