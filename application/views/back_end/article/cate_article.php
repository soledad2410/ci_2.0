<?php
$this->load->view('back_end/header.php'); 
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh mục bài viết</h5>
                    
               <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_article()" />
							</div>
						
					</div>
                    <div class="search">
						
							<div class="input">
								<select id="menu">
                                <option value="0">--Chọn danh mục--</option>
                                <?php echo $menu ?>
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
                <a href="admin/article/cate.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/>
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_cate_aricle();"><img src="html/resources/images/delete.png" width="32px" height="32px"/>
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_cate_article();"><img src="html/resources/images/edit.png" width="32px" height="32px"/>
                <span>Sửa</span>
                </a>
                </div>
                
                
                </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_cate_article" name="frm_list_cate_article">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề</th>
							
								<th>Hiển thị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                       
              
							<?php echo $menu_table; ?>
                       
						</tbody>
     			    </table>
					<!-- pagination -->
					
					<!-- end pagination -->
					<!-- table action -->
					
					<!-- end table action -->
					</form>
				</div>
                <div class="sub_menu">
                     
                
                <div class="save">
                <a href="admin/article/cate.html#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/>
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_cate_aricle();"><img src="html/resources/images/delete.png" width="32px" height="32px"/>
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_cate_article();"><img src="html/resources/images/edit.png" width="32px" height="32px"/>
                <span>Sửa</span>
                </a>
                </div>
                
                
                </div>
                <div style="clear: both;"></div>
                             
                </form>
                
                </div>
                <div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới danh mục bài viết</h5>
				</div>
				<!-- end box / title -->
                 <div id="message-error" class="message message-error" style="margin: 5px;display:none">
							<div class="image">
								<img src="html/resources/images/icons/error.png" alt="Error" height="32" />
							</div>
							<div class="text">
								<h6>Error Message</h6>
								<span id="error-message">This is the error message.</span>
							</div>
							<div class="dismiss">
								<a href="#message-error"></a>
							</div>
						</div>
                        <div class="message message-success" id="message-success" style="display: none;">
							<div class="image">
								<img height="32" alt="Success" src="html/resources/images/icons/success.png"/>
							</div>
							<div class="text">
								<h6>Success Message</h6>
								<span id="success-message">This is the success message.</span>
							</div>
							<div class="dismiss">
								<a href="#message-success"></a>
							</div>
						</div>
				<form id="frm_article_config" name="frm_article_config">
				<div class="form">
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề danh mục</label>
							</div>
							<div class="input">
								<input type="text" id="menu_title" size="40"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Danh mục cha</label>
							</div>
							<div class="input">
							<select id="menu_parent">
                            <option value="0">Danh mục gốc</option>
                             <?php echo $menu ?>
                            </select>
							</div>
						</div>
                        <a name="form"></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" id="menu_visible"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị trang chủ</label>
							</div>
							<div class="input">
								<input type="checkbox" id="menu_home"/>
							</div>
						</div>
						
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_menu_news();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
				</form>
			</div>
            <div id="frm_add_menu"></div>
              <a name="frm_edit"></a>
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>