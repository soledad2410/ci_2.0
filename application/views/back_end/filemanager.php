<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?= $title ?></title>
        <base href="<?= base_url()?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<!-- stylesheets -->
		<link rel="stylesheet" type="text/css" href="html/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style_full.css" />
        <link rel="stylesheet" type="text/css" href="script/clock/jquery.tzineClock.css" />
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
		<script src="html/resources/scripts/smooth.menu.js" type="text/javascript"></script>
		
		<script src="html/resources/scripts/smooth.table.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.dialog.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.autocomplete.js" type="text/javascript"></script>
        <script src="script/clock/jquery.tzineClock.js" type="text/javascript"></script>
        <!--
<script type="text/javascript" src="script/clock/script.js"></script>
-->
<script src="<?=base_url();?>asset/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?=base_url();?>asset/ckfinder/ckfinder.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function () {
				style_path = "html/resources/css/colors";

				$("#date-picker").datepicker();

				$("#box-tabs, #box-left-tabs").tabs();
               
			});
		</script>
	</head>
	<body>
		<div id="colors-switcher" class="color">
			<a href="" class="blue" title="Blue"></a>
			<a href="" class="green" title="Green"></a>
			<a href="" class="brown" title="Brown"></a>
			<a href="" class="purple" title="Purple"></a>
			<a href="" class="red" title="Red"></a>
			<a href="" class="greyblue" title="GreyBlue"></a>
		</div>
		<!-- dialogs -->
	
		
		<!-- end dialogs -->
		<!-- header -->
		<div id="header">
			<!-- logo -->
			<div id="logo">
				<h1><a href="" title="Smooth Admin"><img src="html/resources/images/logo.png" alt="Smooth Admin" /></a></h1>
			</div>
			<!-- end logo -->
			<!-- user -->
			<ul id="user">
				<li class="first"><a href="">Mike</a></li>
				<li><a href="">Account</a></li>
				<li><a href="">Messages (0)</a></li>
				<li><a href="admin/admin/logout.html">Logout</a></li>
				<li class="last highlight"><a href="">View Site</a></li>
                
			</ul>
			<!-- end user -->
			<div id="header-inner">
				<div id="home">
					<a href=""></a>
				</div>
               
                	
				<!-- quick -->
				<ul id="quick">
					<li>
						<a href="#" title="Products"><span class="normal">Examples</span></a>
						<ul>
							<li><a href="index.html">Full, Column</a></li>
							<li><a href="index-no-column.html">Full, No Column</a></li>
							<li><a href="index-fixed.html">Fixed, Column</a></li>
							<li class="last"><a href="index-fixed-no-column.html">Fixed, No Column</a></li>
						</ul>
					</li>
					<li>
						<a href="#" title="Products"><span class="icon"><img src="html/resources/images/icons/application_double.png" alt="Products" /></span><span>Products</span></a>
						<ul>
							<li><a href="#">Manage Products</a></li>
							<li><a href="#">Add Product</a></li>
							<li>
								<a href="#" class="childs">Sales</a>
								<ul>
									<li><a href="">Today</a></li>
									<li class="last"><a href="">Yesterday</a></li>
								</ul>
							</li>
							<li class="last">
								<a href="#" class="childs">Offers</a>
								<ul>
									<li><a href="">Coupon Codes</a></li>
									<li class="last"><a href="">Rebates</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="" title="Events"><span class="icon"><img src="html/resources/images/icons/calendar.png" alt="Events" /></span><span>Events</span></a>
						<ul>
							<li><a href="#">Manage Events</a></li>
							<li class="last"><a href="#">New Event</a></li>
						</ul>
					</li>
					<li>
						<a href="" title="Pages"><span class="icon"><img src="html/resources/images/icons/page_white_copy.png" alt="Pages" /></span><span>Pages</span></a>
						<ul>
							<li><a href="#">Manage Pages</a></li>
							<li><a href="#">New Page</a></li>
							<li class="last">
								<a href="#" class="childs">Help</a>
								<ul>
									<li><a href="#">How to Add a New Page</a></li>
									<li class="last"><a href="#">How to Add a New Page</a></li>
								</ul>
							</li>
						</ul>
					</li>
					<li>
						<a href="" title="Links"><span class="icon"><img src="html/resources/images/icons/world_link.png" alt="Links" /></span><span>Links</span></a>
						<ul>
							<li><a href="#">Manage Links</a></li>
							<li class="last"><a href="#">Add Link</a></li>
						</ul>
					</li>
					<li>
						<a href="" title="Settings"><span class="icon"><img src="html/resources/images/icons/cog.png" alt="Settings" /></span><span>Settings</span></a>
						<ul>
							<li><a href="#">Manage Settings</a></li>
							<li class="last"><a href="#">New Setting</a></li>
						</ul>
					</li>
				</ul>
				<!-- end quick -->
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
		</div>
		<!-- end header -->
		<!-- content -->
		<div id="content">
			<!-- table -->
			<div class="box">
				<!-- box / title -->
				<div class="title">
					<h5>Quản lý file</h5>
                    
				
				</div>
				<!-- end box / title -->
				
                
                
			</div>
		</div>
		<!-- end content -->
		<!-- footer -->
		<div id="footer">
			<p>Copyright &copy; 2000-2010 Your Company. All Rights Reserved.</p>
		</div>
		<!-- end footert -->
	</body>
</html>