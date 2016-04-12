<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#floor_date").attr('value','<?= $this->input->get('from')?>')
    $("#ceil_date").attr('value','<?= $this->input->get('to')?>')
})
</script>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Tìm kiếm bình luận</h5>
                    
                    <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('name') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_articlecomment()" />
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
                <a href="<?=base_url()?>admin/article/comment.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                
                </div>
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_articlecomment('<?=$comment['comment_id']?>');"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_articlecomment();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                
                </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
                
					
				</div>
                
                <form id="frm_comment_details" name="frm_comment_details">
				<div class="form">
                <div class="fields">
                <div class="field">
							<p align="center"><strong>Chi tiết bình luận</strong></p>
				        </div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Họ và tên </label>
							</div>
							<div class="input">
								<strong><?=$comment['cus_name']?></strong>
							</div>
				        </div>
                        
                    
         
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ email</label>
							</div>
							<div class="input">
								<strong><?=$comment['cus_email']?></strong>
							</div>
				        </div>
                        <input type="hidden" name="comment_id" value="<?=$comment['comment_id']?>" />
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ngày tháng</label>
							</div>
							<div class="input">
								<strong><?= date('H:m d-m-Y',$comment['comment_date']) ?></strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Bài viết</label>
							</div>
							<div class="input">
								<strong><?= $comment['article_title'] ?></strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thông tin liên hệ</label>
							</div>
							<div class="input">
								<?=$comment['comment_content']?>
							</div>
				        </div>
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ip address</label>
							</div>
							<div class="input" style="color: red;">
							<strong><?=$comment['ip_address'] ?> </strong>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị bình luận</label>
							</div>
							<div class="input">
							<input type="checkbox" name="comment_visible" value="1" <?if($comment['comment_visible']==1){echo'checked="checked"';}?> />
							</div>
				        </div>
                        
                        
                        
                        
                	</div>
                    
				</div>
                
                <div class="sub_menu">
                <div class="save" >
                <a href="<?=base_url()?>admin/article/comment.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                
                </div>
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_articlecomment('<?=$comment['comment_id']?>');"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_articlecomment();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
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