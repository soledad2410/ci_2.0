<!DOCTYPE HTML>
<html>
	<head>
	   <title><?=$title?></title>
        <script type="text/javascript">
        var base_url='<?=base_url()?>';
        </script>
        <base href="<?=base_url()?>" />
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/reset.css" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="html/resources/css/style_full.css" />

        <link id="color" rel="stylesheet" type="text/css" href="html/resources/css/colors/<?=$_SESSION['skin']?>.css" />
		<script src="html/resources/scripts/jquery-1.4.2.min.js" type="text/javascript"></script>

		<script src="html/resources/jquery-ui-1.11.4/jquery-ui.min.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.ui.selectmenu.js" type="text/javascript"></script>
		<script src="html/resources/scripts/jquery.flot.min.js" type="text/javascript"></script>

		<script src="html/resources/scripts/smooth.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.menu.js" type="text/javascript"></script>

		<script src="html/resources/scripts/smooth.form.js" type="text/javascript"></script>
		<script src="html/resources/scripts/smooth.dialog.js" type="text/javascript"></script>
             <script src="html/fancybox/jquery.fancybox.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="html/fancybox/jquery.fancybox.css" />
        <script type="text/javascript" src="html/resources/scripts/contextmenu/jquery.contextMenu.js"></script>

        <script src="html/resources/scripts/common.js" type="text/javascript"></script>
        <script type="text/javascript" src="3rd/ckeditor/ckeditor.js"></script>
        <script type="text/javascript" src="3rd/ckfinder/ckfinder.js"></script>
        <script type="text/javascript">
        $(function(){
           $('.fancybox').fancybox();
        });
        function initCKeditor(fieldName,toolBar,width,height){
            var toolbar=(toolBar==null)?'Full':toolBar;
            var width=(width==null)?'100%':width;
            var height=(height==null)?400:height;
            var ck = CKEDITOR.replace(fieldName,{toolbar: toolbar,width: width,height: height});
            CKFinder.setupCKEditor( ck, '<?=$this->config->item('web_dir')?>3rd/ckfinder/');
            CKEDITOR.config.allowedContent = true;

                    }
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
        <?
$CI = &get_instance();
$languages = $this->menu_model->select_query('tbllang');
?>
	<div id="header">
    <ul class="select-lang">
        <li>Ngôn ngữ cập nhập nội dung: </li>
        <?foreach($languages->result_array() as $lang):?>
            <li><a <?=$lang['lang_shortname'] == $_SESSION['lang_admin'] ? 'class="active"' : '';?> href="javascript:;" onclick="select_lang('<?=$lang['lang_shortname']?>')" ><img src="<?=$lang['lang_image']?>" height="20"/></a></li>
        <?endforeach;?>
        </ul>
		<ul id="user">
        
				<li class="first"><a href="javascript:void(0)"onclick="edit_admin('<?=$CI->user['user_name']?>')"><?=$CI->user['user_name']?></a></li>
			<li><a href="admin/admin/logout.html">Logout</a></li>
			 <li ><a href="<?=base_url()?>" target="_blank">View Site</a></li>
             <li class="last highlight"><a onclick="emptyCache()" href="javascript:;">Xóa cache</a></li>

			</ul>

        	<div id="header-inner">
				<div id="home">
					<a href="admin/admin/index.html"></a>
				</div>
                <div style="float: left;margin: 15px 0px 0px 10px;color:white;font-weight:bold;font-size: 1.1em;">Chọn domain cập nhập</div>
       <div class="select-lang" style="float: left;margin: 10px 0px 0px 10px;" >
       <?$domains = $this->menu_model->select_query('tbldomain', FALSE, array('domain_active' => 1));?>
   <select data="<?=$_SESSION['current_domain']?>" style="width: 150px;" id="domain-change">
   <?foreach ($domains->result_array() as $domain): ?>
    <option value="<?=$domain['domain_id']?>" ><?=$domain['domain_name']?></option>
   <?endforeach;?>

    </select>
    </div>

                <?
$menu_admin = $this->menu_model->select_query('tblmenuadmin', FALSE, array('menu_visible' => 1, 'menu_block' => 0, 'parent_id' => 0, 'privilege_access >= ' => $CI->user['group_level']), FALSE, FALSE, FALSE, array('menu_queu' => 'ASC'));
?>
				<ul id="quick">
                    <?foreach ($menu_admin->result_array() as $parent): ?>
					<li>
						<a href="admin/<?=$parent['menu_url']?>" title="<?=$parent['menu_title']?>"><span class="icon"><img src="<?=$parent['menu_image']?>" alt="<?=$parent['menu_title']?>" width="16" height="16" /></span><span><?=$parent['menu_title']?></span></a>
                        <?$menu_child = $this->menu_model->select_query('tblmenuadmin', FALSE, array('menu_visible' => 1, 'menu_block' => 0, 'parent_id' => $parent['menu_id'], 'privilege_access >= ' => $CI->user['group_level']), FALSE, FALSE, FALSE, array('menu_queu' => 'ASC'));
if ($menu_child->num_rows() > 0):
?>
						<ul>
                           <?foreach ($menu_child->result_array() as $menu): ?>
                            <li><a class="childs" href="admin/<?=$menu['menu_url']?>"><?=$menu['menu_title']?></a>
                            <?$menu_child2 = $this->menu_model->select_query('tblmenuadmin', FALSE, array('menu_visible' => 1, 'menu_block' => 0, 'parent_id' => $menu['menu_id'], 'privilege_access >= ' => $CI->user['group_level']), FALSE, FALSE, FALSE, array('menu_queu' => 'ASC'));
if ($menu_child2->num_rows() > 0):
?>
                            <ul>
                                <?foreach ($menu_child2->result_array() as $menu): ?>
                                <li><a href="admin/<?=$menu['menu_url']?>"><?=$menu['menu_title']?></a>
                                <?endforeach;?>
                            </ul>
                            <?endif;?>
                            </li>
                            <?endforeach;?>
					</ul>
                        <?endif;?>
					</li>
                    <?endforeach;?>
	       <?if ($CI->user['group_level'] == 1): ?>
                    <li>
						<a href="javascript:void(0)" title="Settings"><span class="icon"><img src="html/resources/images/icons/superadmin.png" width="16" height="16" alt="Settings" /></span><span>System</span></a>
						<ul>
							<li><a href="admin/system/language.html">Language adminstrative</a></li>
                            <li><a href="admin/system/module.html">Website module</a></li>
                            <li><a href="admin/system/menu.html">Admin menu</a></li>
                            <li><a href="admin/system/config.html">Website config</a></li>
                            <li><a href="admin/system/layout.html">Website layout Template</a></li>
                            <li><a href="admin/system/plugin.html">Website plugin</a></li>
                            <li><a href="admin/system/privilege.html">Module quản trị</a></li>
                        </ul>
					</li>
                  <?endif?>
				</ul>
				<div class="corner tl"></div>
				<div class="corner tr"></div>
			</div>
		</div>

  <script>
  $(function(){
    $('#domain-change').change(function(){
       var domain_id = $(this).val();
       $.post('/admin/admin/change_domain',{domain_id:domain_id},function(rs){
        location.reload();
       },'json')
    });
  });
  </script>