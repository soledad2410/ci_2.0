<div class="products-block">
<?

$latest_product = $this->product_model->load_product_frontend(false, array('tblproduct.domain_id' => $_SESSION['domain_id']), 0, 12);
?>
	<ul class="products-list home active" id="new">
            <?foreach ($latest_product->result_array() as $p): ?>
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
						<p class="price"><?=number_format($p['product_price'], 0, '.', ',')?> <?=$config['currency_unit']?></p>
		                            
		                            <p class="txt-buy-now text-center" onclick="addCart(<?=$p['product_id']?>,1)"><?=$keyword['PRODUCT_ORDER']?></p>
                    </div>
		               		</a>
	                    </div>
					</figure>
				</li>
                <?endforeach;?>
			</ul>
</div>