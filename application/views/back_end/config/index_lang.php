<?$this->load->view('back_end/header.php');?>
<script type="text/javascript">
			$(document).ready(function () {
	       	$("#box-tabs").tabs();
			});
		</script>
<div id="content">
<div id="box-tabs" class="box">
	<div class="title">
					<h5>Cấu hình Ngôn ngữ website</h5>
					
				</div>
		<div id="box-lang" class="box">
			<div class="sub_menu">
               <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_lang();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_lang();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
  		       <div class="table">
					<form id="frm_list_lang" name="frm_list_lang">
					<table>
						<thead>
							<tr>
                                
								<th class="left">Tên ngôn ngữ</th>
                                 <th>Ảnh đại diện</th>
						      	 <th>viết tắt</th>
								<th>Mặc định</th>
                                <th>Hoạt động</th>
                                <th>Xóa</th>
								
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($languages->result_array() as $lang):?>
                        <tr>
                            <td class="title-cate" style="width: 38%!important;padding-left:40px;"><a href="javascript:void(0)" onclick="edit_lang('<?=$lang['lang_id']?>')"><?=$lang['lang_name']?></a></td>
                            <td class="title-module"><img src="<?=$lang['lang_image']?>" height="20"/></td>
                            <td class="title-module" style="width: 10%;"><?=$lang['lang_shortname']?></td>
                            <td class="title-module" style="width: 20%;"><a href="javascript:void(0)" onclick="lang_default('<?=$lang['lang_id']?>')"><img src="html/resources/images/icons/active_<?=$lang['lang_default']?>.png"/></a></td>
                            <td style="text-align: center;" style="width: 20%;"><a href="javascript:void(0)" onclick="lang_active('<?=$lang['lang_id']?>')"><img src="html/resources/images/icons/active_<?=$lang['lang_active']?>.png"/></a></td>
                            <td class="selected last"><a href="javascript:void(0)" onclick="delete_lang('<?=$lang['lang_id']?>')"><img src="html/resources/images/icons/delete.png"/></a></td>
                        </tr>
                         <? endforeach;?>
                      </tbody>
     			    </table>
				
					</form>
				</div>
                <div class="sub_menu">
              <div class="sub_menu-notice">
                <img src="html/resources/images/icons/notice.png" width="32" height="32"/>
                </div>
               <div class="save" >
                <a href="javascript:void(0)" onclick="edit_config();"><img src="html/resources/images/edit.png" width="32px" height="32px"/><br />
                <span>Sửa</span>
                </a>
                </div>
                <div class="save" >
                <a href="<?=$_SERVER['REQUEST_URI']?>#form" ><img src="html/resources/images/add.png" width="32px" height="32px"/><br />
                <span>Thêm </span>
                </a>
                </div>
                <div class="save" >
                <a href="javascript:void(0)" onclick="delete_config();"><img src="html/resources/images/delete.png" width="32px" height="32px"/><br />
                <span>Xóa </span>
                </a>
                </div>
               </div>
                <div style="clear: both;"></div>
                <?=$message?>
                <div class="title">
					<h5>Từ điển website</h5>
				</div>
                <form id="frm_dictionary" name="frm_dictionary" method="post" action="admin/config/language.html" onsubmit="return validate_form('frm_dictionary')">
				<div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_dictionary').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
                 </div>
                <input type="hidden" name="token" value="<?=$token?>" />
					<div class="fields">
                    <?foreach($keywords->result_array() as $keyword):?>
                    <div class="field">
							<div class="label" style="width: 50%!important;">
								<?=$keyword['keyword_title']?> (<?=$keyword['keyword_name']?>)
							</div>
							<div class="input">
                               <?if($keyword['keyword_type']=='textField'):?>
								<input type="text" name="<?=$keyword['keyword_id']?>"   size="50" value="<?=form_prep($this->menu_model->get_by_key('tbllangkeyword','keyword_value',NULL,NULL,array('lang_id'=>$lang_id,'keyword_id'=>$keyword['keyword_id'])));?>" />
                                <?else:?>
                                <textarea cols="50" rows="2" name="<?=$keyword['keyword_id']?>"><?=form_prep($this->menu_model->get_by_key('tbllangkeyword','keyword_value',NULL,NULL,array('lang_id'=>$lang_id,'keyword_id'=>$keyword['keyword_id'])));?></textarea>
                                <?endif;?>
							</div>
						</div>
                      <?endforeach;?>  
                    	</div>
			     <div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_dictionary').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
                 </div>
				</form>
            </div>
				
				
	</div>
</div>
<?$this->load->view('back_end/footer.php');?>