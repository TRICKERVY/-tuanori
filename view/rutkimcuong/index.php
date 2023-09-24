<?php
defined('KUNKEYPR') or exit('Restricted Access');
$kun->login_required();

$kmess = 8; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `username`='".$user['username']."' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `rut_kim_cuong` WHERE `username`='".$user['username']."'"));
?>

  <div class="col-span-8 sm:col-span-5 md:col-span-6 lg:col-span-6 xl:col-span-6 px-2 md:px-0">
                   <div class="v-bg w-full mb-2 px-2">
                      <h2 class="v-title border-l-4 border-gray-800 px-3 select-none text-gray-800 text-xl md:text-2xl font-bold">
                         LỊCH SỬ RÚT VẬT PHẨM
                      </h2>
                        <div class="py-2 overflow-x-scroll scrolling-touch max-w-400">
                         <table class="table-auto w-full scrolling-touch min-w-650">
                            <thead>
                               <tr class="v-border-hr border-b-2 border-gray-300">
                                  <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left">
                                     TÊN GAME
                                  </th>
                                  <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left">
                                     GIÁ TRỊ
                                  </th>
                                  <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left">
                                     ID/ACC NHẬN
                                  </th>
                                  <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left">
                                     TRẠNG THÁI
                                  </th>
                                  <th class="v-table-title py-2 text-sm font-bold text-gray-800 text-left w-24">
                                     RÚT LÚC
                                  </th>
                               </tr>
                            </thead>
                            <tbody class="text-sm font-medium">
<?php 
  while($row = mysqli_fetch_array($result)) {
    if($row) {
    if($row['status'] == 0) {
      $status = '<span class="badge badge-danger">Thẻ Sai</span>';
    }else if($row['status'] == 1) {
      $status = '<span class="badge badge-success">Thẻ Đúng</span>';
    }else if($row['status'] == 2) {
      $status = '<span class="badge badge-info">Chờ duyệt</span>';
    }
    ?>
                                          <tr>
                                        <td>#<?php echo $row['id'];?></td>
                                        <td><?php echo $row['idgame'];?></td>                                        
                                        <td><span class="c-font-bold text-danger"><?php echo number_format($row['kimcuong']);?> kc</span></td>
                                        <td><?php echo date('d/m H:i', $row['time']);?></td>
                                        <td><?php echo $status;?></td>
                                  

    <?php } else { ?>
     <td colspan="5" class="text-sm text-black text-center">
                                        Không có dữ liệu
                                     </td>
                                     <?php } } ?>
  </tr>
                        </tbody>
                    </table>
                               
                         <div class="mt-3 md:mt-6 w-full flex justify-center items-center">
              <nav class="relative z-0 inline-flex v-pagination mx-auto v-text-1">
                              </nav>
                        </div>
                        <p class="v-table-note py-1 font-semibold text-gray-800 text-sm"><i> Giao dịch bị từ chối - sẽ tự động hoàn lại tiền </i></p>
                    </div>
                </div>
             </div>
           </div>
        </div>
    </div>




  <div class="text-center"> <center>
<?php
if ($tong > $kmess){
echo '<center>' . $kun->phantrang('/html/kimcuong/', $start, $tong, $kmess) . '</center>';
}
?></div>


</div>
</div>