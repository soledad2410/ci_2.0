<?php
$this->load->view('back_end/header.php');
?>
<div id="content">
			<div class="box">
				<div class="title">
					<h5>Tìm kiếm sản phẩm</h5>
                    <div class="search">
						<div class="input">
								<input type="text" id="search" name="search" value="" />
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
                <a href="admin/plugin.html"  ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại </span>
                </a>
                </div>
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">Việc xóa sản phẩm khỏi khối nội dung không ảnh hưởng tới danh sách sản phẩm của website</div>
                </div>
  		        <div class="table">
					<form id="frm_block_product" name="frm_block_product">
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
                                <th>Xóa</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        <tbody>
                        <?foreach($product_in_block->result_array() as $product): ?>
                            <tr>
								<td class="title" style="width: 20%;"><a href="<?=base_url()?>admin/product/edit_product/<?=$product['product_id']?>.html"><?php echo str_replace($this->input->get('keyword'),'<strong>'.$this->input->get('keyword').'</strong>',$product['product_name']) ?></a></td>
                                <td class="title" style="width: 10%;"><a href="<?=base_url()?>admin/product.html?cate=<?=$product['menu_id']?>"><?=$product['menu_title']?></a></td>
								<td class="price"><img src="<?php echo $product['product_image'] ?>" height="40" /></td>
								<td class="date" id="dp1307331808406"><?php echo date('H:m d-m-Y',$product['product_date']) ?></td>
								<td class="category"><?php echo number_format($product['product_price'],0,'.','.') ?>VND</td>
                                <td class="queu"></td>
                                <td class="queu"></td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$product['product_visible']?>.gif" width="16" height="16" alt="visible"/></td>
                                <td class="queu"><a href="javascript:void(0)" onclick="remove_product_from_block('<?= $product['product_id'] ?>')"><img src="html/resources/images/delete.png" width="24" height="24" alt="delete"/></a></td>
                                <td class="selected last"><input type="checkbox"  name="<?= $product['product_id'] ?>" value="<?= $product['product_id'] ?>"  /></td>
							</tr>
                           <? endforeach; ?>
						</tbody>
     			    </table>
                        <input type="hidden" id="plugin_id" value="<?=$plugin_id?>" />
					</form>
                </div>
                <div class="sub_menu">
               <div class="save">
                <a href="admin/plugin.html"  ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại </span>
                </a>
                </div>
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">Việc xóa sản phẩm khỏi khối nội dung không ảnh hưởng tới danh sách sản phẩm của website</div>
                </div>
                <div style="clear: both;"></div>
                </form>
                </div>
                <div class="box">
				<div class="title">
					<h5>Chọn sản phẩm từ danh sách sản phẩm</h5>
                    <div class="search">
							<div class="input">
								<input type="text" id="search_product" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_table2_product()" />
							</div>
					</div>
                    <div class="search">
							<div class="input">
								<select id="menu_product">
                                <option value="0">--Chọn danh mục--</option>
                                <?php echo $menu ?>
                                </select>
							</div>
				</div>
                </div>
            	<form id="frm_list_product" name="frm_list_product">
                <table>
						<thead>
							<tr>
								<th class="left">Tên sản phẩm</th>
                                <th>Danh mục</th>
								<th>Ảnh sản phẩm</th>
								<th>Ngày cập nhập</th>
								<th>Giá</th>
                                <th>Hiển thị</th>
                                <th class="selected last"></th>
							</tr>
						</thead>
                    	<tbody>
                        </tbody>
     			    </table>

                </form>
                <div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả <?= $result_from?>-<?= $result_to ?> của tổng <?= $total ?>/<?=$all_product?></span>
						</div>
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
                <div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_config('frm_product_config');"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
                </div>
			</div>
			</div>
<?php
$this->load->view('back_end/footer.php');
?>