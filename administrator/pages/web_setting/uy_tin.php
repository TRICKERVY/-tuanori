<?php 
defined('HUYPLAY') or exit('Restricted Access');
$html_uytin = $hp->settings('html_uytin');


if(isset($_POST['submit'])) {
$_html_uytin = json_encode(array('html_uytin'=> $_POST['html_uytin'], 'time'=> $_POST['html_uytin_time']));
   
 mysqli_query($hp->connect_db(), "UPDATE `settings` SET `value` = '".mysqli_escape_string($hp->connect_db(), $_html_uytin)."' WHERE `key` = 'html_uytin'");
 
        echo '<div class="alert alert-success fade in alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a><strong>Success!</strong> Chỉnh sửa thành công</div>';
        echo '<meta http-equiv="refresh" content="1;URL=" /> ';
}


?>



<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>
                            <form method="post" action="">
                <div class="row">




<div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Chỉnh sửa html trang uy tín shop:</h4>
                                    <div class="form-group">
                                        
                                        <textarea class="form-control" name="html_uytin" rows="18"><?php echo htmlentities($html_uytin['html_uytin']);?></textarea>
                                    </div>
                            </div>
                        </div>
</div>


 <script>
                        CKEDITOR.replace( 'html_uytin' );
                </script>

<input name="html_uytin_time" type="hidden" class="form-control" value="<?php echo $html_uytin['time'];?>">


                            <div class="col-md-12"> 
                                        <center><button type="submit" name="submit" class="btn waves-effect waves-light btn-lg btn-rounded btn-primary">CẬP NHẬT</button></center>
                            </div>


                            </form>
                </div>






