<?php
$this->load->view('back_end/header.php');
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#floor_date").attr('value','<?= $this->input->get('from')?>');
    $("#ceil_date").attr('value','<?= $this->input->get('to')?>');
})
</script>
<?
$loc_type = ['country' => 'Quốc gia', 'region' => 'Vùng miền', 'city' => 'Tỉnh - Thành phố', 'district' => 'Quận - Huyện'];
?>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách các địa chỉ</h5>
                    <div class="search">
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('phrase') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_address()" />
							</div>
					</div>
                    


				</div>

                <div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_address();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_list_address').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Đồng ý</span>
                </a>
                </div>
                </div>
  		        <div class="table">
					<form id="frm_list_address" name="frm_list_address" method="post">
					<table>
						<thead>
							<tr>
								<th class="left">Tên</th>
                                <th>Mô tả</th>
								<th>Loại</th>
                                <th>Xóa</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>

						<tbody>
                        <?php foreach($locations as $loc): ?>

							<tr>
								<td class="title" style="width: 20%;">
                                <a href="javascript:void(0)" title="<?= $loc['region_id'] ?>" onclick="edit_loc(this)"><?= $loc['region_name'] ?></a>
                                <a href="javascript:;" class="add-loc-field" title="<?= $loc['region_id'] ?>"><img width="8" height="8" src="html/resources/images/plus.png"/></a>
                                </td>
                                <td class="name" style="width: 40%;"><?= $loc['region_description'] ?></td>
								<td class="price"><?= isset($loc_type[$loc['region_type']]) ? $loc_type[$loc['region_type']] : '---'; ?></td>
                                <td class="queu"><a href="javascript:void(0)" onclick="delete_loc('<?= $loc['region_id'] ?>')"><img src="html/resources/images/icons/delete.png"/></a></td>
								<td class="selected last"><input type="checkbox"  name="location_id[]" value="<?= $loc['region_id'] ?>"/></td>
							</tr>
                            <?php
                            if(isset($loc['children'])):
                            foreach($loc['children'] as $loc):
                            ?>
                            	<tr>
    								<td class="title" style="width: 20%;padding-left: 20px;;"><a href="javascript:void(0)" title="<?= $loc['region_id'] ?>" onclick="edit_loc(this)"><?= $loc['region_name'] ?></a>
                                    <a href="javascript:;" class="add-loc-field" title="<?= $loc['region_id'] ?>"><img width="8" height="8" src="html/resources/images/plus.png"/></a>
                                    </td>
                                    <td class="name" style="width: 40%;"><?= $loc['region_description'] ?></td>
    								<td class="price"><?= isset($loc_type[$loc['region_type']]) ? $loc_type[$loc['region_type']] : '---'; ?></td>
                                    <td class="queu"><a href="javascript:void(0)" onclick="delete_loc('<?= $loc['region_id'] ?>')"><img src="html/resources/images/icons/delete.png"/></a></td>
    								<td class="selected last"><input type="checkbox"  name="location_id[]" value="<?= $loc['region_id'] ?>"/></td>
			                     </tr>
                            <?php
                            if(isset($loc['children'])):
                            foreach($loc['children'] as $loc):
                            ?>
                                 <tr>
    								<td class="title" style="width: 20%;padding-left: 40px;" title="<?= $loc['region_id'] ?>"><a href="javascript:void(0)" title="<?= $loc['region_id'] ?>" onclick="edit_loc(this)"><?= $loc['region_name'] ?></a></td>
                                    <td class="name" style="width: 40%;"><?= $loc['region_description'] ?></td>
    								<td class="price"><?= isset($loc_type[$loc['region_type']]) ? $loc_type[$loc['region_type']] : '---'; ?></td>
                                    <td class="queu"><a href="javascript:void(0)" onclick="delete_loc('<?= $loc['region_id'] ?>')"><img src="html/resources/images/icons/delete.png"/></a></td>
    								<td class="selected last"><input type="checkbox"  name="location_id[]" value="<?= $loc['region_id'] ?>"/></td>
			                     </tr>                                 
                           <?php
                             endforeach; 
                           endif;
                           endforeach; 
                           endif;
                            endforeach; ?>
						</tbody>
     			    </table>
                    </form>
					<!-- pagination -->
					<div class="pagination pagination-left">



					</div>
			</div>
                <div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_address();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_list_address').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Đồng ý</span>
                </a>
                </div>
                </div>
                <div style="clear: both;"></div>
               
                </div>
                
			</div>

<script type="text/javascript">

function edit_loc(el)
{
    var loc_id = $(el).attr('title');
    
    var loc_name = $(el).text();
    var des_el = $(el).closest('tr').find('td.name');
    var loc_des = $(des_el).text();
    var name = '<input type="text" value="'+loc_name+'" name="region_name_edit[]"/><input type="hidden" name="region_id_edit[]" value="'+loc_id+'"/>';
    var des = '<input type="text" value="'+loc_des+'" name="region_des_edit[]"/>';
   
    $(el).parent('td').html(name);
  
   $(des_el).html(des);
}
function delete_loc(id)
{
    var check = confirm('Chỉ xóa được những địa danh không chứa địa danh cấp dưới');
    if(check)
    {
        $.post('/admin/address/delete',{'location_id[]' : id},function(rs){location.reload();},'json')
    }
}

function delete_address()
{
      var check = confirm('Chỉ xóa được những địa danh không chứa địa danh cấp dưới');
          if(check)
    {
        $.post('/admin/address/delete',$('#frm_list_address').serialize(),function(rs){location.reload();},'json')
    }
}

$(function()
{
    $('.add-loc-field').click(function(){
        var parent_id = $(this).attr('title');
        var html = '<tr>';
    		html += '						<td class="title" style="width: 20%;padding-left: 20px;;"><input name="region_name[]" type="text" class="required_field"/></a>';
            html += '                       ';
            html += '                        </td>';
            html += '                        <td class="name" style="width: 40%;"><input name="region_description[]" type="text"  /><input name="parent_id[]" type="hidden" value="'+parent_id+'" /></td>';
    		html += '						<td class="price"><select name="region_type[]"><option value="country">Quốc gia</option><option value="region">Vùng - Miến</option><option value="city">Tỉnh - Thành phố</option><option value="district">Quận - Huyện</option></select></td>';
            html += '                        <td class="queu"><a href="javascript:void(0)" onclick="$(this).closest(\'tr\').remove();"><img src="html/resources/images/icons/delete.png"/></a></td>';
    		html += '						<td class="selected last"></td>';
			html += '                     </tr>';
            $(this).closest('tr').after(html);
    });
    $('#frm_list_address').submit(function(e){
           e.preventDefault();
           var data = $(this).serialize();
        if(validate_form('frm_list_address')) {
            $.post('/admin/address/add',data,function(rs){
                location.reload();
            },'json')
        };
    });
});
</script>
<style type="text/css">
span.error{color:red}
</style>
<?php
$this->load->view('back_end/footer.php');
?>