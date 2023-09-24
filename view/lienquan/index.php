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
	if($_POST['tuong']) {
		$condition .= " AND `tuong`='".$_POST['tuong']."'";
	}
	if($_POST['skin']) {
		$condition .= " AND `skin`='".$_POST['skin']."'";
	}
	if($_POST['ngoc']) {
		$condition .= " AND `ngoc`='".$_POST['ngoc']."'";
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

}


$sql = "SELECT * FROM `nicklq` WHERE `status`='false' AND `nguoimua`='null' ORDER BY time DESC LIMIT $start, $kmess";

 $result = mysqli_query($kun->connect_db(), $sql);
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `nicklq` WHERE `status`='false' AND `nguoimua`='null' ".$condition));

?>

 <div class="w-full max-w-6xl mx-auto v-layout-item text-gray-800 py-4 md:py-12 px-4 md:px-2">
    <div class="v-text-1 mb-2 text-gray-800 text-left inline-block uppercase py-1 md:text-2xl text-xl font-extrabold">
        ACC Tài Khoản Liên Quân Tự Chọn    </div>
    <div class="text-xl bg-blue-100 text-gray-900 p-2 px-3 rounded mb-4">
        <div class="relative">
            <h2>Tài Khoản Liên Quân Tự Chọn</h2>
                    </div>
    </div>
    <div class="v-text-1 mb-4"> 
        <form class="grid grid-cols-8 gap-2 md:gap-6" method="GET">
            <div class="col-span-8 sm:col-span-2 flex">
                <div class="flex -mr-px"><span class="bg-gray-100 border border-gray-300 w-24 justify-center text-gray-800 font-medium flex items-center leading-normal rounded-none border px-3" style="color:#000000">Mã số</span>
                </div>
                <div class="flex items-center relative w-full">
                    <input name="id" placeholder="Ví dụ: 123421" class="border-2 border-gray-300 rounded-none bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none" style="color:#000000">
                </div>
            </div>
            <div class="col-span-8 sm:col-span-2 flex">
                <div class="flex -mr-px"><span class="bg-gray-100 border border-gray-300 w-24 justify-center text-gray-800 font-medium flex items-center leading-normal rounded-none border px-3" style="color:#000000">Giá từ</span>
                </div>
                <div class="flex items-center relative w-full">
                        <select style="color: #000;" name="price" id="price" class="border-2 border-gray-300 rounded-none text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                            <option value="">Tất cả</option>
                            <option value="duoi-50k" >Dưới 50K</option>
                            <option value="tu-50k-200k" >Từ 50K - 200K</option>
                            <option value="tu-200k-500k" >Từ 200K - 500K</option>
                            <option value="tu-500k-1-trieu" >Từ 500K - 1 Triệu</option>
                            <option value="tren-1-trieu" >Trên 1 Triệu</option>
                            <option value="tren-5-trieu">Trên 5 Triệu</option>
                            <option value="tren-10-trieu">Trên 10 Triệu</option>
                        </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700" style="color:#000000">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                        </svg>
                    </div>
                </div>
            </div>
                            <div class="col-span-8 sm:col-span-2 flex">
                    <div class="flex -mr-px"><span class="bg-gray-100 border border-gray-300 w-24 justify-center text-gray-800 font-medium flex items-center leading-normal rounded-none border px-3" style="color:#000000">Tướng</span></div>
                    <div class="flex items-center relative w-full">
                                            <input name="tuong" id="tuong" placeholder="Ví dụ: " class="border-2 border-gray-300 rounded-none bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none" style="color:#000000">
                                        </div>
                </div>
                            <div class="col-span-8 sm:col-span-2 flex">
                    <div class="flex -mr-px"><span class="bg-gray-100 border border-gray-300 w-24 justify-center text-gray-800 font-medium flex items-center leading-normal rounded-none border px-3" style="color:#000000">Trang Phục</span></div>
                    <div class="flex items-center relative w-full">
                                            <input name="trangphuc" id="trangphuc" placeholder="Ví dụ: " class="border-2 border-gray-300 rounded-none bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none" style="color:#000000">
                                        </div>
                </div>
                            <div class="col-span-8 sm:col-span-2 flex">
                    <div class="flex -mr-px"><span class="bg-gray-100 border border-gray-300 w-24 justify-center text-gray-800 font-medium flex items-center leading-normal rounded-none border px-3" style="color:#000000">Ngọc 90</span></div>
                    <div class="flex items-center relative w-full">
                                                <select style="color: #000;" name="ngoc90" id="ngoc90" class="border-2 border-gray-300 rounded-none text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                <option value="">Tất cả</option>
                                                                    <option value="Có">Có</option>
                                                                    <option value="Không">Không</option>
                                                            </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700" style="color:#000000">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                        </div>
                                        </div>
                </div>
                            <div class="col-span-8 sm:col-span-2 flex">
                    <div class="flex -mr-px"><span class="bg-gray-100 border border-gray-300 w-24 justify-center text-gray-800 font-medium flex items-center leading-normal rounded-none border px-3" style="color:#000000">Rank</span></div>
                    <div class="flex items-center relative w-full">
                                                <select style="color: #000;" name="rank" id="rank" class="border-2 border-gray-300 rounded-none text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                <option value="">Tất cả</option>
                                                                    <option value="Đồng">Đồng</option>
                                                                    <option value="Bạc">Bạc</option>
                                                                    <option value="Vàng">Vàng</option>
                                                                    <option value="Bạch Kim">Bạch Kim</option>
                                                                    <option value="Kim Cương">Kim Cương</option>
                                                                    <option value="Tinh Anh">Tinh Anh</option>
                                                                    <option value="Cao Thủ">Cao Thủ</option>
                                                                    <option value="Thách Đấu">Thách Đấu</option>
                                                            </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700" style="color:#000000">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                        </div>
                                        </div>
                </div>
                        <div class="col-span-8 sm:col-span-2 flex items-center">
                <button type="button" onclick="fitler();" class="mr-1 bg-red-600 text-white w-full rounded-none font-bold py-2 px-4 rounded focus:outline-none">
                    Tìm kiếm
                </button>
                <a href="/account-game/free-fire" class="ml-1 bg-gray-700 w-full text-white rounded-none font-bold py-2 px-4 rounded focus:outline-none">
                    <button type="button" class="bg-gray-700 w-full text-white rounded-none font-bold rounded focus:outline-none">
                        Tất cả
                    </button>
                </a>
            </div>
        </form>
    </div>
 <div class="mb-4 py-4 md:p-4" style="background: rgba(0, 0, 0, 0.78);">
            <div class="grid grid-cols-8 gap-2 md:gap-4">
<?php 
$getrank = array("Đồng", "Bạc", "Vàng", "B.Kim", "K.Cương", "T.Anh", "C.Thủ", "T.Đấu");
$getlk = array("NULL", "Liên Kết RIP", "Trắng Thông Tin");
while ($row = mysqli_fetch_array($result)) { ?>


<div class="fade-in col-span-8 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2 border border-gray-300 relative" style="padding: 1px;">
    <div>
        <div class="relative">
            <a>
                <div class="relative">
      <img class="h-56 md:h-40 w-full object-fill object-center lazyLoad" data-src="<?php echo $kun->get_thumb_lienquan($row['id']);?>" src="<?php echo $kun->get_thumb_lienquan($row['id']);?>">
                                    <span class="absolute v-text-1 bg-red-700 text-white font-bold text-sm inline-block px-2 rounded-sm" style="top: 5px;">MS-<?php echo $row['id'];?></span>
                </div>
            </a>
            <img class="absolute lazyLoad isLoaded" style="top: -5px; right: -6.5px;" src="">
            <div class="py-2 bg-gray-200 px-2"></div>
            <div class="my-2 py-2 px-2 relative">
                <div class="grid grid-cols-12 gap-3 text-gray-700 font-medium text-sm">
                              <div class="col-span-6 text-center">
                        <p>Tướng: <b class="text-gray-800"><?=$row['tuong']?></b></p>
                    </div>
                                        <div class="col-span-6 text-center">
                        <p>Trang Phục: <b class="text-gray-800"><?=$row['skin']?></b></p>
                    </div>
                                        <div class="col-span-6 text-center">
                        <p>Ngọc: <b class="text-gray-800"><?=$row['ngoc']?></b></p>
                    </div>
                                    <div class="col-span-6 text-center">
                        <p>Rank: <b class="text-gray-800"><?=$getrank[$row['rank']]?></b></p>
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
                                            <a href="/account-game/lienquan/view-<?php echo $row['id'];?>" class="cursor-pointer border rounded w-full text-center cursor-pointer border-red-500 hover:border-yellow-500 bg-red-500 transition duration-200 hover:bg-yellow-500 text-white uppercase inline-block font-semibold py-1 px-3">
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
echo  $kun->phantrang_user('/account-game/nicklq', $start, $tong, $kmess);
}
?>
            </div>
                    </div>

</div>
</div>
</div>
</div>