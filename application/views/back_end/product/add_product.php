<?php
$this->load->view('back_end/header.php');
?>
<link rel="stylesheet" href="html/resources/scripts/colorpicker/css/colorpicker.css" type="text/css" />
<link rel="stylesheet" href="html/resources/scripts/colorpicker/css/layout.css" type="text/css" />
<script type="text/javascript" src="html/resources/scripts/colorpicker/js/colorpicker.js"></script>
<script type="text/javascript" src="html/resources/scripts/colorpicker/js/eye.js"></script>
<script type="text/javascript" src="html/resources/scripts/colorpicker/js/utils.js"></script>
<script type="text/javascript" src="html/resources/scripts/colorpicker/js/layout.js?ver=1.0.2"></script>
<script type="text/javascript">
$(document).ready(function(){
$("#date-picker").attr('value','<?=date('d-m-Y')?>');
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
$("#box-tabs").tabs();
$('#check-other-product-warranty').click(function(){
    if($(this).is(':checked')){
        $('#product_warranty').attr('disabled','disabled');
        $('#other_product_warranty').removeAttr('disabled');
    }
    else{
        $('#other_product_warranty').attr('disabled','disabled');
        $('#product_warranty').removeAttr('disabled');
    }
});
});
</script>


		<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh mục sản phẩm</h5>

                    <div class="search">

							<div class="input">
								<input type="text" id="search" name="search" value="<?=$this->input->get('keyword')?>" />
							</div>
							<div class="button">
								<input type="submit" name="submit" value="Xác nhận" onclick="load_product()" />
							</div>

					</div>
                    <div class="search">

							<div class="input">
								<select id="menu">
                                <option value="0">--Chọn danh mục--</option>
                                <?=$menu?>
                                </select>
							</div>
				</div>
                <div class="search">

							<div class="input">
							<span style="color: white;">Giá tới</span> <input type="text" id="max_price"  />
							</div>
				</div>
                <div class="search">

							<div class="input">
							<span style="color: white;">Giá từ</span> <input type="text" id="min_price"  />
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
                <a href="javascript:void(0)" onclick="$('form#frm_add_product').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>
                 <div class="save">
                <a href="javascript:void(0)" onclick="reset_form('frm_add_product');"><img src="html/resources/images/reset.png" width="32px" height="32px"/><br />
                <span>Làm lại</span>
                </a>
                </div>

                </div>
                <div class="box" id="box-tabs">
                <div class="title">
					<h5>Thông tin thêm mới sản phẩm</h5>

				</div>
  		    	<form id="frm_add_product" name="frm_add_product" method="post" action="admin/product/add_product.html" onsubmit="return validate_form_product('frm_add_product')"  >

                <div id="box-info" class="box" >
                <div class="left-panel">
                	<div class="title">
	<h6>Thông tin thêm sản phẩm</h6>
				</div>
                <?=$message?>

				<div class="form">
					<div class="fields">

                        <div class="group-tab">
						<div class="field">
							<div class="label">
								<label for="input-medium">Tên sản phẩm</label>
							</div>
							<div class="input">
								<input type="text" id="product_name" name="product_name" class="required_field" value="<?=$copy['product_name']?>" size="50" />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="input-medium">Mã sản phẩm</label>
							</div>
							<div class="input">
								<input type="text" id="product_code" name="product_code" class="required_field" value="<?=$copy['product_code']?>" size="50" />
							</div>
						</div>

						<div class="field">
							<div class="label">
								<label for="date">Ngày tháng:</label>
							</div>
							<div class="input">
								<input type="text" id="date-picker"  name="product_date" class="date" />
							</div>
						</div>
						<div class="field">
                               <div class="label">
                                <label for="input">Danh mục sản phẩm</label>
                               </div>
							<div class="input">

                            <select name="menu_id" size="10" class="form-control" style="width: 250px;">
                                <?
foreach ($trees as $root):
	if ($root['module_name'] == 'product_cate'):
	?>
		                                <option value="<?=$root['menu_id']?>"><strong><?=$root['menu_title']?></strong></option>
		                                    <?if (isset($root['childs'])): $lv2 = $root['childs'];?>

				                                    <?foreach ($lv2 as $cate): ?>
				                                    <option value="<?=$cate['menu_id']?>" <?=$cate['module_name'] != 'product_cate' ? 'disabled' : '';?>>-- <?=$cate['menu_title']?></option>

				                                              <?if (isset($cate['childs'])): $lv3 = $cate['childs'];?>

						                                                    <?foreach ($lv3 as $cate): ?>
						                                                        <option value="<?=$cate['menu_id']?>" <?=$cate['module_name'] != 'product_cate' ? 'disabled' : '';?>>---- <?=$cate['menu_title']?></option>
						                                                    <?endforeach;?>

				                                                 <?endif;?>

		                                    <?endforeach;?>

                                   <?endif;?>
                                   <?endif;?>

                                <?endforeach;?>

                            </select>
                         	</div>
						</div>
                    </div>
                        <div class="field">
							<div class="label">
								<label for="file">Ảnh đại diện</label>
							</div>
							<div class="input">
								<input type="text" id="product_image" name="product_image" size="40"  />
                                <input type="button" class="button browse" value="Chọn ảnh" onclick="get_ck('product_image')" /><br />
                                <div id="product_image-thumb" class="images-thumb">
                                </div>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="input-medium">Đơn vị</label>
							</div>
							<div class="input">
								<input type="text" name="unit" size="40"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="input-medium">Kích thước</label>
							</div>
							<div class="input">
								<input type="text" id="product_size" name="product_size" size="40"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="input-medium">Hướng dẫn sử dụng</label>
							</div>
						<div class="textarea textarea-editor">
								<textarea id="product_address" name="product_address" name="textarea" cols="20" rows="5" ></textarea>
							</div>
						</div>
                        <div class="field">
           <div class="label">Hình ảnh khác</div>
           <div class="input">
           	<input type="text" id="product_other_image" name="product_other_image" size="40" value=""  />
           <input type="button" class="button browse" onclick="get_ck('product_other_image',true)" value="chọn ảnh" />
           <div style="clear: both;"></div>
           <div id="product_other_image-thumb" class="images-thumb">
           </div>
           </div>

                </div>

						<div class="field">
							<div class="label ">
								<label for="textarea">Thông tin tóm tắt sản phẩm</label>
							</div>
							<div class="textarea textarea-editor">
								<textarea id="product_summary" name="product_summary" name="textarea" cols="20" rows="5" ></textarea>

							</div>
						</div>

                        <div class="field">
                            <p align="center" >Chi tiết sản phẩm</p>
    						<textarea name="product_details" ></textarea>
                            <script type="text/javascript">initCKeditor('product_details',null,'98%','250px')</script>
                  		</div>


					</div>

				</div>

                </div>
                <div class="right-panel">
               	<div class="title">
	       <h6>Thông tin khác</h6>
           </div>
           <div class="fields">
           <div class="field">
           <div class="label"  >Hiển thị</div>
           <div class="input"><div class="checkboxes">
								<div class="checkbox">
									<input type="checkbox" checked="checked" id="product_visible" value="1" name="product_visible" onclick="product_active()"  />
									<label for="checkbox-1">Hiển thị</label>
								</div>

								<div class="checkbox">
									<input type="checkbox" id="product_hot" name="product_hot" value="1"  />
									<label for="checkbox-3">Sản phẩm nổi bật</label>
								</div>
                                <div class="checkbox">
									<input type="checkbox" id="product_bestsell" name="product_bestsell" value="1"  />
									<label for="checkbox-3">Sản phẩm bán chạy</label>
								</div>

							</div>
                            </div>
             </div>

            <div class="fields">

             <div class="title">
	       <h6>Giá</h6>
           </div>
            <div class="fields">
           <div class="label" >Giá (vnđ )</div>
           <div class="input"><input type="text" onchange="$('#product_saleoff').val(this.value)" name="product_price" id="product_price" size="15" value="<?=(number_format($copy['product_price'], 0, '.', '.'))?>"/></div>
                            </div>
                            <div class="field">
           <div class="label" >VAT(%)</div>
           <div class="input"><input type="text" name="product_vat" id="product_vat" size="15"  value="10"/>%</div>
                            </div>

                            <div class="field">
							<div class="label">
								<label for="select">Nhà sx</label>
							</div>
							<div class="input">
							<input name="product_nhasx" size="20" />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="select">Màu men (Loại sản phẩm)</label>
							</div>
							<div class="input">
							<select name="producttype_id">
                            <?foreach($types->result_array() as $type):?>
                                <option value="<?=$type['producttype_id']?>"><?=$type['producttype_name']?></option>
                            <?endforeach;?>
                            </select>
							</div>
						</div>
                        
                        <div class="field">
							<div class="label">
								<label for="select">Chất liệu</label>
							</div>
							<div class="input">
							<input name="product_material" size="20" />
							</div>
						</div>
                </div>
             <div class="title">
	       <h6>Vị trí</h6>
           </div>
            <div class="fields">
                            <div class="field">
           <div class="label" >Tỉnh - Thành phố</div>
           <div class="input"><select id="city" name="city_id">
           <option>Chọn Tỉnh - Thành Phố</option>
            <?foreach ($cities->result_array() as $city): ?>
            <option value="<?=$city['region_id']?>"><?=$city['region_name']?></option>
            <?endforeach;?>

           </select></div>

                            </div>
                            <div class="field">
           <div class="label" >Quận - Huyện</div>
           <div class="input"><select id="district" name="location_id" >

           </select></div>

                            </div>


            </div>
                       <div class="title">
	       <h6>Bảo hành</h6>
           </div>
            <div class="fields">
                            <div class="field">
           <div class="label" >Chon</div>
           <div class="input"><select name="product_warranty" id="product_warranty">
           <option value="5">5  năm</option>
           <option value="10">10 năm</option>
           <option value="15">15 năm</option>
           <option value="24">24 năm</option>
           </select></div>

                            </div>
                            <div class="field">
                            <div class="label">Khác (tháng)</div>
                            <div class="input"><input type="text" name="other_product_warranty" id="other_product_warranty" disabled="disabled" />
                            <input type="checkbox" id="check-other-product-warranty" />
                            </div>
                            </div>
            </div>
                                   <div class="title">
	       <h6>Khác</h6>
           </div>
            <div class="fields">
                            <div class="field">
           <div class="label" >Meta title</div>
           <div class="input"><textarea name="product_metatitle" id="product_metatitle" cols="26" rows="2"></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta keyword</div>
           <div class="input"><textarea name="product_keyword" id="product_keyword" cols="26" rows="2"></textarea></div>
                            </div>
                            <div class="field">
           <div class="label" >Meta description</div>
           <div class="input"><textarea name="product_metadesc" id="product_metadesc" cols="26" rows="2"></textarea></div>
                            </div>


</div>
				</div>
                </div>
                </div>
                <div style="clear: both;"></div>





                </form>
                </div>
                <div class="sub_menu">
                <div class="save">
                <a href="admin/product/index.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_product').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
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
		</div>
		<!-- end content -->
		<!-- footer -->
        <script type="text/javascript">
        $(function(){
            $('#city').change(function(){
               var city_id = $(this).val();
               $.get('/admin/address/load_district/' + city_id, {}, function(rs){
                var html = '';
                    for(var i in rs){
                        html += '<option value="'+rs[i].region_id+'">'+rs[i].region_name+'</option>';
                    }
                    $('select#district').html(html);
               },'json');
            });
            $('#check-other-producttype').click(function(){
                if($(this).is(':checked')){
                    $('#other_producttype').removeAttr('disabled');
                    $('#producttype_id').attr('disabled','disabled');
                } else{
                 $('#other-producttype').attr('disabled');
                    $('#producttype_id').removeAttr('disabled','disabled');
                }
            });
        })
        </script>
	<?php
$this->load->view('back_end/footer');
?>