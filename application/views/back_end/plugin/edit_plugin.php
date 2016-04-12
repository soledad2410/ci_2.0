  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
        <base href="<?= base_url()?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <script type="text/javascript">
        var base_url='<?= base_url()?>';
        </script>
		<!-- stylesheets -->
			<link rel="stylesheet" type="text/css" href="html/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style_full.css" />
        <link id="color" rel="stylesheet" type="text/css" href="html/resources/css/colors/<?=$_SESSION['skin']?>.css" />
		<!-- scripts (jquery) -->
		<script src="html/resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		
		<script src="html/resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>

		<script src="html/resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.menu.js" type="text/javascript"></script>
		
		<script src="html/resources/scripts/smooth.table.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.dialog.js" type="text/javascript"></script>
<script src="html/fancybox/jquery.fancybox.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="html/fancybox/jquery.fancybox.css" />
        <script type="text/javascript" src="html/resources/scripts/contextmenu/jquery.contextMenu.js"></script>
    	
        <script type="text/javascript" src="asset/ckfinder/ckfinder.js"></script>
        <script src="html/resources/scripts/common.js" type="text/javascript"></script>
        <style type="text/css">
        #content{
            margin:0!important;
            min-height: 0!important;
            border:1px silver solid;
        }
        #content div.box{
            margin:0!important;
        }
        </style>
  </head>
  <body>
  <div id="content">
  <div class="box">
				<div class="title">
					<h5>Sửa khối nội dung</h5>
				</div>
                <?=$message?>
<form id="frm_edit_plugin" name="frm_edit_plugin" method="post" action="admin/plugin/edit_plugin/<?=$plugin['plugin_id']?>.html" onsubmit="return validate_form_add_plugin()">
				
				<div class="form">
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề khối</label>
							</div>
							<div class="input" style="margin-left: 330px;">
								<input type="text" id="plugin_title" name="plugin_title" class="required_field"   size="40" value="<?= $plugin['plugin_title']?>"  />
							</div>
						</div>
                        <input type="hidden" id="plugin_id" name="plugin_id" value="<?=$plugin['plugin_id']?>" />
                        <a name="form_edit" ></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ảnh nền</label>
							</div>
							<div class="input"  style="margin-left: 330px;">
								<input type="text"  name="image" id="media_image"  value="<?=$plugin['image']?>"   size="40"  />
            <input type="button" value="Chọn từ server" onclick="get_ck('media_image')"/><br />
                            <div id="media_image-thumb" ><img src="<?=$plugin['image']?>" height="70" alt="no-image"/></div>
							</div>

						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Vị trí</label>
							</div>
							<div class="input" style="margin-left: 330px;">
							<select id="position_name" name="position_name">
                            <?php
                             foreach($positions as $name=>$title){
                              echo'<option value="',$name,'" ';if($plugin['position_name']==$name){echo 'selected="selected"';} echo'>',$title,'</option>';  
                             }
                             
                            ?>
                             
                            </select>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Loại khối</label>
							</div>
							<div class="input" style="margin-left: 330px;">
							<?=$plugin['plugintype_title']?>
							</div>
                            
						</div>
                        <input  type="hidden" id="plugintype_name" value="<?=$plugin['plugintype_name']?>"/>
                        <div class="field config-area" style="display: none;">
								<div class="label"><label>Cấu hinh</label></div>
							<div style="background:#F2EBEB;position:relative" class="input" id="plugin-config">
							
							</div>
                      	</div>
                        <?if($plugin['plugintype_name']=='product_filter'):?>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Lọc các thuộc tính mặc định</label>
							</div>
                        <?$types=$this->menu_model->select_query('tblproducttype');
                            $array_id = explode('|',$plugin['plugin_filter']);
                            foreach($types->result_array() as $type):
                            ?>
                           <div class="input" style="margin-bottom: 20px;margin-left:350px">
							 <input type="checkbox" name="plugin_filter[]" value="<?=$type['producttype_id']?>" <?=in_array($type['producttype_id'], $array_id)?'checked="checked"':'';?> /><?=$type['producttype_name']?>		
							</div>
                            <div style="clear: both;"></div>
                            <?endforeach;?>
                            </div>
                        <?endif;?>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả loại khối nội dung</label>
							</div>
							<div class="input" style="margin-left: 330px;">
							<?=$plugin['plugintype_description']?>
							</div>
                      	</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Kiểu hiển thị</label>
							</div>
							<div class="input" style="margin-left: 330px;">
							<select id="plugintemplate_id" name="plugintemplate_id" onchange="template_description()" >
                           <?php

                            foreach($templates as $template){
                                echo'<option value="',$template['file'],'"';if($plugin['plugintemplate_id']==$template['file']){echo'selected="selected"';} echo'>',$template['title'],'</option>';
                            } 
                            ?>
                            </select>
							</div>
                            
						</div>
                        <div id="plugintemplate_description">
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả template</label>
							</div>
							<div class="input" style="margin-left: 330px;">
							<?=$template_description?>
							</div>
                      	</div>
                        </div>
           
            
                     <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input" style="margin-left: 330px;">
								<input type="checkbox" id="checkall" onclick="check_all_menu()" name="plugin_visible" value="1" <? if($plugin['plugin_visible']==1){echo 'checked="checked"';} ?>/>
							</div>
						</div>
                        <div class="field tree-cate" >
                        
							<div class="input" style="margin-left: 260px;">
                            <p><strong>Danh mục</strong></p>
                            <ul>
                                <?
                                foreach($trees as $root):
                                ?>
                                <li><input type="checkbox" name="menu_ids[]" <?=in_array($root['menu_id'],$menu_array)?'checked':'';?> value="<?=$root['menu_id']?>" /><span><?=$root['menu_title']?>-(<?=$root['menu_string']?>)</span>
                                    <?if(isset($root['childs'])):$lv2 = $root['childs'];?>
                                    <ul>
                                    <?foreach($lv2 as $cate):?>
                                    <li><input type="checkbox" name="menu_ids[]" <?=in_array($cate['menu_id'],$menu_array)?'checked':'';?> value="<?=$cate['menu_id']?>" /><span><?=$cate['menu_title']?>-(<?=$cate['menu_string']?>)</span>
                                              <?if(isset($cate['childs'])):$lv3 = $cate['childs'];?>
                                                <ul>
                                                    <?foreach($lv3 as $cate):?>
                                                        <li><input type="checkbox" name="menu_ids[]" <?=in_array($cate['menu_id'],$menu_array)?'checked':'';?> value="<?=$cate['menu_id']?>" /><span><?=$cate['menu_title']?>-(<?=$cate['menu_string']?>)</span></li>
                                                    <?endforeach;?>
                                                </ul>
                                                 <?endif;?>
                                       </li>
                                    <?endforeach;?>
                                    </ul>
                                   <?endif;?>
                                </li>
                                <?endforeach;?>
                                
                            </ul>
                            <p><strong>Các trang</strong></p>
                            
                            <p><input type="checkbox" <?=in_array('0',$menu_array)?'checked':'';?> class="menu_check" name="menu_ids[]" value="0" /> &nbsp;&nbsp;Trang chủ</p>
                            <?
                                $pages=$this->menu_model->select_query('tblmodule',array('module_id','module_description'),array('module_active'=>1,'module_menu'=>0,'parent_id > '=>0));
                                    foreach($pages->result_array() as $child_page):
                                ?>
                                    <p><input type="checkbox" <?=in_array($child_page['module_id'],$page_array)?'checked':'';?>    name="page_ids[]" value="<?=$child_page['module_id']?>" /> &nbsp;&nbsp;<?=$child_page['module_description']?></p>
                                    <?endforeach;?>
                            
                       
                            	
							</div>
						</div>
					</div>
				</div>
				</form>
                <div class="sub_menu">
                 <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_plugin').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
            </div>
    </div>
</div>
<style>

            .config-area{display: none;}
            .type-description,.template-description{display:none}
            .field.tree-cate{width:800px!important;height: 280px!important;overflow-x:hidden!important;overflow-y:scroll !important;}
            .field.tree-cate .input >ul >li >ul{margin-left:30px}
            .field.tree-cate .input li{padding:10px!important}
            .field.tree-cate .input li span{margin-left:10px}
            .field.tree-cate .input >ul >li >ul>li>ul{margin-left:30px}
            .field.tree-cate .input p{margin-left:0!important}
            </style>

<script type="text/javascript">
$(function(){
    var value = $('#plugintype_name').val();
    var plugin_id = $('#plugin_id').val();
     $.get('/admin/plugin/load_pluginconfig.html',{id:value,plugin:plugin_id},function(rs){
        $('.type-description').show();
         $("#plugintype_description").html(rs.plugintype_description);
         var config = rs.config;
         if(config.length >0)
         {
            var config_html = '';
            for(var key in config)
            {
                
                var config_field = '<input type="text" name="configvalue[]" value="'+config[key].value+'"/>';
                switch(config[key].field)
                {
                    case 'radio':
                    var arr = config[key].vals.split(',');
                    config_field ='';
                    for( var k in arr)
                    {
                        var tmp = arr[k].split(':');
                        config_field += '<p><input type="radio" name="configvalue[]" value="'+tmp[1]+'"';
                        if(config[key].value == tmp[1]){config_field += 'checked';}
                        config_field += '>'+tmp[0]+'<br/></p>';
                    }
                    default:break
                }
                config_html+='<div class="field">';
							config_html+='<div class="label">';
							config_html+='	<label for="autocomplete">'+config[key].title+'</label>';
							config_html+='</div>';
							config_html+='<div class="input">';
      	                     config_html+='<input type="hidden"name="config[]" value="'+config[key].name+'">'
							config_html+= config_field;
						config_html+='	</div>';
					config_html+='</div>';
                    
                    
            }
            $('.config-area').show();
            $('#plugin-config').html(config_html);
         } else{
             $('#plugin-config').html('');
               $('.config-area').hide();
         }
    },'json');
    
    $('.tree-cate li').each(function(){
   $(this).children('input[type="checkbox"]').click(function(){
    if($(this).is(':checked')){
        $(this).parent('li').find('input[type="checkbox"]').attr('checked','checked');
    } else {
        $(this).parent('li').find('input[type="checkbox"]').removeAttr('checked');
    }
   }); 
});
});
</script>
</body>
</html>