 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?= $title?></title>
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
					<h5>Sửa thông tin module</h5>
				</div>
				<!-- end box / title -->
                 
                        
				<form id="frm_edit_module" name="frm_edit_module">
				<div class="form">
					<div class="fields">
                    <div class="field">
                    <input type="hidden" name="module_id" value="<?=$info['module_id']?>" />
							<div class="label">
								<label for="autocomplete">Tên trang </label>
							</div>
							<div class="input">
								<input type="text" name="module_name" class="required_field" value="<?=$info['module_name']?>" readonly="true"  size="40"  />
							</div>
						</div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả module</label>
							</div>
							<div class="input">
							<textarea cols="40" rows="3" name="module_description"><?=$info['module_description']?></textarea>
							</div>
						</div>
                        
                        <a name="form" ></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Cấp cha</label>
							</div>
							<div class="input">
							<select name="parent_id">
                            <option value="0" <?if($info['parent_id']==0){echo'selected="selected"';}?>>----------------</option>
                            <?foreach($modules->result_array() as $module):?>
                                <?if($module['parent_id']==0):?>
                                <option value="<?=$module['module_id']?>" <?if($info['parent_id']==$module['module_id']){echo'selected="selected"';}?>><?=$module['module_name']?></option>
                                <?endif;?>
                            <?endforeach; ?>
                            </select>
							</div>
						</div>
                    
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Chứa danh mục </label>
							</div>
							<div class="input">
								<input type="checkbox" id="module_menu" value="1" <?if($info['module_menu']==1){echo'checked="checked"';}?> name="module_menu"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hoạt động </label>
							</div>
							<div class="input">
								<input type="checkbox" id="module_active" value="1" <?if($info['module_active']==1){echo'checked="checked"';}?> name="module_active"/>
							</div>
						</div>
						
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_module();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
				</form>
			</div>
</div>
</body>
</html>