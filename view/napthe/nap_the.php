<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';
$xss = new Xss_Anti; 

$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `username`='".$user['username']."' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `username`='".$user['username']."'"));
?>

	 <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
                    <div class="w-full mb-2">
                        <div class="rounded w-full">
                            <span>
                                <form method="POST" action="" id="payin" class="w-full">
                                    <h2 class="v-title border-l-4 border-gray-800 px-3 select-none text-gray-800 text-xl md:text-2xl font-bold">
                                        KHU NẠP THẺ
                                    </h2>
                                    <div class="py-3 px-5">
                                        <span class="mb-2 block">
                                            <div class="flex items-center relative">
                                                <select name="type" class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                                    <option value="">Chọn nhà mạng</option>
                                                    <option value="VIETTEL">VIETTEL</option>
                                                    <option value="VINAPHONE">VINAPHONE</option>
                                                    <option value="MOBIFONE">MOBIFONE</option>
                                                    <!--<option value="VIETNAMOBILE">VIETNAMOBILE</option>-->
                                                    <!--<option value="ZING">ZING</option>-->
                                                    <!--<option value="GATE">GATE</option>-->
                                                    <!--<option value="SCOIN">SCOIN</option>-->
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </span>
                                        <span class="mb-2 block">
                                            <div class="flex items-center relative">
                                                <select name="amount" class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                                    <option value="">Chọn mệnh giá</option>
                                                    <option value="10000">10.000 VNĐ </option>
                                                    <option value="20000">20.000 VNĐ </option>
                                                    <option value="30000">30.000 VNĐ </option>
                                                    <option value="50000">50.000 VNĐ</option>
                                                    <option value="100000">100.000 VNĐ </option>
                                                    <option value="200000">200.000 VNĐ </option>
                                                    <option value="500000">500.000 VNĐ </option>
                                                    <option value="1000000">1.000.000 VNĐ </option>
                                                </select>
                                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current h-4 w-4">
                                                        <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </span>
                                        <span class="mb-2 block">
                                            <div class="flex items-center relative">
                                                <input placeholder="Mã số thẻ" name="code" value="" class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                            </div>
                                        </span>
                                        <span class="mb-2 block">
                                            <div class="flex items-center relative ">
                                                <input placeholder="Số serial" name="serial" value="" class="border border-gray-500 rounded bg-white text-gray-800 appearance-none w-full py-2 px-3 leading-tight focus:outline-none">
                                            </div>
                                        </span>
                                        <div class="mt-4 text-center">
                                            <button type="button" class="uppercase flex w-40 font-semibold rounded items-center justify-center h-10 text-white text-xl rounded-none focus:outline-none px-4 text-center bg-red-500 hover:bg-red-600 save">
                                            Nạp thẻ
                                            </button>
                                        </div>
                                        <div class="text-center mt-2 text-white font-semibold text-sm">
                                            Hãy chọn đúng mệnh giá. Sai sẽ mất thẻ
                                        </div>
                                    </div>
                                </form>
                            </span>
                        </div>
                    </div>
                </div>
           </div>
        </div>
    </div>
    <div class="modal fade modal-create items-center justify-center" id="notiModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-container border-grant w-modal bg-gray-900 max-w-md mx-auto rounded-none z-50 overflow-y-auto" role="document">
            <div class="modal-content w-modal max-w-sm text-left select-none mx-auto" style="background:#1a202c;">
                <div class="relative py-2 px-4 bg-black bg-grant-1 text-xl font-bold">
                    <h5 class="modal-title title-grant-category">THÔNG BÁO</h5>
                </div>
                <div class="py-4 px-2 modal-body">
                    <div class="mb-2 text-xl text-white font-extrabold">
                        <div  class="relative px-2 title-grant-category text-center status">
                        </div>
                    </div>
                </div>
                <div class="flex justify-center pb-3 px-5">
                    <button type="button" class="ml-2 block btn-inner text-center ff-lalezar focus:outline-none py-1 px-6 font-bold text-xl rounded-none" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
    <script>
    $(".save").click(function(){
        $.ajax({
            url : '/payin',
            type : 'POST',
            dataType : 'JSON',
            data : new FormData($('form#payin')[0]),
            cache: false,
            contentType: false,
            processData: false,
            success: function(data){
                if(data.status == 0){
                    $('.status').html(data.message);
                    $('#notiModal').modal('show');
                    setTimeout(function(){
                        window.location.reload();
                    }, 2000);
                }else{
                    $('.status').html(data.message);
                    $('#notiModal').modal('show');
                }
                
            }
        });
    });
    </script>
                                            <?php 

	while($row = mysqli_fetch_array($result)) {
	    
		if($row['status'] == 0) {
			$status = '<p style="color: red;">Thất Bại</p>';
		}else if($row['status'] == 1) {
			$status = '<p style="color: green;">Thành Công</p>';
		}else if($row['status'] == 2) {
			$status = '<p style="color: yellow;">Chờ Duyệt</p>';
		}
		
		?>

                                    <tr>
                                    	<td><?php echo $xss->xss_clean($row['id']);?></td>
                                        <td><?php echo number_format($xss->xss_clean($row['amount']));?>đ</td>
                                        <td><?php echo $xss->xss_clean($status);?></td>
                                        <td><?php echo $xss->xss_clean($row['type']);?></td>
                                        <td class="text-center"><?php echo $xss->xss_clean($row['serial']);?></td>
                                        <td class="text-center"><?php echo $xss->xss_clean($row['pin']);?></td>
                                    	<td><?php echo date('d/m H:i', $row['time']);?></td>
                                    </tr>


		<?php
	}
?>
 <tr>
                                                <td class="text-center" colspan="7"><a href="/lich-su-nap.html">Xem thêm</a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                        </div>
                    </div>