<?php
$this->load->view('back_end/header.php');
?>

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
								<input type="submit" name="submit" value="Xác nhận" onclick="load_product()" />
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
							<span style="color: white;">Giá tới</span> <input type="text" id="max_price" value="<?php echo $this->input->get('max') ?>"  />
							</div>
				</div>
                <div class="search">

							<div class="input">
							<span style="color: white;">Giá từ</span> <input type="text" id="min_price" value="<?php echo $this->input->get('min') ?>"   />
							</div>
				</div>
				</div>

                <div class="sub_menu">
               <div class="save">
                <a href="admin/product/add_product.html" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_product();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_product();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa </span>
                </a>
                </div>
                </div>

				<!-- end box / title -->

                <div class="table">
					<form id="frm_list_product_type" name="frm_list_product_type">
					<table>
						<thead>
							<tr>
								<th class="left">Mã loại sản phẩm</th>
								<th>Tên loại sản phẩm</th>
                                <th>Mô tả</th>
                                <th>Sửa</th>
                                <th>Xóa</th>
								<th class="selected last"><input type="checkbox" class="checkall"/></th>
							</tr>
						</thead>

						<tbody>
                        <?php

                        foreach($producttype->result_array() as $type):
                        $total_product=$this->product_model->select_query('tblproduct','product_id',array('producttype_id'=>$type['producttype_id']))->num_rows();
                        ?>

							<tr>
								<td class="title" style="width: 10%;"><?=$type['producttype_id']?></td>
								<td class="price" style="width: 20%;"><?=$type['producttype_name']?><span style="color: red;">(<?=$total_product?>)</span></td>
								<td class="price" style="width: 20%;"><?=$type['producttype_description']?></td>

                                <td class="queu"><a href="javascript:void(0)" onclick="edit_producttype('<?=$type['producttype_id']?>')"><img src="html/resources/images/edit.png" width="24" height="24" alt="edit"/></a></td>
                                <td class="queu"><a href="javascript:void(0)" onclick="delete_producttype('<?=$type['producttype_id']?>')"><img src="html/resources/images/delete.png" width="24" height="24" alt="delete"/></a></td>
                                <td class="selected last"><input type="checkbox"  name="<?= $type['producttype_id'] ?>" value="<?= $type['producttype_id'] ?>" /></td>
							</tr>
                           <?php endforeach; ?>
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
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_producttype();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_producttype();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa </span>
                </a>
                </div>
                </div>
                <div style="clear: both;"></div>

                </form>

                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới loại sản phẩm</h5>
				</div>
				<!-- end box / title -->

                   <div class="sub_menu">
                <div class="save" >
                <a href="admin/product.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>

                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_productproperties').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>


                </div>
				<form id="frm_add_productproperties" name="frm_add_productproperties" method="post" action="">
                <input type="hidden" name="token" value="<?=$token?>" />
				<div class="form">
                <div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tên loại sản phẩm</label>
							</div>
							<div class="input">
								<input type="text" id="producttype_name" name="producttype_name" class="required_field"  size="40"  />
							</div>
				            </div>
                            <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả</label>
							</div>
							<div class="input">
								<textarea name="producttype_description"  cols="50" rows="3"></textarea>
							</div>
				            </div>
                            <div class="field">
							<div class="label">
								<label for="autocomplete">Thêm thuộc tính sản phẩm</label>
							</div>
							<div class="input" style="margin-left: 320px;">
							<img title="Thêm mới thuộc tính" src="html/resources/images/icons/add.png" width="24" height="24" onclick="add_product_properties()" style="cursor: pointer;" />
                    		</div>
						</div>
                        <div class="product_properties" style="float: left;width: 100%;">
                    </div>

					</div>
				</div>

				</form>
                <div class="sub_menu">
                <div class="save" >
                <a href="admin/product.html" ><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>

                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_productproperties').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>



                </div>
			</div>
			</div>

<?php
$this->load->view('back_end/footer.php');
?>