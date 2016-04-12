<?$this->load->view('back_end/header.php');?>
<script type="text/javascript">
			$(document).ready(function () {
	       	$("#box-tabs").tabs();
			});
		</script>
<div id="content">
<div id="box-tabs" class="box">
	<div class="title">
					<h5>Cấu hình gian hàng</h5>
					<ul class="links">
						<li><a href="#box-shop">Cấu hình gian hàng</a></li>
						<li><a href="#box-package">Gói gian hàng</a></li>
						<li><a href="#box-region">Địa danh</a></li>
					</ul>
				</div>
		      <div id="box-shop">
					
				</div>
				<div id="box-package">
                    <!-- Gói gian hàng -->
				</div>
				<div id="box-region">
	               <!-- Vùng miền -->
				</div>
	</div>
</div>
<?$this->load->view('back_end/footer.php');?>