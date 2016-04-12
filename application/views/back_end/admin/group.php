<?php
$this->load->view('back_end/header.php');
?>
<script type="text/javascript">
$(document).ready(function(){$("#group_description").html($("#group_name").find("option:selected").attr("title"));
$("#group_name").change(function(){
    $("#group_description").html($(this).find("option:selected").attr("title"));
});
$('.group_role').click(function(){var name = $(this).attr('title');$(this).is(':checked')?$('.group_'+name).attr('checked','checked'):$('.group_'+name).removeAttr('checked');});
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
                </div>
  		        <div class="table">
					<form id="frm_list_admin" name="frm_list_admin">

					<table>
						<thead>
							<tr>
								<th class="left">Tên nhóm</th>
								<th>Mô tả</th>
								<th>Xóa</th>
                                <th>Khóa</th>
                            </tr>
						</thead>

						<tbody>

                        <? foreach($groups->result_array() as $group):
                         ?>
                        	<tr>
								<td class="price" style="padding: 10px;"><a href="admin/admin/edit_group/<?=$group['group_id']?>"><?= $group['group_name'] ?></a></td>
								<td class="title" style="padding: 10px;"><?= $group['group_description'] ?></td>

								<td class="queu" style="padding: 10px;"><a href="javascript:void(0)" onclick="delete_group('<?=$group['group_id']?>')"><img src="html/resources/images/icons/delete.png"/></a></td>
                                <td class="queu" style="padding: 10px;"><a href="javascript:void(0)" onclick="active_group('<?=$group['group_id']?>','<?=$group['group_block']?>')"><img src="html/resources/images/icons/active_<?=$group['group_block']==0?'1':'0';?>.png"/></a></td>

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
                - Các nhóm quản trị thêm vào có mức phân quyền thấp hơn mức phân quyền của nhóm admin<br />

                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_group').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
                </div>

				<!-- end box / title -->
            	<form id="frm_add_group" name="frm_add_group" method="post" action="admin/admin/group.html" onsubmit="return validate_form('frm_add_group')">
				<div class="form">
                <input type="hidden" name="token" value="<?=$token?>" />
					<div class="fields">
                    <div class="options-title">Thông tin bắt buộc</div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tên nhóm</label>
							</div>
							<div class="input">
								<input type="text" size="40" class="name_field" name="group_name"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả</label>
							</div>
							<div class="input">
								<input type="text" size="40" name="group_description"/>
							</div>
						</div>

                        <div class="field">
                        <div class="label">
								<label for="autocomplete">Hoạt động</label>
							</div>
							<div class="input">
								<input type="checkbox" name="group_block" value="0"  />
							</div>
						</div>
                    </div>
                    <div class="options-title">Phân quyền nhóm</div>
                    <?
                    $i = 0;
                    foreach($roles as $group):

                    ?>
                    <div class="options-title group-role"><?=$group['title']?><input type="checkbox" title="<?=$group['name']?>" class="group_role" /></div>
                    <div class="field">
                    <?
                    //var_dump($role['roles']);
                    foreach($group['roles']['role'] as $role):
                    ?>

                        <div class="label" style="text-align: right;width: 30%;">
								<label for="autocomplete"><?=$role['title']?></label>
							</div>
							<div class="input">
								<input type="checkbox" name="group_privilege[]" value="<?=$group['name'] . '|' . $role['name']?>" class="group_<?=$group['name']?>"  />
							</div>


                    <?
                   endforeach;
                   ?>
                   	</div>

                    <?$i ++;
                    endforeach;?>
				</div>
                	</form>
                <div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_group').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
                </div>

			</div>
			</div>

<?php
$this->load->view('back_end/footer.php');
?>