<form method="post" action="shopping/update_cart.html">
		<section class="shopping-carts">
			<table>
				<thead>
					<tr>
						<th>STT</th>
						<th>Ảnh</th>
						<th>Tên sản phẩm</th>
						<th>Đơn giá</th>
						<th>Số lượng</th>
						<th>Thành tiền</th>
						<th>Xóa</th>
					</tr>
				</thead>
				<tbody>
                <?$stt = 0;?>
				<?$totalPrice = 0?>
				<?foreach ($carts as $key => $p): ?>
				<?$stt++;?>
				<?php $totalPrice += $p['price'] * $p['qty'];?>
					<tr>
						<td><?=$stt?></td>
						<td><img width="249" height="187" alt="" src="<?=$p['image']?>"></td>
						<td><?=$p['name']?></td>
						<td><span class="price"><?=number_format($p['price'], 0, '.', ',')?></span></td>
						<td>

							<input type="number" value="<?=$p['qty']?>" name="<?=$key?>">
						</td>
						<td><span class="price"><?=number_format($p['price'] * $p['qty'], 0, '.', ',')?> đ</span></td>
						<td>
							<a href="javascript:;">
								<span aria-hidden="true" class="glyphicon glyphicon-trash" onclick="removeCart(this)" data="<?=$key?>"></span>
							</a>
						</td>
					</tr>

                <?endforeach;?>
					<tr>
						<td><strong>Tổng tiền:</strong></td>
						<td colspan="5"><span class="price pull-right"><?php echo number_format($totalPrice, 0, '.', ',');?> đ</span></td>
						<td></td>
					</tr>

				</tbody>
			</table>
			<div class="pull-right">
            <button class="btn btn-green" type="submit">Cập nhập</button>
				<button class="btn btn-green buy" type="button"><?=$keyword['PRODUCT_ORDER']?></button>
				<a class="btn btn-green" href="<?php echo site_url('san-pham');?>">Mua tiếp</a>
			</div>
		</section>
        </form>
		<section style="display: none;" class="user-info-form">
			<h3>THÔNG TIN ĐẶT HÀNG CỦA BẠN</h3>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-12 no-padding">
				<form role="form" accept-charset="utf-8" method="post" action="" class="order">
					<div class="form-group">
						<p class="important"><?=$keyword['FILL_ORDER_FORM']?></p>
					</div>
					<div class="form-group col-lg-6">
						
						<label class="col-xs-8 col-sm-8 col-md-8 col-lg-8 no-padding">
							<input type="text" required="required" placeholder="Họ và tên của bạn" value="" name="cus_name">

						</label>
                        
					</div>
					<div class="form-group col-lg-6">
						<input type="tel" required="required" placeholder="Số điện thoại" value="" name="cus_phone">
						
					</div>
					<div class="form-group col-lg-6">
						<input type="email" required="required" placeholder="Email" value="" name="cus_email">
						
					</div>
					<div class="form-group col-lg-6">
						<input type="text" required="required" placeholder="Địa chỉ nhận hàng" value="" name="order_address">
						
					</div>
					<div class="form-group col-lg-6">
						<textarea placeholder="Ghi chú " rows="7" name="order_info"></textarea>
					</div>
					<div class="form-group col-lg-6">
						<button class="btn btn-green" type="submit">Xác nhận</button>
					</div>
				</form>
			</div>
		</section>




