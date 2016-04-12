<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#floor_date").attr('value','<?= $this->input->get('from')?>');
    $("#ceil_date").attr('value','<?= $this->input->get('to')?>');
})
</script>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách bài viết</h5>
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
                     
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div><div class="sub_menu-notice" style="margin-top: 10px;">Các bài viết sẽ được hiển thị tương ứng với từng danh mục và sắp xếp mặc định theo thứ tự</div>
                <div class="save">
                <a href="admin/article/add_article.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Viết bài</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_article();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_article();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
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
                                <th>Sắp xếp</th>
                                
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php foreach($articles->result_array() as $article): ?>
              
							<tr>
								<td class="title" style="width: 35%;"><a href="admin/article/edit_article/<?=$article['article_id']?>.html"><img style="float: left;margin-right:10px" src="<?=$article['article_image']?>" height="50"/><br /><?= $article['article_title'] ?></a></td>
                                <td class="name" style="width: 10%;text-align: center;"><?= $article['user_name'] ?></td>
								<td class="price"><?= $article['article_author'] ?></td>
								<td class="date" style="width: 15%;" id="dp1307331808406"><?= date('H:m d-m-Y',$article['article_datetime']) ?></td>
								<td class="category"><a href="admin/article.html?cate=<?= $article['menu_id'] ?>"><?= $article['menu_title'] ?></a></td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$article['article_visible']?>.gif" width="16" height="16" alt="visible"/></td>
                                <td class="queu"><input type="text" name="<?=$article['article_id']?>" class="article_queu queu numbered_field" value="<?=$article['article_queu']?>"  /></td>
                                
								<td class="selected last"><input type="checkbox"  name="<?= $article['article_id'] ?>" value="<?= $article['article_id'] ?>"/></td>
							</tr>
                           <?php endforeach; ?> 
						</tbody>
     			    </table>
                    </form>
					<!-- pagination -->
				
                    <?=admin_paginator($total)?>
		
			</div>
                <div class="sub_menu">
                <div class="save">
                <a href="admin/article/add_article.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Viết bài</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_article();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_article();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                </div>
                <div style="clear: both;"></div>
                 </form>
                </div>
                <div class="box">
				<div class="title">
					<h5>Tuỳ chọn trang tin tức</h5>
				</div>
				<form id="frm_article_config" name="frm_article_config">
				<div class="form">
					<div class="fields">
			          <?foreach($config_news->result_array() as $config):?>
                      <?=$this->config_model->emit_config_field($config['config_id'],$_SESSION['lang_admin'])?>
                      <?endforeach;?>
                  	</div>
				</div>
                <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="save_config('frm_article_config');"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
                </div>
				</form>
			</div>
			</div>
            
            <script type="text/javascript">
            $(function(){
               $('.article_queu').change(function(){
                 
                    var id = $(this).attr('name');
                    var queu = $(this).val();
                    $.post('/admin/article/swap_position',{id:id,queu:queu},function(rs){
                        if(rs.code == 'success')
                        {
                            var id2 = rs.swapped_id;
                            
                            if(id2){
                              
                                $('#frm_list_article').find('input[name="'+id2+'"]').val(rs.queu);
                            }
                            
                        }
                    },'json');
               }); 
            });
            </script>

<?php
$this->load->view('back_end/footer.php'); 
?>