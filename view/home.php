<script src="/assets/js/jquery-3.6.0.min.js"></script>
  <div class="page-bottom">
			<div class="container">
			    <div class="text-center">
                    <img class="img-fluid pb-4" src="https://i.imgur.com/OIqScD3.png">
                </div>
				<div class="row">

                <?php 
    $res = mysqli_query($kun->connect_db(), "SELECT * FROM `vongquay_kimcuong` WHERE `status` = 'true' ORDER BY `id` DESC");
    while ($row = mysqli_fetch_array($res)) {
   
     ?> 
				    					<div class="col-6 col-lg-3 col-md-3 col-sm-6 col-xs-6">
						<div class="team-item text-center">
						    <h6 class="game-title font-weight-bolder"><?php echo $row['name'];?></h6>
						    <img src="<?php echo $row['thumb'];?>" class="img-fluid card-img-top">
						    <div class="row">
						        <div class="col-md-12 text-center">
									<p class="font-weight-bolder pt-3">Đã Chơi: <?php echo number_format($row['sudung']);?></p>
						            <span class="btn-nav-line btn-end-line"><?php echo number_format($row['giatien'])?> đ</span>
						            <a href="/minigame/whell-<?=$row['id'];?>">
						                <img class="button-view p-3" src="https://cdns.diongame.com/static/image-60bf62c0-1d16-4c36-8c1e-a29003fec9c1.png">
						            </a>
						        </div>
						    </div>
						</div>
					</div>                    
                    <?php } ?>
									
									                

                    <?php 
    $res = mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire` ORDER BY `id` ASC");
    while ($row = mysqli_fetch_array($res)) {
        if($row['status'] == 'true') {
            $count = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `random_freefire_nick` WHERE `status`='true' AND `cname`='".$row['cname']."'"));
     ?>

                       
                                    <div class="col-6 col-lg-3 col-md-3 col-sm-6 col-xs-6">
						<div class="team-item text-center">
						    <h6 class="game-title font-weight-bolder"><?php echo $row['name'];?></h6>
						    <img src="<?php echo $row['thumb'];?>" class="img-fluid card-img-top">
						    <div class="row">
						        <div class="col-md-12 text-center">
									<p class="font-weight-bolder pt-3">Đã Mua: <?php echo number_format($count)?></p>
															            <span class="btn-nav-line btn-end-line"><?php echo number_format($row['giatien']);?> đ</span>
						            						                                                <a href="/account/<?php echo $row['cname'];?>">
						                <img class="button-view p-3" src="https://cdns.diongame.com/static/image-60bf62c0-1d16-4c36-8c1e-a29003fec9c1.png">
						            </a>
                                    						        </div>
						    </div>
						</div>
					</div>
                        <?php } } ?>
                       
                                        
                    				</div>
			</div>
		</div>
    </section>
        <div class="modal fade" id="notify" tabindex="-1" aria-labelledby="NotifyLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title m-0" id="NotifyLabel">Thông Báo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <notify><?=$thongbao;?></notify>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
   
    
    