<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Quản trị loại khối nội dung</h5>
            		</div>
               <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_plugintype();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_plugintype();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_plugintype" name="frm_list_plugintype">
					<table>
						<thead>
							<tr>
								<th class="left"  >Tiêu đề loại khối nội dung</th>
						      	 <th>Tên loại khối nội dung</th>
								<th>Hoạt động</th>
                             
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($plugin_types->result_array() as $plugin_type):?>
                        <tr>
        <td class="title-cate" style="width: 78%!important;"><?=$plugin_type['plugintype_title']?></td>
        <td class="title-module"><?=$plugin_type['plugintype_name']?></td>
        <td style="text-align: center;" class="visible-cate"><img height="16" width="16" src="html/resources/images/icons/active_<?=$plugin_type['plugintype_visible']?>.gif"/></td>
        <td class="selected last"><input type="checkbox" value="<?=$plugin_type['plugintype_id']?>" name="<?=$plugin_type['plugintype_id']?>"/></td>
        </tr>
        <?endforeach;?>
                      
						</tbody>
     			    </table>
	
					</form>
				</div>
                <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_plugintype();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_plugintype();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
                <div style="clear: both;"></div>
            
                </div>
                
            <div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới loại khối nội dung</h5>
				</div>
				<!-- end box / title -->
                 
                        
				<form id="frm_add_plugintype" name="frm_add_plugintype">
				<div class="form">
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên loại khối </label>
							</div>
							<div class="input">
								<input type="text" name="plugintype_name" class="required_field"  size="40"  />
							</div>
						</div>
				    <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề loại khối</label>
							</div>
							<div class="input">
							<input type="text" name="plugintype_title" class="required_field"  size="40"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả loại khối</label>
							</div>
							<div class="input">
							<textarea name="plugintype_description" id="plugin_description" cols="40" rows="3"></textarea>
							</div>
						</div>
                        <a name="form" ></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thêm cấu hình</label>
							</div>
							<div class="input">
							<img title="Thêm mới thuộc tính" src="html/resources/images/icons/add.png" width="24" height="24" onclick="add_plugintye_properties()" style="cursor: pointer;" />
							</div>
						</div>
                        <div class="plugin_type_properties">
                        </div>
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hoạt động </label>
							</div>
							<div class="input">
								<input type="checkbox" id="plugintype_visible" value="1" name="plugintype_visible"/>
							</div>
						</div>
                 		
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_plugintype();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
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