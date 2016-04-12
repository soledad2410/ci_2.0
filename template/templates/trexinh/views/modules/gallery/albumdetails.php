<section class="album-details">
		<div class="container">
			<ul class="album">
            <?foreach($medias->result_array() as $media):?>
			  <li><img src="<?=$media['media_url']?>" /></li>
            <?endforeach;?>  
		
			</ul>

			<div class="thumbnail-paper">
				<div id="album-thumbnail">
                 <?
                 $index = 0;
                 foreach($medias->result_array() as $media):?>
				  <a data-slide-index="<?=$index++?>" href=""><img src="<?=$media['media_url']?>" /></a>
                  <?endforeach;?>
			
				</div>
			</div>
		</div>
	</section>