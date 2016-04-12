<?php

class product extends Public_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('menu_model');
	}
	/**
	 * Product::Product()
	 *
	 * @return void
	 */

	public function index() {
		echo 'test';
	}

	/**
	 * Product::cate()
	 *
	 * @return void
	 */
	public function cate($lang = FALSE, $id = false, $title = false, $page = false) {
		if (!$id) {redirect(base_url());}

		$menu_info = $this->menu_model->load_menu(false, array('menu_id' => $id), NULL, NULL, NULL, TRUE);
		$template = $menu_info['0']['template_id'];
		if (count($menu_info) < 1) {redirect(base_url());}
		$limit = $this->article_model->get_config('product_page', $this->my_lang, $this->domain_id);
		$page = ($page) ? $page : 1;
		$select_cols = '*';
		$total = $this->product_model->load_product_recursive_frontend('product_id', $id)->num_rows();
		$page_list = $this->url_model->emit_page_list($id, $total, $limit, $page, false, 10);
		$product_array = $this->product_model->load_product_recursive_frontend($select_cols, $id, FALSE, ($page - 1) * $limit, $limit);

		$data['products'] = $product_array;
		$data['page_list'] = $page_list;
		$data['menu'] = $menu_info['0'];
		$data['group_menu'] = $this->menu_model->load_menu(array('menu_id', 'menu_title'), array('tblmenu.parent_id' => $id, 'menu_visible' => 1));
		$data['breadcrumbs'] = $this->url_model->generate_breadcrumb($menu_info['0']['menu_id']);
		if ($menu_info['0']['layout_name']) {
			$this->view->set_layout($menu_info['0']['layout_name']);
		}
		$this->view->set_extra_data(array('breadcrumbs' => $this->url_model->generate_breadcrumb($menu_info['0']['menu_id'])));
		$this->view->view($data);

	}

	public function details($lang = FALSE, $id) {
		$product_info = $this->product_model->load_product_frontend(FALSE, array('product_id' => $id), FALSE, FALSE, TRUE);

		$data['product'] = $product_info['0'];
		$attach_id = explode('|', $product_info['0']['product_attachment']);
		$data['attachment'] = $this->product_model->load_product_frontend(array('product_id', 'product_name', 'product_image'), array('tbllang.lang_shortname' => $this->my_lang), false, false, false, array('tblproduct.product_id' => $attach_id));
		$data['product_other'] = $this->product_model->load_product(false, false, false, false, false, array
			('tblproduct.product_id NOT LIKE ' => $id, 'tblproduct.product_visible' => 1, 'tblproduct.menu_id' =>
				$product_info['0']['menu_id']), $this->product_model->get_config('other_product', $this->my_lang,$this->domain_id), 0);
		$menu_info = $this->menu_model->get_row_array('tblmenu', array('menu_id' => $product_info['0']['menu_id']));
		$data['menu'] = $menu_info;
		$data['breadcrumbs'] = $this->url_model->generate_breadcrumb($menu_info['menu_id']);
		$this->view->set_extra_data(array('breadcrumbs' => $data['breadcrumbs']));
		$data['image_other'] = array_filter(explode('|', $product_info['0']['product_other_image']), 'trim');

		create_thumb_image($data['product']['product_image']);
		$ext = pathinfo($data['product']['product_image'], PATHINFO_EXTENSION);
		$filename = chop($data['product']['product_image'], '.' . $ext);

		$data['product']['product_thumbnail'] = $filename . '_thumb.' . $ext;
		$this->view->set_layout('default');
		$this->view->view($data);
	}

	public function comment() {
		$id = $this->input->get('id');
		$data['id'] = $id;

		$this->load->view($data);
	}

	public function load_attr() {
		if ($this->input->get('id')) {
			$id = $this->input->get('id');
			$attrs = $this->product_model->select_query('tblproductypeproperties', false, array('producttype_id' => $id, 'property_level' => 1));
			$content = '';
			foreach ($attrs->result_array() as $attr) {
				$attrs = $this->product_model->select_query('tblproductypeproperties', false, array('property_parent_id' => $id));
				$content .= '<span style="margin-left:5px" class="filter-label">' . $attr['property_name'] . ':</span>
                            <select id="type" class="filter-select">
                            <option value="0">Tất cả...</option>';
				foreach ($attrs->result_array() as $attr) {
					$content .= '<option value="' . $attr['property_id'] . '">' . $attr['property_name'] . '</option>';
				}
				$content .= '</select><div style="clear:both"></div>';

			}
			echo $content;
		}
	}
    
    public function type($title, $id, $page = false){
        
    	$limit = $this->article_model->get_config('product_page', $this->my_lang, $this->domain_id);
        $type = $this->product_model->get_row_array('tblproducttype',array('producttype_id'=>$id));
		$page = ($page) ? $page : 1;
        $offset = ($page-1)*$limit;
        $total = $this->product_model->select_query('tblproduct', false,array('producttype_id'=>$id,'product_visible'=>1))->num_rows();
		$page_list = $this->url_model->emit_page_list($id, $total, $limit, $page, false, 10);
		$data['products'] = $this->product_model->select_query('tblproduct', false,array('producttype_id'=>$id,'product_visible'=>1),false, $offset, $limit);
        $data['breadcrumbs'] = array(
            array('link'=>'/','title'=>'Trang chủ'), array('link'=> $this->url_model->get_producttype_url($type),'title'=>'trang loại sản phẩm '. $type['producttype_name']),
        );
        	$this->view->set_extra_data( array('breadcrumbs' => $data['breadcrumbs'],'web_title'=> 'Trang loại sản phẩm - '. $type['producttype_name']));
        	$this->view->set_layout('default');
		$this->view->view($data);

    }

	public function load_more() {
		$id = intval($this->input->get('id'));
		$page = intval($this->input->get('page'));

		$menu_info = $this->menu_model->load_menu(false, array('menu_id' => $id), NULL, NULL, NULL, TRUE);
		if (count($menu_info) < 1) {
			$data['status'] = 'error';
		} else {
			$template = $menu_info['0']['template_id'];
			$limit = intval($this->input->get('limit')) ? intval($this->input->get('limit')) : $this->article_model->get_config('product_page', $this->my_lang, $this->domain_id);
			$select_cols = '*';
			$total = $this->product_model->load_product_recursive_frontend('product_id', $id)->num_rows();
			$page_list = $this->url_model->emit_page_list($id, $total, $limit, $page, false, 10);
			$product_array = $this->product_model->load_product_recursive_frontend($select_cols, $id, FALSE, ($page - 1) * $limit, $limit);

			$products = $product_array->result_array();
			foreach ($products as $key => $item) {
				$products[$key]['link'] = $this->url_model->get_product_url($item);
			}
			$data['products'] = $products;
			if (count($products) < $limit) {
				$data['status'] = 'false';
			}

		}
		echo json_encode($data);
	}

}