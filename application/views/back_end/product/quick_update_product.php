
<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
    $("input").bind('keyup',function(e){
        var key=e.keyCode;
        if(key===13){
            update_price();
        }
    })
})
</script>

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
								<input type="submit" name="submit" value="Xác nhận" onclick="load_product_update_price()" />
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
                <div class="save" >
                <a href="admin/product/index.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>     
                <div class="save" >
                <a href="javascript:void(0)" onclick="update_price();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
                <div class="save">
                <a href="admin/product/add_product.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_product();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa </span>
                </a>
                </div>
     
                </div>
  		             
				<!-- end box / title -->
                                             <div id="message-error" class="message message-error" style="margin: 5px;display:none">
							<div class="image">
								<img src="html/resources/images/icons/error.png" alt="Error" height="32" />
							</div>
							<div class="text">
								<h6>Error Message</h6>
								<span id="error-message">This is the error message.</span>
							</div>
							<div class="dismiss">
								<a href="#message-error"></a>
							</div>
						</div>
                        <div class="message message-success" id="message-success" style="display: none;">
							<div class="image">
								<img height="32" alt="Success" src="html/resources/images/icons/success.png"/>
							</div>
							<div class="text">
								<h6>Success Message</h6>
								<span id="success-message">This is the success message.</span>
							</div>
							<div class="dismiss">
								<a href="#message-success"></a>
							</div>
						</div>  
                <div class="table">
					<form id="frm_list_product" name="frm_list_product">
					<table>
						<thead>
							<tr>
								<th class="left">Tên sản phẩm</th>
								<th>Ảnh sản phẩm</th>
								<th>Giá sản phẩm</th>
								<th>Giá khuyến mãi</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php foreach($products->result_array() as $product): ?>
              
							<tr>
								<td class="title"><?php echo $product['product_name'] ?></td>
								<td class="price"><img src="<?php echo $product['product_image'] ?>" height="50" /></td>
								<td class="date" id="dp1307331808406"><input type="text" size="10" name="price_<?php echo $product['product_id'] ?>" id="price_<?php echo $product['product_id'] ?>" onchange="$('#saleoff_<?=$product['product_id']?>').val(this.value)" value="<?php echo number_format($product['product_price'],0,'.','.') ?>" /> VND</td>
								<td class="category"><input type="text" size="10" id="saleoff_<?php echo $product['product_id'] ?>" name="saleoff_<?php echo $product['product_id'] ?>" value="<?php echo number_format($product['product_saleoff'],0,'.','.') ?>" /> VND</td>
                                <td class="queu"><a href="<?=base_url()?>admin/product/edit_product.html?product_id=<?=$product['product_id']?>"><img src="html/resources/images/edit.png" width="24" height="24" alt="edit"/></a></td>
                                <td class="queu"><a href="<?=base_url()?>admin/product/delete_product.html?id=<?=$product['product_id']?>"><img src="html/resources/images/delete.png" width="24" height="24" alt="delete"/></a></td>
								<td class="selected last"><input type="checkbox" id="<?= $product['product_id'] ?>" value="<?= $product['product_id'] ?>"/></td>
							</tr>
                           <?php endforeach; ?> 
						</tbody>
     			    </table>
					<!-- pagination -->
					
					<!-- end pagination -->
					<!-- table action -->
					
					<!-- end table action -->
					</form>
                    <div class="pagination pagination-left">
						<div class="results">
							<span>showing results <?= $result_from?>-<?= $result_to ?> of <?= $total ?></span>
						</div>
                        
						  <span style="float: left;margin-left: 10px;"><select id="num-page" >
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
                <div class="sub_menu">
                <div class="save" >
                <a href="admin/product/index.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>     
                <div class="save" >
                <a href="javascript:void(0)" onclick="update_price();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
                <div class="save">
                <a href="admin/product/add_product.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_product();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa </span>
                </a>
                </div>
     
                </div>
                <div style="clear: both;"></div>
               
                </form>
                
                </div>
                
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>