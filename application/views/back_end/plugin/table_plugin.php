<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề</th>
								<th>Loại khối</th>
								<th>Vị trí</th>
								<th>Hiển thị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php foreach($plugins->result_array() as $plugin):
                        if(file_exists($current_layout.'/blocks/'.$plugin['plugintemplate_id'].'.php')): 
                        ?><tr>
								<td class="title" style="width: 35%;"><a href="admin/plugin/plugin_content.html?plugin_id=<?=$plugin['plugin_id']?>"><?= $plugin['plugin_title'] ?></a></td>
								<td class="price" style="width: 20%;"><?= $plugin['plugintype_title'] ?></td>
								<td class="date" id="dp1307331808406"><?= $plugin['position_name']?></td>
								<td class="category"><img src="html/resources/images/icons/active_<?= $plugin['plugin_visible'] ?>.gif" width="16" height="16"/></td>
                                <td class="queu"><?php if($plugin['plugin_queu']>$this->plugin_model->get_top('tblplugin','plugin_queu',array('position_name'=>$plugin['position_name'],'layout_name'=>$plugin['layout_name']),null,true)){ echo'<a href="javascript:void(0)" onclick="plugin_up(\''.$plugin['plugin_id'].'\',\''.$plugin['position_name'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td class="queu"><?php if($plugin['plugin_queu']<$this->plugin_model->get_top('tblplugin','plugin_queu',array('position_name'=>$plugin['position_name'],'layout_name'=>$plugin['layout_name']),null)){ echo'<a href="javascript:void(0)" onclick="plugin_down(\''.$plugin['plugin_id'].'\',\''.$plugin['position_name'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
								<td class="selected last"><input type="checkbox" name="<?= $plugin['plugin_id'] ?>" id="<?= $plugin['plugin_id'] ?>" value="<?= $plugin['plugin_id'] ?>"/></td>
							</tr>
                           <?php
                            endif;
                            endforeach; ?> 
						</tbody>
     			    </table>