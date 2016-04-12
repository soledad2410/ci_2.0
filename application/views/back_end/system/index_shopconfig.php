<?$this->load->view('back_end/header.php');?>
<script type="text/javascript">
			$(document).ready(function () {
	       	$("#box-tabs").tabs();
			});
		</script>
<div id="content">
<div id="box-tabs" class="box">
	<div class="title">
					<h5>Cấu hình gian hàng</h5>
					<ul class="links">
						<li><a href="#box-shop">Cấu hình gian hàng</a></li>
						<li><a href="#box-package">Gói gian hàng</a></li>
						<li><a href="#box-region">Địa danh</a></li>
					</ul>
				</div>
		<div id="box-shop" class="box">
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
  		       <div class="table">
					<form id="frm_list_shop_config" name="frm_list_shop_config">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề cấu hình</th>
						      	 <th>Tên cấu hình</th>
								<th>Loại cấu hình</th>
                                <th>Nhóm cấu hình</th>
                                <th>Giá trị mặc định</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        <tbody>
                        <?foreach($configs->result_array() as $config):?>
                        <tr>
                            <td class="title-cate" style="width: 38%!important;padding-left:40px;"><?=$config['shopconfig_title']?></td>
                            <td class="title-module"><?=$config['shopconfig_name']?></td>
                            <td class="title-module" style="width: 10%;"><?=$config['shopconfig_type']?></td>
                            <td class="title-module" style="width: 20%;"><?=$config['shopconfig_group']?></td>
                            <td style="text-align: center;" style="width: 20%;"><?=$config['shopconfig_defaultvalue']?></td>
                            <td class="selected last"><input type="checkbox" value="<?=$config['shopconfig_id']?>" name="<?=$config['shopconfig_id']?>"/></td>
                        </tr>
                         <? endforeach;?>
                      	</tbody>
     			    </table>
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
                <?=$message?>
                <form id="frm_add_shopconfig" name="frm_add_shopconfig" method="post" action="admin/system/shop.html" onsubmit="return validate_form('frm_add_shopconfig')">
				<div class="form">
                <input type="hidden" name="token" value="<?=$token?>" />
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề cấu hình </label>
							</div>
							<div class="input">
								<input type="text" name="shopconfig_title" class="required_field"  size="40"  />
							</div>
						</div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên cấu hình </label>
							</div>
							<div class="input">
								<input type="text" name="shopconfig_name" class="required_field"  size="40"  />
							</div>
					</div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Loại cấu hình </label>
							</div>
							<div class="input">
								<select name="shopconfig_type">
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
								<label for="autocomplete">Giá trị mặc định</label>
							</div>
							<div class="input">
							<input type="text"  name="shopconfig_defaultvalue" size="30" />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Nhóm cấu hình</label>
							</div>
							<div class="input">
							<input type="text" id="shopconfig_group" size="30"  name="shopconfig_group" />
                            </div>
						</div>
                        
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_shopconfig').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
				</form>
            </div>
				<div id="box-package">
                    <!-- Gói gian hàng -->
				</div>
				<div id="box-region">
                 
	               <!-- Vùng miền -->
				</div>
	</div>
</div>
<?$this->load->view('back_end/footer.php');?>