<section class="list-album">
		<div class="container">
			<ul>
            <?foreach ($albums->result_array() as $album): ?>
				<li class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
					<figure>
						<a class="image" href="<?=$this->url_model->get_album_url($album)?>">
							<img src="<?=$album['gallery_image']?>" height="212" width="212" alt="">
						</a>
						<a href="<?=$this->url_model->get_album_url($album)?>"><?=$album['gallery_title']?></a>
					</figure>
				</li>
              <?endforeach;?>

			</ul>
		</div>
	</section>