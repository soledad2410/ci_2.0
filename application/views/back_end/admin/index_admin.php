<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){$("#group_description").html($("#group_name").find("option:selected").attr("title"));
$("#group_name").change(function(){
    $("#group_description").html($(this).find("option:selected").attr("title"));
})
}
);
</script>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách quản trị</h5>
                    
                    <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_admin()" />
							</div>
					</div>
            	</div>
                <div class="sub_menu">
                <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
                <div class="sub_menu-notice" style="margin-top: 10px;line-height: 1.4em;">
                -Quyền sửa và xóa các thành viên khác chỉ được thực hiện bởi tài khoản quản trị thuộc nhóm admin<br />
                -Tài khoản thuộc nhóm quản trị admin không thể xóa
                </div>
                <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_admin();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_admin();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
  		        <div class="table">
					<form id="frm_list_admin" name="frm_list_admin">
                  
					<table>
						<thead>
							<tr>
								<th class="left">Tên đầy đủ</th>
								<th>Tên truy cập</th>
								<th>Lần truy cập cuối</th>
								<th>Nhóm quản trị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                          
                        <? foreach($users->result_array() as $user):
                         ?>
                        	<tr>
								<td class="title" style="padding: 10px;"><?= $user['user_fullname'] ?></td>
								<td class="price" style="padding: 10px;"><?= $user['user_name'] ?></td>
								<td class="date" style="padding: 10px;" id="dp1307331808406"><?= date('H:m d-m-Y',$user['last_login']) ?></td>
								<td class="category" style="padding: 10px;"><span style="margin-left: <?=$user['group_level']*10?>px;"><?= $user['group_name'] ?></span></td>
                                <td class="queu" style="padding: 10px;"></td>
                                <td class="queu" style="padding: 10px;"></td>
								<td class="selected last" style="padding: 10px;"><input type="checkbox" name="<?= $user['user_name'] ?>" value="<?= $user['user_name'] ?>"/></td>
							</tr>
                           <?
                            endforeach; ?> 
						</tbody>
     			    </table>
                    </form>
				</div>
                <?=$message?>
                <div class="sub_menu">
                <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_admin();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_admin();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
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
					<h5>Thêm mới thành viên quản trị</h5>
				</div>
                <div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;line-height: 1.4em;">
                - Chỉ có tài khoản quản trị thuộc nhóm admin mới có quyền thêm mới tài khoản quản trị<br />
                - Chỉ thêm được tài khoản thuộc nhóm quản trị cấp thấp hơn nhóm admin
                </div>  
                </div>
				<!-- end box / title -->
            	<form id="frm_add_user" name="frm_add_user" method="post" action="admin/user.html" onsubmit="return save_add_user()">
				<div class="form">
					<div class="fields">
                    <div class="options-title">Thông tin bắt buộc</div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tên đầy đủ</label>
							</div>
							<div class="input">
								<input type="text" size="40" id="user_fullname" name="user_fullname" class="required_field"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tên truy cập</label>
							</div>
							<div class="input">
								<input type="text" size="40" id="user_name" name="user_name" class="required_field"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mật khẩu</label>
							</div>
							<div class="input">
								<input size="40" type="password" name="user_pwd" id="user_pwd" class="required_field" minlength="6"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Gõ lại Mật khẩu</label>
							</div>
							<div class="input">
								<input type="password" size="40" name="re_user_pwd" id="re_user_pwd"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ email</label>
							</div>
							<div class="input">
								<input type="text" size="40" name="user_email" id="user_email"  class="email_field" />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Nhóm thành viên</label>
							</div>
							<div class="input">
								<select name="group_id" id="group_id" >
                                <?php 
                                foreach($groups->result_array() as $group){
                                    
                                    echo'<option value="'.$group['group_id'].'" title="'.$group['group_description'].'">'.$group['group_name'].'</option>';
                                }
                                ?>
                                </select>
							</div>
                            </div>
                            <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả nhóm</label>
							</div>
							<div class="input" style="padding: 3px;"> 
								<span id="group_description"></span>
							</div>
						</div>
						
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Khóa tài khoản</label>
							</div>
							<div class="input">
								<input type="checkbox" name="user_block" id="user_block" value="1"  />
							</div>
						</div>
                        <div class="options-title">Thông tin bổ xung</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ngày tháng năm sinh</label>
							</div>
							<div class="input">
								<input type="text" size="40" name="user_birthdate"  class="date" />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại liên lạc</label>
							</div>
							<div class="input">
								<input type="text" size="40" name="user_cellphone"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại cố định </label>
							</div>
							<div class="input">
								<input type="text" size="40" name="user_homephone"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Công ty (cơ quan) công tác</label>
							</div>
							<div class="input">
								<input type="text" size="40" name="user_company"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ</label>
							</div>
							<div class="input">
								<textarea name="user_address" cols="40" rows="3"></textarea>
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="autocomplete">Thông tin thêm</label>
							</div>
							<div class="input">
								<textarea name="user_intro" cols="40" rows="3"></textarea>
							</div>
						</div>
					</div>
				</div>
                <div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_user').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
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