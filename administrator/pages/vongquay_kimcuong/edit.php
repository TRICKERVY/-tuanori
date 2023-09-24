<?php 

defined('HUYPLAY') or exit('Restricted Access');

$row = mysqli_fetch_assoc(mysqli_query($hp->connect_db(), "SELECT * FROM `vongquay_kimcuong` WHERE `id`='".$_GET['id']."'"));



if(!$row['id']) die("<center><h1>Không Tìm Thấy Vòng Quay!</center>");



?>







        <?php 



        if(isset($_POST['submit'])) {





                $name = $_POST['name'];

                $giatien = $_POST['giatien'];

                $mota = $_POST['mota'];

              $thumb = $_POST['thumb'];

                $image = $_POST['image'];

                $item = 'text_';

                $kimcuong = 'kimcuong_';

                $tyle = 'tyle_';





                for($i=1;$i<=8;$i++) {

                    $data[] = array(

                        'text' => $_POST[$item.$i],

                        'kimcuong' => $_POST[$kimcuong.$i],

                        'tyle' => $_POST[$tyle.$i]

                    );

                }



                //echo json_encode($data);



                mysqli_query($hp->connect_db(), "UPDATE `vongquay_kimcuong` SET `name` = '".$name."', `mota` = '".$mota."',`thumb` = '".$thumb."', `image` = '".$image."', `giatien` = '".$giatien."' WHERE `id`='".$_GET['id']."'");



                mysqli_query($hp->connect_db(), "UPDATE `vongquay_kimcuong_gift` 

                    SET 

                    `item_1` = '".mysqli_real_escape_string($hp->connect_db(), json_encode($data[0]))."', 

                    `item_2` = '".mysqli_real_escape_string($hp->connect_db(), json_encode($data[1]))."', 

                    `item_3` = '".mysqli_real_escape_string($hp->connect_db(), json_encode($data[2]))."', 

                    `item_4` = '".mysqli_real_escape_string($hp->connect_db(), json_encode($data[3]))."', 

                    `item_5` = '".mysqli_real_escape_string($hp->connect_db(), json_encode($data[4]))."', 

                    `item_6` = '".mysqli_real_escape_string($hp->connect_db(), json_encode($data[5]))."', 

                    `item_7` = '".mysqli_real_escape_string($hp->connect_db(), json_encode($data[6]))."', 

                    `item_8` = '".mysqli_real_escape_string($hp->connect_db(), json_encode($data[7]))."' WHERE `id_vongquay`='".$_GET['id']."'");



                    echo '<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">Update Thành Công Vòng Quay <b>"'.$name.'" Thành Công!</b></div>';



        }



        ?> 







<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Sửa Vòng Quay "<?php echo $row['name'];?>"</h3><br>





            <form action="" onsubmit="return validate()" method="post" enctype="multipart/form-data">

<div class="form-body">

    <div class="row">



                    <div class="col-sm-12 col-md-6 col-lg-6">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Tên Vòng Quay</h4>

                                    <div class="form-group">

                                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên cho vòng quay" value="<?php echo $row['name'];?>">

                                    </div>

                            </div>

                        </div>

                    </div>







                    <div class="col-sm-12 col-md-3 col-lg-3">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Giá tiền mỗi lần quay</h4>

                                    <div class="form-group">

                                        <input type="number" id="giatien" name="giatien" class="form-control" placeholder="Nhập giá mỗi lần quay cho vòng quay" value="<?php echo $row['giatien'];?>">

                                    </div>

                            </div>

                        </div>

                    </div>

                     <div class="col-sm-12 col-md-3 col-lg-3">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Loại</h4>

                                    <div class="form-group">

                                        <select name="type" class="form-control show-tick" tabindex="-98">



           <?php if($row['type'] == 'qh') {

 echo'<option value="qh">Quân Huy</option>

 <option value="kc">Kim Cương</option>';

}else{

  echo'<option value="kc">Kim Cương</option>

 <option value="qh">Quân Huy</option>';   

} ?>

</select>

 </div>

                            </div>

                        </div>

                    </div>



<div class="col-sm-12 col-md-3 col-lg-3">

                                <!-- Card -->

                                <div class="card">

                                    <img class="card-img-top img-fluid" src="<?php echo $row['thumb'];?>" alt="Card image cap">

                                    <div class="card-body">

                                        <h4 class="card-title">Ảnh Thumbnail (hiện ở index)</h4>



                                                <div class="form-group">

                                                    <input type="text" name="thumb" class="form-control" value="<?php echo $row['thumb'];?>">

                                                </div>

                                    </div>

                                </div>

                                <!-- Card -->

                            </div>

                            

                            

<div class="col-sm-12 col-md-3 col-lg-3">

                                <!-- Card -->

                                <div class="card">

                                    <img class="card-img-top img-fluid" src="<?php echo $row['image'];?>" alt="Card image cap">

                                    <div class="card-body">

                                        <h4 class="card-title">Ảnh vòng quay 8 ô</h4>



                                                <div class="form-group">

                                                    <input type="text" name="image" class="form-control" value="<?php echo $row['image'];?>">

                                                </div>

                                    </div>

                                </div>

                                <!-- Card -->

                            </div>

<?php 

$rows = mysqli_fetch_assoc(mysqli_query($hp->connect_db(), "SELECT * FROM `vongquay_kimcuong_gift` WHERE `id_vongquay`='".$_GET['id']."'"));

$item = 'item_';

for($x=1;$x<=8;$x++) {

$items = $rows[$item.$x];



$json = json_decode($items, true);

 ?>







                    <div class="col-sm-12 col-md-3 col-lg-3">

                        <div class="card">

                            <div class="card-body">

                                <center><h4 class="card-title">Thông Số Phần Quà <?php echo $x;?></h4></center>

                                <h4 class="card-title">Text hiện khi quay trúng</h4>

                                    <div class="form-group">

                                        <input type="text" id="text_<?php echo $x;?>" name="text_<?php echo $x;?>" class="form-control" placeholder="Text Hiện Khi Quay Trúng" value="<?php echo $json['text'];?>">

                                    </div>

                                <h4 class="card-title">Giá Trị(Kim Cương)</h4>

                                    <div class="form-group">

                                        <input type="number" id="kimcuong_<?php echo $x;?>" name="kimcuong_<?php echo $x;?>" min="0" class="form-control" placeholder="Kim Cương Trúng" value="<?php echo $json['kimcuong'];?>" required="">

                                    </div>

                                <h4 class="card-title">Tỷ Lệ Trúng(%)</h4>

                                    <div class="form-group">

                                        <input type="number" id="tyle_<?php echo $x;?>" name="tyle_<?php echo $x;?>" min="0" max="100" class="form-control" placeholder="Tỷ Lệ Trúng" value="<?php echo $json['tyle'];?>" required="">

                                    </div>



                            </div>

                        </div>

                    </div>



 <?php } ?>







                    <div class="col-sm-12 col-md-12 col-lg-12">

                        <div class="card">

                            <div class="card-body">

                                <h4 class="card-title">Mô Tả Cho Vòng Quay</h4>

                                    <div class="form-group">

                                        <textarea name="mota" rows="6" class="form-control no-resize" placeholder="Bạn muốn nói gì về vòng quay kim cương này..."><?php echo $row['mota'];?></textarea>

                                    </div>

                            </div>

                        </div>

                    </div>





                                    <div class="form-actions mt-4">

                                        <div class="text-center">

                                            <button type="submit" name="submit" class="btn btn-primary waves-effect">

                                                <i class="fa fa-cogs"></i>

                                                <span>Cập Nhập Vòng Quay</span>

                                            </button>

                                        </div>

                                    </div>











    </div>

</div>





                            </form>





















<script type="text/javascript">

    

function validate(){



  valid = true;



     if($("#name").val() == ''){

        valid = false;

        alert('Thiếu Tên!');

     }else if($("#giatien").val() == '') {

        valid = false;

        alert('Thiếu Giá Tiền!');

     }else {

        



         if($("#text_1").val() == ''){

            valid = false;

            alert('Thiếu Text Phần Quà 1!');

         }else if($("#kimcuong_1").val() == '') {

            valid = false;

            alert('Thiếu Giá Trị 1!');

         }else if ($("#tyle_1").val() == '') {

            valid = false;

            alert('Thiếu Tỷ Lệ 1!');

         }else if($("#text_2").val() == ''){

            valid = false;

            alert('Thiếu Text Phần Quà 2!');

         }else if($("#kimcuong_2").val() == '') {

            valid = false;

            alert('Thiếu Giá Trị 2!');

         }else if ($("#tyle_2").val() == '') {

            valid = false;

            alert('Thiếu Tỷ Lệ 2!');

         }else if($("#text_3").val() == ''){

            valid = false;

            alert('Thiếu Text Phần Quà 3!');

         }else if($("#kimcuong_3").val() == '') {

            valid = false;

            alert('Thiếu Giá Trị 3!');

         }else if ($("#tyle_3").val() == '') {

            valid = false;

            alert('Thiếu Tỷ Lệ 3!');

         }else if($("#text_4").val() == ''){

            valid = false;

            alert('Thiếu Text Phần Quà 4!');

         }else if($("#kimcuong_4").val() == '') {

            valid = false;

            alert('Thiếu Giá Trị 4');

         }else if ($("#tyle_4").val() == '') {

            valid = false;

            alert('Thiếu Tỷ Lệ 4!');

         }else if($("#text_5").val() == ''){

            valid = false;

            alert('Thiếu Text Phần Quà 5!');

         }else if($("#kimcuong_5").val() == '') {

            valid = false;

            alert('Thiếu Giá Trị 5!');

         }else if ($("#tyle_5").val() == '') {

            valid = false;

            alert('Thiếu Tỷ Lệ 5!');

         }else if($("#text_6").val() == ''){

            valid = false;

            alert('Thiếu Text Phần Quà 6!');

         }else if($("#kimcuong_6").val() == '') {

            valid = false;

            alert('Thiếu Giá Trị 6!');

         }else if ($("#tyle_6").val() == '') {

            valid = false;

            alert('Thiếu Tỷ Lệ 6!');

         }else if($("#text_7").val() == ''){

            valid = false;

            alert('Thiếu Text Phần Quà 7!');

         }else if($("#kimcuong_7").val() == '') {

            valid = false;

            alert('Thiếu Giá Trị 7!');

         }else if ($("#tyle_7").val() == '') {

            valid = false;

            alert('Thiếu Tỷ Lệ 7!');

         }else if($("#text_8").val() == ''){

            valid = false;

            alert('Thiếu Text Phần Quà 8!');

         }else if($("#kimcuong_8").val() == '') {

            valid = false;

            alert('Thiếu Giá Trị 8!');

         }else if ($("#tyle_8").val() == '') {

            valid = false;

            alert('Thiếu Tỷ Lệ 8!');

         }else {

             valid = true;

         }







     }



    return valid //true or false

}



</script>