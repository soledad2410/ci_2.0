<?php
$this->load->view('back_end/header.php');
?>
  <div id="content">
  <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Sửa thông tin loại sản phẩm</h5>
				</div>
                <div class="sub_menu">
                <div class="save" >
                <a href="admin/product/properties.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>

                </div>

                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_product_type').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
            </div>
<form id="frm_edit_product_type" name="frm_edit_product_type" method="post" action="">

				<div class="form">
                <div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tên loại sản phẩm</label>
							</div>
							<div class="input">
								<input type="text" id="producttype_name" name="producttype_name" class="required_field"  size="40" value="<?=$type['producttype_name']?>"  />
							</div>
				            </div>
                            <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả</label>
							</div>
                            <input type="hidden" name="producttype_id" value="<?=$type['producttype_id']?>" />
							<div class="input">
								<textarea name="producttype_description"  cols="50" rows="3"><?=$type['producttype_description']?></textarea>
							</div>
				            </div>
                            <div class="field">
							<div class="label">
								<label for="autocomplete">Thêm thuộc tính và nhóm thuộc tính sản phẩm</label>
							</div>
							<div class="input" style="margin-left: 320px;">
							<img title="Thêm mới thuộc tính" src="html/resources/images/icons/add.png" width="24" height="24" onclick="addProductAttr('0')" style="cursor: pointer;" />
                    		</div>
						</div>
                        <div class="product_properties">

                        <?=$this->product_model->load_attr_recursive_view($type['producttype_id'], 0);?>

                        </div>

					</div>
				</div>
				</form>
                <div class="sub_menu">
                <div class="save" >
                <a href="admin/product/properties.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>

                </div>

                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_product_type').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>
            </div>
    </div>
</div>
</body>
</html>