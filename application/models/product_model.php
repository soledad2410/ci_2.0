<?php
Class Product_model extends Base_model {

	function __construct() {
		parent::__construct();
		$this->load->model('menu_model');

	}

	/**
	 * Admin_model::load_product()
	 *
	 * @param mixed $cols
	 * @param int $cate
	 * @param string $like
	 * @param int $min_price
	 * @param int $max_price
	 * @param array $where
	 * @param int $limit
	 * @param int $offset
	 * @param bool $return_array(true:return mysql resource ,false:return array)
	 * @param array $order
	 * @return product array or mysql resource
	 */
	public function load_product($cols = false, $cate = false, $like = false, $min_price = false, $max_price = false, $where = false, $limit = false, $offset = false, $return_array = false, $order = false) {

		$column_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : "*";
		$this->db->select($column_select)->from('tblproduct')->join('tblmenu', 'tblmenu.menu_id=tblproduct.menu_id')->join('tblmodule', 'tblmodule.module_id=tblmenu.module_id');
		$this->db->join('tbllang', 'tblmenu.lang_id=tbllang.lang_id')->join('tblproducttype', 'tblproducttype.producttype_id=tblproduct.producttype_id', 'left');
		if ($cate) {
			$this->db->where('tblproduct.menu_id', $cate);
		}
		if ($like) {
			$this->db->like('tblproduct.product_name', $like);
		}
		if ($min_price) {
			$this->db->where(array('tblproduct.product_price >= ' => $min_price));
		}
		if ($max_price) {
			$this->db->where(array('tblproduct.product_price <= ' => $max_price));
		}
		if ($where) {
			$this->db->where($where);
		}
		if ($limit) {
			$this->db->limit($limit);
			if ($offset) {
				$this->db->limit($limit, $offset);
			}
		}
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		$query = $this->db->get();
		if ($return_array) {return $this->get_array($query);} else {return $query;}
	}

	public function load_product_frontend($cols = FALSE, $where = FALSE, $start = FALSE, $limit = FALSE, $return_array = FALSE, $where_in = false, $order = FALSE) {
		$column_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : "*";
		$this->db->select($column_select)->from('tblproduct')
			->join('tblmenu', 'tblmenu.menu_id=tblproduct.menu_id', 'left')
			->join('tblmodule', 'tblmodule.module_id=tblmenu.module_id', 'left')
			->join('tbllang', 'tblmenu.lang_id=tbllang.lang_id', 'left')
			->join('tbldomain', 'tblproduct.domain_id=tbldomain.domain_id', 'left')
			->join('tblproducttype', 'tblproducttype.producttype_id=tblproduct.producttype_id', 'left');

		$this->db->where('tbldomain.domain_id', $this->domain_id);

		$this->db->where('tblmenu.menu_visible', 1);
		$this->db->where('tblproduct.product_visible', 1);
		if ($where) {
			$this->db->where($where);
		}
		if ($limit) {
			$this->db->limit($limit);
			if ($start) {
				$this->db->limit($limit, $start);
			}
		}
		if ($where_in) {
			foreach ($where_in as $key => $value) {
				$this->db->where_in($key, $value);
			}

		}
		if ($order) {
			foreach ($order as $key => $val) {
				$this->db->order_by($key, $val);
			}
		}
		$this->db->order_by('tblproduct.product_queu', 'DESC');
		$query = $this->db->get();
		if ($return_array) {return $this->get_array($query);} else {return $query;}
	}

	/**
	 * Product_model::load_product_recursive_frontend()
	 *
	 * @param array $cols
	 * @param int $cate_id
	 * @param array $where
	 * @param array $start
	 * @param array $limit
	 * @param bool $return_array
	 * @return
	 */
	public function load_product_recursive_frontend($cols = FALSE, $cate_id, $where = FALSE, $start = FALSE, $limit = FALSE, $return_array = FALSE) {
		$column_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : "*";
		$menu_array = $this->menu_model->menu_recursive_frontend($cate_id, array('menu_id'));
		$array_cate = array($cate_id);

		foreach ($menu_array as $menu) {
			$array_cate[] = $menu['menu_id'];
		}
		$this->db->select($column_select)->from('tblproduct')->join('tblmenu', 'tblmenu.menu_id=tblproduct.menu_id')->join('tblmodule', 'tblmodule.module_id=tblmenu.module_id')->join('tblproducttype', 'tblproducttype.producttype_id=tblproduct.producttype_id', 'left');
		$this->db->join('tbllang', 'tblmenu.lang_id=tbllang.lang_id');
		$this->db->where('tblproduct.product_visible', 1);
		$this->db->where_in('tblproduct.menu_id', $array_cate);
		if ($where) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if ($limit) {
			$this->db->limit($limit, $start);
		}
		$this->db->order_by('tblproduct.product_queu', 'DESC');
		$query = $this->db->get();
		if ($return_array) {return $this->get_array($query);} else {return $query;}
	}
	/**
	 * Product_model::load_product_frontend_by_cate()
	 *
	 * @param bool $cols
	 * @param mixed $cate_id
	 * @param bool $where
	 * @param bool $start
	 * @param bool $limit
	 * @param bool $return_array
	 * @return
	 */
	public function load_product_frontend_by_cate($cols = FALSE, $cate_id, $where = FALSE, $start = FALSE, $limit = FALSE, $return_array = FALSE) {
		$column_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : "*";
		$this->db->select($column_select)->from('tblproduct')->join('tblproducttype', 'tblproducttype.producttype_id=tblproduct.producttype_id');
		$this->db->join('tbllang', 'tblmenu.lang_id=tbllang.lang_id');
		$this->db->where('tblproduct.product_visible', 1);
		$this->db->like('tblproduct.menu_id', '|' . $cate_id . '|');

		if ($where) {
			foreach ($where as $key => $value) {
				$this->db->where($key, $value);
			}
		}
		if ($limit) {
			$this->db->limit($limit, $start);
		}
		$this->db->order_by('tblproduct.product_queu', 'DESC');
		$query = $this->db->get();
		return $this->get_array($query);
	}
	/**
	 * Product_model::load_product_recursive()
	 *
	 * @param bool $cols
	 * @param mixed $cate_id
	 * @param bool $like
	 * @param bool $min_price
	 * @param bool $max_price
	 * @param bool $where_cate
	 * @param bool $where_product
	 * @param bool $limit
	 * @param bool $offset
	 * @param bool $return_array
	 * @param bool $order
	 * @return
	 * @uses load product recursive by menu
	 */
	public function load_product_recursive($cols = false, $cate_id, $like = false, $min_price = false, $max_price = false, $where_cate = false, $where_product = false, $limit = false, $offset = false, $return_array = false, $order = false) {
		$column_select = ($cols) ? (is_array($cols) ? implode(',', $cols) : $cols) : "*";
		$menu_array = $this->menu_model->load_menu_recursive('tblmenu.menu_id', $cate_id, $where_cate, array('tblmenu.menu_queu' => 'ASC'));
		$array_cate = array($cate_id);
		foreach ($menu_array as $menu) {
			$array_cate[] = $menu['menu_id'];
		}
		$this->db->select($column_select)->from('tblproduct')->join('tblmenu', 'tblmenu.menu_id=tblproduct.menu_id')->join('tblmodule', 'tblmodule.module_id=tblmenu.module_id');
		$this->db->join('tbllang', 'tblmenu.lang_id=tbllang.lang_id');
		$this->db->where_in('tblproduct.menu_id', $array_cate);
		if ($like) {
			$this->db->like('tblproduct.product_name', $like);
		}
		if ($min_price) {
			$this->db->where(array('tblproduct.product_price >= ' => $min_price));
		}
		if ($max_price) {
			$this->db->where(array('tblproduct.product_price <= ' => $max_price));
		}
		if ($where_product) {
			$this->db->where($where_product);
		}
		if ($limit) {
			$this->db->limit($limit, $offset);
		}
		if ($order) {
			foreach ($order as $key => $value) {
				$this->db->order_by($key, $value);
			}
		}
		$query = $this->db->get();
		if ($return_array) {return $this->get_array($query);} else {return $query;}

	}

	/**
	 * Product_model::down_product()
	 *
	 * @param int $product_id
	 * @return void
	 * @uses push up product queu
	 */
	public function down_product($product_id) {
		$menu_id = $this->get_by_key('tblproduct', 'menu_id', 'product_id', $product_id);
		$current_queu = $this->get_by_key('tblproduct', 'product_queu', 'product_id', $product_id);
		$new_queu = 1;
		$next_product = $this->load_product(array('tblproduct.product_id', 'tblproduct.product_queu'), $menu_id, false, false, false, array('tblproduct.product_queu < ' => $current_queu), 1, 0, TRUE, array('tblproduct.product_queu ' => 'DESC'));
		if (count($next_product) == 1) {

			$new_queu = $next_product['0']['product_queu'];
			$this->db->update('tblproduct', array('product_queu' => $new_queu), array('product_id' => $product_id));
			$this->db->update('tblproduct', array('product_queu' => $current_queu), array('product_id' => $next_product['0']['product_id']));

		}
	}

	/**
	 * Product_model::up_product()
	 *
	 * @param int $product_id
	 * @return void
	 * @uses push down product queu
	 */
	public function up_product($product_id) {
		$menu_id = $this->get_by_key('tblproduct', 'menu_id', 'product_id', $product_id);
		$current_queu = $this->get_by_key('tblproduct', 'product_queu', 'product_id', $product_id);
		$new_queu = 1;
		$next_product = $this->load_product(array('tblproduct.product_id', 'tblproduct.product_queu'), $menu_id, false, false, false, array('tblproduct.product_queu > ' => $current_queu), 1, 0, TRUE, array('tblproduct.product_queu ' => 'ASC'));
		if (count($next_product) == 1) {

			$new_queu = $next_product['0']['product_queu'];
			$this->db->update('tblproduct', array('product_queu' => $new_queu), array('product_id' => $product_id));
			$this->db->update('tblproduct', array('product_queu' => $current_queu), array('product_id' => $next_product['0']['product_id']));

		}
	}

	/**
	 * Product_model::load_nhasx()
	 *
	 * @param bool $return_array
	 * @param bool $cate_root
	 * @param bool $where
	 * @return
	 */
	public function load_nhasx($return_array = TRUE, $cate_root = FALSE, $where = FALSE) {

		$array_cate = array($cate_root);
		if ($cate_root) {
			$menu_array = $this->menu_model->load_menu_recursive('tblmenu.menu_id', $cate_root, FALSE, array('tblmenu.menu_queu' => 'ASC'));

			foreach ($menu_array as $menu) {
				$array_cate[] = $menu['menu_id'];
			}

			//  $this->db->where_in('tblproduct.menu_id',$array_cate);

		}
		$this->db->select('tblproduct.product_nhasx')->distinct()->select('tblproduct.product_nhasxlogo')->distinct()->from('tblproduct')->join('tblmenu', 'tblmenu.menu_id=tblproduct.menu_id')->join('tblmodule', 'tblmodule.module_id=tblmenu.module_id');
		if ($where) {
			$this->db->where($where);
		}
		if ($cate_root) {
			$this->db->where_in('tblproduct.menu_id', $array_cate);
		}

		$query = $this->db->get();
		if ($return_array) {return $this->get_array($query);} else {return $query;}

	}

	function load_attr_recursive_view($prodtype_id, $root_id) {

		$attr_root = $this->select_query('tblproductypeproperties', false, array('producttype_id' => $prodtype_id, 'property_parent_id' => $root_id));

		$content = '';

		foreach ($attr_root->result_array() as $attr) {
			$content .= '<div title="' . $attr['property_id'] . '" class="field" style="margin-left:50px;">';
			if ($attr['property_level'] == 2) {
				$content .= '<div class="label" style="margin-left:40px"><label for="autocomplete">Giá trị</label></div>';
			} else {
				$content .= '<div class="label"><label for="autocomplete">Tên thuộc tính</label></div>';
			}
			$content .= '<div class="input"><input type="text" size="20" class="required_field" name="attr_' . $attr['property_id'] . '" value="' . $attr['property_name'] . '"></div>
            <img width="24" height="24" style="cursor: pointer;" onclick="removeAttr(\'' . $attr['property_id'] . '\')" src="html/resources/images/icons/remove.png" title="Xóa Cấu hình này">';
			if ($attr['property_level'] < 2) {
				$content .= '<img width="24" height="24" style="cursor: pointer;" onclick="addProductAttr(\'' . $attr['property_id'] . '\')" src="html/resources/images/icons/add.png" title="Thêm mới thuộc tính">';
			}
			$content .= $this->load_attr_recursive_view($prodtype_id, $attr['property_id']);

			$content .= '</div>';
		}

		return $content;

	}
	function load_atrr_product_recursive($prodtype_id, $root_id, $product_id = false) {
		$attr_root = $this->select_query('tblproductypeproperties', false, array('producttype_id' => $prodtype_id, 'property_parent_id' => $root_id));
		$content = '';
		foreach ($attr_root->result_array() as $attr) {
			$value = ($product_id) ? $this->get_by_key('tblproductproperties', 'property_value', null, null, array('product_id' => $product_id, 'property_id' => $attr['property_id'])) : '';

			$margin = $attr['property_level'] * 50 + 200;
			$content .= '<div class="field">
							<div class="label">
								<label for="input-medium">Tên thuộc tính</label>
							</div>
							<div class="input" style="margin-left:' . $margin . 'px">
								<input type="text" name="attr_' . $attr['property_id'] . '" value="' . $value . '" />
							</div>
						</div>';
		}
		return $content;

	}

	function delete_product_attr_recursive($root_id) {
		$this->db->delete(array('tblproductypeproperties', 'tblproductproperties'), array('property_id' => $root_id));
		$childs = $this->select_query('tblproductypeproperties', false, array('property_parent_id' => $root_id));
		foreach ($childs->result_array() as $attr) {
			$this->delete_product_attr_recursive($attr['property_id']);
		}
	}

	function load_product_attr_frontend($product_id, $prodtype_id, $root_id) {
		$join = array('tblproductproperties' => 'tblproductproperties.property_id=tblproductypeproperties.property_id');
		$attr_root = $this->select_query('tblproductypeproperties', false, array('producttype_id' => $prodtype_id, 'property_parent_id' => $root_id, 'tblproductproperties.product_id' => $product_id), $join);
		$content = '';

		foreach ($attr_root->result_array() as $attr) {

			$margin = $attr['property_level'] * 30;
			$content .= '<div class="tr-text-pip">';
			$content .= '<div class="text" style="width:100%;"><span style="margin-left:' . $margin . 'px">' . $attr['property_name'] . '</span></div>';
			$content .= '';
			$content .= '</div>';
			$content .= $this->load_product_attr_frontend($product_id, $prodtype_id, $attr['property_id']);
		}

		return $content;

	}

}

?>