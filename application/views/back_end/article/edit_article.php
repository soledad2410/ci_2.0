<?php
$this->load->view('back_end/header.php');

?>
<script type="text/javascript">
$(document).ready(function(){
      $("#date-picker").attr('value','<?=date('d-m-Y', $article['article_datetime'])?>');
    $("form").bind('keydown',function(e){
        var key=e.keyCode;
        if(key==13){$(this).submit();}
    })

})
</script>
		<!-- end header -->
		<!-- content -->
		<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Sửa bài viết</h5>

                    <div class="search">

							<div class="input">
								<input type="text" id="search" name="search" value="<?=$this->input->get('keyword')?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_article()" />
							</div>

					</div>
                    <div class="search">

							<div class="input">
								<select id="menu">
                                <option value="0">--Chọn danh mục--</option>
                                <?php echo $menu?>
                                </select>
							</div>
				</div>
                <div class="search">

							<div class="input">
							<span style="color: white;">Tới ngày</span> <input type="text" id="ceil_date" class="date"  />
							</div>
				</div>
                <div class="search">

							<div class="input">
							<span style="color: white;">Từ ngày</span> <input type="text" id="floor_date" class="date" />
							</div>
				</div>
				</div>
                <div class="sub_menu">
                <div class="save">
                <a href="admin/article.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save">
                <a onclick="delete_article('<?=$article['article_id']?>')"  ><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save">
                <a href="admin/article/add_article.html"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Viết bài</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_edit_article').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>
                <?=$message?>
                	<form id="frm_edit_article" name="frm_edit_article" method="post" action="admin/article/edit_article/<?=$article['article_id']?>.html" onsubmit="return validate_form('frm_edit_article')" >
       <div class="left-panel">
                	<div class="title">
	           <h6>Nội dung bài viết</h6>
				</div>

				<div class="form">
					<div class="fields">
					<div class="field">
                    		<div class="label">
								<label for="input-medium">Tiêu đề bài viết</label>
							</div>
							<div class="input">
								<input type="text" id="title" name="article_title" value="<?=$article['article_title']?>" class="required_field" size="50" onchange="$('#article_h1').val(this.value);" />
							</div>
						</div>


						<div class="field">
							<div class="label">
								<label for="date">Ngày tháng:</label>
							</div>
							<div class="input">
								<input type="text" id="date-picker" name="article_datetime" class="date" />
							</div>
						</div>


						<div class="field">
                               <div class="label">
                                <label for="input">Danh mục tin tức</label>
                               </div>
							<div class="input">

                            <select data="<?=$article['menu_id']?>" name="menu_id" size="10" class="form-control" style="width: 250px;">
                                <?
foreach ($trees as $root):
	if ($root['module_name'] == 'news_cate'):
	?>
	                                <option value="<?=$root['menu_id']?>"><strong><?=$root['menu_title']?></strong></option>
	                                    <?if (isset($root['childs'])): $lv2 = $root['childs'];?>

		                                    <?foreach ($lv2 as $cate): ?>
		                                    <?php if ($cate['module_name'] == 'news_cate'): ?>
		                                    <option value="<?=$cate['menu_id']?>">-- <?=$cate['menu_title']?></option>

		                                              <?if (isset($cate['childs'])): $lv3 = $cate['childs'];?>

			                                                    <?foreach ($lv3 as $cate): ?>
			                                                        <option value="<?=$cate['menu_id']?>" <?=$cate['module_name'] != 'news_cate' ? 'disabled' : '';?>>---- <?=$cate['menu_title']?></option>
			                                                    <?endforeach;?>

		                                                 <?endif;?>
	                                                 <?endif;?>

                                    <?endforeach;?>

                                   <?endif;?>
                                   <?endif;?>

                                <?endforeach;?>

                            </select>
                         	</div>
						</div>


						<div class="field">
							<div class="label">
								<label for="file">Ảnh đại diện</label>
							</div>
							<div class="input input-file">
								<input type="text" id="article_image" name="article_image" size="40" value="<?=$article['article_image']?>" />
                                <input type="button" value="Chọn ảnh" onclick="get_ck('article_image')" /><br />
                                <div id="article_image-thumb" class="images-thumb">
                                <img src="<?=$article['article_image']?>" height="70" alt="No-image" />
                                </div>
							</div>
						</div>
						<div class="field">
							<div class="label label-textarea">
								<label for="textarea">Tóm tắt nội dung</label>
							</div>
							<div class="textarea textarea-editor">
								<textarea id="intro" name="article_header" name="textarea" cols="40" rows="8" ><?=$article['article_header']?></textarea>

							</div>
						</div>
                        		<div class="field">

								<p align="center" >Nội dung bài viết</p>
					     <textarea id="article_content" name="article_content"><?=$article['article_content']?></textarea>
                        	 <script type="text/javascript">
                                initCKeditor('article_content','Full','98%',400);
                                </script>
						</div>

					</div>
				</div>

                </div>
                <div class="right-panel">
                           	<div class="title">
	       <h6>Tùy chọn bài viết</h6>
           </div>
           <div class="field">
           <div class="label"  >Hiển thị bài viết</div>
           <div class="input"><div class="checkboxes">
								<div class="checkbox">
									<input type="checkbox" checked="checked" id="article_visible" name="article_visible" value="1" <?if ($article['article_visible'] == 1) {echo 'checked="checked"';}
?>  />
									<label for="checkbox-1">Hiển thị</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="article_home" name="article_home" value="1" <?if ($article['article_home'] == 1) {echo 'checked="checked"';}
?> />
									<label for="checkbox-2">Trang chủ</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="article_hot" name="article_hot" value="1" <?if ($article['article_hot'] == 1) {echo 'checked="checked"';}
?> />
									<label for="checkbox-3">Tin hot</label>
								</div>
							</div></div>
                            </div>

                            <div class="field">
           <div class="label" >Bình luận</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" id="comment" name="article_allowcomment" value="1" <?if ($article['article_allowcomment'] == 1) {echo 'checked="checked"';}
?> />

								</div></div>
                            </div>
                            <div class="field">
           <div class="label" >Nhóm thành viên bình luận</div>
           <?$privileges = explode('|', $article['article_comment_privilege']);?>
           <div class="input"><div class="checkbox">
									<input type="checkbox" name="article_comment_privilege[]" value="0" <?=in_array('0', $privileges) ? 'checked="checked"' : '';?> />Tất cả
								</div>
                                <?foreach ($groups->result_array() as $group): ?>
                                <div class="checkbox">
									<input type="checkbox" name="article_comment_privilege[]" value="<?=$group['group_id']?>" <?=in_array($group['group_id'], $privileges) ? 'checked="checked"' : '';?> /><?=$group['group_name']?>
								</div>
                                <?endforeach;?>
                                </div>
                            </div>
                             <!--
<div class="field">
           <div class="label" >Cho phép đánh giá</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" id="article_rate" name="article_rate" value="1" <?if ($article['article_rate'] == 1) {echo 'checked="checked"';}
?> />

								</div></div>
                            </div>
-->
                            <div class="field">
           <div class="label" >Meta keyword</div>
           <div class="input"><textarea name="article_keyword" id="article_keyword" rows="4" cols="25"><?=$article['article_keyword']?></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta description</div>
           <div class="input"><textarea name="article_description" id="article_description" rows="4" cols="25"><?=$article['article_description']?></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >File attach</div>
           <div class="input"><input size="20" type="text" name="article_fileattach" value="<?=$article['article_fileattach']?>" id="article_fileattach" size="15" /><input type="button" class="button" onclick="get_ck('article_fileattach')" value="chọn file" /></div>
                            </div>
                            <div class="field">
           <div class="label" >Kiểu hiển thị</div>
           <div class="radios" style="float: right;">
                                <div class="radio">
									<input type="radio" value="_self" checked="checked"  name="article_urltarget" <?if ($article['article_urltarget'] == '_self') {echo 'checked="checked"';}
?> />
									<label for="radio-2">Hiển thị trên tab cũ (mặc định)</label>
								</div>
								<div class="radio">
									<input type="radio" value="_blank"  name="article_urltarget" <?if ($article['article_urltarget'] == '_blank') {echo 'checked="checked"';}
?> />
									<label for="radio-1">Hiển thị mở ra tab mới</label>
								</div>


							</div>
                            <div class="field">
           <div class="label" >Tags (mỗi tag cách nhau bởi dấu phẩy)</div>
           <div class="input"><textarea rows="4" name="article_tags" id="article_tags" cols="25" ><?=$article['article_tags']?></textarea></div>
                            </div>
            <div class="field">
           <div class="label" >Nguồn( tác giả )</div>
           <div class="input"><input type="text" name="article_author" id="article_author" value="<?=$article['article_author']?>" size="20"/></div>
                            </div>
            <div class="field">
           <div class="label" >Meta title</div>
           <div class="input"><textarea rows="4" name="article_metatitle" id="article_metatitle" cols="25"><?=$article['article_metatitle']?></textarea></div>
            </div>
            <div class="field">
           <div class="label" >Thẻ h1 ( nếu có)</div>
           <div class="input"><textarea rows="4" name="article_h1" id="article_h1" cols="25"><?=$article['article_h1']?></textarea></div>
            </div>
            <div class="field">
           <div class="label" >Video ( Mã nhúng)</div>
           <div class="input"><textarea rows="4" name="article_video" id="article_video" rows="4" cols="25"><?=$article['article_video']?></textarea></div>
            </div>
           </div>

				</div>
                </form>
                <div style="clear: both;"></div>
                             <div class="sub_menu">
                <div class="save">
                <a href="admin/article.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save">
                <a onclick="delete_article('<?=$article['article_id']?>')"  ><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save">
                <a href="admin/article/add_article.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Viết bài</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_article').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                </div>


                </div>

			</div>
		</div>
		<!-- end content -->
		<!-- footer -->
	<?php
$this->load->view('back_end/footer');
?>