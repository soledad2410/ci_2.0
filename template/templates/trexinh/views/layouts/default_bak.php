<!DOCTYPE HTML>
<html>
<head>
    <title><?=$web_title?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="author" content="TREXINH" />
    <base href="<?=base_url()?>" />
    <meta name="description" content="<?=$meta_description?>"/>
    <meta name="keywords" content="<?=$meta_keyword?>"/>

    <meta property="og:title" content="<?=$web_title?>"/>
    <meta property="og:image" content="<?=base_url()?><?=isset($layout_data['content_image']) ? substr($layout_data['content_image'], 1) : '';?>"/>
    <meta property="og:description" content="<?=isset($layout_data['content_description']) ? $layout_data['content_description'] : $meta_description?>"/>
    <meta property="og:url" content="http://<?=$_SERVER['HTTP_HOST']?><?=$_SERVER['REQUEST_URI']?>"/>
    <meta property="og:site_name" content="TREXINH"/>
    <meta property="fb:app_id" content="1566435460295309"/>

	<link rel="stylesheet" type="text/css" href="<?=$resources_path?>/plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?=$resources_path?>/plugins/jquery-bxslider/jquery.bxslider.css">
	<link rel="stylesheet" type="text/css" href="<?=$resources_path?>/css/style.css">
	<link rel="shortcut icon" href="<?=$web_logo?>" type="image/x-icon"/>
</head>
<body class="page">
	<header>
		<section class="top">
			<div class="container">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-padding logo">
					<!-- <a href="<?php echo base_url();?>">
						<img src="<?=$resources_path?>/img/logo.png" alt="TREXINH">
					</a> -->
				</div>
				<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5 no-padding">
				</div>
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 no-padding phone-number">
					<!-- <i class="icon icon-phone-o"></i> <span>0987654321</span> -->
				</div>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 no-padding car">
					<!-- <i class="icon icon-car"></i> <span>Giao hàng toàn quốc</span> -->
					<div class="carts">
						<a href="<?php echo site_url('shopping');?>">
						<div>
							<span id="count-cart"><?php echo $this->shop->count_cart();?></span>
						</div>
						</a>
					</div>
				</div>
			</div>
		</section>
		<?=$main_nav?>
	</header>
    <?php if (isset($layout_data['breadcrumbs'])): ?>
		<div class="container">
			<div class="breadcrumb">
			<?php foreach ($layout_data['breadcrumbs'] as $link): ?>
				<a href="<?=$link['link']?>"><?=$link['title']?></a> &raquo;
			<?php endforeach?>
			</div>
		</div>
	<?php endif;?>

	       <?=$web_content?>

	<footer>
		<div class="container">
			<div class="footer-content">
				<section class="col-xs-12 col-sm-6 col-md-4 col-lg-4 no-padding-left">
					<h4>Hỗ trợ khách hàng</h4>
					<ul>
						<li><h2>Công ty mây tre Ngọc Động Hà Nam</h2></li>
						<li>Văn phòng đại diện: Số 7/129 Vương Thừa Vũ – Thanh Xuân – Hà Nội</li>
						<li>Tel: 04 3 5666263</li>
						<li>Fax: 04 3 5666264</li>
						<li>Mobile : 0906 180 383</li>
						<li>Website: <?php echo site_url();?></li>
					</ul>
				</section>
				<section class="col-xs-12 col-sm-6 col-md-5 col-lg-5 no-padding">
					<h4>Kết nối với chúng tôi</h4>
					<ul>
						<li>
							<iframe allowtransparency="true" frameborder="0" scrolling="no" src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/trexinhhanam+&amp;width=400&amp;height=290&amp;colorscheme=light&amp;show_faces=true&amp;header=true&amp;stream=false&amp;show_border=true" style="border:none; overflow:hidden; width:400px; height:290px;"></iframe>
						</li>
					</ul>
				</section>
				<section class="col-xs-0 col-sm-0 col-md-3 col-lg-3 no-padding">
					<h4>Các hình thức thanh toán</h4>
					<ul>
						<li class="text-center">
							<img src="/upload/images/logo/logo-paypal.png" alt="pay">
						</li>
					</ul>
				</section>
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				Copyright &copy; 2015. <a href="http://iguru.vn/" title="Thiết kế website">Thiết kế website</a> bởi VCC
			</div>
		</div>
	</footer>
	<script src="<?=$resources_path?>/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?=$resources_path?>/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=$resources_path?>/plugins/jquery-bxslider/jquery.bxslider.min.js" type="text/javascript"></script>
	<script src="<?=$resources_path?>/plugins/jquery-elevatezoom/jquery.elevatezoom.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?=$resources_path?>/js/scrolltofixed.js"></script>
	<script src="<?=$resources_path?>/js/common.js" type="text/javascript"></script>
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4d9acc6166fb3e21" async="async"></script>
	
</body>
</html>