<style>
.v-pagination li{list-style:none}.v-page-no{background:#313030}.v-page-active{background:#ffe200}.multiselect{min-height:40px;width:100%;font-size:1.2em;position:relative;--border-opacity:1;background:#151514;padding:2px 30px 0 11px}.dropdown-select{width:100%;background:#151514;color:#e7e7e7}.select2-container--default .select2-selection--single .select2-selection__arrow{top:1px!important}.select2-container--default .select2-selection--single .select2-selection__arrow{position:absolute;width:40px;height:38px;right:1px;top:1px;padding:4px 8px;text-align:center;transition:transform .2s ease}.select2-container--default .select2-selection--single .select2-selection__arrow{line-height:16px;box-sizing:border-box;display:block;margin:0;text-decoration:none;cursor:pointer}.select2-container--default .select2-selection--single .select2-selection__rendered{color:#e7e7e7;padding-top:0;font-weight:500;top:4px;font-size:1rem;position:relative}.select2-container--default .select2-selection--single .select2-selection__placeholder{color:#e7e7e7}.select2-container--default .select2-selection--single{background-color:#151514;border-color:#464646;border-width:2px;border-radius:0}.select2-container :focus{outline:0}.select2-container--default .select2-search--dropdown .select2-search__field{border:2px solid #464646;background-color:#151514}.select2-container--default .select2-results__option--highlighted.select2-results__option--selectable{background-color:#ddd;color:#333}.select2-container--default .select2-results__option--selected{background-color:#ddd;color:#333}
</style>


<?php
defined('KUNKEYPR') or exit('Restricted Access');

// phân trang trang 2 trở đi bị lỗi nên phải thêm đoạn này
if($kun->tim_chuoi($_GET['cname'], '/page=')) {
    $exp = explode("/page=", $_GET['cname']);
    $_GET['cname'] = $exp[0];
    $_REQUEST['page'] = $exp[1];
}


$kmess = 16; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $thread = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` WHERE `cname`='".$_GET['cname']."'"));
 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `status`='true' AND `cname`='".$_GET['cname']."' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `status`='true' AND `cname`='".$_GET['cname']."'"));
?>
    <div>
       <div class="container-x mx-auto text-white py-4 md:py-12">
            <div class="ml-2 md:ml-0 v-text-1 mb-5 v-event-hs text-left inline-block uppercase py-1 text-gray-100 md:text-2xl text-xl font-extrabold" style="text-shadow: 1px 2px 2px #000;">
                <?php echo $thread['name'];?>           </div>
          <div class="v-item-account">
              <div class="grid grid-cols-8 gap-2 md:gap-4 px-2 md:px-0">

                <?php 
while ($row = mysqli_fetch_array($result)) { ?>


                <div class="col-span-8 sm:col-span-4 md:col-span-2 lg:col-span-2 xl:col-span-2">
                    <div>
                        <div class="item-account  relative" style="background: rgb(27 27 27);">
                            <a>
                                <div class="relative">
                                    <img src="<?php echo $thread['thumb'];?>" class="h-26 md:h-40 w-full object-cover object-center max-h-img lazyload">
                                    <span class="absolute v-text-1 bg-red-700 text-white font-bold text-sm inline-block px-2 rounded-sm" style="right: 5px; top: 5px;">MS-<?php echo $row['id'];?></span>
                                </div>
                            </a>
                            <div class="relative">
                                <div class="v-text-1 text-gray-400 text-xs uppercase font-semibold flex items-center justify-center" style="min-height: 50px">
                                    <div class="mt-1 v-text-1 v-text-title md:text-lg text-sm font-bold">
                                        THỬ VẬN MAY NÀO
                                    </div>
                                </div>
                            </div>
                            <div class="absolute rounded-b-sm flex items-center justify-between left-0 right-0" style="bottom: 0px; background: rgb(49 48 48);">
                                <ul class="v-text-1 px-0 md:px-1 md:pl-2 pl-1 py-0 md:py-1 flex items-center uppercase rounded-sm w-full text-gray-200 text-sm font-medium">
                                    <p><span class="text-xl mr-1">
                                        <?php echo number_format($thread['giatien']);?>                                        </span> <span class=" md:inline-block">
                                        VNĐ
                                        </span>
                                    </p>
                                </ul>
                                <div class="flex justify-end pr-0 md:pr-1">
                                    <button class="v-padding-top cursor-pointer flex items-center justify-center focus:outline-none w-20 md:w-24 h-8 text-center inline-block btn-inner v-text-1 text-sm md:text-lg mx-auto" style="color: #333333" onclick="getdata('<?php echo $row['id'];?>')">
                                        MUA NGAY
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               <?php } ?>
            </div>
             <!----> 
            <div class="mt-3 md:mt-6 w-full flex justify-center items-center">
                <nav class="relative z-0 inline-flex v-pagination mx-auto v-text-1">
                    <li><span class="mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded-sm inline-flex justify-center items-center px-4 py-2 font-bold focus:outline-none v-page-active text-black font-bold">1</span></li><li><a class=" mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded-sm inline-flex justify-center items-center px-4 py-2 font-bold focus:outline-none v-page-no text-black font-bold" href="?page=2">2</a></li><li><a class=" mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded-sm inline-flex justify-center items-center px-4 py-2 font-bold focus:outline-none v-page-no text-black font-bold" href="?page=3">3</a></li><li><a class=" mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded-sm inline-flex justify-center items-center px-4 py-2 font-bold focus:outline-none v-page-no text-black font-bold" href="?page=4">4</a></li><li><a class=" mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded-sm inline-flex justify-center items-center px-4 py-2 font-bold focus:outline-none v-page-no text-black font-bold" href="?page=5">5</a></li><li><a class=" mx-1 w-8 md:w-10 h-8 md:h-10 text-md md:text-lg select-none rounded-sm inline-flex justify-center items-center px-4 py-2 font-bold focus:outline-none v-page-no text-black font-bold" href="?page=2"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                </nav>
            </div>
          </div>
       </div>
    </div>
</div>
<div class="modal fade modal-create items-center justify-center" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-container border-grant w-modal bg-gray-900 max-w-md mx-auto rounded-none z-50 overflow-y-auto" role="document">
        <div class="modal-content w-modal max-w-sm text-left select-none mx-auto" style="background:#1a202c;">
            <div class="relative py-2 px-4 bg-black bg-grant-1 text-xl font-bold">
                <h5 class="modal-title title-grant-category" id="buyModal">Thông báo</h5>
            </div>
       <div class="text"></div>

       
<div class="modal fade modal-create items-center justify-center" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-container w-modal max-w-md mx-auto rounded-none z-50 overflow-y-auto" role="document">
        <div class="modal-content w-modal max-w-sm text-left select-none mx-auto">
  

<script type="text/javascript">
    function getdata(id) {
        var curModal = $('#buyModal');
        curModal.find('.text').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/img/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");


            $.ajax({
                method: "POST",
                url: "/model/random_freefire/laythongtin.php",
                data: {
                    id: id
                },
                success : function(response){
                    curModal.modal('show').find('.text').html(response);
                }
            });



    }
</script>
<script>
function muaacc(id) {
  var curModal = $('#buyModal');
        curModal.find('.text').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/img/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");



$.ajax({
                method: "POST",
                url: "/model/random_freefire/xuly.php",
                data: {
                    id: id
                },
                success : function(response){
                    curModal.modal('show').find('.text').html(response);
                        reload_money();
                }
            });


}

</script>
    </div>
    </div>
</div>
