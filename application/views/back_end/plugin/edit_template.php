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
  <div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Sửa template khối nội dung</h5>
				</div>
                <div class="sub_menu">
                <div class="sub_menu-notice"><img src="html/resources/images/icons/notice.png" width="32" height="32"/></div><div class="sub_menu-notice" style="margin-top: 10px;">File template là tên của template khối nội dung nằm trong thư mục blocks của layout giao diện hiện hành</div>
            </div>
        <form id="frm_edit_plugintemplate" name="frm_edit_plugintemplate">
				
				<div class="form">
					<div class="fields">
				<div class="field">
							<div class="label">
								<label for="autocomplete">Tên template</label>
							</div>
							<div class="input" style="margin-left: 260px;">
								<input type="text"  name="plugintemplate_title" class="required_field"   size="40" value="<?= $template['plugintemplate_title']?>"  />
							</div>
						</div>
                        <input type="hidden" id="plugintemplate_id" name="plugintemplate_id" value="<?=$template['plugintemplate_id']?>" />
                       
                        <div class="field">
							<div class="label">
								<label for="autocomplete">File template</label>
							</div>
							<div class="input" style="margin-left: 260px;">
								<input type="text"  name="plugintemplate_name" class="required_field"   size="40" value="<?= $template['plugintemplate_name']?>"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Template description</label>
							</div>
							<div class="input">
								<textarea name="template_description" cols="60" rows="3"><?=$template['template_description']?></textarea>
							</div>
						</div>
            	</div>
				</div>
				</form>
                <div class="sub_menu">
              <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_plugintemplate();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
            </div>
    </div>
</div>
</body>
</html>