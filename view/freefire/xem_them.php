<?php
defined('KUNKEYPR') or exit('Restricted Access');
$id = intval($_GET['id']);
$user = $kun->user();
$check = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT COUNT(*) FROM `nickff` WHERE `id`='".$id."' AND `status`='true'"));

if($check < 1){
	die ('<div style="padding-left:20px;font-size: 30px;text-align:center"><b style="color:red">Tài khoản Không tồn tại trên hệ thống!</b></div>');
}


$getrank = array("K.Rank","Đồng", "Bạc", "Vàng", "B.Kim", "K.Cương", "H.Thoại", "T.Đấu");
$getnv = array("NULL", "Nam", "Nữ");
$getpet = array("Có", "Không");
$getdk = array("Facebook", "vkontakte");
$result = mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `id` = '".$id."' LIMIT 1");

while($getdv = mysqli_fetch_assoc($result)){
?>
   <div class="mt-12 relative w-full max-w-6xl mx-auto text-gray-800 pb-8 px-2 md:px-0">
    <div class="dark:text-white md:ml-0 mb-4 text-left inline-block uppercase py-1 md:text-2xl text-xl font-extrabold">
        TÀI KHOẢN #<?=$getdv['id'];?> </div>
    <div class="sticky col-span-12 grid grid-cols-10 gap-2 select-none py-2 px-2 color-grant text-xl font-bold rounded" style="background: rgb(37 37 37); top: 60px; index: 98;">
        <div class="col-span-10 md:col-span-5">
            <div class="flex items-center flex-wrap text-yellow-500 pt-3">
                <div class="relative">
                    <?=number_format($getdv['giatien']);?> đ
                    <span class="absolute" style="top: -18px; left: 1px; font-size: 0.7rem;">
                        CARD
                    </span>
                </div>
                <span class="mx-2">-</span>
                <div class="relative">
                <?=number_format($getdv['giatien']*25/100);?> đ
                    <span class="absolute" style="top: -18px; left: 1px; font-size: 0.7rem;">
                        ATM
                    </span>
                </div>
            </div>
        </div>
        <div class="v-skull-top col-span-10 md:col-span-5 text-yellow-500 flex justify-end items-center flex-wrap">
            <div class="relative">
                    <?=$getrank[$getdv['rank']];?>
                    <span class="absolute" style="top: -18px; left: 1px; font-size: 0.7rem;">
                       Rank
                    </span>
                </div>

                        <button class="ml-4 flex bg-red-500 text-white items-center justify-center h-10 text-2xl rounded focus:outline-none px-4 text-center" data-open="modalAccept">
                MUA NGAY
            </button>
        </div>
    </div>
    <div class="mt-4">
        <div class="flex flex-wrap" id="tap1">
            <button type="button" data-id="#taikhoan" class="text-center md:text-center focus:outline-none text-gray-900 font-bold py-3 px-4 md:px-2 w-full bg-red-500 text-white">
                            </button>
        </div>
        <div class="v-account-detail p-2 md:px-0 mt-4">
            <div class="v-account-detail-1" id="taikhoan" style="">
                <div class="mb-4 w-full text-center md:text-2xl text-gray-600 font-semibold">
                    NẠP ATM/MOMO TẶNG 25% TỰ ĐỘNG 24/24 -
                    <a class="focus:outline-none cursor-pointer text-red-600 font-bold" data-open="modalAtm"> XEM TẠI ĐÂY</a>
                </div>
                <div class="mb-10" style="display: ;">
<img data-src="<?php echo $kun->get_thumb_freefire($getdv['id']);?>" class="border border-gray-400 mb-2 w-full lazyLoad" src="<?php echo $kun->get_thumb_freefire($getdv['id']);?>">
                 
   <?php 
        $path = $_SERVER["DOCUMENT_ROOT"]."/upload/nickff/";
        $dir = $path.'info/'.$id;

                  if ($opendirectory = opendir($dir)){
                    while (($file = readdir($opendirectory)) !== false){

                        if ($file != "." && $file != "..") {
                        echo '<img data-src="/upload/nickff/info/'.$id.'/'.$file.'" class="border border-gray-400 mb-2 w-full lazyLoad" src="/upload/nickff/info/'.$id.'/'.$file.'">';
                }
                    }

                    closedir($opendirectory);
                  }
    ?>
       
                                    </div>
            </div>
        </div>
    </div>
</div>

<div class="animated modal fadeIn out fixed z-50 pin bg-smoke-dark flex p-2 md:p-0 top-0 left-0 bottom-0 right-0" style="z-index: 999;" id="modalAccept">
    <div class="animated fadeInDown fixed shadow-inner max-w-md md:max-w-lg relative pin-b pin-x align-top m-auto justify-center bg-white rounded w-full h-auto md:shadow-lg flex flex-col">
        <div class="modal-content">
            <h2 class="relative py-2 px-4 bg-gray-300 text-xl font-bold"><p>XÁC NHẬN MUA TK #<?=$getdv['id'];?></p></h2>
            <div class="py-4 px-2">
                <div class="mb-2 text-lg text-white px-3 font-extrabold">
                    <table class="table-auto w-full">
                        <tbody class="text-md px-2">
                            <tr class="rounded-none border-b py-8 px-2">
                                <td class="py-2 font-bold" style="color: #000;">HIỆN CÓ</td>
                                <td class="px-2 py-2 uppercase text-right" style="color: #000;">
                                     <?=number_format($user['money']);?> VNĐ
                                </td>
                            </tr>
                            <tr class="rounded-none border-b py-8 px-2">
                                <td class="py-2 font-bold" style="color: #000;">GIÁ MUA TK</td>
                                <td class="px-2 py-2 uppercase text-right" style="color: #000;" id="price">
                                <?=number_format($getdv['giatien']);?> VNĐ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                        <span class="mb-2 block">
                            <div class="flex items-center relative"><input type="text" id="voucher" onchange="voucher(<?=$getdv['id'];?>)" name="voucher" placeholder="Nhập mã giảm giá" class="border border-gray-500 rounded appearance-none w-full py-2 px-3 leading-tight focus:outline-none" style="color: #000;"></div>
                        </span>
                        <div id="msg_voucher"></div>
                        <div id="msg_buy"></div>
                </div>
            </div>
        <form id="buy_account" method="POST">
            <input hidden type="number" name="id" value="<?=$getdv['id'];?>">
            <input type="text" hidden name="voucher" id="myText" value="">
            <div class="flex justify-center pb-3 px-5">
                <button type="button" class="btn-inner ff-lalezar w-40 focus:outline-none py-1 px-6 font-bold text-xl rounded-none buy_account">
                    <span class="relative" style="top: 1px;">
                        MUA
                    </span>
                </button>
                <button class="ml-2 block btn-inner text-center ff-lalezar focus:outline-none py-1 px-6 font-bold text-xl rounded-none" data-close>
                    <span class="relative" style="top: 1px;">
                        ĐÓNG
                    </span>
                </button>
            </div>
        </form>
        </div>
    </div>
</div>

<?php } ?>
<script>

    $(".buy_account").click(function() {
        var data = $("#buy_account").serialize();
        $.ajax({
            url: '/confirm-buy-account-ff',
            type: 'POST',
            dataType: 'JSON',
            data: data,
            success: function(data) {
                if (data.status == 'error') {
                    $('#msg_buy').html('<p style="color: #ef4444;" class="text-center">'+data.msg+'</p>'); 
                } else {
                    $('#msg_buy').html('<p style="color: #4caf50;" class="text-center">'+data.msg+'</p>');
                    setTimeout(function () {
                        location.href='/user/tran/account';
                    }, 2500);
                }
            }
   });
    });

    function voucher(id) {
        $(function () {
           $.ajax({
        type: "POST",
        url: '/check_voucher',
         dataType : 'JSON',
        data: {
            voucher : $('#voucher').val(),
            id: id
        },
        success: function(data)
        {   
          if(data.status == 'error'){
         $('#msg_voucher').html('<p style="color: #ef4444;" class="text-center">'+data.msg+'</p>');
      }else{
         $('#msg_voucher').html('<p style="color: #4caf50;" class="text-center">'+data.msg+'</p>');
         $('#price').text(''+data.realCash+' VNĐ');
                }
     document.getElementById("myText").value = $('#voucher').val();
        }
    });


           
        });
    }


</script>
</div>
</div>
</div>

