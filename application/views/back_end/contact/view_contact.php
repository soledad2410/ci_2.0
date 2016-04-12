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
					<h5>Thông tin liên hệ</h5>
                    
                    <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('name') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_contact()" />
							</div>
						
					</div>
                    <div class="search">
						
							
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
                <a href="<?=base_url()?>admin/contact.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                
                </div>
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_contact('<?=$contact['contact_id']?>');"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                
                </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
                
					
				</div>
                
                <form id="frm_order_details" name="frm_order_details">
				<div class="form">
                <div class="fields">
                <div class="field">
							<p align="center"><strong>Thông tin liên hệ</strong></p>
				        </div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Họ và tên khách hàng</label>
							</div>
							<div class="input">
								<strong><?=$contact['contact_user']?></strong>
							</div>
				        </div>
                        
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ</label>
							</div>
							<div class="input">
								<strong><?=$contact['contact_address']?></strong>
							</div>
				        </div>
         
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ email</label>
							</div>
							<div class="input">
								<strong><?=$contact['contact_email']?></strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Số điện thoại</label>
							</div>
							<div class="input">
								<strong><?=$contact['contact_phone']?></strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ngày tháng</label>
							</div>
							<div class="input">
								<strong><?= date('H:m d-m-Y',$contact['contact_datetime']) ?></strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Gửi tới phòng ban</label>
							</div>
                            
							<div class="input">
								<?=$this->config_model->get_by_key('tbldepartment','department_name','department_id',$contact['department_id'])?>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thông tin liên hệ</label>
							</div>
							<div class="input">
								<?=$contact['contact_content']?>
							</div>
				        </div>
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ip address</label>
							</div>
							<div class="input" style="color: red;">
							<strong><?=$contact['ip_address'] ?> </strong>
							</div>
				        </div>
                        
                        
                        
                        
                	</div>
                    
				</div>
                
                <div class="sub_menu">
                <div class="save" >
                <a href="<?=base_url()?>admin/contact.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                
                </div>
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_contact('<?=$contact['contact_id']?>');"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                
                </div>
				</form>
                
                <div style="clear: both;"></div>
                             
                
                
                </div>
                
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>