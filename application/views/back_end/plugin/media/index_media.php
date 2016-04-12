<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách media có trong khối</h5>
            		</div>
                <div class="sub_menu">
                <div class="save" >
                <a href="admin/plugin.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_media();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_media();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                
                </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_media" name="frm_list_media">
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
	
					</form>
                    <div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả từ  0-<?= $medias->num_rows() ?> của tổng <?= $medias->num_rows() ?></span>
						</div>
                  	</div>
				</div>
                <div class="sub_menu">
                <div class="save" >
                <a href="admin/plugin.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_media();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_media();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                
                </div>
                <div style="clear: both;"></div>
                             
            
                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới media vào khối nội dung</h5>
				</div>
				<!-- end box / title -->
                 
                 <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_media();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
             </div>       
				<form id="frm_add_media" method="post" name="frm_add_media" >
				
				<div class="form">
					<div class="fields">
                    				
				<div class="field">
                
							<div class="label">
								<label for="autocomplete">Tiêu đề </label>
							</div>
							<div class="input">
								<input type="text" id="media_title" name="media_title" class="required_field"   size="40"  />
							</div>
                            <input type="hidden" id="plugin_id" name="plugin_id" value="<?=$plugin['plugin_id']?>" />
						</div>
                        <a name="form" ></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">File ảnh</label>
							</div>
							<div class="input">
							<input type="text" name="media_url" id="media_url" size="60" />
                              <input type="button" class="button" value="Chọn từ server" onclick="get_ck('media_url')" /><br />
                              <div id="media_url-thumb"></div>
                              
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">thumnail</label>
							</div>
							<div class="input">
							<input type="text" name="thumbnail" id="thumbnail" size="60" />
                              <input type="button" class="button" value="Chọn từ server" onclick="get_ck('thumbnail')" /><br />
                              <div id="thumbnail-thumb"></div>
                              
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Liên kết</label>
							</div>
							<div class="input">
							<input type="text" name="media_href" id="media_href" size="50"  />
							</div>
                       	</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả</label>
							</div>
							<div class="input">
							<textarea name="media_description" cols="40" id="media_description"></textarea>
							</div>
                            
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Chiều rộng (px)</label>
							</div>
							<div class="input">
							<input type="text" name="media_width" id="media_width" size="20"  />(đối với dạng flash)
							</div>
                            
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Chiều cao(px)</label>
							</div>
							<div class="input">
							<input type="text" name="media_height" id="media_height" size="20"  />(đối với dạng flash)
							</div>
                       	</div>
                        
                        <a name="form"></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ngày xuất bản</label>
							</div>
							<div class="input">
							<input type="text" name="media_publish" class="date"  size="20"  />
							</div>
                       	</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ngày hết hạn</label>
							</div>
							<div class="input">
							<input type="text" name="media_expire" class="date"  size="20"  />
							</div>
                       	</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" id="media_visible" name="media_visible" checked="checked" value="1"/>
							</div>
						</div>
                        
						
					</div>
				</div>
				</form>
                <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_media();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
             </div>
			
			</div>
            
			</div>
            <script type="text/javascript">
            $(function(){
               $('#frm_add_media').submit(function(e){e.preventDefault();save_add_media();}) 
            });
            </script>

<?php
$this->load->view('back_end/footer.php'); 
?>