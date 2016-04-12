<?php
  $max=$this->menu_model->get_top('tblmenu','menu_queu',array('parent_id'=>$menu['parent_id']));
  $min=$this->menu_model->get_top('tblmenu','menu_queu',array('parent_id'=>$menu['parent_id']),null,true);
?>
<tr>
    <td style="width: 40%;" class="title-cate"><div class="spacing-title" style="width:<?=($menu['menu_level']-1)*30?>px;float:left;background: silver;height:1px ;margin-top: 7px;"></div><div style="float: left;"><a href="admin/menu/edit_cate/<?=$menu['menu_id']?>.html"><?=$menu['menu_title']?>-(<?=$menu['menu_string']?>)</a></div></td>
    <td style="width: 25%;" class="title-module"><?=$menu['module_id'] == 0? 'Link liên kết (' . $menu['menu_url'] .')' : $menu['module_description'];?></td>
    <td style="text-align: center;" class="visible-cate"><img height="16" width="16" src="html/resources/images/icons/active_<?=$menu['menu_visible']?>.gif"/></td>
    <td style="width:10%"><?=trim($menu['layout_name']=='') ? '[Default]' : '<strong>'.$menu['layout_name'].'</strong>';?></td>
    <td style="width: 10%;"><?=trim($menu['template_id']=='') ? '[Default]' : '<strong>'.$menu['template_id'].'</strong>';?></td>
    <td class="queu"><input type="text" name="<?=$menu['menu_id']?>" parent="<?=$menu['parent_id']?>" value="<?=$menu['menu_queu']?>" class="numbered_field queu menu_queu"/></td>
    
    <td class="selected last"><input type="checkbox" value="<?=$menu['menu_id']?>" name="<?=$menu['menu_id']?>"/></td>
</tr>
