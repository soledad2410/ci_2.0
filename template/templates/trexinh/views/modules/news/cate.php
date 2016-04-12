<section class="list-news">
	
        <?foreach ($articles->result_array() as $news): ?>
			<article class="col-xs-12 col-sm-12 col-md-12 col-lg-12 no-padding">
				<section class="image">
					<a href="<?=$this->url_model->get_news_url($news)?>">
						<img width="234" height="176" alt="" src="<?=$news['article_image']?>">
					</a>
				</section>
				<section class="details">
					<header>
						<h2><a href="<?=$this->url_model->get_news_url($news)?>"><?=advance_substr(16, $news['article_title'])?></a></h2>
					</header>
					<p><?=advance_substr(40, $news['article_header'])?></p>
				</section>
			</article>
            <?endforeach;?>
	<div class="text-center"><?=$page_list?></div>
	</section>