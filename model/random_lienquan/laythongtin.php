<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

if(!$_SESSION['token']) {
    die("<script>swal('Lỗi', 'Bạn Cần Đăng Nhập', 'error');setTimeout(function(){location.href='/signin.html';}, 1500);</script>");
}


$id = $_POST['id'];
$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_lienquan_nick` WHERE `id`='".$id."' AND `status`='true'"));
$thread = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_lienquan` WHERE `cname`='".$row['cname']."'"));
?>

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <h4 class="modal-title">Xác nhận mua tài khoản</h4>
</div>

<div class="modal-body" id="buy">
<p style="display: none;" id="result"></p>
<div class="modal-body">
    <div class="c-content-tab-4 c-opt-3" role="tabpanel">
        <ul class="nav nav-justified" role="tablist">
            <li role="presentation" class="active">
                <a href="#payment" role="tab" data-toggle="tab" class="c-font-16" aria-expanded="true">Thanh toán</a>
            </li>
            <li role="presentation" class="">
                <a href="#info1" role="tab" data-toggle="tab" class="c-font-16" aria-expanded="false">Tài khoản</a>
            </li>
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade active in" id="payment">
                <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                    <li class="c-font-dark">
                        <table class="table table-striped">
                            <tbody><tr>
                                <th colspan="2">Thông tin tài khoản #<?php echo $row['id'];?></th>
                            </tr>
                            </tbody><tbody>
                            <tr>
                                <td>Giá tiền:</td>
                                <th class="text-info"><?php echo number_format($thread['giatien']);?>đ</th>
                            </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="info1">
                <ul class="c-tab-items p-t-0 p-b-0 p-l-5 p-r-5">
                    <li class="c-font-dark">
                        <table class="table table-striped">
                            <tbody>
                            <tr>
                                <th colspan="2">Chi tiết tài khoản #<?php echo $row['id'];?></th>
                            </tr>

                            
                            


                                                                                        </tbody>
                        </table>
                    </li>
                </ul>
            </div>
        </div>
    </div>
        <?php
if(!$_SESSION['token']){
?>
    <div class="form-group ">
        <label class="col-md-3 form-control-label">Mã giới thiệu:</label>
        <div class="col-md-7">
            <input type="text" class="form-control c-square c-theme " id="coupon" name="coupon" placeholder="Mã giảm giá" value="">
            <span class="help-block">Nhập mã giới thiệu nếu có để nhận ưu đãi</span>

	    <span id="ketqua" style="color:blue"></span>
        </div>
   </div>




    
        
            <div class="form-group ">
             <label class="col-md-12 form-control-label text-danger" style="text-align: center;margin: 10px 0; ">
                Bạn phải đăng nhập mới có thể mua tài khoản tự động.
            </label>

        
        </div>
    
    
    

    <div style="clear: both"></div>
</div>
<div class="modal-footer">
    
        <a class="btn c-theme-btn c-btn-square c-btn-uppercase c-btn-bold" href="/login.html">Đăng nhập</a>

    
 <?php
    } else {
?>
<div class="form-group ">
        <label class="col-md-3 form-control-label">Mã giới thiệu:</label>
        <div class="col-md-7">
            <input type="text" class="form-control c-square c-theme " id="giftcode"  placeholder="Mã giảm giá" value="">
             <span class="input-group-btn">
                                    <button style="background-color: #d8d8d8;" class="btn btn-default c-font-dark" type="button" id="check_gifcode">Kiểm Tra</button>
                                </span>
            <span id="result_check" class="help-block">Nhập mã giới thiệu nếu có để nhận ưu đãi</span>

      <span id="ketqua" style="color:blue"></span>
        </div>
   </div>



    <div style="clear: both"></div>
</div>
<div class="modal-footer">
            <button id="mua" type="submit" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase btn-buy" Onclick="muaacc('<?php echo $row['id'];?>')">Mua ngay</button>

        
<?php
}
?>

    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>

</div>


<script>
function muaacc(id) {
    document.getElementById("mua").disabled = true;

$.ajax({
                method: "POST",
                url: "/model/random_lienquan/xuly.php",
                data: {
                    id: id
                },
                success : function(response){
                    $('.close').click();
                        $('#result').html(response);
                        reload_money();
                }
            });


}

</script>
  
 
</div>