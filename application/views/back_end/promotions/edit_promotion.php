<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách Sản phẩm</h5>
                    
                    <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_product()" />
							</div>
						
					</div>
                    <div class="search">
						
							<div class="input">
								<select id="menu">
                                <option value="0">--Chọn danh mục--</option>
                                <?php echo $menu ?>
                                </select>
							</div>
				</div>
                <div class="search">
						
							<div class="input">
							<span style="color: white;">Giá tới</span> <input type="text" id="max_price" value="<?php echo $this->input->get('max') ?>"  />
							</div>
				</div>
                <div class="search">
						
							<div class="input">
							<span style="color: white;">Giá từ</span> <input type="text" id="min_price" value="<?php echo $this->input->get('min') ?>"   />
							</div>
				</div>
				</div>
                
                
  		        
                <?=$message?>
                <div class="sub_menu">
                     
                

                
                
                </div>
                <div style="clear: both;"></div>
                
                
                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Sửa chương trình khuyến mãi</h5>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_promotion').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
                                <div class="save">
                <a href="admin/product/add_product.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                
                
                  <div class="save" >
                <a href="admin/promotions.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
         
                
                </div>
            	<form id="frm_edit_promotion" name="frm_edit_promotion" method="post" action="" onsubmit="return validate_form('frm_edit_promotion')">
				<div class="form">
                <div class="fields">
                    <div class="field">
							<div class="label">
								<label for="input-medium">Tiêu đề</label>
							</div>
							<div class="input">
								<input type="text" name="promot_title" class="required_field" value="<?=$promot['promot_title']?>" size="50" />
							</div>
						</div>
                        <input type="hidden" name="token" value="<?=$token?>" />
                        <div class="field">
							<div class="label">
								<label for="file">Ảnh đại diện</label>
							</div>
							<div class="input">
								<input type="text" id="promot_image" name="promot_image" size="40" value="<?=$promot['promot_image']?>" />
                                <input type="button" value="Chọn ảnh" onclick="get_ck('promot_image')" /><br />
                                <span id="promot_image-thumb"></span>
							</div>
                    </div>
                    <div class="field">
							<div class="label">
								<label for="file">Chọn sản phẩm</label>
							</div>
							<div class="input">
                                <select name="product_id">
                                <?foreach($products->result_array() as $product):?>
                                <option value="<?=$product['product_id']?>" <?=$promot['product_id'] == $product['product_id'] ? 'selected="selected"' : '';?>><?=$product['product_name']?></option>
                                <?endforeach;?>
                                </select>
							</div>
                    </div>
                    <div class="field">
							<div class="label label-textarea">
								<label for="textarea">Tóm tắt chương trình</label>
							</div>
							<div class="input">
								<textarea  name="promot_header" maxlength="200" cols="50" rows="3" class="required_field" ><?=$promot['promot_header']?></textarea>
                                
                                
							</div>
						</div>
                    <div class="field">
							
								<p align="center" >Nội dung chương trình</p>
					     <textarea name="promot_content"><?=$promot['promot_content']?></textarea>
                        	 <script type="text/javascript">
                                initCKeditor('promot_content','Full','98%',400);
                                </script>
						</div>
                    </div>
                    
                        
                </div>
                </form>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_promotion').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
                                <div class="save">
                <a href="admin/product/add_product.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                
                
                  <div class="save" >
                <a href="admin/promotions.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
         
                
                </div>
			</div>
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>