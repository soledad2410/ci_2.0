<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách dự án</h5>
                    
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
                <a href="javascript:void(0)" onclick="delete_product();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_product();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa </span>
                </a>
                </div>
                  
                </div>
  		        <div class="table">
					<form id="frm_list_product" name="frm_list_product">
					<table>
						<thead>
							<tr>
								<th class="left">Tên dự án</th>
                                <th>Danh mục</th>
								<th>Ảnh dự án</th>
								<th>Ngày cập nhập</th>
								<th>Giá</th>
                                <th>Lên</th>
                                <th>Xuống</th>
                                <th>Hiển thị</th>
                                
                                <th>Sắp xếp</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($products->result_array() as $product): ?>
                                <tr>
								<td class="title" style="width: 20%;"><a href="<?=base_url()?>admin/product/edit_product/<?=$product['product_id']?>.html"><?php echo str_replace($this->input->get('keyword'),'<strong>'.$this->input->get('keyword').'</strong>',$product['product_name']) ?></a></td>
                                <td class="title" style="width: 10%;"><a href="<?=base_url()?>admin/product.html?cate=<?=$product['menu_id']?>"><?=$product['menu_title']?>- (<?=$product['menu_string']?>)</a></td>
								<td class="price"><img src="<?php echo $product['product_image'] ?>" height="50" /></td>
								<td class="date" id="dp1307331808406"><?php echo date('H:m d-m-Y',$product['product_date']) ?></td>
								<td class="category"><?php echo number_format($product['product_price'],0,'.','.') ?>VND</td>
                                <td class="queu"><?php if($product['product_queu']<$this->product_model->get_top('tblproduct','product_queu',array('menu_id'=>$product['menu_id']),null)){ echo'<a href="javascript:void(0)" onclick="up_product(\''.$product['product_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td class="queu"><?php if($product['product_queu']>$this->product_model->get_top('tblproduct','product_queu',array('menu_id'=>$product['menu_id']),null,true)){ echo'<a href="javascript:void(0)" onclick="down_product(\''.$product['product_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$product['product_visible']?>.gif" width="16" height="16" alt="visible"/></td>
                                <td class="queu"><input type="text" name="<?=$product['product_id']?>" value="<?=$product['product_queu']?>" class="product_queu numbered_field queu" /></td>
                                
                                <td class="selected last"><input type="checkbox"  name="<?= $product['product_id'] ?>" value="<?= $product['product_id'] ?>" /></td>
							</tr>
                           <? endforeach; ?> 
						</tbody>
     			    </table>

					</form>
                    <div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả <?= $result_from?>-<?= $result_to ?> của tổng <?= $total ?>/<?=$all_product?></span>
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
                  
                
                
                </div>
                <div style="clear: both;"></div>
                             
                </form>
                
                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Tuỳ chọn trang dự án</h5>
				</div>
            	<form id="frm_product_config" name="frm_product_config">
				<div class="form">
					<div class="fields">
			          <?foreach($config_product->result_array() as $config):?>
                      <?=$this->config_model->emit_config_field($config['config_id'],$_SESSION['lang_admin'])?>
                      <?endforeach;?>
                         
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
            <script type="text/javascript">
                        $(function(){
               $('.product_queu').change(function(){
                 
                    var id = $(this).attr('name');
                    var queu = $(this).val();
                    $.post('/admin/product/swap_position',{id:id,queu:queu},function(rs){
                        if(rs.code == 'success')
                        {
                            var id2 = rs.swapped_id;
                            
                            if(id2){
                              
                                $('#frm_list_product').find('input[name="'+id2+'"]').val(rs.queu);
                            }
                            
                        }
                    },'json');
               }); 
            });

            </script>

<?php
$this->load->view('back_end/footer.php'); 
?>