<div class="container">
    <div class="line-break">
        <h4>KHÁCH HÀNG TIÊU BIỂU</h4>
    </div>
    <ul class="list-logo">
    <?foreach($block_content->result_array() as $item):?>
        <li><a href="<?=$item['media_href']?>"><img src="<?=$item['media_url']?>"/></a></li>
    <?endforeach;?>    
    </ul>
</div>