<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#floor_date").attr('value','<?= $this->input->get('from')?>');
    $("#ceil_date").attr('value','<?= $this->input->get('to')?>');
})
</script>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách khách hàng đăng ký</h5>
                    <div class="search">
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_article()" />
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
                     
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div><div class="sub_menu-notice" style="margin-top: 10px;">Các bài viết sẽ được hiển thị tương ứng với từng danh mục và sắp xếp mặc định theo thứ tự</div>
                <div class="save">
                <a href="admin/customer.html#frm" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_customer();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="export_excel();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Export excel</span>
                </a>
                </div>
                </div>
  		        <div class="table">
					<form id="frm_list_customer" name="frm_list_customer">
					<table>
						<thead>
							<tr>
								<th class="left">Địa chỉ email</th>
                                <th>Tài khoản</th>
								<th>Tên đầy đủ</th>
								<th>Điện thoại liên lạc</th>
								<th>Địa chỉ</th>
                                <th>Ngày đăng ký</th>
                                <th>Sửa</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php foreach($customers->result_array() as $cus): ?>
              
							<tr>
								<td class="title" style="width: 35%;"><?=$cus['email']?></td>
                                <td class="name" style="width: 10%;text-align: center;"><?= $cus['username'] ?></td>
								<td class="price"><?= $cus['fullname'] ?></td>
								<td class="date" style="width: 15%;" ><?= $cus['phone'] ?></td>
								<td class="category"><?= $cus['address'] ?></td>
                                <td><?= $cus['created_date'] >0 ? date('H:m d-m-Y',$cus['created_date']) : '--' ?></td>
                                <td><a href="javascript:;" onclick="edit_cus(<?=$cus['id']?>)"><img width="16" height="16" src="html/resources/images/icons/edit.png"/></a></td>
								<td class="selected last"><input type="checkbox"  name="cus_select[]" value="<?= $cus['id'] ?>"/></td>
							</tr>
                           <?php endforeach; ?> 
						</tbody>
     			    </table>
                    </form>
					<!-- pagination -->
					<?=admin_paginator($total, $this->input->get('limit'));?>
			</div>
                <div class="sub_menu">
                     
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div><div class="sub_menu-notice" style="margin-top: 10px;">Các bài viết sẽ được hiển thị tương ứng với từng danh mục và sắp xếp mặc định theo thứ tự</div>
                <div class="save">
                <a href="admin/customer.html#frm" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_customer();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="export_excel();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Export excel</span>
                </a>
                </div>
                </div>
                <div style="clear: both;"></div>
                 </form>
                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Đăng ký mới khách hàng</h5>
				</div>
				<!-- end box / title -->
                 <?=flash_data()?>
                 <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_add_customer').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
             </div>       
				<form id="frm_add_customer" name="frm_add_customer" method="post" action="" onsubmit="return validate_form('frm_add_customer')">
				
				<div class="form">
					<div class="fields">
                    				<div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ email</label>
							</div>
							<div class="input">
								<input type="text" name="email" class="email_field"   size="40"  />
							</div>
                        </div>
				<div class="field">
                
							<div class="label">
								<label for="autocomplete">Tên truy cập (nếu có)</label>
							</div>
							<div class="input">
								<input type="text" name="username"  size="40"  />
							</div>
                            
						</div>
                        <a name="frm"></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Họ tên đầy đủ</label>
							</div>
							<div class="input">
							<input type="text" name="fullname"  size="60" />
                              
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại</label>
							</div>
							<div class="input">
							<input type="text" name="phone"  size="60" />
                              
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ</label>
							</div>
							<div class="textarea">
							<textarea name="address" cols="40" rows="10"></textarea>
                              
							</div>
						</div>
                        
                        
                        
                     	
					</div>
				</div>
				</form>
                <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_add_customer').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
             </div>
			
			</div>
			</div>
            
            <script type="text/javascript">
            function delete_customer(){
                var check = confirm('Bạn có muốn xóa danh sách khách hàng đã chọn không');
                if(check)
                {
                $.post('/admin/customer/delete',$('#frm_list_customer').serialize(),function(rs){location.reload()},'json');
                }
            }
            function edit_cus(id)
            {
                open_popup('admin/customer/edit/' + id, document.location.href,700,500);
            }
            function export_excel()
            {
                var dataSource = '/admin/customer/load_all_cus';
                var labels = ['Email','Tài Khoản','Tên đầy đủ','Điện thoại liên lạc', 'Địa chỉ','Ngày đăng ký'];
                document.location.href = '/admin/customer/exportexcel';
            }
            </script>
            

<?php
$this->load->view('back_end/footer.php'); 
?>