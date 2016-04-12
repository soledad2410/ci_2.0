<?php
$this->load->view('back_end/header.php'); 
?>
<script type="text/javascript">
$(document).ready(function(){
$("#date-picker").attr('value','<?=date('d-m-Y') ?>');
$("#select_nhasx").change(function(){
  var  logo=$(this).find("option:selected").attr("title");
  if(logo.trim()!=''){
$("#product_nhasxlogo-thumb").html('<img src="'+logo+'" height="70"/>');
$("#product_nhasxlogo").val(logo);
}    else{$("#product_nhasxlogo-thumb").html('');$("#product_nhasxlogo").val(logo);}  
});
$(".search input").bind('keyup',function(e){
        var key=e.keyCode;
        if(key===13){
            load_product();
        }       
    });
$('.left-panel .title').click(function() {
		$(this).next().slideToggle('slow');
	}).next().hide(); 
    })
</script>
	<div id="content">
			<div class="box">
				<div class="title"> 
					<h5>Gian hàng</h5>
                    <div class="search">
							<div class="input">
								<input type="text" id="search" name="search" value="<?= $this->input->get('keyword') ?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_shop()" />
							</div>
					</div>
                    <div class="search">
						<div class="input">
								<select id="shoptype">
                                <option value="0">--Chọn loại shop--</option>
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
                <div class="save" >
                <a href="admin/product/index.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a> 
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_product();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
                 <div class="save">
                <a href="javascript:void(0)" onclick="reset_form('frm_add_product');"><img src="html/resources/images/reset.png" width="32px" height="32px"/><br />
                <span>Làm lại</span>
                </a>
                </div>
                                
                </div>
  		     <form id="frm_add_shop" name="frm_add_shop" method="post" action="admin/shop/add_shop.html" onsubmit="return validate_form_shop('frm_add_product')"  >
                <div class="left-panel">
                	<div class="title">
	                   <h6>Thông tin gian hàng</h6>
				</div>
                <?=$message?>
				<div class="fields" style="display: block;">
						<div class="field">
							<div class="label">
								<label for="input-medium">Tên gian hàng</label>
							</div>
							<div class="input">
								<input type="text" id="shop_name" name="shop_name" class="required_field" size="50" />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="input-medium">Tiêu đề (slogan) gian hàng</label>
							</div>
							<div class="input">
								<input type="text" id="shop_title" name="shop_title" class="required_field" size="50" />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="select">Chọn gói gian hàng</label>
							</div>
							<div class="select">
								<select id="shoptype_id" name="shoptype_id" >
                                <option value="0">--Chọn gói gian hàng--</option>
								</select>
							</div>
						</div>
                        </div>
                         	<div class="title">
	                   <h6>Thông tin khác</h6>
				</div>
                        <div class="fields">
						<div class="field">
							<div class="label">
								<label for="file">Banner gian hàng</label>
							</div>
							<div class="input">
								<input type="text"  id="shop_banner" name="shop_banner" size="40"  />
                                <input type="button" class="button browse" value="Chọn ảnh" onclick="get_ck('shop_banner')" /><br />
                                <div id="shop_banner-thumb" class="shop_banner">
                                </div>
							</div>
						</div>
                    	<div class="field">
							<div class="label ">
								<label for="textarea">Mô tả gian hàng</label>
							</div>
							<div class="textarea textarea-editor">
								<textarea id="product_summary" name="product_summary" name="textarea" cols="20" rows="10" ></textarea>
                            </div>
						</div>
                   	</div>
                    <div class="title">
	                   <h6>Thông tin khác 2</h6>
				</div>
                <div class="fields">
						<div class="field">
							<div class="label">
								<label for="file">Banner gian hàng</label>
							</div>
							<div class="input">
						</div>
						</div>
                        
						<div class="field">
							<div class="label ">
								<label for="textarea">Mô tả gian hàng</label>
							</div>
							<div class="textarea">
							</div>
						</div>
                        		
                 	</div>
			</div>
                <div class="right-panel">
                           	<div class="title">
	       <h6>Tùy chọn sản phẩm</h6>
           </div>
           <div class="fields">
           <div class="field">
           <div class="label"  >Hiển thị sản phẩm</div>
           <div class="input"><div class="checkboxes">
								<div class="checkbox">
									<input type="checkbox" checked="checked" id="product_visible" value="1" name="product_visible"  />
									<label for="checkbox-1">Hiển thị</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="product_home" value="1" name="product_home"  />
									<label for="checkbox-2">Trang chủ</label>
								</div>
								<div class="checkbox">
									<input type="checkbox" id="product_hot" name="product_hot" value="1"  />
									<label for="checkbox-3">sản phẩm hot</label>
								</div>
                                <div class="checkbox">
									<input type="checkbox" id="product_bestsell" name="product_bestsell" value="1"  />
									<label for="checkbox-3">sản phẩm bán chạy</label>
								</div>
							</div>
                            </div>
                            </div>
            <div class="field">
           <div class="label" >Bình luận</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" id="product_comment" value="1" name="product_comment"  />
									
								</div></div>
                            </div>
                            <div class="field">
           <div class="label" >Nhóm thành viên bình luận</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" name="article_comment_privilege[]" value="0" />Tất cả
								</div>
                                </div>
                            </div>
                             <div class="field">
           <div class="label" >Cho phép đánh giá</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" id="product_rate" value="1" name="product_rate"  />
									
								</div></div>
                            </div>
                            <div class="field">
           <div class="label" >Còn hàng</div>
           <div class="input"><div class="checkbox">
									<input type="checkbox" id="product_status" value="1" name="product_status"  />
									
								</div></div>
                            </div>
                            <div class="field">
           <div class="label" >Giá sản phẩm</div>
           <div class="input"><input type="text" onchange="$('#product_saleoff').val(this.value)" name="product_price" id="product_price" size="15" value="1"/>vnd (ví dụ 100.000)</div>
                            </div>
                            <div class="field">
           <div class="label" >Giá khuyến mãi</div>
           <div class="input"><input type="text" name="product_saleoff" id="product_saleoff" size="15" value=""/>vnd (ví dụ 100.000)</div>
                            </div>
                            <div class="field">
           <div class="label" >Bảo hành</div>
           <div class="input"><input type="text" name="product_warranty" id="product_warranty" value=""/></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta title</div>
           <div class="input"><textarea name="product_metatitle" id="product_metatitle" cols="26" rows="3"></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta keyword</div>
           <div class="input"><textarea name="product_keyword" id="product_keyword" cols="26" rows="3"></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta description</div>
           <div class="input"><textarea name="product_metadesc" id="product_metadesc" cols="26" rows="3"></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >Nhà sản xuất</div>
           <div class="input">
                            <select id="select_nhasx" name="product_nhasx">
                            <option value="" title="">--Chọn thương hiệu sản phẩm--</option>
                            
                            </select>
                          <input type="text" id="nhasx" name="new_nhasx" size="26" style="display: none;" /><br />
                              <input type="checkbox" id="new_nhasx" name="input_new" value="1" onclick="input_nhasx()" />Nhập mới
                                </div>
                            </div>
                            <div class="field logo">
           <div class="label" >logo nhà sản xuất</div>
           <div class="input"><input type="text" id="product_nhasxlogo" readonly="true" size="25" name="product_nhasxlogo" value="" /><br /><input type="button" class="button browse" onclick="get_ck('product_nhasxlogo')" value="chọn logo" /><br />
           <div id="product_nhasxlogo-thumb" class="images-thumb"><img src="" height="70"/></div>
           </div>
            </div>
                 </div>  
				</div>
               </form>
               <div style="clear: both;"></div>
                <div class="sub_menu">
                <div class="save">
                <a href="admin/product/index.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a> 
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_product();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
                 <div class="save">
                <a href="javascript:void(0)" onclick="reset_form('frm_add_product');"><img src="html/resources/images/reset.png" width="32px" height="32px"/><br />
                <span>Làm lại</span>
                </a>
                </div>
               </div>
                </div>
          	</div>

	<?php
    $this->load->view('back_end/footer'); 
    ?>