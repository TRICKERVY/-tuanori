

<?php
defined('KUNKEYPR') or exit('Restricted Access');
$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong` WHERE `id`='".$_GET['id']."' AND `status`='true'"));
if(!$row['id']) die("<center><h1>Vòng Quay Không Tồn Tại!</center>");


?>


<?php
$huy = substr($row['giatien'], 0, -3);
$huy1 = round($huy*3, -1);
$huy2 = round($huy*7, -1);
$huy3 = $huy*10-10;?>


    	<div class="page-bottom">
			<div class="container">
				<div class="row">
					<div class="col-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
					    <div class="team-item">
					        <ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
    							<li class="nav-item" role="presentation">
    							    <button class="nav-link font-weight-bolder active" role="tab" type="button" style="padding: 12px; text-transform: uppercase; font-size: 20px;"><?php echo $row['name'];?> </button>
    							</li>
    						</ul>
    						<div class="row team-content">
    						    <div class="col-12 col-md-7 mt-5">
    						                                            <div class="wheel-wrapper">
                                        <a id="start-played" class="wheel-pointer cursor-pointer"></a>
                                        <img class="WheelSea" draggable="true" alt="Play" src="<?php echo $row['image'];?>" id="rotate-play">
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <select class="form-control select-Numrollop" id="numrolllop">
                                            <option value="x1" data-price="<?=$row['giatien'];?>">Quay 1 lần - giá <?=$huy;?>k </option>
                                     <option value="x3" data-price="<?=$row['giatien'];?>">Quay 3 lần - giá <?=$huy1;?>k </option>
                                      <option value="x7" data-price="<?=$row['giatien'];?>">Quay 7 lần - giá <?=$huy2;?>k </option>
                                       <option value="x10" data-price="<?=$row['giatien'];?>">Quay 10 lần - giá <?=$huy3;?>k </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-3 mb-3">
                                        <div class="col-md-3"></div>
                                        <div class="col-md-6 col-xs-12 col-sm-12">
                                            <div class="btn-primary-line" id="start-played">Quay Ngay</div>
                                        </div>
                                    </div>
                                        						    </div>
    						    <div class="col-12 col-md-5 mt-5">
							        <div class="row">
                                        <div class="col-xs-12 col-ms-12 py-2">
                                            <a class="btn btn-danger thele w-100" data-bs-toggle="modal" data-bs-target="#TheLeModal"><span>Thể Lệ</span></a>
                                        </div>
                                        <div class="col-xs-12 col-ms-12 py-2">
                                            <a class="btn-primary-line w-100" href="/user/draw-vatpham"><span>Rút Phần Thưởng</span></a>
                                        </div>
                                        <div class="col-xs-12 col-ms-12 py-2 pb-3">
                                            <a class="btn btn-success w-100" href="/user/minigame"><span>Lịch Sử Chơi Của Bạn</span></a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 mb-3">
                                            <div class="lgx-heading">
                                                <h2 class="sponsored-heading first-heading">Lịch Sử Quay Gần Đây</h2>
                                                <h3 class="line-heading"></h3>
                                            </div>
                                        </div>
                                    </div>
                                    <table class="table table-bordered table-responsive">
                                        <thead>
                                        <tr>
                                            <th style="font-size: 13px;">Tài Khoản</th>
                                            <th style="font-size: 13px;">Phần Thưởng</th>
                                            <th style="font-size: 13px;">Thời Gian</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
 $i = '1';
$res = mysqli_query($kun->connect_db(), "SELECT * FROM `user_history_system` WHERE `action` LIKE  'Vòng Quay%' AND `action_name`='".$row['name']."' ORDER BY `time` DESC LIMIT 0, 6");
while ($row = mysqli_fetch_array($res)) {  
    ?>
                                    <tr>
                                    <td><?php echo $kun->compact_string($row['username'], 7, '***');?></td>
                                    <td><?=$row['mota'];?></td>
                                    <td><?php echo $kun->gio($row['time']);?></td>
                                    </tr>
                                                                   <?php } ?>

                                                                                </tbody>
                                    </table>
                                </div>
    						</div>
    					</div>
					</div>
				</div>
			</div>
		</div>
    </section>
    <div class="modal fade" id="noticeModal" tabindex="-1" aria-labelledby="noti" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0" id="noti">Thông Báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body content-popup">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                    <a href="/user/draw-vatpham" class="btn btn-success">Rút Kim Cương</a>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="TheLeModal" tabindex="-1" aria-labelledby="TheLeLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0" id="TheLeLabel">Thể Lệ</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    1 lượt 10k 100% trúng 9999 kim cương                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>




    
    <script type="text/javascript">
        $(document).ready(function () {
            $(".thele").on("click", function () {
                $("#theleModal").modal('show');
            })
            $(".uytin").on("click", function () {
                $("#uytinModal").modal('show');
            })
            $(".luotquay").on("click", function () {
                $("#luotquayModal").modal('show');
            })
        });
    </script>


<script src="/assets/Scripts/client_0x2165x1.js"></script>    
   
<script type="text/javascript">
$( document ).ready(function() {
 var bRotate = false;
 function rotateFn(angles, txt, type,data){
        bRotate = !bRotate;
        $('#rotate-play').stopRotate();
        $('#rotate-play').rotate({
            angle:0,
            animateTo:angles+1800,
            duration:2500, // tốc độ quay tay
            callback:function (){
              var $html = "";

              $html += "<p>Kết quả quay <span class='text-red-600'>(" + data.type + "):</span> Quay " + data.amount + " lần - giá " + data.price + "k</p>";
                    $html += "<div><b>Mua X" + data.amount + ": Tổng Trúng</br><p class='text-md uppercase inline-block rounded border-2 border-red-500 px-2 text-red-500 mr-1'>" + data.total + "</p></b></div>";
                    $html += "<div class='h-2'></div>";
                    for ($i = 0; $i < data.amount; $i++) {
                        $html += "<p class='text-md'>- Quay lần " + ($i + 1) + ": " + data[$i]["msg"];
                    }

             $('.content-popup').html($html);
             $('#noticeModal').modal('show');
                bRotate = !bRotate;
            }
        })
    }
 $('body').delegate('#start-played', 'click', function() {

        if(bRotate)return;
 


  $.ajax({ 
        type: 'post', 
        dataType: "JSON",
        url: '/system/tro-choi/vq', 
        data: {
              amount: $("#numrolllop").val(),
               type: 'play',
                csrf: '<?=$_GET['id'];?>'
        }, 
        success: function (data) {
            if(data.status == 3) {
     $('.content-popup').text('Hãy đăng nhập để chơi!');
      $('#noticeModal').modal('show');
            }else if(data.status == 4) {
     $('.content-popup').text('Vui lòng nạp thêm tiền để chơi!');
                  $('#noticeModal').modal('show');
                 
            }else if(data.status == 1) {
                if(data.amount > 0 && data.amount < 11) {
            
   rotateFn(data.location, data.msg, "success",data);
}else {
    $('.content-popup').text('Lỗi hệ thống!');
                $('#noticeModal').modal('show');
}

            }else {
   $('.content-popup').text('Lỗi hệ thống!');
    $('#noticeModal').modal('show');
            }

    }
});

    });

 

});

</script>
 


