
    <div class="breadcrumb">
        <ul>
                      <?foreach($layout_data['breadcrumbs'] as $item):?>
                <li><a href="<?=$item['link']?>" title="<?=$item['title']?>"><?=$item['title']?> </a></li>
            <?endforeach;?>
        </ul>
    </div>
    <div class="header">
                    <a class="header-title" title="<?=$this->url_model->emit_cate_url($menu['menu_id'])?>" href=""><?=$menu['menu_title']?></a>
                 
                </div>
    <?if(isset($medias)):?>
    <div class="album-slide">
        <div class="album-slide-image main-slide">
            <?foreach($medias->result_array() as $item):?>
                <div class="slide-item">
                    <a href="<?=$item['media_href']?>" class="fancybox" title="<?=$item['media_url']?>"><img src="<?=$item['media_url']?>" width="680" height="380" alt="no-image" title="<?=$item['media_title']?>"/></a>
                    <p class="slide-caption"><?=$item['media_title']?></p>
                </div>
                <?endforeach;?>
                <div class="slide-nav-bar">
                    <span class="prev nav">« Prev</span>
                    <span class="next nav">Next »</span>
                </div>
        </div>
        <div class="album-slide-thumb">
            <div class="slide-des">
                <p class="slide-name"><?=$current_album['gallery_title']?></p>
                <p><?=$current_album['gallery_desc']?></p>
            </div>
            <div class="slide-nav nav-slide">
                        <?foreach($medias->result_array() as $item):?>
                
                    <a class="slide-nav-item" href="javascript:;" title="<?=$item['media_title']?>"><img src="<?=scale_image($item['media_url'],71,45)?>" width="71" height="45" alt="no-image" title="<?=$item['media_title']?>"/></a>
               
                <?endforeach;?>
            </div>
        </div>            
    </div>
    <a name="slide"></a>
    <?endif;?>
        <div class="main-content">
            <div class="pro-list">
                
                <div class="list-item">
                <?foreach($albums->result_array() as  $album):?>
                    <div class="item-pro item-album">
                        <div class="item-img">
                            <a href="<?=$this->url_model->emit_cate_url($menu['menu_id'])?>?album=<?=$album['gallery_id']?>#slide" title="<?=$album['gallery_title']?>"><img src="<?=$album['gallery_image']?>" width="221" height="161" title="<?=$album['gallery_title']?>" alt="No Image"/>
                                <span class="album-tag"></span>
                            </a>
                        </div>
                        <a class="album-name" href="<?=$this->url_model->emit_cate_url($menu['menu_id'])?>?album=<?=$album['gallery_id']?>#slide" title="<?=$album['gallery_title']?>"><?=$album['gallery_title']?></a>
                    </div>
                <?endforeach;?>    
                </div>
            </div>
            
        </div>
        <div class="right-content">
            <?=
          
            $this->layout_model->load_position_content('right_content')?>
        </div>
   