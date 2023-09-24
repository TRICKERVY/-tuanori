<?php

defined('HUYPLAY') or exit('Restricted Access');

?>

<script src="https://cdn.ckeditor.com/4.15.0/standard/ckeditor.js"></script>



<?php

if(isset($_POST['them_goi'])) {

	if(isset($_POST['name']) && isset($_POST['cname']) && isset($_POST['giatien']) && isset($_POST['thumb'])) {





		if(is_numeric($_POST['giatien'])) {



			if($_POST['giatien'] >= 0) {



	mysqli_query($hp->connect_db(), "INSERT INTO `random_freefire` (`name`, `cname`, `thumb`,  `giatien`, `mota`, `status`, `time`) VALUES ('".$_POST['name']."', '".$_POST['cname']."', '".$_POST['thumb']."',  '".$_POST['giatien']."', '".$_POST['mota']."', 'false', '".time()."')");

echo '<div class="alert alert-success alert-highlighted" role="alert">Đã Thêm Gói Random <b>"'.$_POST['name'].'"</b>!</div>';

		echo '<meta http-equiv="refresh" content="1;URL=" /> ';

			} else {

				echo '<div class="alert alert-danger alert-highlighted" role="alert">Giá Phải Lớn Hơn Hoặc Bằng 0!</div>';			

			}



		}else {

				echo '<div class="alert alert-danger alert-highlighted" role="alert">Giá Phải Là Dạng Số!</div>';			

		}



	}else {

				echo '<div class="alert alert-danger alert-highlighted" role="alert">Vui Lòng Nhập Đầy Đủ Thông Tin!</div>';

	}

}

?>







<form action="" method="post">

<div class="row">

                    <div class="col-12">

                        <div class="card">

                            <div class="card-body">

                                <h3 class="card-title">THÊM GÓI RANDOM</h3>

                                <span>Lưu ý: Sau Khi Thêm Gói Random, Bạn Chỉ Có Thể Chỉnh Sửa Tên Và Giá, Nếu Xóa thì toàn bộ acc trong gói sẽ bị xóa theo!</span>



<div class="row">





                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                                <label>Nhập Tên Gói Random</label>

                                                <div class="form-group">

                                                      <input type="text" id="name" name="name" placeholder="Nhập Tên Gói Random" class="form-control">

                                                </div>

                                            </div>



                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                                <label>Tên Xác Định</label>

                                                <div class="form-group">

                                                      <input type="text"  id="cname" name="cname" placeholder="Không Chỉnh Sửa" class="form-control" readonly="">

                                                </div>

                                            </div>



                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                                <label>Link Thumbnail</label>

                                                <div class="form-group">

                                                      <input type="text" id="name" name="thumb" placeholder="Nhập Link Thumbnail" class="form-control">

                                                </div>

                                            </div>





<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                                <label>Link Ảnh Random</label>

                                                <div class="form-group">

                                                      <input type="text" id="info" name="info" placeholder="Nhập Link Ảnh Random" class="form-control">

                                                </div>

                                            </div>

                                            

                                             <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                                <label>Tỉ Lệ(%)</label>

                                                <div class="form-group">

                                                      <input type="number" name="tile" placeholder="Nhập Tỉ Lệ(%)..." class="form-control">

                                                </div>

                                            </div>

                                            

                                             <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                                <label>Thể Loại</label>

                                                <div class="form-group">

                                                      <input type="text" name="loai" placeholder="Nhập Thể Loại..." class="form-control">

                                                </div>

                                            </div>

                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">

                                                <label>Giá Tiền</label>

                                                <div class="form-group">

                                                      <input type="number" name="giatien" placeholder="Nhập Giá Tiền" class="form-control">

                                                </div>

                                            </div>



                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                                 <label>Mô Tả Cho Gói Random</label>

                                                <div class="form-group">

                                                      <textarea class="form-control" rows="12" name="mota" placeholder="Nhập mô tả"></textarea>

                                                </div>

                                            </div>

                <script>

                        CKEDITOR.replace( 'mota' );

                </script>





                            <div class="col-md-12"> 

                                <center><button type="submit" name="them_goi" class="btn btn-info">THÊM GÓI RANDOM</button></center>

                            </div>





</div>





                            </div>

                        </div>

                    </div>

</div>







</form>







<div class="row">





                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<div class="card">

                            <div class="card-body">

                                <h4 class="card-title">DANH SÁCH GÓI RANDOM</h4>

                            </div>

                            <div class="table-responsive">

                                <table class="table">

                                    <thead class="thead-light">

                                        <tr>

									       <th>ID #</th>

									       <th>Gói Random</th>

									       <th>Trạng Thái</th>

									       <th>Còn Lại</th>

									       <th>Đã Bán</th>

									       <th>Giá Tiền</th>

									       <th>Thời Gian</th>

									       <th>Thao tác</th>

                                        </tr>

                                    </thead>

                                    <tbody>



    <?php

        $sql = mysqli_query($hp->connect_db(), "SELECT * FROM `random_freefire` ORDER BY `time` DESC");

        while ($row = mysqli_fetch_array($sql)) {

            if($row['status'] == 'false')$check='';else $check='checked';

            ?>



        <tr>

           <th scope="row">#<?php echo $row['id'];?></th>

           <td><?php echo $row['name'];?></td>

           <td>

          

	<div class="form-check form-switch">

                                        <input onclick="options(<?php echo $row['id'];?>, 'vq_<?php echo $row['id'];?>')" class="form-check-input"id="vq_<?php echo $row['id'];?>" type="checkbox" <?php echo $check;?>>

                                        <label class="form-check-label" for="flexSwitchCheckChecked"></label>

                                    </div>

           </td>

           <td><?php echo mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `cname`='".$row['cname']."' AND `status`='true'")) ;?></td>

           <td><?php echo mysqli_num_rows(mysqli_query($hp->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `cname`='".$row['cname']."' AND `status`='false'")) ;?></sup></td>

           <td><?php echo number_format($row['giatien']);?> <sup>vnđ</sup></td>

           <td><?php echo date('H:i d/m', $row['time']);?></td>

        <td>

           <a href="?modun=random_freefire&act=edit&id=<?php echo $row['id'];?>">

           <button type="button" class="btn btn-info btn-outline btn-xs m-r-5 tooltip-info"><i class="fa fa-edit"></i></button>

           </a>

           <button onclick="del(<?php echo $row['id'];?>, '<?php echo $row['name'];?>')" type="button" class="btn btn-danger btn-outline btn-xs m-r-5 tooltip-danger"><i class="fa fa-trash"></i></button>

        </td>

        </tr> 



        <?php

        }

        ?>





                                    </tbody>

                                </table>

                            </div>

                        </div>

                                            </div>



</div>





<script type="text/javascript">

	$("#name").change(function(){

             $.ajax({

                    url : "/administrator/model/random_freefire/get_cname.php",

                    type : "post",

                    dataType:"text",

                    data : {

                         name : $('#name').val()

                    },

                    success : function (result){

                        $('#cname').val(result);

                    }

                });

	});



</script>



<script type="text/javascript">

function del(id, name) {

	 if (confirm('Bạn có chắc muốn xóa '+name+'?')) {

	 		location.href = '?modun=random_freefire&act=delete&id='+id;

		} else {

			alert('Hãy suy nghĩ kĩ trước khi xóa gì đó nhé!');

		}

}



function options(id, element) {



		var checkbox = $('#'+element);



		if(checkbox.prop("checked") == true){

	 			$.ajax({url: '/administrator/model/random_freefire/status_random.php',

	                type: 'POST',

	                dataType: 'text',

	                data: {

	                    id: id,

	                    status: checkbox.prop("checked")

	                }

	            }).done(function(res) {});

            }else if(checkbox.prop("checked") == false){

				$.ajax({url: '/administrator/model/random_freefire/status_random.php',

	                type: 'POST',

	                dataType: 'text',

	                data: {

	                    id: id,

	                    status: checkbox.prop("checked")

	                }

	            }).done(function(res) {});

            }

}



</script>

