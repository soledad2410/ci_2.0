<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Cấu hình website</h5>
				</div>
				<!-- end box / title -->
                 
                        
				
                <div class="sub_menu">
                <div class="sub_menu-notice">
                <img height="32" width="32" src="html/resources/images/icons/notice.png"/>
                </div>
                <div class="sub_menu-notice" style="margin-top: 10px;">
                Thông tin cấu hình hoạt động của website
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_config('frm_web_config');"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
                <form id="frm_web_config" name="frm_web_config">
				<div class="form">
					<div class="fields">
			          <?
                  
                      foreach($config_home->result_array() as $config):?>
                      <?=$this->config_model->emit_config_field($config['config_id'],$_SESSION['lang_admin'])?>
                      <?endforeach;?>
                         
					</div>
				</div>
   	            </form>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)"  onclick="save_config('frm_web_config');"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
			
			</div>
            <div class="box">

				<!-- box / title -->
				<div class="title">
					<h5>Cấu hình gửi email</h5>
				</div>
				<!-- end box / title -->
                 
                <div class="sub_menu">
                <div class="sub_menu-notice">
                <img height="32" width="32" src="html/resources/images/icons/notice.png"/>
                </div>
                <div class="sub_menu-notice" style="margin-top: 10px;">
                Thông tin cấu hình gửi email của website
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_config('frm_mail_config');"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>        
				<form id="frm_mail_config" name="frm_mail_config">
                
				<div class="form">
					<div class="fields">
			          <?foreach($config_email->result_array() as $config):?>
                      <?=$this->config_model->emit_config_field($config['config_id'],$_SESSION['lang_admin'])?>
                      <?endforeach;?>
                         
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_config('frm_mail_config');"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
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