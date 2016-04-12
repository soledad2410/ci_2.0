<?php
$this->load->view('back_end/header.php');
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Trang quản trị danh sách album ảnh</h5>
                </div>
                <div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">
                - Các hình ảnh và video được tổ chức theo từng album theo từng danh mục<br />
                - Video được lấy từ link chia sẻ    
                </div>
                <div class="save">
                <a href="admin/galleries.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_gallery();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_gallery();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
                <?=$message?>
  				<!-- end box / title -->
               <div class="table">
					<form id="frm_list_cate" name="frm_list_cate">
					<table>
						<thead>
							<tr>
								<th class="left">Tên album</th>
						      	 <th>Trang album</th>
								<th>Ngày tháng</th>
                                <th>Xóa</th>
  								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>

						<tbody>
                            <?foreach($list_gallery->result_array() as $gallery):?>
          				      <tr>
								<td><img src="<?=$gallery['gallery_image']?>" height="70px"/><br /><a href="admin/galleries/album/<?=$gallery['gallery_id']?>"><?=$gallery['gallery_title']?>(<?=$gallery['type']?>)</a><?if($gallery['type']=='panorama'):?><a href="/admin/galleries/edit_panorama/<?=$gallery['gallery_id']?>">[Cập nhập nội dung panorama]</a><?endif;?></td>
						      	 <td><?=$gallery['menu_title']?></td>
								<td><?=datetime_vi($gallery['gallery_time'])?></td>
                                <td class="queu"><a href="admin/galleries/delete_album/<?=$gallery['gallery_id']?>" onclick="return confirm('Bạn muốn xóa album ảnh này không')"><img src="html/resources/images/icons/delete.png"/></a></td>
  								<td class="selected last"><input type="checkbox" name="<?=$gallery['gallery_id']?>"  value="<?=$gallery['gallery_id']?>"/></td>
							</tr>
                            <?endforeach;?>
                      	</tbody>
     			    </table>
            	</form>
                    <div class="pagination pagination-left">
						<div class="results">
							<span>Có tổng cộng <?=$total?> album</span>
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
				</div>
                <div class="sub_menu">
               <div class="save">
                <a href="admin/galleries.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_gallery();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_gallery();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
                <div style="clear: both;"></div>

               </div>
                <div class="box" >
			     <div class="title">
					<h5>Thêm mới album </h5>
				</div>
                <div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">
                    Tên album loại panorama trùng tên thư mục album được tải lên server <br />
                 </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_gallery').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
                <form id="frm_add_gallery" name="frm_add_gallery" action="admin/galleries.html" method="post" onsubmit="return validate_form('frm_add_gallery')">
				<div class="form">
                <div class="options-title" >Thông tin bắt buộc</div>
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề album</label>
							</div>
							<div class="input">
								<input type="text" id="gallery_title" name="gallery_title" class="required_field" size="60"   />
							</div>
				</div>
                <div class="field">
							<div class="label">
								<label for="autocomplete">Ảnh đại diện</label>
							</div>
							<div class="input">
								<input type="text" id="gallery_image" name="gallery_image" class="required_field"  size="60"  />
                                  <input type="button" class="button browse" value="Chọn ảnh" onclick="get_ck('gallery_image')" /><br />
                                <div id="gallery_image-thumb" class="images-thumb">	</div>
						
				            </div>
                    </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Danh mục chứa album </label>
							</div>
						<div class="input">
                        <select name="menu_id">
                            <?foreach ($menus->result_array() as $menu):?>
                            <option value="<?=$menu['menu_id']?>"><?=$menu['menu_title']?></option>
                                <?endforeach;?>
                                </select>
							</div>
						</div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Loại album</label>
							</div>
							<div class="input">
								<select name="type">
                                    <option value="default">Mặc định</option>
                                    <option value="panorama">Panorama</option>
                                </select>
							</div>
				        </div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tên album</label>
							</div>
							<div class="input">
							<input type="text" name="gallery_name" class="required_field" />
                            
							</div>
				        </div>
                        <a name="form"></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả</label>
							</div>
							<div class="input">
								<textarea class="textarea" name="gallery_desc" cols="50" rows="10"></textarea>
							</div>
				        </div>
                     </div>
                    <input type="hidden" name="token" value="<?=$token?>" />

				</div>
                </form>
                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_gallery').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>


                </div>

			</div>
        	</div>

<?php
$this->load->view('back_end/footer.php');
?>