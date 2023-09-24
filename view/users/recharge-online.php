  <div id="VScrollPurchasedAccount" class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="w-full mb-10">
                <h2 class="v-title uppercase border-l-4 border-gray-800 px-3 select-none text-gray-800 text-xl md:text-2xl font-bold">
                    Nạp tiền ATM/MOMO
                </h2>
                <div class="mt-4 text-gray-900 recharge-online text-gray-800">
                    <div class="p-2 border-t border-r border-l border-gray-300 rounded-t-sm">
                        <div class="flex justify-between items-center cursor-pointer">
                            <div class="flex select-none">
                                <img class="h-10 w-10 rounded" src="https://lthquanly.shop/assets/img/bank.png" />
                                <div class="ml-2 text-left">
                                    <h2 class="font-bold text-base">
                                        Chuyển khoản qua Viettinbank
                                    </h2>
                                    <p class="text-xs">Chuyển khoản ngân hàng online.</p>
                                </div>
                            </div>
                            <button data-id="#atm" class="select-none focus:outline-none bg-pink-600 text-white text-xs inline-block h-5 flex items-center justify-center font-semibold px-2 rounded">
                                Chi tiết
                            </button>
                        </div>
                        <div id="atm" class="hide">
                            <div class="border-t border-gray-200 mt-2 p-2 select-text">
                                <div class="relative">
                                    <p><strong style="color: rgb(230, 0, 0);">THÔNG TIN TÀI KHOẢN NGÂN HÀNG</strong></p>
                                    <p><strong style="color: rgb(230, 0, 0);">CHỦ TÀI KHOẢN: TRUONG DAN HUY</strong></p>
                                    <p><strong style="color: rgb(230, 0, 0);">SỐ TÀI KHOẢN: 105872465067</strong></p>
                                </div>
                             <button id="copy" data-clipboard-text="105872465067" class="border focus:outline-none border-gray-500 px-2 bg-gray-500 rounded text-xs font-bold text-white">
                            Sao chép
                            </button>
                            </div>
                            <div class="border-t border-gray-200 w-full">
                                <div class="p-2">
                                    <div>Nội dung chuyển khoản của bạn:</div>
                                    <div class="my-2 flex items-center w-full text-center">
                                        <span class="font-bold border-dashed border border-red-600 rounded inline-flex justify-center text-center text-red-500 py-1 rounded px-4 select-text">
                                            NAPTIEN shophungtuan <?=$user['username'];?>                                     </span>
                                       <button type="button" id="copy" data-clipboard-text="NAPTIEN shophungtuan <?=$user['username'];?>" class="ml-1 bg-gray-500 font-semibold text-white rounded focus:outline-none py-1 px-3">
                                     Sao chép
                                        </button>
                                    </div>
                                    <div class="border-t border-gray-200 mt-1 w-full">
                                        <div class="py-2">
                                        <div class="my-2 w-full">
                                            <button type="submit" class="focus:outline-none h-10 px-4 rounded bg-blue-500 text-white font-semibold">
                                              Xác nhận. Tôi đã chuyển
                                         </button>
                                         </div>
                                            <div class="my-2">
                                                <b> Lưu ý:&nbsp;</b>&nbsp;Vui lòng ghi đúng nội dung chuyển khoản
                                                <b class="border-dashed border border-red-600 rounded inline-flex justify-center text-center text-red-600 px-2 select-text"> NAPTIEN huyplay <?=$user['username'];?> </b>. Nếu không hệ thống sẽ không thể cộng tiền vào tài khoản của bạn.
                                                <p><b>*</b>Trong trường hợp ghi nhầm nội dung, shop sẽ không chịu trách nhiệm!</p>
                                                Nên
                                                <b class="text-red-500">chuyển&nbsp;cùng ngân hàng</b>&nbsp;để nhận được tiền nhanh nhất. Nếu chuyển khác ngân hàng bạn chọn hình thức&nbsp;
                                                <b class="text-red-500">chuyển tiền nhanh 24/7</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-2 border border-gray-300 rounded-b-sm">
                        <div class="flex justify-between items-center cursor-pointer">
                            <div class="flex select-none">
                                <img class="h-10 w-10 rounded" src="https://lthquanly.shop/assets/img/momo.png" />
                                <div class="ml-2 text-left">
                                    <h2 class="font-bold text-base">
                                        Chuyển khoản qua ví Momo
                                    </h2>
                                    <p class="text-xs">Chuyển khoản trên ứng dụng Momo.</p>
                                </div>
                            </div>
                            <button data-id="#momo" class="select-none focus:outline-none bg-pink-600 text-white text-xs inline-block h-5 flex items-center justify-center font-semibold px-2 rounded">
                                Chi tiết
                            </button>
                        </div>
                        <div id="momo" class="hide">
                            <div class="border-t border-gray-200 mt-2 p-2 select-text">
                                <div class="relative">
                                    <p><strong style="color: rgb(230, 0, 0);">THÔNG TIN VÍ ĐIỆN TỬ</strong></p>
                                    <p><strong style="color: rgb(230, 0, 0);">CHỦ TÀI KHOẢN: TRUONG DAN HUY</strong></p>
                                    <p><strong style="color: rgb(230, 0, 0);">SÔ TÀI KHOẢN: 0962831145</strong></p>
                                </div>
                            <button id="copy" data-clipboard-text="0962831145" class="border focus:outline-none border-gray-500 px-2 bg-gray-500 rounded text-xs font-bold text-white">
                               Sao chép
                            </button>
                            </div>
                            
                            <div class="border-t border-gray-200 mt-1 w-full">
                                <div class="p-2">
                                    <div>Nội dung chuyển khoản của bạn:</div>
                                    <div class="my-2 flex items-center w-full text-center">
                                        <span class="font-bold border-dashed border border-red-600 rounded inline-flex justify-center text-center text-red-500 py-1 rounded px-4 select-text">
                                            NAPTIEN HUYPLAY <?=$user['username'];?>                                        </span>
                                       <button type="button" id="copy" data-clipboard-text="NAPTIEN HUYPLAY <?=$user['username'];?>"  class="ml-1 bg-gray-500 font-semibold text-white rounded focus:outline-none py-1 px-3">
                                      Sao chép
                                     </button>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t border-gray-200 mt-1 w-full">
                                <div class="p-2">
                                 <div class="my-2 w-full">
                                        <span>
                                            <form class="flex-none md:flex items-center">
                                                <span>
                                                    <input type="number" pattern="[0-9]*" placeholder="Mã giao dịch momo..." class="w-full md:w-48 h-10 px-4 border rounded border-gray-300 focus:outline-none" />
                                                    <button  class="focus:outline-none mt-2 md:mt-0 md:ml-2 h-10 px-4 rounded bg-blue-500 text-white font-semibold">
                                                        Xác nhận, Tôi đã chuyển
                                                    </button>
                                                    <span class="mt-1 flex items-center font-semibold tracking-wide text-red-500 text-xs"> </span>
                                                </span>
                                            </form>
                                        </span>
                                    </div>  
                                    <div class="my-2">
                                        <b> Lưu ý:&nbsp;</b>&nbsp;Vui lòng ghi đúng nội dung chuyển khoản
                                        <b class="border-dashed border border-red-600 rounded inline-flex justify-center text-center text-red-600 px-2 select-text">
                                            NAPTIEN shophungtuan <?=$user['username'];?>                                       </b>
                                        . Nếu không hệ thống sẽ không thể cộng tiền vào tài khoản của bạn.
                                        <p><b>*</b>Trong trường hợp ghi nhầm nội dung, shop sẽ không chịu trách nhiệm!</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<style>
    .hide{
        display: none;
    }
</style>
</div>
</div>
</div>

