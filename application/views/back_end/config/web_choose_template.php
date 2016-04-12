  <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title><?= $title?></title>
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
        <style type="text/css">
        #content{
            margin:0!important;
            height:455px;
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
					<h5>Giao diện website</h5>
				</div>
	<div class="form">
			
                    <div class="box-template" style="border: none;height:370px!important;min-height: 0!important;">
                    <?php foreach($templates->result_array() as $template):?>
                    <div class="template" style="<?if($template['template_default']==1){echo'border: 1px solid silver;';}?>">
                    <a onclick="default_template('<?=$template['template_id']?>')" href="javascript:void(0)"  title="<?=$template['template_name']?>"><img src="template/templates/<?=$template['template_name']?>/thumb.png" height="150"/></a><br />
                    <p class="template-title"><?=$template['template_title']?></p>
                    <p class="template-title"><?=$template['layout_title']?></p>
                        <div class="task-template">
                        <?if($template['template_default']!=='1'):?>
                   <div class="option-template"><img src="html/resources/images/icons/close.png" width="20" height="20" title="Xóa giao diện" onclick="delete_template('<?=$template['template_id']?>')"/></div>
                        <?endif;?>
                    </div>
                    </div>
                    <?php endforeach;?>
                    
                    </div>
				</div>
                
				
			</div>
</div>
</body>
</html>