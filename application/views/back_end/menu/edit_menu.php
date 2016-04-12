<?php
$this->load->view('back_end/header.php');
?>
      <div id="content">
    <div class="box">
        <div class="title">
					<h5>Trang sửa thông tin danh mục</h5>
          <div class="search">
						<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_article()" />
							</div>

					</div>
                    <div class="search">

							<div class="input">
								<select id="menu">
                                <option value="0">--Chọn danh mục--</option>
                                <?php echo $menu ?>
                                </select>
							</div>
				</div>
                <div class="search">
							<div class="input">
							<span style="color: white;">Tới ngày</span> <input type="text" id="ceil_date" class="date"  />
							</div>
				</div>
                <div class="search">

							<div class="input">
							<span style="color: white;">Từ ngày</span> <input type="text" id="floor_date" class="date" />
							</div>
				</div>
				</div>
                <div class="sub_menu">
                <div class="save" >
                <a target="_blank" href="<?=$this->url_model->emit_cate_url($menu_info['menu_id'])?>"><img src="html/resources/images/icons/go.png" width="32px" height="32px"/><br />
                <span>Xem</span>
                </a>
               </div>                
                <div class="save">
                <a href="admin/menu.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save">
                <a href="admin/menu.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_cate('<?=$menu_info['menu_id']?>')" ><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_menu').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
               </div>
                               
                 </div>
                 <?=$message?>
				<!-- end box / title -->
                <form id="frm_edit_menu" name="frm_edit_menu" method="post" action="" onsubmit="return validate_form('frm_edit_menu')">
				<div class="form">
                <div class="options-title">Thông tin bắt buộc</div>
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề danh mục</label>
							</div>
							<div class="input">
								<input type="text" id="menu_title" name="menu_title" size="40" value="<?php echo $menu_info['menu_title'] ?>" class="required_field" onchange="$('#menu_metatitle,#menu_h1,#sub_title').val(this.value)"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề phụ</label>
							</div>
							<div class="input">
								<input type="text" id="sub_title" name="sub_title" size="40" value="<?php echo $menu_info['sub_title'] ?>" />
                                <span class="notice">(Sử dụng trong một số trường hợp đặc biệt)</span>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Menu string</label>
							</div>
							<div class="input">
								<input type="text" id="menu_string" name="menu_string" value="<?=$menu_info['menu_string']?>"   size="40" class="required_field"  />
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Link liên kết</label>
							</div>
							<div class="input">
								<input type="text" id="menu_url" name="menu_url" value="<?=$menu_info['menu_url']?>"   size="40"  />
							</div>
				        </div>
                       <div class="field">
							<div class="label">
								<label for="autocomplete">Trang</label>
							</div>
							<div class="input">
							<select id="module_id" name="module_id" data="<?=$menu_info['module_id']?>">
                            <option value="0">Chọn trang</option>
                           
                                <?php

                             foreach($modules->result_array() as $module){
                                echo'<option value="',$module['module_id'],'" title="',$module['module_name'],'">',$module['module_description'],'</option>';
                             }
                              ?>
                            </select>
							</div>
						</div>
                        <a name="frm_edit"></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Danh mục cha</label>
							</div>

							<div class="input"><strong><?=$parent?></strong></div>
						</div>
                        
                                 
                        <input type="hidden" id="menu_id" name="menu_id" value="<?php echo $menu_info['menu_id'] ?>" />

                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" id="menu_visible" name="menu_visible" <?php if($menu_info['menu_visible']==1){echo'checked="checked"';} ?> value="1"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị trang chủ</label>
							</div>
							<div class="input">
								<input type="checkbox" id="menu_home" name="menu_home" <?php if($menu_info['menu_home']==1){echo'checked="checked"';} ?> value="1"/>
							</div>
						</div>
                    
                        </div>
                        <div class="options-title">Thông tin tùy chọn</div>
                        <div class="fields hidden">
                                               <div class="field">
							<div class="label">
								<label for="autocomplete">Layout hiển thị </label>
							</div>
							<div class="input">
								<input type="text" name="layout_name" id="layout_name"  value="<?=$menu_info['layout_name']?>" size="40"  />
                                <span class="notice">(Bỏ trống nếu không nắm rõ)</span>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Giao diện hiển thị</label>
							</div>
							<div class="input">
								<input type="text" name="template_id" id="template_id"  size="40" value="<?=$menu_info['template_id']?>"  />
                                 <span class="notice">(Bỏ trống nếu không nắm rõ)</span>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">ảnh đại diện (nếu có)</label>
							</div>
							<div class="input">
								<input type="text" name="menu_image" id="menu_image" value="<?=$menu_info['menu_image']?>"  size="40"  />
                                 <input type="button" value="Chọn ảnh" onclick="get_ck('menu_image')" />
                                 <div id="menu_image-thumb"><?=(trim($menu_info['menu_image']) != '')?'<img src="' .$menu_info['menu_image']. '" height="50"/>':'';?></div>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">File đính kèm</label>
							</div>
							<div class="input">
								<input type="text" id="file_attach" name="file_attach"  value="<?=$menu_info['file_attach']?>"  size="40"  />
                                 <input type="button" value="Chọn File" onclick="get_ck('file_attach')" />
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thẻ h1</label>
							</div>
							<div class="input">
								<input type="text" id="menu_h1" name="menu_h1" value="<?=$menu_info['menu_h1']?>"  size="40"  />
							</div>
				        </div>
      						<div class="field">
							<div class="label">
								<label for="autocomplete">Meta title</label>
							</div>
							<div class="input">
								<input type="text" id="menu_metatitle" name="menu_metatitle" value="<?=$menu_info['menu_metatitle']?>"  size="40"  />
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Meta keyword</label>
							</div>
							<div class="input">
								<textarea name="menu_keyword" id="menu_keyword" cols="40" rows="3"><?=$menu_info['menu_keyword']?></textarea>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Meta description</label>
							</div>
							<div class="input">
								<textarea name="menu_description" id="menu_description" cols="40" rows="3"><?=$menu_info['menu_description']?></textarea>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thông tin danh mục</label>
							</div>
							<div class="input">
								<textarea name="menu_details" id="menu_details" cols="40" rows="3"><?=$menu_info['menu_details']?></textarea>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tags</label>
							</div>
							<div class="input">
								<textarea id="menu_tags" name="menu_tags" cols="40" rows="3"><?=$menu_info['menu_tags']?></textarea>
							</div>
				        </div>
                  
				</div>
					<div class="options-title " >Nội dung trang riêng</div>
					<div class="fields options hidden">
						<div class="field">
							<textarea name="menu_content"><?=$menu_info['menu_content']?></textarea>
							<script type="text/javascript">initCKeditor('menu_content','Full','98%',400);</script>
						</div>

					</div>
				</div>
                <div class="sub_menu">
                <div class="save" >
                <a target="_blank" href="<?=$this->url_model->emit_cate_url($menu_info['menu_id'])?>"><img src="html/resources/images/icons/go.png" width="32px" height="32px"/><br />
                <span>Xem</span>
                </a>
               </div>   
                <div class="save">
                <a href="admin/menu.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save">
                <a href="admin/menu.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_cate('<?=$menu_info['menu_id']?>')" ><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_menu').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
               </div>
                 </div>
				</form>
			</div>
        	</div>

	<script type="text/javascript">
		$(function(){
			$('.options-title').click(function(){
				$(this).next('.fields').toggle();
			});
		})
	</script>
	<style type="text/css">
		.hidden{display: none}
	</style>
<?php
$this->load->view('back_end/footer.php');
?>