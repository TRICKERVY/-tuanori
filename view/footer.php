
<footer>
        <div class="bg-footer">
    		<div class="container">
    			<div class="row">
    				<div class="col-lg-6 col-md-12 col-sm-12">
    					<img src="<?=$_logo['url'];?>" class="logo-webshop mb-4" alt="">
    					<div class="text" style="text-transform: capitalize;"> Shop Game Free Fire - Giá Rẻ - Uy Tín, Nhiều Mini Game Và Phần Quà Hấp Dẫn, Chơi Ngay Để Có Cơ Hội Trúng 9999K Kim Cương.</div>
    				</div>
    				<div class="col-lg-3 col-md-6 col-sm-6 col-6">
    					<h5>Làm Việc</h5>
    					<ul class="footer-nav">
    						<li><i class="fa fa-angle-right"></i><span> Thời Gian Làm Việc: 8h - 22h</span></li>
    					</ul>
    				</div>
    				<div class="col-lg-3 col-md-6 col-sm-12">
    					<h5>Liên Hệ & Hỗ Trợ</h5>
    					<div class="address">
    						<p style="font-size: 17px;"><i class="fa fa-angle-right"></i> Hỗ Trợ: <a target="_blank" href="<?=$_admin['facebook'];?>">Fanpage</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="row">
    				<div class="col-lg-12">
    					<p class="copyright">Copyright © <?=date('Y');?> - Được Phát Triển Và Vận Hành Bởi <a href="https://zalo.me/0812665001">TUANORI.VN</a></p>
    				</div>
    			</div>
		    </div>
		</div>
	</footer>

	<script src="/assets/js/popper.js?23333"></script>
	<script src="/assets/js/bootstrap.min.js?23333"></script>
	<script src="/assets/js/scrollreveal.min.js?23333"></script>
	<script src="/assets/js/parallax.min.js?23333"></script>
	<script src="/assets/js/waypoints.min.js?23333"></script>
	<script src="/assets/js/jquery.counterup.min.js?23333"></script>
	<script src="/assets/js/imgfix.min.js?23333"></script>	
	<script src="/assets/js/custom.js?23333"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script src="//cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
    $(document).ready(function() {
        $('#history_momo').DataTable({
            "order": [[ 0, "desc" ]]
        });
        $('#history_card').DataTable({
            "order": [[ 5, "desc" ]]
        });
        $('#history_buy').DataTable({
            "order": [[ 5, "desc" ]]
        });
        $('#history_diamond').DataTable({
            "order": [[ 4, "desc" ]]
        });
        $('#history_minigame').DataTable({
            "order": [[ 3, "desc" ]]
        });
        $('#notify').modal('show');
    });
    </script>
    <script type="text/javascript" src="/assets/js/card.js?=v3.7"></script>
	<script type="text/javascript" src="/assets/js/users.js?=v3.7"></script>
	<script type="text/javascript" src="/assets/js/diamond.js?v=1.1"></script>
</body>
</html>