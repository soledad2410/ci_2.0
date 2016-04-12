<section class="news-details">
	
			<h1><a href="javascript:;"><?=$news['article_title']?></a></h1>
			<div class="info">
				Lượt xem: <?=$news['article_view']?> | Ngày đăng: <?=datetime_vi($news['article_datetime'])?>
			</div>
			<div class="content">
				<?=$news['article_content']?>
                </div>
	
	</section>
<section class="news-related">
		
			<h3 class="heading">Tin tức liên quan</h3>
			<ul>
                <?foreach($new as $news):?>
				<li>
					<span class="list-icon">»</span>
					<a href="<?=$this->url_model->get_news_url($news)?>"><?=$news['article_title']?>
						<span class="date">(<?=datetime_vi($news['article_datetime'])?>)</span>
					</a>
				</li>
                <?endforeach;?>
             <?foreach($old as $news):?>
				<li>
					<span class="list-icon">»</span>
					<a href="<?=$this->url_model->get_news_url($news)?>"><?=$news['article_title']?>
						<span class="date">(<?=datetime_vi($news['article_datetime'])?>)</span>
					</a>
				</li>
                <?endforeach;?>                
				
				
				
				
			</ul>
	
	</section>    