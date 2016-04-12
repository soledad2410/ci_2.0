<?php
$this->load->view('back_end/header.php');
?>

<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Danh sách hỗ trợ trực tuyến có trong khối</h5>
            		</div>
               <div class="sub_menu">
             <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_support();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_support();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>

                </div>
                <div class="table">
					<form id="frm_list_support" name="frm_list_support">
					<table>
						<thead>
							<tr>
								<th class="left">Tài khoản hỗ trợ</th>
								<th>Tiêu đề</th>
								<th>Điện thoại hỗ trợ</th>
								<th>Hiển thị</th>
                                <th>Lên</th>
                                <th>Xuống</th>
								<th class="selected last"><input type="checkbox" value="0" class="checkall"/></th>
							</tr>
						</thead>

						<tbody>
                        <?php foreach($supports->result_array() as $support): ?>

							<tr>
								<td class="title">
                                    <p>Yahoo : <strong><?= $support['yahoo']?></strong></p>
                                    <p>Skype : <strong><?= $support['skype']?></strong></p>
                                    <p>Email : <strong><?= $support['support_email']?></strong></p>
                                </td>
								<td class="price"><?=$support['support_title']?></td>
								<td class="date" id="dp1307331808406"><?= $support['support_phone']?></td>
								<td class="category"><img src="html/resources/images/icons/active_<?= $support['support_visible'] ?>.gif" width="16" height="16"/></td>
                                <td class="queu"><?php if($support['support_queu']>$this->plugin_model->get_top('tblsupport','support_queu',array('plugin_id'=>$support['plugin_id']),null,true)){ echo'<a href="javascript:void(0)" onclick="support_up(\''.$support['support_id'].'\',\''.$support['plugin_id'].'\')"><img src="html/resources/images/up.png" width="24" height="24" alt="up"/></a>';}?></td>
                                <td class="queu"><?php if($support['support_queu']<$this->plugin_model->get_top('tblsupport','support_queu',array('plugin_id'=>$support['plugin_id']),null)){ echo'<a href="javascript:void(0)" onclick="support_down(\''.$support['support_id'].'\',\''.$support['plugin_id'].'\')"><img src="html/resources/images/down.png" width="24" height="24" alt="down"/></a>';}?></td>
								<td class="selected last"><input type="checkbox" name="<?= $support['support_id'] ?>" id="<?= $support['support_id'] ?>" value="<?= $support['support_id'] ?>"/></td>
							</tr>
                           <?php endforeach; ?>
						</tbody>
     			    </table>
					<!-- pagination -->

					<!-- end pagination -->
					<!-- table action -->

					<!-- end table action -->
					</form>
                    <div class="pagination pagination-left">
						<div class="results">
							<span>Hiển thị kết quả từ  0-<?= $supports->num_rows() ?> của tổng <?= $supports->num_rows() ?></span>
						</div>


					</div>
				</div>
                <div class="sub_menu">
             <div class="save">
                <a href="<?=$_SERVER['REQUEST_URI']?>#form"><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm mới</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_support();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa</span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="edit_support();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>

                </div>
                <div style="clear: both;"></div>


                </div>
                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Thêm mới hỗ trợ trực tuyến </h5>
				</div>
				<!-- end box / title -->


				<form id="frm_add_support" name="frm_add_support">

				<div class="form">
					<div class="fields">
				
							
							
                            <input type="hidden" id="plugin_id" name="plugin_id" value="<?=$plugin['plugin_id']?>" />
						
                        <a name="form" ></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề hỗ trợ</label>
							</div>
							<div class="input">
							<input type="text" name="support_title" id="support_title"  size="60" />

							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Yahoo</label>
							</div>
							<div class="input">
							<input type="text" name="yahoo"   size="60" />

							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Skype</label>
							</div>
							<div class="input">
							<input type="text" name="skype"   size="60" />

							</div>
						</div>
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại hỗ trợ</label>
							</div>
							<div class="input">
							<input type="text" name="support_phone" />
							</div>

						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Số máy lẻ</label>
							</div>
							<div class="input">
							<input type="text" name="extend_phone" />
							</div>

						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Email hỗ trợ</label>
							</div>
							<div class="input">
							<input type="text" name="support_email" />
							</div>

						</div>

                        <a name="form"></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" id="image_visible" name="support_visible" checked="checked" value="1"/>
							</div>
						</div>


					</div>
				</div>
				</form>

                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="save_add_support();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>


                </div>
				
                <a name="frm_edit"></a>
			</div>

			</div>
            <script type="text/javascript">
            $(function(){
                $('#frm_add_support').submit(function(e){
                    e.preventDefault();
                    save_add_support();
                });
            });
            </script>

<?php
$this->load->view('back_end/footer.php');
?>