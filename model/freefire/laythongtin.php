<?php
require $_SERVER['DOCUMENT_ROOT'].'/Core.php';
$kun = new System;
$user = $kun->user();

$id = $_POST['id'];
$row = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `id`='".$id."'"));
?>
 
<div class="py-4 px-2 modal-body msg">
                                <div class="mb-2 text-lg text-white px-3 font-extrabold">
                    <table class="table-auto w-full"> 
                        <tbody class="text-md px-2">
                            <tr class="rounded-none border-b border-gray-800 py-8 px-2">
                                <td class="py-2 font-bold color-grant title-grant-category">HIỆN CÓ</td> 
                                <td class="px-2 py-2 text-gray-200 uppercase title-grant-category text-right"><?=number_format($user['money']);?> VND</td>
                            </tr> 
                            <tr class="rounded-none border-b border-gray-800 py-8 px-2">
                                <td class="py-2 font-bold color-grant title-grant-category">GIÁ MUA TK</td>
                                <td class="px-2 py-2 text-gray-200 uppercase title-grant-category text-right"><?php echo number_format($row['giatien']);?> VND</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                            </div>

            <div id="buyButton">
                <?php if(!$user) { ?>
                <div class="flex justify-center pb-3 px-5">
                                        <a href="/dang-nhap" class="block btn-inner text-center ff-lalezar w-40 focus:outline-none py-1 px-6 font-bold text-xl rounded-none">
                        <span  class="relative" style="top: 1px;">ĐĂNG NHẬP</span>
                    </a>
                                        <button type="button" class="ml-2 block btn-inner text-center ff-lalezar focus:outline-none py-1 px-6 font-bold text-xl rounded-none" data-dismiss="modal">Đóng</button>
                </div>
                <?php } else if($user['money'] < $getdv['giatien']) { ?>
                <div class="flex pad-3 pad-5 justify-between"><div class="flex items-center text-white"><a href="/account/card" class="ml-1 bg-red-600 focus:outline-none py-1 px-2 font-bold text-md md:text-lg rounded-none"><span class="relative" style="top: 1px;">NẠP THẺ</span></a> <button class="ml-1 bg-red-600 focus:outline-none py-1 px-2 font-bold text-md md:text-lg rounded-none" data-toggle="modal" data-target="#momoModal"><span class="relative" style="top: 1px;">NẠP MOMO/ATM</span></button></div><button type="button" class="ml-2 block btn-inner text-center ff-lalezar focus:outline-none py-1 px-6 font-bold text-xl rounded-none" data-dismiss="modal">OK</button></div>
                <?php }else{ ?>
                 <div class="flex justify-center pb-3 px-5">
                                        <button type="button" class="ml-2 block btn-inner text-center ff-lalezar focus:outline-none py-1 px-6 font-bold text-xl rounded-none buy" onclick="mua_acc('<?php echo $row['id'];?>')">MUA</button>
                                        <button type="button" class="ml-2 block btn-inner text-center ff-lalezar focus:outline-none py-1 px-6 font-bold text-xl rounded-none" data-dismiss="modal">Đóng</button>
                </div>
                <?php } ?>
       



            </div>

