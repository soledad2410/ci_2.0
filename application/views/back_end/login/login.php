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
        <script type="text/javascript" src="html/fancybox/jquery.fancybox-1.3.4.pack.js"></script>
        <script type="text/javascript" src="html/resources/scripts/contextmenu/jquery.contextMenu.js"></script>
		<script src="html/resources/scripts/jquery-ui-1.8.custom.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.js" type="text/javascript"></script>
        <script src="html/resources/scripts/common.js" type="text/javascript"></script>

	</head>
	<body>
		<div id="login" class="login_form">
			<!-- login -->
			<div class="title">
				<h5>Sign In to Admin Cpanel</h5>
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
			<div class="messages">
				<?=$message?>
			</div>
			<div class="inner">

				<div class="form">
					<!-- fields -->
                    <form id="frmLoginForm" name="frmLoginForm" method="post" action="admin/login.html" onsubmit="return validate_form('frmLoginForm')">
					<div class="fields">
						<div class="field">
							<div class="label">
								<label for="username">Username:</label>
							</div>
							<div class="input">
								<input type="text" id="username" name="username" size="40" class="required_field" />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="password">Password:</label>
							</div>
							<div class="input">
								<input type="password" id="password" name="password" size="40" class="required_field"  />
							</div>
						</div>

						<div class="buttons">
							<input type="submit" value="Đăng nhập" onclick="$('form#frmLoginForm').submit()" />
						</div>
					</div>
                    </form>
					<!-- end fields -->
					<!-- links -->
					<div class="links">
						<a href="javascript:void(0)" onclick="show_getpwd_form()">Lấy lại mật khẩu</a>
					</div>
                    <div class="links">
						<a href="<?=base_url()?>">View site</a>
					</div>
					<!-- end links -->
				</div>

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
        <div id="login" class="getpwd_form" style="display: none;">
       	<div class="title">
				<h5>Reset password</h5>
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
			<div class="inner">

				<div class="form">
                <form id="resetpwd" name="resetpwd">
					<!-- fields -->
					<div class="fields">
						<div class="field">
							<div class="label">
								<label for="username">Username:</label>
							</div>
							<div class="input">
								<input type="text" id="username" name="username" size="40" class="required_field" />
							</div>
						</div>
						<div class="field">
							<div class="label">
								<label for="password">Email address:</label>
							</div>
							<div class="input">
								<input type="text" id="email" class="email_field" name="email" size="40" class="focus" />
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
							<input type="button" class="buttons" value="Reset" onclick="reset_pwd()" />
						</div>
					</div>
			      <div class="links">
						<a href="javascript:void(0)" onclick="show_login_form()">Đăng nhập</a>
					</div>
                     <div class="links">
						<a href="<?=base_url()?>">View site</a>
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