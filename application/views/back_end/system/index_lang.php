<?$this->load->view('back_end/header.php');?>

<div id="content">
<div id="box-tabs" class="box">
	<div class="title">
					<h5>Cấu hình gian hàng</h5>
					<ul class="links">
						<li><a href="#box-lang">Quản trị ngôn ngữ</a></li>
						<li><a href="#box-keyword">Quản trị từ điển</a></li>
					</ul>
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
                <form id="frm_add_lang" name="frm_add_lang" method="post" action="admin/system/language.html" onsubmit="return validate_form('frm_add_shopconfig')">
				
                <input type="hidden" name="token" value="<?=$token?>" />
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên ngôn ngữ</label>
							</div>
							<div class="input">
								<input type="text" name="lang_name" class="required_field"  size="40"  />
							</div>
						</div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên rút gọn </label>
							</div>
							<div class="input">
								<input type="text" name="lang_shortname" class="required_field"  size="40"  />
							</div>
					</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ảnh đại diện </label>
							</div>
							<div class="input">
								<input type="text" name="lang_image" id="lang_image" class="required_field"  size="40"  />
                                <input type="button" value="chọn ảnh" onclick="get_ck('lang_image',null,'Images:/lang')"/>
							</div>
					</div>
				        <div class="field">
							<div class="label">
								<label for="autocomplete">Ngôn ngữ hoạt động</label>
							</div>
							<div class="input">
							<input type="checkbox" name="lang_active" value="1"/>
							</div>
						</div>
                   	</div>
			     <div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_add_lang').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
                 </div>
				</form>
            </div>
				<div id="box-keyword">
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
					<form id="frm_list_keyword" name="frm_list_keyword">
					<table>
						<thead>
							<tr>
                             	<th class="left">Tiêu đề từ khóa</th>
                                 <th>Tên từ khóa</th>
						      	 <th>Loại trường</th>
							
                                <th>Xóa</th>
								
							</tr>
						</thead>
                        
						<tbody>
                        <?foreach($keywords->result_array() as $keyword):?>
                        <tr>
                            <td class="title-cate" style="width: 38%!important;padding-left:40px;"><?=$keyword['keyword_title']?></td>
                            <td class="title-module" style="width: 20%;"><?=$keyword['keyword_name']?></td>
                            <td class="title-module" style="width: 10%;"><?=$keyword['keyword_type']?></td>
                            <td class="selected last"><a href="javascript:void(0)" onclick="delete_keyword('<?=$keyword['keyword_id']?>')"><img src="html/resources/images/icons/delete.png"/></a></td>
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
               <form id="frm_add_keyword" name="frm_add_keyword" >
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên từ khóa</label>
							</div>
							<div class="input">
								<input type="text" name="keyword_name" class="required_field"  size="40"  />
							</div>
						</div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề từ khóa </label>
							</div>
							<div class="input">
								<input type="text" name="keyword_title" class="required_field"  size="60"  />
							</div>
					</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Loại trường </label>
							</div>
							<div class="input">
								<select name="keyword_type">
                                <option value="textField">TextField</option>
                                <option value="textArea">Textarea</option>
                                </select>
							</div>
					</div>
				        
                   	</div>
			     <div class="sub_menu">
                <div class="save" >
                <a href="javascript:void(0)" onclick="addKeyword();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                </div>
                 </div>
				</form>
                 
				</div>
				
	</div>
</div>
<?$this->load->view('back_end/footer.php');?>