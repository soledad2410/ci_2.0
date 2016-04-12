<?php
$this->load->view('back_end/header.php'); 
?>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Tìm kiếm bài viết</h5>
                    <div class="search">
							<div class="input">
								<input type="text" id="search" name="search" value="" />
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
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div><div class="sub_menu-notice" style="margin-top: 10px;">Việc xóa bài viết khỏi khối nội dung không ảnh hưởng tới danh sách bài viết của website</div>
                <div class="save">
                <a href="admin/plugin.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                </div>
  		        <div class="table">
					<form id="frm_block_article" name="frm_block_article">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề</th>
                                <th>Thành viên</th>
								<th>Nguồn</th>
								<th>Ngày cập nhập</th>
								<th>Danh mục</th>
                                <th>Hiển thị</th>
                                <th>Xóa</th>
                                <th></th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        <tbody>
                        <?php foreach($articles_in_block->result_array() as $article): ?>
                            <tr>
								<td class="title" style="width: 35%;"><a href="admin/article/edit_article/<?=$article['article_id']?>.html"><?= $article['article_title'] ?></a></td>
                                <td class="name" style="width: 10%;text-align: center;"><?= $article['user_name'] ?></td>
								<td class="price"><?= $article['article_author'] ?></td>
								<td class="date" style="width: 15%;" id="dp1307331808406"><?= date('H:m d-m-Y',$article['article_datetime']) ?></td>
								<td class="category"><a href="admin/article.html?cate=<?= $article['menu_id'] ?>"><?= $article['menu_title'] ?></a></td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$article['article_visible']?>.gif" width="16" height="16" alt="visible"/></td>
                                <td class="queu"><a href="javascript:void(0)" onclick="remove_article_from_block('<?= $article['article_id'] ?>')"><img src="html/resources/images/delete.png" width="24" height="24" alt="delete"/></a></td>
                                <td class="queu"></td>
								<td class="selected last"><input type="checkbox"  name="<?= $article['article_id'] ?>" value="<?= $article['article_id'] ?>"/></td>
							</tr>
                           <?php endforeach; ?> 
						</tbody>
     			    </table>
                    </form>
                    <input type="hidden" id="plugin_id" value="<?=$plugin_id?>" />
    			</div>
                <div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div><div class="sub_menu-notice" style="margin-top: 10px;">Việc xóa bài viết khỏi khối nội dung không ảnh hưởng tới danh sách bài viết của website</div>
                <div class="save">
                <a href="admin/plugin.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                </div>
                <div style="clear: both;"></div>
                 </form>
                </div>
                <div class="box">
				<div class="title">
					<h5>Danh sách bài viết</h5>
                    <div class="search">
							<div class="input">
								<input type="text" id="search_article" name="search_article" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_article2()" />
							</div>
					</div>
                    <div class="search">
							<div class="input">
								<select id="menu_article">
                                <option value="0">--Chọn danh mục--</option>
                                <?php echo $menu ?>
                                </select>
							</div>
				</div>
                </div>
				<div class="table">
					<form id="frm_list_article" name="frm_list_article">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề</th>
                                <th>Thành viên</th>
								<th>Nguồn</th>
								<th>Ngày cập nhập</th>
								<th>Danh mục</th>
                                <th>Hiển thị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php foreach($articles->result_array() as $article): ?>
              
							<tr <?=in_array($article['article_id'],$article_id_array)?'class="selected"':'';?>>
								<td class="title" style="width: 35%;"><a href="admin/article/edit_article/<?=$article['article_id']?>.html"><?= $article['article_title'] ?></a></td>
                                <td class="name" style="width: 10%;text-align: center;"><?= $article['user_name'] ?></td>
								<td class="price"><?= $article['article_author'] ?></td>
								<td class="date" style="width: 15%;" id="dp1307331808406"><?= date('H:m d-m-Y',$article['article_datetime']) ?></td>
								<td class="category"><a href="admin/article.html?cate=<?= $article['menu_id'] ?>"><?= $article['menu_title'] ?></a></td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$article['article_visible']?>.gif" width="16" height="16" alt="visible"/></td>
                                <td class="queu"></td>
                                <td class="queu"></td>
								<td class="selected last"><input type="checkbox"  name="<?= $article['article_id'] ?>" value="<?= $article['article_id'] ?>" <?=in_array($article['article_id'],$article_id_array)?'checked="checked"':'';?> onclick="update_article_block(this)"/></td>
							</tr>
                           <?php endforeach; ?> 
						</tbody>
     			    </table>
                    </form>
					<!-- pagination -->
					<div class="pagination pagination-left">
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
			</div>
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>