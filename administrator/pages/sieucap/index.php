<?php
defined('HUYPLAY') or exit('Restricted Access');
?>

<?php

     //lấy tỷ lệ vòng quay bingo
    $_bingo = mysqli_fetch_assoc(mysqli_query($hp->connect_db(), "SELECT * FROM `setting_sieucap`"));
    $item_1 = $_bingo['item_1'];
    $item_2 = $_bingo['item_2'];
    $item_3 = $_bingo['item_3'];
    $item_4 = $_bingo['item_4'];
    $giatien = $_bingo['giatien']; 



if(isset($_POST['submit'])) {

    $item_1s = $_POST["item_1"];
    $item_2s = $_POST["item_2"];
    $item_3s = $_POST["item_3"];
    $item_4s = $_POST["item_4"];
    $giatien = $_POST["giatien"];

      if(
       $item_1s ||
       $item_2s || 
       $item_3s || 
       $item_4s || 
       $giatien
   ){
$cmd = "UPDATE `setting_sieucap` SET
        `item_1` = '$item_1s',
        `item_2` = '$item_2s',
        `item_3` = '$item_3s',
        `item_4` = '$item_4s',
        `giatien` = '$giatien'
        ";

         mysqli_query($hp->connect_db(), $cmd);


        echo '<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">Chỉnh sửa thành công!</b></div>';
                echo '<meta http-equiv=refresh content="1; URL=">';
    }else{
        echo '<div class="alert alert-primary alert-dismissible bg-primary text-white border-0 fade show" role="alert">Vui lòng nhập đủ thông tin</b></div>';
    }
}
?>


                            <form method="POST">

    <div class="row">


                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">100 Kim Cương</h4>
                                    <div class="form-group">
                                        <input type="text" id="name" name="item_1" class="form-control" value="<?php echo $item_1;?>">
                                    </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">3000 Kim Cương</h4>
                                    <div class="form-group">
                                        <input type="text" id="name" name="item_2" class="form-control" value="<?php echo $item_2;?>">
                                    </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">15000 Kim Cương</h4>
                                    <div class="form-group">
                                        <input type="text" id="name" name="item_3" class="form-control" value="<?php echo $item_3;?>">
                                    </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">8000 Kim Cương</h4>
                                    <div class="form-group">
                                        <input type="text" id="name" name="item_4" class="form-control" value="<?php echo $item_4;?>">
                                    </div>
                            </div>
                        </div>
                    </div>




                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Số Tiền Mỗi Lần Quay</h4>
                                    <div class="form-group">
                                        <input type="text" id="name" name="giatien" class="form-control" value="<?php echo $giatien;?>">
                                    </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">xxx</h4>
                                    <div class="form-group">
                                        <input type="text" id="name" name="" class="form-control" readonly="">
                                    </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-4 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">xxx</h4>
                                    <div class="form-group">
                                        <input type="text" id="name" name="" class="form-control" readonly="">
                                    </div>
                            </div>
                        </div>
                    </div>


              <div class="text-center "><button type="submit" name="submit" class="btn btn-primary waves-effect">
                                        <i class="fa fa-cogs"></i>
                                        <span>Cập Nhập</span>
                                    </button></div>



        </div>
                            </form>

