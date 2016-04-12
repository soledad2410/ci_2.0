<?php
Class Search extends Public_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('article_model');
	}

	public function index() {
		$keyword = $this->input->get('keyword');

		$tag = $this->input->get('tag');

		$url = base_url() . 'search.html?';
		$where = array('tbllang.lang_shortname' => $this->my_lang, 'tblmenu.menu_visible' => 1, 'tblarticle.article_visible' => 1);
		if ($keyword) {
			$url .= 'keyword=' . $keyword . '&';
			$data['keywords'] = $keyword;

			$where = array_merge($where, array('tblarticle.article_title LIKE ' => "%{$keyword}%"));
		}
		if ($tag) {
			$data['keyword'] = $tag;
			$url .= 'tag=' . $tag . '&';
			$tag = ',' . $tag . ',';
			$where = array_merge($where, array('tblarticle.article_tags LIKE ' => "%,{$tag},%"));

		}
		$total = $this->article_model->load_article_recursive(array('tblarticle.article_id', 'tblarticle.article_title', 'tblarticle.article_image', 'tblarticle.article_header'), 0, $where)->num_rows();
		$page = ($this->input->get('page')) ? $this->input->get('page') : 1;
		$limit = $this->my_config('article_page');
		/*
		 */
		$page_list = $this->url_model->emit_page_search_list($total, $limit, $page, $url);
		//$news_search=$this->article_model->load_article_recursive(array('tblarticle.article_id','tblarticle.article_title','tblarticle.article_image','tblarticle.article_datetime','tblarticle.article_header'),0,$where,FALSE,FALSE,FALSE,FALSE,array('tblarticle.article_datetime'=>'DESC'),$limit,($page-1)*$limit);
		$news_cols = array('tblarticle.article_id', 'tblarticle.article_title', 'tblarticle.article_image', 'tblarticle.article_datetime', 'tblarticle.article_header');
		$news_search = $this->article_model->load_article_recursive($news_cols, 0, $where, FALSE, FALSE, FALSE, FALSE, array('tblarticle.article_datetime' => 'DESC'), false, false);
		$pros_cols = array('product_id', 'product_name', 'product_metadesc', 'product_image', 'product_date', 'product_price', 'product_code', 'unit');
		$pros_where = "(`product_name` LIKE '%{$keyword}%' OR `product_code` LIKE '%{$keyword}%')";
		$pros_search = $this->product_model->load_product_frontend($pros_cols, $pros_where, false, false);

		//$data['page_list']=$page_list;
		$data['articles'] = $news_search;
		$data['products'] = $pros_search;
		$data['total'] = (string) $total;
		$data['page_count'] = page_count($total, $limit);
		$this->view->set_extra_data(['web_title' => 'Search result page']);
		$this->view->view($data);
	}

	function product() {

		$data = [];
		$where = [];
		$product_nsx = $this->input->get('sale-type');
		$producttype_id = $this->input->get('type');
		$direction = $this->input->get('direction');
		$product_size = $this->input->get('size');
		$price = trim(strip_tags($this->input->get('price')));
		$city_id = $this->input->get('city');
		$location = $this->input->get('location');
		$keyword = trim($this->input->get('keyword'));
		$search_type = trim(strip_tags($this->input->get('type')));

		if ($product_nsx) {
			$where = array_merge($where, ['product_nhasx' => $product_nsx]);
		}
		if (intval($producttype_id) != '0') {
			$where = $where = array_merge($where, ['tblproduct.producttype_id' => $producttype_id]);
		}
		if ($direction) {
			$where = array_merge($where, ['tblproduct.direction' => $direction]);
		}
		if (intval($city_id) != '0') {
			$where = array_merge($where, ['tblproduct.city_id' => $city_id]);
		}
		if (intval($location) != '0') {
			$where = array_merge($where, ['tblproduct.location_id' => $location]);
		}
		if ($product_size) {
			$size_range = explode('-', $product_size);
			$min = $size_range['0'];
			$where = array_merge($where, ['product_size >= ' => $min]);
			if (isset($size_range['1'])) {
				$where = array_merge($where, ['product_size <= ' => $size_range['1']]);
			}
		}
		if ($price) {
			$size_range = explode('-', $price);
			$min = $size_range['0'];
			$where = array_merge($where, ['product_price >= ' => $min]);
			if (isset($size_range['1'])) {
				$where = array_merge($where, ['product_price <= ' => $size_range['1']]);
			}
		}
		if ($keyword != '') {
			switch ($search_type) {
			case 'code':
				$where = array_merge($where, ['product_code' => $keyword]);
				break;

			default:
				$where = array_merge($where, ['product_name LIKE ' => '%' . $keyword . '%']);
				break;
			}
		}

		$where = array_merge($where, ['tblmenu.menu_visible' => 1, 'tblproduct.product_visible' => 1]);

		$select_array = '*';
		$limit = $this->product_model->get_config('product_page', $this->my_lang);
		$page = intval($this->input->get('page')) > 0 ? $this->input->get('page') : 1;
		$select_cols = '*';
		$total = $this->product_model->load_product_frontend($select_cols, $where)->num_rows();

		$product_array = $this->product_model->load_product_frontend($select_cols, $where);

		$data['products'] = $product_array;
		$data['total'] = $total;
		$this->view->set_layout('default');
		$this->view->view($data);

	}
}
?>