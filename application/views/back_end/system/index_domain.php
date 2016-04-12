<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
function generatekey(){
    var key= $.md5(Math.random());
    $("#domain_key").val(key);
}

</script>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Quản trị domain khách hàng</h5>
                    
                    
            		</div>
                    
               <div class="sub_menu">
               
               <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
                
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_domain();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_domain();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_domain" name="frm_list_domain">
					<table>
						<thead>
							<tr>
								<th class="left">Domain</th>
						      	 <th>Khách hàng</th>
								<th>Email</th>
                                <th>Date create</th>
                                <th>Hoạt động</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($domains->result_array() as $domain):?>
                        <tr>
                            <td class="title-cate" style="width: 28%!important;padding-left:40px;"><?=$domain['domain_name']?></td>
                            <td class="title-module" style="width: 20%;"><?=$domain['customer_name']?></td>
                            <td class="title-module" style="width: 20%;"><?=$domain['customer_email']?></td>
                            <td class="title-module" style="width: 20%;"><?=datetime_vi($domain['date_create'])?></td>
                            <td style="text-align: center;" class="visible-cate"><img height="16" width="16" src="html/resources/images/icons/active_<?=$domain['domain_active']?>.gif"/></td>
                            <td class="selected last"><input type="checkbox" value="<?=$domain['domain_id']?>" name="<?=$domain['domain_id']?>"/></td>
                        </tr>
                         <? endforeach;?>
                      
						</tbody>
     			    </table>
					<!-- pagination -->
					
					<!-- end pagination -->
					<!-- table action -->
					
					<!-- end table action -->
					</form>
				</div>
                <div class="sub_menu">
               
               <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
                
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_domain();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_domain();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
                <div style="clear: both;"></div>
            
                </div>
                
            <div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới domain</h5>
				</div>
                <?=$message?>
				<!-- end box / title -->
                <form id="frm_add_domain" name="frm_add_domain" method="post" action="admin/system/domain.html">
				<div class="form">
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên miền </label>
							</div>
							<div class="input">
								<input type="text" name="domain_name" class="required_field"  size="40"  />
							</div>
						</div>
                    
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Key </label>
							</div>
                            <div class="input">
								<input type="text" name="domain_key" class="required_field"  id="domain_key" size="40" minlength="6"  />
                                <input type="button" onclick="generatekey()" value="auto" class="button browse"/>
							</div>
							
					</div>
				        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tên khách hàng</label>
							</div>
							<div class="input">
						  <input type="text" name="customer_name" class="required_field" size="40"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Email khách hàng </label>
							</div>
							<div class="input">
								<input type="text" name="customer_email" class="email_field"  size="40"  />
							</div>
					</div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ khách hàng</label>
							</div>
							<div class="input">
						  <textarea name="customer_address" cols="40" rows="3"></textarea>
							</div>
						</div>
                        
                    
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hoạt động </label>
							</div>
							<div class="input">
								<input type="checkbox" id="domain_active" value="1" name="domain_active"/>
							</div>
						</div>
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="add_domain();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
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