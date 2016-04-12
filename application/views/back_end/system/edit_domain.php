 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Sửa thông tin domain</title>
        <base href="<?= base_url()?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
        <script type="text/javascript">
        var base_url='<?=base_url()?>';
        </script>
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
        <script type="text/javascript">
function generatekey(){
    var key= $.md5(Math.random());
    $("#domain_key").val(key);
}

</script>
  </head>
  <body>
  <div id="content">
<div class="box" >
				<!-- box / title -->
				<div class="title">
					<h5>Sửa thông tin domain</h5>
				</div>
				<!-- end box / title -->
                 
                 <?=$message?>      
				<form id="frm_edit_domain" name="frm_edit_domain" method="post" action="admin/system/edit_domain/<?=$domain['domain_id']?>.html">
				<div class="form">
					<div class="fields">
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Tên miền </label>
							</div>
							<div class="input">
								<input type="text" name="domain_name" class="required_field" value="<?=$domain['domain_name']?>"  size="40"  />
                                <input type="hidden" name="domain_id" value="<?=$domain['domain_id']?>" />
							</div>
						</div>
                    
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Key </label>
							</div>
                            <div class="input">
								<input type="text" name="domain_key" class="required_field" value="<?=$domain['domain_key']?>"  id="domain_key" size="40" minlength="6"  />
                                <input type="button" onclick="generatekey()" value="auto" class="button browse"/>
							</div>
							
					</div>
				        
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Tên khách hàng</label>
							</div>
							<div class="input">
						  <input type="text" name="customer_name" class="required_field" size="40" value="<?=$domain['customer_name']?>"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Email khách hàng </label>
							</div>
							<div class="input">
								<input type="text" name="customer_email" class="email_field" value="<?=$domain['customer_email']?>"  size="40"  />
							</div>
					</div>
                    <div class="field">
							<div class="label">
								<label for="autocomplete">Địa chỉ khách hàng</label>
							</div>
							<div class="input">
						  <textarea name="customer_address" cols="40" rows="3"><?=$domain['customer_address']?></textarea>
							</div>
						</div>
                        
                    
                        <div class="field">
							<div class="label">
								<label for="autocomplete">Hoạt động </label>
							</div>
							<div class="input">
								<input type="checkbox" id="domain_active" value="1" name="domain_active" <?=($domain['domain_active']==1)?'checked="checked"':''?>/>
							</div>
						</div>
					</div>
				</div>
                <div class="sub_menu">
                
                <div class="save" >
                <a href="javascript:void(0)" onclick="save_edit_domain();"><img src="html/resources/images/apply.png" width="32px" height="32px"/>
                <span>Lưu</span>
                </a>
                
                </div>
         
                
                </div>
				</form>
			</div>
</div>
</body>
</html>