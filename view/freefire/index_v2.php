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


$sql = "SELECT * FROM `nickff` WHERE `status`='1' AND `nguoimua`='null' ".$condition." ORDER BY time DESC LIMIT $start, $kmess";

 $result = mysqli_query($kun->connect_db(), $sql);
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `status`='1' AND `nguoimua`='null' ".$condition));

?>
<style>
.v-pagination li{list-style:none}.v-page-no{background:#313030}.v-page-active{background:#ffe200}.multiselect{min-height:40px;width:100%;font-size:1.2em;position:relative;--border-opacity:1;background:#151514;padding:2px 30px 0 11px}.dropdown-select{width:100%;background:#151514;color:#e7e7e7}.select2-container--default .select2-selection--single .select2-selection__arrow{top:1px!important}.select2-container--default .select2-selection--single .select2-selection__arrow{position:absolute;width:40px;height:38px;right:1px;top:1px;padding:4px 8px;text-align:center;transition:transform .2s ease}.select2-container--default .select2-selection--single .select2-selection__arrow{line-height:16px;box-sizing:border-box;display:block;margin:0;text-decoration:none;cursor:pointer}.select2-container--default .select2-selection--single .select2-selection__rendered{color:#e7e7e7;padding-top:0;font-weight:500;top:4px;font-size:1rem;position:relative}.select2-container--default .select2-selection--single .select2-selection__placeholder{color:#e7e7e7}.select2-container--default .select2-selection--single{background-color:#151514;border-color:#464646;border-width:2px;border-radius:0}.select2-container :focus{outline:0}.select2-container--default .select2-search--dropdown .select2-search__field{border:2px solid #464646;background-color:#151514}.select2-container--default .select2-results__option--highlighted.select2-results__option--selectable{background-color:#ddd;color:#333}.select2-container--default .select2-results__option--selected{background-color:#ddd;color:#333}
</style>
    <div>
       <div class="container-x mx-auto text-white py-4 md:py-12">
          <div class="ml-2 md:ml-0 v-text-1 mb-5 v-event-hs text-left inline-block uppercase py-1 text-gray-100 md:text-2xl text-xl font-extrabold" style="text-shadow: 1px 2px 2px #000;">
             ACC FREE FIRE VIP
          </div>
          <div id="accountItems">
             <div class="v-text-1 mb-4 mx-2 md:mx-0">
                <form class="grid grid-cols-8 gap-2 md:gap-4 px-2 md:px-0" method="GET" action="">
                   <div class="col-span-8 sm:col-span-2 flex">
                      <div class="flex -mr-px"><span class="bg-ye border-color-ye w-24 justify-center text-gray-900 font-semibold flex items-center leading-normal rounded-none border px-3">Giá từ</span></div>
                      <div class="flex items-center relative w-full">
                         <select class="border-2 border-gray-800 rounded-none focus:border-yellow-500 focus:bg-gray-900 text-white appearance-none w-full py-2 px-3 leading-tight focus:outline-none" style="background:rgb(21 21 20);border-color:rgb(70 70 70);" name="price_from">
                            <option value="">Chọn giá</option>
                            <option value="10000">10.000 VNĐ</option>
                            <option value="20000">20.000 VNĐ</option>
                            <option value="50000">50.000 VNĐ</option>
                            <option value="100000">100.000 VNĐ</option>
                            <option value="200000">200.000 VNĐ</option>
                            <option value="500000">500.000 VNĐ</option>
                            <option value="1000000">1.000.000 VNĐ</option>
                            <option value="2000000">2.000.000 VNĐ</option>
                            <option value="5000000">5.000.000 VNĐ</option>
                            <option value="25000000">25.000.000 VNĐ</option>
                            <option value="40000000">40.000.000 VNĐ</option>
                            <option value="60000000">60.000.000 VNĐ</option>
                         </select>
                         <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                               <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                         </div>
                      </div>
                   </div>
                   <div class="col-span-8 sm:col-span-2 flex">
                      <div class="flex -mr-px"><span class="bg-ye border-color-ye w-24 justify-center flex font-semibold text-gray-900 items-center leading-normal  rounded-none border px-3">Đến giá</span></div>
                      <div class="flex items-center w-full relative">
                         <select class="border-2 border-gray-800 rounded-none focus:border-yellow-500 focus:bg-gray-900 text-white appearance-none w-full py-2 px-3 leading-tight focus:outline-none" style="background:rgb(21 21 20);border-color:rgb(70 70 70);" name="price_to">
                            <option value="">Chọn giá</option>
                            <option value="10000">10.000 VNĐ</option>
                            <option value="20000">20.000 VNĐ</option>
                            <option value="50000">50.000 VNĐ</option>
                            <option value="100000">100.000 VNĐ</option>
                            <option value="200000">200.000 VNĐ</option>
                            <option value="500000">500.000 VNĐ</option>
                            <option value="1000000">1.000.000 VNĐ</option>
                            <option value="2000000">2.000.000 VNĐ</option>
                            <option value="5000000">5.000.000 VNĐ</option>
                            <option value="25000000">25.000.000 VNĐ</option>
                            <option value="40000000">40.000.000 VNĐ</option>
                            <option value="60000000">60.000.000 VNĐ</option>
                         </select>
                         <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                               <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                            </svg>
                         </div>
                      </div>
                    </div>
                    <div class="col-span-8 sm:col-span-2"><button type="submit" class="btn-inner w-full rounded-none font-bold py-2 px-4 focus:outline-none">
                        Tìm kiếm
                        </button>
                    </div>
                    <div class="col-span-8 sm:col-span-2"><button type="button" onclick="window.location.href='/account-game/lmht'" class="bg-red-700 hover:bg-red-600 w-full text-white rounded-none font-bold py-2 px-4 focus:outline-none">
                        Tất cả
                        </button>
                    </div>
                </form>
             </div>
          </div>
<script>
    $(document).ready(function() {
        var z = function() {
            var e = function(e) {
                return e.text;
            },c = function(e) {
                return e.text;
            };
            jQuery(".js-select2").each(function() {
                $('b[role="presentation"]').hide();
                var s = jQuery(this)
                  , r = s.data("max") ? s.data("max") : 0;
                switch (s.data("format") ? s.data("format") : null) {
                    case "champ_lol":
                        s.select2({
                            width: "100%",
                            maximumSelectionLength: r,
                            templateResult: e,
                            templateSelection: e,
                            selectionCssClass: 'multiselect',
                            dropdownCssClass: 'dropdown-select',
                            dropdownAutoWidth: true
                        });
                    break;
                    case "skin_lol":
                        s.select2({
                            width: "100%",
                            maximumSelectionLength: r,
                            templateResult: c,
                            templateSelection: c,
                            selectionCssClass: 'multiselect',
                            dropdownCssClass: 'dropdown-select',
                            dropdownAutoWidth: true
                        });
                    break;
                    default:
                        s.select2({
                            width: "100%",
                            maximumSelectionLength: r,
                            templateSelection: e,
                            selectionCssClass: 'multiselect',
                            dropdownCssClass: 'dropdown-select',
                            dropdownAutoWidth: true
                        })
                    break;
                }
            })
        }
        z();
    });
</script>
          <div class="v-item-account">
              <div class="grid grid-cols-8 gap-2 md:gap-4 px-2 md:px-0">

                <?php 
$getrank = array("K.Rank","Đồng", "Bạc", "Vàng", "B.Kim", "K.Cương", "H.Thoại", "T.Đấu");
$getnv = array("NULL", "Nam", "Nữ");
$getpet = array("Có", "Không");
$getdk = array("Facebook", "vkontakte");
while ($row = mysqli_fetch_array($result)) { ?>

                <div class="col-span-8 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2">
                  <div class="item-account  relative" style="background: rgb(27 27 27);">
                     <a href="/account/FREE-FIRE/147">
                        <div class="relative">
                            <img data-src="../upload/freefire/147-1.jpg" class="h-26 md:h-40 w-full object-cover object-center max-h-img lazyload"> 
                            <span class="absolute v-text-1 bg-red-700 text-white font-bold text-sm inline-block px-2 rounded-sm" style="right: 5px; top: 5px;">MS-<?php echo $row['id'];?></span>
                        </div>
                     </a>
                     <div class="py-2 px-2 relative">
                           <h2 class="text-center text-gray-400 font-semibold">HUYPLAY</h2>
                     </div>
                     <div class="absolute rounded-b-sm flex items-center justify-between left-0 right-0" style="bottom: 0px; background: rgb(49 48 48);">
                        <ul class="v-text-1 px-0 md:px-1 md:pl-2 pl-1 py-0 md:py-1 flex items-center uppercase rounded-sm w-full text-gray-200 text-sm font-medium">
                           <p><span class="text-xl mr-1">
                             <?php echo number_format($row['giatien']);?>
                              </span> <span class=" md:inline-block">
                              VNĐ
                              </span>
                           </p>
                        </ul>
                        <div class="flex justify-end pr-0 md:pr-1">
                            <a href="/account/FREE-FIRE/<?php echo $row['id'];?>" class="v-padding-top flex items-center justify-center focus:outline-none w-16 md:w-24 h-8 text-center inline-block btn-inner v-text-1 text-sm md:text-lg mx-auto">
                           CHI TIẾT
                           </a>
                        </div>
                     </div>
                  </div>
                </div>
             
            <?php } ?>
             
            
            </div>
             <!----> 
               <div class="mt-3 md:mt-6 w-full flex justify-center items-center">
                <nav class="relative z-0 inline-flex v-pagination mx-auto v-text-1">
                    <li><span class="mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded-sm inline-flex justify-center items-center px-4 py-2 font-bold focus:outline-none v-page-active text-black font-bold">1</span></li><li><a class=" mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded-sm inline-flex justify-center items-center px-4 py-2 font-bold focus:outline-none v-page-no text-black font-bold" href="?page=2">2</a></li><li><a class=" mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded-sm inline-flex justify-center items-center px-4 py-2 font-bold focus:outline-none v-page-no text-black font-bold" href="?page=2"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>                </nav>
            </div>
          </div>
       </div>
    </div>
</div>