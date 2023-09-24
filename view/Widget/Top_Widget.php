<section class="page">
	    <div class="cover" data-image="/assets/images/bg-cover.png">
    		<div class="page-top">
    			<div class="container">
    				<div class="row">
    					<div class="col-lg-12 pt-5 pb-5">
    					    <div class="col-banner-mobile">
            					<img src="<?=$banner['url'];?>" class="img-fluid">
				            </div>
                            <div class="col-info">
            			        <div class="team-item">
            		            	<ul class="nav nav-tabs nav-pills nav-fill" id="postsTab" role="tablist">
            							<li class="nav-item" role="presentation">
            							    <button aria-controls="cardtab" aria-selected="true" class="nav-link font-weight-bolder active" data-bs-target="#cardtab" data-bs-toggle="tab" id="cardtab-tab" role="tab" type="button" style="padding: 12px;">NẠP THẺ</button>
            							</li>
            							<li class="nav-item" role="presentation">
            							    <button aria-controls="topcard" aria-selected="false" class="nav-link font-weight-bolder" data-bs-target="#topcard" data-bs-toggle="tab" id="topcard-tab" role="tab" type="button" style="padding: 12px;">TOP NẠP THẺ THÁNG <?=date('m');?></button>
        							    </li>
            						</ul>
            						<div class="tab-content post-tabs" id="postsTabContent">
                						<div aria-labelledby="cardtab-tab" class="tab-pane fade show active" id="cardtab" role="tabpanel">
                    						<form id="card" class="team-content contact-form">
                    					        <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <select name="card_type" class="form-control">
                                                            <option selected>Chọn Loại Thẻ</option>
                                                            <option value="Viettel">Viettel</option>
                                                            <option value="Mobifone">Mobifone</option>
                                                            <option value="Vinaphone">Vinaphone</option>
                                                            <option value="Vietnamobile">Vietnamobile</option>
                                                            <option value="Gate">Gate</option>
                                                            <option value="Garena">Garena</option>
                                                            <option value="Zing">Zing</option>
                                                            <option value="Vcoin">Vcoin</option>
                                                        </select>
                    						        </div>
                    						    </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                    						            <input class="form-control" placeholder="Mã thẻ" name="pin" type="text">
                    						        </div>
                    						    </div>
                    						    <div class="col-md-12">
                                                    <div class="mb-3">
                    						            <input class="form-control" placeholder="Số seri" name="serial" type="text">
                    						        </div>
                    						    </div>
                    						    <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <select name="card_amount" class="form-control">
                                                            <option>Chọn Mệnh Giá - Chọn Sai Mất Thẻ</option>
                                                            <option value="10000">10.000</option>
                                                            <option value="20000">20.000</option>
                                                            <option value="30000">30.000</option>
                                                            <option value="50000">50.000</option>
                                                            <option value="100000">100.000</option>
                                                            <option value="200000">200.000</option>
                                                            <option value="300000">300.000</option>
                                                            <option value="500000">500.000</option>
                                                            <option value="1000000">1.000.000</option>
                                                        </select>
                    						        </div>
                    						    </div>
                    						    <div class="col-md-12">
                    						        <div class="mb-1">
                    						            <button class="btn-primary-line" type="submit">Nạp Thẻ</button>
                    						        </div>
                    						    </div>
                    						</form>
                    					</div>
                    					<div aria-labelledby="topcard-tab" class="tab-pane fade sa-topthe" id="topcard" role="tabpanel">
                    					                
                    					                
                    					                <?php
                                    $huy = mysqli_query($kun->connect_db(), "SELECT * FROM `users` ORDER BY `money_nap` DESC LIMIT 5");
                                    $i = 1;
                                    while ($hp = mysqli_fetch_array($huy)) { ?>
                                       <li>
                              <i><?=$i;?></i>
                                                    <span style="font-weight:bold;"><?php echo $hp['username']; ?></span>
                                                    <label><?php echo number_format($hp['money_nap']); ?><sup>đ</sup></label>
                                                </li>
                                    
                                  <?php
                                        $i++;
                                    } ?>


    										            							</div>
                    				</div>
            					</div>
            			    </div>
            		        <div class="col-banner">
            					<div class="blog-post-thumb">
            						<div class="img">
            							<img src="<?=$_banner['url'];?>" alt="">
            						</div>
            					</div>
				            </div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
        