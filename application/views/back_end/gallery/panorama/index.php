<?php
$this->load->view('back_end/header.php');
?>

<link rel="stylesheet" type="text/css" href="html/resources/scripts/contextmenu/jquery.contextMenu.css"/>
<ul id="myMenu" class="contextMenu">
			<li class="edit"><a href="#edit-pano">Edit</a></li>
			<!--<li class="cut separator"><a href="#cut">Cut</a></li>
			<li class="copy"><a href="#copy">Copy</a></li>
			<li class="paste"><a href="#paste">Paste</a></li> -->
			<li class="delete"><a href="#delete-pano">Delete</a></li>
			<li class="quit separator"><a href="#quit">Quit</a></li>
		</ul>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Trang album <?=$album['gallery_title']?></h5>
                </div>
            <div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">
                Album panorama, vào <a href="/admin/galleries/album/<?=$album['gallery_id']?>">[Đây]</a> để cập nhập nội dung
                 
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_gallery').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>

                <div class="save" >
                <a href="admin/galleries.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>

                </div>
                </div>
                <?=flash_data()?>
                <form id="frm_edit_gallery" name="frm_edit_gallery" action="admin/galleries/panorama/<?=$album['gallery_id']?>.html" method="post" onsubmit="return validate_form('frm_edit_gallery')">
				<div class="form">
                <div class="options-title" >Sửa thông tin album</div>
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề album</label>
							</div>
							<div class="input">
								<input size="60" type="text" name="gallery_title" value="<?=$album['gallery_title']?>" class="required_field"   />
							</div>
				</div>

               <div class="field">
							<div class="label">
								<label for="autocomplete">Ảnh đại diện</label>
							</div>
							<div class="input">
								<input size="60" type="text" id="gallery_image" name="gallery_image" class="required_field"  value="<?=$album['gallery_image']?>"  />
                                  <input type="button" class="button browse" value="Chọn ảnh" onclick="get_ck('gallery_image')" /><br />
                                <div id="gallery_image-thumb" class="images-thumb"><img src="<?=$album['gallery_image']?>" height="70" alt="no-image"/>	</div>
						
				            </div>
                    </div>
                        
                        <input type="hidden" name="token" value="<?=$token?>" />

                        <a name="form"></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả</label>
							</div>
							<div class="input">
								<textarea class="textarea" name="gallery_desc" cols="50" rows="10"><?=$album['gallery_desc']?></textarea>
							</div>
				        </div>
                     </div>
                    

				</div>
                </form>
                <div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">
                Album panorama, vào <a href="/admin/galleries/edit_panorama/<?=$album['gallery_id']?>">[Đây]</a> để cập nhập nội dung
                 
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_gallery').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>

                <div class="save" >
                <a href="admin/galleries.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>

                </div>
                </div>

			</div>
            
        	</div>

<?php
$this->load->view('back_end/footer.php');
?>