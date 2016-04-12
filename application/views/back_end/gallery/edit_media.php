  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?= $title?></title>
        <base href="<?= base_url()?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
        <script type="text/javascript">
        var base_url='<?=base_url()?>';
        </script>
			<link rel="stylesheet" type="text/css" href="html/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style_full.css" />
        <link id="color" rel="stylesheet" type="text/css" href="html/resources/css/colors/<?=$_SESSION['skin']?>.css" />
		<!-- scripts (jquery) -->
		<script src="html/resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.flot.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/tiny_mce/jquery.tinymce.js" type="text/javascript"></script>
		<!-- scripts (custom) -->
		<script src="html/resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.menu.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.table.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.dialog.js" type="text/javascript"></script>
       <script type="text/javascript" src="html/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="html/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    	<link rel="stylesheet" type="text/css" href="html/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
        <script src="html/resources/scripts/common.js" type="text/javascript"></script>
        <script type="text/javascript" src="asset/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="asset/ckfinder/ckfinder.js"></script>
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
					<h5>Sửa thông tin nội dung album</h5>
				</div>
                                   <?=flash_data()?>
                    <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_media').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                
                </div>
                </div>
        <form id="frm_edit_media" name="frm_edit_media" method="post" action="" onsubmit="return validate_form('frm_edit_media')">
			<div class="form">
					<div class="fields">
                    			
				<div class="field">
                	<div class="label">
								<label for="autocomplete">Tiêu đề</label>
							</div>
							<div class="input">
								<input type="text" id="media_title" name="media_title" class="required_field" value="<?=$media['media_title']?>"   size="40"  />
							</div>
                            <input type="hidden" id="media_id" name="media_id" value="<?=$media['media_id']?>" />
						</div>
                       <div class="field">
							<div class="label">
								<label for="autocomplete">Đường dẫn(url)</label>
							</div>
							<div class="input">
							<input type="text" name="media_url" id="media_url"  value="<?=$media['media_url']?>"  size="60" />
                            <input type="button" value="Chọn từ server" onclick="get_ck('media_url')"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Liên kết</label>
							</div>
							<div class="input">
							<input type="text" name="media_href" id="media_href" value="<?=$media['media_href'] ?>" size="60" />
                              <input type="button" class="button" value="Chọn từ server" onclick="get_ck('media_href',null,'Files')" />
                        	</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Mô tả</label>
							</div>
							<div class="input">
							<textarea name="media_description" cols="60" rows="3"><?=$media['media_description']?></textarea>
                            
							</div>
						</div>
                                                
                        
                        
                        
                        	
					</div>
				</div>
				</form>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="$('form#frm_edit_media').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
            </div>
    </div>
</div>
</body>
</html>