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
                <a href="javascript:void(0)" onclick="save_menu_block();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
           		<form id="frm_edit_submenu" name="frm_edit_submenu">
				<input type="hidden" name="plugin_id" value="<?=$plugin['plugin_id']?>" />
				<div class="form">
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề khối danh mục</label>
							</div>
							<div class="input" style="margin-left: 280px;">
								<strong><?=$plugin['plugin_title']?></strong>
							</div>
						</div>
                        <a name="form" ></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Loại khối  </label>
							</div>
							<div class="input" style="margin-left: 280px;">
							<strong><?=$plugin['plugintype_title']?></strong>
							</div>
						</div>

                        <div class="field">
							<div class="label">
								<label for="autocomplete">Danh sách danh mục cha<br /><br /> và nội dung nằm trong khối </label>
							</div>
                            
                            <div class="input" style="margin-left: 280px;">
                           
                            <?foreach($menu_array->result_array() as $menu): ?>
								<p><input type="checkbox" name="<?=$menu['menu_id']?>" value="<?=$menu['menu_id']?>" <?if(in_array($menu['menu_id'],$menu_in_plugin)){echo'checked="checked"';}?>/> &nbsp;&nbsp;<?=$menu['menu_title']?> - <strong><?=trim($menu['menu_url'] !='') ? 'Link liên kết ('.$menu['menu_url'].')' : $menu['module_description']?></strong></p>
                                <?endforeach;
                                  
                                ?>
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
                <a href="javascript:void(0)" onclick="save_menu_block();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
				<div id="frm_edit_plugin"></div>
                <a name="frm_edit"></a>
			</div>

			</div>

<?php
$this->load->view('back_end/footer.php');
?>