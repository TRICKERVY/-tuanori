<?php
defined('HUYPLAY') or exit('Restricted Access');
$banaccff = $hp->hinhanh_game('banaccff');
$banacclq = $hp->hinhanh_game('banacclq');
$banaccnro = $hp->hinhanh_game('banaccnro');
$banaccpubg = $hp->hinhanh_game('banaccpubg');
$vanmayff = $hp->hinhanh_game('vanmayff');
$homthinhff = $hp->hinhanh_game('homthinhff');
$lattheff = $hp->hinhanh_game('lattheff');
$sieucapff = $hp->hinhanh_game('sieucapff');
$codesungff = $hp->hinhanh_game('codesungff');

if(isset($_POST['submit'])) {

    $data = array(
        'banaccff' => $_POST['banaccff'],
        'banacclq' => $_POST['banacclq'],
        'banaccnro' => $_POST['banaccnro'],
        'banaccpubg' => $_POST['banaccpubg'],
        'vanmayff' => $_POST['vanmayff'],
        'homthinhff' => $_POST['homthinhff'],
        'lattheff' => $_POST['lattheff'],
        'sieucapff' => $_POST['sieucapff'],
        'codesungff' => $_POST['codesungff']

    );

    mysqli_query($hp->connect_db(), "UPDATE `settings` SET `value`='".mysqli_escape_string($hp->connect_db(), json_encode($data))."' WHERE `key`='hinhanh_game'"); 
    echo '<div class="alert alert-success"><strong>CẬP NHẬT THÀNH CÔNG!</strong></div>';
    echo '<meta http-equiv=refresh content="1; URL=">';
}
?>


    

                <div class="row">
                    <div class="col-12">

                        <form action="" method="post">


                        <!-- Row -->
                        <div class="row">


                            <!-- column -->
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?php echo $banaccff;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Bán Acc FreeFire</h4>

                                                <div class="form-group">
                                                    <input type="text" name="banaccff" class="form-control" value="<?php echo $banaccff;?>">
                                                </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->

 <!-- column -->
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?php echo $banacclq;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Bán Acc Liên Quân</h4>

                                                <div class="form-group">
                                                    <input type="text" name="banacclq" class="form-control" value="<?php echo $banacclq;?>">
                                                </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
   <!-- column -->
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?php echo $banaccnro;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Bán Acc Ngọc Rồng</h4>

                                                <div class="form-group">
                                                    <input type="text" name="banaccnro" class="form-control" value="<?php echo $banaccnro;?>">
                                                </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            
                            
                             <!-- column -->
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?php echo $banaccpubg;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">Bán Acc PUBG</h4>

                                                <div class="form-group">
                                                    <input type="text" name="banaccpubg" class="form-control" value="<?php echo $banaccpubg;?>">
                                                </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->
                            
                            
                            <!-- column -->
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?php echo $vanmayff;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">VẬN MAY BINGO</h4>

                                                <div class="form-group">
                                                    <input type="text" name="vanmayff" class="form-control" value="<?php echo $vanmayff;?>">
                                                </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->

                            <!-- column -->
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?php echo $homthinhff;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">HÒM THÍNH FREEFRIRE</h4>

                                                <div class="form-group">
                                                    <input type="text" name="homthinhff" class="form-control" value="<?php echo $homthinhff;?>">
                                                </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->

                            <!-- column -->
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?php echo $lattheff;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">LẬT THẺ MAY MẮN</h4>

                                                <div class="form-group">
                                                    <input type="text" name="lattheff" class="form-control" value="<?php echo $lattheff;?>">
                                                </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->

                            <!-- column -->
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?php echo $sieucapff;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">VÒNG QUAY SIÊU CẤP</h4>

                                                <div class="form-group">
                                                    <input type="text" name="sieucapff" class="form-control" value="<?php echo $sieucapff;?>">
                                                </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->


                            <!-- column -->
                            <div class="col-lg-4 col-md-4 col-xs-12">
                                <!-- Card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="<?php echo $codesungff;?>" alt="Card image cap">
                                    <div class="card-body">
                                        <h4 class="card-title">VÒNG QUAY CODE SÚNG</h4>

                                                <div class="form-group">
                                                    <input type="text" name="codesungff" class="form-control" value="<?php echo $codesungff;?>">
                                                </div>
                                    </div>
                                </div>
                                <!-- Card -->
                            </div>
                            <!-- column -->



                            <div class="col-md-12"> 
                                        <center><button type="submit" name="submit" class="btn waves-effect waves-light btn-lg btn-rounded btn-primary">CẬP NHẬT ẢNH</button></center>
                            </div>



                            </form>


                        </div>
                        <!-- Row -->
                    </div>
                </div>





