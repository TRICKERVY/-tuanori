 <?php
defined('KUNKEYPR') or exit('Restricted Access');
$kmess = 16; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

$condition = "";
if(isset($_POST['loc'])) {



  if($_POST['maso']) {
    $condition .= " AND `id`='".$_POST['maso']."'";
  }

  if($_POST['price']) {

    switch ($_POST['price']) {
      case 'duoi-50k':
        $condition .= " AND `giatien`<= 50000";
        break;
      case 'tu-50k-200k':
        $condition .= " AND `giatien` >= 50000 AND `giatien` <= 200000 ";
        break;
      case 'tu-500k-1-trieu':
        $condition .= " AND `giatien` >= 500000 AND `giatien` <= 1000000";
        break;
      case 'tren-1-trieu':
        $condition .= " AND `giatien` >= 1000000";
        break;
      case 'tren-5-trieu':
        $condition .= " AND `giatien` >= 5000000";
        break;
      case 'tren-10-trieu':
        $condition .= " AND `giatien`>= 1000000";
        break;
    }

  }

  if($_POST['rank']) {
    $condition .= " AND `rank`='".$_POST['rank']."'";
  }

  if($_POST['nhanvat']) {
    $condition .= " AND `nhanvat`='".$_POST['nhanvat']."'";
  }

  if($_POST['pet']) {
    $condition .= " AND `pet`='".$_POST['pet']."'";
  }

}


$sql = "SELECT * FROM `nickff` WHERE `status`='true' AND `nguoimua`='null' ".$condition." ORDER BY time DESC LIMIT $start, $kmess";

 $result = mysqli_query($kun->connect_db(), $sql);
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `status`='1' AND `nguoimua`='null' ".$condition));

?>
 <style>
        .parallax-mirror {
            position: absolute !important;
        }
    </style>
    
    	<div class="page-bottom">
			<div class="container">
			    <div class="row">
				    <div class="col-12 col-md-3 mb-3">
						<input class="form-control w-100" placeholder="Mã Số Tài Khoản" type="number" name="id" id="id" onchange="fitler_account()">
					</div>
					<div class="col-12 col-md-3 mb-3">
					    <select class="form-control w-100" name="sapxep" id="sapxep" onchange="fitler_account()">
                            <option value="">Sắp xếp</option>
                            <option value="1" >Giá từ thấp tới cao</option>
                            <option value="2" >Giá từ cao tới thấp</option>
                        </select>
					</div>
					<div class="col-12 col-md-3 mb-3">
					    <select class="form-control w-100" name="price" id="price" onchange="fitler_account()">
                            <option value="0">Tìm theo giá</option>
                            <option value="1">100,000 trở xuống</option>
                            <option value="2">100,000 - 400,000</option>
                            <option value="3">400,000 - 800,000</option>
                            <option value="4">800,000 - 1,000,000</option>
                            <option value="5">1,000,000 trở lên</option>
                        </select>
					</div>
					<div class="col-12 col-md-3 mb-3">
					    <button type="submit" class="btn btn-info w-100 text-white" onclick="clear_fitler()"><span>Xóa Lọc</span></button>
					</div>
				</div>
				<div class="team-content contact-form">
				    <div class="list_account"></div>
			
                <?php 
$getrank = array("K.Rank","Đồng", "Bạc", "Vàng", "B.Kim", "K.Cương", "H.Thoại", "T.Đấu");
$getnv = array("NULL", "Nam", "Nữ");
$getpet = array("Có", "Không");
$getdk = array("Facebook", "vkontakte");
while ($row = mysqli_fetch_array($result)) { ?>

<div class="fade-in col-span-8 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 border border-gray-300 relative" style="padding: 1px;">
    <div>
        <div class="relative">
            <a>
                <div class="relative">
      <img class="h-56 md:h-40 w-full object-fill object-center lazyLoad" data-src="<?php echo $kun->get_thumb_freefire($row['id']);?>" src="<?php echo $kun->get_thumb_freefire($row['id']);?>">
                                    <span class="absolute v-text-1 bg-red-700 text-white font-bold text-sm inline-block px-2 rounded-sm" style="top: 5px;">MS-<?php echo $row['id'];?></span>
                </div>
            </a>
            <img class="absolute lazyLoad isLoaded" style="top: -5px; right: -6.5px;" src="">
            <div class="py-2 bg-gray-200 px-2"></div>
            <div class="my-2 py-2 px-2 relative">
                <div class="grid grid-cols-12 gap-3 text-gray-700 font-medium text-sm">
                              <div class="col-span-6 text-center">
                        <p>Nhân Vật: <b class="text-gray-800"><?=$getnv[$row['nhanvat']];?></b></p>
                    </div>
                                        <div class="col-span-6 text-center">
                        <p>PET: <b class="text-gray-800"><?=$getpet[$row['pet']];?></b></p>
                    </div>
                                        <div class="col-span-6 text-center">
                        <p>Đăng Ký: <b class="text-gray-800"><?=$getdk[$row['dangky']];?></b></p>
                    </div>
                                    <div class="col-span-6 text-center">
                        <p>Rank: <b class="text-gray-800"><?=$getrank[$row['rank']];?></b></p>
                    </div>
                </div>
            </div>
            <div class="mt-4 rounded-b-sm grid grid-cols-12 gap-5 p-2">
                <div class="col-span-6">
                    <ul class="v-text-1 rounded-sm w-full font-medium" style="font-weight: 500;">
                        <p class="w-full border border-red-600 text-center rounded text-red-600 block px-3 py-1">
                            <?php echo number_format($row['giatien']);?> đ
                        </p>
                    </ul>
                </div>
                <div class="col-span-6">
                    <div class="w-full">
                                            <a href="/account-game/freefire/view-<?php echo $row['id'];?>" class="cursor-pointer border rounded w-full text-center cursor-pointer border-red-500 hover:border-yellow-500 bg-red-500 transition duration-200 hover:bg-yellow-500 text-white uppercase inline-block font-semibold py-1 px-3">
                            Chi tiết
                        </a>
                                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
   <?php } ?>

            </div>
                        <div class="mt-3 md:mt-6 w-full flex justify-center items-center">
                <?php
if ($tong > $kmess){
echo  $kun->phantrang_user('/account-game/freefire', $start, $tong, $kmess);
}
?>
            </div>
                    </div>
   
<script>
    page = 1;
    id = "";
    price = "";
            nhanvat = "";
            pet = "";
            dangky = "";
        type = "tai-khoan-free-fire-tu-chon";


    function load_account() {
        $(".list_account").hide();
        $("#loading").show();
        $.post("/load/account", {
                page: page,
                id: id,
                price: price,
                                nhanvat: nhanvat,
                                pet: pet,
                                dangky: dangky,
                                type: type
            })
            .done(function(data) {
                $(".list_account").html('');
                $('.list_account').empty().append(data);
                $("#loading").hide();
                $(".list_account").show();
            });
    }

    function fitler() {
        id = $("#id").val();
        price = $("#price").val();
                    nhanvat = $("#nhanvat").val();
                    pet = $("#pet").val();
                    dangky = $("#dangky").val();
                load_account();
    }

    load_account();
</script>
</div>
			</div>
		</div>
        </div>
		</div>
    </section>