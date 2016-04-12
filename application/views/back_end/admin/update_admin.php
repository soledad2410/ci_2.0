<?php
$this->load->view('back_end/header.php'); 
?>
<style type="text/css">
.user_password{display:none;}
</style>
<script type="text/javascript">
$(document).ready(function(){$("#group_description").html($("#group_name").find("option:selected").attr("title"));
$("#group_name").change(function(){
    $("#group_description").html($(this).find("option:selected").attr("title"));
});
$("#check_change_pwd").click(function(){
    $(this).is(":checked")?$(".user_password").fadeIn("slow"):$(".user_password").fadeOut("slow");
})
}
);
</script>
<div id="content">
			<div class="box">
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
                -Quyền sửa,xóa các thành viên khác chỉ được thực hiện bởi tài khoản quản trị thuộc nhóm admin<br />
                -Tài khoản thuộc nhóm quản trị admin không thể xóa
                </div>
                <div class="save">
                <a href="admin/user.html#form" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_update_user').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
  		        <?=$message?>
                <?if(isset($user)):?>
                <form id="frm_update_user" name="frm_update_user" method="post" action="admin/user/update_user/<?=$user['user_name']?>.html" onsubmit="return save_add_user()">
				<div class="form">
					<div class="fields">
                    <div class="options-title">Thông tin bắt buộc</div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tên đầy đủ</label>
							</div>
							<div class="input">
								<input type="text" size="40" value="<?=$user['user_fullname']?>" id="user_fullname" name="user_fullname" class="required_field"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tên truy cập</label>
							</div>
							<div class="input">
								<strong><?=$user['user_name']?></strong>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Sửa mật khẩu</label>
							</div>
							<div class="input">
								<input type="checkbox" id="check_change_pwd" name="check_change_pwd" value="1" />
							</div>
						</div>
                        <div class="field user_password" >
							<div class="label">
								<label for="autocomplete">Mật khẩu</label>
							</div>
							<div class="input">
								<input size="40" type="password" name="user_pwd" id="user_pwd" class="required_field" minlength="6"  />
							</div>
						</div>
                        <div class="field user_password" >
							<div class="label">
								<label for="autocomplete">Gõ lại Mật khẩu</label>
							</div>
							<div class="input">
								<input type="password" size="40" name="re_user_pwd"  id="re_user_pwd"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ email</label>
							</div>
							<div class="input">
								<input type="text" size="40" value="<?=$user['user_email']?>" name="user_email" id="user_email"  class="email_field" />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Nhóm thành viên</label>
							</div>
							<div class="input">
                            <?if($current_user['group_level']==$user['group_level']):?>
                            <strong><?=$user['group_name']?></strong>
                            <?else:?>
								<select name="group_id" id="group_name" >
                                <?foreach($groups->result_array() as $group):?>
                                    <option value="<?=$group['group_id']?>" title="<?=$group['group_description']?>" <?=($user['group_id']==$group['group_id'])?'selected="selected"':''?>><?=$group['group_name']?></option>
                                    <?endforeach;?>
                                </select>
                                <?endif;?>
							</div>
                            </div>
                            <?if($current_user['group_level']!=$user['group_level']):?>
                            <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả nhóm</label>
							</div>
							<div class="input" style="padding: 3px;"> 
								<span id="group_description"></span>
							</div>
						</div>
                            <?endif;?>
						<div class="field">
							<div class="label">
								<label for="autocomplete">Khóa tài khoản</label>
							</div>
							<div class="input">
								<input type="checkbox" name="user_block" id="user_block" value="1" <?=($user['user_block']==1)?'checked="checked"':''?>  />
							</div>
						</div>
                        <div class="options-title">Thông tin bổ xung</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ngày tháng năm sinh</label>
							</div>
							<div class="input">
								<input type="text" size="40" name="user_birthdate" value="<?=date('d-m-Y',$user['user_birthdate'])?>"  class="date" />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại liên lạc</label>
							</div>
							<div class="input">
								<input type="text" size="40" name="user_cellphone" value="<?=$user['user_cellphone']?>"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại cố định </label>
							</div>
							<div class="input">
								<input type="text" size="40" name="user_homephone" value="<?=$user['user_homephone']?>"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Công ty (cơ quan) công tác</label>
							</div>
							<div class="input">
								<input type="text" size="40" name="user_company" value="<?=$user['user_company']?>"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ</label>
							</div>
							<div class="input">
								<textarea name="user_address" cols="40" rows="3"><?=$user['user_address']?></textarea>
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="autocomplete">Thông tin thêm</label>
							</div>
							<div class="input">
								<textarea name="user_intro" cols="40" rows="3"><?=$user['user_intro']?></textarea>
							</div>
						</div>
					</div>
				</div>
                
				</form>
                <?endif;?>
                <div class="sub_menu">
                <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
                <div class="sub_menu-notice" style="margin-top: 10px;line-height: 1.4em;">
                -Quyền sửa,xóa các thành viên khác chỉ được thực hiện bởi tài khoản quản trị thuộc nhóm admin<br />
                -Tài khoản thuộc nhóm quản trị admin không thể xóa
                </div>
                <div class="save">
                <a href="admin/user.html#form" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_update_user').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                
                </div>
                <div style="clear: both;"></div>
                             
                </form>
                
                </div>
                
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>