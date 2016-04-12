<?php
$this->load->view('back_end/header.php');
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#floor_date").attr('value','<?= $this->input->get('from')?>');
    $("#ceil_date").attr('value','<?= $this->input->get('to')?>');
});
function deleteDepartment(id)
{
    var data = {'id' : id};
    var check = confirm('Bạn có muốn xóa phòng ban này không');
    if (check)
    {
        $.ajax({
            type : 'post',
            data : data,
            url : base_url + 'admin/contact/delete_department',
            success:function(){
                document.location.href = base_url + 'admin/contact/department';
            }
        })      
    }
}
</script>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách liên hệ website</h5>

                    <div class="search">

							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('name') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_contact()" />
							</div>

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

               <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_list_department').submit()" ><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Xác nhận</span>
                </a>
                </div>

                <div class="save" >
                <a href="admin/contact.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>

                </div>
                <div class="table">
					<form id="frm_list_department" name="frm_list_department" method="post" action="admin/contact/update_department" onsubmit="return validate_form('frm_list_department')">
					<table>
						<thead>
							<tr>
								<th class="left">Tên phòng ban</th>
                                
                                <th>Xóa</th>
								
							</tr>
						</thead>

						<tbody>
                        <?php
                        foreach($departments->result_array() as $department):
                        ?>
                        	<tr>
								<td class="title" style="width: 90%;"><input class="required_field" type="text" name="<?=$department['department_id']?>" value="<?=$department['department_name']?>" /></td>
                                <td class="queu" style="width: 10%;"><a href="javascript:void(0)" onclick="deleteDepartment('<?=$department['department_id']?>')"><img src="html/resources/images/icons/delete.png" width="16" height="16" alt="up"/></a></td>
								
							</tr>
                           <?php endforeach; ?>
						</tbody>
     			    </table>
					<!-- pagination -->
					
					<!-- end pagination -->
					<!-- table action -->

					<!-- end table action -->
					</form>
                    <?=$message?>
				</div>
                <div class="sub_menu">

                
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_list_department').submit()" ><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Xác nhận</span>
                </a>
                </div>
                <div class="save" >
                <a href="admin/contact.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>

                </div>
                <div style="clear: both;"></div>

                </form>

                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới phòng ban</h5>
				</div>
				<!-- end box / title -->


				<form id="frm_add_contact" name="frm_add_contact" method="post" action="" onsubmit="return validate_form('frm_add_contact')">
				<div class="form">
					<div class="fields">
			          <div class="field">
							<div class="label">
								<label for="input-medium">Tên phòng ban</label>
							</div>
							<div class="input">
								<input type="text" name="department_name" class="required_field" size="50"  />
							</div>
						</div>
                        
					</div>
				</div>

				</form>

                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_contact').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>


                </div>

			</div>
			</div>

<?php
$this->load->view('back_end/footer.php');
?>