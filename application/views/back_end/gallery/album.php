<?php
$this->load->view('back_end/header.php');
?>

<link rel="stylesheet" type="text/css" href="html/resources/scripts/contextmenu/jquery.contextMenu.css"/>
<ul id="myMenu" class="contextMenu">
			<li class="edit"><a href="#edit">Edit</a></li>
			<!--<li class="cut separator"><a href="#cut">Cut</a></li>
			<li class="copy"><a href="#copy">Copy</a></li>
			<li class="paste"><a href="#paste">Paste</a></li> -->
			<li class="delete"><a href="#delete">Delete</a></li>
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
                <br />
                 
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
                <?=$message?>
                <form id="frm_edit_gallery" name="frm_edit_gallery" action="admin/galleries/album/<?=$album['gallery_id']?>.html" method="post" onsubmit="return validate_form('frm_edit_gallery')">
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
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Danh mục  album </label>
							</div>
						<div class="input">
                        <select name="menu_id">
                            <?foreach ($menus->result_array() as $menu):?>
                            <option value="<?=$menu['menu_id']?>" <?=($album['menu_id'] == $menu['menu_id'])?'selected="selected"':'';?>><?=$menu['menu_title']?></option>
                                <?endforeach;?>
                                </select>
							</div>
						</div>


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
                    <input type="hidden" name="token" value="<?=$token?>" />

				</div>
                </form>
                <div class="sub_menu">

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
            <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách nội dung trong album</h5>
                </div>
            <div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">
                      
                 
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_media').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Thêm</span>
                </a>
                 </div>
                </div>
                <form id="frm_add_media" name="frm_add_media" method="post" action="/admin/galleries/upload" onsubmit="return validate_form('frm_add_media')">
				
				<div class="form">
					<div class="fields">
                    				
				<div class="field">
                
							<div class="label">
								<label for="autocomplete">Tiêu đề </label>
							</div>
							<div class="input">
								<input type="text" id="media_title" name="media_title" class="required_field"   size="40"  />
							</div>
                            <input type="hidden"  name="gallery_id" value="<?=$album['gallery_id']?>" />
						</div>
                        <a name="form" ></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thumbnail</label>
							</div>
							<div class="input">
							<input type="text" name="media_url" id="media_url" class="required_field" size="50" />
                              <input type="button" class="button" value="Chọn từ server" onclick="get_ck('media_url')" />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Url</label>
							</div>
							<div class="input">
							<input type="text" name="media_href" id="media_href"  size="50" id="media_href"  />(chọn từ server hoặc nhập đường dẫn)
                            <input type="button" class="button" value="Chọn từ server" onclick="get_ck('media_href')" />
							</div>
                       	</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả</label>
							</div>
							<div class="input">
							<textarea name="media_description" cols="40" rows="5" id="media_description"></textarea>
							</div>
                            
						</div>
                    </div>
				</div>
				</form>
                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_media').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Thêm</span>
                </a>
                </div>
                <?
        

                ?>
                </div>
                <div class="album-list-image" id="album-list-image">
                <?
               
                foreach($contents->result_array() as $item):
                $image = $item['media_url'];
              
                ?>
                <div class="image-info" title="<?=$item['media_id']?>">
                    <a class="fancybox" longdesc="<?=$item['media_description']?>" rel="gallery" href="<?=$image?>"><img src="<?=$image?>" width="120"/></a>
                    <p class="file-info"><?=$item['media_title']?></p>
                </div>
                
                
                <?
                endforeach;?>
                </div>
                <a name="gallery"></a>
			</div>
        	</div>

<?php
$this->load->view('back_end/footer.php');
?>