<nav class="navbar navbar-default" role="navigation">
	<div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <div class="pull-left search-form col-xs-12 col-sm-0 col-md-0 col-lg-0" role="search">
                <input type="text" name="keyword" value="" placeholder="Nhập từ khóa để tìm kiếm">
                <button type="button" class="btn btn-orange">Tìm kiếm</button>
            </div>
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav">
    			<li class="active"><a href="/?lang=<?=$current_lang?>"><?=$keyword['HOME_PAGE_TITLE']?></a></li>
                <?$list_cate = $this->menu_model->load_menu_frontend(array('menu_id', 'menu_title', 'menu_string', 'tblmenu.parent_id'), array('tblmenu.domain_id' => $_SESSION['domain_id']), false, false, true);?>
    			<?foreach ($block_content->result_array() as $cate): ?>
    			<?$trees = $this->menu_model->build_cate_tree($list_cate, $cate['menu_id']);?>
    					<li>
                            <a <?php echo ($trees) ? 'data-toggle="dropdown"' : ''?> href="<?=$this->url_model->get_cate_url($cate)?>"><?=$cate['menu_title']?><?php echo ($trees) ? '<span class="caret pull-right col-sm-0 col-md-0 col-lg-0"></span>' : ''?></a>
                        <?if (!empty($trees)): ?>
                        <ul class="dropdown-menu">
                            <?foreach ($trees as $cate): ?>
    							<li><a href="<?=$this->url_model->get_cate_url($cate)?>"><?=$cate['menu_title']?></a></li>
                            <?endforeach;?>
    				    </ul>
                    <?endif;?>
                </li>
                <?endforeach;
                $this->load->library('shop');
                $cart = $this->shop->count_cart()
                ?>
                
    		</ul>
            <div class="cart">
                    <?=$keyword['SHOP_CART']?> <i class="icon-cart"></i>   :   <a href="/shopping.html" id="count-cart"><?=$cart?></a>
                </div>
        </div>
	</div>
</nav>