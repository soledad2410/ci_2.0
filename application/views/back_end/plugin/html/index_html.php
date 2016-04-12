<?php
$this->load->view('back_end/header.php');
?>

<div id="content">
			<!-- table -->

                <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Quản trị khối nội dung mã nhúng</h5>
				</div>
		       <div class="sub_menu">
               <div class="save" >
                <a href="admin/plugin.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
              </div>
               <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_edit_html').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
              </div>

           </div>
           <?=$message?>
				<form id="frm_edit_html" name="frm_edit_html" method="post" action="">

				<div class="form">

					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề khối nội dung</label>
							</div>
							<div class="input">
								<input type="text"   size="40" value="<?=$plugin['plugin_title']?>" disabled="disabled"  />
							</div>
                            <input type="hidden" id="plugin_id" name="plugin_id" value="<?=$plugin['plugin_id']?>" />
						</div>


                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mã nhúng</label>
							</div>
							<div class="input">
							<textarea name="embed_code"><?=$plugin['embed_code']?></textarea>
                            <script type="text/javascript">
                            initCKeditor('embed_code', null, null, '200px');
                            </script>
							</div>

						</div>
                    </div>
				</div>
				</form>

                <div class="sub_menu">
                <div class="save" >
                <a href="admin/plugin.html"><img src="html/resources/images/icons/back.png" width="32px" height="32px"/><br />
                <span>Quay lại</span>
                </a>
              </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_edit_html').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>


                </div>

			</div>

			</div>

<?php
$this->load->view('back_end/footer.php');
?>