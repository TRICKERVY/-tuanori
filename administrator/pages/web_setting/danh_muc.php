<?php
defined('HUYPLAY') or exit('Restricted Access');
//echo $hp->hienthi_game('banaccff');
function option_default($value) {
    switch ($value) {
        case '1':
            return '<option value="1">Đang Bật</option>';
            break;
        case '0':
            return '<option value="0">Đang Tắt</option>';
            break;
    }
}

$napthe_mb = option_default($hp->hienthi_web('napthe_mobile'));
$napthe_pc = option_default($hp->hienthi_web('napthe_pc'));
$vongquay = option_default($hp->hienthi_web('vongquay'));
$bannick = option_default($hp->hienthi_web('bannick'));
$dichvu = option_default($hp->hienthi_web('dichvu'));
$random = option_default($hp->hienthi_web('random'));




if(isset($_POST['submit'])) {

    $data = array(
        'napthe_mobile' => $_POST['napthe_mobile'],
        'napthe_pc' => $_POST['napthe_pc'],
        'vongquay' => $_POST['vongquay'],
        'bannick' => $_POST['bannick'],
        'dichvu' => $_POST['dichvu'],
        'random' => $_POST['random']        
    );

    mysqli_query($hp->connect_db(), "UPDATE `settings` SET `value`='".mysqli_escape_string($hp->connect_db(), json_encode($data))."' WHERE `key`='hienthi_web'"); 
    echo '<div class="alert alert-success"><strong>CẬP NHẬT THÀNH CÔNG!</strong></div>';
    echo '<meta http-equiv=refresh content="1; URL=">';
}
?>



                            <form method="post" action="">
                <div class="row">


                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">NẠP THẺ & BANNER</h4>
                                <form class="mt-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">NẠP THẺ & BANNER (mobile)</label>
                                        <select name="napthe_mobile" class="form-control" id="exampleFormControlSelect1">
                                            <?php echo $napthe_mb;?>
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">NẠP THẺ & BANNER (PC)</label>
                                        <select name="napthe_pc" class="form-control" id="exampleFormControlSelect1">
                                            <?php echo $napthe_pc;?>
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
                                        </select>
                                    </div>


                            </div>
                        </div>
                    </div>



                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Vòng Quay</h4>
                                <form class="mt-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Hiển Thị</label>
                                        <select name="vongquay" class="form-control" id="exampleFormControlSelect1">
                                            <?php echo $vongquay;?>
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Bán Nick</h4>
                                <form class="mt-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Hiển Thị</label>
                                        <select name="bannick" class="form-control" id="exampleFormControlSelect1">
                                            <?php echo $bannick;?>
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div>



                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title"> Dịch Vụ</h4>
                                <form class="mt-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Hiển Thị</label>
                                        <select name="dichvu" class="form-control" id="exampleFormControlSelect1">
                                            <?php echo $dichvu;?>
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div>





                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">  Random Freefire</h4>
                                <form class="mt-4">
                                    <div class="form-group mb-4">
                                        <label for="exampleFormControlSelect1">Hiển Thị</label>
                                        <select name="random" class="form-control" id="exampleFormControlSelect1">
                                             <?php echo $random;?>
                                            <option value="1">Bật</option>
                                            <option value="0">Tắt</option>
                                        </select>
                                    </div>
                            </div>
                        </div>
                    </div>



                            <div class="col-md-12"> 
                                        <center><button type="submit" name="submit" class="btn waves-effect waves-light btn-lg btn-rounded btn-primary">CẬP NHẬT</button></center>
                            </div>


                            </form>
                </div>















