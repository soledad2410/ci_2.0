<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
    $(".ui-datepicker").css("display","block");
})
</script>
		<div id="content">
			<div class="box">
				<div class="title">
					<h5>Bảng điều khiển</h5>
        			
				</div>
		     
                <div id="box-config">
                <?php
                $CI=&get_instance();
                echo '<h1 class="welcome">Xin chào:<a href="javascript:void(0)" onclick="edit_admin(\'',$CI->user['user_name'],'\')">',$CI->user['user_name'],'</a></h1>'; 
                ?>
                <div class="left-box-config">
                <div class="calendar"></div>
                <div class="clock"></div>
               </div>
               <div class="left-right-config" style="width: 52%;">
               <div class="counter-statics">
               <h4>Thống kê website</h4>
               <p>Bài viết: <strong><?=$total_news?></strong> </p>
               <p>Sản phẩm: <strong><?=$total_product?></strong> </p>
               <p>Danh mục: <strong><?=$total_cate?></strong></p>
               <p>Liên hệ: <strong><?=$total_contact?></strong></p>
               <p>Thành viên: <strong><?=$total_user?></strong></p>
               <p>Tổng lượt truy cập: <?=$visit['total']?></p>
               </div>
               </div>
                </div>
                <div id="box-panel">
                <h1 class="welcome">Bảng điều khiển</h1>
                <?
                $list_menu=$this->menu_model->select_query('tblmenuadmin',FALSE,array('menu_visible'=>1,'menu_block'=>1,'privilege_access >= '=>$CI->user['group_level']),FALSE,FALSE,FALSE,array('menu_queu'=>'ASC'));
                foreach($list_menu->result_array() as $menu):
                ?>
                <div class="list-admin"><a href="admin/<?=$menu['menu_url']?>"><img src="<?=$menu['menu_image']?>" width="48" height="48" /><span><?=$menu['menu_title']?></span></a></div>
                <?endforeach;?>
                </div>
                <div class="sub-box">
                    <div class="heading-box">Bài viết mới</div>
                    <div class="content-box">
                        <ul>
                            <?foreach($latest_news->result_array() as $news):?>
                            <li><a href="/admin/article/edit_article/<?=$news['article_id']?>"><?=$news['article_title']?></a><br /><br /><em><?=datetime_vi($news['article_datetime'])?></em></li>
                            <?endforeach;?>
                            
                        </ul>
                    </div>
                </div>
                <div class="sub-box">
                    <div class="heading-box">Sản phẩm mới</div>
                    <div class="content-box">
                    <ul>
                            <?foreach($latest_product->result_array() as $product):?>
                            <li><a href="/admin/product/edit_product/<?=$product['product_id']?>"><img src="<?=$product['product_image']?>" height="50"/><?=$product['product_name']?></a><br /><br /><em><?=datetime_vi($product['product_date'])?></em></li>
                            <?endforeach;?>
                            
                        </ul>
                    </div>
                </div>
                <div class="sub-box">
                    <div class="heading-box">Liên hệ mới</div>
                    <div class="content-box">
                    <ul>
                            <?foreach($latest_contact->result_array() as $contact):?>
                            <li><img width="24" height="24" alt="up" style="float: left;" src="html/resources/images/icons/read_<?=$contact['contact_read']?>.png"/><a href="/admin/contacts/view/<?=$contact['contact_id']?>"><?=advance_substr(20, $contact['contact_content'])?></a><br /><br /><em><?=$contact['contact_user']?> - <?=datetime_vi($contact['contact_datetime'])?></em></li>
                            <?endforeach;?>
                            
                        </ul>
                    </div>
                </div>
               
			</div>
		</div>
        
	<?php
    $this->load->view('back_end/footer'); 
    ?>