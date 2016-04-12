<div class=" no-padding main-slide">
	<ul>
		<?php foreach ($block_content->result_array() as $item): ?>
			<li>
				<a href="<?php echo $item['media_href'];?>">
					<img src="<?php echo $item['media_url']?>" title="<?php echo $item['media_title']?>" alt="<?php echo $item['media_title']?>" height="322px" />
				</a>
			</li>
		<?php endforeach;?>
	</ul>
</div>