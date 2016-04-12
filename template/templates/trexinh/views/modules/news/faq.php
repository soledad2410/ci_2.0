
                
                <div class="ClearBoth"></div>

                <div class="content ofh">
                    <div class="Text">
    <strong class="ml6"><span>You are here : </span> </strong>
    <span class="color">
        <?
        unset($breadcrumbs['0']);
        
        ?>
        <a href="http://www.ngocdonghandicrafts.com">Homepage</a>
        <?foreach($breadcrumbs as $link):?>
        <span> > </span><a href="<?=$link['link']?>"><?=$link['title']?></a>
        <?endforeach;?>
        
    </span>
</div><div class="ContentLeftFNQ">
    <div class="BoderDot pb15">
    <?foreach($articles->result_array() as $news):?>
                <div class="Title">
            <!-- <img src="" /> -->
            <a href="#<?=$news['article_id']?>"><span class="fs12"><?=$news['article_title']?></span></a>
        </div>
        
     <?endforeach;?>   
</div>
    <div class="pt10">
      <?foreach($articles->result_array() as $news):?>
                <div id="<?=$news['article_id']?>">
            <h3 class="Title fs12"><?=$news['article_title']?></h3>
            <div class="Text">
                <span class="fs10">
                    <div class="Text">
            <span style="font-size: 10pt;"><?=$news['article_header']?></span>

             </div>
                </span>
            </div>
            <div class="MoreNobd" align="right">
                <img src="<?=$resources_path?>/img/top.gif" border="0" width="20">
                <a href="#">
                    <span>Top page</span>
                </a>
            </div>
        </div>
        <?endforeach;?>
    </div>
</div>
                </div>

                <div class="ClearBoth"></div>
            