<!DOCTYPE HTML>
<html>
<head>
    <title><?=$web_title?></title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
    <meta name="author" content="KHOIDUNGCERAMICS" />
    <base href="<?=base_url()?>" />
    <meta name="description" content="<?=$meta_description?>"/>
    <meta name="keywords" content="<?=$meta_keyword?>"/>

    <meta property="og:title" content="<?=$web_title?>"/>
    <meta property="og:image" content="<?=base_url()?><?=isset($layout_data['content_image']) ? substr($layout_data['content_image'], 1) : '';?>"/>
    <meta property="og:description" content="<?=isset($layout_data['content_description']) ? $layout_data['content_description'] : $meta_description?>"/>
    <meta property="og:url" content="http://<?=$_SERVER['HTTP_HOST']?><?=$_SERVER['REQUEST_URI']?>"/>
    <meta property="og:site_name" content="KHOIDUNGCERAMICS"/>
    <meta property="fb:app_id" content="1566435460295309"/>

	<link rel="stylesheet" type="text/css" href="<?=$resources_path?>/plugins/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="<?=$resources_path?>/plugins/jquery-bxslider/jquery.bxslider.css"/>
	<link rel="stylesheet" type="text/css" href="<?=$resources_path?>/css/style.css"/>
	<link rel="shortcut icon" href="<?=$web_logo?>" type="image/x-icon"/>
    
</head>
<body>
	<header>
		<section class="top">
        <div class="header-bar">
            <div class="container">
                <?
                  $langs = $this->layout_model->select_query('tbllang',false,array('lang_active'=>1));
              
                ?>
               
                    <ul class="languages">
                    <?foreach($langs->result_array() as $item):?>
                        <li><a href="/?lang=<?=$item['lang_shortname']?>" title="<?=$item['lang_name']?>"><img <?=($item['lang_shortname'] == $current_lang) ? 'class="active"':"";?> src="<?=$item['lang_image']?>" alt="<?=$item['lang_name']?>"/></a></li>
                     <?endforeach;?>   
                    </ul>
               
            </div>
        </div>
			<?=$web_banner?>
		</section>
		<?=$main_nav?>
	</header>

	<section class="content">
		<div class="container">
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
			<?=$top_home_content?>
                <div class="web-content">
                <?php if (isset($layout_data['breadcrumbs'])): ?>
	
			<div class="breadcrumb">
			<?php foreach ($layout_data['breadcrumbs'] as $link): ?>
				<a href="<?=$link['link']?>"><?=$link['title']?></a> &raquo;
			<?php endforeach?>
			</div>
		
	<?php endif;?>
                    <?=$web_content?>
                </div>
            </div>
            <div class="col-xs-0 col-sm-0 col-md-3 col-lg-3 no-padding">
                <?=$right_content?>
            </div>
        </div>
        <?=$bottom_content?>
	</section>
	
	<footer>
		<div class="container">
			<div class="footer-content">
				<section class="col-xs-12 col-sm-6 col-md-4 col-lg-4 no-padding-left">
				    <?=$web_footer?>
				</section>
				
				
			</div>
		</div>
		<div class="copyright">
			<div class="container">
				Copyright &copy; 2015-2016 <a href="/" title="Gốm sứ khoidung">khoidungceramics.com.vn</a>. 
                <ul class="social-links">
                <li><a href="" class="twitter" title="twitter"></a></li>
                    
                    <li><a href="" class="facebook" title="facebook"></a></li>
                    <li><a href="" class="googleplus" title="googleplus"></a></li>
                </ul>
			</div>
		</div>
	</footer>
    
	<script src="<?=$resources_path?>/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?=$resources_path?>/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?=$resources_path?>/plugins/jquery-bxslider/jquery.bxslider.min.js" type="text/javascript"></script>
	<script src="<?=$resources_path?>/plugins/jquery-elevatezoom/jquery.elevatezoom.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?=$resources_path?>/js/scrolltofixed.js"></script>
    <script src="<?=$resources_path?>/plugins/jquery.nicescroll.min.js" type="text/javascript"></script>
	<script src="<?=$resources_path?>/js/common.js" type="text/javascript"></script>
	
	<!--<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4d9acc6166fb3e21" async="async"></script>-->
</body>

</html>