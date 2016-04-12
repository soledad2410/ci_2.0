<?php
$this->load->view('back_end/header.php');
?>

<div id="content">
			<!-- table -->

                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Sửa thông tin khối danh mục </h5>
				</div>
				<!-- end box / title -->
                 <div class="sub_menu">
                 <div class="save">
                <a href="admin/plugin/index.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_plugin('<?=$plugin['plugin_id']?>');"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_plugin('<?=$plugin['plugin_id']?>');"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_edit_submenu').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
           		<form id="frm_edit_submenu" name="frm_edit_submenu" method="post">
                <?=flash_data()?>
				<input type="hidden" name="plugin_id" value="<?=$plugin['plugin_id']?>" />
				<div class="form">
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Khối nội dung</label>
							</div>
							<div class="input" style="margin-left: 280px;">
								<strong><?=$plugin['plugin_title']?></strong>
							</div>
						</div>
<div class="field">
							<div class="label">
								<label for="autocomplete">Loại khối</label>
							</div>
							<div class="input" style="margin-left: 280px;">
								<strong><?=$this->plugin_model->get_by_key('tblplugintype','plugintype_title','plugintype_id',$plugin['plugintype_id'])?></strong>
							</div>
						</div>                        
                        <a name="form" ></a>
                        

                        <div class="field">
							<div class="label">
								<label for="autocomplete">Chọn nội dung danh mục</label>
							</div>
                            
                            <div class="field tree-cate" >
                        
							<div class="input" style="margin-left: 260px;">
                            <p><strong>Danh mục</strong></p>
                            <ul>
                                <li><input type="radio"  name="plugin_submenu" <?=in_array($plugin['plugin_submenu'],['all'])?'checked':'';?> value="all" />Tất cả</li>
                                <?
                                foreach($trees as $root):
                                ?>
                                
                                <li><input type="radio" <?=($module!=$root['module_name']) ? 'disabled' : '';?> name="plugin_submenu" <?=in_array($plugin['plugin_submenu'],[$root['menu_id']])?'checked':'';?> value="<?=$root['menu_id']?>" /><span><?=$root['menu_title']?>-(<?=$root['menu_string']?>)</span>
                                    <?if(isset($root['childs'])):$lv2 = $root['childs'];?>
                                    <ul>
                                    <?foreach($lv2 as $cate):?>
                                    <li><input type="radio" <?=($module!=$cate['module_name']) ? 'disabled' : '';?> name="plugin_submenu" <?=in_array($plugin['plugin_submenu'],[$cate['menu_id']])?'checked':'';?> value="<?=$cate['menu_id']?>" /><span><?=$cate['menu_title']?>-(<?=$cate['menu_string']?>)</span>
                                              <?if(isset($cate['childs'])):$lv3 = $cate['childs'];?>
                                                <ul>
                                                    <?foreach($lv3 as $cate):?>
                                                        <li><input type="radio" <?=($module!=$cate['module_name']) ? 'disabled' : '';?> name="plugin_submenu" <?=in_array($plugin['plugin_submenu'],[$cate['menu_id']])?'checked':'';?> value="<?=$cate['menu_id']?>" /><span><?=$cate['menu_title']?>-(<?=$cate['menu_string']?>)</span></li>
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
                        
							</div>
						</div>
						</div>

					</div>
				</div>
				</form>
                <div class="sub_menu">
                 <div class="save">
                <a href="admin/plugin/index.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_plugin('<?=$plugin['plugin_id']?>');"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_plugin('<?=$plugin['plugin_id']?>');"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_edit_submenu').submit()"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
				<div id="frm_edit_plugin"></div>
                <a name="frm_edit"></a>
			</div>

			</div>
<style type="text/css">
            .field.tree-cate{width:800px!important;height: 280px!important;overflow-x:hidden!important;overflow-y:scroll !important;}
            .field.tree-cate .input >ul >li >ul{margin-left:30px}
            .field.tree-cate .input li{padding:10px!important}
            .field.tree-cate .input li span{margin-left:10px}
            .field.tree-cate .input >ul >li >ul>li>ul{margin-left:30px}
            .field.tree-cate .input p{margin-left:0!important}
            </style>
</style>
<?php
$this->load->view('back_end/footer.php');
?>