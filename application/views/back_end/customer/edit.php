  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title></title>
        <base href="<?= base_url()?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
        <script type="text/javascript">
        var base_url='<?= base_url()?>';
        </script>
		<!-- stylesheets -->
			<link rel="stylesheet" type="text/css" href="html/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style_full.css" />
        <link id="color" rel="stylesheet" type="text/css" href="html/resources/css/colors/<?=$_SESSION['skin']?>.css" />
		<!-- scripts (jquery) -->
		<script src="html/resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		
		<script src="html/resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>

		<script src="html/resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.menu.js" type="text/javascript"></script>
		
		<script src="html/resources/scripts/smooth.table.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.dialog.js" type="text/javascript"></script>
       <script type="text/javascript" src="html/fancybox/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="html/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
    	<link rel="stylesheet" type="text/css" href="html/fancybox/jquery.fancybox-1.3.4.css" media="screen" />
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
					<h5>Sửa thông tin khách hàng đăng ký</h5>
				</div>
				<!-- end box / title -->
                 <?=flash_data()?>
                 <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_edit_customer').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
             </div>       
				<form id="frm_edit_customer" name="frm_edit_customer" method="post" action="" onsubmit="return validate_form('frm_edit_customer')">
				
				<div class="form">
					<div class="fields">
                    				<div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ email</label>
							</div>
							<div class="input">
								<input type="text" class="email_field"   size="40" value="<?=$cus['email']?>" disabled=""  />
							</div>
                        </div>
				<div class="field">
                
							<div class="label">
								<label for="autocomplete">Tên truy cập</label>
							</div>
							<div class="input">
								<input type="text" name="username" value="<?=$cus['username']?>" size="40"  />
							</div>
                            
						</div>
                        <a name="frm"></a>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Họ tên đầy đủ</label>
							</div>
							<div class="input">
							<input type="text" name="fullname" value="<?=$cus['fullname']?>"  size="60" />
                              
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Điện thoại</label>
							</div>
							<div class="input">
							<input type="text" name="phone"  value="<?=$cus['phone']?>" size="60" />
                              
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ</label>
							</div>
							<div class="textarea">
							<textarea name="address" cols="40" rows="10"><?=$cus['address']?></textarea>
                              
							</div>
						</div>
                        
                        
                        
                     	
					</div>
				</div>
				</form>
                <div class="sub_menu">
               <div class="save" >
                <a href="javascript:void(0)" onclick="$('#frm_edit_customer').submit();"><img src="html/resources/images/apply.png" width="32px" height="32px"/><br />
                <span>Lưu</span>
                </a>
                </div>
             </div>
			
			</div>
</div>
</body>
</html>