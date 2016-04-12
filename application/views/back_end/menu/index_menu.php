<?php
$this->load->view('back_end/header.php');
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Trang quản trị danh mục</h5>
                </div>
                <div class="sub_menu">
                <div class="save">
                <a href="admin/menu.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_cate();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_cate();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
                <?=$message?>
                <?=flash_data()?>
  				<!-- end box / title -->
               <div class="table">
					<form id="frm_list_cate" name="frm_list_cate">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề</th>
						      	 <th>Trang</th>
								<th>Hiển thị</th>
                                  <th>Giao diện web</th>
                                <th>Giao diện hiển thị</th>
                                <th>Sắp xếp</th>
                                
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>

						<tbody>
          				<?=$menu_table; ?>
                      	</tbody>
     			    </table>
            	</form>
                    <div class="pagination pagination-left">
						<div class="results">
							<span>Có tổng cộng <?=$total?> danh mục</span>
						</div>
                    </div>
				</div>
                <div class="sub_menu">
               <div class="save">
                <a href="admin/menu/index.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_cate();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_cate();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
                <div style="clear: both;"></div>

               </div>
                <div class="box" >
			     <div class="title">
					<h5>Thêm mới danh mục </h5>
				</div>
                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_menu').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
                
				<form id="frm_add_menu" name="frm_add_menu" action="admin/menu.html" method="post" onsubmit="return save_add_menu()">
				<div class="form">
                <div class="options-title" >Thông tin bắt buộc</div>
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề danh mục</label>
							</div>
							<div class="input">
								<input type="text" id="menu_title" name="menu_title" class="required_field" onchange="$('#menu_metatitle,#menu_h1,#sub_title').val(this.value)"  size="40"  />
							</div>
				</div>
                <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề phụ</label>
							</div>
							<div class="input">
								<input type="text" id="sub_title" name="sub_title"   size="40"  />
                                <span class="notice">(Sử dụng trong một số trường hợp đặc biệt)</span>
							</div>
				</div>
                <div class="field">
							<div class="label">
								<label for="autocomplete">Link </label>
							</div>
							<div class="input">
								<input type="text" id="menu_url" name="menu_url"   size="40"  />
                                <span class="notice">(Nếu đặt link, các thông tin về trang, layout, kiểu hiển thị sau không cần điền)</span>
							</div>
				        </div>
                <div class="field">
							<div class="label">
								<label for="autocomplete">Menu string</label>
							</div>
							<div class="input">
								<input type="text" id="menu_string" name="menu_string"   size="40"  />
							</div>
				        </div>

                        <div class="field">
							<div class="label">
								<label for="autocomplete">Danh mục cha</label>
							</div>
							<div class="input">
							<select id="parent_id" name="parent_id">
                            <option value="0">Danh mục gốc</option>
                             <?php echo $menu ?>
                            </select>
							</div>
						</div>

                        <div class="field">
							<div class="label">
								<label for="autocomplete">Trang</label>
							</div>
							<div class="input">
							<select id="module_id" name="module_id">
                            <option value="0">Chọn trang</option>
                           
                                <?php

                             foreach($modules->result_array() as $module){
                                echo'<option value="',$module['module_id'],'" title="',$module['module_name'],'">',$module['module_description'],'</option>';
                             }
                              ?>
                            </select>
							</div>
						</div>
                        <a name="form"></a>
                        <div id="template"></div>
                
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" id="menu_visible" name="menu_visible" value="1" checked="checked"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị trang chủ</label>
							</div>
							<div class="input">
								<input type="checkbox" id="menu_home" name="menu_home" value="1"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Quền truy cập</label>
							</div>
							<div class="input">
								<input type="checkbox" name="menu_privilege[]" value="0" checked="checked" />Tất cả
							</div>
                            <?foreach($groups->result_array() as $group):?>
                            <div class="input">
								<input type="checkbox" name="menu_privilege[]" value="<?=$group['group_id']?>" /><?=$group['group_name']?>
							</div>
                            <?endforeach;?>
						</div>
                        </div>
                        <div class="options-title " >Thông tin tùy chọn</div>
                        <div class="fields options hidden">
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Layout hiển thị </label>
							</div>
							<div class="input">
								<input type="text" name="layout_name" id="layout_name"  size="40"  />
                                <span class="notice">(Bỏ trống nếu không nắm rõ)</span>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Giao diện hiển thị</label>
							</div>
							<div class="input">
								<input type="text" name="template_id" id="template_id"  size="40"  />
                                 <span class="notice">(Bỏ trống nếu không nắm rõ)</span>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ảnh đại diện (nếu có)</label>
							</div>
							<div class="input">
								<input type="text" name="menu_image" id="menu_image"  size="40"  />
                                 <input type="button" value="Chọn ảnh" onclick="get_ck('menu_image')" />
                                 <div id="menu_image-thumb"></div>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">File đính kèm</label>
							</div>
							<div class="input">
								<input type="text" id="file_attach" name="file_attach"   size="40"  />
                                 <input type="button" value="Chọn ảnh" onclick="get_ck('file_attach')" />
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thẻ h1</label>
							</div>
							<div class="input">
								<input type="text" id="menu_h1" name="menu_h1"   size="40"  />
							</div>
				        </div>
						<div class="field">
							<div class="label">
								<label for="autocomplete">Meta title</label>
							</div>
							<div class="input">
								<input type="text" id="menu_metatitle" name="menu_metatitle"   size="40"  />
							</div>
				        </div>
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Meta keyword</label>
							</div>
							<div class="input">
								<textarea name="menu_keyword" id="menu_keyword" cols="40" rows="3"></textarea>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Meta description</label>
							</div>
							<div class="input">
								<textarea name="menu_description" id="menu_description" cols="40" rows="3"></textarea>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thông tin danh mục</label>
							</div>
							<div class="input">
								<textarea name="menu_details" id="menu_details" cols="40" rows="3"></textarea>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tags</label>
							</div>
							<div class="input">
									<textarea name="menu_tags" id="menu_tags" cols="40" rows="3"></textarea>
							</div>
				        </div>
                
					</div>
					<div class="options-title " >Nội dung trang riêng</div>
					<div class="fields options hidden">
						<div class="field">
							<textarea name="menu_content"></textarea>
							<script type="text/javascript">initCKeditor('menu_content','Full','98%',400);</script>
						</div>

					</div>
				</div>
                </form>
                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_menu').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>


                </div>

			</div>
        	</div>
<script type="text/javascript">
	$(function(){
		$('.options-title').click(function(){
			$(this).next('.fields').toggle();
		});


               $('.menu_queu').change(function(){
                 
                    var id = $(this).attr('name');
                    var queu = $(this).val();
                    var parent = $(this).attr('parent');
                    $.post('/admin/menu/swap_position',{id:id,queu:queu,parent:parent},function(rs){
                        if(rs.code == 'success')
                        {
                            var id2 = rs.swapped_id;
                            
                            if(id2){
                              
                                $('#frm_list_cate').find('input').each(function(){
                                    if($(this).attr('name') == id2 && $(this).attr('parent') == parent){
                                        $(this).val(rs.queu);
                                    }
                                });
                            }
                            
                        }
                    },'json');
               }); 
            });

            </script>
<style type="text/css">
	.hidden{display: none}
</style>
<?php
$this->load->view('back_end/footer.php');
?>