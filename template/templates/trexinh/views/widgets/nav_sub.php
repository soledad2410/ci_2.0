<ul class="cates">
    <li class="heading"><?=$plugin['plugin_title']?></li>
    <?foreach ($block_content->result_array() as $menu): ?>
    <?$cates = $this->menu_model->load_menu_frontend(array('menu_id', 'menu_title', 'menu_string'), array('tblmenu.parent_id' => $menu['menu_id']));?>
    <?foreach ($cates->result_array() as $cate): ?>
    <li><a href="<?=$this->url_model->get_cate_url($cate)?>"><?=$cate['menu_title']?></a></li>
    <?endforeach;?>
    <?endforeach;?>
</ul>