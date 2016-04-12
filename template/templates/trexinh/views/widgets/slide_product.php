<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 no-padding main-slide">
	<ul>
    <?foreach ($block_content->result_array() as $p): ?>
		<li>
			<a href="<?=$this->url_model->get_product_url($p)?>" title="<?=$p['product_name']?>">
				<img src="<?=$p['product_image']?>" alt="<?=$p['product_name']?>" title="<?=$p['product_name']?>"/>
			</a>
		</li>
     <?endforeach;?>
	</ul>
</div>