<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
    	$("a[rel=template]").fancybox({
				'transitionIn'		: 'none',
				'transitionOut'		: 'none',
				'titlePosition' 	: 'over',
				'titleFormat'		: function(title, currentArray, currentIndex, currentOpts) {
					return '<span id="fancybox-title-over">Image ' + (currentIndex + 1) + ' / ' + currentArray.length + (title.length ? ' &nbsp; ' + title : '') + '</span>';
				}
			});
})
</script>
<div id="content">
			<!-- table -->
			 <div class="box">
             <div class="title"><h5>Thêm mới giao diện</h5></div>
             <form id="frm_add_template" name="frm_add_template">
                <div class="form">
                	<div class="fields">
                    
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tên giao diện</label>
							</div>
							<div class="input">
							    <input type="text" name="template_name" size="30" class="required_field" />(Trùng tên thư mục giao diện)
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề giao diện</label>
							</div>
							<div class="input">
							    <input type="text" name="template_title" class="required_field" size="30" />
							</div>
						</div>
                    </div>
                </div>
                </form>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_template();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
            </div>
             </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Template website</h5>
				</div>
				<!-- end box / title -->
				<div class="form">
					
                    <div style="clear: both;"></div>
                    <div class="box-template">
                    <?php foreach($templates->result_array() as $template):?>
                    <div class="template" style="<?if($template['template_default']==1){echo'border: 1px solid silver;';}?>">
                    <a onclick="default_template('<?=$template['template_id']?>')" href="javascript:void(0)"  title="<?=$template['template_name']?>"><img src="<?=scale_image('template/templates/' . $template['template_name'] . '/thumb.png', 150, 150, 'template', $template['template_name'])?>" width="150" height="150"/></a><br />
                    <p class="template-title"><?=$template['template_title']?></p>
                    
                        <div class="task-template">
                        <?if($template['template_default']!=='1'):?>
                   <div class="option-template"><img src="html/resources/images/icons/close.png" width="20" height="20" title="Xóa giao diện" onclick="delete_template('<?=$template['template_id']?>')"/></div>
                        <?endif;?>
                    </div>
                    </div>
                    <?php endforeach;?>
                    
                    </div>
				</div>
                
				
			</div>
            
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>