<div class="container">
		<section class="contact">
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
			<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
				<?php echo $contact_info;?>
				<div class="contact-form">
					<form accept-charset="utf-8" method="post" action="">
						<label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no-padding">
							Họ và tên <span class="important">(*)</span>
						</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
							<input type="text" placeholder="" value="" name="contact_user" required="">
						</div>
						<label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no-padding">
							Số điện thoại <span class="important">(*)</span>
						</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
							<input type="text" placeholder="" value="" name="contact_phone" required="">
						</div>
						<label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no-padding">
							Email <span class="important">(*)</span>
						</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
							<input type="email" placeholder="" value="" name="contact_email" required="">
						</div>
						<label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no-padding">
							Địa chỉ
						</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
							<input type="text" placeholder="" value="" name="contact_address">
						</div>
						<label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no-padding">
							Nội dung <span class="important">(*)</span>
						</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
							<textarea name="contact_address" required=""></textarea>
						</div>
						<label class="col-xs-4 col-sm-4 col-md-4 col-lg-4 no-padding">&nbsp;</label>
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
							<button class="btn btn-orange" type="submit">Gửi</button>
							<button class="btn btn-green reset" type="button">Xóa hết</button>
						</div>
					</form>
				</div>
			</div>
			<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2"></div>
		</section>
	</div>