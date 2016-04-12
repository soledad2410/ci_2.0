<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Quản trị trang nội dung website</h5>
                    <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_config()" />
							</div>
						
					</div>
                    <div class="search">
						
							<div class="input">
								<select id="module">
                                <option value="0">--Chọn module--</option>
                                <?foreach($config_modules->result_array() as $config):
                                if($config['config_module']!=''):
                                ?>
                                <option value="<?=$config['config_module']?>" <?if($this->input->get('module')==$config['config_module']){echo'selected="selected"';}?>><?=$config['config_module']?></option>
                            <?endif;
                            endforeach;?>
                                </select>
							</div>
				</div>
            		</div>
                    
               <div class="sub_menu">
               
               <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
                
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_config();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_config();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_config" name="frm_list_config">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề cấu hình</th>
						      	 <th>Tên cấu hình</th>
								<th>Loại cấu hình</th>
                                <th>Cấu hình module quản trị</th>
                                <th>Hoạt động</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($configs->result_array() as $config):?>
                        <tr>
                            <td class="title-cate" style="width: 48%!important;padding-left:40px;"><?=$config['config_title']?></td>
                            <td class="title-module"><?=$config['config_name']?></td>
                            <td class="title-module" style="width: 10%;"><?=$config['config_type']?></td>
                            <td class="title-module" style="width: 20%;"><?=$config['config_module']?></td>
                            <td style="text-align: center;" class="visible-cate"><img height="16" width="16" src="html/resources/images/icons/active_<?=$config['config_active']?>.gif"/></td>
                            <td class="selected last"><input type="checkbox" value="<?=$config['config_id']?>" name="<?=$config['config_id']?>"/></td>
                        </tr>
                         <? endforeach;?>
                      
						</tbody>
     			    </table>
					<!-- pagination -->
					
					<!-- end pagination -->
					<!-- table action -->
					
					<!-- end table action -->
					</form>
				</div>
                <div class="sub_menu">
               
               <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
                
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_config();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_config();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
                <div style="clear: both;"></div>
            
                </div>
                
            <div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới cấu hình</h5>
				</div>
				<!-- end box / title -->
                <div class="sub_menu">
                <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
                <div class="sub_menu-notice" style="margin-top: 10px;line-height: 1.4em;">
                -Đối với cấu hình loại có sự lựa chọn như radio hay select box,phần lựa chon được đặt tên theo quy tắc :<br />
                -"Tiêu đề lựa chọn 1:Tên_lựa_chọn_1|Tiêu đề lựa chọn 2:Tên_lựa_chọn_2|.." với giá trị mặc định là lựa chọn đầu tiên
                
                </div>
                </div> 
                        
				<form id="frm_add_config" name="frm_add_config">
				<div class="form">
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề cấu hình </label>
							</div>
							<div class="input">
								<input type="text" name="config_title" class="required_field"  size="40"  />
							</div>
						</div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên cấu hình </label>
							</div>
							<div class="input">
								<input type="text" name="config_name" class="required_field"  size="40"  />
							</div>
					</div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Loại cấu hình </label>
							</div>
							<div class="input">
								<select name="config_type">
                                <option value="textbox">TextBox</option>
                                <option value="radio">Radio</option>
                                <option value="checkbox">CheckBox</option>
                                <option value="textarea">TextArea</option>
                                <option value="ckeditor">TextEditor</option>
                                <option value="selectbox">SelectBox</option>
                                <option value="filefield">FileField</option>
                                <option value="number">Number field</option>
                                </select>
							</div>
					</div>
				        <div class="field">
							<div class="label">
								<label for="autocomplete">Cấu hình lựa chọn</label>
							</div>
							<div class="input">
							<input type="text" size="100" name="config_prototype" />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Cấu hình module</label>
							</div>
							<div class="input">
							<select name="config_module" id="config_module">
                            <?foreach($config_modules->result_array() as $config):
                            if($config['config_module']!=''):
                            ?>
                            <option value="<?=$config['config_module']?>"><?=$config['config_module']?></option>
                            <?endif;
                            endforeach;?>
                            </select>
                            <input type="text" id="new_module" size="25"  name="new_module" style="display: none;" />
                            
                            <br /><input type="checkbox" name="add_new_module" id="add_new_module" value="1" onclick="check_new_module()" />Nhập mới
                            
							</div>
						</div>
                        <a name="form" ></a>
                        
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hoạt động </label>
							</div>
							<div class="input">
								<input type="checkbox" id="config_active" value="1" name="config_active"/>
							</div>
						</div>
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="add_config();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
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