<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
    $("#floor_date").attr('value','<?= $this->input->get('from')?>')
    $("#ceil_date").attr('value','<?= $this->input->get('to')?>')
})
</script>
<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách bình luận bài viêt</h5>
                    
                    <div class="search">
						
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_articlecomment()" />
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
                     
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">Các bình luận được hiển thị theo thứ tự ngày tháng mới nhất</div>
                <div class="save" >
                <a href="admin/galleries.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_albumcomment();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa bình luận</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="active_albumcomment();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Hiển thị </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="deactive_albumcomment();"><img src="html/resources/images/icons/active_0.gif" width="30px" height="30px"/><br />
                <span>Ẩn bình luận</span>
                </a>
                </div>
                
                </div>
  		             
				<!-- end box / title -->
                
                <div class="table">
					<form id="frm_list_articlecomment" name="frm_list_articlecomment">
					<table>
						<thead>
							<tr>
								<th class="left">Tiêu đề</th>
                                <th>Họ và tên</th>
								<th>Bài viết bình luận</th>
								<th>Ngày tháng</th>
	                            <th>Địa chỉ ip</th>
                                <th>Hiển thị</th>   
                                <th>Xem</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>
                        
						<tbody>
                        <?php
                        foreach($comments->result_array() as $comment):
         
                             
                        ?>
              
							<tr>
								<td class="title" style="width: 20%;"><?= str_replace($this->input->get('keyword'),'<strong>'.$this->input->get('keyword').'</strong>',$comment['comment_title']) ?></td>
                                <td class="name" style="width: 10%;text-align: center;"><?=$comment['cus_name']?></td>
								<td class="price" style="width: 15%;color:red;"><a href="<?=base_url()?>admin/galleries/comment.html?gallery_id=<?=$comment['gallery_id']?>"><?=$comment['gallery_title']?></a></td>
								<td class="date" id="dp1307331808406" style="color: red;"><?= date('H:m d-m-Y',$comment['comment_date']) ?></td>
								<td class="category"><?=$comment['ip_address']?></td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$comment['comment_visible']?>.gif" width="16" height="16" alt="hiển thị"/></td>
                                <td class="queu"><a href="admin/galleries/view_comment/<?=$comment['comment_id']?>.html"><img src="html/resources/images/icons/read_<?=$comment['comment_read']?>.png" width="16" height="16" alt="active"/></a></td>
								<td class="selected last"><input type="checkbox" id="<?=$comment['comment_id']?>" name="<?=$comment['comment_id']?>" value="<?=$comment['comment_id']?>"/></td>
							</tr>
                           <?php endforeach; ?> 
						</tbody>
     			    </table>
					<!-- pagination -->
					<div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả từ  <?= $result_from?>-<?= $result_to ?> của tổng <?= $comments->num_rows() ?>/<?=$total_all?> bản ghi</span>
                            						</div>
                        
						  <span style="float: left;margin-left: 10px;"><select id="num-page">
                          <option value="10">10</option>
                          <option value="20" <?php if($this->input->get('limit')==20){echo'selected="selected"';} ?>>20</option>
                          <option value="30" <?php if($this->input->get('limit')==30){echo'selected="selected"';} ?>>30</option>
                          <option value="40" <?php if($this->input->get('limit')==40){echo'selected="selected"';} ?>>40</option>
                          </select></span>
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
					<!-- end pagination -->
					<!-- table action -->
					
					<!-- end table action -->
					</form>
				</div>
                <div class="sub_menu">
                     
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div>
                <div class="sub_menu-notice" style="margin-top: 10px;">Các bình luận được hiển thị theo thứ tự ngày tháng mới nhất</div>
                <div class="save" >
                <a href="admin/galleries.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_albumcomment();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa bình luận</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="active_albumcomment();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Hiển thị </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="deactive_albumcomment();"><img src="html/resources/images/icons/active_0.gif" width="30px" height="30px"/><br />
                <span>Ẩn bình luận</span>
                </a>
                </div>
                
                </div>
                <div style="clear: both;"></div>
                             
                </form>
                
                </div>
                
			</div>

<?php
$this->load->view('back_end/footer.php'); 
?>