

<style>
@media    only screen and (max-width: 640px) {
  #bonus{width: 50%!important;!important;}
}
#bonus {
    position: fixed;
    bottom: 15px;
    left: 15px;
    width: 13%;
    z-index: 1000;
    cursor: pointer;
}
</style>



<!--       
    <div id="bonus" title="Click để nhận thưởng!">
        <img src="https://shopgiangtv.com/upload/images/78805a221a988e79ef3f42d7c5bfd418.gif">
	</div> 


<script>
    $(document).ready(function(){
        $('body').delegate('#bonus', 'click', function() {
            $.ajax({
                url : '/lixi',
                dataType : 'json',
                type : 'POST',
                success : function(data){
                  if (data.status == 'LOGIN') {
                                location.href = '/login';
                                return;
                   }
                    $('#bonus').css('opacity','0');
                    $('.content-msg').html(data.msg);
                    $('#modalNoti').removeClass('out');
                }
            });
        });
    });
</script> -->
        <div class="animated modal fadeIn out fixed z-50 pin bg-smoke-dark flex p-2 md:p-0 top-0 left-0 bottom-0 right-0" style="z-index: 999;" id="modalAtm">
            <div class="animated fadeInDown fixed shadow-inner max-w-md md:max-w-lg relative pin-b pin-x align-top m-auto justify-center bg-white rounded w-full h-auto md:shadow-lg flex flex-col">
                <div class="modal-content">
                    <div class="text-gradient text-red-600 font-bold text-lg text-center mb-3 p-3 uppercase border-b border-gray-300">
                        Nạp tiền ATM/MOMO Tự Động 24/24
                    </div>
                    <div class="text-gray-900 overflow-auto p-2 md:px-4" style="max-height: 400px;">
                        <div>
                            <div class="p-2 border-t border-r border-l border-gray-300 rounded-t-sm">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <img src="https://domain.dangnhapshop.vip/bank.png" class="h-10 w-10 rounded" />
                                        <div class="ml-2 text-left">
                                            <h2 class="font-bold text-base">
                                                Chuyển khoản qua Vietcombank
                                            </h2>
                                            <p class="text-xs">Chuyển khoản ngân hàng online.</p>
                                        </div>
                                    </div>
                                    <a href="/user/recharge-online" class="focus:outline-none bg-pink-600 text-white text-xs inline-block h-5 flex items-center justify-center font-semibold px-2 rounded">
                                        Chi tiết
                                    </a>
                                </div>
                            </div>
                            <div class="p-2 border border-gray-300 rounded-b-sm">
                                <div class="flex justify-between items-center">
                                    <div class="flex">
                                        <img src="https://domain.dangnhapshop.vip/momo.png" class="h-10 w-10 rounded" />
                                        <div class="ml-2 text-left">
                                            <h2 class="font-bold text-base">Chuyển khoản qua ví Momo</h2>
                                            <p class="text-xs">Chuyển khoản trên ứng dụng Momo.</p>
                                        </div>
                                    </div>
                                    <a href="/user/recharge-online" class="focus:outline-none bg-pink-600 text-white text-xs inline-block h-5 flex items-center justify-center font-semibold px-2 rounded">
                                        Chi tiết
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 border-t border-gray-300 flex justify-end p-3 md:px-3">
                        <span class="absolute cursor-pointer text-2xl text-gray-800 pt-3 px-3" style="right: -1px; top: -2px;" data-close><i class="bx bxs-x-square"></i></span>
                        <button class="focus:outline-none rounded transition duration-200 hover:bg-blue-500 hover:text-white py-1 border-2 border-blue-500 font-semibold text-blue-600 px-6" data-close>
                            Đóng
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="animated modal fadeIn out fixed z-50 pin bg-smoke-dark flex p-2 md:p-0 top-0 left-0 bottom-0 right-0" style="z-index: 999;" id="modalNoti">
        <div class="animated fadeInDown fixed shadow-inner max-w-md md:max-w-lg relative pin-b pin-x align-top m-auto justify-center bg-white rounded w-full h-auto md:shadow-lg flex flex-col">
            <div class="modal-content">
                <h2 class="py-2 px-4 bg-gray-300 text-gray-800 text-xl font-bold">
                    <p style="color: #000;">THÔNG BÁO</p>
                </h2>
                <div class="py-8 px-2">
                    <div class="text-center mb-2 text-xl font-extrabold">
                        <div class="relative px-2 content-msg">Text thông báo</div>
                    </div>
                </div>
                <div style="padding-left: 160px;" class="flex pb-3 px-5 justify-between">
                    <button class="ml-2 btn-inner ff-lalezar w-20 text-center md:w-40 focus:outline-none py-1 px-6 font-bold text-md md:text-lg rounded-none" data-close>
                    <span class="relative" style="top: 1px;">
                    Đóng
                    </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
        <div class="animated modal fadeIn out fixed z-50 pin bg-smoke-dark flex p-2 md:p-0 top-0 left-0 bottom-0 right-0" style="z-index: 999;" id="modalCard">
            <div class="animated fadeInDown fixed shadow-inner max-w-md md:max-w-lg relative pin-b pin-x align-top m-auto justify-center bg-white rounded w-full h-auto md:shadow-lg flex flex-col">
                <div class="modal-content">
                    <h2 class="py-2 px-4 bg-gray-300 text-gray-800 text-xl font-bold"><p class="text-gray-800">THÔNG BÁO</p></h2>
                    <div class="py-8 px-2">
                        <div class="text-center mb-2 text-xl text-gray-800 font-extrabold"><div class="relative px-2 text-gray-800">TÀI KHOẢN KHÔNG ĐỦ ĐỂ GIAO DỊCH!</div></div>
                    </div>
                    <div class="flex pb-3 px-5 justify-between">
                        <div class="flex items-center text-white">
                            <a href="/user/recharge" class="ml-1 bg-red-600 focus:outline-none py-1 px-2 font-bold text-md md:text-lg rounded-none">
                                <span class="relative" style="top: 1px;">
                                    NẠP THẺ
                                </span>
                            </a>
                            
                            <a href="/user/recharge-online"><button class="ml-1 bg-red-600 focus:outline-none py-1 px-2 font-bold text-md md:text-lg rounded-none">
                                <span class="relative" style="top: 1px;">
                                    NẠP MOMO/ATM
                                </span>
                            </button></a>
                        </div>
                        <button class="ml-2 btn-inner ff-lalezar w-20 text-center md:w-40 focus:outline-none py-1 px-6 font-bold text-md md:text-lg rounded-none" data-close>
                            <span class="relative" style="top: 1px;">
                                OK
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="animated modal fadeIn out fixed z-50 pin bg-smoke-dark flex p-2 md:p-0 top-0 left-0 bottom-0 right-0" style="z-index: 999;" id="modalMinigame">
            <div class="animated fadeInDown fixed shadow-inner max-w-sm md:max-w-lg relative pin-b pin-x align-top m-auto justify-center bg-white rounded w-full h-auto md:shadow-lg flex flex-col">
                <div class="text-red-600 font-bold text-lg text-center mb-3 p-3 uppercase border-b border-gray-300">
                    Thông báo
                </div>
                <div class="overflow-auto p-2 md:px-4 text-lg text-gray-800" style="max-height: 400px;">
                    <div class="relative px-2 pb-4 text-gray-900 content-popup">
                    </div>
                </div>
                <div class="border-t border-gray-300 flex p-3 md:px-3 justify-end">
                    <div class="flex items-center">
                        <button class="ml-1 rounded focus:outline-none transition duration-200 hover:bg-blue-500 hover:text-white py-1 border-2 border-blue-500 font-semibold text-blue-600 px-6" data-close>
                            Đóng
                        </button>
                        <span class="absolute cursor-pointer text-3xl text-gray-800 pt-3 px-3" style="right: -1px; top: -2px;" data-close><i class="bx bxs-x-square"></i></span>
                    </div>
                </div>
                
            </div>
        </div>

        <script src="https://thanhtv.vn/assets/frontend/js/kun.js?v=1629273960"></script>
        <div class="flex justify-center py-8 footer-bg" style="border-top: 2px solid rgba(51, 51, 51, 0.25);">
            <div class="container-x w-full text-white flex flex-wrap font-semibold text-gray-300">
                <div class="md:w-1/2 w-full mb-2 px-4 font-bold">
                    HỆ THỐNG BÁN ACC TỰ ĐỘNG
                    <br>
                    ĐẢM BẢO UY TÍN VÀ CHẤT LƯỢNG.
                </div>
                <div class="md:w-1/2 w-full mb-2 px-4">
                    CHÚNG TÔI LUÔN LẤY UY TÍN LÀM HÀNG ĐẦU ĐỐI VỚI KHÁCH HÀNG. HI VỌNG SẼ
                    ĐƯỢC PHỤC VỤ CÁC BẠN. CẢM ƠN!
                </div>
                
            </div>
        </div>
       




    </body>
</html>