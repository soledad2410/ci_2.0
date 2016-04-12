<ul><?foreach($block_content->result_array() as $cate):?>
				<li class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
					<a href="<?=$this->url_model->get_cate_url($cate)?>" class="img">
						<img src="<?=$cate['menu_image']?>" alt="<?=$cate['menu_title']?>">
					</a>
					<a href="<?=$this->url_model->get_cate_url($cate)?>"><?=$cate['menu_title']?></a>
				</li>
                <?endforeach;?>
			
			</ul>