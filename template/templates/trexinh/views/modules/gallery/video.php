
    <div class="breadcrumb">
        <ul>
                      <?foreach($layout_data['breadcrumbs'] as $item):?>
                <li><a href="<?=$item['link']?>" title="<?=$item['title']?>"><?=$item['title']?> </a></li>
            <?endforeach;?>
        </ul>
    </div>
    <div class="header" >
                    <a  class="header-title" style="width: 100%;" title="<?=$this->url_model->emit_cate_url($menu['menu_id'])?>" href=""><?=$menu['menu_title']?></a>
                 
                </div>
    <?if(isset($medias)):?>
    <div class="video-box">
        <iframe width="680" height="416" src="<?=$current_item['media_href']?>" frameborder="0" allowfullscreen></iframe>
                    
    </div>
    <a name="slide"></a>
    <?endif;?>
        <div class="main-content">
            <div class="pro-list">
                
                <div class="list-item">
                <?foreach($medias->result_array() as  $item):?>
                    <div class="item-pro item-video item-album">
                        <div class="item-img">
                            <a href="<?=$this->url_model->emit_cate_url($menu['menu_id'])?>?item=<?=$item['media_id']?>#slide" title="<?=$item['media_title']?>"><img src="<?=$item['media_url']?>" width="221" height="135" title="<?=$item['media_title']?>" alt="No Image"/>
                            </a>
                        </div>
                        <a class="album-name" href="<?=$this->url_model->emit_cate_url($menu['menu_id'])?>?item=<?=$item['media_id']?>#slide" title="<?=$item['media_title']?>"><?=$item['media_title']?></a>
                    </div>
                <?endforeach;?>    
                </div>
            </div>
            
        </div>
        
   