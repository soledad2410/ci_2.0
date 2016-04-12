<section class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding">
					<h4><?=$plugin['plugin_title']?></h4>
					<ul>
                    <?foreach($block_content->result_array() as $news):?>
						<li><a href="<?=$this->url_model->get_news_url($news)?>"><?=$news['article_title']?></a></li>
                     <?endforeach;?>   
						
					</ul>
				</section>