<?php
defined('KUNKEYPR') or exit('Restricted Access');

// phân trang trang 2 trở đi bị lỗi nên phải thêm đoạn này
if($kun->tim_chuoi($_GET['cname'], '/page=')) {
	$exp = explode("/page=", $_GET['cname']);
	$_GET['cname'] = $exp[0];
	$_REQUEST['page'] = $exp[1];
}


$kmess = 16; // Số phim hiện trong mỗi page
$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;
$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);

 $thread = mysqli_fetch_assoc(mysqli_query($kun->connect_db(), "SELECT * FROM `random_lienquan` WHERE `cname`='".$_GET['cname']."'"));
 $result = mysqli_query($kun->connect_db(), "SELECT * FROM `random_lienquan_nick` WHERE `status`='true' AND `cname`='".$_GET['cname']."' ORDER BY time DESC LIMIT $start, $kmess");
 $tong = mysqli_num_rows(mysqli_query($kun->connect_db(), "SELECT * FROM `random_lienquan_nick` WHERE `status`='true' AND `cname`='".$_GET['cname']."'"));
?>





<style>
    .mt-stand {
        transform: rotate(90deg);
        -webkit-transform: rotate(90deg);
        -ms-transform: rotate(90deg);
        -moz-transform: rotate(90deg);
    }

    .mt-element-ribbon {
        position: relative;
        margin-bottom: 30px;
    }

        .mt-element-ribbon .ribbon-content {
            margin: 0;
            padding: 25px;
            clear: both;
        }

            .mt-element-ribbon .ribbon-content.no-padding {
                padding-top: 0;
            }

        .mt-element-ribbon .ribbon {
            padding: 6px 15px;
            z-index: 5;
            float: left;
            margin: 10px 0 0 -2px;
            clear: left;
            position: relative;
            background-color: #bac3d0;
            color: #384353;
            opacity: 0.9;
        }

            .mt-element-ribbon .ribbon.ribbon-right {
                float: right;
                clear: right;
                margin: 10px -2px 0 0;
            }

            .mt-element-ribbon .ribbon.ribbon-vertical-left {
                clear: none;
                margin: -2px 0 0 10px;
                padding: 14px;
                width: 41px;
                text-align: center;
            }

            .mt-element-ribbon .ribbon.ribbon-vertical-right {
                clear: none;
                float: right;
                margin: -2px 10px 0 0;
                padding: 14px;
                width: 41px;
                text-align: center;
            }

            .mt-element-ribbon .ribbon.ribbon-shadow {
                box-shadow: 2px 2px 7px rgba(0, 0, 0, 0.4);
            }

                .mt-element-ribbon .ribbon.ribbon-shadow.ribbon-right, .mt-element-ribbon .ribbon.ribbon-shadow.ribbon-vertical-right {
                    box-shadow: -2px 2px 7px rgba(0, 0, 0, 0.4);
                }

            .mt-element-ribbon .ribbon.ribbon-round {
                border-top-right-radius: 5px !important;
                border-bottom-right-radius: 5px !important;
            }

                .mt-element-ribbon .ribbon.ribbon-round.ribbon-right {
                    border-top-right-radius: 0px !important;
                    border-bottom-right-radius: 0px !important;
                    border-top-left-radius: 5px !important;
                    border-bottom-left-radius: 5px !important;
                }

                .mt-element-ribbon .ribbon.ribbon-round.ribbon-vertical-right, .mt-element-ribbon .ribbon.ribbon-round.ribbon-vertical-left {
                    border-top-right-radius: 0px !important;
                    border-bottom-right-radius: 5px !important;
                    border-top-left-radius: 0px !important;
                    border-bottom-left-radius: 5px !important;
                }

            .mt-element-ribbon .ribbon.ribbon-border:after {
                border: 1px solid;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-vert:after {
                border-top: none;
                border-bottom: none;
                border-left: 1px solid;
                border-right: 1px solid;
                content: '';
                position: absolute;
                top: 0;
                bottom: 0;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-hor:after {
                border-top: 1px solid;
                border-bottom: 1px solid;
                border-left: none;
                border-right: none;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 0;
                right: 0;
            }

            .mt-element-ribbon .ribbon.ribbon-border-dash:after {
                border: 1px solid;
                border-style: dashed;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-dash-vert:after {
                border-top: none;
                border-bottom: none;
                border-left: 1px solid;
                border-right: 1px solid;
                border-left-style: dashed;
                border-right-style: dashed;
                content: '';
                position: absolute;
                top: 0;
                bottom: 0;
                left: 5px;
                right: 5px;
            }

            .mt-element-ribbon .ribbon.ribbon-border-dash-hor:after {
                border-top: 1px solid;
                border-bottom: 1px solid;
                border-left: none;
                border-right: none;
                border-top-style: dashed;
                border-bottom-style: dashed;
                content: '';
                position: absolute;
                top: 5px;
                bottom: 5px;
                left: 0;
                right: 0;
            }

            .mt-element-ribbon .ribbon.ribbon-clip {
                left: -10px;
                margin-left: 0;
            }

                .mt-element-ribbon .ribbon.ribbon-clip.ribbon-right {
                    left: auto;
                    right: -10px;
                    margin-right: 0;
                }

            .mt-element-ribbon .ribbon > .ribbon-sub {
                z-index: -1;
                position: absolute;
                padding: 0;
                width: 100%;
                height: 100%;
                top: 0;
                left: 0;
            }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip:before, .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip:after {
                    content: '';
                    position: absolute;
                    border-style: solid;
                    border-color: transparent !important;
                    bottom: -10px;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip:before {
                    border-width: 0 10px 10px 0;
                    border-right-color: #222 !important;
                    left: 0;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:before, .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:after {
                    content: '';
                    position: absolute;
                    border-style: solid;
                    border-color: transparent;
                    bottom: -10px;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:before {
                    border-right-color: transparent !important;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-clip.ribbon-right:after {
                    border-width: 0 0 10px 10px;
                    border-left-color: #222 !important;
                    right: 0;
                }

                .mt-element-ribbon .ribbon > .ribbon-sub.ribbon-bookmark:after {
                    border-left: 21px solid;
                    border-right: 20px solid;
                    border-bottom: 1em solid transparent !important;
                    bottom: -1em;
                    content: '';
                    height: 0;
                    left: 0;
                    position: absolute;
                    width: 0;
                }

            .mt-element-ribbon .ribbon:after {
                border-color: #62748f;
            }

            .mt-element-ribbon .ribbon > .ribbon-sub {
                background-color: #bac3d0;
                color: #384353;
            }

                .mt-element-ribbon .ribbon > .ribbon-sub:after {
                    border-color: #62748f;
                    border-left-color: #bac3d0;
                    border-right-color: #bac3d0;
                }

            .mt-element-ribbon .ribbon.ribbon-color-default {
                background-color: #bac3d0;
                color: #384353;
            }

                .mt-element-ribbon .ribbon.ribbon-color-default:after {
                    border-color: #9ca8bb;
                }

                .mt-element-ribbon .ribbon.ribbon-color-default > .ribbon-sub {
                    background-color: #bac3d0;
                    color: #384353;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-default > .ribbon-sub:after {
                        border-color: #62748f;
                        border-left-color: #bac3d0;
                        border-right-color: #bac3d0;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-primary {
                background-color: #337ab7;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-primary:after {
                    border-color: #286090;
                }

                .mt-element-ribbon .ribbon.ribbon-color-primary > .ribbon-sub {
                    background-color: #337ab7;
                    color: black;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-primary > .ribbon-sub:after {
                        border-color: #122b40;
                        border-left-color: #337ab7;
                        border-right-color: #337ab7;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-info {
                background-color: #659be0;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-info:after {
                    border-color: #3a80d7;
                }

                .mt-element-ribbon .ribbon.ribbon-color-info > .ribbon-sub {
                    background-color: #659be0;
                    color: #0c203a;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-info > .ribbon-sub:after {
                        border-color: #1d4f8e;
                        border-left-color: #659be0;
                        border-right-color: #659be0;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-success {
                background-color: #36c6d3;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-success:after {
                    border-color: #27a4b0;
                }

                .mt-element-ribbon .ribbon.ribbon-color-success > .ribbon-sub {
                    background-color: #36c6d3;
                    color: #020808;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-success > .ribbon-sub:after {
                        border-color: #14565c;
                        border-left-color: #36c6d3;
                        border-right-color: #36c6d3;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-danger {
                background-color: #ed6b75;
                color: #fff;
            }

                .mt-element-ribbon .ribbon.ribbon-color-danger:after {
                    border-color: #e73d4a;
                }

                .mt-element-ribbon .ribbon.ribbon-color-danger > .ribbon-sub {
                    background-color: #ed6b75;
                    color: #4f0a0f;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-danger > .ribbon-sub:after {
                        border-color: #a91520;
                        border-left-color: #ed6b75;
                        border-right-color: #ed6b75;
                    }

            .mt-element-ribbon .ribbon.ribbon-color-warning {
                background-color: #F1C40F;
                color: #010100;
            }

                .mt-element-ribbon .ribbon.ribbon-color-warning:after {
                    border-color: #c29d0b;
                }

                .mt-element-ribbon .ribbon.ribbon-color-warning > .ribbon-sub {
                    background-color: #F1C40F;
                    color: #010100;
                }

                    .mt-element-ribbon .ribbon.ribbon-color-warning > .ribbon-sub:after {
                        border-color: #614f06;
                        border-left-color: #F1C40F;
                        border-right-color: #F1C40F;
                    }

    .img-rank {
        width: 80px;
        height: 80px;
        z-index: 5;
        top: 240px;
        right: 25px;
        position: absolute;
    }

    .img-rank2 {
        width: 128px;
        height: 128px;
        z-index: 5;
        top: 180px;
        right: -15px;
        position: absolute;
        -ms-transform: rotate(15deg);
        -webkit-transform: rotate(15deg);
        transform: rotate(15deg);
    }

    .img-khung {
        width: 72px;
        height: 72px;
        z-index: 4;
        top: 200px;
        right: 45px;
        position: absolute;
        -ms-transform: rotate(-10deg);
        -webkit-transform: rotate(-10deg);
        transform: rotate(-10deg);
    }

    .img-item {
        width: 50px;
        height: 50px;
        z-index: 4;
        top: 225px;
        right: 85px;
        position: absolute;
        -ms-transform: rotate(-25deg);
        -webkit-transform: rotate(-25deg);
        transform: rotate(-25deg);
    }
</style>

	<div class="container" >


<script src="/assets/boot.js"></script>

<script src="/assets/filter.js"></script>
<form id="vl" class="form-inline m-b-10" role="form">
    <input type="hidden" name="total" value="29">
    <input type="hidden" name="type" value="CAOCAP">


    

</form>
</div>


            <div class="sc_prod_cate">
            <div class="container"  style="    background-color: rgba(0,0,0,0.8); margin-bottom:15px">



                  <div class="c-content-title-4">
              					<h3 class="c-font-uppercase c-center c-font-bold c-line-strike"><span class="c-bg-grey-1">Shop Bán Acc CAOCAP - Bán Acc CAOCAP Giá Rẻ, Uy Tín Hàng Đầu Việt Nam </span></h3>
              				</div>




            <div class="m-l-10 m-r-10">

            <div class="list_prod_cate clearfix">

                    <div class="row row-flex  item-list">


<?php 
while ($row = mysqli_fetch_array($result)) { ?>

                



<div class="col-sm-6 col-md-3">
    <div class="classWithPad">
        <div class="image">

            <a href="#" class="load-modal" rel="/buyruby/201059">
                <img src="<?php echo $thread['thumb'];?>">
                <span class="ms">MS: <?php echo $row['id'];?></span>
            </a>

        </div>
        <div class="description">

        </div>
        <div class="attribute_info">
            <div class="row">

	
            </div>
        </div>
             <div class="a-more">
            <div class="row">
                <div class="col-xs-6">
                    <div class="price_item">
                        <?php echo number_format($thread['giatien']);?>đ

                    </div>
                </div>
                <div class="col-xs-6 ">
                    <div class="view">
                        				                          
                                                <a href="#" class="load-modal" onclick="getdata('<?php echo $row['id'];?>')">Mua ngay</a>

                        
                                            </div>
                </div>

            </div>
        </div>
    </div>
</div>


<?php } ?>

<div class="col-xs-12 col-md-12 col-lg-12 col-sm-12">
	<center>
<?php
if ($tong > $kmess){
echo '<center>' . $kun->phantrang('/random/lienquan/'.$_GET['cname'].'/', $start, $tong, $kmess) . '</center>';
}
?>
	</center>
</div>

</div>


</div>



<div class="modal fade" id="LoadModal" role="dialog" style="display: none;" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            </div>
        </div>
    </div>


                </div>


<div class="modal fade" id="noticeModal" role="dialog" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <h4 class="modal-title" style="font-weight: bold;text-transform: uppercase;color: #FF0000;text-align: center">Thông báo</h4>
                </div>

                <div class="modal-body" style="font-family: helvetica, arial, sans-serif; color:black">

                    <p><strong>Nhận Ngay 1 Nick Trắng Thông Tin Từ 20-84 Tướng Và</strong></p>
<p><strong>50% Acc Có Đá Qúy,Ngọc 90</strong></p>
<p><strong>50% Acc Không Đá Qúy</strong></p>                </div>

                <div class="modal-footer">
                    <button type="button" class="btn c-theme-btn c-btn-border-2x c-btn-square c-btn-bold c-btn-uppercase" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
</div>

<script>
    $(function(){
                        $('#noticeModal').modal('show')



    });
</script>
<script type="text/javascript">
	function getdata(id) {
		var curModal = $('#LoadModal');
		curModal.find('.modal-content').html("<div class=\"loader\" style=\"text-align: center\"><img src=\"/assets/img/loader.gif\" style=\"width: 50px;height: 50px;\"></div>");


			$.ajax({
                method: "POST",
                url: "/model/random_lienquan/laythongtin.php",
                data: {
                    id: id
                },
                success : function(response){
					curModal.modal('show').find('.modal-content').html(response);
                }
            });



	}
</script>