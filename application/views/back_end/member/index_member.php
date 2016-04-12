<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách Thành viên website</h5>
                    
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
                                <option value="0" >--Nhóm thành  viên--</option>
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
                     
                <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
                <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_member();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_member();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
  		     <div class="table">
					<form id="frm_list_member" method="post" action="" name="frm_list_member">
                  
					<table>
						<thead>
							<tr>
								<th class="left">Họ và tên</th>
								<th>Địa chỉ email</th>
								<th>Ngày đăng ký</th>
								<th>Nhóm thành viên</th>
                                <th>Tài khoản hoạt động</th>
                               <th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                      	<tbody>
                        <? foreach($members->result_array() as $member):?>
                        	<tr>
								<td class="title" style="padding: 10px;width:20%"><a href="admin/member/edit_member/<?=$member['member_id']?>.html"><?= $member['member_fullname'] ?></a></td>
								<td class="price" style="padding: 10px;width:20%"><?= $member['member_email'] ?></td>
								<td class="date" style="padding: 10px;width:20%" id="dp1307331808406"><?= date('H:m d-m-Y',$member['date_reg']) ?></td>
								<td class="category" style="padding: 10px;width:20%"><?= $member['group_name'] ?></td>
                                <td class="queu" style="width: 10%;"><img src="html/resources/images/icons/active_<?=$member['member_active']?>.gif" width="16" height="16" alt="visible"/></td>
                          		<td class="selected last" style="padding: 10px;width:10%"><input type="checkbox" name="<?= $member['member_id'] ?>" value="<?= $member['member_id'] ?>"/></td>
							</tr>
                           <?endforeach; ?>
						</tbody>
     			    </table>
                </form>
				</div>
                <div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả từ  <?= $result_from?>-<?= $result_to ?> của tổng <?= $total ?></span>
						</div>
                         <span style="float: left;margin-left: 10px;"><select id="limit" onchange="load_member()">
                          <option value="20" <?php if($this->input->get('limit')==20){echo'selected="selected"';} ?>>20</option>
                          <option value="30" <?php if($this->input->get('limit')==30){echo'selected="selected"';} ?>>30</option>
                          <option value="40" <?php if($this->input->get('limit')==40){echo'selected="selected"';} ?>>40</option>
                          </select></span>
						<ul class="pager">
					   <?php
                          if($page>1){
                            for($i=1;$i<=$page;$i++){
                                if($current_page==$i){
                                    echo'<li class="current" >'.$i.'</li>';
                                }else{
                                echo'<li ><a href="'.$url.'page='.$i.'">'.$i.'</a></li>';
                                }
                            }
                          }
                           ?>
						
						</ul>
					</div>
                <div class="sub_menu">
                <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
               <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_member();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_member();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
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
                  
                </div>
				<!-- end box / title -->
            	<form id="frm_add_member" name="frm_add_member" method="post" onsubmit="return validate_form('frm_add_member')">
                <?=$message?>
				<div class="form">
					<div class="fields">
                    <div class="options-title" >Thông tin bắt buộc </div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tên đầy đủ</label>
							</div>
							<div class="input">
								<input type="text" size="50" id="member_fullname" name="member_fullname" class="required_field"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ email đăng ký</label>
							</div>
							<div class="input">
								<input type="text" size="50" id="member_email" name="member_email" class="email_field"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mật khẩu</label>
							</div>
							<div class="input">
								<input type="password" size="50" name="member_password" id="member_password" class="required_field" minlength="6"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Gõ lại Mật khẩu</label>
							</div>
							<div class="input">
								<input type="password" size="50" name="re_member_password" id="re_member_password" class="required_field"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Nhóm thành viên</label>
							</div>
							<div class="input">
								<select name="group_id" id="group_id">
                                <?foreach($groups->result_array() as $group):?>
                                <option value="<?=$group['group_id']?>"><?=$group['group_name']?></option>
                                <?endforeach;?>
                                </select>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tài khoản hoạt động</label>
							</div>
							<div class="input">
								<input type="checkbox" name="member_active" id="member_active" value="1" checked="checked"  />
							</div>
						</div>
                        <div class="options-title" >Thông tin tùy chọn</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ liên lạc</label>
							</div>
							<div class="input">
								<input type="text" name="member_address" id="member_address"   />
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
								<input type="text" size="40" name="member_company" id="member_company"   />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại liên lạc</label>
							</div>
							<div class="input">
								<input type="text" size="50" name="member_cellphone" id="member_cellphone"   />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thông tin thêm</label>
							</div>
							<div class="input">
								<textarea name="member_intro" cols="40" rows="3"></textarea>
							</div>
						</div>
					</div>
				</div>
                </form>
                <div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_member').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
                </div>
			</div>
			</div>
<?php
$this->load->view('back_end/footer.php'); 
?>