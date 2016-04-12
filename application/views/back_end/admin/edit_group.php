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
			 <div class="box">
				<div class="title">
					<h5>Sửa thông tin nhóm quản trị</h5>
				</div>
                <div class="sub_menu">
                <div class="save" >
                <a href="admin/admin/group" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_group').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
                <?=$message?>
				<!-- end box / title -->
            	<form id="frm_edit_group" name="frm_edit_group" method="post" action="admin/admin/edit_group/<?=$group['group_id']?>.html" onsubmit="return validate_form('frm_edit_group')">
				<div class="form">
                <input type="hidden" name="token" value="<?=$token?>" />
					<div class="fields">
                    <div class="options-title">Thông tin bắt buộc</div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tên nhóm</label>
							</div>
							<div class="input">
								<input type="text" size="40" class="name_field" name="group_name" value="<?=$group['group_name']?>"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả</label>
							</div>
							<div class="input">
								<input type="text" size="40" name="group_description" value="<?=$group['group_description']?>"/>
							</div>
						</div>

                        <div class="field">
                        <div class="label">
								<label for="autocomplete">Hoạt động</label>
							</div>
							<div class="input">
								<input type="checkbox" name="group_block" value="0" <?=($group['group_block'] == 0)?'checked="checked"':'';?>  />
							</div>
						</div>
                    </div>
                    <div class="options-title">Phân quyền nhóm</div>
                    <?

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
								<input type="checkbox" name="group_privilege_<?=$group['name']?>|<?=$role['name']?>" value="<?=$group['name'] . '|' . $role['name']?>" <?=in_array($group['name'] . '|' . $role['name'],$privilege_array)?'checked="checked"':'';?> class="group_<?=$group['name']?>"  />
							</div>


                    <?
                   endforeach;
                   ?>
                   	</div>

                    <?
                    endforeach;?>
				</div>
                	</form>
                <div class="sub_menu">
                <div class="save" >
                <a href="admin/admin/group" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_group').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>

			</div>
			</div>

<?php
$this->load->view('back_end/footer.php');
?>