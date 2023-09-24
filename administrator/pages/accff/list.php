<?pkun
defined('HUYPLAY') or exit('Restricted Access');
$cname = $_GET['cname'];

 $sql1 = mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `status`='1' ORDER BY `time` DESC");
 $sql2 = mysqli_query($kun->connect_db(), "SELECT * FROM `nickff` WHERE `status`='0' ORDER BY `time` DESC");

?>


<div class="row">


      <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">DANH SÁCH ACC FREEFIRE ĐANG BÁN</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                               <th>STT</th>
                                               <th>Username</th>
                                               <th>Password</th>
                                               <th>Thời Gian</th>
                                               <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?pkun 

                          while ($row = mysqli_fetch_array($sql1)) {
                            ?>
<tr>
   <th scope="row">#<?pkun echo $row['id'];?></th>
   <td><?pkun echo $row['taikhoan'];?></td>
   <td><?pkun echo $row['matkhau'];?></td>
   <td><?pkun echo date('d/m G:i', $row['time']);?></td>
   <td>
             <button onclick="del(<?pkun echo $row['id'];?>)" type="button" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="fa fa-trash"></i></button>
    </td>
</tr> 


                          <?pkun
                            }
                          ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




      <div class="col-md-6 col-lg-6 col-xs-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">DANH SÁCH ACC FREEFIRE ĐÃ BÁN</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                       <th>STT</th>
                                       <th>Username</th>
                                       <th>Password</th>
                                       <th>Người Mua</th>
                                       <th>Thời Gian</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                          <?pkun 

                          while ($row2 = mysqli_fetch_array($sql2)) {
                            ?>
<tr>
   <th scope="row">#<?pkun echo $row2['id'];?></th>
   <td><?pkun echo $row2['taikhoan'];?></td>
   <td><?pkun echo $row2['matkhau'];?></td>
   <td><?pkun echo $row2['nguoimua'];?></td>
   <td><?pkun echo date('d/m G:i', $row2['time']);?></td>
</tr> 


                          <?pkun
                            }
                          ?>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


</div>





<script type="text/javascript">
function del(id) {
   if (confirm('Bạn có chắc muốn xóa acc frefirefire này?')) {
      location.href = '/adminisrtator/?modun=accff&act=delete&id='+id;
    } else {
      alert('Hãy suy nghĩ kĩ trước khi xóa gì đó nhé!');
    }
}
</script>