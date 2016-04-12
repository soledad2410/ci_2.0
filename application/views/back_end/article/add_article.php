<?php
$this->load->view('back_end/header.php');
?>
<script type="text/javascript">

$(document).ready(function(){
      $("#date-picker").attr('value','<?=date('d-m-Y')?>');
     $(".search input").bind('keyup',function(e){
        var key=e.keyCode;
        if(key===13){
            load_article();
        }
    });

})
</script>
		<!-- end header -->
		<!-- content -->
		<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới bài viết</h5>

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
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_article').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>

                <div class="save">
                <a href="javascript:void(0)" onclick="reset_form('frm_add_article');"><img src="html/resources/images/reset.png" width="32px" height="32px"/><br />
                <span>Làm lại</span>
                </a>
                </div>
                </div>
                <?=$message?>
  		  	<!-- end box / title -->
            	<form id="frm_add_article" name="frm_add_article" method="post" action="admin/article/add_article.html" onsubmit="return validate_form('frm_add_article')" >
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
								<input type="text" id="title" name="article_title" class="required_field" size="100" onchange="$('#article_h1,#article_metatitle').val(this.value);" />
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

                            <select name="menu_id" size="10" class="form-control" style="width: 250px;">
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
								<input type="text" id="article_image" name="article_image" size="40" />
                                <input type="button" value="Chọn ảnh" onclick="get_ck('article_image')" /><br />
                                <div id="article_image-thumb" class="images-thumb">
                                </div>
							</div>
						</div>
						<div class="field">
							<div class="label label-textarea">
								<label for="textarea">Tóm tắt nội dung</label>
							</div>
							<div class="textarea textarea-editor">
								<textarea  name="article_header" rows="8" cols="40" ></textarea>


							</div>
						</div>
                        		<div class="field">

								<p align="center" >Nội dung bài viết</p>
					     <textarea name="article_content"></textarea>
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
									<input type="checkbox" checked="checked" id="article_visible" name="article_visible" value="1" />
									<label for="checkbox-1">Hiển thị</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="article_home" name="article_home" value="1" />
									<label for="checkbox-2">Trang chủ</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="article_hot" name="article_hot" value="1" />
									<label for="checkbox-3">Tin hot</label>
								</div>
							</div></div>
                            </div>

                            <div class="field">
           <div class="label" >Hiển thị bình luận</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" id="comment" name="article_allowcomment" value="1" />
								</div>
                                </div>
                            </div>
                            <div class="field">
           <div class="label" >Nhóm thành viên bình luận</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" name="article_comment_privilege[]" value="0" />Tất cả
								</div>
                                <?foreach ($groups->result_array() as $group): ?>
                                <div class="checkbox">
									<input type="checkbox" name="article_comment_privilege[]" value="<?=$group['group_id']?>" /><?=$group['group_name']?>
								</div>
                                <?endforeach;?>
                                </div>
                            </div>
                             <div class="field">
           <div class="label" >Cho phép đánh giá</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" id="article_rate" name="article_rate" value="1" />

								</div></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta keyword</div>
           <div class="input"><textarea name="article_keyword" id="article_keyword" cols="25" rows="4"></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta description</div>
           <div class="input"><textarea name="article_description" id="article_description" cols="25" rows="4"></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >File attach</div>
           <div class="input"><input type="text" name="article_fileattach" id="article_fileattach" size="20" /><input type="button" class="button" onclick="get_ck('article_fileattach')" value="chọn file" /></div>
                            </div>
                            <div class="field">
           <div class="label" >Kiểu hiển thị</div>
           <div class="radios" style="float: right;">
                                <div class="radio">
									<input type="radio" value="_self" checked="checked"  name="article_urltarget" />
									<label for="radio-2">Hiển thị trên tab cũ (mặc định)</label>
								</div>
								<div class="radio">
									<input type="radio" value="_blank"  name="article_urltarget" />
									<label for="radio-1">Hiển thị mở ra tab mới</label>
								</div>
						</div>
                            <div class="field">
           <div class="label" >Tags (mỗi tag cách nhau bởi dấu phẩy)</div>
           <div class="input"><textarea name="article_tags" id="article_tags" cols="25" rows="4" ></textarea></div>
                            </div>
            <div class="field">
           <div class="label" >Nguồn( tác giả )</div>
           <div class="input"><input type="text" name="article_author" id="article_author" size="20"/></div>
                            </div>
            <div class="field">
           <div class="label" >Meta title</div>
           <div class="input"><textarea name="article_metatitle" id="article_metatitle" cols="25" rows="4"></textarea></div>
            </div>
            <div class="field">
           <div class="label" >Thẻ h1</div>
           <div class="input"><textarea name="article_h1" id="article_h1" cols="25" rows="4"></textarea></div>
            </div>
            <div class="field">
           <div class="label" >Video<br />(Mã nhúng)</div>
           <div class="input"><textarea name="article_video" id="article_video" cols="25" rows="4"></textarea><br />

           </div>
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
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_article').submit()();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
               <div class="save">
                <a href="javascript:void(0)" onclick="reset_form('frm_add_article');"><img src="html/resources/images/reset.png" width="32px" height="32px"/><br />
                <span>Làm lại</span>
                </a>
                </div>
                </div>
                </div>
            </div>
		</div>
	<?php
$this->load->view('back_end/footer');
?>