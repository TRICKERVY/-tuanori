<?php
defined('HUYPLAY') or exit('Restricted Access');
?>
        <?php 


        if(isset($_POST['submit'])) {


                $name = $_POST['name'];
                $mota = $_POST['mota'];
                $tt_1 = $_POST['tt_1'];
                $tt_2 = $_POST['tt_2'];
                $tt_3 = $_POST['tt_3'];
                $tt_4 = $_POST['tt_4'];

               
                


                $time = time();
                mysqli_query($hP->connect_db(), "INSERT INTO `bannick` (`id`, `name`, `mota`, `sodu`, `sudung`, `tt_1`, `tt_2`, `tt_3`, `tt_4`, `time`) VALUES (NULL, '".$name."', '".$mota."', '0', '0', '".$tt_1."', '".$tt_2."', '".$tt_3."', '".$tt_4."', '".$time."')");

                $last_id = mysqli_fetch_assoc(mysqli_query($hP->connect_db(), "SELECT * FROM `bannick` order by `id` desc limit 1"));

             
                   
                $path = $_SERVER["DOCUMENT_ROOT"]."/upload/bannick";
                    // ảnh thumb
                    if ($_FILES["thumb"]["error"] == 0) {
                        $arr = explode(".", $_FILES["thumb"]["name"]);
                        move_uploaded_file($_FILES["thumb"]["tmp_name"], $path."/thumb/".$last_id['id'].".".end($arr));
                    }
                   

                    echo '<div class="alert alert-info bg-info text-white border-0" role="alert">Thêm chuyên mục <b>"'.$name.'" Thành Công!</b></div>';

        }

        ?>  



<h3 class="page-title text-truncate text-dark font-weight-medium mb-1">Thêm Chuyên Mục Game</h3><br>



            <form action="" onsubmit="return validate()" method="post" enctype="multipart/form-data">
<div class="form-body">
    <div class="row">

                    <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Tên Game</h4>
                                    <div class="form-group">
                                        <input type="text" id="name" name="name" class="form-control" placeholder="Nhập tên cho chuyên mục">
                                    </div>
                            </div>
                        </div>
                    </div>


                   <div class="col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Ảnh Thumbnail (hiện ở index)</h4>
                                    <div class="form-group">
                                        <input class="currency form-control" id="thumb" type="file" name="thumb" accept="image/*">
                                    </div>
                            </div>
                        </div>
                    </div>

 <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thông tin 1:</h4>
                                    <div class="form-group">
                                        <input type="text" id="tt_1" name="tt_1" class="form-control" placeholder="Nhập thông tin 1">
                                    </div>
                            </div>
                        </div>
                    </div>
                 
                 
                 <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thông tin 2:</h4>
                                    <div class="form-group">
                                        <input type="text" id="tt_2" name="tt_2" class="form-control" placeholder="Nhập thông tin 2">
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thông tin 3:</h4>
                                    <div class="form-group">
                                        <input type="text" id="tt_3" name="tt_3" class="form-control" placeholder="Nhập thông tin 3">
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-md-3 col-lg-3">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Thông tin 4:</h4>
                                    <div class="form-group">
                                        <input type="text" id="tt_4" name="tt_4" class="form-control" placeholder="Nhập thông tin 4">
                                    </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Mô Tả Cho Chuyên Mục</h4>
                                    <div class="form-group">
                                        <textarea name="mota" rows="6" class="form-control no-resize" placeholder="Bạn muốn nói gì về chuyên mục kim cương này..."></textarea>
                                    </div>
                            </div>
                        </div>
                    </div>


                                    <div class="form-actions mt-4">
                                        <div class="text-center">
                                            <button type="submit" name="submit" class="btn btn-primary waves-effect">
                                                <i class="fa fa-plus"></i>
                                                <span>Tạo Chuyên mục</span>
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
    
     }else if ($("#thumb").val() == '') {
        valid = false;
        alert('Thiếu Ảnh Thumbnail!');
    
     }else {
        

         if($("#tt_1").val() == ''){
            valid = false;
            alert('Thiếu Thông Tin 1!');
         }else if($("#tt_2").val() == '') {
            valid = false;
            alert('Thiếu Thông Tin 2!');
         }else if ($("#tt_3").val() == '') {
            valid = false;
            alert('Thiếu Thông Tin 3!');
         }else if($("#tt_4").val() == ''){
            valid = false;
            alert('Thiếu Thông Tin 4!');
         
         }else {
             valid = true;
         }



     }

    return valid //true or false
}

</script>