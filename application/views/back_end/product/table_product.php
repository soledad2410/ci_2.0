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
                        <?foreach($products->result_array() as $product): ?>
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
                           <?endforeach; ?> 
						</tbody>
     			    </table>