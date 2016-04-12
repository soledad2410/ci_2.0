<div class="ContentRight">
    <h2 class="color" style="padding-left:10px;"><span id="ContentPlaceHolder1_pmenu1_Label1"><?=$plugin['plugin_title']?></span></h2>
    <div id="menu3">
    <?foreach($block_content->result_array() as $menu):?>
        <ul>
            <?
            $list_cate = $this->menu_model->load_menu_frontend(false,['tblmenu.parent_id'=>$menu['menu_id']]);
            foreach($list_cate->result_array() as $cate):
            ?>
                        <li><a href='<?=$this->url_model->get_cate_url($cate)?>'><?=$cate['menu_title']?></a></li>
                        <?endforeach;?>
            
            
        </ul>
        <?endforeach;?>
    </div>
</div>