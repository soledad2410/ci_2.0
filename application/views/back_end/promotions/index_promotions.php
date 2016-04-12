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
                
                <div class="sub_menu">
                     
                
                <div class="save">
                <a href="admin/product/add_product.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                
                
                  <div class="save" >
                <a href="admin/product.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                
                
                </div>
  		        <div class="table">
					<form id="frm_list_product" name="frm_list_product">
					<table>
						<thead>
							<tr>
								<th class="left">Tên sản phẩm</th>
                                <th>Tiêu đề</th>
								<th>Ảnh </th>
								<th>Ngày cập nhập</th>
								<th></th>
                                <th></th>
                                <th></th>
                                
                                <th>Sửa</th>
                                <th>Xóa</th>
								
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($news->result_array() as $promot): ?>
                                <tr>
								<td class="title" style="width: 20%;"><a href="<?=base_url()?>admin/promotions/edit/<?=$promot['promot_id']?>.html"><?php echo str_replace($this->input->get('keyword'),'<strong>'.$this->input->get('keyword').'</strong>',$promot['promot_title']) ?></a></td>
                                <td class="title" style="width: 20%;"><a href="<?=base_url()?>admin/promotions.html?product=<?=$promot['product_id']?>"><?=$promot['product_name']?></a></td>
								<td class="price"><img src="<?php echo $promot['promot_image'] ?>" height="50" /></td>
								<td class="date" id="dp1307331808406"><?php echo date('H:m d-m-Y',$promot['promot_time']) ?></td>
								<td class="category"></td>
                                <td class="queu"></td>
                                <td class="queu"></td>
                                
                                <td class="queu"><a href="<?=base_url()?>admin/promotions/edit/<?=$promot['promot_id']?>"><img src="html/resources/images/icons/edit.png" width="16" height="16" title="copy" alt="copy"/></a></td>
                                <td class="queu"><a href="javascript:void(0)" onclick="delete_promotion('<?=$promot['promot_id']?>')"><img src="html/resources/images/delete.png" width="24" height="24" alt="delete"/></a></td>
                                
							</tr>
                           <? endforeach; ?> 
						</tbody>
     			    </table>

					</form>
                    <div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả <?= $result_from?>-<?= $result_to ?> của tổng <?= $total ?></span>
						</div>
                        
						  <span style="float: left;margin-left: 10px;"><select id="num-page" onchange="load_product()" >
                          <option value="10">10</option>
                          <option value="20" <?php if($this->input->get('limit')==20){echo'selected="selected"';} ?>>20</option>
                          <option value="30" <?php if($this->input->get('limit')==30){echo'selected="selected"';} ?>>30</option>
                          <option value="40" <?php if($this->input->get('limit')==40){echo'selected="selected"';} ?>>40</option>
                          </select></span>
                          <input type="hidden" id="current_page" value="<?php echo $current_page ?>" />
						<ul class="pager">
					   <?php
                          if($page>1){
                            for($i=1;$i<=$page;$i++){
                                if($current_page==$i){
                                    echo'<li class="current" >'.$i.'</li>';
                                }else{
                                echo'<li ><a href="'.$url.'page='.$i.'">'.$i.'</a></li>';
                                }
                            }
                          }
                           ?>
					   </ul>
					</div>
				</div>
                <?=$message?>
                <div class="sub_menu">
                     
                
                <div class="save">
                <a href="admin/product/add_product.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                
                
                  <div class="save" >
                <a href="admin/product.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                
                
                </div>
                <div style="clear: both;"></div>
                
                
                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới chương trình khuyến mãi</h5>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_promotion').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
            	<form id="frm_add_promotion" name="frm_add_promotion" method="post" action="" onsubmit="return validate_form('frm_add_promotion')">
				<div class="form">
                <div class="fields">
                    <div class="field">
							<div class="label">
								<label for="input-medium">Tiêu đề</label>
							</div>
							<div class="input">
								<input type="text" name="promot_title" class="required_field" value="" size="50" />
							</div>
						</div>
                        <input type="hidden" name="token" value="<?=$token?>" />
                        <div class="field">
							<div class="label">
								<label for="file">Ảnh đại diện</label>
							</div>
							<div class="input">
								<input type="text" id="promot_image" name="promot_image" size="40" />
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
                                <option value="<?=$product['product_id']?>"><?=$product['product_name']?></option>
                                <?endforeach;?>
                                </select>
							</div>
                    </div>
                    <div class="field">
							<div class="label label-textarea">
								<label for="textarea">Tóm tắt chương trình</label>
							</div>
							<div class="input">
								<textarea  name="promot_header" maxlength="200" cols="50" rows="3" class="required_field" ></textarea>
                                
                                
							</div>
						</div>
                    <div class="field">
							
								<p align="center" >Nội dung chương trình</p>
					     <textarea name="promot_content"></textarea>
                        	 <script type="text/javascript">
                                initCKeditor('promot_content','Full','98%',400);
                                </script>
						</div>
                    </div>
                    
                        
                </div>
                </form>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_promotion').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
			</div>
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>