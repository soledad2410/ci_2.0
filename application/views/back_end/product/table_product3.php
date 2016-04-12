<?foreach($products->result_array() as $product): ?>
                                <tr>
								<td class="title" style="width: 20%;"><div class="prod-name" title="<?=$product['product_id']?>"><?=$product['product_name']?></div></td>
                                <td class="title" style="width: 10%;"><a href="<?=base_url()?>admin/plugin/product/.html?cate=<?=$product['menu_id']?>"><?=$product['menu_title']?></a></td>
								<td class="price"><img src="<?php echo $product['product_image'] ?>" height="30" /></td>
								<td class="date"><?php echo date('H:m d-m-Y',$product['product_date']) ?></td>
								<td class="category"><?php echo number_format($product['product_price'],0,'.','.') ?>VND</td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$product['product_visible']?>.gif" width="16" height="16" alt="visible"/></td>
                                <td class="selected last"><input type="checkbox"  name="<?= $product['product_id'] ?>" value="<?= $product['product_id'] ?>" <?=in_array($product['product_id'], $attachment) ? 'checked="checked"' : '';?> onclick="addProductAttachment(this)"/></td>
							</tr>
                           <? endforeach; ?>