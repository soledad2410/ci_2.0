<?php
$this->load->view('back_end/header.php');
?>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách khối nội dung</h5>
                    <form method="get" action="">
                                       <div class="search">
							<div class="input">
								<input type="text" id="search" name="search" value="<?=$this->input->get('phrase')?>" />
							</div>
							<div class="button">
								<input type="submit" value="Xác nhận" onclick="load_plugin()" />
							</div>
					</div>
                    <div class="search">

							<div class="input">
								<select name="type" data="<?=$this->input->get('type')?>">
                                <option value="0">--Chọn loại khối--</option>
                                <?foreach ($plugintypes->result_array() as $plugintype): ?>
                              <option value="<?=$plugintype['plugintype_id']?>"  ><?=$plugintype['plugintype_title']?></option>
                             <?endforeach;?>
                                </select>
							</div>
				    </div>

                    <div class="search">

							<div class="input">
								<select  name="template" data="<?=$this->input->get('template')?>">
                                <option value="0">--Template--</option>
                                <?foreach ($templates->result_array() as $tmp): ?>
                              <option value="<?=$tmp['template_name']?>" ><?=$tmp['template_title']?>(<?=$tmp['template_name']?>)</option>';
                              <?endforeach;?>
                                </select>
							</div>
				    </div>
                    </form>
            		</div>
                <div class="sub_menu">

                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div><div class="sub_menu-notice" style="margin-top: 10px;">Các khối nội dung tương ứng với giao diện đang được sử dụng</div>
                <div class="save">
                <a href="admin/plugin/index.html#form"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_plugin();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_plugin();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
                <?=$message?>
                <div class="table">
					<form id="frm_list_plugin" name="frm_list_plugin">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề</th>
								<th>Loại khối</th>
                                <th>Giao diện</th>
								<th>Vị trí</th>

								<th>Hiển thị</th>
                                <th>Layout</th>
                                <th>Sắp xếp</th>

								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>

						<tbody>
                        <?php foreach ($plugins->result_array() as $plugin): ?>
                        <?php if (file_exists(LAYOUT_DIR . $plugin['template'] . '/views/widgets/' . $plugin['plugintemplate_id'] . '.php')): ?>
                            <tr>
								<td class="title" style="width: 20%;"><a href="javascript:;" onclick="edit_plugin('<?=$plugin['plugin_id']?>')"><img src="html/resources/images/icons/edit.png" width="16"/></a>&nbsp;&nbsp;<a href="admin/plugin/plugin_content.html?plugin_id=<?=$plugin['plugin_id']?>"><?=$plugin['plugin_title']?></a></td>
								<td class="price" style="width: 20%;"><?=$plugin['plugintype_title']?></td>
                                <td class="price" style="width: 15%;"><?=$plugin['template']?></td>
								<td class="date" id="dp1307331808406"><?=$plugin['position_name']?></td>
								<td class="category"><img src="html/resources/images/icons/active_<?=$plugin['plugin_visible']?>.gif" width="16" height="16"/></td>
                                <td><?=$plugin['layout_name']?></td>
                                <td class="queu"><input class="plugin_queu queu numbered_field" name="<?=$plugin['plugin_id']?>" value="<?=$plugin['plugin_queu']?>"/></td>

								<td class="selected last"><input type="checkbox" name="<?=$plugin['plugin_id']?>" id="<?=$plugin['plugin_id']?>" value="<?=$plugin['plugin_id']?>"/></td>
							</tr>
                           <?php endif;?>
                            <?php endforeach;?>
						</tbody>
     			    </table>
                    </form>
                    <div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả từ  0-<?=$plugins->num_rows()?> của tổng <?=$total?></span>
						</div>
                      </div>
				</div>
                <div class="sub_menu">

                <div class="save">
                <a href="admin/plugin/index.html#form"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_plugin();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_plugin();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
                <div style="clear: both;"></div>
                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới khối nội dung</h5>
				</div>

				<div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">
                - Chỉ thêm được các khối nội dung đã có template của khối
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_plugin').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
                <form id="frm_add_plugin" name="frm_add_plugin" method="post" action="admin/plugin.html" onsubmit="return validate_form('frm_add_plugin')">
				<div class="form">
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề khối</label>
							</div>
							<div class="input">
								<input type="text" id="plugin_title" name="plugin_title" class="required_field"   size="40"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ảnh nền</label>
							</div>
							<div class="input">
								<input type="text"  name="image" id="media_image"    size="40"  />
                                <input type="button" value="Chọn từ server" onclick="get_ck('media_image')"/><br />
                            <div id="media_image-thumb" ></div>
							</div>

						</div>
                        <div class="field">
                            <div class="label">
                            	<label>Giao diện</label>
                            </div>
                            <div class="input">
                                <select name="template" id="template">
                                    <option value="null">Chọn template</option>
                                            <?foreach ($templates->result_array() as $tmp): ?>
                                          <option value="<?=$tmp['template_name']?>"><?=$tmp['template_title']?>(<?=$tmp['template_name']?>)</option>
                                          <?endforeach;?>

                                </select>
                            </div>
                        </div>
                        <a name="form" ></a>
                        <div class="field">
                            <div class="label">
                            	<label>Layout</label>
                            </div>
                            <div class="input">
                                <select name="layout_name" id="layout_name" class="required_field">

                                </select>
                            </div>
                        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Vị trí</label>
							</div>
							<div class="input">
							<select id="position_name" name="position_name" class="required_field">


                            </select>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Loại khối</label>
							</div>
							<div class="input">
							<select id="plugintype_id" name="plugintype_id" onchange="load_plugin_config()">
                            <option value="0">--- Chọn loại khối ---</option>
                                <?php

foreach ($plugintypes->result_array() as $plugintype) {
	echo '<option value="', $plugintype['plugintype_id'], '" title="', $plugintype['plugintype_name'], '">', $plugintype['plugintype_title'], '</option>';
}
?>
                            </select>
							</div>

						</div>

                        <div class="field type-description">

							<div style="background:#F2EBEB" class="input">
							<textarea id="plugintype_description" class="field-description" readonly="true" rows="3" cols="40"></textarea>
							</div>
                      	</div>
                        <div class="field config-area">
								<div class="label"><label>Cấu hinh</label></div>
							<div style="background:#F2EBEB;position:relative" class="input" id="plugin-config">

							</div>
                      	</div>

                        <div class="field">
							<div class="label">
								<label for="autocomplete">Kiểu hiển thị</label>
							</div>
							<div class="input">
							<select id="plugintemplate_id" name="plugintemplate_id" onchange="template_description()">
                            <option value="0">--- Chọn kiểu hiển thị ---</option>
                           </select>
							</div>
                      	</div>

                        <div class="field template-description">

							<div style="background:#F2EBEB" class="input">
							<textarea id="plugintemplate_description" class="field-description" readonly="true" rows="3" cols="40"></textarea>
							</div>
                      	</div>
                        <div class="plugin_config">
                        </div>
                            <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" name="plugin_visible" value="1" id="checkall" onclick="check_all_menu()" />
							</div>
						</div>
                        <div class="field tree-cate" >

							<div class="input" style="margin-left: 260px;">
                            <p><strong>Danh mục</strong></p>
                            <ul>
                                <?
foreach ($trees as $root):
?>
                                <li><input type="checkbox" name="menu_ids[]" value="<?=$root['menu_id']?>" /><span><?=$root['menu_title']?>-(<?=$root['menu_string']?>)</span>
                                    <?if (isset($root['childs'])): $lv2 = $root['childs'];?>
				                                    <ul>
				                                    <?foreach ($lv2 as $cate): ?>
				                                    <li><input type="checkbox" name="menu_ids[]" value="<?=$cate['menu_id']?>" /><span><?=$cate['menu_title']?>-(<?=$cate['menu_string']?>)</span>
				                                              <?if (isset($cate['childs'])): $lv3 = $cate['childs'];?>
								                                                <ul>
								                                                    <?foreach ($lv3 as $cate): ?>
								                                                        <li><input type="checkbox" name="menu_ids[]" value="<?=$cate['menu_id']?>" /><span><?=$cate['menu_title']?>-(<?=$cate['menu_string']?>)</span></li>
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
                            <p><input type="checkbox" class="menu_check" name="menu_ids[]" value="0" /> &nbsp;&nbsp;Trang chủ</p>
                            <?
$pages = $this->menu_model->select_query('tblmodule', array('module_id', 'module_description'), array('module_active' => 1, 'module_menu' => 0, 'parent_id > ' => 0));
foreach ($pages->result_array() as $child_page):
?>
                                    <p><input type="checkbox"    name="page_ids[]" value="<?=$child_page['module_id']?>" /> &nbsp;&nbsp;<?=$child_page['module_description']?></p>
                                    <?endforeach;?>



							</div>
						</div>
                        <a name="form"></a>


					</div>
				</div>
				</form>
                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_plugin').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
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
               $('.plugin_queu').change(function(){

                    var id = $(this).attr('name');
                    var queu = $(this).val();
                    $.post('/admin/plugin/swap_position',{id:id,queu:queu},function(rs){
                        if(rs.code == 'success')
                        {
                            var id2 = rs.swapped_id;

                            if(id2){

                                $('#frm_list_plugin').find('input[name="'+id2+'"]').val(rs.queu);
                            }

                        }
                    },'json');
               });
            });

$(function(){
    $('#template').change(function(){
       var tmp = $(this).val();
       $.get('/admin/plugin/get_layout_by_template',{template: tmp},function(rs){
                var content ='';
                    if(rs){

              content ='<option value="0">--Chọn layout--</option>';
            for(var item in rs){

                content += '<option value="'+rs[item].name+'">'+rs[item].title+'</option>';
                }


            }
               $('#layout_name').html(content);
       },'json');
    });
   $('#layout_name').change(function(){
        var layout = $(this).val();
        var template = $('#template').val();
        $.get('/admin/plugin/get_layout_position',{layout:layout,template:template},function(rs){
               var content ='';
            if(rs){

            for(var item in rs){

                content += '<option value="'+rs[item].name+'">'+rs[item].title+'</option>';
                }

            }
             $('#position_name').html(content);
        },'json')
   });
});
$('.tree-cate li').each(function(){
   $(this).children('input[type="checkbox"]').click(function(){
    if($(this).is(':checked')){
        $(this).parent('li').find('input[type="checkbox"]').attr('checked','checked');
    } else {
        $(this).parent('li').find('input[type="checkbox"]').removeAttr('checked');
    }
   });
});
</script>
<?php
$this->load->view('back_end/footer.php');
?>