<div class="support-right text-center">
<div class="heading">HỖ TRỢ MUA HÀNG</div>
<div class="content-support">
<p>HOTLINE</p>
<p class="hotline-number">0983.486.369</p>
<div class="list-support text-center">
    <?foreach($block_content->result_array() as $item):
    if(trim($item['skype']) != ''):
    ?>
        <a href="" class="support-skype"></a>
        <?endif;if(trim($item['yahoo'])!=''):?>
        <a href="" class="support-yahoo"></a>
        <?endif;?>
    <?endforeach;?>
</div>
</div>
</div>