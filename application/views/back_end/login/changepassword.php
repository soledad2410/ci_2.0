<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?= $title ?></title>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
         <base href="<?= base_url(); ?>" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="html/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style.css" media="screen" />
		<link id="color" rel="stylesheet" type="text/css" href="html/resources/css/colors/blue.css" />
		<!-- scripts (jquery) -->
    	<script src="html/resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.js" type="text/javascript"></script>
        <script src="html/resources/scripts/common.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				style_path = "html/resources/css/colors";

				$("input.focus").focus(function () {
			 $("#message-error").fadeOut("slow");
				});

				$("input.focus").blur(function () {
					if ($.trim(this.value) == "") {
						this.value = (this.defaultValue ? this.defaultValue : "");
					}
				});

				$("input:submit, input:reset").button();
			});
            
            function submit_change(){
                if(validate_form('changepassword')){
                    if($("#pwd").val()!=$("#repwd").val()){alert('Gõ lại mật khẩu không chính xác');$("#repwd").focus();return;}
                    
                    $("form#changepassword").submit();
                }
                
            }
        </script>
	</head>
	<body>
		<div id="login" class="login_form">
			<!-- login -->
			
			
			
			<!-- end login -->
			
		</div>
        <div id="login" >
        <div class="title">
				<h5>Thay đổi mật khẩu quản trị</h5>
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
       	
            <div class="messages">
				<?=$message?>
			</div>
			<div class="inner">
			 
				<div class="form">
                <form id="changepassword" name="changepassword" method="post" action="">
					<!-- fields -->
					<div class="fields">
						<div class="field">
							<div class="label">
								<label for="username">Tên truy cập</label>
							</div>
							<div class="input">
								<input type="text" id="username" name="user_name" size="40" value="<?=$user['user_name']?>" class="required_field" disabled="disabled" />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="password">Địa chỉ email:</label>
							</div>
							<div class="input">
								<input type="text" id="email" class="email_field" value="<?=$user['user_email']?>" name="user_email" size="40"/>
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="password">Mật khẩu mới</label>
							</div>
							<div class="input">
								<input type="password" id="pwd"  class="required_field" minlength="6" name="user_pwd" size="40"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="password">Gõ lại mật khẩu</label>
							</div>
							<div class="input">
								<input type="password"  id="repwd" class="required_field" minlength="6" name="user_repwd" size="40"  />
							</div>
						</div>
                        <div class="field">
							<div class="label">
								<label for="password">Mã xác nhận:</label>
							</div>
							<div class="input">
								<input type="text" id="captcha" name="captcha" size="20" style="width: 70px;" class="required_field"/>
                                <img src="asset/captcha/captcha.php"/>
							</div>
						</div>
						
						<div class="buttons">
							<input type="button" class="button" value="Xác nhận" onclick="submit_change()" />
						</div>
					</div>
					<!-- end fields -->
					<!-- links -->
					<div class="links">
						<a href="admin/login.html" >Đăng nhập</a>
					</div>
					<!-- end links -->
				</div>
                </form>
				
			</div>
			<!-- end login -->
			<div id="colors-switcher" class="color">
				<a href="" class="blue" title="Blue"></a>
				<a href="" class="green" title="Green"></a>
				<a href="" class="brown" title="Brown"></a>
				<a href="" class="purple" title="Purple"></a>
				<a href="" class="red" title="Red"></a>
				<a href="" class="greyblue" title="GreyBlue"></a>
			</div>
        </div>
        <div class="loading">Đang tải...</div>
	</body>
</html>