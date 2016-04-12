<table>
						<thead>
							<tr>
								<th class="left">ID</th>
								<th>Tiêu đề</th>
								<th>Điện thoại hỗ trợ</th>
								<th>Hiển thị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
								<th class="selected last"><input type="checkbox" value="0" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php foreach($supports->result_array() as $support): ?>
              
							<tr>
								<td class="title"><?= $support['support_name'].'('.$support['support_type'].')' ?></td>
								<td class="price"><?=$support['support_title']?></td>
								<td class="date" id="dp1307331808406"><?= $support['support_phone']?></td>
								<td class="category"><img src="html/resources/images/icons/active_<?= $support['support_visible'] ?>.gif" width="16" height="16"/></td>
                                <td class="queu"><?php if($support['support_queu']>$this->plugin_model->get_top('tblsupport','support_queu',array('plugin_id'=>$support['plugin_id']),null,true)){ echo'<a href="javascript:void(0)" onclick="support_up(\''.$support['support_id'].'\',\''.$support['plugin_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td class="queu"><?php if($support['support_queu']<$this->plugin_model->get_top('tblsupport','support_queu',array('plugin_id'=>$support['plugin_id']),null)){ echo'<a href="javascript:void(0)" onclick="support_down(\''.$support['support_id'].'\',\''.$support['plugin_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
								<td class="selected last"><input type="checkbox" name="<?= $support['support_id'] ?>" id="<?= $support['support_id'] ?>" value="<?= $support['support_id'] ?>"/></td>
							</tr>
                           <?php endforeach; ?> 
						</tbody>
     			    </table>