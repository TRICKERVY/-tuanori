<?php

defined('HUYPLAY') or exit('Restricted Access');



mysqli_query($hp->connect_db(), "INSERT INTO `nicklq` SET 

    `taikhoan`='$taikhoan',  

    `matkhau`='$matkhau',

    `giatien`='".abs($giatien)."',

    `rank`='$rank', 

    `tuong`='$tuong',

    `dangky`='$dangky',

    `skin`='$skin', 

    `vang`='$ngoc',

    `ngoc`='$vang',

    `noibat`='$noibat',

    `2fa`='$change_2fa',

    `nguoimua` = 'null',

    `status` = '1',

    `time` = '".time()."' ");

?>





<?php 



if(isset($_POST['submit'])) {





$taikhoan = $_POST['taikhoan'];

$matkhau = $_POST['matkhau'];

$giatien = $_POST['giatien'];

$rank = $_POST['rank'];

$nhanvat = $_POST['nhanvat'];

$dangky = $_POST['dangky'];

$pet = $_POST['pet'];

$noibat = $_POST['noibat'];

$change_2fa = $_POST['change_2fa'];





$check = mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT COUNT(*) FROM `nickff` WHERE `taikhoan`='$taikhoan'"), 0);



if($check >= 1){

echo '<div class="alert alert-danger bg-danger text-white border-0" role="alert"><strong>Error!</strong> Tài khoản đã tồn tại trên hệ thống!

</div>';

} else {





mysqli_query($hp->connect_db(), "INSERT INTO `nickff` SET 

    `taikhoan`='$taikhoan',  

    `matkhau`='$matkhau',

    `giatien`='".abs($giatien)."',

    `rank`='$rank', 

    `nhanvat`='$nhanvat',

    `dangky`='$dangky',

    `pet`='$pet', 

    `noibat`='$noibat',

    `2fa`='$change_2fa',

    `nguoimua` = 'null',

    `status` = 'true',

    `time` = '".time()."' 

");



$last_id = mysqli_fetch_assoc(mysqli_query($hp->connect_db(), "SELECT * FROM `nickff` order by `id` desc limit 1"));

$id_new = $last_id['id'];



  // ảnh thumb

$path = $_SERVER["DOCUMENT_ROOT"]."/upload/nickff";



        if ($_FILES["thumb"]["error"] == 0) {

            $arr = explode(".", $_FILES["thumb"]["name"]);

            move_uploaded_file($_FILES["thumb"]["tmp_name"], $path."/thumb/".$id_new.".".end($arr));

        }



       // ảnh thông tin

$dir = $path.'/info/'.$id_new;

if(is_dir($dir) === false) mkdir($dir);



foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {

    $file_name=$_FILES["files"]["name"][$key];

    $file_tmp=$_FILES["files"]["tmp_name"][$key];

    move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key], $dir."/".$key.'.jpg');

}



echo '<div class="alert alert-info bg-info text-white border-0" role="alert"> Đăng bán tài khoản thành công</div>';

echo '<meta http-equiv=refresh content="1; URL=">';



?>





<?php



}

}

?>









                            <form method="POST"  enctype="multipart/form-data">

<div class="row">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-body">

                                <h3 class="card-title"><b>ĐĂNG BÁN TÀI KHOẢN FREEFIRE</b></h3>



<div class="row">



                                            <div class="col-md-4 col-lg-4 col-xs-12">

                                                <label>Tài khoản:</label>

                                                <div class="form-group">

                                                     <input name="taikhoan" type="text" class="form-control" placeholder="Nhập tài khoản ...">

                                                </div>

                                            </div>



                                            <div class="col-md-4 col-lg-4 col-xs-12">

                                                <label>Mật khẩu:</label>

                                                <div class="form-group">

                                                   <input name="matkhau" type="text" class="form-control" placeholder="Nhập mật khẩu ...">



                                                </div>

                                            </div>



                                            <div class="col-md-4 col-lg-4 col-xs-12">

                                                <label>Mã Đăng Nhập Facebook:</label>

                                                <div class="form-group">

                                                    <input name="change_2fa" type="text" class="form-control" placeholder="Nhập mã xác minh 2 bước ...">

                                                </div>

                                            </div>





                                            <div class="col-md-3 col-lg-3 col-xs-12">

                                                <label>Đăng Ký:</label>

                                                <div class="form-group">

                                                     <select name="dangky" class="form-control show-tick" tabindex="-98">

                                                        <option value="0">Facebook</option>

                                                        <option value="1">vkontakte</option>

                                                    </select>

                                                </div>

                                            </div>



                                            <div class="col-md-3 col-lg-3 col-xs-12">

                                                <label>Rank:</label>

                                                <div class="form-group">

                                                    <select name="rank" class="form-control show-tick" tabindex="-98">

                                                        <option value="1">Rank Đồng</option>

                                                        <option value="2">Rank Bạc</option>

                                                        <option value="3">Rank Vàng</option>

                                                        <option value="4">Rank Bạch Kim</option>

                                                        <option value="5">Rank Kim Cương</option>

                                                        <option value="6">Rank Huyền Thoại</option>

                                                        <option value="7">Rank Thách Đấu</option>

                                                    </select>

                                                </div>

                                            </div>







                                            <div class="col-md-3 col-lg-3 col-xs-12">

                                                <label>Nhân Vật:</label>

                                                <div class="form-group">

                                                    <select name="nhanvat" class="form-control show-tick" tabindex="-98">

                                                        <option value="1">Nam</option>

                                                        <option value="2">Nữ</option>

                                                    </select>

                                                </div>

                                            </div>





                                            <div class="col-md-3 col-lg-3 col-xs-12">

                                                <label>Pet:</label>

                                                <div class="form-group">

                                                  <select name="pet" class="form-control show-tick" tabindex="-98">

                                                    <option value="0">Không</option>

                                                    <option value="1">Có</option>

                                                </select>

                                                </div>

                                            </div>







                                            <div class="col-md-3 col-lg-3 col-xs-12">

                                                <label>Thông Tin Nổi Bật:</label>

                                                <div class="form-group">

                                                  <input name="noibat" type="text" class="form-control" placeholder="Nhập thông tin nổi bật ...">

                                                </div>

                                            </div>



                                            <div class="col-md-3 col-lg-3 col-xs-12">

                                                <label>Giá tiền:</label>

                                                <div class="form-group">

                                                  <input name="giatien" type="number" class="form-control" placeholder="Nhập giá card cần bán ...">

                                                </div>

                                            </div>



                                            <div class="col-md-3 col-lg-3 col-xs-12">

                                                <label>Ảnh Mô Tả:</label>

                                                <div class="form-group">

                                                    <input class="currency form-control" id="thumb" type="file" name="thumb" accept="image/*"/>

                                                </div>

                                            </div>



                                            <div class="col-md-3 col-lg-3 col-xs-12">

                                                <label>Ảnh Thông Tin:</label>

                                                <div class="form-group">

                                                    <input class="currency form-control" accept="image/*" id="images" type="file" name="files[]" multiple accept="image/*"/>

                                                </div>

                                            </div>





                            <div class="col-md-12"> 

                                <center><button type="submit" name="submit" class="btn btn-info">Đăng</button></center>

                            </div>





</div>





                            </div>

                        </div>

                    </div>

</div>







                            </form>





