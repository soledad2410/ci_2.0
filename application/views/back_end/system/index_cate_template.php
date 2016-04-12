<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Module nội dung website</h5>
            		</div>
               <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_catetemplate();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_catetemplate();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_cate_template" name="frm_list_cate_template">
					<table>
						<thead>
							<tr>
								<th class="left"  >Mô tả template</th>
						      	 <th>Tên Template</th>
								<th>Module</th>
                             
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($cate_templates->result_array() as $template):
                        if(file_exists('application/views/web_layout/'.$current_layout.'/contents/'.$template['template_name'].'.php')):
                        ?>
                        <tr>
        <td class="title-cate" style="width: 78%!important;"><?=$template['template_title']?></td>
        <td class="title-module"><?=$template['template_name']?></td>
        <td style="text-align: center;" class="visible-cate"><?=$template['module_name']?></td>
        <td class="selected last"><input type="checkbox" value="<?=$template['template_id']?>" name="<?=$template['template_id']?>"/></td>
        </tr>
        <?endif;endforeach;?>
                      
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
                <a href="javascript:void(0)" onclick="edit_catetemplate();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_catetemplate();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
                <div style="clear: both;"></div>
            
                </div>
                
            <div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới template danh mục</h5>
				</div>
				<!-- end box / title -->
                 
                        
				<form id="frm_add_catetemplate" name="frm_add_catetemplate">
				<div class="form">
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên template </label>
							</div>
							<div class="input">
								<input type="text" name="template_name" class="required_field"  size="40"  />
							</div>
						</div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề template</label>
							</div>
							<div class="input">
							<input type="text" name="template_title" class="required_field"  size="40"  />
							</div>
						</div>
                        <a name="form" ></a>
                        
                        
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Module </label>
							</div>
							<div class="input">
								<select name="module_name">
                                <?foreach($modules->result_array() as $module):?>
                                <option value="<?=$module['module_name']?>"><?=$module['module_name']?> </option>
                                <?endforeach;?>
                                </select>
							</div>
						</div>
                        
						
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="add_catetemplate();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
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