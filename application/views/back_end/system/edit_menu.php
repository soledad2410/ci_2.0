 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Sửa thông tin danh mục quản trị</title>
        <base href="<?= base_url()?>" />
        <script type="text/javascript">
        var base_url='<?=base_url()?>';
        </script>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="html/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style_full.css" />

		<link id="color" rel="stylesheet" type="text/css" href="html/resources/css/colors/blue.css" />
		<!-- scripts (jquery) -->
		<script src="html/resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		<!--[if IE]><script language="javascript" type="text/javascript" src="resources/scripts/excanvas.min.js"></script><![endif]-->
		<script src="html/resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<!-- scripts (custom) -->
		<script src="html/resources/scripts/smooth.js" type="text/javascript"></script>


		<script src="html/resources/scripts/smooth.table.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.form.js" type="text/javascript"></script>

        <script type="text/javascript" src="html/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="html/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    	<link rel="stylesheet" type="text/css" href="html/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        <script src="html/resources/scripts/common.js" type="text/javascript"></script>
        <script type="text/javascript" src="asset/ckeditor/ckeditor.js"></script>
        <style type="text/css">
        #content{
            margin:0!important;
            min-height: 0!important;
            border:1px silver solid;
        }
        #content div.box{
            margin:0!important;
        }
        </style>
  </head>
  <body>
  <div id="content">
<div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Sửa thông tin danh mục </h5>
				</div>
				<!-- end box / title -->

                  <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_adminmenu();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>

                </div>


                </div>
                <?=$message?>
				<form id="frm_edit_adminmenu" name="frm_edit_adminmenu"  method="post" action="<?=base_url()?>admin/system/edit_menu/<?=$menu['menu_id']?>.html">
				<div class="form">
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề danh mục</label>
							</div>
							<div class="input">
								<input type="text" id="menu_title" name="menu_title" class="required_field" value="<?=$menu['menu_title']?>"  size="40"  />
							</div>
				</div>
                     <div class="field">
							<div class="label">
								<label for="autocomplete">Link quản trị</label>
							</div>
							<div class="input">
								<input type="text" id="menu_url" name="menu_url" class="required_field" value="<?=$menu['menu_url']?>"   size="60"  />
							</div>
				</div>
                <div class="field">
							<div class="label">
							<label for="autocomplete">Khối danh mục</label>
							</div>
							<div class="input">
							<select id="menu_block" name="menu_block">
                            <option value="0" <?=($menu['menu_block']==0)?'selected="selected"':'';?>>TopMenu</option>
                             <option value="1" <?=($menu['menu_block']==1)?'selected="selected"':'';?>>HomeTask</option>
                            </select>
							</div>
				</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Danh mục cha</label>
							</div>
							<div class="input">
							<select id="parent_id" name="parent_id" disabled="disabled" >
                            <option value="0" <?=($menu['parent_id']==0)?'selected="selected"':'';?>>Danh mục gốc</option>
                             <?foreach ($menus->result_array() as $cate):?>
                             <option value="<?=$cate['menu_id']?>" <?=($menu['parent_id']==$cate['menu_id'])?'selected="selected"':'';?>><?=$cate['menu_title']?></option>
                             <?endforeach;?>
                            </select>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Ảnh đại diện (nếu có)</label>
							</div>
							<div class="input">
								<input type="text" name="menu_image" id="menu_image"  size="40" value="<?=$menu['menu_image']?>"  />
                                 <input type="button" value="Chọn ảnh" onclick="get_ck('menu_image')" />
							</div>
				        </div>
                        <input type="hidden" name="action" value="edit_menu"/>
                        <a name="form"></a>

                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" id="menu_visible" <?=($menu['menu_visible']==1)?'checked="checked"':'';?> name="menu_visible" value="1"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mức truy cập(1-3) </label>
							</div>
							<div class="input">
								<input type="text" class="number_field" name="privilege_access" value="<?=$menu['privilege_access']?>"/>
							</div>
						</div>
                        <input type="hidden" name="menu_id" value="<?=$menu['menu_id']?>" />



					</div>
				</div>

				</form>
                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_adminmenu();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>

                </div>


                </div>
			</div>
</div>
</body>
</html>