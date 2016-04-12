<?$this->load->view('back_end/header.php'); ?>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách Sản phẩm</h5>
                    
                    <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('phrase') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_product()" />
							</div>
						
					</div>
                    <div class="search">
							<div class="input">
								<select id="shoppackage">
                                <option value="0">--Chọn gói gian hàng--</option>
                                <?foreach($packages->result_array() as $package ):?>
                                <option value="<?=$package['package_id']?>" <?=($this->input->get('package')==$package['package_id'])?'selected="selected"':'';?>><?=$package['package_name']?></option>
                                <?endforeach;?>
                                </select>
							</div>
				</div>
                <div class="search">
						
							<div class="input">
							<span style="color: white;">Giá tới</span> <input type="text" class="date" id="max_price" value="<?php echo $this->input->get('to') ?>"  />
							</div>
				</div>
                <div class="search">
						
							<div class="input">
							<span style="color: white;">Giá từ</span> <input type="text" class="date" id="min_price" value="<?php echo $this->input->get('from') ?>"   />
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
                <a href="javascript:void(0)" onclick="delete_product();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_product();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa </span>
                </a>
                </div>
                  <div class="save" >
                <a href="admin/product/price.html" onclick=""><img src="html/resources/images/article.png" width="32px" height="32px"/><br />
                <span>Cập nhập giá</span>
                </a>
                </div>
                </div>
  		        <div class="table">
					<form id="frm_list_product" name="frm_list_product">
					<table>
						<thead>
							<tr>
								<th class="left">Tên sản phẩm</th>
                                <th>Danh mục</th>
								<th>Ảnh sản phẩm</th>
								<th>Ngày cập nhập</th>
								<th>Giá</th>
                                <th>Lên</th>
                                <th>Xuống</th>
                                <th>Hiển thị</th>
                                <th>Copy</th>
                                <th>Xóa</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($shops->result_array() as $shop): ?>
                                <tr>
								<td class="title" style="width: 20%;"><a href="<?=base_url()?>admin/product/edit_product/<?=$product['product_id']?>.html"><?php echo str_replace($this->input->get('keyword'),'<strong>'.$this->input->get('keyword').'</strong>',$product['product_name']) ?></a></td>
                                <td class="title" style="width: 10%;"><a href="<?=base_url()?>admin/product.html?cate=<?=$product['menu_id']?>"><?=$product['menu_title']?></a></td>
								<td class="price"><img src="<?php echo $product['product_image'] ?>" height="50" /></td>
								<td class="date" id="dp1307331808406"><?php echo date('H:m d-m-Y',$product['product_date']) ?></td>
								<td class="category"><?php echo number_format($product['product_price'],0,'.','.') ?>VND</td>
                                <td class="queu"><?php if($product['product_queu']<$this->product_model->get_top('tblproduct','product_queu',array('menu_id'=>$product['menu_id']),null)){ echo'<a href="javascript:void(0)" onclick="up_product(\''.$product['product_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td class="queu"><?php if($product['product_queu']>$this->product_model->get_top('tblproduct','product_queu',array('menu_id'=>$product['menu_id']),null,true)){ echo'<a href="javascript:void(0)" onclick="down_product(\''.$product['product_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$product['product_visible']?>.gif" width="16" height="16" alt="visible"/></td>
                                <td class="queu"><a href="<?=base_url()?>admin/product/add_product.html?id=<?=$product['product_id']?>"><img src="html/resources/images/icons/copy.png" width="16" height="16" title="copy" alt="copy"/></a></td>
                                <td class="queu"><a href="javascript:void(0)" onclick="delete_product('<?= $product['product_id'] ?>')"><img src="html/resources/images/delete.png" width="24" height="24" alt="delete"/></a></td>
                                <td class="selected last"><input type="checkbox"  name="<?= $product['product_id'] ?>" value="<?= $product['product_id'] ?>" /></td>
							</tr>
                           <? endforeach; ?> 
						</tbody>
     			    </table>

					</form>
                    <div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả <?= $result_from?>-<?= $result_to ?> của tổng <?=$total?></span>
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
                          if($total_page>1){
                            for($i=1;$i<=$total_page;$i++){
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
                <div class="sub_menu">
                     
                
                <div class="save">
                <a href="admin/product/add_product.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_product();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_product();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa </span>
                </a>
                </div>
                  <div class="save" >
                <a href="admin/product/price.html" onclick=""><img src="html/resources/images/article.png" width="32px" height="32px"/><br />
                <span>Cập nhập giá</span>
                </a>
                </div>
                
                
                </div>
                <div style="clear: both;"></div>
                             
                </form>
                
                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới gian hàng</h5>
				</div>
            	<form id="frm_add_article" name="frm_add_article" method="post" action="admin/article/add_article.html" onsubmit="return validate_form('frm_add_article')" >
                <div class="left-panel">
                	<div class="title">
	           <h6>Thông tin gian hàng</h6>
				</div>
			
			
					<div class="fields">
					<div class="field">
							<div class="label">
								<label for="input-medium">Tên gian hàng</label>
							</div>
							<div class="input">
								<input type="text" name="shop_name" class="required_field"  />
							</div>
						</div>
						
						<div class="field">
							<div class="label">
								<label for="input-medium">Tiêu đề (slogan) gian hàng</label>
							</div>
							<div class="input">
								<input type="text" name="shop_title" size="50"   />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="select">Chọn gói gian hàng</label>
							</div>
							<div class="input">
								<select  name="shoppackage_id">
							<?foreach($packages->result_array() as $package ):?>
                                <option value="<?=$package['package_id']?>" ><?=$package['package_name']?></option>
                                <?endforeach;?>
                               	</select>
							</div>
						</div>
						<div class="field">
								<p align="center" ><strong>Banner gian hàng</strong></p>
					     <textarea name="shop_banner"></textarea>
        	               <script type="text/javascript">
                            initCKeditor('shop_banner','Full','98%','150');    
                            </script>
						</div>
							<div class="field">
								<p align="center" ><strong>Thông tin giới thiệu</strong></p>
					     <textarea name="shop_intro"></textarea>
        	               <script type="text/javascript">
                            initCKeditor('shop_intro','Full','98%','300');    
                            </script>
						</div>
				</div>
			   </div>
                <div class="right-panel">
                           	<div class="title">
	       <h6>Tùy chọn bài viết</h6>
           </div>
           <div class="fields">
           <div class="field">
           <div class="label">Hiển thị bài viết</div>
           <div class="input"><div class="checkboxes">
								<div class="checkbox">
									<input type="checkbox" checked="checked" id="article_visible" name="article_visible" value="1" />
									<label for="checkbox-1">Hiển thị</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="article_home" name="article_home" value="1" />
									<label for="checkbox-2">Trang chủ</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="article_hot" name="article_hot" value="1" />
									<label for="checkbox-3">Tin hot</label>
								</div>
							</div></div>
                            </div>
                            <div class="field">
           <div class="label" >Hiển thị bình luận</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" id="comment" name="article_allowcomment" value="1" />
								</div>
                                </div>
                            </div>
                            <div class="field">
           <div class="label" >Nhóm thành viên bình luận</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" name="article_comment_privilege[]" value="0" />Tất cả
								</div>
                                <?foreach($groups->result_array() as $group):?>
                                <div class="checkbox">
									<input type="checkbox" name="article_comment_privilege[]" value="<?=$group['group_id']?>" /><?=$group['group_name']?>
								</div>
                                <?endforeach;?>
                                </div>
                            </div>
                             <div class="field">
           <div class="label" >Cho phép đánh giá</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" id="article_rate" name="article_rate" value="1" />
								</div></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta keyword</div>
           <div class="input"><textarea name="article_keyword" id="article_keyword" cols="25"></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta description</div>
           <div class="input"><textarea name="article_description" id="article_description" cols="25"></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >File attach</div>
           <div class="input"><input type="text" name="article_fileattach" id="article_fileattach" size="15" /><input type="button" class="button" onclick="get_ck('article_fileattach')" value="chọn file" /></div>
                            </div>
                            <div class="field">
           <div class="label" >Kiểu hiển thị</div>
           <div class="radios" style="float: right;">
                                <div class="radio">
									<input type="radio" value="_self" checked="checked"  name="article_urltarget" />
									<label for="radio-2">Hiển thị trên tab cũ (mặc định)</label>
								</div>
								<div class="radio">
									<input type="radio" value="_blank"  name="article_urltarget" />
									<label for="radio-1">Hiển thị mở ra tab mới</label>
								</div>
						</div>
                        </div>
                            <div class="field">
           <div class="label" >Tags (mỗi tag cách nhau bởi dấu phẩy)</div>
           <div class="input"><textarea name="article_tags" id="article_tags" cols="25" ></textarea></div>
                            </div>
            <div class="field">
           <div class="label" >Nguồn( tác giả )</div>
           <div class="input"><input type="text" name="article_author" id="article_author" size="20"/></div>
                            </div>
            <div class="field">
           <div class="label" >Meta title</div>
           <div class="input"><textarea name="article_metatitle" id="article_metatitle" cols="25"></textarea></div>
            </div>
            <div class="field">
           <div class="label" >Thẻ h1</div>
           <div class="input"><textarea name="article_h1" id="article_h1" cols="25"></textarea></div>
            </div>                            
           </div>
           </div>
      	
          </form>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_config('frm_product_config');"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
			</div>
			</div>


<?$this->load->view('back_end/footer.php'); ?>
