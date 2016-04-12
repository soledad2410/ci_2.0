  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Sửa thông tin hỗ trợ trực tuyến</title>
        <base href="<?= base_url()?>" />
        <script type="text/javascript">
        var base_url='<?= base_url()?>';
        </script>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="html/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style_full.css" />

		<link id="color" rel="stylesheet" type="text/css" href="html/resources/css/colors/<?=$_SESSION['skin']?>.css" />
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
            <script type="text/javascript" src="asset/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="asset/ckfinder/ckfinder.js"></script>
        <script src="html/resources/scripts/common.js" type="text/javascript"></script>

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
					<h5>Sửa thông tin hỗ trợ trực tuyến </h5>
				</div>
				<!-- end box / title -->


				<form id="frm_edit_support" name="frm_edit_support">

				<div class="form">
					<div class="fields">
				
							
							
                            <input type="hidden" name="support_id" value="<?=$support['support_id']?>" />
						
                       
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tiêu đề hỗ trợ</label>
							</div>
							<div class="input">
							<input type="text" name="support_title" id="support_title" value="<?=$support['support_title']?>"  size="60" />

							</div>
						</div>
                                                <div class="field">
							<div class="label">
								<label for="autocomplete">Yahoo</label>
							</div>
							<div class="input">
							<input type="text" name="yahoo"  value="<?=$support['yahoo']?>"  size="60" />

							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Skype</label>
							</div>
							<div class="input">
							<input type="text" name="skype" value="<?=$support['skype']?>"  size="60" />

							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại hỗ trợ</label>
							</div>
							<div class="input">
							<input type="text" name="support_phone" value="<?=$support['support_phone']?>" />
							</div>

						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Số máy lẻ</label>
							</div>
							<div class="input">
							<input type="text" name="extend_phone" value="<?=$support['extend_phone']?>" />
							</div>

						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Email</label>
							</div>
							<div class="input">
							<input type="text" name="support_email" value="<?=$support['support_email']?>" />
							</div>

						</div>
            
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hiển thị </label>
							</div>
							<div class="input">
								<input type="checkbox" name="support_visible" <?if($support['support_visible']==1){echo'checked="checked"';}?>" value="1"/>
							</div>
						</div>


					</div>
				</div>
				</form>

                <div class="sub_menu">

                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_support();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>

                </div>


                </div>

			</div>

            </div>
</body>
</html>