<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Quản trị trang nội dung website</h5>
            		</div>
               <div class="sub_menu">
               
               <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
                <div class="sub_menu-notice" style="margin-top: 10px;line-height: 1.4em;">
                -Tên trang nội dung cấp 0 là tên controller website<br />
                -Tên trang nội dung cấp con được đặt theo quy tắc "controller_action"
                </div>
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_module();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_module();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_module" name="frm_list_module">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề trang</th>
						      	 <th>Tên trang</th>
                                 <th>Hoạt động</th>
								<th>Chứa danh mục</th>
                             
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($modules->result_array() as $module):
                        if($module['parent_id']==0):
                                      ?>
                        <tr>
        <td class="title-cate" style="width: 69%!important;"><?=$module['module_description']?></td>
        <td class="title-module"><?=$module['module_name']?></td>
        <td style="text-align: center;" class="visible-cate"><img height="16" width="16" src="html/resources/images/icons/active_<?=$module['module_active']?>.gif"/></td>
        <td style="text-align: center;" class="visible-cate">---</td>
        <td class="selected last"><input type="checkbox" value="<?=$module['module_id']?>" name="<?=$module['module_id']?>"/></td>
        </tr>
        
        <?
                            foreach($modules->result_array() as $module_child):
                                if($module_child['parent_id']==$module['module_id']):
                        ?>
                        <tr>
        <td class="title-cate" style="width: 69%!important;padding-left:40px;"><?=$module_child['module_description']?></td>
        <td class="title-module"><?=$module_child['module_name']?></td>
        
        <td style="text-align: center;" class="visible-cate"><img height="16" width="16" src="html/resources/images/icons/active_<?=$module_child['module_active']?>.gif"/></td>
        <td style="text-align: center;" class="visible-cate"><img height="16" width="16" src="html/resources/images/icons/active_<?=$module_child['module_menu']?>.gif"/></td>
        <td class="selected last"><input type="checkbox" value="<?=$module_child['module_id']?>" name="<?=$module_child['module_id']?>"/></td>
        </tr>
        
        <?      endif;
               endforeach; 
            endif;
        endforeach;?>
                      
						</tbody>
     			    </table>
					<!-- pagination -->
					
					<!-- end pagination -->
					<!-- table action -->
					
					<!-- end table action -->
					</form>
				</div>
                <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_module();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_module();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
                <div style="clear: both;"></div>
            
                </div>
                
            <div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới trang nội dung</h5>
				</div>
				<!-- end box / title -->
                 
                        
				<form id="frm_add_module" name="frm_add_module">
				<div class="form">
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên trang </label>
							</div>
							<div class="input">
								<input type="text" name="module_name" class="required_field"  size="40"  />
							</div>
						</div>
				        <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề trang</label>
							</div>
							<div class="input">
							<textarea cols="40" rows="3" name="module_description"></textarea>
							</div>
						</div>
                        <a name="form" ></a>
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Cấp cha</label>
							</div>
							<div class="input">
							<select name="parent_id">
                            <option value="0">----------------</option>
                            <?foreach($modules->result_array() as $module):?>
                                <?if($module['parent_id']==0):?>
                                <option value="<?=$module['module_id']?>"><?=$module['module_name']?></option>
                                <?endif;?>
                            <?endforeach; ?>
                            </select>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Chứa danh mục </label>
							</div>
							<div class="input">
								<input type="checkbox" id="module_menu" value="1" name="module_menu"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" id="module_active" value="1" name="module_active"/>
							</div>
						</div>
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="add_module();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
				</form>
			</div>
              
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>