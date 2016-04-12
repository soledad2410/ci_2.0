<?php
$this->load->view('back_end/header.php'); 

?>

<script type="text/javascript">
        $(document).ready(function(){
    $("#member_birthdate").attr('value','<?= (trim($member['member_birthdate']=='')||($member['member_birthdate']=='0'))?'':date('d-m-Y',$member['member_birthdate'])?>');
})
        </script>
<div id="content">
    <div class="box">
        <div class="title">
					<h5>Sửa thông tin thành viên</h5>
                    
                    <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('phrase') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_member()" />
							</div>
					</div>
                    <div class="search">
						<span style="color: white;"></span><select name="group" id="group">
                                <option value="0">--Nhóm thành  viên--</option>
                                <?foreach($groups->result_array() as $group):?>
                                <option value="<?=$group['group_id']?>"><?=$group['group_name']?></option>
                                <?endforeach;?>
                                </select>
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
                <div class="save">
                <a href="admin/member.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save">
                <a href="admin/member.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_member('<?=$member['member_id']?>')" ><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_member();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
               </div>
                 </div>
                 <?=$message?>
				<!-- end box / title -->
                <form id="frm_edit_member" name="frm_edit_member" method="post" action="" onsubmit="return validate_form('frm_edit_member')">
				<div class="form">
					<div class="fields">
                    <div class="options-title" >Thông tin bắt buộc </div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tên đầy đủ</label>
							</div>
							<div class="input">
								<input type="text" id="member_fullname" name="member_fullname" class="required_field" size="40" value="<?=$member['member_fullname']?>"  />
							</div>
						</div>
                        <input type="hidden" name="member_id" value="<?=$member['member_id']?>" />
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ email đăng ký</label>
							</div>
							<div class="input">
								<input type="text" id="member_email" name="member_email" size="40" value="<?=$member['member_email']?>" class="email_field"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mật khẩu</label>
							</div>
							<div class="input">
								<input type="password" name="member_password" id="member_password" size="40" value="<?=$member['member_password']?>" class="required_field" minlength="6"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Gõ lại Mật khẩu</label>
							</div>
							<div class="input">
								<input type="password" name="re_member_password" id="re_member_password" size="40" value="<?=$member['member_password']?>" class="required_field"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Nhóm thành viên</label>
							</div>
							<div class="input">
								<select name="group_id" id="group_id">
                                <?foreach($groups->result_array() as $group):?>
                                <option value="<?=$group['group_id']?>" <?=($member['group_id']==$group['group_id'])?'selected="selected"':'';?>><?=$group['group_name']?></option>
                                <?endforeach;?>
                                </select>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tài khoản hoạt động</label>
							</div>
							<div class="input">
								<input type="checkbox" name="member_active" id="member_active" value="1" <?=($member['member_active']==1)?'checked="checked"':''?>/>
							</div>
						</div>
                        <div class="options-title" >Thông tin tùy chọn</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ liên lạc</label>
							</div>
							<div class="input">
								<input type="text" name="member_address" id="member_address" value="<?=$member['member_address']?>"   />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ngày tháng năm sinh</label>
							</div>
							<div class="input">
								<input type="text" name="member_birthdate" id="member_birthdate"  class="date"  />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="autocomplete">Công ty( cơ quan công tác)</label>
							</div>
							<div class="input">
								<input type="text" name="member_company" id="member_company" value="<?=$member['member_company']?>"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại liên lạc</label>
							</div>
							<div class="input">
								<input type="text" name="member_cellphone" id="member_cellphone" value="<?=$member['member_cellphone']?>"   />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thông tin thêm</label>
							</div>
							<div class="input">
								<textarea name="member_intro" cols="40" rows="3"><?=$member['member_intro']?></textarea>
							</div>
						</div>
					</div>
				</div>
                </form>
                <div class="sub_menu">
                <div class="save">
                <a href="admin/member.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save">
                <a href="admin/member.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_member('<?=$member['member_id']?>')" ><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_member();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
               </div>
               </div>
            </div>
        	</div>
<?php
$this->load->view('back_end/footer.php'); 
?> 