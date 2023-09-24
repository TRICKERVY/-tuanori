  <?php
 defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();
require $_SERVER['DOCUMENT_ROOT'].'/lib/xss_anti/xss_anti.php';
$xss = new Xss_Anti; 

$kmess = 10; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `username`='".$user['username']."' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `napthe` WHERE `username`='".$user['username']."'"));

 ?>

 <div id="VScrollRecharge" class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
            <div class="v-bg w-full mb-2 px-2">
                <h2 class="v-title border-l-4 px-3 select-none text-gray-800 text-xl md:text-2xl font-bold">
                    LỊCH SỬ NẠP THẺ
                </h2>
                <div class="v-table-content select-text">
                    <div class="py-2 overflow-x-auto scrolling-touch max-w-400">
                        <table class="table-auto w-full scrolling-touch min-w-850">
                            <thead>
                                <tr class="v-border-hr select-none border-b-2 border-gray-300">
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        ID
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        NHÀ MẠNG
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        MỆNH GIÁ
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        MÃ THẺ
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        SERIAL
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        TRẠNG THÁI
                                    </th>
                                    <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left px-1">
                                        NẠP LÚC
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-semibold">
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
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b">#<?php echo $xss->xss_clean($row['id']);?></td>
                           <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($row['type']);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo number_format($xss->xss_clean($row['amount']));?> VNĐ</td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($row['pin']);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($row['serial']);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo $xss->xss_clean($status);?></td>
                            <td class="text-sm text-gray-800 text-left px-1 py-1 border-b"><?php echo date('d/m H:i', $row['time']);?></td>
                        </tr>
                        
                              <?php } ?>
                          
                            </tbody>
                        </table>

                        <?php if(!$result) {echo'<div class="v-found-table h-32 w-full text-sm select-none flex items-center justify-center text-gray-800 opacity-50">
                            Không có dữ liệu
                        </div>'; } ?>
                    </div>

                    <div class="v-table-note mt-1 py-1 font-semibold text-gray-800 text-sm">
                        Dùng điện thoại <i class="bx bxs-mobile"></i>, hãy vuốt bảng từ phải qua trái (<i class="bx bxs-arrow-from-right"></i>) để xem đầy đủ thông tin!
                    </div>
                                        <div class="mt-3 md:mt-6 w-full flex justify-center items-center">
                       <?php
if ($tong > $kmess){
echo  $kun->phantrang_user('/user/tran/recharge/', $start, $tong, $kmess);
}
?>




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