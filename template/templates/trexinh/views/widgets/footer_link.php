<section class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding">
					<h4><?=$plugin['plugin_title']?></h4>
					<ul>
                    <?foreach($block_content->result_array() as $media):?>
						<li><a href="<?=$media['media_href']?>"><?=$media['media_title']?></a></li>
                     <?endforeach;?>   
						
					</ul>
				</section>