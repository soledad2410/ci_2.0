<?$list_cate = $this->menu_model->load_menu_frontend(['menu_id','menu_title','menu_string','menu_url'],['tblmenu.parent_id'=>$menu['parent_id']]);?>
<div class="tabs">
                <?foreach($list_cate->result_array() as $cate):?>
                    <div class="item <?=$cate['menu_id'] == $menu['menu_id']?'current':'';?>"><a href="<?=$this->url_model->get_cate_url($cate)?>" title="<?=$cate['menu_title']?>"><?=$menu['menu_title']?></a></div>
                    <?endforeach;?>
                    
                </div>
                <div class="page-body page-body no-border no-padding">
                    <?=$menu['menu_content']?>
                </div>
            