<div class="product-details">
	
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding-left image">
				<div class="large">
					<a href="javascript:;">
						<img src="<?=$product['product_image']?>" data-zoom-image="<?=$product['product_thumbnail']?>">
					</a>
				</div>
				<?php if (count($image_other) > 0): ?>
				<div class="small">
					<ul>
						<li class="active">
							<a href="javascript:;">
								<img src="<?=$product['product_image']?>" data-zoom-image="<?=$product['product_thumbnail']?>">
							</a>
						</li>
                        <?foreach ($image_other as $img): ?>
						<li>
							<a href="javascript:;"><img src="<?=$img?>" alt="" data-zoom-image="<?=$img?>"></a>
						</li>
                        <?endforeach;?>

					</ul>
				</div>
				<?php endif?>
			</div>
			<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 no-padding details">
				<h2><?php echo $product['product_name'];?></h2>
				<div class="info">
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding">
						Mã hàng:
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-padding">
						<?=$product['product_code']?>
					</div>

					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding price-label">
						Giá sản phẩm:
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-padding">
						<span class="price"><?=number_format($product['product_price'], 0, ',', '.')?> vnđ</span>
					</div>
					<?php if ($product['product_color']): ?>
				    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding">
						Màu sắc:
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-padding">
				    	<?=$product['product_color']?>
					</div>
					<?php endif?>
					<?php if ($product['product_size']): ?>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding">
						Kích cỡ:
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-padding">
						<?=$product['product_size']?>
					</div>
                    <?php endif?>
					<?php if ($product['product_material']): ?>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding">
						Chất liệu:
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-padding">
						<?=$product['product_material']?>
					</div>
                    <?php endif?>
					<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding product-num-label">
						Số lượng mua:
					</div>
					<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-padding product-num">
						<input type="number" name="" id="p-qty" value="1">
                        <input type="hidden" id="p-id"  value="<?=$product['product_id']?>"/>
					</div>

					<div class="action">
						
						<button type="button" class="btn btn-orange" id="add-cart">Đặt hàng</button>
						<a href="<?php echo site_url('san-pham');?>" class="btn btn-orange">Mua tiếp</a>
					</div>
					<div class="contact">
						
						<p class="phone-number">
							Liên hệ : <span>0983 486 369</span>
						</p>
					</div>
					<div class="contact">
						<div class="addthis_native_toolbox"></div>
					</div>
				</div>
			</div>
			<div class="title-details ">Thông tin chi tiết</div>
			<div class="description">
                <?=$product['product_details']?>
			</div>
			<?php if (count($related_products = $product_other->result_array()) > 0): ?>
			<div class="product-related">
				<div class="heading title ">Sản phẩm cùng loại</div>
				<div class="list">
					<ul class="products-list">
                        <?foreach ($related_products as $p): ?>
                        <li class="col-xs-12 col-sm-4 col-md-3 col-lg-3 no-padding">
					<figure>
						<a href="<?=$this->url_model->get_product_url($p)?>">
							<img src="<?=$p['product_image']?>" alt="<?=$p['product_name']?>"/>
							<span class="details">Chi tiết</span>
						</a>
						
						<div class="product-btn">
							<a href="<?=$this->url_model->get_product_url($p)?>">
		                        <div class="row text-center">
                                <h5><a href="<?=$this->url_model->get_product_url($p)?>"><?=$p['product_name']?></a></h5>
						<p class="price"><?=number_format($p['product_price'], 0, '.', ',')?> vnđ</p>
		                            
		                            <p class="txt-buy-now text-center" onclick="addCart(<?=$p['product_id']?>,1)">ĐẶT MUA</p>
                    </div>
		               		</a>
	                    </div>
					</figure>
				</li>

                        <?endforeach;?>
					</ul>
				</div>
			</div>
			<?php endif?>
	
	</div>