<?php if (!defined('BASEPATH')) {
	exit('No direct script access allowed');
}

class Layout_model extends Base_model {

	private $_layout;
	private $_template;
	private $_lang;
	private $_group;
	private $_level;
	private $_layout_file;
	private $_module;
	private $_action;
	private $_view;
	protected $_extra_data;

	protected $domain_id;
	function __construct() {
		parent::__construct();
		$this->domain_id = $_SESSION['domain_id'];
		$this->load->model('plugin_model');
		$this->load->model('menu_model');
		$this->load->model('product_model');
		$this->load->library('shop');
		$this->load->model('url_model');
		$this->load->model('article_model');
		$this->load->model('counter_model');
		$segments = $this->uri->rsegment_array();
		$this->_module = $segments['1'];
		$this->_action = $segments['2'];
		$this->_layout_file = 'default';
		$this->_view = $segments['2'];
		$this->layout = 'default';
	}

	/**
	 * Layout_model::set_template()
	 *
	 * @param mixed $template
	 * @return void
	 */
	public function set_template($template) {
		$this->_template = $template;
	}

	public function set_lang($lang) {
		$this->_lang = $lang;
	}

	public function set_extra_data($data) {
		$this->_extra_data = $data;
	}
	/**
	 * Layout_model::set_layout()
	 *
	 * @param mixed $layout
	 * @return void
	 */
	public function set_layout($layout) {

		$layout_file = 'template/templates/' . $this->_template . '/views/layouts/' . $layout . '.php';

		if (file_exists($layout_file)) {
			$this->_layout_file = $layout;

		}

	}

	/**
	 * Layout_model::get_layout_file()
	 *
	 * @return
	 */
	public function get_layout_file() {
		return $this->_layout_file;
	}

	/**
	 * Layout_model::set_view()
	 *
	 * @param mixed $view
	 * @return void
	 */
	public function set_view($view) {
		$view_file = 'template/templates/' . $this->_template . '/views/modules/' . $this->_module . '/' . $view . '.php';
		if (file_exists($view_file)) {
			$this->_view = $view;
		}

	}
	public function get_view() {
		return $this->_view;
	}
	/**
	 * Layout_model::set_group()
	 *
	 * @param mixed $group
	 * @param mixed $level
	 * @return void
	 */
	public function set_group($group, $level) {
		$this->_group = $group;
		$this->_level = $level;
	}
	/**
	 * Layout_model::emit_meta_data()
	 *
	 * @param mixed $data
	 * @return void
	 */
	private function emit_meta_data(&$data) {
		// Emit meta data
		$module = $this->uri->rsegment(1);

		$function = $this->uri->rsegment(2);
		$id = $this->uri->rsegment(3);

		$data['web_banner'] = $this->get_config('web_banner', $this->_lang, $this->domain_id);
		$data['web_logo'] = $this->get_config('web_logo', $this->_lang, $this->domain_id);

		$page = $module . '_' . $function;
		$data['web_h1'] = $this->get_config('web_h1', $this->_lang, $this->domain_id);
		$data['meta_description'] = $this->get_config('web_description', $this->_lang, $this->domain_id);

		$data['web_title'] = $this->get_config('web_title', $this->_lang, $this->domain_id);
		$data['content_description'] = $this->get_config('content_description', $this->_lang, $this->domain_id);
		$data['meta_keyword'] = $this->get_config('web_keyword', $this->_lang, $this->domain_id);

		$data['current_url'] = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

		if ($function) {

			switch ($page) {
			case 'home_index':
				$data['meta_keyword'] = $this->get_config('web_keyword', $this->_lang, $this->domain_id);
				$data['web_h1'] = $this->get_config('web_h1', $this->_lang);
				$data['meta_description'] = $this->get_config('web_description', $this->_lang, $this->domain_id);
				$data['web_title'] = $this->get_config('web_title', $this->_lang, $this->domain_id);

				break;
			case 'product_details':
				$id = $this->uri->rsegment(4);
				$product_info = $this->select_query('tblproduct', false, array('product_id' => $id), false, false, false, false, true);
				$cate = $product_info['0']['menu_id'];
				$cate_info = $this->select_query('tblmenu', false, array('menu_id' => $cate), false, false, false, false, true);
				$data['meta_keyword'] = trim($product_info['0']['product_keyword'] == '') ? ((trim($cate_info['0']['menu_keyword']) == '') ? $data['meta_keyword'] : $cate_info['0']['menu_keyword']) :
				$product_info['0']['product_keyword'];
				$data['web_h1'] = trim($product_info['0']['product_h1'] == '') ? ((trim($cate_info['0']['menu_h1']) == '') ? $data['web_h1'] : $cate_info['0']['menu_h1']) :
				$product_info['0']['product_h1'];
				$data['meta_description'] = trim($product_info['0']['product_metadesc'] == '') ? ((trim($cate_info['0']['menu_description']) == '') ? $data['meta_description'] : $cate_info['0']['menu_description']) :
				$product_info['0']['product_metadesc'];
				$data['web_title'] = trim($product_info['0']['product_metatitle'] == '') ? $product_info['0']['product_name'] :
				$product_info['0']['product_metatitle'];
				break;
			case 'news_details':
				$id = $this->uri->rsegment(4);
				$news_info = $this->select_query('tblarticle', false, array('article_id' => $id), false, false, false, false, true);
				$cate = $news_info['0']['menu_id'];
				$cate_info = $this->select_query('tblmenu', false, array('menu_id' => $cate), false, false, false, false, true);
				$data['meta_keyword'] = trim($news_info['0']['article_keyword'] == '') ? ((trim($cate_info['0']['menu_keyword']) == '') ? $data['meta_keyword'] : $cate_info['0']['menu_keyword']) :
				$news_info['0']['article_keyword'];
				$data['web_h1'] = trim($news_info['0']['article_h1'] == '') ? ((trim($cate_info['0']['menu_h1']) == '') ? $data['web_h1'] : $cate_info['0']['menu_h1']) :
				$news_info['0']['article_h1'];
				$data['meta_description'] = trim($news_info['0']['article_description'] == '') ? ((trim($cate_info['0']['menu_description']) == '') ? $data['meta_description'] : $cate_info['0']['menu_description']) :
				$news_info['0']['article_description'];
				$data['web_title'] = trim($news_info['0']['article_metatitle'] == '') ? $news_info['0']['article_title'] :
				$news_info['0']['article_metatitle'];
				break;
			case 'search_index':
				$keyword = ($this->input->get('keyword')) ? $this->input->get('keyword') :
				$this->input->get('tag');
				$data['web_title'] = 'Kết quả tìm kiếm ' . $keyword;
				if ($this->input->get('page')) {
					$data['web_title'] = $data['web_title'] . ' | Trang' . $this->input->get('page');
				}
				break;
			case 'contact_index':
				$data['web_title'] = 'Liên hệ';
				break;
			case 'news_cate':
			case 'product_cate':
			case 'gallery_cate':

				$id = $this->uri->rsegment(4);
				$data['meta_keyword'] = trim($this->get_by_key('tblmenu', 'menu_keyword', 'menu_id', $id) == '') ? $data['meta_keyword'] : trim($this->get_by_key('tblmenu', 'menu_keyword', 'menu_id', $id));
				$data['web_h1'] = trim($this->get_by_key('tblmenu', 'menu_h1', 'menu_id', $id) == '') ? $data['web_h1'] : trim($this->get_by_key('tblmenu', 'menu_h1', 'menu_id', $id));
				$data['meta_description'] = trim($this->get_by_key('tblmenu', 'menu_description', 'menu_id', $id) == '') ? $data['meta_description'] : trim($this->get_by_key('tblmenu', 'menu_description', 'menu_id',
					$id));
				$data['web_title'] = $this->get_by_key('tblmenu', 'menu_metatitle', 'menu_id', $id);
			default:

				if ($this->get_by_key('tblmodule', 'module_menu', 'module_name', $page) == 1 && ($id)) {
					$data['meta_keyword'] = trim($this->get_by_key('tblmenu', 'menu_keyword', 'menu_id', $id) == '') ? $data['meta_keyword'] : trim($this->get_by_key('tblmenu', 'menu_keyword', 'menu_id', $id));
					$data['web_h1'] = trim($this->get_by_key('tblmenu', 'menu_h1', 'menu_id', $id) == '') ? $data['web_h1'] : trim($this->get_by_key('tblmenu', 'menu_h1', 'menu_id', $id));
					$data['meta_description'] = trim($this->get_by_key('tblmenu', 'menu_description', 'menu_id', $id) == '') ? $data['meta_description'] : trim($this->get_by_key('tblmenu', 'menu_description', 'menu_id',
						$id));
					$data['web_title'] = $this->get_by_key('tblmenu', 'menu_metatitle', 'menu_id', $id);
				} else {
					$data['web_title'] = trim($this->get_by_key('tblmodule', 'module_description', 'module_name', $page));
					$data['meta_keyword'] = trim($this->get_by_key('tblmenu', 'menu_keyword', 'menu_id', $id) == '') ? $data['meta_keyword'] : trim($this->get_by_key('tblmenu', 'menu_keyword', 'menu_id', $id));
					$data['web_h1'] = trim($this->get_by_key('tblmenu', 'menu_h1', 'menu_id', $id) == '') ? $data['web_h1'] : trim($this->get_by_key('tblmenu', 'menu_h1', 'menu_id', $id));
					$data['meta_description'] = trim($this->get_by_key('tblmenu', 'menu_description', 'menu_id', $id) == '') ? $data['meta_description'] : trim($this->get_by_key('tblmenu', 'menu_description', 'menu_id',
						$id));
				}
				$page = $this->uri->rsegment(6);

				if ($page) {
					$data['web_title'] .= ' | trang ' . $page;
					$data['meta_description'] .= ' | trang ' . $page;
				}
				if ($this->input->get('album')) {
					$data['web_title'] .= ' - ' . $this->get_by_key('tblgallery', 'gallery_title', 'gallery_id', $this->input->get('album'));
				}
				break;

			}

		}

		// Emit footer and banner
		$data['web_footer'] = $this->get_config('web_footer', $this->_lang, $this->domain_id);

		$data['template'] = $this->_template;

	}

	/**
	 * Layout_model::load_position_content()
	 *
	 * @param string $position
	 * @return void
	 */
	public function load_position_content($position) {
		$position_content = '';

		$cate = false;
		$module = $this->uri->rsegment(1);

		$function = $this->uri->rsegment(2);
		$id = $this->uri->rsegment(4);
		$page = $module . '_' . $function;
		$cate_pages = array('product_cate', 'news_cate', 'gallery_cate', 'contact_index');
		if ($page == 'home_index') {
			$cate = '0';
		}

		$page_id = $this->menu_model->get_by_key('tblmodule', 'module_id', 'module_name', $page);

		if (in_array($page, $cate_pages)) {
			$cate = $id;
		}

		$plugin_array = $this->plugin_model->load_plugin(array('tblplugintype.pluginconfig_name', 'plugin_filter', 'tblplugin.configvalue', 'tblplugin.page_ids', 'tblplugin.config', 'tblplugin.plugin_title', 'tblplugin.image',
			'tblplugin.plugin_id', 'tblplugin.plugin_privilege', 'tblplugin.menu_ids', 'tblplugin.plugin_submenu', 'tblplugin.embed_code', 'tblplugin.plugintemplate_id', 'tblplugintype.plugintype_name'), 
            array('tbllang.lang_shortname' =>
			$this->_lang, 'template' => $this->_template, 'tblplugin.domain_id' => $this->domain_id, 'tblplugin.position_name' => $position, 'tblplugin.plugin_visible' => 1), false, false, array('tblplugin.plugin_queu' => 'ASC')
            , true);

		foreach ($plugin_array as $plugin) {
			$data['plugin'] = $plugin;
			$data['keyword'] = $this->get_keyword($this->_lang);
			$data['lang'] = $this->_lang;
			$menu_array = explode('|', $plugin['menu_ids']);
			$page_array = explode('|', $plugin['page_ids']);

			$data['template'] = $this->_template;
			$data['block'] = $plugin;

			$data['current_lang'] = $this->_lang;

			if (
				(((in_array($page, $cate_pages) && in_array($cate, $menu_array)))
					|| ($page == 'home_index' && (in_array('0', $menu_array))))
				|| ($page != 'home_index' && in_array($page_id, $page_array) && !in_array($page, $cate_pages))
			) {

				switch ($plugin['plugintype_name']) {
				case 'support':
					$data['block_content'] = $this->plugin_model->load_plugin_content('tblsupport', $plugin['plugin_id'], false, array('support_visible' => 1), false, false, array('support_queu' => 'DESC'));

					break;
				case 'product_new':
					$data['block_content'] = $this->product_model->load_product(false, false, false, false, false, array('tblmenu.menu_visible' => 1, 'tblmenu.menu_visible' => 1, 'tblmenu.domain_id' => $this->domain_id), $block_config_array['num_product'], 0, false,
						array('tblproduct.product_queu' => 'DESC'));
					break;
				case 'product_hot':
					$data['block_content'] = $this->product_model->load_product(false, false, false, false, false, array('tblmenu.menu_visible' => 1, 'tblproduct.product_visible' => 1, 'tblmenu.domain_id' => $this->domain_id, 'tblproduct.product_hot' => 1, 'tbllang.lang_active' => 1, 'tblmodule.module_active' => 1), $block_config_array['num_page'], 0, false, false,
						array('tblproduct.product_queu' => 'DESC'));
					break;
				case 'product_bestsell':
					$data['block_content'] = $this->product_model->load_product(false, false, false, false, false, array('tblmenu.menu_visible' => 1, 'tblproduct.product_visible' => 1, 'tblmenu.domain_id' => $this->domain_id, 'tblproduct.product_bestsell' => 1, 'tbllang.lang_active' => 1, 'tblmodule.module_active' => 1), false, false, false,
						array('tblproduct.product_queu' => 'DESC'));
					break;
				case 'product_saleoff':
					$data['block_content'] = $this->product_model->load_product(false, false, false, false, false, array('tblmenu.menu_visible' => 1, 'tblproduct.product_visible' => 1,
						'product_price - product_saleoff > ' => 0, 'tblproduct.product_saleoff > ' => 0, 'tbllang.lang_active' => 1, 'tblmenu.domain_id' => $this->domain_id, 'tblmodule.module_active' => 1), $block_config_array['num_page'], 0, false, false, array('tblproduct.product_queu' => 'DESC'));
					break;
				case 'html':
					$data['block_content'] = $plugin['embed_code'];
					break;

				case 'menu':
					$menu_id_in_block = explode('|', $plugin['plugin_submenu']);

					$menu_in_block = $this->menu_model->db->select()->from('tblmenu')->where(array('menu_visible' => 1, 'tblmenu.domain_id' => $this->domain_id))->where_in('menu_id', $menu_id_in_block)->order_by('tblmenu.menu_queu', 'ASC');
					$data['block_content'] = $menu_in_block->get();
					break;

				case 'media':
					$date_now = time();
					$data['block_content'] = $this->product_model->select_query('tblmedia', FALSE, array('tblmedia.media_visible' => 1, 'tblmedia.plugin_id' => $plugin['plugin_id'], 'tblmedia.media_publish < ' => $date_now, 'tblmedia.media_expire > ' => $date_now), FALSE, FALSE, FALSE, array('tblmedia.media_queu' => 'DESC'));
					break;
				case 'block_product':
					$product_id_array = explode('|', $this->plugin_model->get_by_key('tblplugin', 'block_product', 'plugin_id', $plugin['plugin_id']));
					$data['block_content'] = $this->menu_model->select_query('tblproduct', FALSE, array('tblmenu.menu_visible' => 1, 'tblproduct.product_visible' => 1), array('tblmenu' => 'tblmenu.menu_id=tblproduct.menu_id'), FALSE, FALSE, array('tblproduct.product_queu' => 'DESC'), FALSE, array('product_id' => $product_id_array));
					break;
				case 'block_news':
					$article_id_array = explode('|', $this->plugin_model->get_by_key('tblplugin', 'block_article', 'plugin_id', $plugin['plugin_id']));
					$data['block_content'] = $this->select_query('tblarticle', FALSE, array('tblmenu.menu_visible' => 1, 'tblarticle.article_visible' => 1), array('tblmenu' => 'tblmenu.menu_id=tblarticle.menu_id'), FALSE, FALSE, array('tblarticle.article_queu' => 'DESC'), FALSE, array('article_id' => $article_id_array));
					break;
				case 'news':
					$configs = explode('|', $plugin['config']);
					$configvals = explode('|', $plugin['configvalue']);
					$block_config = @array_combine($configs, $configvals);

					$limit = isset($block_config['limit']) ? $block_config['limit'] : 6;
					$type = isset($block_config['type']) ? trim($block_config['type']) : 'latest';
					$cate = intval($plugin['plugin_submenu']);
					$where = array('tbllang.lang_shortname' => $this->_lang, 'tblmenu.domain_id' => $this->domain_id);
					$order = array('tblarticle.article_queu' => 'DESC');
					if ($cate) {
						$data['cate'] = $this->get_row_array('tblmenu', array('menu_id' => $cate));
					}
					switch ($type) {
					case 'hot':
						$where = array_merge($where, array('article_hot' => 1));
						break;
					case 'home':

						$where = array_merge($where, array('article_home' => 1));

						break;
					default:break;
					}

					$articles = $this->article_model->load_article_frontend_recursive($cate, false, $where, 0, $limit);
					$data['block_content'] = $articles;

					break;
				case 'product':
					$configs = explode('|', $plugin['config']);
					$configvals = explode('|', $plugin['configvalue']);
					$block_config = @array_combine($configs, $configvals);
					$limit = isset($block_config['limit']) ? (intval(trim($block_config['limit'])) > 0 ? trim($block_config['limit']) : 6) : 6;
					$type = isset($block_config['type']) ? trim($block_config['type']) : 'latest';
					$cate = intval($plugin['plugin_submenu']);
					if ($cate) {
						$data['cate'] = $this->get_row_array('tblmenu', array('menu_id' => $cate));
					}
					$where = array('tbllang.lang_shortname' => $this->_lang, 'tblmenu.domain_id' => $this->domain_id);
					$order = array('tblproduct.product_queu' => 'DESC');
					switch ($type) {
					case 'hot':
						$where = array_merge($where, array('product_hot' => 1));
						break;
					case 'home':
						$where = array_merge($where, array('product_home' => 1));
						break;
					case 'bestsale':
						$where = array_merge($where, array('product_bestsell' => 1));
						break;
					default:break;
					}

					$products = $this->product_model->load_product_recursive_frontend(false, $cate, $where, 0, $limit);

					$data['block_content'] = $products;
					break;
				case 'panorama':
					$configs = explode('|', $plugin['config']);
					$configvals = explode('|', $plugin['configvalue']);
					$block_config = array_combine($configs, $configvals);
					$data['configs'] = $block_config;
					break;
				default:
					break;
				}
                $data['config'] = $this->serialize_config($this->_lang, $this->domain_id);
				$data['resources_path'] = LAYOUT_DIR . $this->_template;
				$position_content .= $this->load->view($this->_template . '/views/widgets/' . $plugin['plugintemplate_id'], $data, true);

			}
		}
		return $position_content;

	}

	/**
	 * Layout_model::view()
	 *
	 * @param mixed $data
	 * @param bool $return
	 * @return data
	 */
	public function view($data, $view = false, $return = false) {
		if (!file_exists(LAYOUT_DIR . $this->_template . '/elements.xml')) {
			die('<p align="center">Can not find elements.xml</p>');
		}

		$positions = $this->plugin_model->load_plugin_position($this->_template);
		foreach ($positions as $position_name => $position_title) {

			$data[$position_name] = $this->load_position_content($position_name);
		}

		$data['languages'] = $this->select_query('tbllang', array('lang_shortname', 'lang_image', 'lang_name'), array('lang_active' => 1));

//        $data['admin_task'] = '';
		//        if (isset($_SESSION['user']['group_level']) && $_SESSION['user']['group_level']<4)
		//        {
		//            $data['admin_task'] = $this->load->view('back_end/admin_task', false, true);
		//        }
		$data['resources_path'] = LAYOUT_DIR . $this->_template;

		$data['keyword'] = $this->get_keyword($this->_lang);

		$data['template'] = $this->_template;

		$this->emit_meta_data($data);
	 $data['config'] = $this->serialize_config($this->_lang, $this->domain_id);
		//   $data['breadcrumb'] = $this->url_model->emit_breadcrumb();
		$data['cart'] = $this->shop->count_cart();
		$data['price'] = $this->shop->calculate_price();
		$data['current_lang'] = $this->_lang;
		$data['layout_data'] = $this->_extra_data;

		$data['web_content'] = $this->load->view($this->_template . '/views/modules/' . $this->_module . '/' . $this->_view, $data, true);
		if ($return) {
			return $this->load->view($this->_template . '/views/layouts/' . $this->_layout_file, $data, true);
		} else {
			$this->load->view($this->_template . '/views/layouts/' . $this->_layout_file, $data);
		}
		return $data;
	}

}

?>