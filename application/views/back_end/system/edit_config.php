 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?= $title?></title>
        <base href="<?= base_url()?>" />
        <script type="text/javascript">
        var base_url='<?=base_url();?>';
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
					<h5>Sửa thông cấu hình</h5>
				</div>
				<!-- end box / title -->
                 
                        
				<form id="frm_edit_config" name="frm_edit_config">
				<div class="form">
					<div class="fields">
                    <input type="hidden" name="config_id" value="<?=$config['config_id']?>" />
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên cấu hình </label>
							</div>
							<div class="input">
								<input type="text" name="config_name" class="required_field"   size="40" value="<?=$config['config_name']?>"  />
							</div>
						</div>
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề cấu hình</label>
							</div>
							<div class="input">
							<input type="text" name="config_title" class="required_field" value="<?=$config['config_title']?>"  size="40"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Loại cấu hình </label>
							</div>
							<div class="input">
								<select name="config_type">
                                <option value="textbox" <?if($config['config_type']=='textbox'){echo 'selected="selected"';}?>>TextBox</option>
                                <option value="radio" <?if($config['config_type']=='radio'){echo 'selected="selected"';}?>>Radio</option>
                                <option value="checkbox" <?if($config['config_type']=='checkbox'){echo 'selected="selected"';}?>>CheckBox</option>
                                <option value="textarea" <?if($config['config_type']=='textarea'){echo 'selected="selected"';}?>>TextArea</option>
                                <option value="ckeditor" <?if($config['config_type']=='ckeditor'){echo 'selected="selected"';}?>>TextEditor</option>
                                <option value="selectbox" <?if($config['config_type']=='selectbox'){echo 'selected="selected"';}?>>SelectBox</option>
                                <option value="filefield" <?if($config['config_type']=='filefield'){echo 'selected="selected"';}?>>FileField</option>
                                <option value="password" <?if($config['config_type']=='password'){echo 'selected="selected"';}?>>Password</option>
                                <option value="number" <?if($config['config_type']=='number'){echo 'selected="selected"';}?>>Number field</option>
                                </select>
							</div>
					</div>
                        
                        
                        				        <div class="field">
							<div class="label">
								<label for="autocomplete">Cấu hình lựa chọn</label>
							</div>
							<div class="input">
							<input type="text" size="100" name="config_prototype" value="<?=$config['config_prototype']?>" />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Cấu hình module</label>
							</div>
							<div class="input">
							<select name="config_module" id="config_module">
                            <?foreach($config_modules->result_array() as $module):
                            if($module['config_module']!=''):
                            ?>
                            <option value="<?=$module['config_module']?>" <?if($module['config_module']==$config['config_module']){echo'selected="selected"';}?>><?=$module['config_module']?></option>
                            <?endif;
                            endforeach;?>
                            </select>
                           
                            <input type="text" id="new_module" size="25"  name="new_module" style="display: none;" />
                            
                            <br /><input type="checkbox" name="add_new_module" id="add_new_module" value="1" onclick="check_new_module()" />Nhập mới
                            
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hoạt động </label>
							</div>
							<div class="input">
								<input type="checkbox" id="config_active" <?if($config['config_active']==1){echo'checked=checked';}?> value="1" name="config_active"/>
							</div>
						</div>
                        
						
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_config();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
				</form>
			</div>
</div>
</body>
</html>