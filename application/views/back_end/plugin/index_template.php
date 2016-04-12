<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách khối nội dung</h5>
            		</div>
                
                <div class="sub_menu">
                     
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div><div class="sub_menu-notice" style="margin-top: 10px;">Các template khối nội dung tương ứng với giao diện đang được sử dụng</div>
                <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_plugintemplate();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_plugin_template();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                
                </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_plugintemplate" name="frm_list_plugintemplate">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề</th>
								<th>Loại Khối</th>
								<th>File template</th>
								<th></th>
                                <th></th>
                                <th></th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php
                        
                         foreach($templates->result_array() as $template):
                        if(file_exists($current_layout.'/blocks/'.$template['plugintemplate_name'].'.php')): 
                        ?>
              
							<tr>
								<td class="title" style="padding: 10px;"><?= $template['plugintemplate_title'] ?></td>
								<td class="price" style="padding: 10x;"><?= $template['plugintype_title'] ?></td>
								<td class="date" style="padding: 10px;" id="dp1307331808406"><?= $template['plugintemplate_name']?></td>
								<td class="category"></td>
                                <td class="queu"></td>
                                <td class="queu"></td>
								<td class="selected last"><input type="checkbox" name="<?= $template['plugintemplate_id'] ?>"  value="<?= $template['plugintemplate_id'] ?>"/></td>
							</tr>
                           <?php
                            endif;
                            endforeach; ?> 
						</tbody>
     			    </table>
					<!-- pagination -->
					
					<!-- end pagination -->
					<!-- table action -->
					
					<!-- end table action -->
					</form>
				</div>
                <div class="sub_menu">
                <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_plugintemplate();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_plugin_template();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
                <div style="clear: both;"></div>
                             
                </form>
                
                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới  template khối nội dung</h5>
				</div>
				<!-- end box / title -->
                 <div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div><div class="sub_menu-notice" style="margin-top: 10px;">File template là tên của template khối nội dung nằm trong thư mục blocks của layout giao diện hiện hành</div>
            </div>
                        
				<form id="frm_add_plugintemplate" name="frm_add_plugintemplate">
				
				<div class="form">
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên template </label>
							</div>
							<div class="input">
								<input type="text" id="plugintemplate_title" class="required_field" name="plugintemplate_title"   size="40"  />
							</div>
						</div>
				    <div class="field">
							<div class="label">
								<label for="autocomplete">File template</label>
							</div>
							<div class="input">
								<input type="text" id="plugintemplate_name" name="plugintemplate_name" class="required_field"  size="20"  />
							</div>
						</div>
                        <a name="form" ></a>
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Loại khối</label>
							</div>
							<div class="input">
							<select id="plugintype_id" name="plugintype_id">
                            
                                <?php
                            
                             foreach($plugintypes->result_array() as $plugintype){
                                echo'<option value="',$plugintype['plugintype_id'],'">',$plugintype['plugintype_title'],'</option>';
                             }
                              ?>
                            </select>
							</div>
                            
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Template description</label>
							</div>
							<div class="input">
								<textarea name="template_description" cols="60" rows="3"></textarea>
							</div>
						</div>
       		</div>
				</div>
				</form>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_plugintemplate();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>

			</div>
            
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>