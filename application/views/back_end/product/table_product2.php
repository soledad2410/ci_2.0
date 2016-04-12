  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
        <base href="<?= base_url()?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <script type="text/javascript">
        var base_url='<?= base_url()?>';
        </script>
			<link rel="stylesheet" type="text/css" href="html/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style_full.css" />
        <link id="color" rel="stylesheet" type="text/css" href="html/resources/css/colors/<?=$_SESSION['skin']?>.css" />
		<script src="html/resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.menu.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.table.js" type="text/javascript"></script>
        <script src="html/resources/scripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.dialog.js" type="text/javascript"></script>
       <script type="text/javascript" src="html/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="html/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    	<link rel="stylesheet" type="text/css" href="html/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        <script src="html/resources/scripts/common.js" type="text/javascript"></script>
        
        <style type="text/css">
        #content{
            margin:0!important;
            min-height: 0!important;
            border:1px silver solid;
        }
        #content div.box{
            margin:0!important;
        }
        span.prod-name{float:left;margin-left:10px;}
        </style>
  </head>
  <body>
  <div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách Sản phẩm</h5>
                    <div class="search">
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_table2_product()" />
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
                </div>
                <div class="sub_menu">
                <?foreach($product_in_block->result_array() as $product):?>
                <span class="prod-name" title="<?=$product['product_id']?>"><?=$product['product_name']?></span>
                <?endforeach;?>
               </div>
  		        <div class="table">
					<form id="frm_list_product" name="frm_list_product">
					<table>
						<thead>
							<tr>
								<th class="left">Tên sản phẩm</th>
                                <th>Danh mục</th>
								<th>Ảnh sản phẩm</th>
								<th>Ngày cập nhập</th>
								<th>Giá</th>
                                <th>Hiển thị</th>
                                <th class="selected last"></th>
							</tr>
						</thead>
                    	<tbody>
                        <?foreach($products->result_array() as $product): ?>
                                <tr>
								<td class="title" style="width: 20%;"><div class="prod-name" title="<?=$product['product_id']?>"><?=$product['product_name']?></div></td>
                                <td class="title" style="width: 10%;"><a href="<?=base_url()?>admin/plugin/product/<?=$plugin_id?>.html?cate=<?=$product['menu_id']?>"><?=$product['menu_title']?></a></td>
								<td class="price"><img src="<?php echo $product['product_image'] ?>" height="30" /></td>
								<td class="date" id="dp1307331808406"><?php echo date('H:m d-m-Y',$product['product_date']) ?></td>
								<td class="category"><?php echo number_format($product['product_price'],0,'.','.') ?>VND</td>
                                <td class="queu"><img src="html/resources/images/icons/active_<?=$product['product_visible']?>.gif" width="16" height="16" alt="visible"/></td>
                                
                                <td class="selected last"><input type="checkbox"  name="<?= $product['product_id'] ?>" value="<?= $product['product_id'] ?>" onclick="add_to_block(this)"  <?=in_array($product['product_id'],$block_id_array)?'checked="checked"':''?>/></td>
							</tr>
                           <? endforeach; ?> 
						</tbody>
     			    </table>
                    
                    </form>
                    <input type="hidden" id="block_content" value="<?=$block_content?>" />
                    <input type="hidden" id="plugin_id" value="<?=$plugin_id?>" />
                    <div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả <?= $result_from?>-<?= $result_to ?> của tổng <?= $total ?>/<?=$all_product?></span>
						</div>
                        <span style="float: left;margin-left: 10px;"><select id="num-page" onchange="load_table2_product()" >
                          <option value="10">10</option>
                          <option value="20" <?php if($this->input->get('limit')==20){echo'selected="selected"';} ?>>20</option>
                          <option value="30" <?php if($this->input->get('limit')==30){echo'selected="selected"';} ?>>30</option>
                          <option value="40" <?php if($this->input->get('limit')==40){echo'selected="selected"';} ?>>40</option>
                          </select></span>
                          <input type="hidden" id="current_page" value="<?php echo $current_page ?>" />
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
                </div>
                </div>
            </div>
</body>
</html>