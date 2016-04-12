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
								<label for="autocomplete">Chọn album panorama nằm trong khối</label>
							</div>
                            
                            <div class="input" style="margin-left: 280px;">
                           
                            <?foreach($albums->result_array() as $album): ?>
								<p><input type="radio" name="embed_code" value="<?=$album['gallery_id']?>" <?if($album['gallery_id'] == $plugin['embed_code']){echo'checked="checked"';}?>/> &nbsp;&nbsp;<?=$album['gallery_name']?> - <strong><?=$album['gallery_title']?></strong></p>
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