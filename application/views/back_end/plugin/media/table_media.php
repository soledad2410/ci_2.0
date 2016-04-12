<table>
						<thead>
							<tr>
								<th>Tiêu đề</th>
                                <th>Link liên kết</th>
						      	<th>Hiển thị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
                                <th>Start date</th>
                                <th>Expire date</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php foreach($medias->result_array() as $media):
                             $url='<a href="'.$media['media_url'].'">'.$media['media_url'].'</a>';
                             // Is image
                             if(is_extension(array('.PNG','.GIF','.JPG','.JPEG','.BMP'),$media['media_url'])){
                                $url='<img src="'.$media['media_url'].'" height="50" />';
                             }
                             // Is flash
                             if(is_extension(array('.SWF'),$media['media_url'])){
                                $url='<a href="'.$media['media_url'].'">[Flash]</a>';
                             }
                        ?>
              
							<tr>
								
								<td class="price" style="width: 30%;"><a href="javascript:void(0)" onclick="edit_media('<?=$media['media_id']?>')"><?= $media['media_title'] ?></a></td>
								<td class="date" id="dp1307331808406" style="width: 30%;"><?= $url ?></td>
							     <td class="queu" style="width: 5%;"><img src="html/resources/images/icons/active_<?= $media['media_visible'] ?>.gif" width="16" height="16"/></td>
                                <td class="queu" style="width: 5%;"><?php if($media['media_queu']<$this->plugin_model->get_top('tblmedia','media_queu',array('plugin_id'=>$media['plugin_id']),null)){ echo'<a href="javascript:void(0)" onclick="up_media(\''.$media['media_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td class="queu" style="width: 5%;"><?php if($media['media_queu']>$this->plugin_model->get_top('tblmedia','media_queu',array('plugin_id'=>$media['plugin_id']),null,true)){ echo'<a href="javascript:void(0)" onclick="down_media(\''.$media['media_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
                                <td class="queu" style="width: 10%;"><?=($media['media_publish']!=0)?date('d-m-Y',$media['media_publish']):'--'?></td>
                                <td class="queu" style="width: 10%;"><?=($media['media_expire']!=0)?date('d-m-Y',$media['media_expire']):'--'?></td>
								<td class="selected last" style="width: 5%;"><input type="checkbox" name="<?= $media['media_id'] ?>" value="<?= $media['media_id'] ?>"/></td>
							</tr>
                           <?php endforeach; ?> 
						</tbody>
     			    </table>