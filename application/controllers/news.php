<?php
Class News extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('article_model');
		$this->load->model('menu_model');
		$this->load->model('product_model');
	}

	public function index() {
		$cate_id = $this->input->get('cate');
		$offset = $this->input->get('offset');
		$limit = $this->input->get('limit');
		$list_news = $this->article_model->load_article_frontend_recursive($cate_id, array('article_id', 'article_image', 'article_header', 'article_datetime', 'article_title'), false, $offset, $limit);
		$data = array();
		foreach ($list_news->result_array() as $news) {
			$item = $news;
			$item['link'] = $this->url_model->get_news_url($news);
			$item['article_header'] = advance_substr(50, $item['article_header']);
			$data[] = $item;
		}
		echo json_encode($data);
	}

	public function cate($lang = FALSE, $id = false, $title = false, $page = false) {

		if (!$id) {redirect(base_url());}

		$menu_info = $this->menu_model->load_menu(array('layout_name', 'menu_string', 'menu_id', 'menu_title', 'template_id', 'menu_image', 'menu_details', 'menu_level', 'tblmenu.parent_id', 'menu_content', 'sub_title'), array('menu_id' => $id), NULL, NULL, NULL, TRUE);
		$template = $menu_info['0']['template_id'];
		if (count($menu_info) < 1) {redirect(base_url());}
		$limit = $this->article_model->get_config('article_page', $this->my_lang, $this->domain_id);
		$page = ($page) ? $page : 1;
		$page = $this->input->get('page') ? $this->input->get('page') : $page;

		$where = false;
		$url = $this->url_model->get_cate_url($menu_info['0']) . '?';

//		if ($this->input->get('year')) {
//			$where = ['year' => $this->input->get('year')];
//			$url .= 'year=' . $this->input->get('year') . '&';
//			if ($this->input->get('month')) {
//				$where = ['year' => $this->input->get('year'), 'month' => $this->input->get('month')];
//				$url .= 'month=' . $this->input->get('month') . '&';
//			}
//		}
//
		$select_cols = array('article_id', 'tblarticle.menu_id', 'article_view', 'article_author', 'article_content', 'article_queu', 'article_datetime', 'article_title', 'article_image', 'article_header');
		$total = $this->article_model->load_article_frontend_recursive($id, 'article_id', $where)->num_rows();

		$page_list = $this->url_model->emit_page_list($id, $total, $limit, $page);
		if ($this->input->get('year')) {
			$page_list = $this->url_model->emit_page_list(false, $total, $limit, $page, $url);
		}

		$article_array = $this->article_model->load_article_frontend_recursive($id, $select_cols, $where, ($page - 1) * $limit, $limit);

		$data['articles'] = $article_array;
		$data['page_list'] = $page_list;
		$data['menu'] = $menu_info['0'];
		$parent_id = $menu_info['0']['parent_id'] == 0 ? $menu_info['0']['menu_id'] : $menu_info['0']['parent_id'];
		$data['breadcrumbs'] = $this->url_model->generate_breadcrumb($menu_info['0']['menu_id']);
		$data['group_menu'] = $this->menu_model->load_menu(array('layout_name', 'menu_string', 'menu_id', 'menu_title', 'template_id', 'menu_url', 'menu_image', 'menu_details', 'menu_level', 'tblmenu.parent_id', 'menu_content', 'sub_title'), array('tblmenu.parent_id' => $parent_id, 'menu_visible' => 1));

		$this->view->set_layout($menu_info['0']['layout_name']);
		$this->view->set_extra_data(array('menu' => $menu_info['0'], 'childs' => $data['group_menu']));
		$this->view->set_extra_data(array('breadcrumbs' => $this->url_model->generate_breadcrumb($menu_info['0']['menu_id'])));
		if (trim($menu_info['0']['template_id']) != '') {
			$this->view->set_view($menu_info['0']['template_id']);
		}
		$this->view->view($data);

	}

	public function details($title, $id) {

		// Get news content
		$article_info = $this->article_model->get_row_array('tblarticle', array('article_id' => $id));
		if (!$article_info) {redirect(base_url());}
		$data['news'] = $article_info;
		// Get article other
		$menu_info = $this->menu_model->load_menu_frontend(false, array('menu_id' => $article_info['menu_id']), 0, 1, true);
		$data['menu'] = $menu_info['0'];
		$limit = intval($this->article_model->get_config('other_article', $this->my_lang) / 2);
		$new_article = $this->article_model->load_related_news_by_tags($article_info, array('article_id', 'article_author', 'article_title', 'article_datetime', 'article_image'), array('article_queu > ' => $article_info['article_queu']), 0, $limit, array('tblarticle.article_queu' => 'ASC'));
		$old_article = $this->article_model->load_related_news_by_tags($article_info, array('article_id', 'article_author', 'article_title', 'article_datetime', 'article_image'), array('article_queu < ' => $article_info['article_queu']), 0, $limit, array('tblarticle.article_queu' => 'DESC'));
		$this->article_model->increase_view('tblarticle', 'article_view', array('article_id' => $id));
		$data['tags'] = array_filter(explode(',', $article_info['article_tags']), 'trim');
		$data['old'] = $old_article;
		$data['new'] = $new_article;

		$this->view->set_extra_data(array('content_description' => $article_info['article_description'], 'content_image' => $article_info['article_image'], 'breadcrumbs' => $this->url_model->generate_breadcrumb($article_info['menu_id'])));
		
		$this->view->view($data);
	}

	public function promotion($page = false) {
		$total = $this->product_model->load_product_frontend(array('product_id', 'product_image', 'product_name', 'product_summary', 'promotion_title'), array('promotion_title NOT LIKE ' => ''));
		$current_page = ($page) ? $page : 1;
		$data['news'] = $this->product_model->load_product_frontend(array('product_id', 'product_image', 'promotion_title', 'product_name', 'product_summary'), array('promotion_title NOT LIKE ' => ''), ($current_page - 1) * 15, 15);
		$this->layout_model->view('contents/news_promotion', $data);
	}

	public function prodetails() {
		$id = $this->input->get('id');
		$news = $this->product_model->load_product_frontend(array('product_id', 'product_image', 'promotion_details', 'promotion_title', 'product_name', 'product_summary'), array('product_id' => $id), false, false, true);
		$data['news'] = $news['0'];

		$this->layout_model->view('contents/news_promotion_details', $data);
	}

	public function tags($lang, $tag, $page = false) {
		$tag = trim(urldecode($tag));
		$where = array('tblarticle.article_tags LIKE ' => '%,' . str_replace('-', ' ', $tag) . ',%', 'lang' => $this->my_lang);
		$total = $this->article_model->load_article_frontend(array('article_id'), $where)->num_rows();
		// $limit = $this->article_model->get_config('other_article',$this->my_lang);
		$limit = 100;
		$page = ($page) ? $page : 1;
		$page = $this->input->get('page') ? $this->input->get('page') : $page;
		$data['tag'] = str_replace('-', ' ', $tag);
		$articles = $this->article_model->load_article_frontend(false, $where, ($page - 1) * $limit, $limit, false, array('tblarticle.article_datetime' => 'DESC'));
		$data['articles'] = $articles;
		$this->view->set_layout('default');
		$this->view->view($data);
	}

	public function rss() {
		header("Content-Type: application/rss+xml; charset=utf-8");
		$menu_array = $this->menu_model->load_menu_frontend(false, array('tblmodule.module_name' => 'news_cate', 'tbllang.lang_shortname' => $this->my_lang));
		$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
            <rss version=\"2.0\">
                <channel>
                    <title>" . $this->my_config('web_title') . "</title>
                    <link>" . base_url() . "</link>
                    <description>" . $this->my_config('web_h1') . "</description>\n";

		//foreach($menu_array->result_array() as $menu){
		//$output.="<item>
		//<title>".$menu['menu_title']."</title>
		//<link>".$this->url_model->emit_cate_url($menu['menu_id'])."</link>
		//<description>".$menu['menu_description']."</description>
		//</item>\n";
		//}

		$article_array = $this->article_model->load_article_recursive(array('tblarticle.article_id', 'tblarticle.article_header', 'tblarticle.article_title,tblarticle.article_datetime'), 0, array('tblmenu.menu_visible' => 1, 'tbllang.lang_shortname' => $this->my_lang, 'tblarticle.article_visible' => 1), false, false, false, false, array('tblarticle.article_queu' => 'DESC'));
		foreach ($article_array->result_array() as $news) {
			$output .= "<item>
                            <title>" . form_prep($news['article_title']) . "</title>
                            <link>" . $this->url_model->emit_news_url($news['article_id']) . "</link>
                            <description>" . form_prep($news['article_header']) . "</description>
                            <pubDate>" . date('d/m/Y h:m:s', $news['article_datetime']) . "</pubDate>
                            </item>\n";
		}

		$product_array = $this->product_model->load_product_frontend(array('tblproduct.product_id', 'tblproduct.product_name', 'tblproduct.product_summary,tblproduct.product_date'), array('tblmenu.menu_visible' => 1, 'tbllang.lang_shortname' => $this->my_lang, 'tblproduct.product_visible' => 1));
		foreach ($product_array->result_array() as $pro) {
			$output .= "<item>
                            <title>" . form_prep($pro['product_name']) . "</title>
                            <link>" . $this->url_model->emit_product_url($pro['product_id']) . "</link>
                            <description>" . form_prep($pro['product_summary']) . "</description>
                            <pubDate>" . date('d/m/Y h:m:s', $pro['product_date']) . "</pubDate>
                            </item>\n";
		}
		$output .= "</channel></rss>";

		echo $output;

	}
}
?>