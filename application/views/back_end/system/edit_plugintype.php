 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
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
					<h5>Sửa thông Loại khối nội dung</h5>
				</div>
				<!-- end box / title -->
                 
                        
				<form id="frm_edit_plugintype" name="frm_edit_plugintype">
				<div class="form">
					<div class="fields">
                    <input type="hidden" name="plugintype_id" value="<?=$plugin['plugintype_id']?>" />
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên loại khối </label>
							</div>
							<div class="input">
								<input type="text" name="plugintype_name" class="required_field" readonly="true"  size="40" value="<?=$plugin['plugintype_name']?>"  />
							</div>
						</div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề loại khối</label>
							</div>
							<div class="input">
							<input type="text" name="plugintype_title" class="required_field" value="<?=$plugin['plugintype_title']?>"  size="40"  />
							</div>
						</div>
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả loại khối</label>
							</div>
							<div class="input">
							<textarea name="plugintype_description" id="plugintype_description" cols="40" rows="3"><?=$plugin['plugintype_description']?></textarea>
							</div>
						</div>
                        <a name="form" ></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Thêm cấu hình</label>
							</div>
							<div class="input">
							<img title="Thêm mới thuộc tính" src="html/resources/images/icons/add.png" width="24" height="24" onclick="add_plugintye_properties()" style="cursor: pointer;" />
							</div>
						</div>
                        <?foreach($config_type as $config_title=>$config_name):?>
                        <div class="field">
                            <div class="label"><label for="autocomplete">Tiêu đề Cấu hình</label></div>
                            <div class="input"><input type="text" name="pluginconfig_title[]" value="<?=$config_title?>" class="required_field"  size="40"  /></div>
                            <div style="position:relative;margin-left:10px;left:0" class="label"><label>Tên cấu hình</label></div>
                            <div class="input" style="float: left;margin-left:10px;"><input size="15" type="text" name="pluginconfig_name[]" value="<?=$config_name?>" class="required_field"  size="40"  /></div>
                        </div>
                        <?endforeach;?>
                        <div class="plugin_type_properties">
                          
                        </div>
                        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hoạt động </label>
							</div>
							<div class="input">
								<input type="checkbox" id="plugintype_visible" <?if($plugin['plugintype_visible']==1){echo'checked=checked';}?> value="1" name="plugintype_visible"/>
							</div>
						</div>
                        
						
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_plugintype();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
				</form>
			</div>
</div>
</body>
</html>